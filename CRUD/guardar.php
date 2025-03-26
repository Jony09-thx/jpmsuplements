<?php
include '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
    $usuario = $_POST['usuario'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar contraseña
    $rol = $_POST['rol'];

    try {
        // Iniciar transacción para asegurar consistencia
        $conn->beginTransaction();

        // Insertar en tabla persona
        $sql_persona = "INSERT INTO persona (nombre, apellido_paterno, apellido_materno, calle, numero_exterior, numero_interior, colonia, codigo_postal, correo, telefono, fecha_nacimiento, sexo) 
                        VALUES (:nombre, :apellido_paterno, :apellido_materno, :calle, :numero_exterior, :numero_interior, :colonia, :codigo_postal, :correo, :telefono, :fecha_nacimiento, :sexo)";
        $stmt_persona = $conn->prepare($sql_persona);
        $stmt_persona->bindParam(':nombre', $nombre);
        $stmt_persona->bindParam(':apellido_paterno', $apellido_paterno);
        $stmt_persona->bindParam(':apellido_materno', $apellido_materno);
        $stmt_persona->bindParam(':calle', $calle);
        $stmt_persona->bindParam(':numero_exterior', $numero_exterior);
        $stmt_persona->bindParam(':numero_interior', $numero_interior);
        $stmt_persona->bindParam(':colonia', $colonia);
        $stmt_persona->bindParam(':codigo_postal', $codigo_postal);
        $stmt_persona->bindParam(':correo', $correo);
        $stmt_persona->bindParam(':telefono', $telefono);
        $stmt_persona->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stmt_persona->bindParam(':sexo', $sexo);
        $stmt_persona->execute();

        // Obtener el id_persona generado
        $id_persona = $conn->lastInsertId('persona_id_persona_seq');

        // Insertar en tabla usuario
        $sql_usuario = "INSERT INTO usuario (usuario, password, id_persona, rol) 
                        VALUES (:usuario, :password, :id_persona, :rol)";
        $stmt_usuario = $conn->prepare($sql_usuario);
        $stmt_usuario->bindParam(':usuario', $usuario);
        $stmt_usuario->bindParam(':password', $password);
        $stmt_usuario->bindParam(':id_persona', $id_persona);
        $stmt_usuario->bindParam(':rol', $rol);
        $stmt_usuario->execute();

        // Si es cliente, insertar en tabla cliente
        if ($rol == 'cliente') {
            $codigo_cliente = $_POST['codigo_cliente'] ?: null;
            $numero_tarjeta = $_POST['numero_tarjeta'] ?: null;

            $sql_cliente = "INSERT INTO cliente (codigo_cliente, numero_tarjeta, fecha_registro, id_persona) 
                            VALUES (:codigo_cliente, :numero_tarjeta, CURRENT_DATE, :id_persona)";
            $stmt_cliente = $conn->prepare($sql_cliente);
            $stmt_cliente->bindParam(':codigo_cliente', $codigo_cliente);
            $stmt_cliente->bindParam(':numero_tarjeta', $numero_tarjeta);
            $stmt_cliente->bindParam(':id_persona', $id_persona);
            $stmt_cliente->execute();
        }

        // Confirmar transacción
        $conn->commit();

        // Redirigir o mostrar enlace
        header("Location: ../index.php");
        exit(); //hacer que regrese a index

    } catch (PDOException $e) {
        // Revertir transacción en caso de error
        $conn->rollBack();
        echo "Error: " . $e->getMessage();
    }
}
?>