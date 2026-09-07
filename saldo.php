<?php
// sDestination: lista de numeros, comenzando por 34 y separados por comas  
// sMessage: hasta 160 caracteres
// debug: Si es true muestra por pantalla la respuesta completa del servidor
// XX, YY y ZZ se corresponden con los valores de identificacion del
// usuario en el sistema.
// Como ejemplo la peticion se envia a www.altiria.net/sustituirPOSTsms
// Se debe reemplazar la cadena ’/sustituirPOSTsms’ por la parte correspondiente
// de la URL suministrada por Altiria al dar de alta el servicio
function AltiriaSMS($sDestination,$sMessage,$debug) {
$sData ="cmd=getcredit&";
$sData .="domainId=alozada&";
$sData .="login=ing_sist15@hotmail.com&";
$sData .="passwd=ALS8few9b4jw&";


$fp = fsockopen("www.altiria.net", 80, $errno, $errstr, 10);
if (!$fp) {
//Error de conexion
$output = "ERROR de conexion: $errno - $errstr<br />\n";
$output .= "Compruebe que ha configurado correctamente la direccion/url ";
$output .= "suministrada por altiria<br>";
return $output;
} else {
// Reemplazar la cadena ’/sustituirPOSTsms’ por la parte correspondiente
// de la URL suministrada por Altiria al dar de alta el servicio
$buf = "POST http://www.altiria.net/api/http HTTP/1.0\r\n";
$buf .= "Host: www.altiria.net\r\n";
$buf .= "Content-type: application/x-www-form-urlencoded; charset=UTF-8\r\n";
$buf .= "Content-length: ".strlen($sData)."\r\n";
$buf .= "\r\n";
$buf .= $sData;

fputs($fp, $buf);
$buf = "";
while (!feof($fp))
$buf .= fgets($fp,128);
fclose($fp);
//Si la llamada se hace con debug, se muestra la respuesta completa del servidor
if ($debug){
$saldo=substr($buf,155,14);
echo $saldo;
}
//Se comprueba que se ha conectado realmente con el servidor
//y que se obtenga un codigo HTTP OK 200
if (strpos($buf,"HTTP/1.1 200 OK") === false){
$output = "ERROR. Codigo error HTTP: ".substr($buf,9,3)."<br />\n";
$output .= "Compruebe que ha configurado correctamente la direccion/url ";
$output .= "suministrada por Altiria<br>";
return $output;
}
//Se comprueba la respuesta de Altiria
if (strstr($buf,"ERROR")){
$output = $buf."<br />\n";
$output .= " Codigo de error de Altiria. Compruebe la especificacion<br>";
return $output;
} else
return "";
}
}
AltiriaSMS("", "", true);
?>