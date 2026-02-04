   <?php require __DIR__ . '/partials/header.php'; ?>
   <div class="border-b border-gray-200 pb-8 mb-8">
      <h2 class="text-4xl font-semibold text-gray-900 sm:text-5xl">Enlaces Organizados por Categorías</h2>

      <p class="text-lg text-gray-600 w-full max-w-4xl">
         Explora una colección de enlaces útiles organizados por categorías para facilitar tu aprendizaje y desarrollo profesional.
      </p>
   </div>

   <!-- Bucle externo: itera sobre cada categoría del arreglo bidimensional -->
   <?php foreach ($enlacesCategorizados as $categoria => $enlaces): ?>
      <div class="mb-12">
         <!-- Título de la categoría -->
         <h3 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-blue-600 pl-4">
            <?= $categoria; ?>
         </h3>

         <!-- Lista de enlaces de la categoría actual -->
         <ul class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Bucle interno: itera sobre cada enlace dentro de la categoría -->
            <?php foreach ($enlaces as $enlace): ?>
               <li class="bg-white p-5 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                  <a href="<?= $enlace['url']; ?>" target="_blank" rel="noopener noreferrer" 
                     class="text-lg font-semibold text-blue-600 hover:text-blue-800 block mb-2">
                     <?= $enlace['descripcion']; ?>
                  </a>
                  <p class="text-sm text-gray-600 break-all">
                     <?= $enlace['url']; ?>
                  </p>
               </li>
            <?php endforeach; ?>
         </ul>
      </div>
   <?php endforeach; ?>

   <div class="my-16">
      <a href="/P3Tarea2RomeroJhonny/public/links/create" class="text-sm font-semibold text-gray-900">
         Registrar &rarr;
      </a>
   </div>
   <?php require __DIR__ . '/partials/footer.php'; ?>