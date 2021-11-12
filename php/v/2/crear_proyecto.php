<h4 id="text_step" class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Paso 1: Datos generales.
</h4>
<div class="relative pt-1">
    <span class="text-xs mb-2 font-semibold inline-block py-1 px-2 uppercase rounded-full bg-pink-200">
        <p class="text-white ">Proyecto <span id="porcentaje">0</span>%</p>
    </span>
    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-pink-200">
        <div style="width: 0%;height: 10px;" id="barra_porcentaje" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500"></div>
    </div>
</div>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" id="container_inputs_proyecto">
    <label class="block text-sm mt-2">
        <span class="text-gray-700 dark:text-gray-400">Nombre de la empresa. (Especifique el nombre de su proyecto y/o empresa)</span>
        <input id="proyecto" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="¿Como se llama tu proyecto/empresa?">
    </label>
    <label class="block text-sm mt-2">
        <span class="text-gray-700 dark:text-gray-400" id="participantes_tabla">Personas involucradas(si no cuentas con un equipo puedes saltar este paso).</span>
        <div id="participantes_cont" class="grid gap-6 mb-8 md:grid-cols-3 xl:grid-cols-3 my-6">
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 agregar_usuario_clase">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-green-500">
            <i class="p-1 fas fa-plus"></i>
            </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Agregar un participante
                    </p>
                </div>
            </div>
        </div>
    </label>
    <label class="block text-sm mt-2">
        <span class="text-gray-700 dark:text-gray-400">¿Empresa nueva?</span>
        <select id="nueva_empresa" class="toggle-next block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            <option selected  value="0">Si</option>
            <option  value="1">No</option>
        </select>
    </label>
    <label class="block text-sm mt-2" style="display:none">
        <span class="text-gray-700 dark:text-gray-400">Constitución legal</span>
        <select id="nueva_empresa" class=" toggle-next block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            <option   value="1">Si</option>
            <option selected  value="2">No</option>
            <option  value="3">En proceso</option>
        </select>
        
    </label>
    <label class="block text-sm mt-2" style="display:none">
    <span class="text-gray-700 dark:text-gray-400">RFC empresa</span>
        <input id="rfc_empresa" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="RFC de tu empresa">
        </label>
    <label class="block text-sm mt-2">
        <span class="text-gray-700 dark:text-gray-400">Tiempo desarrollando el proyecto</span>
        <input id="tiempo_desarrollo" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="¿Cuanto tiempo haz estado trabajando en el?">
    </label>
    <div class="text-right">
        <button id="agregar_datos_generales" class="mt-2  px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            <span>Continuar </span>&nbsp;
            <i class="fas fa-arrow-right"></i>
        </button>
    </div>
</div>