<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function generateUniqueString(string $string, int $length = 6): string
    {
        // Genera slug limpio
        $slug = Str::slug($string);

        // Genera sufijo único aleatorio
        $uniqueSuffix = substr(md5(uniqid()), 0, $length);

        // Retorna slug + sufijo
        return $slug . '-' . $uniqueSuffix;
    }

    public function customSlug(string $string): string
    {
        // Quitar acentos
        $string = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $string);

        // Reemplazar espacios por guion bajo
        $string = preg_replace('/\s+/', '_', $string);

        // Convertir a minúsculas
        $string = strtolower($string);

        // Eliminar caracteres no alfanuméricos ni guion bajo
        $string = preg_replace('/[^a-z0-9_]/', '', $string);

        return $string;
    }

}
