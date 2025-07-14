<?php
include 'login/conexion.php';
include 'encabezado.php';

// Redirigir si no se especifica un ID válido
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

$id = intval($_GET['id']);
$usuario = $conexion->query("SELECT * FROM usuarios WHERE id_usuario = $id")->fetch_assoc();

if (!$usuario) {
    echo "<div class='alert alert-danger'>Usuario no encontrado.</div>";
    exit();
}

// Al guardar cambios
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nuevoUsuario = $conexion->real_escape_string($_POST['usuario']);
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $apellido = $conexion->real_escape_string($_POST['apellido']);
    $perfil = $_POST['id_perfil'];
    $nuevaContra = $_POST['contrasenia'];

    // Verificar si el nuevo usuario ya existe en otro registro
    $verificaUsuario = $conexion->query("SELECT id_usuario FROM usuarios WHERE usuario = '$nuevoUsuario' AND id_usuario != $id");
    $verificaContra = $nuevaContra ? $conexion->query("SELECT id_usuario FROM usuarios WHERE contrasenia = '".md5($nuevaContra)."' AND id_usuario != $id") : null;

    if ($verificaUsuario->num_rows > 0) {
        $error = "El nombre de usuario ya está en uso.";
    } elseif ($nuevaContra && $verificaContra->num_rows > 0) {
        $error = "La contraseña ya está en uso por otro usuario.";
    } else {
        $sql = "UPDATE usuarios SET 
                    usuario = '$nuevoUsuario', 
                    nombre = '$nombre', 
                    primer_apellido = '$apellido',
                    id_perfil = $perfil";

        if ($nuevaContra) {
            $sql .= ", contrasenia = '".md5($nuevaContra)."'";
        }

        $sql .= " WHERE id_usuario = $id";
        $conexion->query($sql);
        header("Location: dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <script src="login/js/validaciones.js"></script>
</head>
<body>
    <div class="container py-5">
        <h3>Editar usuario</h3>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="post" onsubmit="return validarFormularioUsuario();">
            <div class="mb-3">
                <label>Usuario</label>
                <input type="text" name="usuario" id="usuario" value="<?php echo $usuario['usuario']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $usuario['nombre']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Primer Apellido</label>
                <input type="text" name="apellido" id="apellido" value="<?php echo $usuario['primer_apellido']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nueva Contraseña (dejar en blanco si no desea cambiarla)</label>
                <input type="password" name="contrasenia" id="contrasenia" class="form-control">
            </div>
            <div class="mb-3">
                <label>Perfil</label>
                <select name="id_perfil" id="perfil" class="form-select" required>
                    <option value="">Seleccione</option>
                    <option value="1" <?php if ($usuario['id_perfil'] == 1) echo "selected"; ?>>Admin</option>
                    <option value="2" <?php if ($usuario['id_perfil'] == 2) echo "selected"; ?>>RH</option>
                    <option value="3" <?php if ($usuario['id_perfil'] == 3) echo "selected"; ?>>DG</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
            <a href="dashboard.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
