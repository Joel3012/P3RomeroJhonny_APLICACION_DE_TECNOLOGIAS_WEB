   <?php
   require __DIR__ . '/partials/header.php';
   ?>
   
   <!-- Contenedor principal del artículo -->
   <article class="max-w-4xl mx-auto">
      <!-- Encabezado del artículo -->
      <div class="border-b border-gray-200 pb-8 mb-8">
         <!-- Título del post -->
         <h1 class="text-4xl font-bold text-gray-900 sm:text-5xl mb-4">
            <?= htmlspecialchars($post['titulo']) ?>
         </h1>

         <!-- Información del autor (usando función formatear_info_autor) -->
         <p class="text-lg text-gray-600 italic mb-2">
            <?= formatear_info_autor($post) ?>
         </p>

         <!-- Metadatos: Contador de palabras -->
         <p class="text-sm text-gray-500">
            📖 Número de palabras: <strong><?= contar_palabras($post['contenido']) ?></strong>
         </p>
      </div>

      <!-- Contenido principal del artículo -->
      <div class="mb-8">
         <p class="text-lg text-gray-700 leading-relaxed">
            <?= nl2br(htmlspecialchars($post['contenido'])) ?>
         </p>
      </div>

      <!-- Sección de etiquetas -->
      <div class="border-t border-gray-200 pt-6 mt-8">
         <h3 class="text-sm font-semibold text-gray-900 mb-3">Etiquetas:</h3>
         <div class="flex flex-wrap gap-2">
            <!-- Renderizado de etiquetas usando función renderizar_tags_html -->
            <?= renderizar_tags_html($post['tags']) ?>
         </div>
      </div>

      <!-- Botón para regresar -->
      <div class="mt-12">
         <a href="/P3Tarea2RomeroJhonny/public/" 
            class="inline-flex items-center text-sm font-semibold text-blue-600 hover:text-blue-800">
            ← Volver al inicio
         </a>
      </div>
   </article>

   <?php
   require __DIR__ . '/partials/footer.php';
   ?>