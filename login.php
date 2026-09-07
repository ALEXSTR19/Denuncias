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
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Inicio de Sesión</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
		<style>
			:root { --ink: #35212b; --muted: #74636b; --wine: #8f124d; --wine-dark: #650d37; --gold: #ac9334; --gold-dark: #806b1f; --line: #e6dce1; }
			* { box-sizing: border-box; }
			body { min-height: 100vh; margin: 0; color: var(--ink); background: radial-gradient(circle at 10% 0%, #f9edf2 0, transparent 32%), linear-gradient(135deg, #fffdfb 0%, #f5f0f2 100%); font-family: "Outfit", "Segoe UI", sans-serif; }
			.login-shell { max-width: 1080px; margin: 0 auto; padding: 28px 24px 42px; }
			.brand-bar { display: flex; align-items: center; justify-content: space-between; gap: 24px; margin-bottom: 32px; }
			.brand { display: flex; align-items: center; gap: 15px; }
			.brand img { width: 62px; height: 62px; object-fit: contain; }
			.brand-copy { border-left: 1px solid #d9c6cf; padding-left: 15px; }
			.brand-copy strong { display: block; color: var(--wine); font-size: 13px; letter-spacing: .11em; text-transform: uppercase; }
			.brand-copy span { display: block; margin-top: 4px; color: var(--muted); font-size: 12px; }
			.access-note { color: var(--muted); font-size: 12px; letter-spacing: .04em; }
			.login-card { display: grid; grid-template-columns: minmax(250px, .82fr) minmax(0, 1fr); overflow: hidden; border: 1px solid #e3d7dd; border-radius: 18px; background: #fff; box-shadow: 0 22px 55px rgba(75, 25, 51, .14); }
			.welcome { position: relative; overflow: hidden; padding: 56px 42px; color: #fff; background: linear-gradient(148deg, #650d37 0%, #8f124d 67%, #a93669 100%); }
			.welcome:after { content: ""; position: absolute; right: -100px; bottom: -130px; width: 300px; height: 300px; border: 42px solid rgba(255, 235, 190, .13); border-radius: 50%; }
			.eyebrow { position: relative; z-index: 1; color: #ebd98c; font-size: 12px; font-weight: bold; letter-spacing: .16em; text-transform: uppercase; }
			.welcome h1 { position: relative; z-index: 1; margin: 18px 0 20px; font-family: "Outfit", "Segoe UI", sans-serif; font-size: clamp(34px, 4vw, 50px); font-weight: 500; line-height: 1.06; }
			.welcome p { position: relative; z-index: 1; max-width: 330px; color: #f6e8ee; font-size: 16px; line-height: 1.7; }
			.welcome-mark { position: relative; z-index: 1; display: inline-flex; align-items: center; justify-content: center; width: 54px; height: 54px; margin-top: 40px; border: 1px solid rgba(235, 217, 140, .7); border-radius: 50%; color: #ebd98c; font-size: 24px; }
			.login-form { padding: 48px 54px 42px; }
			.form-heading { margin-bottom: 30px; }
			.form-heading h2 { margin: 0 0 8px; color: var(--wine); font-family: "Outfit", "Segoe UI", sans-serif; font-size: 31px; font-weight: 500; }
			.form-heading p { margin: 0; color: var(--muted); font-size: 14px; }
			.field { margin-bottom: 22px; }
			.field label { display: block; margin-bottom: 8px; color: var(--wine-dark); font-size: 13px; font-weight: bold; }
			.input-wrap { position: relative; }
			.input-wrap .glyphicon { position: absolute; top: 15px; left: 15px; z-index: 2; color: var(--gold-dark); }
			.form-control { width: 100%; height: 47px; padding: 12px 14px 12px 43px; border: 1px solid var(--line); border-radius: 8px; color: var(--ink); background: #fffdfc; box-shadow: none; font-size: 14px; }
			.form-control:focus { border-color: var(--gold); outline: 0; background: #fff; box-shadow: 0 0 0 3px rgba(172,147,52,.18); }
			select.form-control { cursor: pointer; }
			.btn-login { display: inline-flex; align-items: center; justify-content: center; gap: 9px; width: 100%; min-height: 48px; border: 0; border-radius: 8px; color: #fff; background: var(--wine); box-shadow: 0 8px 18px rgba(143,18,77,.22); font-size: 14px; font-weight: bold; transition: transform .2s, background .2s; }
			.btn-login:hover, .btn-login:focus { color: #fff; background: var(--wine-dark); transform: translateY(-1px); }
			.footer-note { margin-top: 30px; padding-top: 16px; border-top: 1px solid var(--line); color: var(--muted); font-size: 11px; line-height: 1.5; }
			.footer-note img { float: right; width: 34px; height: 34px; object-fit: contain; }
			@media (max-width: 760px) { .login-shell { padding: 18px 14px 30px; } .brand-bar { align-items: flex-start; margin-bottom: 20px; } .access-note { display: none; } .login-card { display: block; border-radius: 13px; } .welcome { padding: 30px 26px; } .welcome h1 { font-size: 38px; } .welcome-mark { display: none; } .login-form { padding: 30px 23px 28px; } }
			.container { width: auto; max-width: 1080px; padding: 0; }
			#loginbox { float: none; width: 100%; margin: 0 auto !important; padding: 0; }
			#loginbox .panel { overflow: hidden; border: 1px solid #e3d7dd; border-radius: 18px; background: #fff; box-shadow: 0 22px 55px rgba(75, 25, 51, .14); }
			#loginbox .panel-heading { min-height: 112px; padding: 30px 42px; border: 0; color: #fff; background: linear-gradient(148deg, #650d37 0%, #8f124d 67%, #a93669 100%); }
			#loginbox .panel-title { font-family: "Outfit", "Segoe UI", sans-serif; font-size: 31px; font-weight: 500; }
			#loginbox .panel-heading p { margin: 7px 0 0; color: #ebd98c; font-size: 11px; letter-spacing: .08em; }
			#loginbox .panel-body { padding: 42px 54px 28px; }
			#loginbox .input-group { display: block; margin-bottom: 22px !important; }
			#loginbox .input-group-addon { display: none; }
			#loginbox .input-group:before { display: block; margin-bottom: 8px; color: var(--wine-dark); font-size: 13px; font-weight: bold; }
			#loginbox .input-group:nth-of-type(1):before { content: "Usuario"; }
			#loginbox .input-group:nth-of-type(2):before { content: "Contraseña"; }
			#loginbox .input-group:nth-of-type(3):before { content: "Departamento"; }
			#loginbox .form-control { height: 47px; padding: 12px 14px; border: 1px solid var(--line); border-radius: 8px; }
			#loginbox .form-control:focus { border-color: var(--gold); box-shadow: 0 0 0 3px rgba(172,147,52,.18); }
			#loginbox .form-group { margin: 0; }
			#loginbox #btn-login { width: 100%; min-height: 48px; border: 0; border-radius: 8px; color: #fff; background: var(--wine); box-shadow: 0 8px 18px rgba(143,18,77,.22); font-size: 14px; font-weight: bold; }
			#loginbox #btn-login:hover, #loginbox #btn-login:focus { color: #fff; background: var(--wine-dark); }
			#loginbox .control { padding: 0; }
			#loginbox .control > div { padding-top: 16px !important; border-top-color: var(--line) !important; color: var(--muted); font-size: 11px !important; line-height: 1.5; }
			#loginbox .control img { width: 34px; height: 34px; object-fit: contain; }
			@media (max-width: 760px) { .container { padding: 0 14px; } #loginbox .panel-heading { padding: 28px 24px; } #loginbox .panel-body { padding: 30px 23px 24px; } #loginbox .panel-title { font-size: 28px; } }
			.container { display: flex; min-height: 100vh; align-items: center; justify-content: center; }
			#loginbox { max-width: 570px; }
			#loginbox .panel { border-radius: 13px; box-shadow: 0 14px 34px rgba(75, 25, 51, .11); }
			#loginbox .panel-heading { min-height: 0; padding: 23px 30px 21px; }
			#loginbox .panel-title { font-size: 26px; }
			#loginbox .panel-heading > div:last-child { float: none !important; position: static !important; margin-top: 5px; }
			#loginbox .panel-body { padding: 26px 30px 22px; }
			#loginbox .input-group { margin-bottom: 16px !important; padding-bottom: 16px; border-bottom: 1px solid #f0e8eb; }
			#loginbox .input-group:nth-of-type(3) { border-bottom: 0; padding-bottom: 2px; }
			#loginbox .form-control { height: 43px; border-radius: 7px; font-size: 13px; }
			#loginbox .form-group { padding-top: 3px; }
			#loginbox #btn-login { min-height: 43px; border-radius: 7px; box-shadow: 0 6px 14px rgba(143,18,77,.18); font-size: 13px; }
			#loginbox .control > div { padding-top: 13px !important; }
			@media (max-width: 760px) { .container { min-height: 100vh; } #loginbox .panel-heading { padding: 22px 23px 20px; } #loginbox .panel-body { padding: 24px 23px 20px; } }
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
								<button id="btn-login" type="submit" class="btn btn-success">Iniciar Sesión</button>
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