<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'operador') {
    header('Location: menu_admin.php'); // Redirigir si no es operador
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú Operador</title>
<style>
body{
  height: 100%;
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
  background-image: url(https://fondosmil.co/fondo/17010.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  justify-content: center;
  background-position: center;
  align-items: center;
  background-attachment: fixed;
}
/* Header y navegación */
header {
  position: fixed;       /* Fija el header en la parte superior */
  top: 0;                /* Pega al top */
  left: 0;               /* Pega al borde izquierdo */
  width: 100%;           /* Que ocupe todo el ancho */
  background-color: rgb(0, 0, 0);
  padding: 15px 20px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  z-index: 1000;         /* Para que quede encima de otros elementos */
}

nav {
  display: flex;
  justify-content: center;
  gap: 25px;
}

nav a {
  display: inline-block;
  background-color:rgba(255, 255, 255, 0.46);
  color: white;
  text-decoration: none;
  font-weight: bold;
  font-size: 16px;
  padding: 10px 20px;
  border-radius: 8px;
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

nav a:hover {
  background-color:rgb(34, 81, 128);
}

h1 {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: #333;
}

form {
    display: flex;
    flex-direction: column;
    width: 100%;
    max-width: 400px; /* Ajusta el ancho según tus necesidades */
}

input {
    width: 100%;
    padding: 10px;
    margin: 10px 0; /* Espacio entre los campos */
    border: 1px solid #ccc;
    border-radius: 4px;
}

form, .cliente {
  margin-bottom: 20px;
}

input, button {
  margin: 5px;
  padding: 10px;
  font-size: 14px;
}

input {
  width: 200px;
}

  button {
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

.cliente {
  border: 1px solid #ccc;
  background-color: #ffffff62;
  padding: 10px;
  border-radius: 5px;
}

.alerta {
  max-width: 600px;
  margin: 20px auto;
  padding: 15px 20px;
  font-weight: bold;
  border-radius: 5px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  text-align: center;
  font-size: 16px;
  display: none; /* ya está en tu código */
}

.alerta.success {
  background-color: #d4edda;
  color: #155724;
  border: 1px solid #c3e6cb;
}

.alerta.error {
  background-color: #f8d7da;
  color: #721c24;
  border: 1px solid #f5c6cb;
}
.container {
  max-width: 600px;
  margin: 60px auto; /* centra horizontal y espacio arriba */
  background-color: rgba(255, 255, 255, 0.39); /* blanco translúcido */
  padding: 30px 40px;
  border-radius: 12px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
  text-align: center;
  color: #222;
  font-size: 18px;
  font-weight: 500;
}
/* Botones dentro de cada cliente */
.cliente button {
  margin: 5px 10px 0 0;
  padding: 6px 14px;
  font-size: 14px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  color: rgb(255, 255, 255);
  transition: background-color 0.3s ease;
}

.cliente button:first-of-type {
  background-color: #28a745; /* verde para editar */
}

.cliente button:first-of-type:hover {
  background-color: #218838;
}

.cliente button:last-of-type {
  background-color: #dc3545; /* rojo para eliminar */
}

.cliente button:last-of-type:hover {
  background-color: #c82333;
}

/* Clientes contenedor */
#clientes {
  max-width: 600px;
  margin: 20px auto;
  text-align: left;
}

/* Mejora en inputs del formulario */
input {
  border: 1px solid #cccccc;
  border-radius: 5px;
  outline: none;
  transition: border-color 0.3s ease;
}

input:focus {
  border-color: #007bff;
}
  </style>
</head>
<body>
<header>
    <nav>
        <a href="indexventa.html">realizar venta</a>
        <a href="logout.php">Cerrar sesión</a>
    </nav>
  </header>
</body>
</html>