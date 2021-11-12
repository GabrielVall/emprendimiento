$(document).ready(function() { 

    

    function cambiar_nav(hash){
        var navs = ['contenido','cursos','proyectos'];
        var active_nav = '<span id="removable_class" class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>';
        if (navs.includes(hash)) {
            $('#removable_class').remove();
            $('.nav-item.'+ hash).prepend(active_nav);
        }
    }

    cambiar_contenido_hash();

    window.onhashchange = function() {
        cambiar_contenido_hash();
    };

    function cambiar_contenido_hash() {
        $("#contenedor_main").html('<div class="loader"></div>');
        var hash = window.location.hash;
        hash = hash.replace('#', '');
        cambiar_vista(hash);
    }

    function cambiar_vista(){
        var hash = window.location.hash;
        var valor = hash.substring(hash.indexOf('=')+1);
        hash = hash.replace('#','');
        hash = hash.replace('='+valor,'');
        if(hash=="") hash = "contenido";
        $.ajax({
            type: "POST",
            url: "../php/v/2/"+hash + '.php',
            data: "valor="+valor,
            success: function(respuesta){
                cambiar_nav(hash);
                $("#contenedor_main").html(respuesta);
            },error: function() {
                default_errror_page();
            }
        });
    }

    function default_errror_page(){
        $.ajax({
            type: "POST",
            url: "../php/v/2/error.php",
            success: function(respuesta){
                $("#contenedor_main").html(respuesta);
            }
        });
    }

    $(document).on("click", "#ref_curso",function(){
        var curso = $(this).data('id');
        window.location.href="#curso=" + curso;
    });

    
    $(document).on("click", "#ref_examen",function(){
        var examen = $(this).data('id');
        window.location.href="#examen=" + examen;
    });

    $(document).on("click", "#editar_cuenta", function(){
        var nombre = $("#usario_inp").val();
        $.ajax({
            type: "POST",
            url: "../php/c/2/editar_cuenta.php",
            data: "nombre=" + nombre,
            success: function(respuesta){
                alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
            }
        })
    });

    $(document).on("click", "#entregar_examen", function(){
        var respuestas = document.getElementById("contenedor_preguntas");
        respuestas = respuestas.getElementsByTagName("select");
        respuestas_arr = [];
        preguntas_arr = [];
        for (var i = 0; i < respuestas.length; i++) {
            preguntas_arr.push(respuestas[i].getAttribute('id'))
            respuestas_arr.push(respuestas[i].value);
        }
        if(!respuestas_arr.includes('')){
            Swal.fire({
                icon: 'question',
                title: '¿Estas seguro?',
                text: 'Se enviaran las respuestas del examen',
                showDenyButton: true,
                confirmButtonText: 'Enviar',
                denyButtonText: `Cancelar`,
              }).then((result) => {
                if (result.isConfirmed) {
                    insertar_examen(preguntas_arr,respuestas_arr);
                }
              })
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Hay preguntas sin responder',
                confirmButtonText: 'Volver',
              })
        }
        
    });

    function insertar_examen(preguntas,respuestas){
        preguntas = JSON.stringify(preguntas);
        respuestas = JSON.stringify(respuestas);
        var hash = window.location.hash;
        var valor = hash.substring(hash.indexOf('=')+1);
        $.ajax({
            type: "POST",
            url: "../php/c/2/insertar_examen.php",
            data: "id_curso="+valor+"&preguntas=" + preguntas + "&respuestas=" +  respuestas,
            success: function(respuesta){
                if(respuesta.status == 'success'){
                    loader_examen(respuesta.aciertos,respuesta.porcentaje,respuesta.total);
                }else{
                    alert('Maximo numero de intentos alcanzado');
                    history.back();
                }
            },beforeSend: function(){
                $('#entregar_examen').replaceWith('<button class="mt-2  px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"><i class="fas fa-circle-notch fa-spin"></i></button>');
            }
        });
        
    }

    function loader_examen(aciertos,porcentaje,total){
        $('#contenedor_preguntas').html('<div class="justify-content-center d-flex text-center"><div class="lds-ring"><div></div><div></div><div></div><div></div></div><h3 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Subiendo examen...</h3></div>');
        setTimeout(function() {
            $('#contenedor_preguntas').html('<div class="justify-content-center d-flex text-center"><div class="lds-ring"><div></div><div></div><div></div><div></div></div><h3 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Obteniendo resultados...</h3></div>');
            setTimeout(function() {
                mostrar_resultado(aciertos,porcentaje,total);
            });
        },2000);
    }

    function mostrar_resultado(aciertos,porcentaje,total){
        console.log(porcentaje);
        if (porcentaje <= 50) { var icon = 'error'; var mensaje = 'Vuelve a repasar el curso y vuelve cuando estes listo...'; }
        if (porcentaje > 50 && porcentaje < 80){ icon = 'error'; var mensaje = 'Ya casi lo tienes, estudia un poco más'; }
        if (porcentaje >= 80){ icon = 'success'; var mensaje = 'Curso completado, podras obtener tu certificado en inicio > cursos completados'; }

        $('#contenedor_preguntas').html('<div class="justify-content-center d-flex text-center"><img style="max-width:200px;margin:auto; display:block;" src="../img/svg/'+icon+'.svg"><h3 class="mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Haz fallado la prueba.</h3><h4 id="text_step" class="text-lg font-semibold text-gray-600 dark:text-gray-300">Porcentaje de aciertos: '+porcentaje+'%</h4><h4 id="text_step" class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">'+mensaje+'</h4><a href="javascript:history.back()" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Volver al curso</a></div>');
    }
    
    $(document).on("click","#focus_input_proyecto",function(){
        $("#nombre_proyecto").focus();
    });
    $(document).on("click","#cerrar_sesion",function(){
        $.ajax({
            type: "POST",
            url: "../php/c/0/cerrar_sesion.php",
            success: function(respuesta){
                localStorage.removeItem('correo_stg');
                localStorage.removeItem('pass_stg');
                window.location.href = '';
            }
        });
    });
    $(document).on("input", ".number-validation", function(){
        if (this.value.length == this.maxLength) {
          $(this).next('.number-validation').focus();
        }
    });

    $(document).on("click", "#agregar_info",function(){
        var curp = $("#curp").val();
        var direccion = $("#direccion").val();
        var telefono = $("#telefono").val();
        var fax = $("#fax").val();
        var como_enteraste = $("#como_enteraste").val();
        if (curp.length > 17 && curp.length < 19 && direccion.length > 1 && telefono.length > 9 && fax.length > 8 && como_enteraste.length > 0) {
            insertar_info_adicional(curp,direccion,telefono,fax,como_enteraste);
        }else{
            alerta_generica('error','Campos sin rellenar','Reellena todos los campos para continuar');
        }
    });

    function insertar_info_adicional(curp,direccion,telefono,fax,como_enteraste){
        $.ajax({
            type: "POST",
            url: "../php/c/2/insertar_info_adicional.php",
            data: "curp=" + curp + "&direccion=" + direccion + "&telefono=" + telefono + "&fax=" + fax + "&como_enteraste=" + como_enteraste,
            success: function(respuesta){
                alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                setTimeout(() => {
                    location.reload();
                }, 1500);
            }
        });
    }

    var datos_proyectos = [];

    $(document).on('click', "#agregar_datos_generales", function() {
        if(validar_contenedor('#container_inputs_proyecto')){
            push_inputs('#container_inputs_proyecto');
            $.ajax({
                type: "POST",
                url: "../php/v/2/informacion_del_proyecto.php",
                success: function(respuesta){
                    $("#container_inputs_proyecto").html(respuesta);
                    var x = 10;
                    $("#barra_porcentaje").animate({width: x + '%'}, 500 );
                    $("#porcentaje").html(x);
                    $('#text_step').html('Paso 2: Información del proyecto.');

                }
            });
        }
    });
    var invitados = [];
    $(document).on('click', "#paso2", function() {
        if(validar_contenedor('#container_inputs_proyecto')){
            push_inputs('#container_inputs_proyecto');
            $.ajax({
                type: "POST",
                url: "../php/v/2/estado_tecnologico.php",
                success: function(respuesta){
                    $("#container_inputs_proyecto").html(respuesta);
                    var x = 20;
                    $("#barra_porcentaje").animate({width: x + '%'}, 500 );
                    $("#porcentaje").html(x);
                    $('#text_step').html('Paso 3: Estado técnologico.');
                }
            });
        }
    });

    $(document).on('change' , '.toggle-next', function(){
        if($(this).val() == 1){
            $(this).parent().next().slideDown();
        }else{
            $(this).parent().next().slideUp();
        }
    });
    
    $(document).on('click', "#paso3", function() {
        push_inputs('#container_inputs_proyecto');
        if(validar_contenedor('#container_inputs_proyecto')){
            $.ajax({
                type: "POST",
                url: "../php/v/2/mercado.php",
                success: function(respuesta){
                    $("#container_inputs_proyecto").html(respuesta);
                    var x = 45;
                    $("#barra_porcentaje").animate({width: x + '%'}, 500 );
                    $("#porcentaje").html(x);
                    $('#text_step').html('Paso 4: Mercado.');
                }
            });
        }
    });

    $(document).on('click', "#paso4", function() {
        if(validar_contenedor('#container_inputs_proyecto')){
            push_inputs('#container_inputs_proyecto');
            $.ajax({
                type: "POST",
                url: "../php/v/2/propiedad_intelectual.php",
                success: function(respuesta){
                    $("#container_inputs_proyecto").html(respuesta);
                    var x = 63;
                    $("#barra_porcentaje").animate({width: x + '%'}, 500 );
                    $('#text_step').html('Paso 5: Propiedad intelectual.');
                }
            });
        }
    });

    $(document).on('click', "#paso5", function() {
        if(validar_contenedor('#container_inputs_proyecto')){
            push_inputs('#container_inputs_proyecto');
            $.ajax({
                type: "POST",
                url: "../php/v/2/estratificacion.php",
                success: function(respuesta){
                    $("#container_inputs_proyecto").html(respuesta);
                    var x = 69;
                    $("#barra_porcentaje").animate({width: x + '%'}, 500 );
                    $("#porcentaje").html(x);
                    $("#barra_porcentaje").animate({width: x + '%'}, 500 );
                    $("#porcentaje").html(x);
                    $('#text_step').html('Paso 6: Estratificación de la empresa.');
                }
            });
        }
    });

    $(document).on('click', "#paso6", function() {
        if(validar_contenedor('#container_inputs_proyecto')){
            push_inputs('#container_inputs_proyecto');
            $.ajax({
                type: "POST",
                url: "../php/v/2/impacto_proyecto.php",
                success: function(respuesta){
                    $("#container_inputs_proyecto").html(respuesta);
                    var x = 75;
                    $("#barra_porcentaje").animate({width: x + '%'}, 500 );
                    $("#porcentaje").html(x);
                    $("#barra_porcentaje").animate({width: x + '%'}, 500 );
                    $("#porcentaje").html(x);
                    $('#text_step').html('Paso 7: Impacto del proyecto.');
                }
            });
        }
    });


    // Swal.fire({
    //     imageUrl: '../img/development.svg',
    //     title: 'Desarrollo en progreso.',
    //     imageHeight: 300,
    //     text: 'Seguimos implementando mejoras para que tu experiencia sea mejor, si encuentras fallas por favor comunicalo al correo institucional emprendedurismo@utnc.edu.mx',
    //     confirmButtonText: 'Aceptar',
    //   })
    $(document).on('click', "#paso7", function() {
        if(validar_contenedor('#container_inputs_proyecto')){
            push_inputs('#container_inputs_proyecto');
            console.log(invitados,datos_proyectos);
            invitados = JSON.stringify(invitados);
            datos_proyectos = JSON.stringify(datos_proyectos);
            $.ajax({
                type: "POST",
                data: "invitados=" + invitados + "&datos_proyectos=" + datos_proyectos,
                url: "../php/c/2/insertar_proyecto.php",
                success: function(respuesta){
                    $('#container_inputs_proyecto').html(svg_success());
                    var x = 100;
                    $("#barra_porcentaje").animate({width: x + '%'}, 500 );
                    $("#porcentaje").html(x);
                    $("#barra_porcentaje").animate({width: x + '%'}, 500 );
                    $("#porcentaje").html(x);
                    $('#text_step').html('Paso 7: Impacto del proyecto.');
                }
            });
        }
    });

    function validar_contenedor(contenedor){
        x = document.querySelector(contenedor);
        x = x.querySelectorAll("input,select");
        vacios = 0;
        for (var i = 0; i < x.length; i++){
            if($(x[i]).is(":visible") && ! $(x[i]).val().trim().length > 0 && !$(x[i]).is("[type='search']") ){
                vacios++;
            }
        }
        if(vacios == 0) return true;
        else return false;
    }
    function push_inputs(contenedor){
        x = document.querySelector(contenedor);
        x = x.querySelectorAll("input,select");
        for (var i = 0; i < x.length; i++){
            if(!$(x[i]).is("[type='search']")){
                datos_proyectos.push($(x[i]).val());
            }   
        }
        console.log(datos_proyectos);
    }

    

    function argumentos_no_vacios(){
        x = 0;
        for (var i=0; i < arguments.length; i++) {
            if (arguments[i].trim().length < 1) x++;
        }
        if(x == 0) return true;
    }

    $(document).on("click", "#validar_correo",function(){
        var n0 = $(".number-validation")[0].value;
        var n1 = $(".number-validation")[1].value;
        var n2 = $(".number-validation")[2].value;
        var n3 = $(".number-validation")[3].value;
        var n4 = $(".number-validation")[4].value;
        var numero = n0 + n1 + n2 + n3 + n4;
        $.ajax({
            type: "POST",
            url: "../php/c/0/validar_cuenta.php",
            data:"numero=" + numero,
            success: function(respuesta){
                alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                if (respuesta.status == 'success') {
                    setTimeout(function() {
                        window.location.href= "";
                    }, 1000);
                }
            }
        });
    });
    
    var input_invitado1 = '<div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400"><input class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input';
    // Valor
    var input_invitado2 = '"><div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none"><svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg></div></div>';
    var participantes = [];
    var tabla1 = '<table class="w-full whitespace-no-wrap"><thead><tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"><th class="px-4 py-3">#ID</th><th class="px-4 py-3">Participante</th><th class="px-4 py-3">Correo</th></tr></thead>';
    // data participantes
    var tabla2 = '<tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">';
    var tabla3 = '</tbody></table>';
    var tr1 = '<tr class="text-gray-700 dark:text-gray-400"><td class="px-4 py-3 text-xs"><span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">1612</span></td><td class="px-4 py-3"><div class="flex items-center text-sm"><div class="relative hidden w-8 h-8 mr-3 rounded-full md:block"> <img class="object-cover w-full h-full rounded-full" src="../img/usuarios/';
    // Imagen
    var tr2 = '.jpg"><div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div></div><div><p class="font-semibold">';
    // Nombre
    var tr3 = '</p></div></div></td><td class="px-4 py-3 text-sm">';
    // Correo
    var tr4 = '</td></tr>';
     
    $(document).on("click", "#agregar_involucrado", function(){
        var correo = $("#correo_involucrado").val();
        var cargo = $("#cargo_involucrado").val();
        $.ajax({
            type: "POST",
            url: "../php/c/2/seleccionar_participante.php",
            data: "correo=" + correo,
            success: function(respuesta){
               alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
               if(respuesta.status == 'success'){
                   crear_tabla(respuesta.id,respuesta.nombre,respuesta.correo,cargo);
               }
            }
        });
    });
    function crear_tabla(id,nombre,correo,cargo){
        $('#participantes_tabla').html('');
        invitados.push([id,nombre,correo,cargo]);
        var new_tbl = tabla1 + tabla2;
        invitados.forEach( function(valor) {
            new_tbl = new_tbl + tr1 + valor[0] + tr2 + valor[1] + tr3 + valor[2] + tr4;
        });
        new_tbl = new_tbl + tabla3;
        $('#participantes_tabla').append(new_tbl);
        $('#regresar').trigger('click');
    }



    let input1 = '<label class="block text-sm"><span class="text-gray-700 dark:text-gray-400">Correo(Tiene que estar registrado)</span><input id="correo_involucrado" class="block w-full mt-1 text-sm dark:bg-gray-700 border-green-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="correo electronico"></label><label class="block text-sm"><span class="text-gray-700 dark:text-gray-400">Cargo o actividad desempeñada</span><input id="cargo_involucrado" class="block w-full mt-1 text-sm dark:bg-gray-700 border-green-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="¿Que rol tiene en tu proyecto/empresa?"></label>';
    let button = '<button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" id="agregar_involucrado">Agregar</button>';
    let button_cancel = '<button id="regresar" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Regresar</button>';
    let inputs = input1 + button + button_cancel;
    $(document).on("click",".agregar_usuario_clase", function(){
        $(this).parent().html(inputs);
    });

    let agregar_btn = '<div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 agregar_usuario_clase"><div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-green-500"><i class="p-1 fas fa-plus"></i></div><div><p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Agregar un participante</p></div></div>';

    $(document).on("click","#regresar", function(){
        $('#participantes_cont').html(agregar_btn);
    });
    
    function alerta_generica(status, header, msg) {
        Swal.fire({
            icon: status,
            title: header,
            text: msg,
            showConfirmButton: false,
            timer: 1500.0,
            timerProgressBar: true,
          })
    }

});

function svg_success(){
    return '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 507.2 507.2" style="enable-background:new 0 0 507.2 507.2;max-width: 15%;display: block;margin: auto;" xml:space="preserve"><circle style="fill:#32BA7C;" cx="253.6" cy="253.6" r="253.6"></circle><path style="fill:#0AA06E;" d="M188.8,368l130.4,130.4c108-28.8,188-127.2,188-244.8c0-2.4,0-4.8,0-7.2L404.8,152L188.8,368z"></path><g><path style="fill:#FFFFFF;" d="M260,310.4c11.2,11.2,11.2,30.4,0,41.6l-23.2,23.2c-11.2,11.2-30.4,11.2-41.6,0L93.6,272.8 c-11.2-11.2-11.2-30.4,0-41.6l23.2-23.2c11.2-11.2,30.4-11.2,41.6,0L260,310.4z"></path><path style="fill:#FFFFFF;" d="M348.8,133.6c11.2-11.2,30.4-11.2,41.6,0l23.2,23.2c11.2,11.2,11.2,30.4,0,41.6l-176,175.2 c-11.2,11.2-30.4,11.2-41.6,0l-23.2-23.2c-11.2-11.2-11.2-30.4,0-41.6L348.8,133.6z"></path></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg><h1 class="text center mb-4 mt-4 text-xl font-semibold text-gray-700 dark:text-gray-200" style="text-align:center">¡Proyecto registrado!</h1><a href="#proyectos" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple text-center" style="display: block;margin: auto;">Ver mis proyectos</a>';
}