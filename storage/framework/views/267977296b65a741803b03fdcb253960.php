<section id="menu" class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-2xl font-bold mb-6">Explora nuestro menú</h2>

        
        <div class="md:hidden overflow-x-auto flex space-x-4 pb-4 snap-x snap-mandatory">
            <div class="flex-shrink-0 snap-center w-64 bg-white shadow p-4 rounded text-center">
                <img src="<?php echo e(asset('images/categorias/pollos.webp')); ?>" alt="Pollo" class="mx-auto h-24">
                <h3 class="mt-2 font-semibold">Pollo a la brasa</h3>
            </div>
            <div class="flex-shrink-0 snap-center w-64 bg-white shadow p-4 rounded text-center">
                <img src="<?php echo e(asset('images/categorias/combos.webp')); ?>" alt="Combos" class="mx-auto h-24">
                <h3 class="mt-2 font-semibold">Combos</h3>
            </div>
            <div class="flex-shrink-0 snap-center w-64 bg-white shadow p-4 rounded text-center">
                <img src="<?php echo e(asset('images/categorias/bebidas.webp')); ?>" alt="Bebidas" class="mx-auto h-24">
                <h3 class="mt-2 font-semibold">Bebidas</h3>
            </div>
            <div class="flex-shrink-0 snap-center w-64 bg-white shadow p-4 rounded text-center">
                <img src="<?php echo e(asset('images/categorias/adicionales.webp')); ?>" alt="Adicionales" class="mx-auto h-24">
                <h3 class="mt-2 font-semibold">Adicionales</h3>
            </div>
            <div class="flex-shrink-0 snap-center w-64 bg-white shadow p-4 rounded text-center">
                <img src="<?php echo e(asset('images/categorias/piqueos.webp')); ?>" alt="Piqueos" class="mx-auto h-24">
                <h3 class="mt-2 font-semibold">Piqueos</h3>
            </div>
        </div>

        
        <div x-data="{ active: 0, total: 2 }" class="relative hidden md:block overflow-hidden">
            <!-- Wrapper -->
            <div class="flex transition-all duration-500"
                :style="'transform: translateX(-' + active * 100 + '%)'"
                style="width: calc(100% * 2)"> <!-- total de slides -->

                
                <div class="w-full flex-shrink-0 flex space-x-6 justify-between">
                    <div class="w-1/3 bg-white shadow p-4 rounded text-center">
                        <img src="<?php echo e(asset('images/categorias/pollos.webp')); ?>" alt="Pollo" class="mx-auto h-[150px]">
                        <h3 class="mt-2 font-semibold text-lg">Pollo a la brasa</h3>
                    </div>
                    <div class="w-1/3 bg-white shadow p-4 rounded text-center">
                        <img src="<?php echo e(asset('images/categorias/combos.webp')); ?>" alt="Combos" class="mx-auto h-[150px]">
                        <h3 class="mt-2 font-semibold">Combos</h3>
                    </div>
                    <div class="w-1/3 bg-white shadow p-4 rounded text-center">
                        <img src="<?php echo e(asset('images/categorias/bebidas.webp')); ?>" alt="Bebidas" class="mx-auto h-[150px]">
                        <h3 class="mt-2 font-semibold">Bebidas</h3>
                    </div>
                </div>

                
                <div class="w-full flex-shrink-0 flex space-x-6 justify-between">
                    <div class="w-1/3 bg-white shadow p-4 rounded text-center">
                        <img src="<?php echo e(asset('images/categorias/adicionales.webp')); ?>" alt="Adicionales" class="mx-auto h-[150px]">
                        <h3 class="mt-2 font-semibold">Adicionales</h3>
                    </div>
                    <div class="w-1/3 bg-white shadow p-4 rounded text-center">
                        <img src="<?php echo e(asset('images/categorias/parrillas.webp')); ?>" alt="Parrillas" class="mx-auto h-[150px]">
                        <h3 class="mt-2 font-semibold">Parrillas</h3>
                    </div>
                    <div class="w-1/3 bg-white shadow p-4 rounded text-center">
                        <img src="<?php echo e(asset('images/categorias/piqueos.webp')); ?>" alt="Piqueos" class="mx-auto h-[150px]">
                        <h3 class="mt-2 font-semibold">Piqueos</h3>
                    </div>
                </div>
            </div>

            
            <button
                @click="active = (active - 1 + total) % total"
                class="absolute left-0 top-1/2 -translate-y-1/2 bg-white px-3 py-2 rounded shadow hover:bg-gray-100 z-10">
                ←
            </button>
            <button
                @click="active = (active + 1) % total"
                class="absolute right-0 top-1/2 -translate-y-1/2 bg-white px-3 py-2 rounded shadow hover:bg-gray-100 z-10">
                →
            </button>
        </div>


    </div>
</section>
<?php /**PATH C:\xampp\htdocs\polleria\resources\views/client/components/categorias.blade.php ENDPATH**/ ?>