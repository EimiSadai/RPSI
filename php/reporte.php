<?php
require_once("fpdf/fpdf.php");
require_once("producto.php");

$pdf = new FPDF();
$pdf->AddPage();
$obj = new Producto();
$resultado = $obj->consulta();

$pdf->SetFont('Arial','B',7);
    $pdf->Cell(20,10,"Nombre",1,0, 'C');
	$pdf->Cell(20,10,"Descripcion",1,0, 'C');
	$pdf->Cell(20,10,"Precio Venta",1,0, 'C');
	$pdf->Cell(20,10,"Precio Compra",1,0, 'C');
	$pdf->Cell(20,10,"Cantidad",1,0, 'C');
	$pdf->Cell(20,10, utf8_decode("Stock Minimo"),1,0, 'C');
	$pdf->Cell(20,10,utf8_decode("Stock Maximo"),1,0, 'C');
	$pdf->Cell(20,10,utf8_decode("Categoria"),1,0, 'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','',8);

while($fila = $resultado->fetch_assoc()){
	//nombre, ancho,text, borde, no idea, alineacion
	$pdf->Cell(20,10,$fila["nombre"],1,0, 'C');
	$pdf->Cell(20,10,$fila["descripcion"],1,0, 'C');
	$pdf->Cell(20,10,$fila["preciov"],1,0, 'C');
	$pdf->Cell(20,10,$fila["precioc"],1,0, 'C');
	$pdf->Cell(20,10,$fila["cantidad"],1,0, 'C');
	$pdf->Cell(20,10,$fila["cantmin"],1,0, 'C');
	$pdf->Cell(20,10,$fila["cantmax"],1,0, 'C');
	$pdf->Cell(20,10,$fila["categoria"],1,0, 'C');
	$pdf->Ln();
	}

$pdf->Output();

?>