<?php
session_start();
include_once("php/m/SQLConexion.php");
$sql = new SQLConexion();
$row_cursos = $sql->obtenerDatos("CALL sp_select_cursos_limite()");
$total_cursos = count($row_cursos);
function select_campo_img($ruta,$id){
	// Cantidad de carpetas a salir, depende de donde este ubicado el archivo actual
	$ruta_full = $ruta.$id;
	
	if(is_dir($ruta_full)){
		if(count(scandir($ruta_full)) > 2){
			$primer_archivo = scandir($ruta_full)[2];
			return $ruta.$id.'/'.$primer_archivo;
		}else{
			// Solo aparece cuando existe carpeta pero no la imagen
			return 'https://miracomosehace.com/wp-content/uploads/2020/06/error-web.jpg';
		}
	}else{
		// Solo aparece si no existe la carpeta, muestra la imagen por defecto de la carpeta
		return $ruta.'default.png';
	}
}
?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <title>Academia</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
      <link rel="stylesheet" href="fonts/icomoon/style.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/jquery-ui.css">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="css/jquery.fancybox.min.css">
      <link rel="stylesheet" href="css/bootstrap-datepicker.css">
      <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
      <link rel="stylesheet" href="css/aos.css">
      <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="css/style.css">
   </head>
   <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
      <div class="site-wrap">
         <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
               <div class="site-mobile-menu-close mt-3">
                  <span class="icon-close2 js-menu-toggle"></span>
               </div>
            </div>
            <div class="site-mobile-menu-body"></div>
         </div>
         <div class="py-2 bg-light">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-lg-9 d-none d-lg-block">
                     <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> ¿Problemas o dudas?</a>
                     <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span> +52 123 546 7890</a>
                     <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span> info@correo.com</a>
                  </div>
                  <div class="col-lg-3 text-right">
                     <a href="panel/" class="small mr-3"><span class="icon-unlock-alt"></span> Acceder</a>
                     <a href="panel/" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span> Registrarme</a>
                  </div>
               </div>
            </div>
         </div>
         <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
            <div class="container">
               <div class="d-flex align-items-center">
                  <div class="site-logo">
                     <a href="index.html" class="d-block">
                     <img src="images/logo.jpg" alt="Image" class="img-fluid">
                     </a>
                  </div>
                  <div class="mr-auto">
                     <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                           <li class="active">
                              <a href="#" class="nav-link text-left">Inicio</a>
                           </li>
                           <li>
                              <a href="#" class="nav-link text-left">Casos de exito</a>
                           </li>
                           <li>
                              <a href="panel/" class="nav-link text-left">Cursos</a>
                           </li>
                           <li>
                              <a href="#" class="nav-link text-left">Acerca de</a>
                           </li>
                           <li>
                              <a href="#" class="nav-link text-left">Contacto</a>
                           </li>
                        </ul>
                        </ul>
                     </nav>
                  </div>
                  <div class="ml-auto">
                     <div class="social-wrap">
                        <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                           class="icon-menu h3"></span></a>
                     </div>
                  </div>
               </div>
            </div>
         </header>
         <div class="hero-slide owl-carousel site-blocks-cover">
           <!-- Carousel copiar y pegar estos divs -->
            <div class="intro-section" style="background-image: url('images/hero_1.jpg');">
               <div class="container">
                  <div class="row align-items-center">
                     <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
                        <h1 class="titulo-carousel">Cree en tu idea</h1>
                     </div>
                  </div>
               </div>
            </div>
            <!-- End Carousel -->
         </div>
         <div></div>
         <div class="site-section">
            <div class="container">
               <div class="row mb-5 justify-content-center text-center">
                  <div class="col-lg-4 mb-5">
                     <h2 class="section-title-underline mb-5">
                        <span>Academia, completamente gratis</span>
                     </h2>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                     <div class="feature-1 border">
                        <div class="icon-wrapper bg-primary">
                           <span class="flaticon-mortarboard text-white"></span>
                        </div>
                        <div class="feature-1-content">
                           <h2>Certificaciones gratuitas</h2>
                           <p>Termina los cursos y obten certificaciones personalizadas</p>
                           <p><a href="panel/" class="btn btn-primary px-4 rounded-0">Comenzar</a></p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                     <div class="feature-1 border">
                        <div class="icon-wrapper bg-primary">
                           <span class="flaticon-school-material text-white"></span>
                        </div>
                        <div class="feature-1-content">
                           <h2>Mejora tus habilidades</h2>
                           <p>Con nuestros cursos, aprende y mejora tus capacidades</p>
                           <p><a href="panel/" class="btn btn-primary px-4 rounded-0">Comenzar</a></p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                     <div class="feature-1 border">
                        <div class="icon-wrapper bg-primary">
                           <span class="flaticon-library text-white"></span>
                        </div>
                        <div class="feature-1-content">
                           <h2>Para estudiantes</h2>
                           <p>Te asesoraremos con todo lo que necesites para emprender.</p>
                           <p><a href="panel/" class="btn btn-primary px-4 rounded-0">Comenzar</a></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="site-section">
            <div class="container">
               <div class="row mb-5 justify-content-center text-center">
                  <div class="col-lg-6 mb-5">
                     <h2 class="section-title-underline mb-3">
                        <span>Cursos populares</span>
                     </h2>
                     <p>No pierdas la oportunidad, empieza hoy mismo.</p>
                  </div>
               </div>
               <div class="row">
                  <div class="col-12">
                      <div class="owl-slide-3 owl-carousel">
                      <?php
                        if ($total_cursos > 0) {
                            for ($i=0; $i < $total_cursos; $i++) {
                                ?>
                                
                                   <!-- Cursos populares copiar y pegar estos divs -->
                                    <div class="course-1-item">
                                       <figure class="thumnail">
                                          <a href="course-single.html"><img src="<?php echo select_campo_img('img/cursos/',$row_cursos[$i]['id_curso']) ?>" alt="Image" class="img-fluid"></a>
                                          <div class="category">
                                             <h3></h3>
                                          </div>
                                       </figure>
                                       <div class="course-1-content pb-4">
                                          <h2><?php echo $row_cursos[$i]['nombre_curso']; ?></h2>
                                          <p class="desc mb-4"><?php echo $row_cursos[$i]['descripcion_curso']; ?></p>
                                          <p><a href="panel/" class="btn btn-primary rounded-0 px-4">Comenzar</a></p>
                                       </div>
                                    </div>
                                    
                                
                            <?php }
                        }
                            ?>
                     <!-- Termina cursos populares-->
                                 </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="section-bg style-1" style="background-image: url('images/about_1.jpg');">
            <div class="container">
               <div class="row">
                  <div class="col-lg-4">
                     <h2 class="section-title-underline style-2">
                        <span>¿Que es Academia?</span>
                     </h2>
                  </div>
                  <div class="col-lg-8">
                     <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem nesciunt quaerat ad reiciendis perferendis voluptate fugiat sunt fuga error totam.</p>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus assumenda omnis tempora ullam alias amet eveniet voluptas, incidunt quasi aut officiis porro ad, expedita saepe necessitatibus rem debitis architecto dolore? Nam omnis sapiente placeat blanditiis voluptas dignissimos, itaque fugit a laudantium adipisci dolorem enim ipsum cum molestias? Quod quae molestias modi fugiat quisquam. Eligendi recusandae officiis debitis quas beatae aliquam?</p>
                  </div>
               </div>
            </div>
         </div>

         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-lg-3">
                     <p class="mb-4"><img src="images/logo.png" alt="Image" class="img-fluid"></p>
                     <p>Esto es un texto de ejemplo.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- .site-wrap -->
      <!-- loader -->
      <div id="loader" class="show fullscreen">
         <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/>
         </svg>
      </div>
      <script src="main-js/jquery-3.3.1.min.js"></script>
      <script src="main-js/jquery-migrate-3.0.1.min.js"></script>
      <script src="main-js/jquery-ui.js"></script>
      <script src="main-js/popper.min.js"></script>
      <script src="main-js/bootstrap.min.js"></script>
      <script src="main-js/owl.carousel.min.js"></script>
      <script src="main-js/jquery.stellar.min.js"></script>
      <script src="main-js/jquery.countdown.min.js"></script>
      <script src="main-js/bootstrap-datepicker.min.js"></script>
      <script src="main-js/jquery.easing.1.3.js"></script>
      <script src="main-js/aos.js"></script>
      <script src="main-js/jquery.fancybox.min.js"></script>
      <script src="main-js/jquery.sticky.js"></script>
      <script src="main-js/jquery.mb.YTPlayer.min.js"></script>
      <script src="main-js/main.js"></script>
   </body>
</html>
