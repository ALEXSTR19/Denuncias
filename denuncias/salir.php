<?php
require_once('conexion.php');
session_start();
$user=iconv('UTF-8', 'ISO-8859-1', $_SESSION['usuarioactual']);
$ensesion="UPDATE usuarios SET login=0 WHERE idusuario='$user'";
$result = mysqli_query($conecta,$ensesion);
session_destroy();
echo "<script> window.location.href = 'login.php'</script>";
?>
