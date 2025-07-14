<?php
include 'conexion.php';
session_start();

$usuario = $_POST['usuario'];
$contrasenia = $_POST['contrasenia'];

$query = "SELECT * FROM vw_usuarios_login WHERE usuario = '$usuario' AND visible = 1";
$resultado = $conexion->query($query);

if ($resultado->num_rows == 1) {
    $row = $resultado->fetch_assoc();

    if (empty($row['contrasenia'])) {
        $_SESSION['id_usuario'] = $row['id_usuario'];
        header("Location: set_password.php");
        exit();
    } else {
        if ($row['contrasenia'] === md5($contrasenia)) {
            $_SESSION['nombre_completo'] = $row['nombre_completo'];
            header("Location: ../dashboard.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Credenciales inválidas.";
            header("Location: index.php");
            exit();
        }
    }
} else {
    $_SESSION['login_error'] = "Credenciales inválidas.";
    header("Location: index.php");
    exit();
}
?>
