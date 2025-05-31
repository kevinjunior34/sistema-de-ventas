<?php
include 'conexion.php'; // aquí tienes la conexión PDO $pdo configurada

try {
    // Preparar y ejecutar el procedimiento almacenado
    $stmt = $pdo->prepare("CALL sp_listar_ventas()");
    $stmt->execute();

    // Obtener todas las filas como array asociativo
    $ventas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Devolver los datos en formato JSON
    echo json_encode($ventas);

} catch (PDOException $e) {
    // En caso de error, enviar mensaje en JSON
    echo json_encode(["error" => $e->getMessage()]);
}
?>
