<?php
require ("connect.php");
$kdsewa = $_GET['kdsewa'];
$query="select * from bayar where kdsewa = '$kdsewa'";
		$result = mysql_query($query) or die(mysql_error());
		$row =  mysql_fetch_array($result);
		$kdbayar = $row['kdbayar'];

$tgllunas = date('Y-m-d');

	  require("connect.php");
       $query1="update bayar set  tgllunas='$tgllunas'  , sisa='0' where kdbayar ='$kdbayar' ";


if(!mysql_query($query1))
{
  ?>
<script language="JavaScript">alert('Anda gagal Proses Lunas'); 
document.location='admintabelsewa.php'</script>
<?
}
?>
<script language="JavaScript">alert('Selamat Anda Berhasil Proses Lunas'); 
document.location='admintabelsewa.php'</script>
<?      
?> 