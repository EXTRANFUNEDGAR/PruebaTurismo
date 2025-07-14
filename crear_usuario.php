<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'login/conexion.php';
include 'encabezado.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $conexion->real_escape_string($_POST['usuario']);
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $apellido = $conexion->real_escape_string($_POST['apellido']);
    $perfil = $_POST['id_perfil'];
    $contrasenia = md5($_POST['contrasenia']);

    // Validar usuario único y contraseña única
    $validarUsuario = $conexion->query("SELECT id_usuario FROM usuarios WHERE usuario = '$usuario'");
    $validarContra = $conexion->query("SELECT id_usuario FROM usuarios WHERE contrasenia = '$contrasenia'");

    if ($validarUsuario->num_rows > 0) {
        $error = "El nombre de usuario ya existe.";
    } elseif ($validarContra->num_rows > 0) {
        $error = "La contraseña ya está en uso por otro usuario.";
    } else {
        $conexion->query("INSERT INTO usuarios (id_perfil, usuario, nombre, primer_apellido, contrasenia, visible)
                          VALUES ('$perfil', '$usuario', '$nombre', '$apellido', '$contrasenia', 1)");
        header("Location: dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Usuario</title>
    <script src="login/js/validaciones.js"></script>
</head>
<body>
    <div class="container py-5">
        <h3>Crear nuevo usuario</h3>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="post" onsubmit="return validarFormularioUsuario();">
            <div class="mb-3">
                <label>Usuario</label>
                <input type="text" name="usuario" id="usuario" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Primer Apellido</label>
                <input type="text" name="apellido" id="apellido" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Contraseña</label>
                <input type="password" name="contrasenia" id="contrasenia" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Perfil</label>
                <select name="id_perfil" id="perfil" class="form-select" required>
                    <option value="">Seleccione</option>
                    <option value="1">Admin</option>
                    <option value="2">RH</option>
                    <option value="3">DG</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="dashboard.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
