function handleDrop(event) {
    event.preventDefault();
    handleFile(event.dataTransfer.files);
}

function handleFile(files) {
    if (!files.length) return;

    const file = files[0];
    const allowedTypes = ['image/png', 'image/jpg', 'image/jpeg'];
    if (!allowedTypes.includes(file.type)) {
        Swal.fire('Formato no permitido', 'Solo PNG, JPG y JPEG.', 'error');
        return;
    }

    if (file.size > 2 * 1024 * 1024) {
        Swal.fire('Archivo muy grande', 'El tamaño máximo es 2MB.', 'error');
        return;
    }

    const preview = $('#preview');
    preview.html('');

    const img = $('<img>')
        .attr('src', URL.createObjectURL(file))
        .addClass('max-w-full max-h-48 rounded mt-2 mx-auto');

    preview.append(img);

    // Asignar el archivo manualmente al input (necesario para FormData)
    const inputFile = document.getElementById('imageInput');
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(file);
    inputFile.files = dataTransfer.files;
}

function handleDropEdit(event) {
    event.preventDefault();
    handleFileEdit(event.dataTransfer.files);
}

function handleFileEdit(files) {
    if (!files.length) return;

    const file = files[0];
    const allowedTypes = ['image/png', 'image/jpg', 'image/jpeg'];
    if (!allowedTypes.includes(file.type)) {
        Swal.fire('Formato no permitido', 'Solo PNG, JPG y JPEG.', 'error');
        return;
    }

    if (file.size > 2 * 1024 * 1024) {
        Swal.fire('Archivo muy grande', 'El tamaño máximo es 2MB.', 'error');
        return;
    }

    const preview = $('#previewEdit');
    preview.html('');

    const img = $('<img>')
        .attr('src', URL.createObjectURL(file))
        .addClass('max-w-full max-h-48 rounded mt-2 mx-auto');

    preview.append(img);

    // Asignar el archivo manualmente al input (necesario para FormData)
    const inputFile = document.getElementById('editImageInput');
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(file);
    inputFile.files = dataTransfer.files;
}
