<?php
	$celular=$_POST['telefono'];
	$sms =$_POST['sms'];
require_once("conexion.php");
		$sqlid = "SELECT MAX(id) FROM denuncias";
		$res = mysqli_query($conecta,$sqlid);
		while ($idsol=mysqli_fetch_array($res)) {
	     $idfinal=$idsol[0]+1;
		 $hoy = date('dmy');
         $fusion=$hoy . $idfinal;
		 $token = str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789".uniqid()); 
}
         $utoken_query="SELECT * FROM denuncias ORDER BY id DESC LIMIT 1";
		 $utokenres = mysqli_query($conecta,$utoken_query);
         while ($var_token=mysqli_fetch_array($utokenres)) {
		 $utoken=$var_token[6];
		 }	 
//validación para enviar mensajes de texto
if($utoken!=$_POST['token']){
if (isset($_REQUEST['guardar'])) 
{ 
    $sql_query = "insert into denuncias(folio,movil,nombre,correo,mensaje,token) values ('$fusion','$_POST[telefono]','$_POST[nombre]','$_POST[email]','$_POST[observa]','$_POST[token]')";
   if (mysqli_query($conecta,$sql_query)){
	  $area=52;
	    if($sms=="Acepto" && $_POST['telefono']){
// sDestination: lista de numeros, comenzando por 34 y separados por comas  
// sMessage: hasta 160 caracteres
// debug: Si es true muestra por pantalla la respuesta completa del servidor
// XX, YY y ZZ se corresponden con los valores de identificacion del
// usuario en el sistema.
// Como ejemplo la peticion se envia a www.altiria.net/sustituirPOSTsms
// Se debe reemplazar la cadena ’/sustituirPOSTsms’ por la parte correspondiente
// de la URL suministrada por Altiria al dar de alta el servicio
function AltiriaSMS($sDestination,$sMessage,$debug) {
$sData ="cmd=sendsms&";
$sData .="domainId=alozada&";
$sData .="login=ing_sist15@hotmail.com&";
$sData .="passwd=ALS8few9b4jw&";
$sData .="dest=".str_replace(",","&dest=",$sDestination)."&";
$sData .="msg=".urlencode(utf8_encode(substr($sMessage,0,160)));
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
print "Respuesta del servidor: <br>".$buf."<br>";
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
AltiriaSMS("$area.$celular", "Su solicitud ya se encuentra siendo atendida con el folio: $fusion Tuxpan, Puerto de la Esperanza", false);
}//Final del if de validación de Politica de Privacidad y Número de Celular.
	$msg="Su petición quedó registrada, todo se manejará de manera anónima";
 }
  else
 {
	$msg="Error no se agregaron los datos".mysqli_error($enlace);
 }
mysqli_close($conecta);
   }//Final del if del botón Guardar.
}//Final del if del token.
?>		


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="A.L.S" content="">
    <link rel="icon" href="favicon.ico">

    <title>Denuncias Ciudadanas</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <script src="bootstrap.min.js" ></script>
<style>
   .letra {
    font-weight: bold;
    }
</style>
<style>
.modalDialog {
	position: fixed;
	font-family: Arial, Helvetica, sans-serif;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	background: rgba(0,0,0,0.8);
	z-index: 99999;
	opacity:0;
	-webkit-transition: opacity 400ms ease-in;
	-moz-transition: opacity 400ms ease-in;
	transition: opacity 400ms ease-in;
	pointer-events: none;
	overflow: auto;
}
.modalDialog:target {
	opacity:1;
	pointer-events: auto;
}
.modalDialog > div {
	width: 70%; 
    position: relative;
	margin: 5% auto;
	padding: 5px 20px 13px 20px;
	border-radius: 10px;
	background: #fff;
	-webkit-transition: opacity 400ms ease-in;
	-moz-transition: opacity 400ms ease-in;
	transition: opacity 400ms ease-in;
}
.close {
	opacity:1;
	background: #fc0000;
	color: #FFFFFF;
	line-height: 30px;
	position: absolute;
	right: -12px;
	text-align: center;
	top: -10px;
	width: 30px;
	text-decoration: none;
	font-weight: bold;
	-webkit-border-radius: 12px;
	-moz-border-radius: 12px;
	border-radius: 12px;
	-moz-box-shadow: 1px 1px 3px #000;
	-webkit-box-shadow: 1px 1px 3px #000;
	box-shadow: 1px 1px 3px #000;
}
.close:hover { background: #00d9ff; }
</style>
</head>
<body>
    <div class="container">
    <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
	<div class="panel panel-info">
		<div class="panel-heading">
		<div class="panel-title">Buzón de Quejas Contraloría Municipal Tuxpan, Veracruz</div>
		</div>  
	 <div class="panel-body" >
		<form id="signupform" class="form-horizontal" role="form" action="index.php" method="POST" autocomplete="off">
			<div class="form-group">
			  <?php
	         	if (isset ($msg))
	            {echo "<h4 align='center'>$msg con el folio: $fusion</h4>";}
	          ?>
			<label for="nombre" class="col-md-3 control-label">Nombre:</label>
			<div class="col-md-9">
			<input type="text" class="form-control" name="nombre" placeholder="Escriba su Nombre Completo" required >
			</div>
			</div>
			<div class="form-group">
			<label for="telefono" class="col-md-3 control-label">Teléfono Móvil</label>
			<div class="col-md-9">
			<input type="tel" class="form-control" name="telefono" placeholder="Escriba un Número de Teléfono" required>
			</div>
			</div>
			<div class="form-group">
			<label for="email" class="col-md-3 control-label">Email</label>
			<div class="col-md-9">
			<input type="email" class="form-control" name="email" placeholder="Escriba un correo electrónico" required>
			</div>
			</div>
			<div class="form-group">
			<label for="email" class="col-md-3 control-label">Mensaje</label>
			<div class="col-md-9">
			<textarea name="observa" class="form-control letra" placeholder="Quejas, sugerencias y/o Felicitaciones" rows="5"></textarea>
			<input type="hidden" name="token"  class="form-control letra" value="<?php echo $token;?>">
			</div>
			</div>
			Resuelve la operacion <?php $var1= rand(0,100); echo $var1; ?> + <?php $var2=rand(0,20); $suma = $var1+$var2;echo convertirNumeroLetra($var2);?>
            <input type="hidden" name="suma" value="<?php echo $suma;?>">
            <input type="text" name="captcha" required> 
			<center>
			<input type="checkbox" name="sms" value="Acepto" required> Acepto la <a href="#openModal">politica de privacidad</a> <br></br>
			</center>	
			<div id="openModal" class="modalDialog">
				<div>
				   <a href="#close" title="Close" class="close">X</a>
				   <h4><B>Politica de privacidad</B></h4>
				   <p align="justify">
					A la ciudadanía en General
                    de acuerdo con la Ley General de Protección de Datos Personales en Posesión del Sujeto Obligado Municipio de Tuxpan, hacemos de su conocimiento que para realizar una solicitud o gestión, ante Municipio de Tuxpan, le solicitaremos algunos de los siguientes datos:</p>
                   <UL type="disk">
                   <LI>Nombre completo del solicitante
                   <LI>Correo electrónico
                   <LI>Número telefónico (Móvil)
                   </UL>
                   <p align="justify">Los datos anteriores serán usados para los siguientes objetivos:  </P>
                   <UL type="disk"> 
                   <LI>Informarle sobre el proceso en que se encuentra su solicitud
                   <LI>Invitarle sobre los eventos más importantes del Municipio de Tuxpan
                   <LI>Darle la mejor atención posible al realizar algún trámite.
                   <LI>Informarle sobre acciones del gobierno municipal.
                   </UL>
                   <p align="justify"> Por otra parte Municipio de Tuxpan, no transfiere su información a ninguna otra dependencia externa.</P>
                   <p align="justify"> <h4><B>Identidad y domicilio del responsable</B></h4></p>
                   <p align="justify">Municipio de Tuxpan, se preocupa por la confidencialidad y seguridad de los datos personales de sus ciudadanos y tiene el compromiso de proteger su privacidad y cumplir con la legislación aplicable a la protección de datos personales en posesión del Municipio de Tuxpan. Municipio de Tuxpan es el responsable de recabar sus datos personales y nuestro domicilio es el ubicado en Av. Juárez No. 20, Col Centro, C.P. 92800,Tuxpan de Rodríguez Cano, Veracruz. Nuestros datos de contacto se encuentran www.tuxpanveracruz.gob.mx </p>
				</div>
			</div>		
				<div class="form-group">                                      
				<div class="col-md-offset-3 col-md-9">
				<button id="btn-signup" type="submit" class="btn btn-info" name="guardar"><i class="icon-hand-right"></i>Registrar</button> 
				</div>
				</div>
    	</form>
	 </div>
	</div>
	</div>     
    </div> <!-- /container -->
  </body>
</html>