<?php
header('Content-Type: application/json');
include 'conexion.php';

$id = $_GET['id'] ?? 0;

if (!is_numeric($id)) {
    echo json_encode(["error" => "ID no válido."]);
    exit;
}

try {
    $stmt = $pdo->prepare("CALL sp_obtener_cat_por_id(?)");
    $stmt->execute([$id]);
    $categoria = $stmt->fetch();
    
    echo json_encode($categoria ?: ["error" => "Categoría no encontrada."]);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>