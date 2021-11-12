<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
?> 
<div class="container px-6 mx-auto grid">
   <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Respuestas
   </h2>
   <?php for($i=1; $i < $_POST['numero_respuestas']; $i++){ ?>
   <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">Respuesta #<?php echo $i;?> del examen</span>
      <input type="text" id="respuesta_pregunta_<?php echo $i?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
   </label>
   <div class="mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">La respuesta es:</span>
      <div class="mt-2">
         <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
            <input checked type="radio" id="radio_<?php echo $i?>" name="accountType<?php echo $i?>" value="0" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"/>
            <span class="ml-2">Incorrecto</span>
         </label>
         <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
            <input type="radio" id="radio_<?php echo $i?>" name="accountType<?php echo $i?>" value="1" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"/>
            <span class="ml-2">Correcto</span>
         </label>
      </div>
   </div>
   <?php } ?>
   <br>
</div>