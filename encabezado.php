<?php
session_start();
if (!isset($_SESSION['nombre_completo'])) {
    header("Location: login/index.php");
    exit();
}
?>

<!-- Bootstrap + estilos -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

<nav class="navbar navbar-expand-lg shadow">
    <div class="container-fluid">
        <span class="navbar-brand">Sistema Turismo</span>
        <div class="ms-auto">
            <span class="text-white me-3">👤 <?php echo $_SESSION['nombre_completo']; ?></span>
            <a href="login/logout.php" class="btn btn-outline-light btn-sm">Cerrar sesión</a>
        </div>
    </div>
</nav>
