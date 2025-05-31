<?php
header('Content-Type: application/json');
include 'conexion.php';

try {
    $stmt = $pdo->query("CALL sp_listar_cat()");
    $categorias = $stmt->fetchAll();
    echo json_encode($categorias);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>