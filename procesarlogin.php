<?php
session_start();
include 'conexion.php'; // Asegúrate de incluir tu archivo de conexión

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Sanitizar el email
    $password = $_POST['password'];

    // Consulta para validar el usuario mediante el procedimiento almacenado
    $stmt = $pdo->prepare("CALL sp_validar_usuario(:email)");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener el resultado

    // Verificar si el usuario existe
    if (!$usuario) {
        echo "Usuario no encontrado.";
    } else {
        // Verificar la contraseña usando password_verify
        if (!password_verify($password, $usuario['contraseña'])) {
            echo "Contraseña incorrecta.";
        } else {
            // Autenticación exitosa
            $_SESSION['usuario'] = $usuario;

            // Redirigir según el rol del usuario
            if ($usuario['rol'] === 'admin') {
                header('Location: menu_admin.php'); // Página para administradores
                exit;
            } else {
                header('Location: menu_operador.php'); // Página para operadores
                exit;
            }
        }
    }
}
?>