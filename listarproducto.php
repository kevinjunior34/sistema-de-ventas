<?php
include 'conexion.php';

$stmt = $pdo->prepare("CALL sp_listar_producto()");
$stmt->execute();

$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($productos);
?>
