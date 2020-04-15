<?php
require_once("fpdf/fpdf.php");
require_once("pedido.php");

$pdf = new FPDF();
$pdf->AddPage();
$obj = new Pedido();
$resultado = $obj->consulta();

$pdf->SetFont('Arial','B',7);
    $pdf->Cell(20,10,"Fecha",1,0, 'C');
	$pdf->Cell(20,10,"Precio",1,0, 'C');
	$pdf->Cell(20,10,"Cantidad",1,0, 'C');
	$pdf->Cell(20,10,"Direccion",1,0, 'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','',8);

while($fila = $resultado->fetch_assoc()){
	//nombre, ancho,text, borde, no idea, alineacion
	$pdf->Cell(20,10,$fila["fecha"],1,0, 'C');
	$pdf->Cell(20,10,$fila["precio"],1,0, 'C');
	$pdf->Cell(20,10,$fila["cantidad"],1,0, 'C');
	$pdf->Cell(20,10,$fila["direccion"],1,0, 'C');
	$pdf->Ln();
	}

$pdf->Output();

?>