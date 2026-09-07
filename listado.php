<?php require_once("seguridad.php");?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="icono.png">

    <title>Listado de denuncias Ciudadanas 2022-2026</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="jquery.alerts.js"></script>
    <link href="jquery.alerts.css" rel="stylesheet" type="text/css" />
	
<style>
   .letra {
    font-weight: bold;
    }
</style>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #00CC07;
    color: white;
}
</style>
<style>
.pagination-container {
    display: flex;
    justify-content: center;
    margin: 20px 0;
    font-family: Arial, sans-serif;
}

.pagination {
    list-style: none;
    display: flex;
    padding: 0;
    gap: 5px;
}

.pagination li a, .pagination li span {
    display: block;
    padding: 8px 14px;
    text-decoration: none;
    color: #555;
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.pagination li a:hover {
    background-color: #f2f2f2;
    border-color: #bbb;
    color: #000;
}

.pagination li span.active {
    background-color: #882e41; /* Tu color específico */
    color: #ffffff;            /* Texto blanco para que resalte */
    border-color: #882e41;
    font-weight: bold;
    box-shadow: 0 2px 4px rgba(0,0,0,0.2); /* Sombreado sutil */
    cursor: default;
}
</style>
<style>
    .separador {
    border: none;          
    height: 2px;           
    background-color: #882e41; 
    width: 50%;            
    margin: 20px auto;     
    border-radius: 5px;    
    
}
.separador-degradado {
    border: 0;
    height: 1px;
    background-image: linear-gradient(to right, transparent, #882e41, transparent);
    margin: 30px 0;
}
</style>
<style>
.tabla-denuncias {
    width: 100%;
    border-collapse: collapse; 
    margin: 20px 0;
    font-family: 'Segoe UI', Roboto, sans-serif;
    font-size: 1.3rem;
    background-color: white;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden; 
}

.tabla-denuncias thead tr {
    background-color: #882e41; /* Tu color guinda */
    color: #ffffff;
    text-align: left;
    font-weight: bold;
}
th{
    background-color: #882e41;
}

.tabla-denuncias, 
.tabla-denuncias td {
    padding: 12px 15px;
    border-bottom: 1.5px solid #eee; /* Línea separadora muy suave */
}

.tabla-denuncias tbody tr:nth-of-type(even) {
    background-color: #f9f9f9;
}

.tabla-denuncias tbody tr:hover {
    background-color: #f1f1f1;
    transition: 0.2s;
}



.tabla-denuncias td:first-child, 
.tabla-denuncias td:last-child {
    text-align: center;
}

.acciones a:hover {
    transform: scale(1.1);
    display: inline-block;
}
</style>
<style>
    .header-seccion {
    text-align: center; /* Reemplaza al <center> */
    margin: 40px 0 20px 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.header-seccion h3 {
    color: #333; /* Un gris muy oscuro para legibilidad */
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 10px;
    letter-spacing: 1px;
    text-transform: uppercase; /* Opcional: hace que se vea más formal */
}

/* Línea pequeña debajo del título para estilo */
.linea-adorno {
    content: '';
    width: 60px;
    height: 4px;
    background-color: #882e41; /* Tu color guinda */
    margin: 0 auto;
    border-radius: 2px;
}
</style>
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
<script type="text/javascript"> 
$(document).ready(function(){
	$('#boton_jalert').click(function() {
		jAlert("Mensaje de Alerta", "SiDenTux Ver. 1.0 Rev. 2.2");
	});
	$("#boton_promp").click( function() {
					jPrompt('Teclea el folio:', '', 'SiDenTux Ver. 1.0 Rev. 2.2', function(r) {
						var jfolio = r;
						if (r)  
                        {
						location.href='buscarfolio.php?sendfolio='+jfolio; 
						}
						else
						{
						jAlert("No se aceptan espacios en Blanco", "SiDenTux Ver. 1.0 Rev. 2.2");	
						}
							
					});
				});
	$('#boton_jconfirm').click(function() {
		jConfirm("¿Seguro(a) de realizar esta operación?", "SiDenTux Ver. 1.0 Rev. 2.2", function(r) {
			if(r) {
				mostrar2();
			} else {
				jAlert("Cancelar operación", "SiDenTux Ver. 1.0 Rev. 2.2");
			}
		});
	});
});
</script>
  </head>
  <body>

    <div class="container">

     <nav class="navbar navbar-default letra">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            </button>
            <a class="navbar-brand" ><?php echo $_SESSION['usuarioactual']?></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
			<li class="active"><a href="#">Folios</a></li>
			   <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Herramientas<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#" id="boton_promp">Buscar Folios</a></li>
				  <li class="dropdown-submenu">
                  <a class="test" tabindex="-1" href="#">Reportes<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Por Folio</a></li>
                  <li><a tabindex="-1" href="#">Global</a></li>
                  </ul>
                  </li>
				  </ul>                
                  </li>
			      <li><a href="salir.php">Cerrar Sesión</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right" >
             </ul>
          </div>
        </div>
      </nav>
    <div class="letra">
   	<div align='center'>  
<div class="header-seccion">
    <h3>Denuncias Ciudadanas 2022-2026</h3>
    <div class="linea-adorno"></div>
	<table class="tabla-denuncias">
    <thead>
        <tr>
            <th>Imprimir</th>
            <th>Folio</th>
            <th>Móvil</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Mensaje</th>
            <th>Fecha/Hora</th>
        </tr>
    </thead> 
    <tbody>
	<?php
       require_once("conexion.php"); 
       // Se agrega WHERE activo = 1 para contar solo registros no eliminados
       $sql = "SELECT * FROM denuncias WHERE activo = 1";
	   $resultado = mysqli_query($conecta,$sql);
	   $total_registros = mysqli_num_rows($resultado);
	   
	   //Si hay registros
     if ($total_registros > 0) {
	  //Limito la busqueda
	  $TAMANO_PAGINA = 8;
        $pagina = false;
	  //examino la pagina a mostrar y el inicio del registro a mostrar
        if (isset($_GET["pagina"]))
            $pagina = $_GET["pagina"];
       
	   if (!$pagina) {
		$inicio = 0;
		$pagina = 1;
	}
	else {
		$inicio = ($pagina - 1) * $TAMANO_PAGINA;
	}
	//calculo el total de paginas
	$total_paginas = ceil($total_registros / $TAMANO_PAGINA);
    
    // Se agrega WHERE activo = 1 para mostrar solo registros vigentes en la paginación
	$consulta = "SELECT * FROM denuncias WHERE activo = 1 ORDER BY fechahor DESC LIMIT ".$inicio."," . $TAMANO_PAGINA;
	$rs = mysqli_query($conecta, $consulta);
	$url='';
	if ($total_paginas > 1) {
    echo '<nav class="pagination-container">';
    echo '<ul class="pagination">';

    // Boton anterior
    if ($pagina > 1) {
        echo '<li><a href="'.$url.'?pagina='.($pagina-1).'">&laquo; Anterior</a></li>';
    }

    $rango = 10;
    $mitad = floor($rango / 2);
    
    // Calculamos el inicio del bloque
    $inicio = $pagina - $mitad;
    // Calculamos el fin del bloque
    $fin = $pagina + $mitad;

    
    if ($inicio < 1) {
        $inicio = 1;
        $fin = min($total_paginas, $rango);
    }
    if ($fin > $total_paginas) {
        $fin = $total_paginas;
        $inicio = max(1, $total_paginas - $rango + 1);
    }

    // Generar numeros
    for ($i = $inicio; $i <= $fin; $i++) {
        if ($pagina == $i) {
    // Página actual con la clase que configuramos arriba
    echo '<li><span class="active">'.$i.'</span></li>';
} else {
    echo '<li><a href="'.$url.'?pagina='.$i.'">'.$i.'</a></li>';
}
    }

    //Boton siguiente
    if ($pagina < $total_paginas) {
        echo '<li><a href="'.$url.'?pagina='.($pagina+1).'">Siguiente &raquo;</a></li>';
    }

    echo '</ul>';
    echo '</nav>';
}

	echo '<hr class="separador-degradado">';
}
	

       // Bucle de datos
       while ($dato=mysqli_fetch_array($rs)) {
            echo "<tr>";
            echo "<td><a href='detalle.php?var=$dato[1]' target='_blank'><img src='images/impresora.png' width='20'></a></td>";
            echo "<td><strong>$dato[1]</strong></td>"; // Folio en negrita
            echo "<td>$dato[2]</td>";
            echo "<td>$dato[3]</td>";
            echo "<td>$dato[4]</td>";
            echo "<td class='col-mensaje'>$dato[5]</td>"; // Clase especial para mensaje
            echo "<td>$dato[7]</td>";
            echo "<td>
            <a href='eliminar.php?id=$dato[0]' title='Eliminar' onclick='return confirm(\"¿Estás seguro de eliminar este registro?\")' style='color: #ef4444;'>
                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\">
                  <path d=\"M3 6h18\"></path>
                  <path d=\"M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6\"></path>
                  <path d=\"M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2\"></path>
                  <line x1=\"10\" y1=\"11\" x2=\"10\" y2=\"17\"></line>
                  <line x1=\"14\" y1=\"11\" x2=\"14\" y2=\"17\"></line>
                </svg>
            </a>
          </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
</div>
<?php echo '<h4>Página  ' .$pagina. '  de  ' .$total_paginas.'  páginas.</h4>';?>
</div> <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>

  </body>
</html>
