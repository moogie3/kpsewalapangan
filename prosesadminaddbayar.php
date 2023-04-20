<?php

	  require("connect.php");
   
$kdbayar = $_POST['kdbayar'];
$kdjadwal = $_POST['kdjadwal'];
$tglbayar = $_POST['tglbayar'];
$keterangan = $_POST['keterangan'];
$diskon = $_POST['diskon'];
$dp = $_POST['dp'];
$totalsewa = $_POST['totalsewa'];
$sisa = $totalsewa - $diskon - $dp;


 $query1="INSERT INTO bayar VALUES ('$kdbayar','$kdjadwal','0','$tglbayar','xxxx','$keterangan','$diskon','$dp','$totalsewa','$sisa')";


if(!mysql_query($query1))
{
  ?>
<script language="JavaScript">alert('Anda Gagal Input Pembayaran'); 
document.location='adminaddbayar.php'</script>
<?
}
?>
<script language="JavaScript">alert('Selamat Anda Berhasil Input Pembayaran'); 
document.location='admincetakstrukjadwal.php?kdbayar=<? echo $kdbayar; ?>'</script>
<?   
?> 