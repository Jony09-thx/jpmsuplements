// Función para alternar el estado de favorito
function toggleFavorite(productId) {
    // Obtener los favoritos del localStorage o crear un array vacío si no hay favoritos guardados
    let favorites = JSON.parse(localStorage.getItem('favorites')) || [];

    // Verificar si el producto ya está en favoritos
    if (favorites.includes(productId)) {
        // Si está en favoritos, lo eliminamos
        favorites = favorites.filter(id => id !== productId);
        // Cambiar el icono a "no favorito"
        document.getElementById(`heart-${productId}`).classList.remove('fa-solid');
        document.getElementById(`heart-${productId}`).classList.add('fa-regular');
    } else {
        // Si no está en favoritos, lo agregamos
        favorites.push(productId);
        // Cambiar el icono a "favorito"
        document.getElementById(`heart-${productId}`).classList.remove('fa-regular');
        document.getElementById(`heart-${productId}`).classList.add('fa-solid');
    }

    // Guardar los favoritos actualizados en el localStorage
    localStorage.setItem('favorites', JSON.stringify(favorites));
}

// Al cargar la página, actualizar el estado del corazón
document.addEventListener('DOMContentLoaded', () => {
    // Aquí puedes comprobar los favoritos al cargar la página
    let favorites = JSON.parse(localStorage.getItem('favorites')) || [];

    // Verificar el estado de favoritos para cada producto
    favorites.forEach(productId => {
        // Asegurarse de que el icono esté marcado como favorito
        document.getElementById(`heart-${productId}`).classList.remove('fa-regular');
        document.getElementById(`heart-${productId}`).classList.add('fa-solid');
    });
});
