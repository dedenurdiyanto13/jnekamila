<?php

include '../components/connect.php';
// include 'placed_orders.php';
include 'fpdf/fpdf.php';


session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

// membuat objek baru bernama pdf dari class fpdf
$pdf = new FPDF('l', 'mm', 'A4');

// membuat halaman baru
$pdf->AddPage();

// judul
$pdf->SetFont('Arial', 'B', 30);
$pdf->Cell(270, 15, 'Toko JNE Kamila', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(270, 25, 'Laporan Penjualan', 0, 1, 'C');

// judul tabel 
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(15, 10, 'No', 1, 0, 'C');
$pdf->Cell(30, 10, 'Placed On', 1, 0, 'C');
$pdf->Cell(40, 10, 'Products', 1, 0, 'C');
$pdf->Cell(70, 10, 'Users', 1, 0, 'C');
$pdf->Cell(40, 10, 'Metode', 1, 0, 'C');
$pdf->Cell(40, 10, 'Status', 1, 0, 'C');
$pdf->Cell(40, 10, 'Total', 1, 0, 'C');

$pdf->Output();

?>
