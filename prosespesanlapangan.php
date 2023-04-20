<?php
require ("connect.php");
$kdpenyewa = $_POST['kdpenyewa'];
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];
$kdsewa = $_POST['kdsewa'];
$kdlapangan = $_POST['kdlapangan'];

$tglsewa = $_POST['tglsewa'];
$jam = $_POST['jam'];
$mydate=date("D",strtotime( $tglsewa));;

if($mydate == "Mon"){
$hari = "Senin";
}
else if($mydate == "Tue"){
$hari = "Selasa";
}
else if($mydate == "Wed"){
$hari = "Rabu";
}
else if($mydate == "Thu"){
$hari = "Kamis";
}
else if($mydate == "Fri"){
$hari = "Jumat";
}
else if($mydate == "Sat"){
$hari = "Sabtu";
}
else{
$hari = "Minggu";
}

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

$lama = $_POST['lama'];
$cek = 0;
$ceksewa = 0;

$query="select * from jadwal where harijadwal = '$hari' and kdlapangan = '$kdlapangan' ";
$result=mysql_query($query) or die ("Kesalahan pada perintah SQL!!!!!!");
	  while ($row = mysql_fetch_array($result)) {
	  $cekjamawal = $row['jamjadwal'];
	  $cekjamakhir = $row['jamjadwal']+$row['lamajadwal'];
	  if($jam >= $cekjamawal && $jam < $cekjamakhir){
	  $cek = 1; break;
	  }
	  }

$query7="select * from sewa where tglsewa = '$tglsewa'  and kdlapangan = '$kdlapangan' ";
$result7=mysql_query($query7) or die ("Kesalahan pada perintah SQL!!!!!!");
	  while ($row7 = mysql_fetch_array($result7)) {
	  $cekjamawalsewa = $row7['jamsewa'];
	  $cekjamakhirsewa = $row7['jamsewa']+$row7['lamasewa'];
	  if($jam >= $cekjamawalsewa && $jam < $cekjamakhirsewa){
	  $ceksewa = 1; break;
	  }
	  }


if($cek == 1){
  ?>
<script language="JavaScript">alert('Maaf Sewa Lapangan Yang Anda Pilih Telah Terisi'); 
document.location='pesanlapangan.php?kdlapangan=<? echo $kdlapangan; ?>'</script>
<?
}
else if($ceksewa == 1){
  ?>
<script language="JavaScript">alert('Maaf Sewa Lapangan Yang Anda Pilih Telah Terisi'); 
document.location='pesanlapangan.php?kdlapangan=<? echo $kdlapangan; ?>'</script>
<?
}
else{

 $query1="INSERT INTO sewa VALUES ('$kdsewa','$kdlapangan','$kdpenyewa','$tglsewa','$hari','$jam','$lama','$tarif','Di Website')";
 $query2="INSERT INTO penyewa VALUES ('$kdpenyewa','$nama','$telp','$alamat','Biasa')";
mysql_query($query2);
if(!mysql_query($query1))
{
  ?>
<script language="JavaScript">alert('Anda Gagal Input Sewa Lapangan'); 
document.location='lapangan.php'</script>
<?
}
?>
<script language="JavaScript">alert('Selamat Anda Berhasil Input Sewa Lapangan'); 
document.location='cetakstrukpesan.php?kdsewa=<? echo $kdsewa; ?>'</script>
<?   
} 
?>