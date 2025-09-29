<?php
// Reportar todos los errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//--- EXPLICACIÓN DE SEGURIDAD (OWASP Top 10) ---
// A03: Inyección (Injection). Ya usamos PDO, pero aquí, al ser un punto de entrada único,
// podemos centralizar la conexión y configuración de la base de datos, asegurando
// que todas las interacciones sean consistentes y seguras.
try {
    $dsn = 'mysql:host=db;dbname=tienda_online';
    $username = 'user';
    $password = 'password';
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Incluimos nuestro archivo de rutas
    require_once 'routes.php';
} catch (PDOException $e) {
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
    exit;
}
