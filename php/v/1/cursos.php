<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$iniciar = ($_POST['valor']-1)*5;
$row_cursos = $sql->obtenerDatos("CALL sp_select_cursos_administrador('".$iniciar."')");
$total_cursos = count($row_cursos);
$row_categorias_cursos = $sql->obtenerDatos("CALL sp_select_categorias_cursos_totales()");
$total_row_categorias_cursos = count($row_categorias_cursos);
$row_examenes_cursos = $sql->obtenerDatos("CALL sp_select_examenes_curso()");
$row_unidades_cursos = $sql->obtenerDatos("CALL sp_select_unidades_curso_admin()");
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

$row_cursos_administrar_totales = $sql->obtenerDatos("CALL sp_select_cursos_administrador_totales()");
$total_row_cursos_administrar_totales = count($row_cursos_administrar_totales);
$paginacion = $total_row_cursos_administrar_totales/5;
$paginacion_atras = $_POST['valor']-1;
$paginacion_adelante = $_POST['valor']+1;
$paginacion_actual = $_POST['valor'];

?>
<div class="container px-6 mx-auto grid">
   <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Cursos
   </h2>
   <div id="form_cursos" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <label class="block text-sm">
         <span class="text-gray-700 dark:text-gray-400">Nombre del Curso</span>
         <input type="text" id="nombre_curso" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
      </label>
      <label class="block mt-4 text-sm">
         <span class="text-gray-700 dark:text-gray-400">Descripción del Curso</span>
            <div class="relative text-gray-500 focus-within:text-purple-600">
            <textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" id="descripcion_curso"></textarea>
            </div>
      </label>
      <label class="block mt-4 text-sm">
         <span class="text-gray-700 dark:text-gray-400">Agregar Imagen de Curso</span>
         <div class="relative text-gray-500 focus-within:text-purple-600">
            <input class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" type="file" id="img_curso"/>
         </div>
      </label>
      <label class="block mt-4 text-sm">
         <span class="text-gray-700 dark:text-gray-400">Categorías del Curso</span>
         <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray categorias" id="categoria_curso" multiple="">
            <option disabled selected>Selecciona las Categorías</option>
               <?php if($total_row_categorias_cursos > 0){
                  for ($i=0; $i < $total_row_categorias_cursos; $i++) {?>
            <option value="<?php echo $row_categorias_cursos[$i]['id_categoria']; ?>"><?php echo $row_categorias_cursos[$i]['nombre_categoria']; ?></option>
                  <?php }
               } ?>
         </select>
      </label>
      <br>
      <div style="float:right;" class="flex">
         <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" id="agregar_curso">
            Agregar Curso
         </button>
      </div>
      <!--<div style="float:right; margin-right: 5px !important;" class="flex">-->
      <!--   <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" id="agregar_unidad">-->
      <!--      Agregar Unidad-->
      <!--   </button>-->
      <!--</div>-->
      <!--<div style="float:right; margin-right: 5px !important;" class="flex">-->
      <!--   <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" id="agregar_examen">-->
      <!--      Agregar examen-->
      <!--   </button>-->
      <!--</div>-->
   </div>
   <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
      Categorias
   </h4>
   <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
   <?php if($total_row_categorias_cursos>0){
      for($i = 0; $i < $total_row_categorias_cursos; $i++){ ?>
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
         <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
            <?php if(file_exists("../../../img/categorias/".$row_categorias_cursos[$i]['id_categoria'])){
               $directorio = opendir("../../../img/categorias/".$row_categorias_cursos[$i]['id_categoria']);
                  while ($archivo = readdir($directorio)) {
                     if ($archivo != '.' && $archivo != '.htaccess' && $archivo != '..') {
                        echo 
                        '<img class="object-cover w-full h-full rounded-full" src="../img/categorias/'.$row_categorias_cursos[$i]['id_categoria'].'/'.$archivo.'" alt="" loading="lazy"/>
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>';
                     }
                  }
            }else{
               echo 
               '<img class="object-cover w-full h-full rounded-full" src="../img/categorias/default.png" alt="" loading="lazy"/>
               <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>';
            } ?>
         </div>
         <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
               <?php echo $row_categorias_cursos[$i]['nombre_categoria']?>
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
               <?php echo $row_categorias_cursos[$i]['numero_cursos']?>
            </p>
         </div>
      </div>
      <?php }
   }?>
   </div>
   <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
      Cursos
   </h4>
   <div class="min-w-0 p-4 mb-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="justify-content:center; display:flex; align-items:center;">
      <div class="w-full overflow-hidden rounded-lg shadow-xs">
         <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
               <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                     <th class="px-4 py-3">Nombre del Curso</th>
                     <th class="px-4 py-3">Numero de unidades</th>
                     <th class="px-4 py-3">Acciones</th>
                     <th class="px-4 py-3">Agregar Unidad</th>
                     <th class="px-4 py-3">Agregar Preguntas a Examen</th>
                  </tr>
               </thead>
               <?php if($total_cursos>0){ 
                  for($i = 0; $i < $total_cursos; $i++){ ?>
               <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                  <tr class="text-gray-700 dark:text-gray-400">
                     <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                           <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                           <?php if(file_exists("../../../img/cursos/".$row_cursos[$i]['id_curso'])){
                              $directorio = opendir("../../../img/cursos/".$row_cursos[$i]['id_curso']);
                                 while ($archivo = readdir($directorio)) {
                                    if ($archivo != '.' && $archivo != '.htaccess' && $archivo != '..') {
                                       echo 
                                       '<img class="object-cover w-full h-full rounded-full" src="../img/cursos/'.$row_cursos[$i]['id_curso'].'/'.$archivo.'" alt="" loading="lazy"/>
                                       <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>';
                                    }
                                 }
                           }else{
                              echo 
                              '<img class="object-cover w-full h-full rounded-full" src="../img/cursos/default.png" alt="" loading="lazy"/>
                              <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>';
                           } ?>
                           </div>
                           <div>
                              <p class="font-semibold"><?php echo $row_cursos[$i]['nombre_curso']?></p>
                           </div>
                        </div>
                     </td>
                     <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                           <p class="font-semibold"><?php echo $row_cursos[$i]['numero_unidades']?></p>
                        </div>
                     </td>
                     <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                           <button @click="openModal" id="modificar_curso" data-id_curso="<?php echo $row_cursos[$i]['id_curso']?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                              <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                 <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                              </svg>
                           </button>
                           <?php if($row_cursos[$i]['estado_curso']==1){ ?>
                           <button id="desactivar_curso" data-id_curso="<?php echo $row_cursos[$i]['id_curso']?>" data-estado="<?php echo $row_cursos[$i]['estado_curso']?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                              </svg>
                           </button>
                           <?php }else{ ?>
                           <button id="activar_curso" data-id_curso="<?php echo $row_cursos[$i]['id_curso']?>" data-estado="<?php echo $row_cursos[$i]['estado_curso']?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                              </svg>
                           </button>
                           <?php } ?>
                           
                        </div>
                     </td>
                     <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                           <button id="agregar_mas_unidades" data-id_curso="<?php echo $row_cursos[$i]['id_curso']?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                              </svg>
                           </button>
                        </div>
                     </td>
                     <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                           <button id="agregar_examen_curso" data-id_curso="<?php echo $row_cursos[$i]['id_curso']?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                              </svg>
                           </button>
                        </div>
                     </td>
                  </tr>
               </tbody>
                  <?php } ?>
               <?php }else{ ?>
               <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                  <tr class="text-gray-700 dark:text-gray-400">
                     <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                           <div>
                              <p class="font-semibold">No a ingresado ningun curso</p>
                           </div>
                        </div>
                     </td>
                  </tr>
               </tbody>    
               <?php } ?>
            </table>
         </div>
         <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            <span class="flex items-center col-span-3"></span>
            <span class="col-span-2"></span>
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
               <nav aria-label="Table navigation">
                  <ul class="inline-flex items-center">
                     <li>
                        <a href="#cursos=<?php echo $paginacion_atras?>" class="<?php if($paginacion_actual<=1){echo 'disabled';}?> px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                           <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                 <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                           </svg>
                        </a>
                     </li>
                     <?php for($i = 0; $i < ceil($paginacion); $i++){?>
                     <li>
                        <a href="#cursos=<?php echo $i+1?>" class="<?php if($paginacion_actual==$i+1){ echo 'text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600';}?> px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                           <?php echo $i+1;?>
                        </a>
                     </li>
                     <?php } ?>
                     <li>
                        <a href="#cursos=<?php echo $paginacion_adelante?>" class="<?php if($paginacion_actual>=ceil($paginacion)){echo 'disabled';}?> px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                           <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                 <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                           </svg>
                        </a>
                     </li>
                  </ul>
               </nav>
            </span>
         </div>
      </div>
   </div>
</div>
<script>
   new SlimSelect({
      select: '#categoria_curso'
   });
</script>
<style type="text/css">
.disabled {
    cursor: not-allowed;
    pointer-events: none;
}
</style>