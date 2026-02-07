<?php
require __DIR__ . '/../framework/Database.php';
require __DIR__ . '/../app/model/Link.php';

$db = new Database();
$linkModel = new Link($db);

// Definir la base URL del proyecto
define('BASE_PATH', '/P3Tarea3RomeroJhonny/public');

$routes = require __DIR__ . '/../routes/web.php';

// Obtener la URI y remover el directorio base
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// Remover /P3Tarea3RomeroJhonny/public de la ruta
$requestUri = str_replace('/P3Tarea3RomeroJhonny/public', '', $requestUri);
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
