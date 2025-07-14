<?php
include 'login/conexion.php';
include 'encabezado.php'; 

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

$id = intval($_GET['id']);
$query = $conexion->query("SELECT * FROM vw_usuarios_login WHERE id_usuario = $id");
$usuario = $query->fetch_assoc();

if (!$usuario) {
    echo "<div class='alert alert-danger'>Usuario no encontrado.</div>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Usuario</title>
    <style>
        .card {
            border-radius: 1rem;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h3 class="mb-4">Detalle de Usuario</h3>
        <div class="card p-4">
            <h4 class="card-title"><?php echo htmlspecialchars($usuario['nombre_completo']); ?></h4>
            <p><strong>Usuario:</strong> <?php echo htmlspecialchars($usuario['usuario']); ?></p>
            <p><strong>Perfil:</strong> <?php echo htmlspecialchars($usuario['dsc_perfil']); ?></p>
            <p><strong>Visible:</strong> <?php echo $usuario['visible'] ? 'Sí' : 'No'; ?></p>
            <a href="dashboard.php" class="btn btn-secondary mt-3">Volver</a>
        </div>
    </div>
</body>
</html>
