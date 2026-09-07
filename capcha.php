<?php
require_once("numeroletra.php");
if(isset($_POST["captcha"]))
      { 
      $captcha = $_POST["captcha"];
	  $suma = $_POST["suma"];
	  if($suma==$captcha)
	  { 
      echo "Captcha Correcto"; 
	  }
	  else
	  { 
      echo "Captcha Incorrecto"; 
	  } 
	  }
?>

<!DOCTYPE html>
<html>
<head>
<title>Captcha Ejemplo – Evilnapsis</title>
</head>
<body>
<h1>Ejemplo de captcha</h1>
<form method="post" action="capcha.php">
Resuelve la operacion <?php $var1= rand(0,100); echo $var1; ?> + <?php $var2=rand(0,20); $suma = $var1+$var2;echo convertirNumeroLetra($var2);?>
<input type="hidden" name="suma" value="<?php echo $suma;?>">
<input type="text" name="captcha" required> 
<input type="submit" value="Enviar">
</form>
</body>
</html>
