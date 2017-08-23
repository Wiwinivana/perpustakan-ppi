<?php
include ('koneksi.php');
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-pdf");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=rekapbuku.pdf");
 
// Tambahkan table
include 'template_pdf.php';
?>