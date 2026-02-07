<?php
// Verificar que sea una petición POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    
    // MODELO: Validar y eliminar usando el modelo
    if (!empty($id)) {
        $linkModel->delete($id);
    }
}

// Redirigir de vuelta a la lista de enlaces
header('Location: ' . BASE_PATH . '/links');
exit;
