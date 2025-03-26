<?php include '../conexion/conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listar Personas</title>
    <!-- Incluye FontAwesome para íconos en los botones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Reset some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body and general background */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
            color: #333;
            padding: 20px;
        }

        /* Main title */
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #4CAF50;
        }

        /* Table container */
        .table-container {
            width: 100%;
            margin: 0 auto;
            overflow-x: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            font-size: 16px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        /* Nuevos estilos para los botones de acción */
        .action-buttons {
            display: flex;
            gap: 10px; /* Espacio entre botones */
        }

        .btn {
            text-decoration: none;
            color: #fff;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .btn i {
            margin-right: 5px; /* Espacio entre ícono y texto */
        }

        .btn-edit {
            background-color: #007bff;
        }

        .btn-edit:hover {
            background-color: #0056b3;
            transform: translateY(-2px); /* Efecto de elevación */
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-delete:hover {
            background-color: #c82333;
            transform: translateY(-2px); /* Efecto de elevación */
        }

        /* Responsive design for smaller screens */
        @media (max-width: 768px) {
            th, td {
                font-size: 14px;
                padding: 10px 12px;
            }

            table {
                border: none;
            }

            table th, table td {
                display: block;
                text-align: right;
            }

            table td {
                padding-left: 50%;
                text-align: left;
                position: relative;
            }

            table td:before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                font-weight: bold;
            }

            .action-buttons {
                flex-direction: column; /* Apila los botones en pantallas pequeñas */
                gap: 5px;
            }
        }

        /* Menú lateral (restaurado a tu versión original) */
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

        .menu-toggle i {
            margin-right: 8px;
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
    </style>
</head>
<body>
    <!-- Menú lateral (restaurado a tu versión original) -->
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

    <h1>Lista de Personas</h1>
    <div class="table-container">
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Calle</th>
                <th>Número Exterior</th>
                <th>Número Interior</th>
                <th>Colonia</th>
                <th>Código Postal</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Fecha de Nacimiento</th>
                <th>Sexo</th>
                <th>Acciones</th>
            </tr>
            <?php
            $sql = "SELECT * FROM persona";
            $stmt = $conn->query($sql);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td data-label='ID'>{$row['id_persona']}</td>
                        <td data-label='Nombre'>{$row['nombre']}</td>
                        <td data-label='Apellido Paterno'>{$row['apellido_paterno']}</td>
                        <td data-label='Apellido Materno'>{$row['apellido_materno']}</td>
                        <td data-label='Calle'>{$row['calle']}</td>
                        <td data-label='Número Exterior'>{$row['numero_exterior']}</td>
                        <td data-label='Número Interior'>{$row['numero_interior']}</td>
                        <td data-label='Colonia'>{$row['colonia']}</td>
                        <td data-label='Código Postal'>{$row['codigo_postal']}</td>
                        <td data-label='Correo'>{$row['correo']}</td>
                        <td data-label='Teléfono'>{$row['telefono']}</td>
                        <td data-label='Fecha de Nacimiento'>{$row['fecha_nacimiento']}</td>
                        <td data-label='Sexo'>{$row['sexo']}</td>
                        <td data-label='Acciones'>
                            <div class='action-buttons'>
                                <a href='editar.php?id={$row['id_persona']}' class='btn btn-edit'>
                                    <i class='fas fa-edit'></i> Editar
                                </a>
                                <a href='eliminar.php?id={$row['id_persona']}' class='btn btn-delete' 
                                   onclick='return confirm(\"¿Estás seguro de eliminar este registro?\");'>
                                    <i class='fas fa-trash'></i> Eliminar
                                </a>
                            </div>
                        </td>
                      </tr>";
            }
            ?>
        </table>
    </div>

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