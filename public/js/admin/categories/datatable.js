$(document).ready(function () {
    $('#categoriasTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/api/categories/datatable', // ✅ Ruta corregida (tenías /datatable, ahora es /datatables)
            type: 'GET'
        },
        columns: [
            { data: 'id', name: 'id' },
            { 
                data: 'url_image',
                orderable: false,
                searchable: false,
                render: function(data) {
                    return `<img src="${data}" class="w-auto h-[70px] rounded object-cover mx-auto" />`;
                }
            },
            { data: 'name', name: 'name' },
            { data: 'description', name: 'description' },
            {
                data: 'actions',
                orderable: false,
                searchable: false
            }
        ],
        columnDefs: [
            { className: "text-center", targets: [0, 1, 4] } // índices de las columnas que quieres centrar
        ],
        language: {
            url: '/js/es-ES.json'
        }
    });
});
