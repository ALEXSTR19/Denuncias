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
function Footer(){
        $this->SetFont('Arial','B',11);
		$this->SetXY(88,240);
		$this->Cell(40,5,'A T E N T A M E N T E',0,0,'C');
		$this->SetXY(78,258);
		$contralor=iconv('UTF-8', 'ISO-8859-1','Lic. Vanessa Yazmín Gómez Y Gómez');
		$this->Cell(60,5,$contralor,'T',0,'C');
		$this->SetXY(78,262);
		$this->Cell(60,5,'Contralora del H. Ayuntamiento de Tuxpan',0,0,'C');
		$this->SetXY(18,246);
		//$this->Cell(25,4,utf8_decode($GLOBALS['copiauno']),0,0,'L');
	    }
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
$pdf->SetXY(50,80);
$pdf->Cell(10,5,'Denuncia:',0,0,'R');
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(59, 80);
$denuncia =iconv('UTF-8', 'ISO-8859-1',$GLOBALS['denuncia']);
$pdf->MultiCell(135,5,$denuncia, 0, 'J');

$pdf->SetFont('Arial','B', 12);
$pdf->SetXY(50,170);
$pdf->Cell(10,5,'Fecha de Registro:',0,0,'R');
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(60,170);
$pdf->Cell(100,5,$GLOBALS['fechor'],0,0,'L');


$pdf->Output(); //Salida al navegador
 
?>
