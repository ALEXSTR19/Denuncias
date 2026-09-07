<?php
require_once("seguridad.php");
require_once("conexion.php");

if (isset($_GET['id'])) {
    
    $id_denuncia = mysqli_real_escape_string($conecta, $_GET['id']);
    
    
    $sql_borrado = "UPDATE denuncias SET activo = 0 WHERE id = '$id_denuncia'";
    
    if (mysqli_query($conecta, $sql_borrado)) {
        header("Location: listado.php?status=success");
        exit();
    } else {
        echo "Error al intentar eliminar el registro: " . mysqli_error($conecta);
    }
    
} else {
    header("Location: listado.php");
    exit();
}

mysqli_close($conecta);
?>