function toggleInfo(event) {
    event.preventDefault(); // Evita que el enlace recargue la página
    const infoBox = document.getElementById('infoBox');
    infoBox.classList.toggle('hidden'); // Muestra u oculta el recuadro
}

function toggleEdit() {
    const isEditing = document.getElementById('nameInput').classList.contains('hidden');

    // Cambiar entre modo de visualización y edición
    document.querySelectorAll('span').forEach(span => {
        span.classList.toggle('hidden', isEditing);
    });
    document.querySelectorAll('input').forEach(input => {
        input.classList.toggle('hidden', !isEditing);
    });

    // Cambiar el texto del botón
    const editButton = document.getElementById('editButton');
    editButton.textContent = isEditing ? 'Guardar' : 'Editar';

    // Si se está guardando, actualizar los valores
    if (!isEditing) {
        document.getElementById('nameDisplay').textContent = document.getElementById('nameInput').value;
        document.getElementById('surnameDisplay').textContent = document.getElementById('surnameInput').value;
        document.getElementById('emailDisplay').textContent = document.getElementById('emailInput').value;
        document.getElementById('phoneDisplay').textContent = document.getElementById('phoneInput').value;
    }
}

function removeInfo() {
    const infoBox = document.getElementById('infoBox');
    infoBox.classList.add('hidden'); // Oculta el recuadro
}