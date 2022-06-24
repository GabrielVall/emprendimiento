<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#"> Academia</a>
        <ul class="mt-6">
            <li class="relative px-6 py-3 nav-item contenido">
                <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="#">
                <i class="fas fa-home"></i>
                    <span class="ml-4">Inicio</span>
                </a>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-3 nav-item alumnos">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="#alumnos=1">
                    <i class="fas fa-users"></i>
                    <span class="ml-4">Alumnos</span>
                </a>
            </li>
            <li class="relative px-6 py-3 nav-item proyectos">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="#proyectos=1">
                    <i class="fas fa-book-open"></i>
                    <span class="ml-4">Proyectos</span>
                </a>
            </li>
            <li class="relative px-6 py-3 nav-item categorias">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="#categorias=1">
                    <i class="fas fa-clipboard-list"></i>
                    <span class="ml-4">Categorías de cursos</span>
                </a>
            </li>
            <li class="relative px-6 py-3 nav-item cursos">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="#cursos=1">
                    <i class="fas fa-paste"></i>
                    <span class="ml-4">Cursos</span>
                </a>
            </li>
            <li class="relative px-6 py-3 nav-item unidades">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="#unidades=1">
                    <i class="fas fa-folder-open"></i>
                    <span class="ml-4">Unidades</span>
                </a>
            </li>
            <li class="relative px-6 py-3 nav-item examenes">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="#examenes=1">
                    <i class="far fa-file"></i>
                    <span class="ml-4">Examenes</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>

<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">

    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#"> Inicio</a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="#">
                <i class="fas fa-home"></i>
                    <span class="ml-4">Inicio</span>
                </a>
            </li>
        </ul>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="#alumnos=1">
                    <i class="fas fa-users"></i>
                    <span class="ml-4">Alumnos</span>
                </a>
            </li>
        </ul>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="#proyectos=1">
                    <i class="fas fa-book-open"></i>
                    <span class="ml-4">Proyectos</span>
                </a>
            </li>
        </ul>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="#categorias=1">
                    <i class="fas fa-clipboard-list"></i>
                    <span class="ml-4">Categorías de cursos</span>
                </a>
            </li>
        </ul>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="#cursos=1">
                    <i class="fas fa-paste"></i>
                    <span class="ml-4">Cursos</span>
                </a>
            </li>
        </ul>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="#unidades=1">
                    <i class="fas fa-folder-open"></i>
                    <span class="ml-4">Unidades</span>
                </a>
            </li>
        </ul>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="#examenes=1">
                    <i class="far fa-file"></i>
                    <span class="ml-4">Examenes</span>
                </a>
            </li>
        </ul>
        <div class="px-6 my-6">
            <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transpa rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Invitar a un amigo
            <span class="ml-2" aria-hidden="true">+</span>
            </button>
        </div>
    </div>
</aside>