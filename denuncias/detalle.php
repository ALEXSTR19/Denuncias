<?php
$GLOBALS['folio']=$_GET['var'];
date_default_timezone_set('America/Mexico_City');
setlocale(LC_ALL,"es_ES");
include_once("fpdf.php");
include_once("conexion.php"); 

       $queja = "SELECT * FROM denuncias WHERE folio = '$GLOBALS[folio]'";
	   $res = mysqli_query($conecta,$queja);
	   while ($exp=mysqli_fetch_array($res)) {
		  $GLOBALS['clave']=$exp['folio']; 
		  $GLOBALS['telefono']=$exp['movil'];
		  $GLOBALS['denunciante']=$exp['nombre'];
		  $GLOBALS['mail']=$exp['correo'];
		  $GLOBALS['denuncia']=$exp['mensaje'];
		  $GLOBALS['fechor']=$exp['fechahor'];
	   }

	    mysqli_close($conecta);
class PDF_MC_Table extends FPDF
{
 function Header(){
     
         
       $this->SetXY(10, 25);
        $this->SetFont('Arial', 'B', 17);
        $this->Image('images/logo.png', 13, 8, 30, 23);
        $this->Image('images/escudo01.png', $this->GetPageWidth() - 43, 8, 30);
		$this->SetXY(82,15);
		$this->Cell(40,5,'Contraloria Municipal de Tuxpan, Ver',0,0,'C');
		
		$this->SetFont('Arial','B',14);
		$this->SetXY(145,37);
		$this->Cell(16,5,'Folio:',0,0,'R');
		$this->SetXY(160,37);
		$this->Cell(30,5,$GLOBALS['clave'],0,0,'L');
		$this->SetFont('Arial','B',14);
		$this->SetXY(72,37);
		$this->Cell(50,5,'Sistema de Denuncias Ciudadanas',0,0,'C');
		$this->Ln(22);
	
    }	
}

$pdf = new PDF_MC_Table();
$pdf->SetMargins(15, 10, 15);
$pdf->SetAutoPageBreak(true, 20);
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B', 12);

//De aqui en adelante se colocan distintos métodos
//para diseñar el formato.
$pdf->SetFont('Arial','B', 12);
$pdf->SetXY(50,60);
$pdf->Cell(10,5,'Denunciante:',0,0,'R');
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(59,60);
$denunciante=iconv('UTF-8', 'ISO-8859-1',$GLOBALS['denunciante']);
$pdf->Cell(30,5,$denunciante,0,0,'L');
$pdf->SetFont('Arial','B', 12);
$pdf->SetXY(50,67);
$tel =iconv('UTF-8', 'ISO-8859-1','Teléfono:');
$pdf->Cell(10,5,$tel,0,0,'R');
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(59,67);
$pdf->Cell(30,5,$GLOBALS['telefono'],0,0,'L');
$pdf->SetFont('Arial','B', 12);
$pdf->SetXY(50,74);
$pdf->Cell(10,5,'Correo:',0,0,'R');
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(59,74);
$pdf->Cell(40,5,$GLOBALS['mail'],0,0,'L');
$pdf->SetFont('Arial','B', 12);
$pdf->SetXY(25,80);
$pdf->Cell(10,5,'Denuncia:',0,0,'R');
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(35, 80);
$denuncia =iconv('UTF-8', 'ISO-8859-1',$GLOBALS['denuncia']);
$pdf->MultiCell(160,5,$denuncia, 0, 'J');

$fechaY = $pdf->GetY() + 8;
$pdf->SetY($fechaY);
$pdf->SetFont('Arial','B', 12);
$pdf->SetX(25);
$pdf->Cell(35,5,'Fecha de Registro:',0,0,'R');
$pdf->SetFont('Arial','B', 10);
$pdf->SetX(60);
$pdf->Cell(100,5,$GLOBALS['fechor'],0,0,'L');


$pdf->Output(); //Salida al navegador
 
?>
