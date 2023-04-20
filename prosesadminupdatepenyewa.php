<?php
$kdpenyewa = $_POST['kdpenyewa'];
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$status = $_POST['status'];
$alamat = $_POST['alamat'];

	  require("connect.php");
       $query1="update penyewa set  telp='$telp'  , nama='$nama' , status='$status' , alamat='$alamat' where kdpenyewa ='$kdpenyewa' ";


if(!mysql_query($query1))
{
  ?>
<script language="JavaScript">alert('Anda gagal Update Penyewa'); 
document.location='admintabelpenyewa.php'</script>
<?
}
?>
<script language="JavaScript">alert('Selamat Anda Berhasil Mengubah Data'); 
document.location='admintabelpenyewa.php'</script>
<?      
?> 