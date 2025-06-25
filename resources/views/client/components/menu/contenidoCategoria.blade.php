<section id="menu" class="py-12 bg-gray-50 mb-7">
    <div class="max-w-7xl mx-auto px-4">

        <a href="{{ route('menu') }}" class="inline-flex items-center text-red-600 hover:text-red-800 mb-4 font-medium">
            <i class="fas fa-arrow-left mr-2"></i>
            Volver al menú
        </a>

        <h2 class="text-2xl font-bold mb-6" id="menu-categoria" data-categoria="{{ $seccion }}">
            {{-- Convertir la sección a título con espacios --}}
            {{-- Ejemplo: "pollo_a_la_brasa" se convierte en "Pollo A La Brasa" --}}
            {{ ucwords(str_replace('_', ' ', $seccion)) }}
        </h2>

    </div>
</section>
