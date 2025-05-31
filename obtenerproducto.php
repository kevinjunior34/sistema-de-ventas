<?php
include 'conexion.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("CALL sp_obtener_producto_por_id(?)");
$stmt->execute([$id]);

$producto = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($producto);
?>
