<?php
session_start();
session_unset();
session_destroy();
header('Location: login.html'); // Redirigir al inicio
exit;
?>