$(document).ready(function() {
    $.ajax({
        type: "POST",
        url: "../php/v/0/login.php",
        success: function(respuesta){
            $("#contenedor_main").html(respuesta);
            cargar_municipios();
        }
    });
    try {
        var pre_correo = localStorage.getItem('correo_stg');
        var pre_pass = localStorage.getItem('pass_stg')
        $.ajax({
            type: "POST",
            url: "../php/c/0/login.php",
            data:"correo=" + pre_correo + "&pass=" + pre_pass,
            success: function(respuesta){
                if(respuesta.status == 'success'){
                    window.location.href="";
                }
            }
        });
    } catch (error) {}

    $(document).on("change", "#municipio", function(){
        var valor = $(this).val();
        $(this).parent().html('tu-loader');
        $.ajax({
            type: "POST",
            url: "../php/c/0/universidades_municipio.php",
            data: "id_municipio=" + valor,
            success: function(respuesta){
                $("#select_uni").html(respuesta);
                new SlimSelect({
                    select: '#universidad'
                })
            }
        });
    });
    var correo_rec = '';
    $(document).on('click',"#recuperar_pass", function(){
        var correo = $("#correo").val();
        $.ajax({
            type: "POST",
            url: "../php/c/0/recuperar_pass.php",
            data: "correo=" + correo,
            success: function(respuesta){
                correo_rec = correo;
                vista_codigo();
            },error: function(){
                alerta_generica('error','Conexion fallida','error al comunicarse con el servidor.');
            }
        })
    });

    function vista_codigo(){
        $('#container_rec').html('<h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">Introduce el codigo de recuperación</h1><label class="block text-sm"><span class="text-gray-700 dark:text-gray-400">Codigo de recuperación</span><input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" id="codigo" placeholder="Tu codigo..."/></label><a class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"href="#" id="codigo_recuperacion">Recuperar cuenta</a><p class="mt-2  text-gray-700 dark:text-gray-200">¿No has recibido ningún código? <a class="underline hover:underline" href="javascript:void(0)" id="reenviar">Reenvia otro.</p>');
    }

    $(document).on('click','#codigo_recuperacion', function(e) {
        var codigo = $("#codigo").val();
        $.ajax({
            type: 'POST',
            url: '../php/c/0/validar_codigo.php',
            data: "codigo=" + codigo + "&correo=" + correo_rec,
            success: function(respuesta){
             if(respuesta.status == 'success'){
                 window.location.href = './#recuperar';
             }else{
                 alerta_generica('error','Codigo incorrecto' , 'Vuelve a intentarlo');
             }  
            }
        });
    });

    $(document).on("click", "#cambiar_municipio", function(){
        $(this).parent().html('<p style="font-size:3em; text-align:center;"><i class="fas fa-circle-notch fa-spin"></i></p>');
        cargar_municipios();
    });
    
    $(document).on("input", ".validar-texto", function(){
        var input = $(this);
        validar_texto(input);
    });

    $(document).on("input", ".validar-mail", function(){
        var input = $(this);
        validar_email(input);
    });
    
    $(document).on("input", ".validar-pass", function(){
        var input = $(this);
        validar_pass(input);
    });

    $(document).on("input", "#verify_pass,#pass", function(){
        var pass = $("#pass").val();
        var pass_verify = $("#verify_pass").val();
        if(pass === pass_verify){
            $("#verify_pass").next().html('<span class="text-xs text-green-600 dark:text-green-400">Las contraseñas coinciden</span>');
            $("#verify_pass").addClass('valido');
            $("#verify_pass").removeClass('no-valido');
        }else{
            $("#verify_pass").next().html('<span class="text-xs text-red-600 dark:text-red-400">No coinciden las contraseñas</span>');
            $("#verify_pass").addClass('no-valido');
            $("#verify_pass").removeClass('valido');
        }
    });

    $(document).on("click", "#crear_cuenta", function(){
        var valido = 0;
        $("#formulario .valido:input[type!='search']:input[type!='checkbox']").each(function() {
            valido++;
        });
        if($("#universidad").val() != null){
            valido++;
        }
        if(valido == 5){
            registrar_usuario($(this));
        }else{
            alerta_generica('error','Campos vacios','Rellena los campos restantes');
        }
        valido = 0;
    });
    
    $(document).on("click", "#inicio_sesion", function(){
        var correo = $("#correo_login").val();
        var pass = $("#pass_login").val();
        $(this).addClass('unable');
        $(this).html('<i class="fa fa-circle-notch fa-spin"></i>');
        logear_usuario(correo,pass);
    });

    function logear_usuario(correo,pass) {
        $.ajax({
            type: "POST",
            url: "../php/c/0/login.php",
            data:"correo=" + correo + "&pass=" + pass,
            success: function(respuesta){
                alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                if(respuesta.status == 'success'){
                    if ($("#recordarme_login")[0].checked == true){
                        localStorage.setItem("correo_stg",correo);
                        localStorage.setItem('pass_stg',pass);
                    }
                    setTimeout(function() {
                        window.location.href="";
                    }, 2000);
                }
            },complete: function(){
                $("#inicio_sesion").removeClass('unable');
                $("#inicio_sesion").html('Acceder');
            }
        })
    }

    $(document).on("click", "#login_slide", function() {
        $("#formulario").slideToggle();
        setTimeout(() => {
            $("#login_form").slideToggle();
        }, 400);
        
    });

    
    $(document).on("click", "#registro_slide", function() {
        $("#login_form").slideToggle();
        setTimeout(() => {
            $("#formulario").slideToggle();
        }, 400);
        
    });
    
    function cargar_municipios(){
        $.ajax({
            type: "POST",
            url: "../php/c/0/select_municipios.php",
            success: function(respuesta){
                $("#select_uni").html(respuesta);
                new SlimSelect({
                    select: '#municipio'
                })
            }
        });
    }

    function registrar_usuario(input){
        var nombre = $("#nombre").val();
        var universidad = $("#universidad").val();
        var correo = $("#correo").val();
        var pass = $("#pass").val();
        $(input).addClass('unable');
        $(input).html('<i class="fa fa-circle-notch fa-spin"></i>');
        if ( universidad ) {
            insertar_usuario(nombre,universidad,correo,pass,input);   
        }else{
            alerta_generica('error','Campos vacios','Rellena los campos restantes');
        }
    }

    function insertar_usuario(nombre,universidad,correo,pass,input){
        $.ajax({
            type: "POST",
            url: "../php/c/0/registro_usuario.php",
            data: "nombre=" + nombre + "&universidad=" + universidad + "&correo=" + correo + "&pass=" + pass,
            success: function(respuesta){
                alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                if(respuesta.status == 'success'){
                    if ($("#checkbox_registro")[0].checked == true){
                        localStorage.setItem("correo_stg",correo);
                        localStorage.setItem('pass_stg',pass);
                    }
                    setTimeout(function() {
                        window.location.href="";
                    }, 2000);
                }
            },complete: function(){
                $(input).removeClass('unable');
                $(input).html('Crear cuenta');
            }
        });
    }

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

    function validar_texto(input) {
        var texto = $(input).val().replace(/\s/g, '').replace('ñ', 'n');
        var regex = /^[a-zA-Z0-9@]+$/;
        if (regex.test(texto) !== true){
            validacion_texto(input,true);
        }else{
            validacion_texto(input,false);
        }
    }

    function validacion_texto(input,boolean){
        if(boolean == true){
            input.addClass('no-valido');
            input.removeClass('valido');
            $(input).next().html('<span class="text-xs text-red-600 dark:text-red-400">No se permiten caractes especiales</span>');
        }else{
            input.removeClass('no-valido');
            input.addClass('valido');
            $(input).next().html('<span class="text-xs text-green-600 dark:text-green-400">Cumple los requisitos.</span>');
        }
    }

    function validar_email(input) {
        var texto = $(input).val();
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        if (reg.test(texto) == false) {
            input.addClass('no-valido');
            input.removeClass('valido');
            $(input).next().html('<span class="text-xs text-red-600 dark:text-red-400">Introduce un correo valido</span>');
        } else {
            input.removeClass('no-valido');
            input.addClass('valido');
            $(input).next().html('<span class="text-xs text-green-600 dark:text-green-400">Se enviara un correo de verificación.</span>');
        }
    }

    function validar_pass(input) {
        var texto = $(input).val();
            var rating = [
                0, "<i class='gg-info'></i>&nbsp; Insegura &nbsp;",
                25, "<i class='gg-info'></i>&nbsp; Debil &nbsp;",
                50, "<i class='gg-info'></i>&nbsp; Normal &nbsp;",
                75, "<i class='gg-check'></i>&nbsp; Segura &nbsp;",
                100, "<i class='gg-check'></i>&nbsp; Muy Segura &nbsp;"
            ];
    
            var score = 0;
            var pass = "";
    
            if (texto.length > 8) {
                score += 25;
            }
            if ((texto.match(/[a-z]/)) && (texto.match(/[A-Z]/))) {
                score += 25
            }
            if (texto.match(/[\!\@\#\$\%\^\&\*\?\_\~\-\(\)]+/)) {
                score += 25;
            }
            if (texto.match(/[0-9]/)) {
                score += 25
            }
            for (var i = rating.length - 1; i >= 0; i -= 1) {
                if (score >= rating[i]) {
                    pass = rating[i + 1];
                    break;
                }
            }
            switch (true) {
                case score < 25:
                    input.next().html("Seguridad baja");
                    input.next().css('color','red');
                break;
                
                case score >= 25 && score < 75:
                    input.next().html("Seguridad media");
                    input.next().css('color','green');
                break;
                
                case score > 74:
                    input.next().html("Seguridad Alta");
                    input.next().css('color','green');
                break;
            }
            if (score < 25) {
                input.addClass('no-valido');
                input.removeClass('valido');
            } else {
                input.removeClass('no-valido');
                input.addClass('valido');
            }
    }
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