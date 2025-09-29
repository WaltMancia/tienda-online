<?php

require_once 'controllers/ProductosController.php';
require_once 'models/ProductosModel.php';

// Inyectamos la conexión de la base de datos a los modelos
$productosModel = new ProductosModel($pdo);

// Inyectamos los modelos a los controladores
$productosController = new ProductosController($productosModel);

// Sistema de enrutamiento básico
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

// La URL base es "/api/"
if (strpos($requestUri, '/api/productos') === 0) {
    if ($requestMethod == 'GET') {
        $productosController->listar();
    } else {
        http_response_code(405); // Método no permitido
        echo json_encode(['error' => 'Method Not Allowed']);
    }
} else {
    http_response_code(404); // Recurso no encontrado
    echo json_encode(['error' => 'Not Found']);
}
