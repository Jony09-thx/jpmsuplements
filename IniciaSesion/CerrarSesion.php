<?php
session_start(); // Iniciar la sesión

// Destruir la sesión
session_unset();  // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión

// Redirigir al inicio
header("Location: ../index.php");
exit(); // Detener la ejecución
?>
