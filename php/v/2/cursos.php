<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$row_cursos = $sql->obtenerDatos("CALL sp_select_cursos('".$_SESSION['id_usuario_curso']."')");
$total_cursos = count($row_cursos);
function select_campo_img($ruta,$id){
	// Cantidad de carpetas a salir, depende de donde este ubicado el archivo actual
	$ruta_full = '../../'.$ruta.$id;
	
	if(is_dir($ruta_full)){
		if(count(scandir($ruta_full)) > 2){
			$primer_archivo = scandir($ruta_full)[2];
			return $ruta.$id.'/'.$primer_archivo;
		}else{
			// Solo aparece cuando existe carpeta pero no la imagen
			return 'https://miracomosehace.com/wp-content/uploads/2020/06/error-web.jpg';
		}
	}else{
		// Solo aparece si no existe la carpeta, muestra la imagen por defecto de la carpeta
		return $ruta.'default.png';
	}
}
?>
<div class="container px-6 mx-auto grid">
   <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Cursos
   </h2>
   <!-- CTA -->
   <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" href="javascript:void(0)">
      <div class="flex items-center">
         <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
         </svg>
         <span>Tus cursos terminados apareceran con este simbolo</span>
      </div>
      <span>Filtrar →</span>
   </a>
   <!-- Responsive cards -->
   <!-- <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
      Categorias
   </h4>
   <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
         <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
               <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
            </svg>
         </div>
         <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
               Negocios
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
               22
            </p>
         </div>
      </div>
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
         <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
               <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
            </svg>
         </div>
         <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
               Programacion
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
               12
            </p>
         </div>
      </div>
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
         <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
               <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
            </svg>
         </div>
         <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
               Documentacion
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
               376
            </p>
         </div>
      </div>
   </div> -->
   <!-- Cards with title -->
   <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
      Cursos
   </h4>


   <div class="grid gap-6 mb-8 md:grid-cols-2">



    <?php 
      foreach ($row_cursos as $key => $curso) {
         $class = '';
         $ico = '';
         if($curso['completado'] == 1){ 
            $class = 'completado'; 
            $ico = '<svg class="mr-2 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>'; 
         }
            ?>
       <div class="<?php echo $class ?> rounded overflow-hidden shadow-lg bg-white rounded-lg shadow-xs dark:bg-gray-800" id="ref_curso" data-id="<?php echo $curso['id_curso'] ?>">
         <img class="w-full" style="height: 300px; object-fit:cover;" src="<?php echo select_campo_img('../img/cursos/',$curso['id_curso']) ?>" >
         <div class="px-6 py-4">
            <div class="font-bold mb-2 text-lg font-semibold text-gray-700 dark:text-gray-200" style="display: flex; justify-content:center; align-items:center;">
               <?php echo $ico; ?>
               <?php echo $curso['nombre_curso'] ?>
         </div>
            <p class="titulo_curso mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
               <?php echo $curso['descripcion_curso'] ?>
            </p>
         </div>
         <div class="px-6 pt-4 pb-2 ">
           <?php 
            $row_categorias = $sql->obtenerDatos("CALL sp_select_categorias_curso('".$curso['id_curso']."')");
            $total_categorias = count($row_categorias);
            foreach ($row_categorias as $key => $categoria) { ?>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 text-gray-700 dark:text-gray-200" 
            id-categ="<?php echo $categoria['id_categoria'] ?>"><?php echo $categoria['nombre_categoria'] ?></span>
            <?php } ?>
         </div>
      </div>
      <?php }
    ?>
      

      
   </div>



</div>