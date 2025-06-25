<!-- Fondo semitransparente al abrir el sidebar en móvil -->
<div class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden" x-show="sidebarOpen" @click="sidebarOpen = false" x-cloak></div>

<!-- Sidebar -->
<aside
    class="fixed top-0 left-0 z-50 w-64 h-full bg-gray-900 text-white shadow-lg transform transition-transform duration-300 md:static md:translate-x-0 md:block"
    :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }"
    x-cloak
>
    <!-- Encabezado con botón cerrar en móvil -->
    <div class="p-6 text-2xl font-bold border-b border-gray-700 flex justify-between items-center">
        <div>
            <i class="fas fa-user-shield mr-2 text-red-500"></i> Admin
        </div>
        <!-- Cierre solo en móvil -->
        <button @click="sidebarOpen = false" class="md:hidden text-white text-xl">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <nav class="p-4 space-y-4">
        <!-- Sección: Principal -->
        <div>
            <span class="text-xs uppercase text-gray-400 px-2">Principal</span>
            <a href="<?php echo e(route('admin.dashboard')); ?>"
               class="mt-2 flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-red-600 transition <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-red-700' : ''); ?>">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </div>

        <!-- Sección: Ajustes -->
        <div>
            <span class="text-xs uppercase text-gray-400 px-2">Ajustes</span>
            <a href="<?php echo e(route('admin.categorias')); ?>"
               class="mt-2 flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-red-600 transition <?php echo e(request()->routeIs('admin.categorias') ? 'bg-red-700' : ''); ?>">
                <i class="fas fa-tags"></i>
                <span>Categorías</span>
            </a>
        </div>

        <!-- Otros enlaces -->
        <div>
            <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-red-600 transition">
                <i class="fas fa-box"></i>
                <span>Productos</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-red-600 transition">
                <i class="fas fa-sign-out-alt"></i>
                <span>Cerrar sesión</span>
            </a>
        </div>
    </nav>
</aside>
<?php /**PATH C:\xampp\htdocs\polleria\resources\views/admin/components/sidebar.blade.php ENDPATH**/ ?>