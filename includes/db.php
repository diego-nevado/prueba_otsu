<?php
// Configuración de la base de datos
$config = [
    'host' => 'localhost',
    'db'   => 'agenda_telefonica',
    'user' => 'root',
    'pass' => 'root',
    'charset' => 'utf8mb4'
];

// Construir el DSN
$dsn = "mysql:host={$config['host']};dbname={$config['db']};charset={$config['charset']}";

// Opciones de PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Crear conexión PDO
    $pdo = new PDO($dsn, $config['user'], $config['pass'], $options);
} catch (\PDOException $e) {
    // Manejo de errores
    die("Error de conexión: " . $e->getMessage());
}

// Función para proteger de inyecciones sql
function sanitize($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

