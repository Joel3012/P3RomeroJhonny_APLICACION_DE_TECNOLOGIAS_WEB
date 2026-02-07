<?php
$title = "Registrar Proyecto";
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'title' => $_POST['title'] ?? '',
        'url' => $_POST['url'] ?? '',
        'description' => $_POST['description'] ?? ''
    ];
    
    // MODELO: Validar datos usando el modelo
    $errors = $linkModel->validate($data);
    
    // MODELO: Si no hay errores, crear el enlace usando el modelo
    if (empty($errors)) {
        $linkModel->create($data);
        header('Location: ' . BASE_PATH . '/links');
        exit;
    }
}

require __DIR__ . '/../../resources/links-create.template.php';
