<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$row_preguntas = $sql->obtenerDatos("CALL sp_select_preguntas_examen('".$_POST['valor']."')");
$total_preguntas = count($row_preguntas);
if(!$total_preguntas > 0){ echo '<script type="text/javascript">alert("No hay examen disponible");history.back();</script>"'; exit(); };
?>
<div class="container px-6 mx-auto grid">
    
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Examen: <?php echo $row_preguntas[0]['@curso'] ?>
    </h2>
    <h4 id="text_step" class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Lee atentamente y responde las siguientes preguntas.
</h4>
<div class="relative pt-1">
    <span class="text-xs mb-2 font-semibold inline-block py-1 px-2 uppercase rounded-full bg-pink-200">
        <p class="text-white ">Examen <span id="porcentaje">0</span>%</p>
    </span>
    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-pink-200">
        <div style="width: 0%;height: 10px;" id="barra_porcentaje" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500"></div>
    </div>
</div>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" id="contenedor_preguntas">
    <?php
        if ($total_preguntas > 0) {
            for ($i=0; $i < $total_preguntas; $i++) {  ?>
                <label class="block text-sm mt-2">
                    <span class="text-gray-700 dark:text-gray-400"><?php echo ($i + 1).'.- '.$row_preguntas[$i]['pregunta']; ?></span>
                    <select id="<?php echo $row_preguntas[$i]['id_pregunta_examen']; ?>" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <!-- Buscando la respuesta aquí eh?, mejor vuelve a repasar el curso ツ -->
                        <option selected="" value="">Sin responder</option>
                        <?php
                        $row_respuestas = $sql->obtenerDatos("CALL sp_select_respuestas_pregunta('".$row_preguntas[$i]['id_pregunta_examen']."')");
                        $total_respuestas = count($row_respuestas);
                        for ($j=0; $j < $total_respuestas; $j++) {  ?>
                        <option value="<?php echo $row_respuestas[$j]['id_respuesta_examen']; ?>"><?php echo $row_respuestas[$j]['respuesta']; ?></option>
                        <?php }
                        ?>
                    </select>
                </label>  
            <?php }
        }
    ?>
    
    <div class="text-right">
        <button id="entregar_examen" class="mt-2  px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            <span>Finalizar examen </span>&nbsp;
            <i class="fas fa-arrow-right"></i>
        </button>
    </div> 
</div>

</div>