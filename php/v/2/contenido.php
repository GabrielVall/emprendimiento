<?php 
session_start();
if($_SESSION['id_usuario_curso'] && $_SESSION['privilegio'] == 2 && $_SESSION['estado'] == 2){ ?>
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Inicio
    </h2>
    <div class="min-w-0 p-4 mb-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="justify-content:center; display:flex; align-items:center;">
        <img class="float-left" style="margin-right:10%; margin-right:5%; max-width:200px;" src="../svg/mail.svg">
        <span>
        <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
            Bienvenido, activa tu cuenta 
        </h4>
        <p class="text-gray-600 dark:text-gray-400">
            Para empezar a usar <b>Academia</b> debes validar tu cuenta, hemos enviado un correo de activación a la direccion que nos proporcionaste, si no lo haces tendras que volver a hacer el formulario de registro.<br>
        <br>
        Introudce los digitos en los siguientes campos:</p>
        <div style="display:inline-flex" class="grid gap-4 mb-4 md:grid-cols-4 xl:grid-cols-4 p-0">
        <input maxlength="1" class="number-validation block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" >
        <input maxlength="1" class="number-validation block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" >
        <input maxlength="1" class="number-validation block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" >
        <input maxlength="1" class="number-validation block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" >
        <input maxlength="1" class="number-validation block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" >
        </div>
        <button id="validar_correo" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                  Enviar
                </button>
    </span>
    </div>
<?php }else if($_SESSION['id_usuario_curso'] && $_SESSION['privilegio'] == 2 && $_SESSION['estado'] == 1){
        include_once("../../m/SQLConexion.php");
        $sql = new SQLConexion();
        $row_usuario = $sql->obtenerDatos("CALL sp_select_info_usuario('".$_SESSION['id_usuario_curso']."')");
        $porcentaje = round(($row_usuario[0]['@completados'] / $row_usuario[0]['@total']  ) * 100);
    ?>
    <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Inicio
    </h2>
    
    <div class="min-w-0 p-4 mb-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="justify-content:center; display:flex; align-items:center;">
        <img class="float-left" style="max-width:25vw;" src="../images/dashboard/bienvenida.png">
        <span>
        <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
            Bienvenido, <?php echo $row_usuario[0]['nombre']; ?>
        </h4>
        <p class="text-gray-600 dark:text-gray-400">
            Te damos la bienvenida a <b>Academia</b>, para comenzar debes tener al menos un proyecto en nuestro sistema, para hacerlo selecciona el boton
            "Añadir proyecto" en la barra lateral izquierda.
            <button onclick="window.location.href='#crear'" class="mt-2 flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                  <span>Comenzar ahora</span>
                  &nbsp; <i class="fas fa-plus"></i>
                </button>
            <!-- da el primer paso a tu emprendimiento clickeando el boton "+" en el curso que sea de tu agrado. -->
        </p>
        </span>
    </div>
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-6">
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-green-500">
            &nbsp;<i class="fas fa-book-medical"></i>&nbsp;
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Cursos completados
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                <?php echo $porcentaje; ?>%
            </p>
        </div>
        </div>
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
            &nbsp;<i class="fas fa-book"></i>&nbsp;
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Cursos disponibles
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                <?php echo $row_usuario[0]['@total'] ?>
            </p>
        </div>
        </div>
    </div>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800" >
                      <th class="px-4 py-3">Curso</th>
                      <th class="px-4 py-3">Calificación</th>
                      <th class="px-4 py-3">Acción</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >
                      <?php
                        include_once("../../m/SQLConexion.php");
                        $sql = new SQLConexion();
                        $row_completado = $sql->obtenerDatos("CALL sp_select_cursos_completados('".$_SESSION['id_usuario_curso']."')");
                        $total_completados = count($row_completado);
                        if($total_completados > 0){
                            for ($i=0; $i < $total_completados; $i++) { ?>
                                <tr class="text-gray-700 dark:text-gray-400" >
                                    <td class="px-4 py-3">
                                            <p class="font-semibold" ><?php echo $row_completado[$i]['nombre_curso'] ?></p>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                    <?php echo $row_completado[$i]['nota'] ?>%
                                    </td>
                                    <td class="px-4 py-3 text-xs" >
                                    <a href="generar_certificado.php?id=<?php echo $row_completado[$i]['id_curso_completado'] ?>" target="_blank" style="justify-content: start; display:flex; align-items: center; text-align:left">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z" clip-rule="evenodd"></path></svg> Descargar
                                    </a>
                                    </td>
                                </tr>
                            <?php }
                        }else{ ?>
                            <tr class="text-gray-700 dark:text-gray-400">
                                    <td colspan="3" class="px-4 py-3" style="text-align: center">
                                            <p class="font-semibold">Aqui apareceran tus cursos terminados.</p>
                                    </td>
                                </tr>
                        <?php }
                      ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
</div>
<?php }else{
    exit();
}

?>
