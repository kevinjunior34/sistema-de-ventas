<?php
include 'conexion.php';
header('Content-Type: application/json');

$id = $_GET['id'] ?? 0;

if (!is_numeric($id) || $id <= 0) {
    echo json_encode(['error' => 'ID no válido.']);
    exit;
}

$stmt = $pdo->prepare("CALL sp_obtener_id_cliente(?)");
$stmt->execute([$id]);
$cliente = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($cliente ?: ['error' => 'Cliente no encontrado.']);
?>