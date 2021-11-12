<?php 
session_start();
if($_SESSION['id_usuario_curso'] && $_SESSION['privilegio'] == 1 && $_SESSION['estado'] == 2){ 
    $_SESSION['estado']=1;?> 
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Inicio
    </h2>
    <div class="min-w-0 p-4 mb-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="justify-content:center; display:flex; align-items:center;">
        <img class="float-left" style="margin-right:10%; margin-right:5%; max-width:200px;" src="../svg/mail.svg">
        <span>
        <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
            Bienvenido, {nombre_usuario}
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
<?php }else if($_SESSION['id_usuario_curso'] && $_SESSION['privilegio'] == 1 && $_SESSION['estado'] == 1){
        include_once("../../m/SQLConexion.php");
        $sql = new SQLConexion();
        $row_usuario = $sql->obtenerDatos("CALL sp_select_info_usuario('".$_SESSION['id_usuario_curso']."')");
    ?>
    <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Inicio
    </h2>
    
    <div class="min-w-0 p-4 mb-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="justify-content:center; display:flex; align-items:center;">
       
    </div>
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-6">
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            
        </div>
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <!-- <input type="text" style="background-color: rgba(255,255,255,0.2) !important; color: white;"> -->
        </div>
    </div>
</div>
<?php }else{
    exit();
}

?>
