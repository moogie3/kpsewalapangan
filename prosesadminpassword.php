<?php

require("connect.php");
$kdadmin = $_POST['kdadmin'];
$oldpass = $_POST['oldpass'];
$newpass = $_POST['newpass'];
$confirm = $_POST['confirm1'];

$sql = mysql_query("SELECT * FROM admin WHERE kdadmin like '$kdadmin' ");


$tabel =mysql_fetch_array($sql);
$pass = $tabel['pass'];

if($oldpass != $pass)
{
	  ?>
<script language="JavaScript">alert('Password Lama Anda Tidak Sesuai'); 
document.location='adminpassword.php'</script>
<?
}
else if($newpass != $confirm)
{
	  ?>
<script language="JavaScript">alert('Password Lama Anda Tidak Sama Dengan Konfirmasi Password Baru'); 
document.location='adminpassword.php'</script>
<?
}

else{

$sql1= "update admin set pass = '$newpass' where kdadmin ='$kdadmin'";

if(!mysql_query($sql1))
{
  ?>
<script language="JavaScript">alert('Anda gagal Ganti Password'); 
document.location='adminpassword.php'</script>
<?
}
?>
<script language="JavaScript">alert('Password Berhasil Diganti, Terima Kasih'); 
document.location='adminpassword.php'</script>
<?      


}

?>