<?php
require __DIR__ . '/../framework/Database.php';
$db = new Database();
$routes = require __DIR__ . '/../routes/web.php';

// Obtener la URI y remover el directorio base
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// Remover /AdminEnlacesPHP-main/public de la ruta
$requestUri = str_replace('/AdminEnlacesPHP-main/public', '', $requestUri);
// Si la ruta está vacía, usar /
if (empty($requestUri) || $requestUri === '/') {
    $requestUri = '/';
}

$route = $routes[$requestUri] ?? null;
if ($route) {
    require __DIR__ . '/../' . $route;
} else {
    http_response_code(404);
    echo "404 Not Found - Ruta solicitada: " . $requestUri;
}
