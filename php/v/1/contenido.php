<?php 
session_start();
if($_SESSION['id_usuario_curso'] && $_SESSION['privilegio'] == 1 && $_SESSION['estado'] == 2){ ?> 
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
</div>
<?php }else if($_SESSION['id_usuario_curso'] && $_SESSION['privilegio'] == 1 && $_SESSION['estado'] == 1){
    include_once("../../m/SQLConexion.php");
    $sql = new SQLConexion();
    $row_usuario = $sql->obtenerDatos("CALL sp_select_alumnos_registrados()");
    $row_usuarios_activos = $sql->obtenerDatos("CALL sp_select_alumnos_activos()");
    $row_totales = $sql->obtenerDatos("CALL sp_select_totales()");
    $usuarios_desactivados = $row_usuario[0]['total_alumnos'] - $row_usuarios_activos[0]['usuarios_activos'];
?>
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Inicio
    </h2>
    <div class="min-w-0 p-4 mb-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="justify-content:center; display:flex; align-items:center;">
        <img class="float-left" style="max-width:25vw;" src="../images/dashboard/bienvenida.png">
        <span>
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Bienvenido, Administrador.
            </h4>
            <p class="text-gray-600 dark:text-gray-400">
                Te damos la bienvenida al panel de administración de <b>Academia</b>, aquí sé podra modificar y dar de alta la información que podra llegar a ver el alumno en cuestión otros apartados, aparte de poder ocultar información para este mismo.
            </p>
        </span>
    </div>
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-green-500">
                &nbsp;<i class="fas fa-book-medical"></i>&nbsp;
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Proyectos Registrados
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    <?php echo $row_usuario[0]['total_proyectos']?>
                </p>
            </div>
        </div>
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-orange-100 dark:bg-teal-500">
                &nbsp;<i class="fas fa-users"></i>&nbsp;
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Alumnos Registrados
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    <?php echo $row_usuario[0]['total_alumnos'] ?>
                </p>
            </div>
        </div>
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-orange-100 dark:bg-blue-500">
                &nbsp;<i class="fas fa-user-check"></i>&nbsp;
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Alumnos Activos
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    <?php echo $row_usuarios_activos[0]['usuarios_activos'] ?>
                </p>
            </div>
        </div>
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-orange-100 dark:bg-red-600">
                &nbsp;<i class="fas fa-user-times"></i>&nbsp;
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Alumnos Inactivos
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    <?php echo $usuarios_desactivados ?>
                </p>
            </div>
        </div>
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-orange-100 dark:bg-gray-700">
                &nbsp;<i class="fas fa-paste"></i>&nbsp;
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total de Cursos
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    <?php echo $row_totales[0]['total_cursos'] ?>
                </p>
            </div>
        </div>
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-orange-100 dark:bg-orange-600">
                &nbsp;<i class="far fa-file"></i>&nbsp;
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total de Examenes
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    <?php echo $row_totales[0]['total_examenes'] ?>
                </p>
            </div>
        </div>
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                &nbsp;<i class="fas fa-folder-open"></i>&nbsp;
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total de Unidades
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    <?php echo $row_totales[0]['total_unidades'] ?>
                </p>
            </div>
        </div>
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-orange-100 dark:bg-green-500">
                &nbsp;<i class="fas fa-clipboard-list"></i>&nbsp;
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total de Categorias
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    <?php echo $row_totales[0]['total_categorias'] ?>
                </p>
            </div>
        </div>
    </div>
</div>
<?php }else{
    exit();
}

?>
