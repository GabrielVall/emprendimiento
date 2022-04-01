<?php 
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$iniciar = ($_POST['valor']-1)*5;
$row_proyectos = $sql->obtenerDatos("CALL sp_select_proyecto('".$iniciar."')");
$total_row_proyectos = count($row_proyectos);
$row_proyectos_totales = $sql->obtenerDatos("CALL sp_select_proyecto_totales()");
$total_row_proyectos_totales = count($row_proyectos_totales);
$paginacion = $total_row_proyectos_totales/5;
$paginacion_atras = $_POST['valor']-1;
$paginacion_adelante = $_POST['valor']+1;
$paginacion_actual = $_POST['valor'];
?>
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Proyectos
    </h2>
    <div class="min-w-0 p-4 mb-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="justify-content:center; display:flex; align-items:center;">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Nombre del Alumno</th>
                            <th class="px-4 py-3">Nombre del Proyecto</th>
                            <th class="px-4 py-3">Acciones</th>
                        </tr>
                    </thead> 
                        <?php if($total_row_proyectos>0){ 
                            for($i = 0; $i < $total_row_proyectos; $i++){?>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <p class="font-semibold"><?php echo $row_proyectos[$i]['nombre_usuario']?></p>
                                </div>
                            </td>
                        </tr>
                        <?php
                        if(isset($row_proyectos[$i]['id_proyecto'])){ ?>
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold"><?php echo $row_proyectos[$i]['nombre_proyecto']?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <a href="generar_pdf.php?id=<?php echo $row_proyectos[$i]['id_proyecto'] ?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            <p class="font-semibold">Generar PDF</p>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php }else{ ?>
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <p class="font-semibold">No a ingresado ningun Proyecto</p>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                        <?php } }else{ ?>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <p class="font-semibold">No a ingresado ningun Alumno</p>
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
                                <a href="#proyectos=<?php echo $paginacion_atras?>" class="<?php if($paginacion_actual<=1){echo 'disabled';}?> px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                                    <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </li>
                            <?php for($i = 0; $i < ceil($paginacion); $i++){?>
                            <li>
                                <a href="#proyectos=<?php echo $i+1?>" class="<?php if($paginacion_actual==$i+1){ echo 'text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600';}?> px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    <?php echo $i+1;?>
                                </a>
                            </li>
                            <?php } ?>
                            <li>
                                <a href="#proyectos=<?php echo $paginacion_adelante?>" class="<?php if($paginacion_actual>=ceil($paginacion)){echo 'disabled';}?> px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
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
<div id="modal"></div>
<style type="text/css">
.disabled {
    cursor: not-allowed;
    pointer-events: none;
}
</style>