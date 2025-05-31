<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los datos del formulario
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashear la contraseña
    $telefono = $_POST['telefono'];
    $rol = $_POST['rol'];

    // Insertar el nuevo usuario usando el procedimiento almacenado
    $stmt = $pdo->prepare("CALL sp_insertar_usuario(:nombres, :apellidos, :email, :password, :telefono, :rol)");
    $stmt->bindParam(':nombres', $nombres);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password); // Aquí pasamos la contraseña hasheada
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':rol', $rol);

    // Ejecutar la consulta y manejar errores
    if ($stmt->execute()) {
        echo "Usuario registrado exitosamente.";
    } else {
        // Muestra el error
        $errorInfo = $stmt->errorInfo();
        echo "Error al registrar el usuario: " . $errorInfo[2]; // Muestra el mensaje de error
    }
}
?>