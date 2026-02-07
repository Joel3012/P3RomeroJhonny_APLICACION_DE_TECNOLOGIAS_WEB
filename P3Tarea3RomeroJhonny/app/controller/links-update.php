<?php
$title = "Actualizar Enlace";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    
    $data = [
        'title' => $_POST['title'] ?? '',
        'url' => $_POST['url'] ?? '',
        'description' => $_POST['description'] ?? ''
    ];
    
    $errors = [];
    
    // Validación del ID
    if (empty($id)) {
        $errors[] = "El ID del enlace es obligatorio.";
    }
    
    // MODELO: Validar datos usando el modelo
    $errors = array_merge($errors, $linkModel->validate($data));
    
    // MODELO: Si no hay errores, actualizar usando el modelo
    if (empty($errors)) {
        $linkModel->update($id, $data);
        header('Location: ' . BASE_PATH . '/links');
        exit;
    } else {
        // Si hay errores, obtener el enlace nuevamente usando el modelo
        $link = $linkModel->findById($id);
        require __DIR__ . '/../../resources/links-edit.template.php';
    }
} else {
    // Si no es POST, redirigir a la lista de enlaces
    header('Location: ' . BASE_PATH . '/links');
    exit;
}
