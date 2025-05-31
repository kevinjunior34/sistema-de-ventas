<?php
require 'conexion.php'; // Aquí debe definirse $pdo con PDO y conexión a la BD

try {
    $stmt = $pdo->query("CALL sp_obtener_clientes()");
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($clientes);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
