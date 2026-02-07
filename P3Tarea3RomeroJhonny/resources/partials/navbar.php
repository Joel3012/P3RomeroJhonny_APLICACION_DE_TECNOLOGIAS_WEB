<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl flex h-16 items-center justify-between px-4">
        <div class="flex items-center">
            <span class="text-white text-xl font-bold">Gestión de Enlaces</span>
        </div>
        <div class="flex gap-4">
            <a href="<?= BASE_PATH ?>/" class="<?= $_SERVER['REQUEST_URI'] === BASE_PATH . '/' || $_SERVER['REQUEST_URI'] === BASE_PATH ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium">Inicio</a>
            <a href="<?= BASE_PATH ?>/about" class="<?= strpos($_SERVER['REQUEST_URI'], '/about') !== false ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium">Acerca de</a>
            <a href="<?= BASE_PATH ?>/links" class="<?= strpos($_SERVER['REQUEST_URI'], '/links') !== false ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium">Enlaces</a>
            <a href="<?= BASE_PATH ?>/post" class="<?= strpos($_SERVER['REQUEST_URI'], '/post') !== false ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium">Blog</a>
        </div>
    </div>
</nav>