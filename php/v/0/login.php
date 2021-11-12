<div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div id="formulario" class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="https://junior-connect.com/img/illustrations/students.svg" alt="Office">
            <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="https://junior-connect.com/img/illustrations/students.svg" alt="Office">
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Registrate
              </h1>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nombre</span>
                <input id="nombre" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input validar-texto" type="text" placeholder="Tu nombre">
                <validar></validar>
              </label>
              <label for="universidad" class="block text-sm py-2" id="select_uni">
                
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Correo</span>
                <input id="correo" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input validar-mail" type="mail" placeholder="ejemplo@mail.com">
                <validar></validar>
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Contraseña</span>
                <input id="pass" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input validar-pass" placeholder="***************" type="password">
                <validar></validar>
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Confirmar contraseña
                </span>
                <input id="verify_pass" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" type="password">
                <validar></validar>
              </label>
              <div class="flex mt-6 text-sm">
                <label class="flex items-center dark:text-gray-400">
                  <input id="checkbox_registro" type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                  <span class="ml-2">
                    Recordarme
                  </span>
                </label>
              </div>
              <div class="flex mt-6 text-sm">
                <label class="flex items-center dark:text-gray-400">
                  <span class="ml-2">
                    Al registrarme estoy aceptando la
                    <span class="underline"> politica de privacidad</span>
                  </span>
                </label>
              </div>
              <a id="crear_cuenta" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" >
                Crear cuenta
              </a>
              <p class="mt-4">
                <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" id="login_slide" href="#">
                  ¿Tienes una cuenta? Accede aquí.
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div style="display:none;" id="login_form" class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="https://junior-connect.com/img/illustrations/students.svg" alt="Office">
            <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="https://junior-connect.com/img/illustrations/students.svg" alt="Office">
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Inicia sesión
              </h1>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Correo</span>
                <input id="correo_login" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="mail" placeholder="ejemplo@mail.com">
                <validar></validar>
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Contraseña</span>
                <input id="pass_login" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" type="password">
                <validar></validar>
              </label>
              <div class="flex mt-6 text-sm">
                <label class="flex items-center dark:text-gray-400">
                  <input id="recordarme_login" type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                  <span class="ml-2">
                    Recordarme
                  </span>
                </label>
              </div>
              <a id="inicio_sesion" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" >
                Acceder
              </a>
              <p class="mt-4">
                <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="#" id="registro_slide">
                  ¿No tienes cuenta? Registrate aquí.
                </a>
              </p>
              <span class="ml-2 text-sm font-medium text-purple-600 dark:text-purple-400 ">
                    ¿Olvidaste tu contraseña?
                    <a href="recuperar" class="underline hover:underline"> Recuperala aquí</a>
                  </span>
            </div>
          </div>
        </div>
      </div>
    </div>