<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="" content="">
    <meta name="" content="">
    <meta name="" content="">
    <link rel="icon" href="icono.png">

    <title>Inicio de Sesión</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
   .letra {
    font-weight: bold;
    }
</style>
  </head>

  <body>

    <div class="container">
     
    	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
				<div class="panel panel-info" >
					<div class="panel-heading">
						<div class="panel-title">Iniciar Sesión</div>
						<div style="float:right; font-size: 80%; position: relative; top:-10px"><p>SiDenTux Ver. 1.0 Rev. 2.2 </p></div>
					</div>     
				
				<div style="padding-top:30px" class="panel-body" >
					
					<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
					
					<form id="loginform" class="form-horizontal" role="form"action="control.php" method="POST" autocomplete="off">
						
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input id="User" type="text" class="form-control" name="usuario" value="" placeholder="Usuario" required autofocus>                                        
						</div>
						
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input id="Password" type="password" class="form-control" name="clave" placeholder="Contraseña" required>
						</div>
											
							<?php
								require_once('conexion.php');
								$seleccionado = "";
								if($_SERVER['REQUEST_METHOD']=='POST')
								{
									$seleccionado = $_POST['departamentos'];
								}
								$sql_query = "select * from departamentos ORDER BY nombre ASC";
								$result = mysqli_query($conecta,$sql_query);
							?>
			
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
							<select class="form-control select" name="departamentos" required>
							<option value="">(Departamento)</option>
		
								<?php 
									while($row = mysqli_fetch_array($result))
									{
										echo"<option value='$row[1]'>$row[1]</option>";
									}
									mysqli_close($conecta);  
							?>
	   
							</select>
						</div>
						
						<div style="margin-top:10px" class="form-group">
							<div class="col-sm-12 controls">
								<button id="btn-login" type="submit" class="btn btn-success">Iniciar Sesión</a>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-md-12 control">
								<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >						  
								  Copyright © Todos los Derechos Reservados Tuxpan, Veracruz.<img src="icono.png" width="15%" height="15%" style="float: right">								  
								</div>
							</div>
						</div>    
					</form>
				</div>                     
				</div>  
				</div>
             
       </div> <!-- /container -->
     </body>
</html>