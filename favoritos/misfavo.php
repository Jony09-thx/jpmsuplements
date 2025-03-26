<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Favoritos</title>
    <link rel="stylesheet" href="../index.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<style>
    #favorites-list {
    display: flex; /* Usamos Flexbox para organizar los productos */
    flex-wrap: wrap; /* Permite que los productos se muevan a la siguiente fila si no caben */
    gap: 20px; /* Espacio entre los productos */
    justify-content: center; /* Centra los productos en el contenedor */
    padding: 20px; /* Espacio alrededor de los productos */
}

/* Menú lateral */
.sidebar {
            position: fixed;
            top: 0;
            left: -250px; /* Oculto por defecto */
            width: 250px;
            height: 100%;
            background-color: #2c3e50;
            transition: left 0.3s ease;
            z-index: 1000;
        }

        /* Mostrar el menú lateral */
        .sidebar.active {
            left: 0;
        }

        /* Botón para abrir/cerrar el menú */
        .menu-toggle {
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: #1877f2;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            z-index: 1001;
            transition: background-color 0.3s ease;
        }

        .menu-toggle:hover {
            background-color: #165dbb;
        }

        .menu-toggle i {
            margin-right: 8px;
        }

        /* Estilos del contenido del menú */
        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
            margin-top: 60px;
        }

        .sidebar ul li {
            padding: 15px 20px;
            border-bottom: 1px solid #34495e;
            transition: background-color 0.3s ease;
        }

        .sidebar ul li:hover {
            background-color: #34495e;
        }

        .sidebar ul li a {
            color: #ecf0f1;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .sidebar ul li a i {
            margin-right: 10px;
        }

        /* Overlay para el fondo oscuro */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
        }

        .overlay.active {
            display: block;
        }

        

/* Animación de deslizamiento */
 h1 {
    text-align: center;
}


</style>
</head>
<body>
    <!-- Botón para abrir/cerrar el menú -->
<button class="menu-toggle" onclick="toggleSidebar()">
    <i class="fas fa-bars"></i> Menú
</button>

<!-- Menú lateral -->
<div class="sidebar" id="sidebar">
    <ul>
        <li><a href="../index.php"><i class="fas fa-home"></i> Inicio</a></li>
        <li><a href="#"><i class="fas fa-dumbbell"></i> Productos</a></li>
        <li><a href="#"><i class="fas fa-envelope"></i> Contacto</a></li>
        <li><a href="#"><i class="fas fa-info-circle"></i> Acerca de</a></li>
    </ul>
</div>

<!-- Overlay para el fondo oscuro -->
<div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

    
    <h1>Mis Productos Favoritos</h1>


    <section id="favorites-list">
        <!-- Aquí se mostrarán los productos favoritos -->
    </section>

    <script>
        // Función para mostrar los productos favoritos
        document.addEventListener('DOMContentLoaded', () => {
            let favorites = JSON.parse(localStorage.getItem('favorites')) || [];

            console.log('Favoritos recuperados:', favorites); // Verifica si se recuperan correctamente los favoritos

            // Comprobar si hay favoritos
            if (favorites.length === 0) {
                document.getElementById('favorites-list').innerHTML = '<p>No tienes productos favoritos.</p>';
            } else {
                // Mostrar los productos favoritos
                favorites.forEach(productId => {
                    let productHTML = getProductHTML(productId);
                    document.getElementById('favorites-list').innerHTML += productHTML;
                });
            }
        });

        // Función para obtener el HTML de un producto basado en su ID
        function getProductHTML(productId) {
            let product = getProductDetails(productId);
            return `
                <div class="card-product">
                    <div class="container-img">
                        <img src="../${product.image}" alt="${product.name}" />
                        <span class="discount">${product.discount || ""}</span>
                        <div class="button-group">
                            <span><i class="fa-regular fa-eye"></i></span>
                            <span><i class="fa-regular fa-heart" id="heart-${productId}" onclick="removeFavorite(${productId})"></i></span>
                            <span><i class="fa-solid fa-code-compare"></i></span>
                        </div>
                    </div>
                    <div class="content-card-product">
                        <div class="stars">
                            ${product.stars.map(star => `<i class="fa-solid fa-star"></i>`).join('')}
                        </div>
                        <h3 class="product-name">${product.name}</h3>
                        <p class="price">${product.price} <span>${product.oldPrice}</span></p>
                    </div>
                </div>
            `;
        }

        // Función para obtener los detalles del producto (puedes reemplazar esto con una base de datos o array de productos reales)
        function getProductDetails(productId) {
            const products = [
                { id: 1, name: "Proteina ISO100", image: "images/proteinaiso.jpg", price: "$4.60", oldPrice: "$5.30", stars: [1, 1, 1, 1, 0], discount: "-13%" },
                { id: 2, name: "Proteina MUTANT (MASS GAINER)", image: "images/mass.webp", price: "$5.70", oldPrice: "$7.30", stars: [1, 1, 1, 0, 0], discount: "-22%" },
                // Agrega más productos aquí
            ];

            return products.find(product => product.id === productId);
        }

        // Función para eliminar un producto de los favoritos
        function removeFavorite(productId) {
            let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
            favorites = favorites.filter(id => id !== productId); // Eliminar el producto de la lista
            localStorage.setItem('favorites', JSON.stringify(favorites));

            // Volver a cargar la página de favoritos para actualizar la vista
            location.reload();
        }
    </script>
    <!-- Enlace a FontAwesome para los íconos -->
<script src="https://kit.fontawesome.com/ceb1921ab7.js" crossorigin="anonymous"></script>

<!-- Script para abrir/cerrar el menú -->
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
    }
</script> 
</body>
</html>
