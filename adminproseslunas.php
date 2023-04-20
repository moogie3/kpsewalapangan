<?php
$kdbayar = $_GET['kdbayar'];
$tgllunas = date('Y-m-d');
$kdjadwal = $_GET['kdjadwal'];

	  require("connect.php");
       $query1="update bayar set  tgllunas='$tgllunas'  , sisa='0' where kdbayar ='$kdbayar' ";


if(!mysql_query($query1))
{
  ?>
<script language="JavaScript">alert('Anda gagal Proses Lunas'); 
document.location='admintabelbayar.php'</script>
<?
}
?>
<script language="JavaScript">alert('Selamat Anda Berhasil Proses Lunas'); 
document.location='admintabelbayar.php?kdjadwal=<? echo $kdjadwal; ?>'</script>
<?      
?> 