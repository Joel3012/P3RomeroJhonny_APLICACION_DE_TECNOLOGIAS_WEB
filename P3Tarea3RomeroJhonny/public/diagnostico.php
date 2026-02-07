<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Diagnóstico del Sistema</h1>";

echo "<h2>1. PHP está funcionando: ✅</h2>";

echo "<h2>2. Verificando archivos requeridos:</h2>";
$files = [
    'Database.php' => __DIR__ . '/../framework/Database.php',
    'Link.php' => __DIR__ . '/../app/model/Link.php',
    'web.php' => __DIR__ . '/../routes/web.php'
];

foreach ($files as $name => $path) {
    if (file_exists($path)) {
        echo "✅ $name existe<br>";
    } else {
        echo "❌ $name NO existe en: $path<br>";
    }
}

echo "<h2>3. Intentando conectar a la base de datos:</h2>";
try {
    require __DIR__ . '/../framework/Database.php';
    $db = new Database();
    echo "✅ Conexión a base de datos exitosa<br>";
    
    // Verificar tabla links
    $result = $db->query('SHOW TABLES LIKE "links"')->get();
    if (!empty($result)) {
        echo "✅ Tabla 'links' existe<br>";
        
        // Contar registros
        $count = $db->query('SELECT COUNT(*) as total FROM links')->get()[0]['total'];
        echo "✅ La tabla tiene $count registros<br>";
    } else {
        echo "❌ La tabla 'links' NO existe<br>";
    }
} catch (Exception $e) {
    echo "❌ Error de conexión: " . $e->getMessage() . "<br>";
}

echo "<h2>4. Verificando el modelo Link:</h2>";
try {
    require __DIR__ . '/../app/model/Link.php';
    $linkModel = new Link($db);
    echo "✅ Modelo Link cargado correctamente<br>";
    
    $links = $linkModel->getAll();
    echo "✅ Método getAll() funciona: " . count($links) . " enlaces encontrados<br>";
} catch (Exception $e) {
    echo "❌ Error con modelo Link: " . $e->getMessage() . "<br>";
}

echo "<h2>5. Variables del servidor:</h2>";
echo "REQUEST_URI: " . ($_SERVER['REQUEST_URI'] ?? 'NO DEFINIDO') . "<br>";
echo "SCRIPT_NAME: " . ($_SERVER['SCRIPT_NAME'] ?? 'NO DEFINIDO') . "<br>";

echo "<h2>6. Enlaces de prueba:</h2>";
echo '<a href="./">Ir a índice (./)</a><br>';
echo '<a href="/">Ir a raíz (/)</a><br>';
echo '<a href="/links">Ir a /links</a><br>';

echo "<hr>";
echo "<p><strong>Si todo está en ✅ entonces el sistema debería funcionar</strong></p>";
echo "<p><a href='index.php'>Intentar cargar index.php</a></p>";
?>
