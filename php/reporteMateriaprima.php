<?php
require_once("fpdf/fpdf.php");
require_once("materiaprima.php");

$pdf = new FPDF();
$pdf->AddPage();
$obj = new Materiaprima();
$resultado = $obj->consulta();

$pdf->SetFont('Arial','B',7);
    $pdf->Cell(20,10,"Nombre",1,0, 'C');
	$pdf->Cell(20,10,"Tipo",1,0, 'C');
	$pdf->Cell(20,10,"Descripcion",1,0, 'C');
	$pdf->Cell(20,10,"Precio",1,0, 'C');
	$pdf->Cell(20,10,"Stock",1,0, 'C');
	$pdf->Cell(20,10,"Existencias",1,0, 'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','',8);

while($fila = $resultado->fetch_assoc()){
	//nombre, ancho,text, borde, no idea, alineacion
	$pdf->Cell(20,10,$fila["nombre"],1,0, 'C');
	$pdf->Cell(20,10,$fila["tipo"],1,0, 'C');
	$pdf->Cell(20,10,$fila["descripcion"],1,0, 'C');
	$pdf->Cell(20,10,$fila["precio"],1,0, 'C');
	$pdf->Cell(20,10,$fila["stock"],1,0, 'C');
	$pdf->Cell(20,10,$fila["existencias"],1,0, 'C');
	$pdf->Ln();
	}

$pdf->Output();

?>