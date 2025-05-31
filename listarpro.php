<?php
include 'conexion.php';

$stmt = $pdo->prepare("CALL sp_listar_proveedores()");
$stmt->execute();

$proveedores = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($proveedores);
?>
