<?php
include 'conexion.php';

$id = $_POST['id_categoria'] ?? 0;
$descripcion = $_POST['descripcion'] ?? '';

// Corregir la sintaxis del if
if (empty($descripcion)) {
    die("La descripción no puede estar vacía.");
}

try {
    $stmt = $pdo->prepare("CALL sp_actualizar_cat(?, ?)");
    $stmt->execute([$id, $descripcion]);
    echo "Categoría actualizada correctamente.";
} catch (PDOException $e) {
    die("Error al actualizar categoría: " . $e->getMessage());
}
?>