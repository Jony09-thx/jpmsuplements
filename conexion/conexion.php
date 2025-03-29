<?php
// Configuración de la conexión
$host = "dpg-cvjr6uk9c44c73cbt25g-a";
$dbname = "jpmsuple2";
$user = "jpmsuple2";
$password = "95tOJxSX9QTIuxnyg7dkBSeFTVvj9xGO";
$port= "5432";

try{
    $conn = new PDO("pgsql:host=$host;dbname=$dbname; port=$port", $user, $password);
    //echo "Conexion exitosa";
}catch(PDOException $exp){
    echo "Error en la conexion";
}

?>
