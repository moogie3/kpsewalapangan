<?php
$kdbukutamu = $_POST['kdbukutamu'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$isi = $_POST['isi'];
$tgl = date('Y-m-d');


	  require("connect.php");
       $query1="INSERT INTO bukutamu VALUES ('$kdbukutamu','$nama','$email','$isi','$tgl')";


if(!mysql_query($query1))
{
  ?>
<script language="JavaScript">alert('Anda Gagal Mengisi Buku Tamu'); 
document.location='bukutamu.php'</script>
<?
}
?>
<script language="JavaScript">alert('Selamat Anda Berhasil Mengisi Buku Tamu'); 
document.location='bukutamu.php'</script>
<?      
?> 