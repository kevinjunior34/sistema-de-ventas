<?php
require 'conexion.php';
header('Content-Type: application/json');

try {
    $data = json_decode(file_get_contents('php://input'), true);

    $id_cliente = $data['id_cliente'] ?? null;
    $detalles = $data['detalles'] ?? null;

    if (!$id_cliente || !$detalles || !count($detalles)) {
        throw new Exception("Datos incompletos");
    }

    $pdo->beginTransaction();

    // Llamar procedimiento para insertar venta y obtener id_venta
    $stmt = $pdo->prepare("CALL sp_insertar_venta(?, @id_venta)");
    $stmt->execute([$id_cliente]);
    $stmt->closeCursor();

    // Obtener id_venta desde variable de sesión
    $idVentaResult = $pdo->query("SELECT @id_venta AS id_venta")->fetch(PDO::FETCH_ASSOC);
    $id_venta = $idVentaResult['id_venta'];

    if (!$id_venta) {
        throw new Exception("No se pudo obtener id de venta");
    }

    // Preparar llamada a insertar detalle
    $stmtDetalle = $pdo->prepare("CALL sp_insertar_detalle_venta(?, ?, ?)");

    foreach ($detalles as $item) {
        $stmtDetalle->execute([$id_venta, $item['id_producto'], $item['cantidad']]);
        $stmtDetalle->closeCursor();
    }

    $pdo->commit();

    echo json_encode(['success' => true, 'id_venta' => $id_venta]);

} catch (Exception $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    echo json_encode(['error' => $e->getMessage()]);
}
