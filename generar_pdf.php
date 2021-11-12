<?php
require('fpdf/fpdf.php');

$folio = 12312312;
$fecha_recepcion = '12/07/2021';
$nombre_empresa = 'BorderBytes';
$nombre_usuario = 'Gabriel Vallejo San Miguel';
$curp_usuario = 'VASG000724HCLLNBA1';
$direccion_usuario = 'Francisco coss 1187 Real Del Norte Piedras Negras Coahuila México';
$email_usuario = 'gabrielvallejo2000@gmail.com';
$telefono_usuario = '528781383809';
$fax_usuario = '1234567890';

$participantes[0]['nombre'] = 'Carlos';
$participantes[0]['curp'] = 'ABCDEFGH1221';
$participantes[0]['cargo'] = 'Director ejectutivo';

$participantes[1]['nombre'] = 'Carlos1';
$participantes[1]['curp'] = 'ABCDEFGH1221';
$participantes[1]['cargo'] = 'Director ejectutivo';

$participantes[2]['nombre'] = 'Carlos2';
$participantes[2]['curp'] = 'ABCDEFGH1221';
$participantes[2]['cargo'] = 'Director ejectutivo';

$participantes[3]['nombre'] = 'Carlos3';
$participantes[3]['curp'] = 'ABCDEFGH1221';
$participantes[3]['cargo'] = 'Director ejectutivo';

$rfc_empresa = 'ASDALBASDUY12783B';
$instituto_usuario = 'Universidad Técnologica del Norte de Coahuila';
$tiempo_desarrollo = '6 meses';
$como_llegaste = 'Anuncio en la radio.';
$otro_apoyo = 'Monetario';

$descripcion = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed viverra mauris. Nulla suscipit libero purus, ac lacinia velit varius quis. Mauris iaculis metus purus, non pretium libero consequat vel. In hac habitasse platea dictumst. In sed purus nisl. Sed eget faucibus enim. Morbi luctus sed felis ac facilisis. Quisque fermentum sagittis massa ac pretium. Morbi condimentum nibh elit, vel luctus ligula facilisis at. Etiam eget metus in justo congue ullamcorper sit amet id sem. Quisque malesuada auctor tortor, ac varius turpis ultrices id. Nulla commodo tortor erat, quis rutrum elit ultrices at. Maecenas sollicitudin eget purus sed lacinia. Vivamus gravida, dui eget accumsan ullamcorper, felis purus faucibus diam, et viverra arcu justo id lorem.

Curabitur tristique, diam non luctus cursus, sem lacus sodales lectus, quis pharetra est ligula sit amet leo. Sed vestibulum sapien quis libero dapibus pulvinar eget vel leo. Etiam eget turpis lacinia, molestie eros at, commodo metus. Etiam eget consequat dui. Sed dignissim feugiat auctor. Donec non magna a libero mattis cursus a quis risus. Nulla lorem velit, bibendum euismod lacus id, cursus convallis turpis. Nulla non aliquet nulla. In hac habitasse platea dictumst. Vivamus commodo lorem quis dolor facilisis vestibulum. Fusce dapibus vulputate ultrices. Vivamus finibus ut diam sit amet porttitor. Donec molestie ultrices orci non tempus. Praesent rutrum tristique velit vitae viverra.

Nulla sit amet nisi et nisi molestie ultrices non sit amet dolor. Mauris tortor eros, rhoncus varius eleifend non, lobortis ultricies massa. Etiam leo lorem, pellentesque eu efficitur sit amet, posuere non magna. Etiam venenatis velit ante, quis imperdiet urna aliquet nec. Mauris molestie, nibh ac lacinia varius, metus mauris ullamcorper ligula, ac rutrum mi sapien et sem. Aliquam hendrerit sem nisl, quis tempus sem vulputate sed. Sed malesuada sit amet eros ac tempor. Proin maximus, mauris quis posuere sodales, metus est commodo sem, a ultricies nisi nulla id nulla. Nam aliquet dignissim orci pharetra euismod.

Praesent mollis felis quis congue molestie. Nam sagittis, justo nec hendrerit mattis, lacus urna rutrum nulla, id commodo sapien dui eget nisl. Praesent gravida a leo id tempor. Suspendisse posuere vitae nisl eget efficitur. Nunc ex ligula, lacinia in leo sit amet, elementum vehicula mauris. Integer dictum vulputate viverra. Vivamus ullamcorper, orci a facilisis pharetra, sem metus semper lorem, sit amet posuere purus purus a dolor. Aliquam pharetra metus nunc, vel sagittis sapien vehicula eget. Nam vitae justo risus.

Phasellus gravida dolor at erat pretium, et iaculis lacus facilisis. Etiam porttitor ullamcorper sem. Phasellus nisl mauris, faucibus aliquet fringilla non, ultrices ac enim. Aliquam auctor fermentum nibh, ac placerat velit lacinia eget. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla cursus, nisi vitae suscipit viverra, nunc leo auctor risus, in porttitor elit nibh vel orci. Nam pellentesque, risus vitae molestie ullamcorper, tortor libero elementum lectus, ac accumsan ligula magna at turpis. Etiam tempus eget nunc ac dignissim. Aenean porttitor euismod ornare. Nunc sollicitudin suscipit sodales. Nunc sit amet urna ac nibh condimentum fringilla.';

$objetivos = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';

$base_tecnologica = 'La innovación se considera un ingrediente fundamental para que el tejido empresarial se desarrolle y sea competitivo. Es algo que suelen entender las empresas privadas con facilidad, aunque en ocasiones lo hagan demasiado tarde, al comprobar cómo sus bienes o servicios son desplazados del mercado por otros más innovadores ofertados por su competencia, y que también suelen reconocer los poderes públicos, aunque a veces lo hagan con mayor dificultad.';

$instalaciones_detalle = 'Las instalaciones son el conjunto de redes y equipos fijos que permiten el suministro y operación de los servicios que ayudan a los edificios a cumplir las funciones para las que han sido diseñados';

$equipo_maquinaria = 'Esta sección abarca los distintos aspectos relativos a la seguridad en la utilización de maquinaria y el mantenimiento de las instalaciones y los equipos en el lugar de trabajo. El empleador debería examinar el modo en que los trabajadores utilizan la maquinaría, y contar con un programa de mantenimiento adecuado para asegurar que se mantiene en buenas condiciones de uso.';

$clientes_potenciales = 'Un cliente potencial es aquella persona que se podría convertir en comprador o consumidor de los productos que ofrece una empresa. Un cliente potencial es aquella persona que se podría convertir en comprador o consumidor de los productos que ofrece una empresa';

$productos_similares = 'Esto es un texto de ejemplo';

$impacto_ecologico = 'El impacto ambiental es la alteración del medio ambiente, provocada directa o indirectamente por un proyecto o actividad en un área determinada, en términos simples el impacto ambiental es la modificación del ambiente ocasionada por la acción del hombre o de la naturaleza.';

$nombre_comunidad = 'Nahuas';
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('recursos_pdf/header.png',10,8,180);
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-20);
    $this->SetX(25);
   $this->Image('recursos_pdf/footer.png');
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
    for ($i = 0; $i <4; $i++){
        $altura_tbl = $altura_tbl + 7;    
        // Nombre participante
        $pdf->setXY($td1x,$altura_tbl);
        $pdf->Cell($td1y, $altura_celda, $participantes[$i]['nombre'],1,1,'C', false);

        // curp participante
        $pdf->setXY($td2x,$altura_tbl);
        $pdf->Cell($td2y, $altura_celda, $participantes[$i]['curp'],1,1,'C', false);

        // cargo participante
        $pdf->setXY($td3x,$altura_tbl);
        $pdf->Cell($td3y, $altura_celda, $participantes[$i]['cargo'],1,1,'C', false);
    }
        
$pdf->Ln(5);
$pdf->MultiCell(0,5,utf8_decode('¿ESTÁ CONSTITUIDA LEGALMENTE SU EMPRESA? (Marque con una "X" en una de las siguientes casillas).'));

$pdf->Ln(2);
$pdf->SetX(25);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 15, utf8_decode("Si"), 0, 0, 'L');
$pdf->Cell(15, 15, 'X',1,1,'C', false);

$pdf->SetXY(75,232);
$pdf->Cell(15, 15, utf8_decode("No"), 0, 0, 'L');
$pdf->Cell(15, 15, 'X',1,1,'C', false);

$pdf->SetXY(130,232);
$pdf->Cell(15, 15, utf8_decode("En proceso"), 0, 0, 'R');
$pdf->SetXY(150,232);
$pdf->Cell(15, 15, 'X',1,1,'C', false);


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

$pdf->Ln(2);
$pdf->SetX(60);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 15, utf8_decode("Creación de nueva empresa"), 0, 0, 'L');
$pdf->SetX(120);
$pdf->Cell(15, 15, 'X',1,1,'C', false);

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

$lc = 85;

$pdf->SetXY(25,70);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10, 5, utf8_decode("1. Diseño industrial"), 0, 0, 'L');
$pdf->SetXY($lc,70);
$pdf->Cell(10, 5, 'X',1,1,'C', false);

$pdf->SetXY(25,75);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10, 5, utf8_decode("2. Diseño de imagen corporativa"), 0, 0, 'L');
$pdf->SetXY($lc,75);
$pdf->Cell(10, 5, 'X',1,1,'C', false);

$pdf->SetXY(25,80);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10, 5, utf8_decode("3. Procesos productivos"), 0, 0, 'L');
$pdf->SetXY($lc,80);
$pdf->Cell(10, 5, 'X',1,1,'C', false);

$pdf->SetXY(25,85);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10, 5, utf8_decode("4. Administración"), 0, 0, 'L');
$pdf->SetXY($lc,85);
$pdf->Cell(10, 5, 'X',1,1,'C', false);

$pdf->SetXY(25,90);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10, 5, utf8_decode("5. Propiedad industrial"), 0, 0, 'L');
$pdf->SetXY($lc,90);
$pdf->Cell(10, 5, 'X',1,1,'C', false);

$pdf->SetXY(25,95);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10, 5, utf8_decode("6. Mercadotecnia"), 0, 0, 'L');
$pdf->SetXY($lc,95);
$pdf->Cell(10, 5, 'X',1,1,'C', false);

$rc = 170;

$pdf->SetXY(110,70);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10, 5, utf8_decode("7. Investigación"), 0, 0, 'L');
$pdf->SetXY($rc,70);
$pdf->Cell(10, 5, 'X',1,1,'C', false);

$pdf->SetXY(110,75);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10, 5, utf8_decode("8. Aspectos jurídicos"), 0, 0, 'L');
$pdf->SetXY($rc,75);
$pdf->Cell(10, 5, 'X',1,1,'C', false);

$pdf->SetXY(110,80);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10, 5, utf8_decode("9. Vinculación"), 0, 0, 'L');
$pdf->SetXY($rc,80);
$pdf->Cell(10, 5, 'X',1,1,'C', false);

$pdf->SetXY(110,85);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10, 5, utf8_decode("10. Planeación estratégica"), 0, 0, 'L');
$pdf->SetXY($rc,85);
$pdf->Cell(10, 5, 'X',1,1,'C', false);

$pdf->SetXY(110,90);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10, 5, utf8_decode("11. Tecnología"), 0, 0, 'L');
$pdf->SetXY($rc,90);
$pdf->Cell(10, 5, 'X',1,1,'C', false);


$pdf->SetXY(110,95);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10, 5, utf8_decode("Otro : ".$otro_apoyo), 0, 0, 'L');


// SECCION 3
$pdf->Ln(15);
$pdf->SetX(10);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 0, utf8_decode("SECCIÓN 3: ESTADO TECNOLÓGICO DEL PROYECTO-EMPRESA."), 0, 0, 'L');

$pdf->SetFont('Arial','I',11);
$pdf->Ln(5);
$pdf->MultiCell(0,5,utf8_decode('3.1 ¿CONSIDERA QUE SU PROYECTO ES DE BASE TECNOLÓGICA? Marque con una “X” en una de las siguientes casillas. Se sugiere que antes de contestar lea la siguiente definición.'));

$pdf->SetXY(50,128);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("Si"), 0, 0, 'L');
$pdf->Cell(15, 5, 'X',1,1,'C', false);

$pdf->SetXY(110,128);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("No"), 0, 0, 'L');
$pdf->Cell(15, 5, 'X',1,1,'C', false);

$pdf->Ln(20);
$pdf->SetX(10);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 0, utf8_decode("Definición de Base Tecnológica"), 0, 0, 'L');

$pdf->Ln(5);
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,5,utf8_decode('La empresa de base tecnológica es aquella que incorpora al conocimiento como “materia prima” fundamental para el logro de sus objetivos, hasta su posterior transformación en el valor de la línea principal de un producto concreto, comercializable. Una empresa de base tecnológica sustenta sus estrategias de gestión y su línea de procesos, productos y servicios en nuevas tecnologías e involucra los desarrollos administrativos, gerenciales, económicos, financieros, de capacitación e investigación y desarrollo, de última generación a sus operaciones. Es un concepto transversal que no se refiere únicamente a su resultado final que es un producto de alto valor agregado o de alta complejidad tecnológica con capacidad de incorporarse a otras cadenas productivas. Una empresa de base tecnológica no se reconoce por lo que hace, sino por la forma en que hace las cosas.'));

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
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    // Row 2
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('b) Investigación científica'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    // Row 3
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('c) Desarrollo tecnológico'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    // Row 4
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('d) Prototipo'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

     // Row 5
     $altura_tbl = $altura_tbl + 7;    
     $pdf->setXY($td1x,$altura_tbl);
     $pdf->Cell($td1y, $altura_celda, utf8_decode('e) Producto en proceso de comercialización'),1,1,'C', false);
 
     $pdf->setXY($td2x,$altura_tbl);
     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);


$pdf->SetFont('Arial','I',11);
$pdf->Ln(5);
$pdf->MultiCell(0,5,utf8_decode('3.4 INNOVACIÓN DEL PRODUCTO. El grado de innovación del producto o servicio que desarrolla o va a desarrollar lo considera como: (marque con una “X” en una de las siguientes casillas).'));

$pdf->Ln(2);
$pdf->SetXY(25,130);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 15, utf8_decode("Inovación total"), 0, 0, 'L');
$pdf->SetXY(55,130);
$pdf->Cell(15, 15, 'X',1,1,'C', false);

$pdf->SetXY(75,130);
$pdf->Cell(15, 15, utf8_decode("Modificación"), 0, 0, 'L');
$pdf->SetXY(100,130);
$pdf->Cell(15, 15, 'X',1,1,'C', false);

$pdf->SetXY(140,130);
$pdf->Cell(15, 15, utf8_decode("Producto estándar"), 0, 0, 'R');
$pdf->SetXY(160,130);
$pdf->Cell(15, 15, 'X',1,1,'C', false);


$pdf->SetFont('Arial','I',11);
$pdf->Ln(5);
$pdf->MultiCell(0,5,utf8_decode('3.6 ¿CUENTA CON INSTALACIONES PARA EL DESARROLLO DE SU PROYECTO?'));

$pdf->SetXY(50,160);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("Si"), 0, 0, 'L');
$pdf->Cell(15, 5, 'X',1,1,'C', false);

$pdf->SetXY(110,160);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("No"), 0, 0, 'L');
$pdf->Cell(15, 5, 'X',1,1,'C', false);



// Nueva hoja
$pdf->AddPage();

$pdf->Ln(20);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('3.7 EN CASO AFIRMATIVO, ESPECIFIQUE CON QUE INSTALACIONES CUENTA.'));

$pdf->Ln(5);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,5,utf8_decode($instalaciones_detalle));


$pdf->SetFont('Arial','I',11);
$pdf->Ln(5);
$pdf->MultiCell(0,5,utf8_decode('3.8 ¿CUENTA CON ALGÚN EQUIPO O MAQUIINARIA PARA EL DESARROLLO DE SU PROYECTO? (Marque con una “X” en una de las siguientes casillas).'));

$pdf->SetXY(50,90);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("Si"), 0, 0, 'L');
$pdf->Cell(15, 5, 'X',1,1,'C', false);

$pdf->SetXY(110,90);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("No"), 0, 0, 'L');
$pdf->Cell(15, 5, 'X',1,1,'C', false);


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

$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('4.2 ¿CONOCE EL MERCADO POTENCIAL PARA SU PROYECTO? (Marque con una “X” en una de las siguientes casillas).'));

$pdf->SetXY(50,185);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("Si"), 0, 0, 'L');
$pdf->Cell(15, 5, 'X',1,1,'C', false);

$pdf->SetXY(110,185);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("No"), 0, 0, 'L');
$pdf->Cell(15, 5, 'X',1,1,'C', false);

$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('4.3 EN CASO AFIRMATIVO, DESCRIBA CUÁLES SON LAS CARACTERÍSTICAS DE SUS CLIENTES POTENCIALES.'));

$pdf->Ln(5);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,5,utf8_decode($clientes_potenciales));




// Nueva hoja
$pdf->AddPage();

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
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    // Row 2
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Nacional'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    // Row 3
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Regional'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    // Row 4
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Estatal'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

     // Row 5
     $altura_tbl = $altura_tbl + 7;    
     $pdf->setXY($td1x,$altura_tbl);
     $pdf->Cell($td1y, $altura_celda, utf8_decode('Municipal'),1,1,'C', false);
 
     $pdf->setXY($td2x,$altura_tbl);
     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('4.5 ¿EXISTEN EN EL MERCADO PRODUCTOS SIMILARES Y/O SUSTITUTOS AL SUYO? (Marque con una “X” en una de las siguientes casillas).'));

$pdf->SetXY(50,128);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("Si"), 0, 0, 'L');
$pdf->Cell(15, 5, 'X',1,1,'C', false);

$pdf->SetXY(110,128);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("No"), 0, 0, 'L');
$pdf->Cell(15, 5, 'X',1,1,'C', false);


$pdf->Ln(5);
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,5,utf8_decode($productos_similares));

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
$pdf->Cell(15, 5, 'X',1,1,'C', false);

$pdf->SetXY(110,170);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("No"), 0, 0, 'L');
$pdf->Cell(15, 5, 'X',1,1,'C', false);

$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('5.2 EN CASO DE SER AFIRMATIVO, MENCIONE EN CUAL DE LAS SIGUIENTES CATEGORÍAS. (Marque con una “X” en una de las siguientes casillas).'));

// TABLA
$altura_celda=7;
// HEADERS
    $altura_tbl = 215;  // Posicion Y de la tabla
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

    // Row 1
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, 'Modelo de utilidad',1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    // Row 2
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Diseño industrial'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    // Row 3
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Secreto industrial'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    // Row 4
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Derecho de autor'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

     // Row 5
     $altura_tbl = $altura_tbl + 7;    
     $pdf->setXY($td1x,$altura_tbl);
     $pdf->Cell($td1y, $altura_celda, utf8_decode('Patente'),1,1,'C', false);
 
     $pdf->setXY($td2x,$altura_tbl);
     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

// Seccion 5
$pdf->AddPage();
$pdf->Ln(20);
$pdf->SetX(10);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0, 0, utf8_decode("SECCION 6: ESTRATIFICACIÓN DE LA EMPRESA"), 0, 0, 'L');

$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('6.1 INDIQUE EL ESTRATO AL QUE PERTENECE SU EMPRESA. (Marque con una “X” en una de las siguientes casillas).'));


$altura_td = 70;
$pdf->Ln(2);
$pdf->SetXY(25,$altura_td);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 15, utf8_decode("Micro"), 0, 0, 'L');
$pdf->Cell(15, 15, 'X',1,1,'C', false);

$pdf->SetXY(75,$altura_td);
$pdf->Cell(15, 15, utf8_decode("Pequeña"), 0, 0, 'L');
$pdf->SetXY(95,$altura_td);
$pdf->Cell(15, 15, 'X',1,1,'C', false);

$pdf->SetXY(130,$altura_td);
$pdf->Cell(15, 15, utf8_decode("Mediana"), 0, 0, 'R');
$pdf->SetXY(150,$altura_td);
$pdf->Cell(15, 15, 'X',1,1,'C', false);

$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('CLASIFICACIÓN DEL PROYECTO-EMPRESA DE ACUERDO AL SECTOR. Indique el sector al que pertenece su proyecto. (Marque con una “X” en una de las siguientes casillas).'));

$altura_td = 105;
$pdf->Ln(2);
$pdf->SetXY(25,$altura_td);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15, 5, utf8_decode("Industrial"), 0, 0, 'L');
$pdf->SetXY(50,$altura_td);
$pdf->Cell(15, 5, 'X',1,1,'C', false);

$pdf->SetXY(75,$altura_td);
$pdf->Cell(15, 5, utf8_decode("Comercio"), 0, 0, 'L');
$pdf->SetXY(95,$altura_td);
$pdf->Cell(15, 5, 'X',1,1,'C', false);

$pdf->SetXY(130,$altura_td);
$pdf->Cell(15, 5, utf8_decode("Servicios"), 0, 0, 'R');
$pdf->SetXY(150,$altura_td);
$pdf->Cell(15, 5, 'X',1,1,'C', false);

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
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    $pdf->setXY($td3x,$altura_tbl);
    $pdf->Cell($td3y, $altura_celda, '',1,1,'C', false);

    // Row 2
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Generados'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    $pdf->setXY($td3x,$altura_tbl);
    $pdf->Cell($td3y, $altura_celda, '',1,1,'C', false);

    
    // Row 3
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Totales'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    $pdf->setXY($td3x,$altura_tbl);
    $pdf->Cell($td3y, $altura_celda, '',1,1,'C', false);



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

    // Row 1
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Aeronáutica'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    // Row 2
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Agroindustria'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    // Row 3
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Alimentos'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    // Row 4
    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Automotriz'),1,1,'C', false);

    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

     // Row 5
     $altura_tbl = $altura_tbl + 7;    
     $pdf->setXY($td1x,$altura_tbl);
     $pdf->Cell($td1y, $altura_celda, utf8_decode('Biónica'),1,1,'C', false);
 
     $pdf->setXY($td2x,$altura_tbl);
     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

     // Row 6
     $altura_tbl = $altura_tbl + 7;    
     $pdf->setXY($td1x,$altura_tbl);
     $pdf->Cell($td1y, $altura_celda, utf8_decode('Biotecnología'),1,1,'C', false);
 
     $pdf->setXY($td2x,$altura_tbl);
     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);
     // Row 7
     $altura_tbl = $altura_tbl + 7;    
     $pdf->setXY($td1x,$altura_tbl);
     $pdf->Cell($td1y, $altura_celda, utf8_decode('Construcción'),1,1,'C', false);
 
     $pdf->setXY($td2x,$altura_tbl);
     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);
     // Row 8
     $altura_tbl = $altura_tbl + 7;    
     $pdf->setXY($td1x,$altura_tbl);
     $pdf->Cell($td1y, $altura_celda, utf8_decode('Cosmetología'),1,1,'C', false);
 
     $pdf->setXY($td2x,$altura_tbl);
     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

     // Row 9
     $altura_tbl = $altura_tbl + 7;    
     $pdf->setXY($td1x,$altura_tbl);
     $pdf->Cell($td1y, $altura_celda, utf8_decode('Desarrollo Social'),1,1,'C', false);
 
     $pdf->setXY($td2x,$altura_tbl);
     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

     // Row 9
     $altura_tbl = $altura_tbl + 7;    
     $pdf->setXY($td1x,$altura_tbl);
     $pdf->Cell($td1y, $altura_celda, utf8_decode('Desarrollo Social'),1,1,'C', false);
 
     $pdf->setXY($td2x,$altura_tbl);
     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

     // Row 9
     $altura_tbl = $altura_tbl + 7;    
     $pdf->setXY($td1x,$altura_tbl);
     $pdf->Cell($td1y, $altura_celda, utf8_decode('Electrónica'),1,1,'C', false);
 
     $pdf->setXY($td2x,$altura_tbl);
     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

     // Row 9
     $altura_tbl = $altura_tbl + 7;    
     $pdf->setXY($td1x,$altura_tbl);
     $pdf->Cell($td1y, $altura_celda, utf8_decode('Medio Ambiente'),1,1,'C', false);
 
     $pdf->setXY($td2x,$altura_tbl);
     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

     // Row 9
     $altura_tbl = $altura_tbl + 7;    
     $pdf->setXY($td1x,$altura_tbl);
     $pdf->Cell($td1y, $altura_celda, utf8_decode('Metalmecánica'),1,1,'C', false);
 
     $pdf->setXY($td2x,$altura_tbl);
     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

     // Row 9
     $altura_tbl = $altura_tbl + 7;    
     $pdf->setXY($td1x,$altura_tbl);
     $pdf->Cell($td1y, $altura_celda, utf8_decode('Productos Naturales'),1,1,'C', false);
 
     $pdf->setXY($td2x,$altura_tbl);
     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

     // Row 9
     $altura_tbl = $altura_tbl + 7;    
     $pdf->setXY($td1x,$altura_tbl);
     $pdf->Cell($td1y, $altura_celda, utf8_decode('Robótica'),1,1,'C', false);
 
     $pdf->setXY($td2x,$altura_tbl);
     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

     // Row 9
     $altura_tbl = $altura_tbl + 7;    
     $pdf->setXY($td1x,$altura_tbl);
     $pdf->Cell($td1y, $altura_celda, utf8_decode('Salud'),1,1,'C', false);
 
     $pdf->setXY($td2x,$altura_tbl);
     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

     // Row 9
     $altura_tbl = $altura_tbl + 7;    
     $pdf->setXY($td1x,$altura_tbl);
     $pdf->Cell($td1y, $altura_celda, utf8_decode('TICS'),1,1,'C', false);
 
     $pdf->setXY($td2x,$altura_tbl);
     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

     // Row 9
     $altura_tbl = $altura_tbl + 7;    
     $pdf->setXY($td1x,$altura_tbl);
     $pdf->Cell($td1y, $altura_celda, utf8_decode('Turismo'),1,1,'C', false);
 
     $pdf->setXY($td2x,$altura_tbl);
     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

     // Row 9
     $altura_tbl = $altura_tbl + 7;    
     $pdf->setXY($td1x,$altura_tbl);
     $pdf->Cell($td1y, $altura_celda, utf8_decode('Emprendimiento Tecnológico'),1,1,'C', false);
 
     $pdf->setXY($td2x,$altura_tbl);
     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

     // Row 9
     $altura_tbl = $altura_tbl + 7;    
     $pdf->setXY($td1x,$altura_tbl);
     $pdf->Cell($td1y, $altura_celda, utf8_decode('Investigación'),1,1,'C', false);
 
     $pdf->setXY($td2x,$altura_tbl);
     $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

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

$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('SECCIÓN 8: DOCUMENTACIÓN DE RESPALDO'));

$pdf->Ln(5);
$pdf->SetFont('Arial','I',11);
$pdf->MultiCell(0,5,utf8_decode('8.1 ¿CON QUÉ DOCUMENTACIÓN DE APOYO CUENTA SU PROYECTO?'));

// TABLA
$altura_celda=7;
// HEADERS
    $altura_tbl = 95;  // Posicion Y de la tabla
    $td1x = 50; // posicion x td
    $td1y = 60; // ancho td1
    $td2x = 110;
    $td2y = 35;
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetFillColor(243,243,243);
    $pdf->SetTextColor(0,0,0);
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, "Documento.",1,1,'C', true);
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
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Ideas'),1,1,'C', false);
    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Planos'),1,1,'C', false);
    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Programas de trabajo'),1,1,'C', false);
    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Estudio de Factibilidad Técnico'),1,1,'C', false);
    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Estudio de Factibilidad Económico'),1,1,'C', false);
    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Estudio de Mercado'),1,1,'C', false);
    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Plan de Mercadotecnia'),1,1,'C', false);
    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Proyecto en Extenso'),1,1,'C', false);
    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);

    $altura_tbl = $altura_tbl + 7;    
    $pdf->setXY($td1x,$altura_tbl);
    $pdf->Cell($td1y, $altura_celda, utf8_decode('Cotizaciones'),1,1,'C', false);
    $pdf->setXY($td2x,$altura_tbl);
    $pdf->Cell($td2y, $altura_celda, '',1,1,'C', false);



$pdf->Output();
?>