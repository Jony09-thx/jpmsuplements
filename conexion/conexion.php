<?php
// Configuración de la conexión
$host = "localhost";
$dbname = "jpmsuple";
$user = "postgres";
$password = "root";
$port= "5432";

try{
    $conn = new PDO("pgsql:host=$host;dbname=$dbname; port=$port", $user, $password);
    //echo "Conexion exitosa";
}catch(PDOException $exp){
    echo "Error en la conexion";
}

?>
