<?php
session_start();
if (!isset($_SESSION['nombre_completo'])) {
    header("Location: index.php");
    exit();
}
include 'login/conexion.php';

$resultado = $conexion->query("SELECT * FROM vw_usuarios_login WHERE visible = 1
");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #0d6efd;
        }
        .navbar-brand, .nav-link, .text-white {
            color: white !important;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg shadow">
    <div class="container-fluid">
        <span class="navbar-brand">Sistema Turismo</span>
        <div class="ms-auto">
            <span class="text-white me-3">👤 <?php echo $_SESSION['nombre_completo']; ?></span>
            <a href="login/logout.php" class="btn btn-outline-light btn-sm">Cerrar sesión</a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Listado de Usuarios</h3>
        <a href="crear_usuario.php" class="btn btn-success">➕ Nuevo Usuario</a>
    </div>

    <div class="table-responsive">
        <table id="tablaUsuarios" class="table table-striped table-bordered align-middle">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Nombre completo</th>
                    <th>Usuario</th>
                    <th>Perfil</th>
                    <th>Visible</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; while ($row = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo htmlspecialchars($row['nombre_completo']); ?></td>
                    <td><?php echo htmlspecialchars($row['usuario']); ?></td>
                    <td><?php echo htmlspecialchars($row['dsc_perfil']); ?></td>
                    <td>
                        <?php echo $row['visible'] ? '<span class="badge bg-success">Sí</span>' : '<span class="badge bg-danger">No</span>'; ?>
                    </td>
                    <td>
                        <a href="editar_usuario.php?id=<?php echo $row['id_usuario']; ?>" class="btn btn-sm btn-warning">✏️</a>
                        <a href="detalle_usuario.php?id=<?php echo $row['id_usuario']; ?>" class="btn btn-sm btn-info">ℹ️</a>
                        <a href="eliminar_usuario.php?id=<?php echo $row['id_usuario']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">🗑️</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#tablaUsuarios').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            }
        });
    });
</script>

</body>
</html>
