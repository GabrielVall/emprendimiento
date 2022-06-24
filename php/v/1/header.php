<header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
   <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
      <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu">
      <i class="fas fa-bars"></i>
      </button>
      <div class="flex justify-center flex-1 lg:mr-32">
         <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
            
            
         </div>
      </div>
      <ul class="flex items-center flex-shrink-0 space-x-6">
         <li class="flex">
            <button class="rounded-md focus:outline-none focus:shadow-outline-purple" @click="toggleTheme" aria-label="Toggle color mode" >
               <template x-if="!dark"><i class="fas fa-moon"></i></template>
               <template x-if="dark"><i class="fas fa-sun"></i></template>
            </button>
         </li>
         <!-- Profile menu -->
         <li class="relative">
            <button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none" @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account" aria-haspopup="true" >
               <?php 
                  if (file_exists('../img/usuarios/'.$_SESSION['id_usuario_curso'].'.jpg')) {
                     $archivo = $_SESSION['id_usuario_curso'];
                 } else {
                     $archivo = 'default';
                 }
               ?>
            <img class="object-cover w-8 h-8 rounded-full" src="../img/usuarios/<?php echo $archivo; ?>.jpg" aria-hidden="true"/>
            </button>
            <template x-if="isProfileMenuOpen">
               <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700" aria-label="submenu">
                  <li class="flex">
                     <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#" >
                        <i class="fas fa-user"></i> &nbsp;&nbsp;
                        <span>Perfil</span>
                     </a>
                  </li>
                  <li class="flex">
                     <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="javascript:void(0);" id="cerrar_sesion"><i class="fas fa-door-open"></i> &nbsp;&nbsp;
                        <span>Cerrar</span>
                     </a>
                  </li>
               </ul>
            </template>
         </li>
      </ul>
   </div>
</header>