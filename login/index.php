<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Turismo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #4facfe, #00f2fe);
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
        <h3 class="text-center mb-4">Iniciar Sesión</h3>
        <form action="login.php" method="post">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" name="usuario" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="contrasenia" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
        <?php if (isset($_GET['msg']) && $_GET['msg'] == 1): ?>
    <div class="alert alert-success mt-3 text-center">Contraseña creada con éxito</div>
<?php endif; ?>

    </div>
</body>
</html>
