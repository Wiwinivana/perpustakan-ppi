<?php
include('koneksi.php');
header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
/*header("Expires: Sat, 26 Jul 2010 05:00:00 GMT");*/
header("content-disposition: attachment;filename=databuku.doc");
?>

<center><h2>Rekap Buku Perpustakaan</h2></center>
<table border='1'>
<h3>
<thead><tr>
<td width=52>No.</td>
<td width=200>Nama Buku</td>
<td width=150>Jenis Buku</td>
<td width=180>Cover</td>
</tr></thead>
<h3><tbody>

<?php
$n=0;
$d = mysql_query("select * from buku");
while($buku=mysql_fetch_array($d)){
?>
    <tr>
    <td><?php echo $n=$n+1;?></td>
    <td align="center"><?php echo $buku['nama']; ?></td>
    <td align="center"><?php echo $buku['id_jenis']; ?></td>
    <td align="center"><?php echo $buku['cover']; ?></td>
    </tr>
       
<?php
}

?>
</tbody></h3></table>