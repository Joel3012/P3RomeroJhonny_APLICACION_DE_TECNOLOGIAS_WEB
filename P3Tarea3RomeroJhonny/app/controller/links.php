<?php
$title = "Proyectos";

// MODELO: Obtener enlaces desde la base de datos usando el modelo Link
$links = $linkModel->getAll();

// Agrupar enlaces por categorías (si tienes una columna category, ajusta esto)
// Por ahora, todos los enlaces estarán en una sola categoría
$enlacesCategorizados = [
    "Enlaces Guardados" => array_map(function($link) {
        return [
            'id' => $link['id'],
            'url' => $link['url'],
            'descripcion' => $link['title'] . ' - ' . ($link['description'] ?? ''),
            'title' => $link['title']
        ];
    }, $links)
];

// Si la base de datos está vacía, mostrar enlaces de ejemplo
if (empty($links)) {
    $enlacesCategorizados = [
        "Herramientas de Desarrollo" => [
            [
                "url" => "https://git-scm.com/",
                "descripcion" => "Sistema de control de versiones distribuido."
            ],
            [
                "url" => "https://code.visualstudio.com/",
                "descripcion" => "Editor de código fuente ligero pero potente."
            ],
            [
                "url" => "https://www.docker.com/",
                "descripcion" => "Plataforma para desarrollar, enviar y ejecutar aplicaciones en contenedores."
            ]
        ],
        "Recursos Educativos" => [
            [
                "url" => "https://www.php.net/manual/es/",
                "descripcion" => "Manual oficial de PHP en español."
            ],
            [
                "url" => "https://developer.mozilla.org/es/docs/Web",
                "descripcion" => "Recursos para desarrolladores web, por desarrolladores."
            ],
            [
                "url" => "https://www.w3schools.com/",
                "descripcion" => "Tutoriales de programación web para principiantes."
            ]
        ],
        "Frameworks PHP" => [
            [
                "url" => "https://laravel.com/",
                "descripcion" => "Un framework de aplicaciones web con una sintaxis expresiva y elegante."
            ],
            [
                "url" => "https://symfony.com/",
                "descripcion" => "Un conjunto de componentes PHP reutilizables."
            ],
            [
                "url" => "https://www.codeigniter.com/",
                "descripcion" => "Framework PHP pequeño y elegante con gran rendimiento."
            ]
        ]
    ];
}

require __DIR__ . '/../../resources/links.template.php';
