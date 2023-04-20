<?php

	  require("connect.php");
   
$kdjadwal = $_POST['kdjadwal'];
$kdlapangan = $_POST['kdlapangan'];
$kdpenyewa = $_POST['kdpenyewa'];
$hari = $_POST['hari'];
$jam = $_POST['jam'];
$lama = $_POST['lama'];
$cek = 0;


if($kdlapangan == '1'){
 if($hari == "Senin" || $hari == "Selasa" || $hari == "Rabu" || $hari == "Kamis" || $hari == "Jumat" ){
 $tarif = 200000;
 }
else{
 $tarif = 250000;
 }
}
if($kdlapangan == '2'){
 if($hari == "Senin" || $hari == "Selasa" || $hari == "Rabu" || $hari == "Kamis" || $hari == "Jumat" ){
 $tarif = 150000;
 }
else{
 $tarif = 200000;
 }
}




$query="select * from jadwal where harijadwal = '$hari' and kdlapangan = '$kdlapangan' ";
$result=mysql_query($query) or die ("Kesalahan pada perintah SQL!!!!!!");
	  while ($row = mysql_fetch_array($result)) {
	  $cekjamawal = $row['jamjadwal'];
	  $cekjamakhir = $row['jamjadwal']+$row['lamajadwal'];
	  if($jam >= $cekjamawal && $jam < $cekjamakhir){
	  $cek = 1; break;
	  }
	  }

if($cek == 1){
  ?>
<script language="JavaScript">alert('Maaf Jadwal Yang Anda Pilih Telah Terisi'); 
document.location='adminaddjadwal.php'</script>
<?
}
else{

 $query1="INSERT INTO jadwal VALUES ('$kdjadwal','$kdlapangan','$kdpenyewa','$hari','$jam','$lama','$tarif')";


if(!mysql_query($query1))
{
  ?>
<script language="JavaScript">alert('Anda Gagal Input Jadwal'); 
document.location='adminaddjadwal.php'</script>
<?
}
?>
<script language="JavaScript">alert('Selamat Anda Berhasil Input Jadwal'); 
document.location='adminaddbayar.php?kdjadwal=<? echo $kdjadwal; ?>'</script>
<?   
}   
?> 