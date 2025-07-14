<?php
include 'login/conexion.php';


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

$id = intval($_GET['id']);
$conexion->query("UPDATE usuarios SET visible = 0 WHERE id_usuario = $id");

header("Location: dashboard.php");
exit();
