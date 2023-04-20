<?php
$kdadmin = $_POST['kdadmin'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$email = $_POST['email'];

	  require("connect.php");
       $query1="update admin set  telp='$telp'  , alamat='$alamat' , email='$email' where kdadmin ='$kdadmin' ";


if(!mysql_query($query1))
{
  ?>
<script language="JavaScript">alert('Anda gagal Update Admin'); 
document.location='admintabeladmin.php'</script>
<?
}
?>
<script language="JavaScript">alert('Selamat Anda Berhasil Mengubah Data'); 
document.location='admintabeladmin.php'</script>
<?      
?> 