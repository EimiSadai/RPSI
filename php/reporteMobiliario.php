<?php
require_once("fpdf/fpdf.php");
require_once("mobiliario.php");

$pdf = new FPDF();
$pdf->AddPage();
$obj = new Mobiliario();
$resultado = $obj->consulta();

$pdf->SetFont('Arial','B',7);
    $pdf->Cell(20,10,"Nombre",1,0, 'C');
	$pdf->Cell(20,10,"Descripcion",1,0, 'C');
	$pdf->Cell(20,10,"Cantidad",1,0, 'C');
	$pdf->Cell(20,10,"Nic",1,0, 'C');
	$pdf->Cell(20,10,"Tipo",1,0, 'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','',8);

while($fila = $resultado->fetch_assoc()){
	//nombre, ancho,text, borde, no idea, alineacion
	$pdf->Cell(20,10,$fila["nombre"],1,0, 'C');;
	$pdf->Cell(20,10,$fila["descripcion"],1,0, 'C');
	$pdf->Cell(20,10,$fila["cantidad"],1,0, 'C');
	$pdf->Cell(20,10,$fila["nic"],1,0, 'C');
	$pdf->Cell(20,10,$fila["tipo"],1,0, 'C');
	$pdf->Ln();
	}

$pdf->Output();

?>