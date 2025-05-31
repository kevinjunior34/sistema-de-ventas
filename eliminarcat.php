<?php
include 'conexion.php';

$id = $_GET['id'] ?? 0;

if (!is_numeric($id)) {
    die("ID de categoría no válido.");
}

try {
    $stmt = $pdo->prepare("CALL sp_eliminar_cat(?)");
    $stmt->execute([$id]);
    echo "Categoría eliminada correctamente.";
} catch (PDOException $e) {
    die("Error al eliminar categoría: " . $e->getMessage());
}
?>