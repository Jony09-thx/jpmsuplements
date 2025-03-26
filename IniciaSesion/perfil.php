<?php
session_start(); // Iniciar sesión

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario']) || !$_SESSION['usuario']) {
    header("Location: InicioSesion.html"); // Redirigir si no está logueado
    exit();
}

// Obtener datos del usuario
$usuario = $_SESSION['usuario'] ?? 'Desconocido';
$correo = $_SESSION['correo'] ?? 'No disponible';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f4f4f9;
            text-align: center;
            color: #333;
            padding: 20px;
        }

        header {
            background: #004080;
            color: white;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .user-info {
            margin-bottom: 20px;
        }

        .profile-pic {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid #004080;
            margin-top: 10px;
        }

        .pokemon-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .pokemon {
            cursor: pointer;
            border: 2px solid transparent;
            padding: 5px;
            transition: 0.3s;
            width: 80px;
            height: 80px;
            border-radius: 10px;
            background: white;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .pokemon:hover {
            border-color: #004080;
            transform: scale(1.1);
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

        .sidebar.active {
            left: 0;
        }

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
    </style>
</head>
<body>

<header>Perfil de Usuario</header>

<button class="menu-toggle" onclick="toggleSidebar()">
    <i class="fas fa-bars"></i> Menú
</button>

<div class="sidebar" id="sidebar">
    <ul>
        <li><a href="../index.php"><i class="fas fa-home"></i> Inicio</a></li>
        <li><a href="#"><i class="fas fa-dumbbell"></i> Productos</a></li>
        <li><a href="#"><i class="fas fa-envelope"></i> Contacto</a></li>
        <li><a href="#"><i class="fas fa-info-circle"></i> Acerca de</a></li>
    </ul>
</div>

<div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

<div class="container">
    <div class="user-info">
        <h2>Bienvenido, <?php echo htmlspecialchars($usuario); ?></h2>
        <p><strong>Correo:</strong> <?php echo htmlspecialchars($correo); ?></p>
    </div>

    <h3>Elige tu Pokémon como foto de perfil</h3>
    <div class="pokemon-container" id="pokemon-container"></div>

    <h3>Tu Foto de Perfil:</h3>
    <img id="profile-pic" class="profile-pic" src="https://via.placeholder.com/100" alt="Foto de Perfil">
</div>

<script>
    const pokemonContainer = document.getElementById("pokemon-container");
    const profilePic = document.getElementById("profile-pic");

    // Cargar imagen guardada al recargar la página
    document.addEventListener("DOMContentLoaded", () => {
        const savedPic = localStorage.getItem("profilePic");
        if (savedPic) {
            profilePic.src = savedPic;
        }
    });

    async function getPokemons(limit = 24) {
        for (let i = 1; i <= limit; i++) {
            let imgUrl = `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${i}.png`;

            let img = document.createElement("img");
            img.src = imgUrl;
            img.classList.add("pokemon");
            img.onclick = () => {
                profilePic.src = imgUrl; // Cambia la imagen de perfil
                localStorage.setItem("profilePic", imgUrl); // Guarda en localStorage
            };

            pokemonContainer.appendChild(img);
        }
    }

    getPokemons();

    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
    }
</script>

<script src="https://kit.fontawesome.com/ceb1921ab7.js" crossorigin="anonymous"></script>

</body>
</html>
