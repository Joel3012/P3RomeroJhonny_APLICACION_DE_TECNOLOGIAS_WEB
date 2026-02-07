<?php
$title = "Posts";

// Arreglo asociativo que representa un artículo de blog
// Contiene: título, autor, fecha, contenido completo y etiquetas relacionadas
$post = [
    'titulo' => 'El Poder de PHP en el Desarrollo Web Moderno',
    'autor' => 'Ana García',
    'fecha' => '2026-03-15',
    'contenido' => 'PHP ha sido durante mucho tiempo un pilar del desarrollo web, y su evolución continúa siendo impresionante. En la actualidad, PHP 8.3 ofrece características modernas como tipos de unión, atributos, JIT compilation y mejoras significativas en rendimiento. Las empresas más grandes del mundo confían en PHP para sus aplicaciones críticas. Facebook, Wikipedia y WordPress son ejemplos claros de cómo PHP puede escalar a niveles masivos. Los frameworks modernos como Laravel y Symfony han revolucionado la forma en que desarrollamos aplicaciones web, proporcionando herramientas robustas para crear sistemas complejos de manera eficiente y elegante.',
    'tags' => ['PHP', 'Backend', 'Servidores', 'Desarrollo Web']
];

/**
 * Formatea la información del autor y fecha de publicación
 * 
 * @param array $postData Arreglo asociativo con los datos del post (debe contener 'autor' y 'fecha')
 * @return string Texto formateado con autor y fecha
 */
function formatear_info_autor(array $postData): string {
    return "Publicado por " . $postData['autor'] . " el " . $postData['fecha'];
}

/**
 * Genera HTML para renderizar las etiquetas del post
 * 
 * @param array $tags Arreglo indexado con las etiquetas
 * @return string Código HTML con etiquetas envueltas en elementos <span>
 */
function renderizar_tags_html(array $tags): string {
    $html = '';
    foreach ($tags as $tag) {
        $html .= "<span class='tag'>" . htmlspecialchars($tag) . "</span>";
    }
    return $html;
}

/**
 * Cuenta el número de palabras en un texto
 * 
 * @param string $texto Texto a analizar
 * @return int Número total de palabras
 */
function contar_palabras(string $texto): int {
    // Elimina espacios adicionales y cuenta las palabras
    return str_word_count($texto);
}

require __DIR__ . '/../../resources/post.template.php';
