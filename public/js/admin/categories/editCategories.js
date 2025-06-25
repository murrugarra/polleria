$('#categoryFormEdit').on('submit', function (e) {
    e.preventDefault();

    const form = this;
    const formData = new FormData(form);

    // Extraer ID y nombre de imagen desde dataset
    const categoryId = form.dataset.categoryId;
    const imageUrl = form.dataset.categoryImage;

    // Si hay imagen anterior, extraer su nombre
    if (imageUrl) {
        const imageName = imageUrl.split('/').pop();
        formData.append('last_image', imageName);
    }

    // ✅ Laravel tomará esto como PUT
    formData.append('_method', 'PUT');

    // Opcional: ver qué se envía
    for (let pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }

    $.ajax({
        url: `/api/categories/${categoryId}`,
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (response) {
            Swal.fire({
                icon: response.icon || 'success',
                title: response.title || 'Éxito',
                text: response.message || 'Categoría actualizada correctamente'
            });

            form.reset();
            $('#previewEdit').html('');
            closeModalEdit();
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
