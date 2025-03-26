<?php
session_start();

try {
    $pdo = new PDO("pgsql:host=localhost;dbname=jpmsuple", "postgres", "root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT u.id_usuario, u.usuario, u.password, u.id_persona, u.rol
            FROM usuario u
            WHERE u.usuario = :usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':usuario' => $_POST['usuario']]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($_POST['password'], $usuario['password'])) {
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['usuario'] = $usuario['usuario'];
        $_SESSION['id_persona'] = $usuario['id_persona'];
        $_SESSION['rol'] = $usuario['rol'];

        if ($usuario['rol'] == 'administrador') {
            header("Location: ../../CRUD/listar.php");
            exit();
        } else if ($usuario['rol'] == 'cliente') {
            header("Location: ../../index.php");
            exit();
        }
        exit();
    } else {
        echo "Usuario o contraseña incorrectos";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>