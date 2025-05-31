<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body {
  height: 100%;
  margin: 0;
  padding: 0;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background-image: url(https://fondosmil.co/fondo/17010.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  background-attachment: fixed;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  color: #333;
}

/* Header y navegación */
header {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  background-color: rgba(0, 0, 0, 0.8);
  padding: 15px 20px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
  z-index: 1000;
}

nav {
  display: flex;
  justify-content: center;
  gap: 25px;
}

nav a {
  background-color: rgba(255, 255, 255, 0.3);
  color: #fff;
  font-weight: 600;
  font-size: 16px;
  padding: 10px 22px;
  border-radius: 10px;
  text-decoration: none;
  box-shadow: 0 0 8px rgba(255, 255, 255, 0.15);
  transition: all 0.4s ease;
}

nav a:hover {
  background-color: #225388;
  box-shadow: 0 0 12px #225388;
}

/* Contenedor principal */
.container {
  background-color: rgba(255, 255, 255, 0.53);
  padding: 40px 50px;
  border-radius: 15px;
  box-shadow: 0 12px 28px rgba(0, 0, 0, 0.3);
  max-width: 450px;
  width: 90%;
  text-align: left;
  color: #222;
}

/* Formulario */
form {
  display: flex;
  flex-direction: column;
}

label {
  margin-bottom: 6px;
  font-weight: 600;
  color: #444;
  user-select: none;
}

input[type="text"],
input[type="email"],
input[type="password"],
select {
  width: 100%;
  padding: 12px 14px;
  margin-bottom: 18px;
  border: 1.8px solid #ccc;
  border-radius: 8px;
  font-size: 16px;
  transition: border-color 0.3s ease, box-shadow 0.3s ease;
  outline: none;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
select:focus {
  border-color: #007bff;
  box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
}

/* Botón submit */
input[type="submit"] {
  background-color: #007bff;
  color: white;
  font-weight: 700;
  padding: 14px;
  border: none;
  border-radius: 10px;
  cursor: pointer;
  font-size: 18px;
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
}

input[type="submit"]:hover {
  background-color: #0056b3;
  box-shadow: 0 6px 20px rgba(0, 86, 179, 0.6);
}

/* Mensajes alerta */
.alerta {
  max-width: 600px;
  margin: 20px auto;
  padding: 15px 25px;
  font-weight: 700;
  border-radius: 8px;
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
  text-align: center;
  font-size: 18px;
  display: none;
}

.alerta.success {
  background-color: #d4edda;
  color: #155724;
  border: 1.8px solid #c3e6cb;
}

.alerta.error {
  background-color: #f8d7da;
  color: #721c24;
  border: 1.8px solid #f5c6cb;
}

/* Opcional: Responsive para móviles */
@media (max-width: 480px) {
  .container {
    padding: 30px 25px;
  }

  input[type="submit"] {
    font-size: 16px;
    padding: 12px;
  }
}
  </style>
</head>
<body>
    <div class="container">
    <form method="POST" action="registrar1.php"> <!-- Cambia a tu archivo PHP -->
    <label for="nombres">Nombres:</label>
    <input type="text" name="nombres" required>

    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" required>

    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" required>

    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" required>

    <label for="rol">Rol:</label>
    <select name="rol">
        <option value="operador">Operador</option>
        <option value="admin">Admin</option>
    </select>

    <input type="submit" value="Registrar">
</div>
</form>
</body>
</html>