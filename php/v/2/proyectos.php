<?php 
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$row_proyecto = $sql->obtenerDatos("CALL sp_select_proyectos_usuario('".$_SESSION['id_usuario_curso']."')");
$total_proyecto = count($row_proyecto);
?>
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Mis proyectos
    </h2>

    <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" href="javascript:void(0)">
        <div class="flex items-center">
        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path>
        </svg>
        <?php 
            if($total_proyecto > 0){ ?>
            <span>Selecciona un proyecto para generar tu archivo pdf</span>
        
        <?php }else{?>
        <span>No tienes proyectos registrados</span>
        <?php }
        ?>
        </div>
    </a>

    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">

    <?php 
    if($total_proyecto > 0){
        for ($i=0; $i < $total_proyecto; $i++) { ?>
        
        <a class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" href="generar_pdf?id=<?php echo $row_proyecto[$i]['id_proyecto'] ?>" target="_blank">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </div>
                <div>
                  <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    <?php echo $row_proyecto[$i]['nombre'] ?>
                  </p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                  #<?php echo $row_proyecto[$i]['id_proyecto'] ?>
                  </p>
                </div>
              </a>
        <?php }
    }
    ?>

    </div>  

    