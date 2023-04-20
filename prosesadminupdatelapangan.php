<?php
$kdlapangan = $_POST['kdlapangan'];
$nolapangan = $_POST['nolapangan'];
$keterangan = $_POST['keterangan'];

	  require("connect.php");
       $query1="update lapangan set  nolapangan='$nolapangan'  , keterangan='$keterangan' where kdlapangan ='$kdlapangan' ";


if(!mysql_query($query1))
{
  ?>
<script language="JavaScript">alert('Anda gagal Update lapangan'); 
document.location='admintabellapangan.php'</script>
<?
}
?>
<script language="JavaScript">alert('Selamat Anda Berhasil Mengubah Data'); 
document.location='admintabellapangan.php'</script>
<?      
?> 