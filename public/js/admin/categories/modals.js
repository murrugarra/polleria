function openModalAdd() {
    document.getElementById('categoryModalAdd').classList.remove('hidden');
    document.getElementById('categoryModalAdd').classList.add('flex');
}

function closeModalAdd() {
    document.getElementById('categoryModalAdd').classList.remove('flex');
    document.getElementById('categoryModalAdd').classList.add('hidden');
    resetFormAddCategory();
}

function resetFormAddCategory() {
    const form = document.getElementById('categoryFormAdd');
    form.reset();
    document.getElementById('preview').innerHTML = '';
}


function openEditModal(category) {
    const modal = document.getElementById('categoryModalEdit');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.getElementById('editId').value = category.id;
    document.getElementById('editName').value = category.name;
    document.getElementById('editDescription').value = category.description;

    const preview = document.getElementById('previewEdit');
    preview.innerHTML = category.url_image
        ? `<img src="${category.url_image}" class="w-24 h-24 object-cover mx-auto rounded">`
        : '';

    document.getElementById('categoryModalEdit').classList.remove('hidden');

    document.getElementById('categoryFormEdit').dataset.categoryId = category.id;
    document.getElementById('categoryFormEdit').dataset.categoryName = category.name;
    document.getElementById('categoryFormEdit').dataset.categoryDescription = category.description;
    document.getElementById('categoryFormEdit').dataset.categoryImage = category.url_image;
}

function closeModalEdit() {
    const modal = document.getElementById('categoryModalEdit');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}


function openDeleteModal(categoryId, categoryName) {
    document.getElementById('deleteCategoryId').value = categoryId;
    document.getElementById('deleteMessage').innerText = `¿Estás seguro de que deseas eliminar la categoría "${categoryName}"?`;
    document.getElementById('categoryModalDelete').classList.remove('hidden');
    document.getElementById('categoryModalDelete').classList.add('flex');
}

function closeModalDelete() {
    document.getElementById('categoryModalDelete').classList.add('hidden');
    document.getElementById('categoryModalDelete').classList.remove('flex');
}