<?php
$kdpenyewa = $_POST['kdpenyewa'];
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$status = $_POST['status'];
$alamat = $_POST['alamat'];



	  require("connect.php");
       $query1="INSERT INTO penyewa VALUES ('$kdpenyewa','$nama','$telp','$alamat','$status')";


if(!mysql_query($query1))
{
  ?>
<script language="JavaScript">alert('Anda Gagal Input Penyewa'); 
document.location='adminaddpenyewa.php'</script>
<?
}
?>
<script language="JavaScript">alert('Selamat Anda Berhasil Input Penyewa'); 
document.location='adminaddpenyewa.php'</script>
<?      
?> 