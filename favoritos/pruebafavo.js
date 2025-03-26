function toggleFavorite(productId) {
    let heartIcon = document.getElementById(`heart-${productId}`);
    // Cambiar el color del icono dependiendo de si ya es favorito o no
    if (heartIcon.classList.contains("fa-regular")) {
        heartIcon.classList.remove("fa-regular");
        heartIcon.classList.add("fa-solid");
        // Aquí puedes agregar el código para almacenar el producto en favoritos
        console.log(`Producto ${productId} agregado a favoritos`);
    } else {
        heartIcon.classList.remove("fa-solid");
        heartIcon.classList.add("fa-regular");
        // Aquí puedes agregar el código para eliminar el producto de favoritos
        console.log(`Producto ${productId} eliminado de favoritos`);
    }
}

function toggleFavorite(productId) {
    let favorites = JSON.parse(localStorage.getItem('favorites')) || [];

    if (!favorites.includes(productId)) {
        favorites.push(productId); // Agregar el producto si no está ya en favoritos
    } else {
        favorites = favorites.filter(id => id !== productId); // Eliminar el producto si ya está en favoritos
    }

    localStorage.setItem('favorites', JSON.stringify(favorites));
}
