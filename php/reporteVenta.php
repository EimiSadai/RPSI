<?php
require_once("fpdf/fpdf.php");
require_once("venta.php");

$pdf = new FPDF();
$pdf->AddPage();
$obj = new Venta();
$resultado = $obj->consulta();

$pdf->SetFont('Arial','B',7);
    $pdf->Cell(20,10,"Fecha",1,0, 'C');
	$pdf->Cell(20,10,"Total",1,0, 'C');
	$pdf->Cell(20,10,"Tipo de pago",1,0, 'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','',8);

while($fila = $resultado->fetch_assoc()){
	//nombre, ancho,text, borde, no idea, alineacion
	$pdf->Cell(20,10,$fila["fecha"],1,0, 'C');
	$pdf->Cell(20,10,$fila["total"],1,0, 'C');
	$pdf->Cell(20,10,$fila["tipo_pago"],1,0, 'C');
	$pdf->Ln();
	}

$pdf->Output();

?>