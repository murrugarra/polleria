

<?php $__env->startSection('content'); ?>
<h1 class="text-2xl font-bold text-gray-800 mb-6">Categorías</h1>

<!-- Botón para abrir modal -->
<button 
    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition mb-4"
    onclick="openModalAdd()"
>Agregar Categoría</button>

<!-- Tabla -->
<div class="bg-white rounded-lg shadow p-4 overflow-x-auto">
    <table id="categoriasTable" class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-100 text-gray-700 text-center">
            <tr>
                <th class="px-4 py-2 text-center">Código</th>
                <th class="px-4 py-2 text-center">Imagen Referencial</th>
                <th class="px-4 py-2 text-center">Nombre</th>
                <th class="px-4 py-2 text-center">Descripción</th>
                <th class="px-4 py-2 text-center">Acciones</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Modal para registrar categorías-->
<div id="categoryModalAdd" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg max-w-lg w-full p-6 relative">
        <button class="absolute top-3 right-3 text-gray-600 hover:text-gray-900" onclick="closeModalAdd()" aria-label="Cerrar">
            <i class="fas fa-times text-xl"></i>
        </button>

        <h2 class="text-xl font-bold mb-4">Registrar Nueva Categoría</h2>

        <form id="categoryFormAdd" enctype="multipart/form-data" class="space-y-4">
            
            <div>
                <label for="name" class="block font-semibold mb-1">Nombre <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500" />
            </div>

            <div>
                <label for="description" class="block font-semibold mb-1">Descripción</label>
                <textarea name="description" id="description" rows="3"
                    class="w-full border border-gray-300 rounded px-3 py-2 resize-none focus:outline-none focus:ring-2 focus:ring-red-500"></textarea>
            </div>

            <div>
                <label class="block font-semibold mb-1">Imagen</label>
                <div 
                    id="dropZone" 
                    class="border-2 border-dashed border-gray-300 rounded p-6 text-center cursor-pointer hover:border-red-500 transition"
                    ondragover="event.preventDefault()"
                    ondrop="handleDrop(event)"
                    onclick="document.getElementById('imageInput').click()"
                >
                    <p class="text-gray-500">Arrastra la imagen aquí o haz clic para seleccionar</p>
                    <p class="text-sm text-gray-400">(PNG, JPG, JPEG | Máx 2MB)</p>
                </div>

                <input type="file" accept=".png,.jpg,.jpeg" id="imageInput" name="image" class="hidden" onchange="handleFile(this.files)" />
                <div id="preview" class="mt-2"></div>
            </div>

            <div class="text-right">
                <button type="submit" 
                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition"
                >Guardar</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal para editar categorías -->
<div id="categoryModalEdit" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg max-w-lg w-full p-6 relative">
        <button class="absolute top-3 right-3 text-gray-600 hover:text-gray-900" onclick="closeModalEdit()" aria-label="Cerrar">
            <i class="fas fa-times text-xl"></i>
        </button>

        <h2 class="text-xl font-bold mb-4">Editar Categoría</h2>

        <form id="categoryFormEdit" enctype="multipart/form-data" class="space-y-4">
            <input type="hidden" name="id" id="editId">

            <div>
                <label for="editName" class="block font-semibold mb-1">Nombre <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="editName" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500" />
            </div>

            <div>
                <label for="editDescription" class="block font-semibold mb-1">Descripción</label>
                <textarea name="description" id="editDescription" rows="3"
                    class="w-full border border-gray-300 rounded px-3 py-2 resize-none focus:outline-none focus:ring-2 focus:ring-red-500"></textarea>
            </div>

            <div>
                <label class="block font-semibold mb-1">Imagen</label>
                <div 
                    id="dropZoneEdit"
                    class="border-2 border-dashed border-gray-300 rounded p-6 text-center cursor-pointer hover:border-red-500 transition"
                    ondragover="event.preventDefault()"
                    ondrop="handleDropEdit(event)"
                    onclick="document.getElementById('editImageInput').click()"
                >
                    <p class="text-gray-500">Arrastra la imagen aquí o haz clic para seleccionar</p>
                    <p class="text-sm text-gray-400">(PNG, JPG, JPEG | Máx 2MB)</p>
                </div>


                <input type="file" accept=".png,.jpg,.jpeg" id="editImageInput" name="image" class="hidden" onchange="handleFileEdit(this.files)" />
                <div id="previewEdit" class="mt-2"></div>
            </div>

            <div class="text-right">
                <button type="submit" 
                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition"
                >Actualizar</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal para eliminar categoría -->
<div id="categoryModalDelete" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg max-w-sm w-full p-6 relative">
        <button class="absolute top-3 right-3 text-gray-600 hover:text-gray-900" onclick="closeModalDelete()" aria-label="Cerrar">
            <i class="fas fa-times text-xl"></i>
        </button>

        <h2 class="text-xl font-bold mb-4 text-center text-red-600">Eliminar Categoría</h2>

        <p id="deleteMessage" class="text-center mb-6 text-gray-700">¿Estás seguro de que deseas eliminar esta categoría?</p>

        <div class="flex justify-center gap-4">
            <button onclick="confirmDeleteCategory()" 
                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                Sí, eliminar
            </button>
            <button onclick="closeModalDelete()" 
                class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition">
                Cancelar
            </button>
        </div>

        <input type="hidden" id="deleteCategoryId">
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\polleria\resources\views/admin/categorias.blade.php ENDPATH**/ ?>