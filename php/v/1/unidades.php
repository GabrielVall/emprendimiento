<?php 
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$row_cursos = $sql->obtenerDatos("CALL sp_select_cursos_administrador()");
$total_row_cursos = count($row_cursos);
?>
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Unidades
    </h2>
    <div class="min-w-0 p-4 mb-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="justify-content:center; display:flex; align-items:center;">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Nombre del Curso</th>
                            <th class="px-4 py-3">Nombre del Unidad</th>
                            <th class="px-4 py-3">Acciones</th>
                        </tr>
                    </thead> 
                        <?php if($total_row_cursos>0){ 
                            for($i = 0; $i < $total_row_cursos; $i++){?>
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
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!--<a data-id_curso="<?php echo $row_unidades[$j]['id_curso']?>" href="#unidad=<?php echo $row_unidades[$j]['id_curso']?>" data-id_curso="<?php echo $row_cursos[$i]['id_curso']?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">-->
                                    <!--    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">-->
                                    <!--        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>-->
                                    <!--    </svg>-->
                                    <!--</a>-->
                                    <a href="#unidad=<?php echo $row_cursos[$i]['id_curso']?>" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Agregar Unidad
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php
                        $row_unidades = $sql->obtenerDatos("CALL sp_select_unidades('".$row_cursos[$i]['id_curso']."')");
                        $total_row_unidades = count($row_unidades);
                        if($total_row_unidades>0){
                            for($j = 0; $j < $total_row_unidades; $j++){ ?>
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold"><?php echo $row_unidades[$j]['nombre_unidad']?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <button @click="openModal" id="editar_unidad" data-id_unidad="<?php echo $row_unidades[$j]['id_unidad']?>" data-id_curso="<?php echo $row_cursos[$i]['id_curso']?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                    </button>
                                    <button @click="openModal" id="eliminar_unidad" data-id_unidad="<?php echo $row_unidades[$j]['id_unidad']?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php } }else{ ?>
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <p class="font-semibold">No a ingresado ninguna Unidad al Curso <?php echo $row_cursos[$i]['nombre_curso']?>.</p>
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
                                    <p class="font-semibold">No a ingresado ningun Curso</p>
                                </div>
                            </td>
                        </tr>
                    </tbody> 
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="modal"></div>