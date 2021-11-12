<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$row_curso = $sql->obtenerDatos("CALL sp_select_curso_id('".$_POST['valor']."','".$_SESSION['id_usuario_curso']."')");
$intento = $sql->obtenerDatos("CALL sp_select_intento_examen('".$_POST['valor']."','".$_SESSION['id_usuario_curso']."')");
?>

<div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        <?php echo $row_curso[0]['nombre_curso'] ?>
    </h2>
    <!-- CTA -->
    <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" href="javascript(0)">
        <div class="flex items-center">
        <span>
        <p>Objetivo de este curso:</p>    
        <?php echo $row_curso[0]['descripcion_curso'] ?></span>
        </div>
    </a>


    <?php
    $row_unidades = $sql->obtenerDatos("CALL sp_select_unidades_curso('".$_POST['valor']."')");
    $total_unidades = count($row_unidades);
    if($total_unidades > 0){
        for ($i=0; $i < $total_unidades; $i++) {
            $dir_base = '../../../cursos/';
            $dir_curso = $dir_base.$_POST['valor'].'/';
            $dir_unidad = $dir_curso.$row_unidades[$i]['id_unidad'].'/';
            $files = scandir($dir_unidad);
            $files = array_slice($files, 2); 
            $total_files = count($files);
            ?>
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            <?php echo 'Unidad '.($i + 1).': '.$row_unidades[$i]['nombre_unidad'] ?>
    </h4>
         <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Acciones</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php
                    if ($total_files > 0) {
                    for ($j=0; $j < $total_files; $j++) { ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                        <div>
                        <p class="font-semibold"><?php echo $files[$j]; ?></p>
                        </div>
                    </div>
                    </td>
                    <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                        <a href="<?php 
                        $posicion = $j + 2;
                        $dow = scandir($dir_base.$_POST['valor'].'/'.$row_unidades[$i]['id_unidad'].'/')[$posicion];
                        echo '../cursos/'.$_POST['valor'].'/'.$row_unidades[$i]['id_unidad'].'/'.$dow ?>" target="_blank" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </a>
                        <a href="<?php 
                        $posicion = $j + 2;
                        $dow = scandir($dir_base.$_POST['valor'].'/'.$row_unidades[$i]['id_unidad'].'/')[$posicion];
                        echo '../cursos/'.$_POST['valor'].'/'.$row_unidades[$i]['id_unidad'].'/'.$dow ?>" download="<?php echo $dow ?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </a>
                    </div>
                    </td>
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>
            </div>
        </div>
    <?php }
    }else{
        echo '<h4  class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 text-center">No hay unidades disponibles</h4>';
    }
    ?>

    <!-- Row unidades -->
    
    <!-- Row archivos unidad -->
       




    <?php
    if(!$row_curso[0]['@completado'] > 0){ ?>
        <div id="ref_examen" class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="margin-top: 10%!important;" data-id="<?php echo $_POST['valor'] ?>">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
            <div>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                Presentar examen
                </p>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400" >
                Intentos restantes: <?php echo 11-$intento[0][0]; ?>
                </p>
            </div>
        </div>
        <?php }else{ ?>
            <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
              <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
                <span>Ya haz completado este curso</span>
              </div>
            </a>
        <?php }
    ?>




 </div>