<?php
session_start();
// Comprobar si el usuario ya está logueado
if (isset($_SESSION['user_id'])) {
    header("Location: contactos.php");
    exit();
}

// Mensaje de error (si existe)
$error = isset($_GET['error']) ? $_GET['error'] : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Telefónica - Inicio de Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center mb-4">Agenda Telefónica</h1>
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Iniciar Sesión</h2>
                        <?php
                        if ($error) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                        ?>
                        <form action="login.php" method="post" id="loginForm">
                            <div class="mb-3">
                                <label for="username" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
    <script>
    $(document).ready(function() {
        $('#loginForm').submit(function(e) {
            var username = $('#username').val();
            var password = $('#password').val();
            
            if (username.trim() === '' || password.trim() === '') {
                e.preventDefault();
                alert('Por favor, rellena todos los campos.');
            }
        });
    });
    </script>
</body>
</html>

