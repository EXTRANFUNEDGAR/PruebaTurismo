<?php
$conexion = new mysqli("localhost", "root", "", "examen_practico");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
