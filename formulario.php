<?php include 'conexion/conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario CRUD</title>
    <style>
  /* Estilo general del formulario */
form {
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    font-family: 'Arial', sans-serif;
}

/* Estilo de las etiquetas */
label {
    display: block;
    margin-bottom: 8px;
    font-size: 14px;
    font-weight: bold;
    color: #333;
}

/* Estilo de los campos de entrada */
input, select, button {
    width: 100%;
    padding: 12px;
    margin-bottom: 18px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    box-sizing: border-box;
}

/* Estilo de los campos de entrada (con enfoque) */
input:focus, select:focus {
    border-color: #4CAF50;
    outline: none;
}

/* Estilo para el botón de envío */
button {
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    padding: 12px;
    transition: background-color 0.3s;
}

/* Efecto al pasar el ratón sobre el botón */
button:hover {
    background-color: #45a049;
}

/* Estilo para el input de tipo "fecha" */
input[type="date"] {
    padding: 10px;
}

/* Espaciado general entre elementos */
form > *:not(button) {
    margin-bottom: 12px;
}

/* Añadir espaciado entre el último campo y el botón */
form > *:last-child {
    margin-bottom: 0;
}

    </style>
</head>
<body>
<form action="CRUD/guardar.php" method="post">
    <!-- Campos de persona -->
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="apellido_paterno">Apellido Paterno:</label>
    <input type="text" id="apellido_paterno" name="apellido_paterno" required>

    <label for="apellido_materno">Apellido Materno:</label>
    <input type="text" id="apellido_materno" name="apellido_materno" required>

    <label for="calle">Calle:</label>
    <input type="text" id="calle" name="calle" required>

    <label for="numero_exterior">Número Exterior:</label>
    <input type="text" id="numero_exterior" name="numero_exterior">

    <label for="numero_interior">Número Interior:</label>
    <input type="text" id="numero_interior" name="numero_interior">

    <label for="colonia">Colonia:</label>
    <input type="text" id="colonia" name="colonia" required>

    <label for="codigo_postal">Código Postal:</label>
    <input type="text" id="codigo_postal" name="codigo_postal" required>

    <label for="correo">Correo:</label>
    <input type="email" id="correo" name="correo" required>

    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono" required>

    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>

    <label for="sexo">Sexo:</label>
    <select id="sexo" name="sexo" required>
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
    </select>

<label for="rol">Rol:</label>
    <select id="rol" name="rol" required>
        <option value="cliente">Cliente</option>
    </select>
    
    <!-- Campos de usuario -->
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" required>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Guardar</button>
</form>
</body>
</html>
