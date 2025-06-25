<header class="bg-gray-900 text-white shadow px-6 py-4 flex justify-between items-center h-[81px] border-b border-gray-700">
    <!-- Logo / título -->
    <div class="text-lg font-semibold flex items-center gap-2">
        <button @click="sidebarOpen = true">
            <i class="fas fa-bars md:hidden text-xl cursor-pointer"></i>
        </button>
        <span>Panel Administrativo</span>
    </div>

    <!-- Usuario / sesión -->
    <div class="flex items-center gap-4">
        <span class="text-sm">Administrador</span>
        <i class="fas fa-user-circle text-2xl text-red-500"></i>
    </div>
</header>
