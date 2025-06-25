<nav x-data="{ open: false }" class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-bold text-red-600">El Buen Sabor</a>

        {{-- Botón hamburguesa para móviles --}}
        <button @click="open = !open" class="md:hidden text-red-600 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path :class="{ 'hidden': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
                <path :class="{ 'hidden': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        {{-- Menú de escritorio --}}
        <ul class="hidden md:flex space-x-6 font-medium text-lg">
            <li><a href="{{ route('menu') }}" class="hover:text-red-500">Menú</a></li>
            <li><a href="#promociones" class="hover:text-red-500">Mis pedidos</a></li>
            <li>
                <a href="https://wa.me/51999888777" target="_blank" class="flex items-center space-x-2 hover:text-green-700 text-green-600">
                    <i class="fab fa-whatsapp text-2xl"></i>
                    <div class="leading-tight text-sm">
                        <div class="font-semibold">Contáctanos</div>
                        <div class="text-xs">999 888 777</div>
                    </div>
                </a>
            </li>

            <li>
                <a href="#contacto" class="flex items-center space-x-2 text-black-600 hover:text-gray-500">
                    <i class="fas fa-shopping-cart text-xl"></i>
                    <div class="leading-tight text-sm">
                        <div class="font-semibold">Carrito</div>
                        <div class="text-xs">S/ 0.00</div> {{-- Aquí puedes mostrar el total dinámicamente --}}
                    </div>
                </a>
            </li>
        </ul>
    </div>

    {{-- Menú desplegable para móviles --}}
    <div x-show="open" class="md:hidden px-4 pb-4">
        <ul class="space-y-2 font-medium">
            <li><a href="{{ route('menu') }}" class="block hover:text-red-500">Menú</a></li>
            <li><a href="#promociones" class="block hover:text-red-500">Mis pedidos</a></li>
            <li>
                <a href="https://wa.me/51999888777" target="_blank" class="flex items-center space-x-2 hover:text-green-700 text-green-600">
                    <i class="fab fa-whatsapp text-2xl"></i>
                    <div class="leading-tight text-sm">
                        <div class="font-semibold">Contáctanos</div>
                        <div class="text-xs">999 888 777</div>
                    </div>
                </a>
            </li>
            <li><a href="#contacto" class="block hover:text-red-500">Carrito</a></li>
        </ul>
    </div>
</nav>