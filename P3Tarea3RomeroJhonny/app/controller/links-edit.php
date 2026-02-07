<?php
$title = "Editar Enlace";

// Verificar que se haya recibido un ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: ' . BASE_PATH . '/links');
    exit;
}

$id = $_GET['id'];

// MODELO: Obtener el enlace usando el modelo
$link = $linkModel->findById($id);

require __DIR__ . '/../../resources/links-edit.template.php';
