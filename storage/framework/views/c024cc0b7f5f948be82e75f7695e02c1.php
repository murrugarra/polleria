<div
    x-data="{
        active: 0,
        total: 3,
        startAutoplay() {
            setInterval(() => {
                this.active = (this.active + 1) % this.total;
            }, 4000); // Cambia cada 5 segundos
        }
    }"
    x-init="startAutoplay"
    class="relative overflow-hidden w-full"
>
    <div class="flex transition-transform duration-700 ease-in-out"
         :style="'transform: translateX(-' + active * 100 + '%)'">
        
        
        <div class="w-full flex-shrink-0">
            <img src="/images/promos/desktop/promo1.webp" class="w-full object-cover hidden md:block" alt="Promo 1">
            <img src="/images/promos/mobile/promo1.webp" class="w-full object-cover block md:hidden" alt="Promo 1 móvil">
        </div>

        
        <div class="w-full flex-shrink-0">
            <img src="/images/promos/desktop/promo2.webp" class="w-full object-cover hidden md:block" alt="Promo 2">
            <img src="/images/promos/mobile/promo2.webp" class="w-full object-cover block md:hidden" alt="Promo 2 móvil">
        </div>

        
        <div class="w-full flex-shrink-0">
            <img src="/images/promos/desktop/promo3.webp" class="w-full object-cover hidden md:block" alt="Promo 3">
            <img src="/images/promos/mobile/promo3.webp" class="w-full object-cover block md:hidden" alt="Promo 3 móvil">
        </div>
    </div>

    
    <button @click="active = (active - 1 + total) % total"
            class="absolute left-4 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-100">
        ←
    </button>
    <button @click="active = (active + 1) % total"
            class="absolute right-4 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-100">
        →
    </button>

    
    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
        <template x-for="i in total" :key="i">
            <div :class="{'bg-red-600': active === i - 1, 'bg-gray-300': active !== i - 1}"
                 class="w-3 h-3 rounded-full transition-colors duration-300"></div>
        </template>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\polleria\resources\views/client/components/carousel.blade.php ENDPATH**/ ?>