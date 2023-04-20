<?php

require("connect.php");


$kdpenyewa = $_POST['kdpenyewa'];
$kdlapangan = $_POST['kdlapangan'];
$nama = $_POST['nama'];


$sql = mysql_query("SELECT * FROM penyewa WHERE nama = '$nama' && kdpenyewa ='$kdpenyewa'");
$tabel=mysql_fetch_array($sql);
$cekkdpenyewa = $tabel['kdpenyewa'];
$ceknama = $tabel['nama'];



if($cekkdpenyewa != $kdpenyewa && $ceknama != $nama)
{
?>
<script language="JavaScript">alert('Kode Memmber ata Nama Member Anda salah'); 
document.location='pesanlapanganmember.php?kdlapangan=<? echo $kdlapangan; ?>'</script>
<?
}
else{


?>
<script language="JavaScript">
document.location='pesanlapanganakhirmember.php?kdlapangan=<? echo $kdlapangan; ?>&kdpenyewa=<? echo $kdpenyewa; ?>'</script>
<?
}
?>