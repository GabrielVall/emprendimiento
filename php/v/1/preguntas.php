<?php 
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$row_preguntas = $sql->obtenerDatos("CALL sp_select_preguntas_examen2('".$_POST['valor']."')");
$total_row_preguntas = count($row_preguntas);
?>
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Preguntas
    </h2>
    <div class="min-w-0 p-4 mb-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="justify-content:center; display:flex; align-items:center;">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Pregunta</th>
                            <th class="px-4 py-3">Acciones</th>
                        </tr>
                    </thead>
                        <?php if($total_row_preguntas>0){ 
                            for($i = 0; $i < $total_row_preguntas; $i++){?>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <p class="font-semibold"><?php echo $row_preguntas[$i]['pregunta']?></p>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <button id="modificar_pregunta" data-id_pregunta="<?php echo $row_preguntas[$i]['id_pregunta_examen']?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </button>
                                    <!--<button @click="openModal" id="eliminar_pregunta" data-id_pregunta="<?php echo $row_preguntas[$i]['id_pregunta_examen']?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">-->
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
                                    <p class="font-semibold">No a ingresado ningun pregunta</p>
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