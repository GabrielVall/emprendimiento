<?php
SESSION_START();
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="es">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Cursos</title>
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
      <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
      <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
      <script src="./assets/js/init-alpine.js"></script>
      <script src="../js/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>
      <link href="../css/slimselect.min.css" rel="stylesheet"></link>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
      <link rel="stylesheet" href="../assets/css/tailwind.output.css?v=1.0" />
      <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer ></script>
      <script src="../assets/js/init-alpine.js"></script>

   </head>
   <body>
      <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }"> 
      <?php 
         if (isset($_SESSION['id_usuario_curso'])){ 
             if($_SESSION['privilegio'] == 1){
                include_once('../php/v/1/menu.php');
             }else if($_SESSION['privilegio'] == 2){
                include_once('../php/v/2/menu.php');
             }
         } ?>
         <div class="flex flex-col flex-1 w-full">
         <?php  if (isset($_SESSION['id_usuario_curso'])){
                    if($_SESSION['privilegio'] == 1){
                        include_once('../php/v/1/header.php');
                    }else if($_SESSION['privilegio'] == 2){
                        include_once('../php/v/2/header.php');
                    }
                } ?>
            <main id="contenedor_main" class="h-full overflow-y-auto">
               <div class="loader" style="  position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);">
                  <h2 style="font-size:6em; text-align:center;">
                     <i class="fas fa-circle-notch fa-spin" style="color:#464646;"></i>
                  </h2>
               </div>
            </main>
         </div>
      </div>
   </body>
   <?php 
      if (isset($_SESSION['id_usuario_curso'])){ 
         if($_SESSION['privilegio'] == 1){ ?>
         <script src="../js/fnc-adm.js?v=4.9">var invitados = [];</script>
      <?php }
      if($_SESSION['privilegio'] == 2){ ?>
         <script src="../js/fnc-usuario.js?v1"></script>
       <?php }
      }else{ ?>
         <script src="../js/vista.js?"></script>
      <?php }
   ?>
</html>