<?php
include 'conexion.php';

$data = json_decode(file_get_contents('php://input'), true);

$cart_id = 1; // Aquí se puede obtener el cart_id del usuario logueado
$product_id = $data['product_id'];
$quantity = $data['quantity'];
$price = $data['price'];

$sql = "INSERT INTO cart_items (cart_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiid", $cart_id, $product_id, $quantity, $price);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>
