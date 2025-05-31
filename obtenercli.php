<?php
// obtenercli.php

include 'conexion.php';  // o el archivo donde defines $conn

// ahora $conn debería estar definido

$sql = "CALL obtener_nombres_clientes()"; // o tu consulta/procedimiento

$result = $conn->query($sql);

$clientes = [];

if($result){
    while($row = $result->fetch_assoc()){
        $clientes[] = $row;
    }
    $result->close();
    $conn->next_result(); // Para procedimientos almacenados que pueden devolver varios resultados
}

header('Content-Type: application/json');
echo json_encode(['clientes' => $clientes]);
