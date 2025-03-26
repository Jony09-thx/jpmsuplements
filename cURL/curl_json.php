<?php
use Shopify\Clientes\Rest;
$shop_domain = 'jpmsuplements.myshopify.com'; //poner la tienda de shopify
$access_token = 'atkn_6b0eb718dc3f3f0f045e3f3a13881bb60540054cfc38217f0f073a076fd6815b'; //token de mi tienda shopify
$url = "https://$shop_domain/admin/api/2023-10/products.json"; //el json

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "X-Shopify-Access-Token: $access_token",
    'Content-Type: application/json'
]);

$response = curl_exec($ch);

if(curl_errno($ch)){
    echo json_encode(['error' => 'Error de cURL: ', curl_error($ch)], JSON_PRETTY_PRINT);
} else {
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($http_code == 200){
        //decodificar el JSON para validar que es correcto
        $products = json_decode($response, true);
        
        //Enviar el JSON  formateado como respuesta
        header('Content-Type: application/json');
        echo json_encode($products, JSON_PRETTY_PRINT);
    } else {
        echo json_encode([
            'error' => "Error en la conexion. Codigo de respuesta: $http_code",
            'response' => json_decode($response, true) 
        ], JSON_PRETTY_PRINT);
    }
}

curl_close($ch);
?>