<?php 
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$row_curso = $sql->obtenerDatos("CALL sp_select_curso('".$_POST['valor']."')");
$total_row_curso = count($row_curso);
$row_categorias_cursos = $sql->obtenerDatos("CALL sp_select_categorias_cursos()");
$total_row_categorias_cursos = count($row_categorias_cursos);
?>
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Actualización de Curso
    </h2>
    <div id="form_curso" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nombre del Curso</span>
            <input value="<?php echo $row_curso[0]['nombre_curso']?>" type="text" id="nombre_curso_act" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Descripción del Curso</span>
                <div class="relative text-gray-500 focus-within:text-purple-600">
                <textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" id="descripcion_curso_act"><?php echo $row_curso[0]['descripcion_curso']?></textarea>
                </div>
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Agregar Imagen de Curso</span>
            <div class="relative text-gray-500 focus-within:text-purple-600">
                <input  id="img_curso_act" class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" type="file"/>
            </div>
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Categorías del Curso</span>
            <select id="categoria_curso_act" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray categorias" multiple="">
                <option disabled selected>Selecciona las Categorías</option>
                <?php if($total_row_categorias_cursos > 0){
                    for ($i=0; $i < $total_row_categorias_cursos; $i++) {
                        for($j=0; $j < $total_row_curso; $j++) {?>
                <option value="<?php echo $row_categorias_cursos[$i]['id_categoria']; ?>" <?php if($row_categorias_cursos[$i]['id_categoria']== $row_curso[$j]['id_categoria']){ echo 'selected';}?> ><?php echo $row_categorias_cursos[$i]['nombre_categoria']; ?></option>
                    <?php }
                    }
                } ?>
            </select>
        </label>
        <br>
        <div style="float:right;" class="flex">
            <button  id="actualizar_curso" data-id_curso="<?php echo $_POST['valor']?>" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Actualizar
            </button>
        </div>
    </div>
</div>
<script>
   new SlimSelect({
      select: '#categoria_curso_act'
   });
</script>