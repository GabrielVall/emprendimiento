<label class="block text-sm mt-2">
    <span class="text-gray-700 dark:text-gray-400">Descripción</span>
    <input id="descripcion" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Cuentanos sobre tu proyecto">
</label>
<label class="block text-sm mt-2">
    <span class="text-gray-700 dark:text-gray-400">Objetivo</span>
    <input id="descripcion" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Objetivos del proyecto">
</label>
<label class="block text-sm mt-2">
    <span class="text-gray-700 dark:text-gray-400">Apoyo requerido</span>
    <select id="apoyo" multiple="multiple" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
    <option value="1" selected>Diseño industrial</option>
    <option value="2">Diseño de imagen corporativa</option>
    <option value="3">Procesos productivos</option>
    <option value="4">Administración</option>
    <option value="5">Propiedad industrial</option>
    <option value="6">Mercadotecnia</option>
    <option value="7">Investigación</option>
    <option value="8">Aspectos jurídicos</option>
    <option value="9">Vinculación</option>
    <option value="10">Planeación estratégica</option>
    <option value="11">Tecnología</option>
    </select>
</label>
<div class="text-right">
    <button id="paso2" class="mt-2  px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <span>Continuar </span>&nbsp;
        <i class="fas fa-arrow-right"></i>
    </button>
</div>
<script>
    new SlimSelect({
        select: '#apoyo',
        placeholderSearch: true,
        searchPlaceholder: 'Buscar...',
        placeholder: 'Selecciona una opción..', 
    });
</script>