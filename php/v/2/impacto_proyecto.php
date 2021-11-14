<label class="block text-sm mt-2">
    <span class="text-gray-700 dark:text-gray-400">Indique cuántos empleos conservará su empresa y cuántos generará a partir de la realización del proyecto.</span><br>
    <span class="text-xs text-green-600 dark:text-green-400">Empleos conservados para hombres.</span>
    <input id="necesidades" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="number" min="1">
    </div>
    <span class="text-xs text-green-600 dark:text-green-400">Empleos conservados para mujeres.</span>
    <input id="necesidades" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="number" min="1">
    </div>
    <span class="text-xs text-green-600 dark:text-green-400">Empleos generados para hombres.</span>
    <input id="necesidades" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="number" min="1">
    </div>
    <span class="text-xs text-green-600 dark:text-green-400">Empleos generados para mujeres.</span>
    <input id="necesidades" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="number" min="1">
    </div>
</label>
<label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">
    Sectores de mayor impacto (puedes seleccionar varias)
    </span>
    <select id="sectores_impacto" placeholder="Seleccione una opción" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" multiple="">
    <option value="1">Aeronáutica</option>
    <option value="2">Agroindustria</option>
    <option value="3">Alimentos</option>
    <option value="4">Automotriz</option>
    <option value="5">Biónica</option>
    <option value="6">Construcción</option>
    <option value="7">Cosmetología</option>
    <option value="8">Desarrollo Social</option>
    <option value="9">Electrónica</option>
    <option value="10">Medio Ambiente</option>
    <option value="11">Metalmecánica</option>
    <option value="12">Productos Naturales</option>
    <option value="13">Robótica</option>
    <option value="14">Salud</option>
    <option value="15">Tecnologías de la Información (software, Multimedia, etc.)</option>
    <option value="16">Turismo</option>
    <option value="17">Emprendimiento Tecnológico</option>
    <option value="18">Investigación </option>
    </select>
</label>
<label class="block text-sm mt-2">
    <span class="text-gray-700 dark:text-gray-400">Describa las principales consecuencias que la realización de su proyecto traería al medio ambiente. ¿Conoce la normatividad ambiental aplicable a su proyecto en el ámbito nacional e internacional?</span>
    <input id="necesidades" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Consecuencias medioambientales">
</label>
<label class="block text-sm mt-2">
    <span class="text-gray-700 dark:text-gray-400">¿Esta empresa ha sido creada en una comunidad indigena?</span>
    <select id="maquinaria" class="toggle-next  block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
        <option  value="1">Si</option>
        <option selected="" value="0">No</option>
    </select>
</label>
<label class="block text-sm mt-2" style="display:none">
    <span class="text-gray-700 dark:text-gray-400">Nombre de la comunidad</span>
    <input id="descripcion" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Nombre de la comunidad">
</label>
<div class="text-right">
    <button id="paso7" class="mt-2  px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <span>Continuar </span>&nbsp;
        <i class="fas fa-arrow-right"></i>
    </button>
</div>
<script>
    new SlimSelect({
        select: '#sectores_impacto'
    });
</script>