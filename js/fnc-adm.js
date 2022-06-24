$(document).ready(function() {

    function cambiar_nav(hash){
        var navs = ['contenido','cursos','proyectos','categorias','cursos','unidades','examenes','alumnos'];
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
            url: "../php/v/1/"+hash + '.php',
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

    $(document).on("click", "#agregar_categoria_curso", function(){
        var nombre_categoria = $("#nombre_categoria").val();
        var img_categoria = $("#img_categoria").val();
        if(nombre_categoria.length > 0 && img_categoria.length > 0) {
            $.ajax({
                type: "POST",
                url: "../php/c/1/agregar_categoria.php",
                data: "nombre_categoria=" + nombre_categoria,
                success: function(respuesta){
                    alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                    uploadAjax('img_categoria','categorias',respuesta.id_categoria,'jpg');
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                }
            });
        }else{
                $("#form_categoria input").each(function () {
                if ($(this).val().length < 1) {
                    $(this).removeClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                    $(this).addClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                }
                else {
                    $(this).removeClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                    $(this).addClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                }
            });
        }
    });

    $(document).on("click", "#agregar_unidad", function(){
        var nombre_curso = $("#nombre_curso").val();
        var descripcion_curso = $("#descripcion_curso").val();
        var categorias = $("#categoria_curso").val();
        var img_curso = $("#img_curso").val();
        categorias_curso=JSON.stringify(categorias);
        if(nombre_curso.length > 0 && descripcion_curso.length > 0 && categorias.length > 0 && img_curso.length > 0) {
            $.ajax({
                type: "POST",
                url: "../php/c/1/agregar_curso.php",
                data: "nombre_curso=" + nombre_curso + "&descripcion_curso=" + descripcion_curso + "&categorias_curso=" + categorias_curso,
                success: function(respuesta){
                    alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                    uploadAjax('img_curso','cursos',respuesta.id_curso,'jpg');
                    setTimeout(() => {
                        window.location.href = "#unidad="+respuesta.id_curso;
                    }, 1500);
                }
            });
        }else{
            $("#form_cursos input, #form_cursos select, #form_cursos textarea").each(function () {
                if ($(this).val().length < 1) {
                    $(this).removeClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                    $(this).addClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                }
                else {
                    $(this).removeClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                    $(this).addClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                }
            });
        }
    });

    $(document).on("click", "#agregar_examen", function(){
        var nombre_curso = $("#nombre_curso").val();
        var descripcion_curso = $("#descripcion_curso").val();
        var img_curso = $("#img_curso").val();
        var categorias = $("#categoria_curso").val();
        categorias_curso=JSON.stringify(categorias);
        if(nombre_curso.length > 0 && descripcion_curso.length > 0 && categorias.length > 0 && img_curso.length > 0) {
            $.ajax({
                type: "POST",
                url: "../php/c/1/agregar_curso.php",
                data: "nombre_curso=" + nombre_curso + "&descripcion_curso=" + descripcion_curso + "&categorias_curso=" + categorias_curso,
                success: function(respuesta){
                    alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                    uploadAjax('img_curso','cursos',respuesta.id_curso,'jpg');
                    setTimeout(() => {
                        window.location.href = "#examen="+respuesta.id_curso;
                    }, 1500);
                }
            });
        }else{
            $("#form_cursos input, #form_cursos select, #form_cursos textarea").each(function () {
                if ($(this).val().length < 1) {
                    $(this).removeClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                    $(this).addClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                }
                else {
                    $(this).removeClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                    $(this).addClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                }
            });
        }
    });

    $(document).on("click", "#agregar_curso", function(){
        var nombre_curso = $("#nombre_curso").val();
        var descripcion_curso = $("#descripcion_curso").val();
        var img_curso = $("#img_curso").val();
        var categorias = $("#categoria_curso").val();
        categorias_curso=JSON.stringify(categorias);
        if(nombre_curso.length > 0 && descripcion_curso.length > 0 && categorias.length > 0 && img_curso.length > 0) {
            $.ajax({
                type: "POST",
                url: "../php/c/1/agregar_curso.php",
                data: "nombre_curso=" + nombre_curso + "&descripcion_curso=" + descripcion_curso + "&categorias_curso=" + categorias_curso,
                success: function(respuesta){
                    alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                    uploadAjax('img_curso','cursos',respuesta.id_curso,'jpg');
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                }
            });
        }else{
            $("#form_cursos input, #form_cursos select, #form_cursos textarea").each(function () {
                if ($(this).val().length < 1) {
                    $(this).removeClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                    $(this).addClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                }
                else {
                    $(this).removeClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                    $(this).addClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                }
            });
        }
    });

    $(document).on("click", "#agregar_examen_curso", function(){
        var id_curso = $(this).data("id_curso");
        window.location.href = "#examen="+id_curso;
    });

    $(document).on("click", "#agregar_mas_unidades", function(){
        var id_curso = $(this).data("id_curso");
        window.location.href = "#unidad="+id_curso;
    });

    $(document).on("click", "#activar_curso", function(){
        var id_curso = $(this).data("id_curso");
        var estado = $(this).data("estado");
        $.ajax({
            type: "POST",
            url: "../php/c/1/cambiar_estado_curso.php",
            data: "id_curso=" + id_curso + "&estado=" + estado,
            success: function(respuesta){
                alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                setTimeout(() => {
                    window.location.reload();
                }, 1500);
            }
        });
    });

    $(document).on("click", "#desactivar_curso", function(){
        var id_curso = $(this).data("id_curso");
        var estado = $(this).data("estado");
        $.ajax({
            type: "POST",
            url: "../php/c/1/cambiar_estado_curso.php",
            data: "id_curso=" + id_curso + "&estado=" + estado,
            success: function(respuesta){
                alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                setTimeout(() => {
                    window.location.reload();
                }, 1500);
            }
        });
    });

    $(document).on("click", "#agregar_unidad_curso", function(){
        var nombre_unidad = $("#nombre_unidad").val();
        var id_curso = $("#nombre_unidad").data("id_curso");
        var documento_unidad = $("#documento_unidad").val();
        if(nombre_unidad.length > 0 && documento_unidad.length > 0){
            $.ajax({
                type: "POST",
                url: "../php/c/1/agregar_unidad_curso.php",
                data: "nombre_unidad=" + nombre_unidad + "&id_curso=" + id_curso,
                success: function(respuesta){
                    alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                    uploadAjax2('documento_unidad',id_curso,respuesta.id_unidad);
                    setTimeout(() => {
                        window.location.href = "#unidades=1";
                    }, 1500);
                }
            });    
        }else{
            $("#form_unidad input").each(function () {
                if ($(this).val().length < 1) {
                    $(this).removeClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                    $(this).addClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                }
                else {
                    $(this).removeClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                    $(this).addClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                }
            });
        }
        
    });

    $(document).on("click", "#agregar_respuestas_pregunta", function(){
        var numero_respuesta = $("#numero_respuestas").val();
        var numero_respuestas = parseInt(numero_respuesta) + 1;
        var contador_cantidad=0;
        $(".numero_respuestas").each(function(){        
            if($(this).val().length == 0 || $(this).val() == 0 || $(this).val() < 0 || $(this).val() % 1 > 0){
                contador_cantidad=contador_cantidad+1;
            }
        });
        if(contador_cantidad==0){
            $.ajax({
                type: "POST",
                url: "../php/v/1/respuestas_vista.php",
                data: "numero_respuestas="+numero_respuestas,
                success: function (respuesta) {
                    $("#respuestas").html(respuesta);
                }
            });    
        }else{
            alerta_generica("error","Numero Erroneo","Favor de agregar un numero entero.");
        }
    });

    $(document).on("click", "#agregar_preguntas_examen", function(){
        var pregunta_examen = $("#pregunta_examen").val();
        var id_curso = $("#pregunta_examen").data("id_curso");
        var numero_respuesta = $("#numero_respuestas").val();
        if(pregunta_examen.length > 0 && numero_respuesta.length > 0){
            $.ajax({
                type: "POST",
                url: "../php/c/1/agregar_pregunta_examen.php",
                data: "pregunta_examen=" + pregunta_examen + "&id_curso=" + id_curso,
                success: function(respuesta){
                    var numero_respuesta = $("#numero_respuestas").val();
                    var numero_respuestas = parseInt(numero_respuesta) + 1;
                    alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                    setTimeout(function(){
                        for($i=1; $i < numero_respuestas; $i++){
                            var respuestas = $("#respuesta_pregunta_"+$i).val();
                            var correcta_falsa = $("input[name=accountType"+$i+"]:checked").val();
                            agregar_respuestas_pregunta(respuesta.id_pregunta,respuestas,correcta_falsa,$i);
                        }
                        
                    }, 1500);
                }
            });
        }else{
            $("#form_examen input, form_examen textare, form_examen select").each(function () {
                if ($(this).val().length < 1) {
                    $(this).removeClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                    $(this).addClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                }
                else {
                    $(this).removeClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                    $(this).addClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                }
            });
        }
    });

    $(document).on("click", "#finalizar_examen", function(){
        var pregunta_examen = $("#pregunta_examen").val();
        var id_curso = $("#pregunta_examen").data("id_curso");
        var numero_respuesta = $("#numero_respuestas").val();
        if(pregunta_examen.length > 0 && numero_respuesta.length > 0){
            $.ajax({
                type: "POST",
                url: "../php/c/1/agregar_pregunta_examen.php",
                data: "pregunta_examen=" + pregunta_examen + "&id_curso=" + id_curso,
                success: function(respuesta){
                    var numero_respuesta = $("#numero_respuestas").val();
                    var numero_respuestas = parseInt(numero_respuesta) + 1;
                    alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                    setTimeout(function(){
                        for($i=1; $i < numero_respuestas; $i++){
                            var respuestas = $("#respuesta_pregunta_"+$i).val();
                            var correcta_falsa = $("input[name=accountType"+$i+"]:checked").val();
                            agregar_respuestas_pregunta2(respuesta.id_pregunta,respuestas,correcta_falsa,$i);
                        }
                    }, 1500);
                }
            });
        }else{
            $("#form_examen input, form_examen textare, form_examen select").each(function () {
                if ($(this).val().length < 1) {
                    $(this).removeClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                    $(this).addClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                }
                else {
                    $(this).removeClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                    $(this).addClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                }
            });
        }
    });
    
    $(document).on("click", "#modificar_categoria", function(){
        var id_categoria = $(this).data("id_categoria");
        $.ajax({
            type: "POST",
            url: "../php/v/1/modificacion_categoria.php",
            data: "id_categoria=" + id_categoria,
            success: function(respuesta){
                $("#modal").html(respuesta);
            }
        });
    });

    $(document).on("click", "#eliminar_categoria", function(){
        var id_categoria = $(this).data("id_categoria");
        $.ajax({
            type: "POST",
            url: "../php/v/1/eliminar_categoria.php",
            data: "id_categoria=" + id_categoria,
            success: function(respuesta){
                $("#modal").html(respuesta);
            }
        });
    });

    $(document).on("click", "#actualizar_categoria", function(){
        var id_categoria = $(this).data("id_categoria");
        var nombre_categoria_act = $("#nombre_categoria_act").val();
        var img_categoria_act = $("#img_categoria_act").val();
        if(nombre_categoria_act.length > 0 && img_categoria_act.length > 0) {
            $.ajax({
                type: "POST",
                url: "../php/c/1/actualizar_categoria.php",
                data: "id_categoria=" + id_categoria + "&nombre_categoria_act=" + nombre_categoria_act,
                success: function(respuesta){
                    alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                    uploadAjax('img_categoria_act','categorias',id_categoria,'jpg');
                    setTimeout(function(){
                        window.location.reload();
                    }, 1500);
                }
            });
        }else{
            $("#form_categoria_update input").each(function () {
                if ($(this).val().length < 1) {
                    $(this).removeClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                    $(this).addClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                }
                else {
                    $(this).removeClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                    $(this).addClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                }
            });
        }
    });

    $(document).on("click", "#eliminar_categoria_control", function(){
        var id_categoria = $(this).data("id_categoria");
        $.ajax({
            type: "POST",
            url: "../php/c/1/eliminar_categoria.php",
            data: "id_categoria=" + id_categoria,
            success: function(respuesta){
                alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                setTimeout(function(){
                    window.location.reload();
                }, 1500);
            }
        });
    });

    $(document).on("click", "#modificar_curso", function(){
        var id_curso = $(this).data("id_curso");
        window.location.href = "#curso="+id_curso;
    });

    $(document).on("click", "#actualizar_curso", function(){
        var nombre_curso = $("#nombre_curso_act").val();
        var id_curso = $(this).data("id_curso");
        var descripcion_curso = $("#descripcion_curso_act").val();
        var img_curso_act = $("#img_curso_act").val();
        var categorias = $("#categoria_curso_act").val();
        categorias_curso=JSON.stringify(categorias);
        if(nombre_curso.length > 0 && descripcion_curso.length > 0 && categorias.length > 0) {
            if(img_curso_act.length > 0){
                $.ajax({
                    type: "POST",
                    url: "../php/c/1/actualizar_curso.php",
                    data: "nombre_curso=" + nombre_curso + "&descripcion_curso=" + descripcion_curso + "&categorias_curso=" + categorias_curso + "&id_curso=" + id_curso,
                    success: function(respuesta){
                        alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                        uploadAjax('img_curso_act','cursos',id_curso,'jpg');
                        setTimeout(function(){
                            window.location.href = "#cursos=1";
                        }, 1500);
                    }
                });    
            }else{
                $.ajax({
                    type: "POST",
                    url: "../php/c/1/actualizar_curso.php",
                    data: "nombre_curso=" + nombre_curso + "&descripcion_curso=" + descripcion_curso + "&categorias_curso=" + categorias_curso + "&id_curso=" + id_curso,
                    success: function(respuesta){
                        alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                        setTimeout(function(){
                            window.location.href = "#cursos=1";
                        }, 1500);
                    }
                });   
            }
        }else{
            $("#form_curso input, #form_curso select, #form_curso textarea").each(function () {
                if ($(this).val().length < 1) {
                    $(this).removeClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                    $(this).addClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                }
                else {
                    $(this).removeClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                    $(this).addClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                }
            });
        }
    });

    $(document).on("click", "#preguntas_examen", function(){
        var id_examen = $(this).data("id_examen");
        window.location.href = "#preguntas="+id_examen;
    });

    $(document).on("click", "#modificar_pregunta", function(){
        var id_pregunta = $(this).data("id_pregunta");
        window.location.href = "#pregunta="+id_pregunta;
    });

    $(document).on("click", "#actualizar_examen",  function(){
        var id_pregunta = $(this).data("id_pregunta");
        var id_examen = $(this).data("id_examen");
        var pregunta = $("#pregunta_examen").val();
        var numero_vuelta = $(this).data("numero_vueltas");
        if(pregunta.length > 0 && numero_vuelta.length > 0){
            $.ajax({
                type: "POST",
                url: "../php/c/1/actualizar_pregunta.php",
                data: "id_pregunta=" + id_pregunta + "&pregunta=" + pregunta,
                success: function(respuesta){
                    alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                    setTimeout(function(){
                        for($i=0; $i < numero_vuelta; $i++){
                            var respuestas = $("#respuesta_pregunta_"+$i).val();
                            var correcta_falsa = $("input[name=accountType"+$i+"]:checked").val();
                            var id_respuesta_examen = $("#respuesta_pregunta_"+$i).data("id_respuesta_examen");
                            modificar_respuestas(id_respuesta_examen,respuestas,correcta_falsa,id_examen);
                        }
                    }, 1500);
                }
            });
        }else{
            $("#form_pregunta input, #form_pregunta select, #form_pregunta textarea").each(function () {
                if ($(this).val().length < 1) {
                    $(this).removeClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                    $(this).addClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                }
                else {
                    $(this).removeClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                    $(this).addClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                }
            });
        }
    });

    $(document).on("click", "#regresar_preguntas", function(){
        var id_examen = $(this).data("id_examen");
        window.location.href = "#preguntas="+id_examen;
    });
    
    $(document).on("click", "#editar_unidad", function(){
        var id_unidad = $(this).data("id_unidad");
        var id_curso = $(this).data("id_curso");
        $.ajax({
            type: "POST",
            url: "../php/v/1/modificar_unidad.php",
            data: "id_unidad=" + id_unidad + "&id_curso=" + id_curso,
            success: function(respuesta){
                $("#modal").html(respuesta);
            }
        });
    });

    $(document).on("click", "#eliminar_unidad", function(){
        var id_unidad = $(this).data("id_unidad");
        $.ajax({
            type: "POST",
            url: "../php/v/1/eliminar_unidad.php",
            data: "id_unidad=" + id_unidad,
            success: function(respuesta){
                $("#modal").html(respuesta);   
            }
        });
    });

    $(document).on("click", "#actualizar_unidad", function(){
        var id_unidad = $(this).data("id_unidad");
        var id_curso = $(this).data("id_curso");
        var nombre_unidad = $("#nombre_unidad_act").val();
        var doc_unidad_act = $("#doc_unidad_act").val();
        if(nombre_unidad.length > 0 && doc_unidad_act.length > 0){
            $.ajax({
                type: "POST",
                url: "../php/c/1/actualizar_unidad.php",
                data: "id_unidad=" + id_unidad + "&nombre_unidad=" + nombre_unidad,
                success: function(respuesta){
                    alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                    uploadAjax2('doc_unidad_act',id_curso,id_unidad);
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                }
            });
        }else{
            $("#form_unidad input, #form_unidad select, #form_unidad textarea").each(function () {
                if ($(this).val().length < 1) {
                    $(this).removeClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                    $(this).addClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                }
                else {
                    $(this).removeClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                    $(this).addClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                }
            });
        }
    });

    $(document).on("click", "#eliminar_unidad_control", function(){
        var id_unidad = $(this).data("id_unidad");
        $.ajax({
            type: "POST",
            url: "../php/c/1/eliminar_unidad.php",
            data: "id_unidad=" + id_unidad,
            success: function(respuesta){
                alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                setTimeout(() => {
                    window.location.reload();
                }, 1500);
            }
        });
    });
    
    $(document).on("input", "#municipios", function() {
        var municipios = $(this).val();
        $.ajax({
            type: "POST",
            url: "../php/v/1/vista_universidades.php",
            data: "municipios=" + municipios,
            success: function(respuesta){
                $("#universidad").html(respuesta); 
            }
        });
    });

    $(document).on("click", "#actulizar_alumno", function() {
        var nombre = $("#nombre").val();
        var correo = $("#correo").val();
        var curp = $("#curp").val();
        var direccion = $("#direccion").val();
        var telefono = $("#telefono").val();
        var fax = $("#fax").val();
        var universidades = $("#universidades").val();
        var usuario = $(this).data("id_usuario");
        if(nombre.length > 0 && correo.length > 0 && curp.length > 0 && direccion.length > 0 && telefono.length > 0 && fax.length > 0 && universidades.length > 0){
            $.ajax({
                type: "POST",
                url: "../php/c/1/actualizar_alumno.php",
                data: "nombre=" + nombre + "&correo=" + correo + "&curp=" + curp + "&direccion=" + direccion + "&telefono=" + telefono + "&fax=" + fax + "&universidades=" + universidades + "&usuario=" + usuario,
                success: function(respuesta){
                    alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                    setTimeout(() => {
                        window.location.href= "#alumnos=1";
                    }, 1500);
                }
            });
        }else{
            $("#form_alumno_update input, #form_alumno_update select, #form_alumno_update textarea").each(function () {
                if ($(this).val().length < 1) {
                    $(this).removeClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                    $(this).addClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                }
                else {
                    $(this).removeClass('border-red-600 dark:text-gray-300 focus:border-red-400 focus:shadow-outline-red');
                    $(this).addClass('dark:border-gray-600 focus:border-purple-400 focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray');
                }
            });
        }
    });

    $(document).on("click", "#activar_usuario", function(){
        var id_usuario = $(this).data("id_usuario");
        var estado = $(this).data("estado");
        $.ajax({
            type: "POST",
            url: "../php/c/1/cambiar_estado_usuario.php",
            data: "id_usuario=" + id_usuario + "&estado=" + estado,
            success: function(respuesta){
                alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                setTimeout(() => {
                    window.location.reload();
                }, 1500);
            }
        });
    });

    $(document).on("click", "#desactivar_usuario", function(){
        var id_usuario = $(this).data("id_usuario");
        var estado = $(this).data("estado");
        $.ajax({
            type: "POST",
            url: "../php/c/1/cambiar_estado_usuario.php",
            data: "id_usuario=" + id_usuario + "&estado=" + estado,
            success: function(respuesta){
                alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                setTimeout(() => {
                    window.location.reload();
                }, 1500);
            }
        });
    });
    
    function modificar_respuestas(id_respuesta_examen,respuestas,correcta_falsa,id_examen){
        $.ajax({
            type: "POST",
            url: "../php/c/1/actualizar_respuestas.php",
            data: "id_respuesta_examen=" + id_respuesta_examen + "&respuestas=" + respuestas + "&correcta_falsa=" + correcta_falsa,
            success: function(respuesta){
                alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                setTimeout(function(){
                    window.location.href = "#preguntas="+id_examen;
                }, 1500);
            }
        });
    }

    function agregar_respuestas_pregunta(id_pregunta,respuesta,correcta_falsa,numero_vuelta){
        var id_curso = $("#pregunta_examen").data("id_curso");
        $.ajax({
            type: "POST",
            url: "../php/c/1/agregar_respuestas.php",
            data: "id_pregunta=" + id_pregunta + "&respuesta=" + respuesta + "&correcta_falsa=" + correcta_falsa + "&numero_vuelta=" + numero_vuelta,
            success: function(respuesta){
                alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                setTimeout(function(){
                    window.location.reload();
                }, 1500);
            }
        });
    }
    
    function agregar_respuestas_pregunta2(id_pregunta,respuesta,correcta_falsa,numero_vuelta){
        var id_curso = $("#pregunta_examen").data("id_curso");
        $.ajax({
            type: "POST",
            url: "../php/c/1/agregar_respuestas.php",
            data: "id_pregunta=" + id_pregunta + "&respuesta=" + respuesta + "&correcta_falsa=" + correcta_falsa + "&numero_vuelta=" + numero_vuelta,
            success: function(respuesta){
                alerta_generica(respuesta.status,respuesta.header,respuesta.msg);
                setTimeout(function(){
                    window.location.href = "#examenes=1";
                }, 1500);
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
    
    function uploadAjax(id_inputFile, carpeta, nombre, extension) {
        var inputFile = document.getElementById(id_inputFile);
        var file = inputFile.files[0];
        var data = new FormData();
        data.append('archivo', file);
        data.append('carpeta', carpeta);
        data.append('nombre', nombre);
        data.append('extension', extension);
    
        $.ajax({
            type: 'POST',
            url: "../php/c/1/upload.php",
            contentType: false,
            data: data,
            processData: false,
            cache: false,
            success: function (respuesta) {
                if (respuesta.status == 'error') {
                    muestraMensajeError(respuesta.msg);
                }
            }
        });
    }

    function uploadAjax2(id_inputFile, carpeta, sub_carpeta) {
        var inputFile = document.getElementById(id_inputFile);
        var file = inputFile.files[0];
        var data = new FormData();
        data.append('archivo', file);
        data.append('carpeta', carpeta);
        data.append('sub_carpeta', sub_carpeta);
    
        $.ajax({
            type: 'POST',
            url: "../php/c/1/upload_archivos.php",
            contentType: false,
            data: data,
            processData: false,
            cache: false,
            success: function (respuesta) {
                if (respuesta.status == 'error') {
                    muestraMensajeError(respuesta.msg);
                }
            }
        });
    }

});