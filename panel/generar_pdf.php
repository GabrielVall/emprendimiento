<?php
session_start();
include_once("../php/m/SQLConexion.php");
$sql = new SQLConexion();


// SELECT DE LA INFO DEL PROYECTO
$row_proyecto = $sql->obtenerDatos("CALL sp_select_proyecto_id('".$_GET['id']."')");
require('../fpdf/fpdf.php');
$row_proyecto[0]['id_proyecto'] = str_pad($row_proyecto[0]['id_proyecto'], 8, '0', STR_PAD_LEFT);

// SELECT DE LA INFO ADICIONAL DEL USUARIO
$row_datos_usuario = $sql->obtenerDatos("CALL sp_select_info_usuario('".$row_proyecto[0]['id_usuario']."')");

// SELECT DE LOS PARTICIPANTES DEL PROYECTO
$row_participantes = $sql->obtenerDatos("CALL sp_select_participantes('".$_GET['id']."')");

// SELECT DE LOS APOYOS DEL PROYECTO
$row_apoyos = $sql->obtenerDatos("CALL sp_select_apoyos_proyecto('".$_GET['id']."')");
$total_apoyos = count($row_apoyos);

// SELECT DE LOS TRAMITES DEL PROYECTO
$row_tramite = $sql->obtenerDatos("CALL sp_select_tramites_proyecto('".$_GET['id']."')");
$total_tramites = count($row_tramite);

// SELECT DE LOS TRAMITES DEL PROYECTO
$row_sector = $sql->obtenerDatos("CALL sp_select_sectores_impacto_proyecto('".$_GET['id']."')");
$total_sectores = count($row_sector);



$folio = $row_proyecto[0]['id_proyecto'];
$fecha_recepcion = $row_proyecto[0]['fecha'];
$nombre_empresa = $row_proyecto[0]['nombre'];
$nombre_usuario = $row_datos_usuario[0]['nombre'];
$curp_usuario = $row_datos_usuario[0]['curp'];
$direccion_usuario = $row_datos_usuario[0]['direccion'];
$email_usuario = $row_datos_usuario[0]['correo'];
$telefono_usuario = $row_datos_usuario[0]['telefono'];
$fax_usuario =  $row_datos_usuario[0]['fax'];
$rfc_empresa = $row_proyecto[0]['rfc'];
$instituto_usuario = $row_datos_usuario[0]['nombre_universidad'];
$tiempo_desarrollo = $row_proyecto[0]['tiempo_desarrollo'];
$como_llegaste = $row_datos_usuario[0]['como_llegaste'];
$otro_apoyo = $row_datos_usuario[0]['como_llegaste'];

$descripcion = $row_proyecto[0]['descripcion_proyecto'];

$objetivos = $row_proyecto[0]['objetivos'];

$base_tecnologica = $row_proyecto[0]['razones_tec'];

$instalaciones_detalle = $row_proyecto[0]['instalaciones'];

$equipo_maquinaria = $row_proyecto[0]['maquinaria'];

$clientes_potenciales = $row_proyecto[0]['clientes_potenciales'];

$productos_similares = $row_proyecto[0]['productos_similares'];

$impacto_ecologico = $row_proyecto[0]['imp_amb'];

$nombre_comunidad = $row_proyecto[0]['nombre_comunidad'];
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../recursos_pdf/header.png',10,8,180);
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-20);
    $this->SetX(25);
   $this->Image('../recursos_pdf/footer.png');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
// HOJA 1
$pdf->Ln(20);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0, 0, utf8_decode("Ficha Técnica del Proyecto"), 0, 0, 'C');

$pdf->Ln(5);
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,5,utf8_decode('La Incubadora tiene como misión el promover y estimular la creación de empresas de alta competitividad y profesionalismo en un contexto de globalidad y responsabilidad social, mediante la aplicación del modelo de incubación de la red de incubadoras de las Universidades Tecnológicas.'));

$pdf->Ln(5);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 0, utf8_decode("Para uso exclusivo de la Incubadora:"), 0, 0, 'L');

$pdf->Ln(7);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0, 0, utf8_decode("Folio: ".$folio), 0, 0, 'L');

$pdf->Ln(7);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0, 0, utf8_decode("Fecha de recepción: ".$fecha_recepcion), 0, 0, 'L');

$pdf->Ln(7);
$pdf->SetX(10);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 0, utf8_decode("SECCIÓN 1: DATOS GENERALES"), 0, 0, 'L');

// NOMBRE DE LA EMPRESA
$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('1.1 NOMBRE DE LA EMPRESA. Especifique el nombre de su proyecto y/o empresa.'));

$pdf->Ln(5);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0, 0, utf8_decode($nombre_empresa), 0, 0, 'L');

// RESPONSABLE DE LA EMPRESA
$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('1.2 RESPONSABLE DEL PROYECTO-EMPRESA. Escriba el nombre y datos de la persona que estará a cargo del proyecto - empresa.'));

$pdf->Ln(7);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0, 0, utf8_decode("Nombre: ".$nombre_usuario), 0, 0, 'L');

$pdf->Ln(7);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0, 0, utf8_decode("CURP: ".$curp_usuario), 0, 0, 'L');

$pdf->Ln(7);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0, 0, utf8_decode("Dirección: ".$direccion_usuario), 0, 0, 'L');

$pdf->Ln(7);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0, 0, utf8_decode("Email: ".$email_usuario), 0, 0, 'L');

$pdf->Ln(7);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0, 0, utf8_decode("Telefono: ".$telefono_usuario), 0, 0, 'L');

$pdf->Ln(7);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0, 0, utf8_decode("Fax: ".$fax_usuario), 0, 0, 'L');

// PERSONAS INVOLUCRADAS
$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('1.3 PERSONAS INVOLUCRADAS EN EL PROYECTO-EMPRESA. Escriba el nombre y el cargo de todas las personas que participan en el proyecto - empresa.'));
// TABLA
$altura_celda=7;
// HEADERS
    $altura_tbl = 185;  // Posicion Y de la tabla
    $td1x = 30; // posicion x td
    $td1y = 45; // ancho td1
    $td2x = 75; 
    $td2y = 35;
    $td3x = 110;
    $td3y = 70;
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetFillColor(42,42,42);
    $pdf->SetTextColor(255,255,255);
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, "Nombre.",1,1,'C', true);
    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, "CURP",1,1,'C', true);
    $pdf->setXY($td3x,$altura_tbl);
    $pdf->Cell($td3y, $altura_celda,  utf8_decode("Cargo o Actividad desempeñada"),1,1,'C', true);
// BODY
    $pdf->SetFont('Arial', '', 8);
    $pdf->SetTextColor(0,0,0);
    $total = count($row_participantes);
    for ($i = 0; $i < $total; $i++){
        $altura_tbl = $altura_tbl + 7;    
        // Nombre participante
        $pdf->setXY($td1x,$altura_tbl);
        $pdf->Cell($td1y, $altura_celda, $row_participantes[$i]['nombre'],1,1,'C', false);

        // curp participante
        $pdf->setXY($td2x,$altura_tbl);
        $pdf->Cell($td2y, $altura_celda, $row_participantes[$i]['curp'],1,1,'C', false);

        // cargo participante
        $pdf->setXY($td3x,$altura_tbl);
        $pdf->Cell($td3y, $altura_celda, $row_participantes[$i]['cargo'],1,1,'C', false);
    }
        
    $pdf->SetXY(25,232);
$pdf->MultiCell(0,5,utf8_decode('¿ESTÁ CONSTITUIDA LEGALMENTE SU EMPRESA? (Marque con una "X" en una de las siguientes casillas).'));

$pdf->Ln(2);


$const_si = '';
$const_no = '';
$const_proceso = '';
switch ($row_proyecto[0]['constitucion_legal']) {
    case 1:
        $const_si = 'X';
        break;
    case 2:
        $const_no = 'X';
        break;
    case 3:
        $const_proceso = 'X';
        break;
}
$pdf->SetXY(25,238);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 15, utf8_decode("Si"), 0, 0, 'L');
$pdf->Cell(15, 15, $const_si,1,1,'C', false);

$pdf->SetXY(75,238);
$pdf->Cell(15, 15, utf8_decode("No"), 0, 0, 'L');
$pdf->Cell(15, 15, $const_no,1,1,'C', false);

$pdf->SetXY(130,238);
$pdf->Cell(15, 15, utf8_decode("En proceso"), 0, 0, 'R');
$pdf->SetXY(150,238);
$pdf->Cell(15, 15, $const_proceso,1,1,'C', false);


$pdf->AddPage();

// RFC EMPRESA EN CASO DE
$pdf->Ln(20);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('1.5 EN CASO DE SER AFIRMATIVO, PROPORCIONE EL REGISTRO FEDERAL DE CONTRIBUYENTE.'));

$pdf->Ln(5);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0, 0, utf8_decode("RFC: ".$rfc_empresa), 0, 0, 'L');

// Creacion de la nueva empresa
$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('1.6 CREACIÓN DE NUEVA EMPRESA. En caso de que aún no este constituida su empresa, por favor marque con "X" la siguiente casilla.'));

$nueva_si = '';
if ($row_proyecto[0]['nueva'] == 0) {
    $nueva_si = 'X';
}
$pdf->Ln(2);
$pdf->SetX(60);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 15, utf8_decode("Creación de nueva empresa"), 0, 0, 'L');
$pdf->SetX(120);
$pdf->Cell(15, 15, $nueva_si,1,1,'C', false);

// Creacion de nueva empresa
$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('1.7 INSTITUCIÓN DE PROCEDENCIA. Mencione el nombre de la institución, centro, unidad, escuela o universidad de la que procede.'));

$pdf->Ln(5);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0, 0, utf8_decode($instituto_usuario), 0, 0, 'L');

// Creacion de nueva empresa
$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('1.8 ¿CUÁNTO  TIEMPO LLEVA DESARROLLANDO SU PROYECTO-EMPRESA?.'));

$pdf->Ln(5);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0, 0, utf8_decode($tiempo_desarrollo), 0, 0, 'L');

// Creacion de nueva empresa
$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('1.9 ¿CÓMO SE ENTERÓ DE LOS SERVICIOS QUE OFRECE LA INCUBADORA? Mencione el medio por el cual conoció acerca de nuestros servicios.'));

$pdf->Ln(5);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0, 0, utf8_decode($como_llegaste), 0, 0, 'L');


// HOJA 3
// SECCION 2
$pdf->AddPage();
$pdf->Ln(20);
$pdf->SetX(10);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 0, utf8_decode("SECCIÓN 2: INFORMACIÓN DEL PROYECTO"), 0, 0, 'L');

// DESCRIPCION
$pdf->SetFont('Arial','I',11);
$pdf->Ln(5);
$pdf->MultiCell(0,5,utf8_decode('2.1 DESCRIPCIÓN DEL PROYECTO. Proporcione un breve resumen del proyecto. Máximo 2 cuartillas.'));
$pdf->Ln(5);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,5,utf8_decode($descripcion));



// Objetivos
$pdf->AddPage();
$pdf->SetFont('Arial','I',11);
$pdf->Ln(20);
$pdf->MultiCell(0,5,utf8_decode('2.2 OBJETIVO DEL PROYECTO. Describa el o los objetivos de su proyecto.'));


$pdf->Ln(5);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,5,utf8_decode($objetivos));

$pdf->AddPage();
$pdf->Ln(20);
$pdf->SetX(10);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('2.3 APOYOS REQUERIDOS. Especifique el tipo de apoyos que consideren necesarios para su proyecto-empresa. (Marque con una "X" en una de las siguientes casillas. Puede marcar más de una opción).'));


if($total_apoyos > 0){
    $sx = 25;
    $sy = 65;
    for ($i=0; $i < $total_apoyos; $i++) { 
        $sy = $sy + 5;
        $lc = 85;
        if($i > 5){
          $lc = 170; 
          $sx = 110;
          $sy = 65 * ($i * 5);
        }
        $pdf->SetXY($sx,$sy);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(10, 5, utf8_decode("".$row_apoyos[$i]['id_apoyo'].". ".$row_apoyos[$i]['apoyo']), 0, 0, 'L');
        $pdf->SetXY($lc,70 + $i * 5);
        $pdf->Cell(10, 5, 'X',1,1,'C', false);

        
    }
}


// $pdf->SetXY(110,95);
// $pdf->SetFont('Arial','',11);
// $pdf->Cell(10, 5, utf8_decode("Otro : ".$otro_apoyo), 0, 0, 'L');


// SECCION 3
$pdf->Ln(15);
$pdf->SetX(10);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 0, utf8_decode("SECCIÓN 3: ESTADO TECNOLÓGICO DEL PROYECTO-EMPRESA."), 0, 0, 'L');

$pdf->SetFont('Arial','I',11);
$pdf->Ln(5);
$pdf->MultiCell(0,5,utf8_decode('3.1 ¿CONSIDERA QUE SU PROYECTO ES DE BASE TECNOLÓGICA? Marque con una “X” en una de las siguientes casillas. Se sugiere que antes de contestar lea la siguiente definición.'));

if ($row_proyecto[0]['es_tecnologico'] == 1) {
    $tec_si = 'X';
    $tec_no = '';
}else{
    $tec_no = 'X';
    $tec_si = '';
}
$pdf->SetXY(50,128);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("Si"), 0, 0, 'L');
$pdf->Cell(15, 5, $tec_si,1,1,'C', false);

$pdf->SetXY(110,128);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("No"), 0, 0, 'L');
$pdf->Cell(15, 5, $tec_no,1,1,'C', false);

$pdf->Ln(20);
$pdf->SetX(10);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 0, utf8_decode("Definición de Base Tecnológica"), 0, 0, 'L');


$pdf->SetFont('Arial','I',11);
$pdf->Ln(5);
$pdf->MultiCell(0,5,utf8_decode('3.2 BASE TECNOLÓGICA DEL PROYECTO. En caso que la respuesta a la pregunta 3.1 haya sido afirmativa, describa las razones por las que considera que su empresa-proyecto es de base tecnológica.'));

$pdf->Ln(7);
$pdf->MultiCell(0,5,utf8_decode($base_tecnologica));

// HOJA 4
$pdf->AddPage();


$pdf->Ln(20);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('3.3 ¿EN QUE GRADO TECNOLÓGICO CONSIDERA QUE SE ENCUENTRA SU PROYECTO? En caso que la respuesta a la pregunta 3.1 haya sido afirmativa, seleccione con una "X" una de las siguientes opciones.'));

if ($row_proyecto[0]['grado_tecnologico'] > 0) {
    $g1 = ''; $g2 = ''; $g3 = ''; $g4 = ''; $g5 = '';
    switch ($row_proyecto[0]['grado_tecnologico']) {
        case 1:    
            $g1 = 'X';
        break;
        case 2:    
            $g2 = 'X';
        break;
        case 3:    
            $g3 = 'X';
        break;
        case 4:    
            $g4 = 'X';
        break;
        case 5:    
            $g5 = 'X';
        break;
    }
}
// TABLA
$altura_celda=7;
// HEADERS
    $altura_tbl = 70;  // Posicion Y de la tabla
    $td1x = 50; // posicion x td
    $td1y = 60; // ancho td1
    $td2x = 110;
    $td2y = 35;
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetFillColor(243,243,243);
    $pdf->SetTextColor(0,0,0);
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, "Grado.",1,1,'C', true);
    $pdf->setXY($td2x,$altura_tbl);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(128,128,128);
    
    $pdf->Cell($td2y, $altura_celda, "",1,1,'C', true);
// BODY
    $pdf->SetFont('Arial', '', 8);
    $pdf->SetTextColor(0,0,0);

    // Row 1
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, 'a) Idea',1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, $g1,1,1,'C', false);

    // Row 2
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('b) Investigación científica'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, $g2,1,1,'C', false);

    // Row 3
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('c) Desarrollo tecnológico'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, $g3,1,1,'C', false);

    // Row 4
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('d) Prototipo'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, $g4,1,1,'C', false);

     // Row 5
     $altura_tbl = $altura_tbl + 7;    
     $pdf->setXY($td1x,$altura_tbl);
     $pdf->Cell($td1y, $altura_celda, utf8_decode('e) Producto en proceso de comercialización'),1,1,'C', false);
 
     $pdf->setXY($td2x,$altura_tbl);
     $pdf->Cell($td2y, $altura_celda, $g5,1,1,'C', false);


$pdf->SetFont('Arial','I',11);
$pdf->Ln(5);
$pdf->MultiCell(0,5,utf8_decode('3.4 INNOVACIÓN DEL PRODUCTO. El grado de innovación del producto o servicio que desarrolla o va a desarrollar lo considera como: (marque con una “X” en una de las siguientes casillas).'));

$in_1 = ''; $in_2 = ''; $in_3 = '';

switch ($row_proyecto[0]['inovacion']){
    case 1:
        $in_1 = 'X';
        break;
    case 2:
        $in_2 = 'X';
        break;
    case 3:
        $in_3 = 'X';
        break;
}

$pdf->Ln(2);
$pdf->SetXY(25,130);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 15, utf8_decode("Inovación total"), 0, 0, 'L');
$pdf->SetXY(55,130);
$pdf->Cell(15, 15, $in_1,1,1,'C', false);

$pdf->SetXY(75,130);
$pdf->Cell(15, 15, utf8_decode("Modificación"), 0, 0, 'L');
$pdf->SetXY(100,130);
$pdf->Cell(15, 15, $in_2,1,1,'C', false);

$pdf->SetXY(140,130);
$pdf->Cell(15, 15, utf8_decode("Producto estándar"), 0, 0, 'R');
$pdf->SetXY(160,130);
$pdf->Cell(15, 15, $in_3,1,1,'C', false);


$pdf->SetFont('Arial','I',11);
$pdf->Ln(5);
$pdf->MultiCell(0,5,utf8_decode('3.5 INTENSIDAD TECNOLÓGICA DE LA EMPRESA.'));


switch($row_proyecto[0]['intensidad']){
    case 1:
        $intensidad = 'Empresa de alta intensidad tecnológica';
        break;
    case 2:
        $intensidad = 'Empresa de media intensidad tecnológica';
        break;
    case 3:
        $intensidad = 'Empresa de baja intensidad tecnológica';
        break;
}


$pdf->Ln(5);
$pdf->MultiCell(0,5,utf8_decode($intensidad));



$inst_si = ''; $inst_no = '';
if($row_proyecto[0]['tiene_instalaciones'] == 1){
    $inst_si = 'X';
}else{
    $inst_no = 'X';
}
$pdf->SetFont('Arial','I',11);
$pdf->Ln(5);
$pdf->MultiCell(0,5,utf8_decode('3.6 ¿CUENTA CON INSTALACIONES PARA EL DESARROLLO DE SU PROYECTO?'));

$pdf->SetXY(50,180);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("Si"), 0, 0, 'L');
$pdf->Cell(15, 5, $inst_si,1,1,'C', false);

$pdf->SetXY(110,180);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("No"), 0, 0, 'L');
$pdf->Cell(15, 5, $inst_no,1,1,'C', false);



// Nueva hoja
$pdf->AddPage();

$pdf->Ln(20);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('3.7 EN CASO AFIRMATIVO, ESPECIFIQUE CON QUE INSTALACIONES CUENTA.'));

$pdf->Ln(5);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,5,utf8_decode($instalaciones_detalle));

$maq_si = ''; $maq_no = '';
if($row_proyecto[0]['tiene_maquinaria'] == 1){
    $maq_si = 'X';
}else{
    $maq_no = 'X';
}
$pdf->SetFont('Arial','I',11);
$pdf->Ln(5);
$pdf->MultiCell(0,5,utf8_decode('3.8 ¿CUENTA CON ALGÚN EQUIPO O MAQUIINARIA PARA EL DESARROLLO DE SU PROYECTO? (Marque con una “X” en una de las siguientes casillas).'));

$pdf->SetXY(50,90);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("Si"), 0, 0, 'L');
$pdf->Cell(15, 5, $maq_si,1,1,'C', false);

$pdf->SetXY(110,90);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("No"), 0, 0, 'L');
$pdf->Cell(15, 5, $maq_no,1,1,'C', false);


$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('3.8 EN CASO AFIRMATIVO, ESPECIFIQUE CON QUÉ EQUIPO O MAQUINARIA CUENTA.'));

$pdf->Ln(5);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,5,utf8_decode($instalaciones_detalle));

// SECCION 4
$pdf->Ln(5);
$pdf->SetX(10);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 0, utf8_decode("SECCIÓN 4: MERCADO"), 0, 0, 'L');

$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('4.1 ¿QUÉ NECESIDADES DEL MERCADO SATISFACE LA EMPRESA? Describa clara y brevemente las necesidades que atiende el producto.'));

$pdf->Ln(5);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,5,utf8_decode($equipo_maquinaria));




$merc_si = ''; $merc_no = '';
if($row_proyecto[0]['tiene_maquinaria'] == 1){
    $merc_si = 'X';
}else{
    $merc_no = 'X';
}
$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('4.2 ¿CONOCE EL MERCADO POTENCIAL PARA SU PROYECTO? (Marque con una “X” en una de las siguientes casillas).'));

$pdf->SetXY(50,185);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("Si"), 0, 0, 'L');
$pdf->Cell(15, 5, $merc_si,1,1,'C', false);

$pdf->SetXY(110,185);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("No"), 0, 0, 'L');
$pdf->Cell(15, 5, $merc_no,1,1,'C', false);

$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('4.3 EN CASO AFIRMATIVO, DESCRIBA CUÁLES SON LAS CARACTERÍSTICAS DE SUS CLIENTES POTENCIALES.'));

$pdf->Ln(5);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,5,utf8_decode($clientes_potenciales));




// Nueva hoja
$pdf->AddPage();



if ($row_proyecto[0]['ambito_operacion'] > 0) {
    $a1 = ''; $a2 = ''; $a3 = ''; $a4 = ''; $a5 = '';
    switch ($row_proyecto[0]['grado_tecnologico']) {
        case 1:    
            $a1 = 'X';
        break;
        case 2:    
            $a2 = 'X';
        break;
        case 3:    
            $a3 = 'X';
        break;
        case 4:    
            $a4 = 'X';
        break;
        case 5:    
            $a5 = 'X';
        break;
    }
}


$pdf->Ln(20);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('4.4 ÁMBITO DE OPERACIÓN DEL PROYECTO-EMPRESA. Indique cuál es el nivel de operación que tiene actualmente su empresa. Si aún no inicia operaciones, entonces cual sería el proyectado (marque con una “X” en una de las siguientes casillas).'));
// TABLA
$altura_celda=7;
// HEADERS
    $altura_tbl = 70;  // Posicion Y de la tabla
    $td1x = 50; // posicion x td
    $td1y = 60; // ancho td1
    $td2x = 110;
    $td2y = 35;
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetFillColor(243,243,243);
    $pdf->SetTextColor(0,0,0);
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, "Nivel.",1,1,'C', true);
    $pdf->setXY($td2x,$altura_tbl);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(128,128,128);
    
    $pdf->Cell($td2y, $altura_celda, "",1,1,'C', true);
// BODY
    $pdf->SetFont('Arial', '', 8);
    $pdf->SetTextColor(0,0,0);

    // Row 1
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, 'Internacional',1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, $a1,1,1,'C', false);

    // Row 2
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Nacional'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, $a2,1,1,'C', false);

    // Row 3
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Regional'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, $a3,1,1,'C', false);

    // Row 4
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Estatal'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, $a4,1,1,'C', false);

     // Row 5
     $altura_tbl = $altura_tbl + 7;    
     $pdf->setXY($td1x,$altura_tbl);
     $pdf->Cell($td1y, $altura_celda, utf8_decode('Municipal'),1,1,'C', false);
 
     $pdf->setXY($td2x,$altura_tbl);
     $pdf->Cell($td2y, $altura_celda, $a5,1,1,'C', false);







$sim_si = ''; $sim_no = '';
if($row_proyecto[0]['existen_similares'] == 1){
    $sim_si = 'X';
}else{
    $sim_no = 'X';
}
$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('4.5 ¿EXISTEN EN EL MERCADO PRODUCTOS SIMILARES Y/O SUSTITUTOS AL SUYO? (Marque con una “X” en una de las siguientes casillas).'));

$pdf->SetXY(50,128);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("Si"), 0, 0, 'L');
$pdf->Cell(15, 5, $sim_si,1,1,'C', false);

$pdf->SetXY(110,128);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("No"), 0, 0, 'L');
$pdf->Cell(15, 5, $sim_no,1,1,'C', false);


$pdf->Ln(5);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,5,utf8_decode($productos_similares));



$prop_si = ''; $prop_no = '';
if($row_proyecto[0]['existen_similares'] == 1){
    $prop_si = 'X';
}else{
    $prop_no = 'X';
}
// Seccion 5
$pdf->Ln(5);
$pdf->SetX(10);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 0, utf8_decode("SECCION 5: PROPIEDAD INTELECTUAL"), 0, 0, 'L');

$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('5.1 ¿HA REALIZADO ALGÚN TRÁMITE DE PROPIEDAD INTELECTUAL PARA SU PROYECTO? (Marque con una “X” en una de las siguientes casillas).'));

$pdf->SetXY(50,170);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("Si"), 0, 0, 'L');
$pdf->Cell(15, 5, $prop_si,1,1,'C', false);

$pdf->SetXY(110,170);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("No"), 0, 0, 'L');
$pdf->Cell(15, 5, $prop_no,1,1,'C', false);

$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('5.2 EN CASO DE SER AFIRMATIVO, MENCIONE EN CUAL DE LAS SIGUIENTES CATEGORÍAS. (Marque con una “X” en una de las siguientes casillas).'));

// TABLA
$altura_celda=7;
// HEADERS
    $altura_tbl = 200;  // Posicion Y de la tabla
    $td1x = 50; // posicion x td
    $td1y = 60; // ancho td1
    $td2x = 110;
    $td2y = 35;
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetFillColor(243,243,243);
    $pdf->SetTextColor(0,0,0);
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, "Registro de marca ",1,1,'C', true);
    $pdf->setXY($td2x,$altura_tbl);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(128,128,128);
    
    $pdf->Cell($td2y, $altura_celda, "",1,1,'C', true);
// BODY
    $pdf->SetFont('Arial', '', 8);
    $pdf->SetTextColor(0,0,0);

    for ($i = 0; $i < $total_tramites ; $i++){
        $altura_tbl = 207 + ( $i * 7);    
        $pdf->setXY($td1x,$altura_tbl);
        $pdf->Cell($td1y, $altura_celda, $row_tramite[$i]['nombre_tramite'],1,1,'C', false);
    
        $pdf->setXY($td2x,$altura_tbl);
        $pdf->Cell($td2y, $altura_celda, 'X',1,1,'C', false);
    }

// Seccion 5
$pdf->AddPage();
$pdf->Ln(20);
$pdf->SetX(10);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 0, utf8_decode("SECCION 6: ESTRATIFICACIÓN DE LA EMPRESA"), 0, 0, 'L');

$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('6.1 INDIQUE EL ESTRATO AL QUE PERTENECE SU EMPRESA. (Marque con una “X” en una de las siguientes casillas).'));

$est1 = ''; $est2 = ''; $est3 = '';
switch ($row_proyecto[0]['estrato']){
    case 1:
        $est1 = 'X';
        break;
    case 2:
        $est2 = 'X';
        break;
    case 3:
        $est3 = 'X';
        break;
}

$altura_td = 70;
$pdf->Ln(2);
$pdf->SetXY(25,$altura_td);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 15, utf8_decode("Micro"), 0, 0, 'L');
$pdf->Cell(15, 15, $est1,1,1,'C', false);

$pdf->SetXY(75,$altura_td);
$pdf->Cell(15, 15, utf8_decode("Pequeña"), 0, 0, 'L');
$pdf->SetXY(95,$altura_td);
$pdf->Cell(15, 15, $est2,1,1,'C', false);

$pdf->SetXY(130,$altura_td);
$pdf->Cell(15, 15, utf8_decode("Mediana"), 0, 0, 'R');
$pdf->SetXY(150,$altura_td);
$pdf->Cell(15, 15, $est3,1,1,'C', false);

$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('CLASIFICACIÓN DEL PROYECTO-EMPRESA DE ACUERDO AL SECTOR. Indique el sector al que pertenece su proyecto. (Marque con una “X” en una de las siguientes casillas).'));
$ind = ''; $com = ''; $serv = '';
switch ($row_proyecto[0]['clasificacion']){
    case 1:
        $ind = 'X';
        break;
    case 2:
        $com = 'X';
        break;
    case 3:
        $serv = 'X';
        break;
}
$altura_td = 105;
$pdf->Ln(2);
$pdf->SetXY(25,$altura_td);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("Industrial"), 0, 0, 'L');
$pdf->SetXY(50,$altura_td);
$pdf->Cell(15, 5, $ind,1,1,'C', false);

$pdf->SetXY(75,$altura_td);
$pdf->Cell(15, 5, utf8_decode("Comercio"), 0, 0, 'L');
$pdf->SetXY(95,$altura_td);
$pdf->Cell(15, 5, $com,1,1,'C', false);

$pdf->SetXY(130,$altura_td);
$pdf->Cell(15, 5, utf8_decode("Servicios"), 0, 0, 'R');
$pdf->SetXY(150,$altura_td);
$pdf->Cell(15, 5, $serv,1,1,'C', false);

// SECCION 7
$pdf->Ln(5);
$pdf->SetX(10);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 0, utf8_decode("SECCIÓN 7: IMPACTO DEL PROYECTO"), 0, 0, 'L');

$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('7.1 EMPLEO. Indique cuántos empleos conservará su empresa y cuántos generará a partir de la realización del proyecto.'));

// TABLA
$altura_celda=7;
// HEADERS
    $altura_tbl = 135;  // Posicion Y de la tabla
    $td1x = 50; // posicion x td
    $td1y = 60; // ancho td1
    $td2x = 110;
    $td2y = 35;
    $td3x = 145;
    $td3y = 35;
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetFillColor(243,243,243);
    $pdf->SetTextColor(0,0,0);
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, "Empleos.",1,1,'C', true);
    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, "Hombres",1,1,'C', true);
    $pdf->setXY($td3x,$altura_tbl);
    $pdf->Cell($td3y, $altura_celda, "Mujeres",1,1,'C', true);
// BODY
    $pdf->SetFont('Arial', '', 8);
    $pdf->SetTextColor(0,0,0);

    // Row 1
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, 'Conservados',1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, $row_proyecto[0]['empleo_con_hombres'],1,1,'C', false);

    $pdf->setXY($td3x,$altura_tbl);
    $pdf->Cell($td3y, $altura_celda, $row_proyecto[0]['empleo_con_mujeres'],1,1,'C', false);

    // Row 2
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Generados'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, $row_proyecto[0]['empleo_gen_hombres'],1,1,'C', false);

    $pdf->setXY($td3x,$altura_tbl);
    $pdf->Cell($td3y, $altura_celda, $row_proyecto[0]['empleo_gen_hombres'],1,1,'C', false);

    
    // Row 3
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Totales'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, ($row_proyecto[0]['empleo_con_hombres'] + $row_proyecto[0]['empleo_con_mujeres']),1,1,'C', false);

    $pdf->setXY($td3x,$altura_tbl);
    $pdf->Cell($td3y, $altura_celda, ($row_proyecto[0]['empleo_gen_hombres'] + $row_proyecto[0]['empleo_gen_hombres']),1,1,'C', false);



$pdf->AddPage();
$pdf->Ln(20);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('7.2 SECTORES DE MAYOR IMPACTO'));

// TABLA
$altura_celda=7;
// HEADERS
    $altura_tbl = 60;  // Posicion Y de la tabla
    $td1x = 50; // posicion x td
    $td1y = 60; // ancho td1
    $td2x = 110;
    $td2y = 35;
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetFillColor(243,243,243);
    $pdf->SetTextColor(0,0,0);
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, "Sectores.",1,1,'C', true);
    $pdf->setXY($td2x,$altura_tbl);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(128,128,128);
    
    $pdf->Cell($td2y, $altura_celda, "",1,1,'C', true);
// BODY
    $pdf->SetFont('Arial', '', 8);
    $pdf->SetTextColor(0,0,0);



    if($total_sectores){
        for ($i=0; $i < $total_sectores; $i++) {
            // Row 1
            $altura_tbl = 67 + (7*$i);    
            $pdf->setXY($td1x,$altura_tbl);
            $pdf->Cell($td1y, $altura_celda, utf8_decode($row_sector[$i]['nombre_sector']),1,1,'C', false);

            $pdf->setXY($td2x,$altura_tbl);
            $pdf->Cell($td2y, $altura_celda, 'X',1,1,'C', false);
        }
    }


    

$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('7.3 IMPACTO ECOLÓGICO. Describa las principales consecuencias que la realización de su proyecto traería al medio ambiente.'));

$pdf->Ln(5);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,5,utf8_decode($impacto_ecologico));

$pdf->AddPage();
$pdf->Ln(20);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('7.4 Esta empresa ha sido creada en una comunidad indígena'));

$pdf->SetXY(50,60);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("Si"), 0, 0, 'L');
$pdf->Cell(15, 5, 'X',1,1,'C', false);

$pdf->SetXY(110,60);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("No"), 0, 0, 'L');
$pdf->Cell(15, 5, 'X',1,1,'C', false);

$pdf->Ln(5);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0, 0, utf8_decode("Nombre de la comunidad: ".$nombre_comunidad), 0, 0, 'L');

// $pdf->Ln(5);
// $pdf->SetFont('Arial','I',11);
// $pdf->MultiCell(0,5,utf8_decode('SECCIÓN 8: DOCUMENTACIÓN DE RESPALDO'));

// $pdf->Ln(5);
// $pdf->SetFont('Arial','I',11);
// $pdf->MultiCell(0,5,utf8_decode('8.1 ¿CON QUÉ DOCUMENTACIÓN DE APOYO CUENTA SU PROYECTO?'));

// // TABLA
// $altura_celda=7;
// // HEADERS
//     $altura_tbl = 95;  // Posicion Y de la tabla
//     $td1x = 50; // posicion x td
//     $td1y = 60; // ancho td1
//     $td2x = 110;
//     $td2y = 35;
//     $pdf->SetFont('Arial', '', 10);
//     $pdf->SetFillColor(243,243,243);
//     $pdf->SetTextColor(0,0,0);
//     $pdf->setXY($td1x,$altura_tbl);
//     $pdf->Cell($td1y, $altura_celda, "Documento.",1,1,'C', true);
//     $pdf->setXY($td2x,$altura_tbl);
//     $pdf->SetTextColor(255,255,255);
//     $pdf->SetFillColor(128,128,128);
    
//     $pdf->Cell($td2y, $altura_celda, "",1,1,'C', true);
// // BODY
//     $pdf->SetFont('Arial', '', 8);
//     $pdf->SetTextColor(0,0,0);

//     // Row 1
//     $altura_tbl = $altura_tbl + 7;    
//     $pdf->setXY($td1x,$altura_tbl);
//     $pdf->Cell($td1y, $altura_celda, utf8_decode('Ideas'),1,1,'C', false);
//     $pdf->setXY($td2x,$altura_tbl);
//     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

//     $altura_tbl = $altura_tbl + 7;    
//     $pdf->setXY($td1x,$altura_tbl);
//     $pdf->Cell($td1y, $altura_celda, utf8_decode('Planos'),1,1,'C', false);
//     $pdf->setXY($td2x,$altura_tbl);
//     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

//     $altura_tbl = $altura_tbl + 7;    
//     $pdf->setXY($td1x,$altura_tbl);
//     $pdf->Cell($td1y, $altura_celda, utf8_decode('Programas de trabajo'),1,1,'C', false);
//     $pdf->setXY($td2x,$altura_tbl);
//     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

//     $altura_tbl = $altura_tbl + 7;    
//     $pdf->setXY($td1x,$altura_tbl);
//     $pdf->Cell($td1y, $altura_celda, utf8_decode('Estudio de Factibilidad Técnico'),1,1,'C', false);
//     $pdf->setXY($td2x,$altura_tbl);
//     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

//     $altura_tbl = $altura_tbl + 7;    
//     $pdf->setXY($td1x,$altura_tbl);
//     $pdf->Cell($td1y, $altura_celda, utf8_decode('Estudio de Factibilidad Económico'),1,1,'C', false);
//     $pdf->setXY($td2x,$altura_tbl);
//     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

//     $altura_tbl = $altura_tbl + 7;    
//     $pdf->setXY($td1x,$altura_tbl);
//     $pdf->Cell($td1y, $altura_celda, utf8_decode('Estudio de Mercado'),1,1,'C', false);
//     $pdf->setXY($td2x,$altura_tbl);
//     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

//     $altura_tbl = $altura_tbl + 7;    
//     $pdf->setXY($td1x,$altura_tbl);
//     $pdf->Cell($td1y, $altura_celda, utf8_decode('Plan de Mercadotecnia'),1,1,'C', false);
//     $pdf->setXY($td2x,$altura_tbl);
//     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

//     $altura_tbl = $altura_tbl + 7;    
//     $pdf->setXY($td1x,$altura_tbl);
//     $pdf->Cell($td1y, $altura_celda, utf8_decode('Proyecto en Extenso'),1,1,'C', false);
//     $pdf->setXY($td2x,$altura_tbl);
//     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

//     $altura_tbl = $altura_tbl + 7;    
//     $pdf->setXY($td1x,$altura_tbl);
//     $pdf->Cell($td1y, $altura_celda, utf8_decode('Cotizaciones'),1,1,'C', false);
//     $pdf->setXY($td2x,$altura_tbl);
//     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);



$pdf->Output();
?>