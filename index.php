<?php
// Incluir la conexión a la base de datos
include 'conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Tienda en Línea</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Mi Tienda en Línea</h1>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="productos.php">Productos</a>
            <a href="carrito.php">Carrito (<?php echo 0; // Aquí puedes mostrar el número de items ?>)</a>
            <a href="pedidos.php">Pedidos</a>
            <a href="perfil.php">Perfil</a>
        </nav>
    </header>

    <main>
        <h2>Bienvenido a Mi Tienda en Línea</h2>
        <p>Aquí encontrarás los mejores productos al mejor precio.</p>

        <!-- Mostrar productos desde la base de datos -->
        <div id="product-container">
            <?php
            $result = $conn->query("SELECT * FROM products");
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='product-item'>";
                    echo "<h2>" . $row['name'] . "</h2>";
                    echo "<p>" . $row['description'] . "</p>";
                    echo "<p>Precio: $" . $row['price'] . "</p>";
                    echo "<button onclick=\"addToCart(" . $row['id'] . ", 1, " . $row['price'] . ")\">Agregar al Carrito</button>";
                    echo "</div>";
                }
            } else {
                echo "No hay productos disponibles.";
            }
            ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Mi Tienda en Línea. Todos los derechos reservados.</p>
    </footer>

    <script src="app.js"></script>
</body>
</html>
