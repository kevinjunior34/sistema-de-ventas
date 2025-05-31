<?php
include 'conexion.php';

try {
    $stmt = $pdo->query("CALL sp_listar_todos_detalle_ventas()");
    $detalles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($detalles);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
