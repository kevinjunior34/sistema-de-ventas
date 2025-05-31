<?php
// boleta.php

require('fpdf186/fpdf.php');

// Leer JSON enviado
$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    die("No hay datos");
}

$cliente = $data['cliente'] ?? 'Cliente no especificado';
$detalles = $data['detalles'] ?? [];

// Crear PDF
$pdf = new FPDF();
$pdf->AddPage();

// Título a la izquierda y fecha a la derecha en la misma línea
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(120, 10, "Boleta de Venta", 0, 0, 'L');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, "Fecha: " . date('d/m/Y'), 0, 1, 'R');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, "Cliente: $cliente", 0, 1);

$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(80, 10, "Producto", 1);
$pdf->Cell(30, 10, "Cantidad", 1, 0, 'C');
$pdf->Cell(40, 10, "Precio Unit.", 1, 0, 'R');
$pdf->Cell(40, 10, "Subtotal", 1, 0, 'R');
$pdf->Ln();

$total = 0;
foreach ($detalles as $item) {
    $descripcion = $item['descripcion'] ?? 'Producto';
    $cantidad = $item['cantidad'];
    $precio = $item['precio'] ?? 0;
    $subtotal = $cantidad * $precio;
    $total += $subtotal;

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(80, 10, $descripcion, 1);
    $pdf->Cell(30, 10, $cantidad, 1, 0, 'C');
    $pdf->Cell(40, 10, number_format($precio, 2), 1, 0, 'R');
    $pdf->Cell(40, 10, number_format($subtotal, 2), 1, 0, 'R');
    $pdf->Ln();
}

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(150, 10, "Total", 1);
$pdf->Cell(40, 10, number_format($total, 2), 1, 0, 'R');

// Enviar PDF al navegador
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="boleta.pdf"');
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

$pdf->Output('I', 'boleta.pdf');
exit;
