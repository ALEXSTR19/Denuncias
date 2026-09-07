<?php
$_POST['telefono'] = isset($_POST['telefono']) ? $_POST['telefono'] : null;
$_POST['sms'] = isset($_POST['sms']) ? $_POST['sms'] : null;
	
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

if(isset($_POST["captcha"]))
      { 
      $captcha = $_POST["captcha"];
	  $suma = $_POST["suma"];
     if($suma==$captcha){		  
if($utoken!=$_POST['token']){
if (isset($_REQUEST['guardar'])) 
{ 
    $sql_query = "insert into denuncias(folio,movil,nombre,correo,mensaje,token) values ('$fusion','$_POST[telefono]','$_POST[nombre]','$_POST[email]','$_POST[observa]','$_POST[token]')";
   if (mysqli_query($conecta,$sql_query)){
	  $area=52;
	    if($sms=="Acepto" && $_POST['telefono']){//validación para enviar mensajes de texto
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
$sData .="passwd=Cem30dit.&";
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
$buf = "POST https://www.altiria.net:8443/api/http HTTP/1.0\r\n";
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
}//Final del if de la validación del captcha.
else
{
	$msg2="Error al resolver la operación, llene nuevamente el formulario correctamente.";
}	
}//Final del if del captcha
?>		


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="A.L.S" content="">
    <link rel="icon" href="icono.png">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Denuncias Ciudadanas</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <script src="bootstrap.min.js" ></script>
<style>
:root {
	--ink: #35212b;
	--muted: #74636b;
	--wine: #8f124d;
	--wine-dark: #650d37;
	--wine-light: #f7eaf0;
	--gold: #ac9334;
	--gold-dark: #806b1f;
	--gold-light: #f8f4e5;
	--line: #e6dce1;
	--error: #9f2d3d;
}
* { box-sizing: border-box; }
body {
  min-height: 100vh;
  margin: 0;
  color: var(--ink);
	background: radial-gradient(circle at 12% 0%, #f9edf2 0, transparent 31%), linear-gradient(135deg, #fffdfb 0%, #f5f0f2 100%);
	font-family: "Outfit", "Segoe UI", sans-serif;
}
.page-shell { display: flex; min-height: 100vh; max-width: 980px; flex-direction: column; justify-content: center; margin: 0 auto; padding: 24px; }
.brand-bar { display: flex; align-items: center; justify-content: space-between; gap: 24px; width: 100%; margin: 0 auto 18px; }
.brand { display: flex; align-items: center; gap: 15px; }
.brand img { width: 48px; height: 48px; object-fit: contain; }
.brand-copy { border-left: 1px solid #d9c6cf; padding-left: 15px; }
.brand-copy strong { display: block; color: var(--wine); font-size: 13px; letter-spacing: .11em; text-transform: uppercase; }
.brand-copy span { display: block; margin-top: 4px; color: var(--muted); font-size: 12px; }
.secure-note { color: var(--muted); font-size: 12px; letter-spacing: .04em; }
.content-grid { display: grid; grid-template-columns: minmax(220px, .72fr) minmax(0, 1.5fr); width: 100%; margin: 0 auto; overflow: hidden; border: 1px solid #e3d7dd; border-radius: 14px; background: #fff; box-shadow: 0 16px 38px rgba(75, 25, 51, .12); }
.intro { position: relative; overflow: hidden; padding: 38px 30px; color: #fff; background: linear-gradient(148deg, #650d37 0%, #8f124d 67%, #a93669 100%); }
.intro:after { content: ""; position: absolute; right: -100px; bottom: -130px; width: 300px; height: 300px; border: 42px solid rgba(255, 235, 190, .13); border-radius: 50%; }
.intro .eyebrow { position: relative; z-index: 1; color: #ebd98c; font-size: 12px; font-weight: bold; letter-spacing: .16em; text-transform: uppercase; }
.intro h1 { position: relative; z-index: 1; margin: 15px 0 16px; font-family: "Outfit", "Segoe UI", sans-serif; font-size: clamp(30px, 3.5vw, 42px); font-weight: 600; line-height: 1.06; }
.intro p { position: relative; z-index: 1; max-width: 310px; color: #f6e8ee; font-size: 14px; line-height: 1.65; }
.intro-list { position: relative; z-index: 1; margin: 28px 0 0; padding: 0; list-style: none; }
.intro-list li { display: flex; gap: 9px; align-items: center; margin-top: 13px; color: #fff6df; font-size: 12px; }
.intro-list li:before { content: "✓"; display: grid; width: 22px; height: 22px; place-items: center; border-radius: 50%; color: var(--wine); background: #e5cf72; font-weight: bold; }
.form-area { padding: 30px 38px 32px; }
.form-heading { margin-bottom: 21px; padding-bottom: 17px; border-bottom: 1px solid var(--line); }
.form-heading h2 { margin: 0 0 6px; color: var(--wine); font-family: "Outfit", "Segoe UI", sans-serif; font-size: 27px; font-weight: 600; }
.form-heading p { margin: 0; color: var(--muted); font-size: 14px; }
.form-group { margin-bottom: 0; padding: 0 0 16px; }
.form-area form > .form-group:not(:last-child) { margin-bottom: 15px; border-bottom: 1px solid #f0e8eb; }
.control-label { display: block; width: 100%; margin-bottom: 8px; color: var(--wine-dark); font-size: 13px; font-weight: bold; }
.form-control { width: 100%; height: 43px; padding: 10px 13px; border: 1px solid var(--line); border-radius: 7px; color: var(--ink); background: #fffdfc; box-shadow: none; font-size: 14px; transition: border-color .2s, box-shadow .2s, background .2s; }
.form-control:focus { border-color: var(--gold); outline: 0; background: #fff; box-shadow: 0 0 0 3px rgba(172,147,52,.18); }
textarea.form-control { min-height: 105px; resize: vertical; }
.captcha-row { display: grid; grid-template-columns: minmax(145px, .7fr) 1fr; gap: 14px; align-items: end; }
.captcha-question { padding: 11px 13px; border: 1px solid #e5d79e; border-radius: 7px; color: var(--wine-dark); background: var(--gold-light); font-size: 13px; font-weight: bold; }
.consent { display: flex; gap: 10px; align-items: flex-start; margin: 3px 0 24px; color: var(--muted); font-size: 12px; line-height: 1.5; }
.consent input { flex: 0 0 auto; width: 17px; height: 17px; margin: 0; accent-color: var(--gold); }
.consent a { color: var(--wine); font-weight: bold; text-decoration: underline; }
.btn-submit { display: inline-flex; align-items: center; gap: 9px; min-height: 43px; padding: 0 21px; border: 0; border-radius: 7px; color: #fff; background: var(--wine); box-shadow: 0 6px 14px rgba(143,18,77,.18); font-size: 13px; font-weight: bold; transition: transform .2s, background .2s; }
.btn-submit:hover, .btn-submit:focus { color: #fff; background: var(--wine-dark); transform: translateY(-1px); }
.status { margin-bottom: 22px; padding: 14px 16px; border-left: 4px solid var(--gold); border-radius: 6px; color: var(--wine-dark); background: var(--gold-light); font-size: 14px; line-height: 1.45; }
.status.error { border-color: var(--error); color: #842b38; background: #fff1f2; }
.modalDialog { position: fixed; inset: 0; z-index: 99999; overflow: auto; padding: 30px 18px; background: rgba(62, 12, 36, .74); opacity: 0; pointer-events: none; transition: opacity .25s ease; }
.modalDialog:target { opacity: 1; pointer-events: auto; }
.modalDialog > div { position: relative; width: min(720px, 100%); margin: 4vh auto; padding: 32px 36px; border-radius: 14px; color: var(--ink); background: #fff; box-shadow: 0 22px 70px rgba(0,0,0,.25); line-height: 1.6; }
.modalDialog h4 { margin-top: 0; color: var(--wine); font-family: "Outfit", "Segoe UI", sans-serif; font-size: 24px; }
.modalDialog ul { padding-left: 21px; }
.close { position: absolute; top: 14px; right: 18px; color: var(--muted); font-size: 23px; font-weight: bold; text-decoration: none; }
.close:hover { color: var(--wine); }
@media (max-width: 760px) { .page-shell { padding: 18px 14px 30px; } .brand-bar { align-items: flex-start; margin-bottom: 20px; } .secure-note { display: none; } .content-grid { display: block; border-radius: 13px; } .intro { padding: 30px 26px; } .intro h1 { font-size: 39px; } .intro-list { display: none; } .form-area { padding: 30px 23px 28px; } .captcha-row { grid-template-columns: 1fr; gap: 8px; } .modalDialog > div { padding: 27px 22px; } }
</style>
</head>
<body>
	<div class="page-shell">
		<header class="brand-bar">
			<div class="brand">
				<img src="images/logo.png" alt="Gobierno Municipal de Tuxpan">
				<div class="brand-copy"><strong>Gobierno Municipal</strong><span>Tuxpan, Veracruz</span></div>
			</div>
			<div class="secure-note">Atención ciudadana · Canal oficial</div>
		</header>
		<main class="content-grid">
			<section class="intro">
				<h1>Buzón de Quejas Contraloría Municipal Tuxpan, Veracruz</h1>
				<p>Comparte una situación, propuesta o felicitación. Tu mensaje será recibido por la Contraloría Municipal.</p>
				<ul class="intro-list"><li>Registro rápido y sencillo</li><li>Tratamiento responsable de tus datos</li></ul>
			</section>
			<section class="form-area">
				<div class="form-heading"><h2>Cuéntanos qué sucede</h2><p>Completa los datos para registrar tu mensaje.</p></div>
			<form id="signupform" role="form" action="index.php" method="POST" autocomplete="off">
			<div class="form-group">
			  <?php
	         	if (isset ($msg))
	            {echo "<div class='status'>$msg con el folio: $fusion</div>";}
			    if (isset ($msg2))
	            {echo "<div class='status error'>$msg2</div>";}
	          ?>
			<label for="nombre" class="control-label">Nombre completo</label>
			<input id="nombre" type="text" class="form-control" name="nombre" placeholder="Escribe tu nombre completo" required>
			</div>
			<div class="form-group">
			<label for="telefono" class="control-label">Teléfono móvil</label>
			<input id="telefono" type="tel" class="form-control" name="telefono" placeholder="10 dígitos" required>
			</div>
			<div class="form-group">
			<label for="email" class="control-label">Correo electrónico</label>
			<input id="email" type="email" class="form-control" name="email" placeholder="nombre@ejemplo.com" required>
			</div>
			<div class="form-group">
			<label for="observa" class="control-label">Tu mensaje</label>
			<textarea id="observa" name="observa" class="form-control" placeholder="Describe tu queja, sugerencia o felicitación" rows="5" required></textarea>
			<input type="hidden" name="token" value="<?php echo $token;?>">
			</div>
			<div class="form-group">
			<label for="captcha" class="control-label">Verificación</label>
			<div class="captcha-row">
			<div class="captcha-question">Resuelve: <?php
			 require_once("numeroletra.php");
			 $var1= rand(0,100); echo $var1; ?> + <?php $var2=rand(0,20); $suma = $var1+$var2; echo convertirNumeroLetra($var2); ?> = ?</div>
		    <input id="captcha" type="text" class="form-control" name="captcha" placeholder="Escribe el resultado" required>
			<input type="hidden" name="suma" value="<?php echo $suma;?>">
			</div>
			</div>
			<div class="consent"><input id="sms" type="checkbox" name="sms" value="Acepto" required><label for="sms">Acepto la <a href="#openModal">política de privacidad</a> y autorizo el uso de mis datos para dar seguimiento a mi solicitud.</label></div>
			<div id="openModal" class="modalDialog">
				<div>
				   <a href="#close" title="Cerrar" class="close">×</a>
				   <h4>Política de privacidad</h4>
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
				<button id="btn-signup" type="submit" class="btn-submit" name="guardar">Registrar mensaje <span aria-hidden="true">→</span></button>
				</div>
	    	</form>
			</section>
		</main>
	</div>
  </body>
</html>