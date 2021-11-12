<?php
$nombre_archivo = $_FILES['archivo']['name'];
$tipo_archivo = $_FILES['archivo']['type'];
$tamano_archivo = $_FILES['archivo']['size'];
$tmp_archivo = $_FILES['archivo']['tmp_name'];
$ruta = '../../../cursos/'.$_POST['carpeta'];

if (!file_exists($ruta)) {
	mkdir($ruta);
}

$ruta = '../../../cursos/'.$_POST['carpeta'].'/'.$_POST['sub_carpeta'];

if (!file_exists($ruta)) {
	mkdir($ruta);
}

$files = glob('../../../cursos/'.$_POST['carpeta'].'/'.$_POST['sub_carpeta'].'/*'); //obtenemos todos los nombres de los ficheros
foreach($files as $file){
    if(is_file($file))
    unlink($file); //elimino el fichero
}

$archivador=$ruta.'/'.$nombre_archivo;

if (move_uploaded_file($tmp_archivo, $archivador)) {
	$response_array['status'] = 'success';
} else {
	$response_array['status'] = 'error';
}
header('Content-type: application/json');
echo json_encode($response_array);