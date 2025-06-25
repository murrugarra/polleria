$(document).ready(function () {
    // Envío del formulario por AJAX
    $('#categoryFormAdd').on('submit', function (e) {
        e.preventDefault();
        
        const form = this;
        const formData = new FormData(form);

        $.ajax({
            url: '/api/categories/', // Ruta API directamente
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
                Swal.fire({
                    icon: response.icon || 'success',
                    title: response.title || 'Éxito',
                    text: response.message || 'Categoría registrada correctamente'
                });

                form.reset();
                $('#preview').html('');
                closeModalAdd();

                $('#categoriasTable').DataTable().ajax.reload(null, false);
            },
            error: function (xhr) {
                const res = xhr.responseJSON;
                if (res?.errors) {
                    const messages = Object.values(res.errors).flat().join('<br>');
                    Swal.fire({
                        icon: 'error',
                        title: 'Errores de validación',
                        html: messages
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: res?.title || 'Error',
                        text: res?.message || 'Ocurrió un error inesperado.'
                    });
                }
            }
        });
    });
});