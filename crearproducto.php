<?php
include 'conexion.php';

$descripcion = $_POST['descripcion'] ?? '';
$precio = $_POST['precio'] ?? 0;
$stock = $_POST['stock'] ?? 0;
$id_categoria = $_POST['id_categoria'] ?? 0;
$id_proveedor = $_POST['id_proveedor'] ?? 0;

try {
    $stmt = $pdo->prepare("CALL sp_insertar_producto(?, ?, ?, ?, ?)");
    $stmt->execute([$descripcion, $precio, $stock, $id_categoria, $id_proveedor]);
    echo "Producto creado correctamente.";
} catch (PDOException $e) {
    echo "Error al crear producto: " . $e->getMessage();
}
?>
