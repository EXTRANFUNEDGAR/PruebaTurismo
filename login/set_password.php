<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
    exit();
}

include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nueva = md5($_POST['nueva_contrasenia']);
    $id = $_SESSION['id_usuario'];
    $conexion->query("UPDATE usuarios SET contrasenia = '$nueva' WHERE id_usuario = $id");
    session_destroy();
    header("Location: index.php?msg=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Establecer Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f7971e, #ffd200);
            height: 100vh;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 8px 24px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center">
    <div class="card p-5" style="width: 100%; max-width: 400px;">
        <h3 class="text-center mb-4">Crear Contraseña</h3>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Nueva contraseña</label>
                <input type="password" name="nueva_contrasenia" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-warning w-100">Guardar</button>
        </form>
    </div>
</body>
</html>
