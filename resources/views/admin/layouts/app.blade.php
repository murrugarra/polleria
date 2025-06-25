<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin</title>
    
    
    <!-- Estilos y tipografía -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- DataTables CSS base -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css">
    <!-- Responsive extension -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.dataTables.css">
    <!-- RowReorder extension -->
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.5.0/css/rowReorder.dataTables.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body x-data="{ sidebarOpen: false }" class="bg-gray-100">

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        @include('admin.components.sidebar')

        <!-- Contenedor derecho: topbar + main + footer -->
        <div class="flex-1 flex flex-col">

            <!-- Topbar -->
            @include('admin.components.topbar')

            <!-- Contenido desplazable -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-100">
                @yield('content')
            </main>

            <!-- Footer fijo -->
            @include('admin.components.footer')
        </div>
    </div>


    <!-- Scripts -->
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js" integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- jQuery (requerido por DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <!-- DataTables Core -->
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>

    <!-- Responsive extension -->
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.dataTables.js"></script>

    <!-- RowReorder extension -->
    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/dataTables.rowReorder.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/rowReorder.dataTables.js"></script>

    <!-- Scripts específicos de la página -->
    @if(isset($seccion) && $seccion === 'categorias')
        <script src="{{ asset('js/admin/categories/modals.js') }}"></script>
        <script src="{{ asset('js/admin/categories/dragAndDrop.js') }}"></script>
        <script src="{{ asset('js/admin/categories/datatable.js') }}"></script>
        <script src="{{ asset('js/admin/categories/addCategories.js') }}"></script>
        <script src="{{ asset('js/admin/categories/editCategories.js') }}"></script>
        <script src="{{ asset('js/admin/categories/deleteCategories.js') }}"></script>
    @endif


</body>
</html>
