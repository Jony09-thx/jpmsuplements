<?php
// Configuración de la conexión
$host = "dpg-cvi5n2fnoe9s73argsng-a";
$dbname = "jpmsuple";
$user = "jpmsuple_user";
$password = "uycCOwOgmgJgwIO0BhYrt1ly2rKUjylU";
$port= "5432";

try{
    $conn = new PDO("pgsql:host=$host;dbname=$dbname; port=$port", $user, $password);
    //echo "Conexion exitosa";
}catch(PDOException $exp){
    echo "Error en la conexion";
}

?>
