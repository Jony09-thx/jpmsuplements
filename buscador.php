<?php
// Verifica si se ha enviado una búsqueda
if (isset($_GET['query'])) {
    // Conexión a la base de datos
    $host = 'localhost'; // Cambia esto por tu host
    $db = 'nombre_base_datos'; // Cambia esto por el nombre de tu base de datos
    $user = 'usuario'; // Cambia esto por tu usuario
    $pass = 'contraseña'; // Cambia esto por tu contraseña

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Obtener el término de búsqueda
        $query = htmlspecialchars($_GET['query']); // Protege contra XSS

        // SQL para buscar en la base de datos
        $sql = "SELECT * FROM productos WHERE nombre_producto LIKE :query";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['query' => "%$query%"]);

        // Mostrar los resultados
        if ($stmt->rowCount() > 0) {
            echo "<h2>Resultados de búsqueda para '$query':</h2>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='producto'>";
                echo "<h3>" . htmlspecialchars($row['nombre_producto']) . "</h3>";
                echo "<p>" . htmlspecialchars($row['descripcion']) . "</p>";
                echo "<p>Precio: $" . htmlspecialchars($row['precio']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No se encontraron productos para '$query'.</p>";
        }
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
} else {
    echo "<p>Introduce un término de búsqueda.</p>";
}
?>
