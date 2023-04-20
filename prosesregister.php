<?php
$kdpenyewa = $_POST['kdpenyewa'];
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];



	  require("connect.php");
       $query1="INSERT INTO penyewa VALUES ('$kdpenyewa','$nama','$telp','$alamat','Member')";


if(!mysql_query($query1))
{
  ?>
<script language="JavaScript">alert('Anda Gagal Melakukan Pendaftaran Member'); 
document.location='register.php'</script>
<?
}
?>
<script language="JavaScript">alert('Selamat Anda Berhasil Melakukan Pendaftaran Member'); 
document.location='cetakkartumember.php?kdpenyewa=<? echo $kdpenyewa; ?>'</script>
<?      
?> 