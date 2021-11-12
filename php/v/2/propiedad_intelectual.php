<label class="block text-sm mt-2">
    <span class="text-gray-700 dark:text-gray-400">¿Ha realizado algun tramite de propiedad intelectual para su proyecto?</span>
    <select id="maquinaria" class="toggle-next block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
        <option  value="1">Si</option>
        <option selected="" value="0">No</option>
    </select>
</label>
<label class="block text-sm mt-2" style="display:none">
    <span class="text-gray-700 dark:text-gray-400">Seleccione una categoria</span>
    <select id="propiedad_int" multiple="multiple" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
        <option  value="1">Registro de marca</option>
        <option value="2">Modelo de utilidad</option>
        <option selected value="3">Diseño industrial</option>
        <option value="4">Secreto industrial</option>
        <option value="5">Derecho de autor</option>
        <option value="6">Patente</option>
    </select>
</label>
<div class="text-right">
    <button id="paso5" class="mt-2  px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <span>Continuar </span>&nbsp;
        <i class="fas fa-arrow-right"></i>
    </button>
</div>
<script>
    new SlimSelect({
        select: '#propiedad_int'
    });
</script>