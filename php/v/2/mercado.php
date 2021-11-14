<label class="block text-sm mt-2">
    <span class="text-gray-700 dark:text-gray-400">¿Que necesidades del mercado satisface la empresa?</span>
    <input id="necesidades" class=" block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="¿En que contribuye tu empresa al mercado?">
</label>

<label class="block text-sm mt-2">
    <span class="text-gray-700 dark:text-gray-400">¿Conoce el mercado potencial para su proyecto?</span>
    <select id="ambito_operacion" class="toggle-next block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
        <option  value="1">Si</option>
        <option selected value="0">No</option>
    </select>
</label>

<label class="block text-sm mt-2" style="display:none">
    <span class="text-gray-700 dark:text-gray-400">¿Cuales son las caracteristicas de sus clientes potenciales?</span>
    <input id="necesidades_desc" class=" block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Caracteristicas de tus clientes">
</label>

<label class="block text-sm mt-2">
    <span class="text-gray-700 dark:text-gray-400">Ambito de operación de la empresa</span>
    <select id="ambito_operacion" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
        <option  value="1">Internacional</option>
        <option value="2">Nacional</option>
        <option selected value="3">Regional</option>
        <option value="4">Estatal</option>
        <option value="5">Municipal</option>
    </select>
</label>

<label class="block text-sm mt-2">
    <span class="text-gray-700 dark:text-gray-400">¿Existen en el mercado productos similares y/o sustitutos al suyo?</span>
    <select id="similares_mercado" class="toggle-next block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
        <option value="1">Si</option>
        <option selected value="0">No</option>
    </select>
</label>

<label class="block text-sm mt-2" style="display:none">
    <span class="text-gray-700 dark:text-gray-400">Mencione dichos productos</span>
    <input id="productos_similares" class=" block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Productos similares">
</label>

<div class="text-right">
    <button id="paso4" class="mt-2  px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <span>Continuar </span>&nbsp;
        <i class="fas fa-arrow-right"></i>
    </button>
</div>