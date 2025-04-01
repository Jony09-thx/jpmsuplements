<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Persona</title>
    <style>
        /* Fondo crema para la página */
        body {
            background-color: #f1e1c6; /* Color crema */
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Estilo para el encabezado */
        h1 {
            text-align: center;
            font-size: 36px;
            color: #4CAF50; /* Color verde */
            margin-bottom: 30px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: relative;
        }

        /* Sombra para el encabezado */
        h1::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 4px;
            background-color: #4CAF50;
            transform: translate(-50%, -50%);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Sombra de texto */
        h1 {
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Estilo del formulario */
        form {
            max-width: 700px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Estilo de las etiquetas */
        label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
            color: #333;
        }

        /* Estilo de los inputs y selects */
        input[type="text"], input[type="email"], input[type="date"], select {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease;
        }

        /* Estilo cuando el input está en foco */
        input[type="text"]:focus, input[type="email"]:focus, input[type="date"]:focus, select:focus {
            border-color: #4CAF50;
            outline: none;
        }

        /* Estilo del botón de submit */
        button[type="submit"] {
            width: 100%;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Estilo de separación entre campos */
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
        
        <label for="apellido_paterno">Apellido Paterno:</label>
        <input type="text" id="apellido_paterno" name="apellido_paterno" value="<?php echo $persona['apellido_paterno']; ?>" required>
        
        <label for="apellido_materno">Apellido Materno:</label>
        <input type="text" id="apellido_materno" name="apellido_materno" value="<?php echo $persona['apellido_materno']; ?>" required>
        
        <label for="calle">Calle:</label>
        <input type="text" id="calle" name="calle" value="<?php echo $persona['calle']; ?>" required>
        
        <label for="numero_exterior">Número Exterior:</label>
        <input type="text" id="numero_exterior" name="numero_exterior" value="<?php echo $persona['numero_exterior']; ?>">
        
        <label for="numero_interior">Número Interior:</label>
        <input type="text" id="numero_interior" name="numero_interior" value="<?php echo $persona['numero_interior']; ?>">
        
        <label for="colonia">Colonia:</label>
        <input type="text" id="colonia" name="colonia" value="<?php echo $persona['colonia']; ?>" required>
        
        <label for="codigo_postal">Código Postal:</label>
        <input type="text" id="codigo_postal" name="codigo_postal" value="<?php echo $persona['codigo_postal']; ?>" required>
        
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?php echo $persona['correo']; ?>" required>
        
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo $persona['telefono']; ?>" required>
        
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $persona['fecha_nacimiento']; ?>" required>
        
        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo" required>
            <option value="M" <?php echo ($persona['sexo'] == 'M') ? 'selected' : ''; ?>>Masculino</option>
            <option value="F" <?php echo ($persona['sexo'] == 'F') ? 'selected' : ''; ?>>Femenino</option>
        </select>
        
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
