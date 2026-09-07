<?php  
date_default_timezone_set('America/Mexico_City');
$conecta =  mysqli_connect('localhost','contraloria','30ditceM.#','denuncias');
if (!mysqli_set_charset($conecta,'utf8')){
die('No pudo conectarse: ' . mysqli_connect_error());
}
?>