<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Bienvenido</title>
<style>
/* Reset y estilo básico */
body{
  height: 100vh;
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
  background-image: url(https://fondosmil.co/fondo/17010.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  justify-content: center;
  background-position: center;
  align-items: center;
}

/* Header y navegación */
header {
  background-color:rgb(0, 0, 0);
  padding: 15px 20px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
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


/* Main content */
main {
  padding: 40px 20px;
  text-align: center;
  color: #333;
}

main h1 {
  margin-bottom: 15px;
  font-weight: 700;
}

main p {
  font-size: 18px;
  color: #555;
}
h1{
  font-family: Arial, sans-serif;
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

</style>
</head>
<body>
<header>
  <nav>
    <a href="index.html">clientes</a>
    <a href="indexpro.html">Proveedores</a>
    <a href="indexproducto.html">producto</a>
    <a href="indextcat.html">Categorías</a>
    <a href="logout.php">Cerrar sesión</a>
  </nav>
</header>
<div class="container">
<main>
  <h1>Panel de control</h1>
  <p>Selecciona una opción del menú para comenzar.</p>
</main>
</div>
</body>
</html>
