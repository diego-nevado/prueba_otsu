<?php
session_start();
require_once 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Añadir nuevo contacto
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_contact'])) {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    
    $stmt = $pdo->prepare("INSERT INTO contactos (user_id, nombre, telefono, email) VALUES (?, ?, ?, ?)");
    $stmt->execute([$user_id, $nombre, $telefono, $email]);
}

// Eliminar contacto
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM contactos WHERE id = ? AND user_id = ?");
    $stmt->execute([$id, $user_id]);
}

// Obtener contactos del usuario
$stmt = $pdo->prepare("SELECT * FROM contactos WHERE user_id = ?");
$stmt->execute([$user_id]);
$contactos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Telefónica - Contactos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
        <h2>Tus Contactos</h2>
        
        <!-- Formulario para añadir contactos -->
        <form method="POST" class="mb-4">
            <div class="row">
                <div class="col">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                </div>
                <div class="col">
                    <input type="tel" name="telefono" class="form-control" placeholder="Teléfono" required>
                </div>
                <div class="col">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="col">
                    <button type="submit" name="add_contact" class="btn btn-primary">Añadir Contacto</button>
                </div>
            </div>
        </form>

        <!-- Tabla de contactos -->
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contactos as $contacto): ?>
                <tr>
                    <td><?php echo htmlspecialchars($contacto['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($contacto['telefono']); ?></td>
                    <td><?php echo htmlspecialchars($contacto['email']); ?></td>
                    <td>
                        <a href="editar_contacto.php?id=<?php echo $contacto['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="?delete=<?php echo $contacto['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este contacto?')">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>

