<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // Listar todas las categorías (sin eliminados lógicos)
    public function index()
    {
        $categories = Category::where('is_active', true)->get();

        if($categories->isEmpty()) {
            $data = [
                'message' => 'No hay categorías activas disponibles.',
                'data' => []
            ];

            return response()->json($data, 200);
        }

        $data = [
            'message' => 'Categorías activas encontradas.',
            'data' => $categories
        ];
        return response()->json($data);
    }

    // Mostrar una categoría específica
    public function show($id)
    {
        $category = Category::findOrFail($id);
        if($category->isEmpty()) {
            $data = [
                'message' => 'Categoría no encontrada.',
                'data' => []
            ];
            return response()->json($data, 200);
        }

        $data = [
            'message' => 'Categoría encontrada.',
            'data' => $category
        ];
        return response()->json($data);
    }

    // Crear una nueva categoría
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:categories,name',
            'slug' => 'nullable|string|unique:categories,slug',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Errores de validación.',
                'errors' => $validator->errors(),
                'icon' => 'error',
                'title' => 'Error'
            ], 422);
        }

        $data = $validator->validated();

        // Slug automático si no se envió
        $data['slug'] = empty($data['slug']) 
            ? $this->customSlug($data['name']) 
            : $this->customSlug($data['slug']);

        // Imagen
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Nombre único con tu helper
            $imageName = $this->generateUniqueString(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME), 8)
                    . '.' . $image->getClientOriginalExtension();

            // Guarda en: storage/app/public/images/categorias
            $image->move(public_path('storage/images/categorias'), $imageName);

            $data['image'] = $imageName;
        }

        $category = Category::create($data);

        if (!$category) {
            return response()->json([
                'message' => 'Error al crear la categoría.',
                'icon' => 'error',
                'title' => 'Error'
            ], 500);
        }

        return response()->json([
            'message' => 'Categoría creada correctamente.',
            'data' => $category,
            'icon' => 'success',
            'title' => 'Éxito',
        ], 201);
    }

    // Actualizar una categoría existente
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Categoría no encontrada.',
                'icon' => 'error',
                'title' => 'Error'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:categories,name,' . $category->id . ',id',
            'slug' => 'nullable|string|unique:categories,slug,' . $category->id . ',id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'last_image' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Errores de validación.',
                'errors' => $validator->errors(),
                'icon' => 'error',
                'title' => 'Error'
            ], 422);
        }

        $data = $validator->validated();

        // Slug automático si no se envió
        $data['slug'] = empty($data['slug']) 
            ? $this->customSlug($data['name']) 
            : $this->customSlug($data['slug']);

        // Imagen
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Nombre único con tu helper
            $imageName = $this->generateUniqueString(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME), 8)
                    . '.' . $image->getClientOriginalExtension();

            // Guarda en: storage/app/public/images/categorias
            $image->move(public_path('storage/images/categorias'), $imageName);

            // Eliminar imagen anterior si se proporcionó
            if (!empty($data['last_image'])) {
                $oldPath = public_path('storage/images/categorias/' . $data['last_image']);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $data['image'] = $imageName;
        }

        $category->update($data);

        return response()->json([
            'message' => 'Categoría actualizada correctamente.',
            'data' => $category,
            'icon' => 'success',
            'title' => 'Éxito',
        ], 200);
    }

    // Eliminar (soft delete) una categoría
    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return response()->json([
                'message' => 'Categoría eliminada correctamente',
                'icon' => 'success',
                'title' => 'Éxito'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al eliminar la categoría',
                'error' => $e->getMessage(),
                'icon' => 'error',
                'title' => 'Error'
            ], 500);
        }
    }

    // Obtener data para el datatable
    public function getCategoriesDatatable(Request $request)
    {
        // Columnas que el frontend está enviando (en orden)
        $columns = ['id', 'url_image', 'name', 'description', 'actions'];

        // Columnas reales de la base de datos que se pueden ordenar
        $sortableColumns = ['id', 'name', 'description'];

        $totalData = Category::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length', 10);
        $start = $request->input('start', 0);
        $orderColumnIndex = $request->input('order.0.column', 0);
        $requestedColumn = $columns[$orderColumnIndex] ?? 'id';
        $orderColumn = in_array($requestedColumn, $sortableColumns) ? $requestedColumn : 'id';
        $orderDir = $request->input('order.0.dir', 'asc');
        $searchValue = $request->input('search.value');

        $query = Category::query();

        // Búsqueda por nombre o descripción
        if (!empty($searchValue)) {
            $query->where(function($q) use ($searchValue) {
                $q->where('name', 'like', "%{$searchValue}%")
                ->orWhere('description', 'like', "%{$searchValue}%");
            });

            $totalFiltered = $query->count();
        }

        $categories = $query->offset($start)
                            ->limit($limit)
                            ->orderBy($orderColumn, $orderDir)
                            ->get();

        // Formateo de datos para la tabla
        $data = [];
        foreach ($categories as $category) {
            $data[] = [
                'id' => $category->id,
                'url_image' => asset('storage/images/categorias/' . ($category->image ?? 'sinImagen.png')),
                'name' => $category->name,
                'description' => $category->description,
                'actions' => '
                    <button onclick=\'openEditModal(' . htmlspecialchars(json_encode([
                        'id' => $category->id,
                        'name' => $category->name,
                        'description' => $category->description,
                        'url_image' => asset('storage/images/categorias/' . ($category->image ?? 'sinImagen.png')),
                    ]), ENT_QUOTES, 'UTF-8') . ')\' 
                    class="text-blue-600 hover:text-blue-800 transition inline-flex items-center space-x-1">
                        <i class="fas fa-edit"></i><span>Editar</span>
                    </button> |

                    <button onclick="openDeleteModal(' . $category->id . ', ' . htmlspecialchars(json_encode($category->name), ENT_QUOTES, 'UTF-8') . ')" 
                    class="text-red-600 hover:text-red-800 transition inline-flex items-center space-x-1">
                        <i class="fas fa-trash-alt"></i><span>Eliminar</span>
                    </button>'
            ];

        }

        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $totalData,
            "recordsFiltered" => $totalFiltered,
            "data" => $data
        ]);
    }



}
