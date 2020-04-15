<?php
require_once("fpdf/fpdf.php");
require_once("mantenimiento.php");

$pdf = new FPDF();
$pdf->AddPage();
$obj = new Mantenimiento();
$resultado = $obj->consulta();

$pdf->SetFont('Arial','B',6);
    $pdf->Cell(20,10,"Fecha mantenimiento",1,0, 'C');
	$pdf->Cell(20,10,"Area",1,0, 'C');
	$pdf->Cell(20,10,"Costo Mantenimiento",1,0, 'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','',7);

while($fila = $resultado->fetch_assoc()){
	//nombre, ancho,text, borde, no idea, alineacion
	$pdf->Cell(20,10,$fila["fecha_man"],1,0, 'C');
	$pdf->Cell(20,10,$fila["area"],1,0, 'C');
	$pdf->Cell(20,10,$fila["costo_man"],1,0, 'C');
	$pdf->Ln();
	}

$pdf->Output();

?>