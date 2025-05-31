<?php
include 'conexion.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("CALL sp_obtener_proveedor_por_id(?)");
$stmt->execute([$id]);

$proveedor = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($proveedor);
?>
