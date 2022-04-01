<?php 
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$iniciar = ($_POST['valor']-1)*5;
$row_examenes = $sql->obtenerDatos("CALL sp_select_examenes('".$iniciar."')");
$total_row_examenes = count($row_examenes);
$row_examenes_totales = $sql->obtenerDatos("CALL sp_select_examenes_totales()");
$total_row_examenes_totales = count($row_examenes_totales);
$paginacion = $total_row_examenes_totales/5;
$paginacion_atras = $_POST['valor']-1;
$paginacion_adelante = $_POST['valor']+1;
$paginacion_actual = $_POST['valor'];
?>
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Examenes
    </h2>
    <div class="min-w-0 p-4 mb-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="justify-content:center; display:flex; align-items:center;">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Nombre del Curso</th>
                            <th class="px-4 py-3">Numero de Preguntas</th>
                            <th class="px-4 py-3">Acciones</th>
                        </tr>
                    </thead>
                        <?php if($total_row_examenes>0){ 
                            for($i = 0; $i < $total_row_examenes; $i++){?>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <?php if(file_exists("../../../img/cursos/".$row_examenes[$i]['id_curso'])){
                                    $directorio = opendir("../../../img/cursos/".$row_examenes[$i]['id_curso']);
                                        while ($archivo = readdir($directorio)) {
                                            if ($archivo != '.' && $archivo != '.htaccess' && $archivo != '..') {
                                        echo 
                                        '<img class="object-cover w-full h-full rounded-full" src="../img/cursos/'.$row_examenes[$i]['id_curso'].'/'.$archivo.'" alt="" loading="lazy"/>
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
                                        <p class="font-semibold"><?php echo $row_examenes[$i]['nombre_curso']?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                        <p class="font-semibold"><?php echo $row_examenes[$i]['numero_preguntas']?></p>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <button id="preguntas_examen" data-id_examen="<?php echo $row_examenes[$i]['id_examen']?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </button>
                                    <!--<button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">-->
                                    <!--    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">-->
                                    <!--        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>-->
                                    <!--    </svg>-->
                                    <!--</button>-->
                                </div>
                            </td>
                        </tr>
                    </tbody>
                        <?php } }else{ ?>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <p class="font-semibold">No a ingresado ningun examen</p>
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
                            <a href="#examenes=<?php echo $paginacion_atras?>" class="<?php if($paginacion_actual<=1){echo 'disabled';}?> px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                            <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                            </a>
                        </li>
                        <?php for($i = 0; $i < ceil($paginacion); $i++){?>
                        <li>
                            <a href="#examenes=<?php echo $i+1?>" class="<?php if($paginacion_actual==$i+1){ echo 'text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600';}?> px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                            <?php echo $i+1;?>
                            </a>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="#examenes=<?php echo $paginacion_adelante?>" class="<?php if($paginacion_actual>=ceil($paginacion)){echo 'disabled';}?> px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
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
<style type="text/css">
.disabled {
    cursor: not-allowed;
    pointer-events: none;
}
</style>