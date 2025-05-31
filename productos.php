<?php
require 'conexion.php'; // archivo que crea la conexión $pdo

header('Content-Type: application/json');

try {
    $stmt = $pdo->prepare("CALL sp_listar_productos()");
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($productos);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
