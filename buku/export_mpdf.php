
<?php

require_once("koneksi.php");

/*
function getjenis($id) {
    include('koneksi.php');
$query = $db->prepare("SELECT * FROM jenis WHERE id =$id");
$query->execute();
$data = $query->fetch();

return $data['nama'];
}

$html = '
<h3 style="text-align:center; ">Laporan Data Buku Perpustakaan</h3>
<h4 style="margin-top: 10pt; text-align:center; margin-collapse:collapse;"></h4>

<table border="1" style="width:100%" class="bpmTopicC">
 <!-- Ini Header Tabelnya -->
 <thead>
 <tr style="text-align:left" class="headerrow">
 <th>No</th>
 <th>Nama Buku</th>
 <th>Jenis Buku</th>
 <th>Cover</th>
 </tr>
 </thead>
 <!-- Ini Body Tabelnya -->
 <tbody>';
 // Tampilkan Data Dari Tabel Siswa
 $no=1;
 $query = $db->prepare("SELECT * FROM buku");
 $query->execute();
 foreach ($query->fetchAll() as $data) {

  $html .= '<tr class="'; if (($no % 2) == 0){ $html.="evenrow"; } else { $html.="oddrow"; } $html.='">';
  $html .= '<th>'.$data['no'].'</th>';
  $html .= '<th>'.$data['nama'].'</th>';
  $html .= '<th>'.getjenis ($data['id_jenis']).'</th>';
  $html .= '<th><img width="100px" src="cover/'.$data['cover'].'"> </th>';
  $html .= '</tr>';

 $no++;
 }
$html .= '</tbody></table>';
*/
$html = "test";

include("mpdf60/mpdf.php");
$mpdf = new mPDF('c','A3','','',32,25,27,25,16,13); 
$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0; 
$stylesheet = file_get_contents('mpdf/mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html,2);
$mpdf->Output('laporan-dengan-mpdf.pdf','I');
//exit;



?>