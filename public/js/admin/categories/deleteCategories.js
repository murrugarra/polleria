function confirmDeleteCategory() {
    const categoryId = document.getElementById('deleteCategoryId').value;

    fetch(`/api/categories/${categoryId}`, {
        method: 'DELETE',
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(response => {
        Swal.fire({
            icon: response.icon || 'success',
            title: response.title || 'Eliminado',
            text: response.message || 'Categoría eliminada correctamente'
        });

        closeModalDelete();
        $('#categoriasTable').DataTable().ajax.reload(null, false);
    })
    .catch(() => {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Ocurrió un error al eliminar la categoría.'
        });
    });
}