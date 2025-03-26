<?php
include '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM persona WHERE id_persona = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Persona eliminada correctamente.";
    } else {
        echo "Error al eliminar persona.";
    }
}
?>