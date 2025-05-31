<?php
include 'conexion.php';

$descripcion = $_POST['descripcion'] ?? '';

if (empty($descripcion)) {
    die(json_encode(['error' => 'La descripción no puede estar vacía.']));
}

try {
    $stmt = $pdo->prepare("CALL sp_insertar_cat(?)");
    $stmt->execute([$descripcion]);
    echo "Categoría creada correctamente.";
} catch (PDOException $e) {
    die("Error al crear categoría: " . $e->getMessage());
}
?>