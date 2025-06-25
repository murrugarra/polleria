<section id="masvendido" class="py-12">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-2xl font-bold mb-6">Lo más vendido</h2>

        {{-- Carrusel para móvil --}}
        <div x-data="{ active: 0, total: 2 }" class="md:hidden relative overflow-hidden">
            <div class="flex transition-transform duration-500"
                :style="'transform: translateX(-' + active * 100 + '%)'"
                :class="{ 'cursor-grab': total > 1 }"
                style="width: calc(100% * 1);">

                {{-- Slide único --}}
                <div class="w-full flex-shrink-0 px-2">
                    <div class="flex flex-col sm:flex-row bg-white p-4 shadow rounded-lg items-center space-y-4 sm:space-y-0 sm:space-x-4">
                        <img src="{{ asset('images/promociones/promo1.webp') }}" class="w-32 h-32 object-cover rounded" alt="Promo 1">
                        <div class="flex flex-col justify-between text-left flex-1">
                            <h3 class="text-base font-semibold break-words">
                                Pollo + Papas + Inka Kola
                            </h3>
                            <p class="text-red-600 font-bold mt-1">S/ 29.90</p>
                            <button class="mt-4 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                                Agregar
                            </button>
                        </div>
                    </div>
                </div>

                <div class="w-full flex-shrink-0 px-2">
                    <div class="flex flex-col sm:flex-row bg-white p-4 shadow rounded-lg items-center space-y-4 sm:space-y-0 sm:space-x-4">
                        <img src="{{ asset('images/promociones/promo1.webp') }}" class="w-32 h-32 object-cover rounded" alt="Promo 1">
                        <div class="flex flex-col justify-between text-left flex-1">
                            <h3 class="text-base font-semibold break-words">
                                Pollo + Papas + Inka Kola
                            </h3>
                            <p class="text-red-600 font-bold mt-1">S/ 29.90</p>
                            <button class="mt-4 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                                Agregar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Botones solo si hay más de un slide --}}
            <template x-if="total > 1">
                <button @click="active = (active - 1 + total) % total"
                        class="absolute left-2 top-1/2 -translate-y-1/2 bg-white p-2 rounded shadow z-10">
                    ←
                </button>
            </template>
            <template x-if="total > 1">
                <button @click="active = (active + 1) % total"
                        class="absolute right-2 top-1/2 -translate-y-1/2 bg-white p-2 rounded shadow z-10">
                    →
                </button>
            </template>
        </div>

        {{-- Carrusel para escritorio --}}
        <div x-data="{ active: 0, total: 2 }" class="hidden md:block relative overflow-hidden">
            <div class="flex transition-transform duration-500"
                :style="'transform: translateX(-' + active * 100 + '%)'"
                style="width: 200%">              
                {{-- Slide 1 --}}
                <div class="w-full flex-shrink-0 grid grid-cols-3 gap-6 px-2">
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="flex flex-col sm:flex-row bg-white p-4 shadow rounded-lg items-center space-y-4 sm:space-y-0 sm:space-x-4">
                            <img src="{{ asset('images/promociones/promo1.webp') }}" class="w-32 h-32 object-cover rounded" alt="Promo {{ $i }}">
                            <div class="flex flex-col justify-between text-left flex-1">
                                <h3 class="text-base font-semibold break-words">
                                    Promo {{ $i }} - Pollo + Papas + Inka Kola
                                </h3>
                                <p class="text-red-600 font-bold mt-1">S/ {{ number_format(29.90 + $i, 2) }}</p>
                                <button class="mt-4 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                                    Agregar
                                </button>
                            </div>
                        </div>
                    @endfor
                </div>
                
                {{-- Slide 2 --}}
                <div class="w-full flex-shrink-0 grid grid-cols-3 gap-6 px-2">
                    @for ($i = 4; $i <= 6; $i++)
                        <div class="flex flex-col sm:flex-row bg-white p-4 shadow rounded-lg items-center space-y-4 sm:space-y-0 sm:space-x-4">
                            <img src="{{ asset('images/promociones/promo1.webp') }}" class="w-32 h-32 object-cover rounded" alt="Promo {{ $i }}">
                            <div class="flex flex-col justify-between text-left flex-1">
                                <h3 class="text-base font-semibold break-words">
                                    Promo {{ $i }} - Oferta especial del día
                                </h3>
                                <p class="text-red-600 font-bold mt-1">S/ {{ number_format(29.90 + $i, 2) }}</p>
                                <button class="mt-4 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                                    Agregar
                                </button>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            {{-- Botones de navegación (si hay más de 1 slide) --}}
            <template x-if="total > 1">
                <button @click="active = (active - 1 + total) % total"
                        class="absolute left-2 top-1/2 -translate-y-1/2 bg-white p-2 rounded shadow z-10">
                    ←
                </button>
            </template>
            <template x-if="total > 1">
                <button @click="active = (active + 1) % total"
                        class="absolute right-2 top-1/2 -translate-y-1/2 bg-white p-2 rounded shadow z-10">
                    →
                </button>
            </template>
        </div>
    </div>
</section>
