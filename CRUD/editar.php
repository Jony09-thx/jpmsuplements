<?php
include '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM persona WHERE id_persona = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $persona = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_persona'];
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $calle = $_POST['calle'];
    $numero_exterior = $_POST['numero_exterior'];
    $numero_interior = $_POST['numero_interior'];
    $colonia = $_POST['colonia'];
    $codigo_postal = $_POST['codigo_postal'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $sexo = $_POST['sexo'];

    $sql = "UPDATE persona SET nombre = :nombre, apellido_paterno = :apellido_paterno, apellido_materno = :apellido_materno, calle = :calle, numero_exterior = :numero_exterior, numero_interior = :numero_interior, colonia = :colonia, codigo_postal = :codigo_postal, correo = :correo, telefono = :telefono, fecha_nacimiento = :fecha_nacimiento, sexo = :sexo WHERE id_persona = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido_paterno', $apellido_paterno);
    $stmt->bindParam(':apellido_materno', $apellido_materno);
    $stmt->bindParam(':calle', $calle);
    $stmt->bindParam(':numero_exterior', $numero_exterior);
    $stmt->bindParam(':numero_interior', $numero_interior);
    $stmt->bindParam(':colonia', $colonia);
    $stmt->bindParam(':codigo_postal', $codigo_postal);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
    $stmt->bindParam(':sexo', $sexo);

    if ($stmt->execute()) {
                // Redirigir automáticamente a otro_archivo.php después de un éxito
                header("Location: listar.php"); 
                exit();  // Terminar la ejecución después de la redirección
    } else {
        echo "Error al actualizar persona.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Persona</title>
    <style>
        /* Estilo básico del formulario */
form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    font-family: 'Arial', sans-serif;
}

/* Espaciado entre campos */
label {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 5px;
    display: block;
}

/* Estilo de los inputs y selects */
input[type="text"], input[type="email"], input[type="date"], select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
}

/* Cambio de color al enfocar los inputs */
input[type="text"]:focus, input[type="email"]:focus, input[type="date"]:focus, select:focus {
    border-color: #4CAF50;
    outline: none;
}

/* Estilo del botón */
button[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

/* Agregar un borde sutil a los inputs */
input[type="text"], input[type="email"], input[type="date"], select {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
}

/* Espaciado entre las filas de inputs */
form br {
    margin-bottom: 20px;
}

    </style>
</head>
<body>
    <h1>Editar Persona</h1>
    <form action="editar.php" method="post">
        <input type="hidden" name="id_persona" value="<?php echo $persona['id_persona']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $persona['nombre']; ?>" required>
        <br>
        <label for="apellido_paterno">Apellido Paterno:</label>
        <input type="text" id="apellido_paterno" name="apellido_paterno" value="<?php echo $persona['apellido_paterno']; ?>" required>
        <br>
        <label for="apellido_materno">Apellido Materno:</label>
        <input type="text" id="apellido_materno" name="apellido_materno" value="<?php echo $persona['apellido_materno']; ?>" required>
        <br>
        <label for="calle">Calle:</label>
        <input type="text" id="calle" name="calle" value="<?php echo $persona['calle']; ?>" required>
        <br>
        <label for="numero_exterior">Número Exterior:</label>
        <input type="text" id="numero_exterior" name="numero_exterior" value="<?php echo $persona['numero_exterior']; ?>">
        <br>
        <label for="numero_interior">Número Interior:</label>
        <input type="text" id="numero_interior" name="numero_interior" value="<?php echo $persona['numero_interior']; ?>">
        <br>
        <label for="colonia">Colonia:</label>
        <input type="text" id="colonia" name="colonia" value="<?php echo $persona['colonia']; ?>" required>
        <br>
        <label for="codigo_postal">Código Postal:</label>
        <input type="text" id="codigo_postal" name="codigo_postal" value="<?php echo $persona['codigo_postal']; ?>" required>
        <br>
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?php echo $persona['correo']; ?>" required>
        <br>
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo $persona['telefono']; ?>" required>
        <br>
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $persona['fecha_nacimiento']; ?>" required>
        <br>
        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo" required>
            <option value="M" <?php echo ($persona['sexo'] == 'M') ? 'selected' : ''; ?>>Masculino</option>
            <option value="F" <?php echo ($persona['sexo'] == 'F') ? 'selected' : ''; ?>>Femenino</option>
        </select>
        <br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>