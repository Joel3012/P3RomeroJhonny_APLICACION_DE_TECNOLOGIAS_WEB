<?php require __DIR__ . '/partials/header.php'; ?>
<div class="border-b border-gray-200 pb-8 mb-8">
    <h2 class="text-4xl font-semibold text-gray-900 sm:text-5xl text-center">Editar Enlace</h2>
</div>

<div class="w-full max-w-xl mx-auto">
    <form method="POST" action="<?= BASE_PATH ?>/links/update">
        <!-- Campo oculto para el ID -->
        <input type="hidden" name="id" value="<?= $link['id'] ?>">
        
        <div class="mb-4">
            <label class="text-sm font-semibold text-gray-900">Título</label>
            <div class="mt-2">
                <input
                    type="text"
                    name="title"
                    class="w-full outline-1 outline-gray-300 rounded-md px-3 py-2 text-gray-900"
                    value="<?= htmlspecialchars($link['title'] ?? '') ?>">
            </div>
        </div>

        <div class="mb-4">
            <label class="text-sm font-semibold text-gray-900">Url</label>
            <div class="mt-2">
                <input
                    type="text"
                    name="url"
                    class="w-full outline-1 outline-gray-300 rounded-md px-3 py-2 text-gray-900"
                    value="<?= htmlspecialchars($link['url'] ?? '') ?>">
            </div>
        </div>

        <div class="mb-4">
            <label class="text-sm font-semibold text-gray-900">Descripción</label>
            <div class="mt-2">
                <textarea
                    name="description"
                    rows="2"
                    class="w-full outline-1 outline-gray-300 rounded-md px-4 py-2 text-gray-900"><?= htmlspecialchars($link['description'] ?? '') ?></textarea>
            </div>
        </div>

        <div class="mt-4 flex gap-4">
            <button type="submit" class="flex-1 rounded-md bg-indigo-600 hover:bg-indigo-500 text-white px-3 py-2 text-center text-sm font-semibold">
                Actualizar &rarr;
            </button>
            <a href="<?= BASE_PATH ?>/links" class="flex-1 rounded-md bg-gray-300 hover:bg-gray-400 text-gray-900 px-3 py-2 text-center text-sm font-semibold">
                Cancelar
            </a>
        </div>
    </form>
    
    <!-- if errors -->
    <?php if (!empty($errors)): ?>
        <ul class="mt-4 text-red-500">
            <!-- foreach -->
            <?php foreach ($errors as $error): ?>
                <li class="text-xs">&rarr; <?= $error ?></li>
            <?php endforeach; ?>
            <!-- endforeach -->
        </ul>
        <!-- endif -->
    <?php endif; ?>
</div>
<?php require __DIR__ . '/partials/footer.php'; ?>
