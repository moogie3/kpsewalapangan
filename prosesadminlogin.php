<?php

require("connect.php");


$namaadmin = $_POST['nama'];
$passadmin = $_POST['pass'];


$sql = mysql_query("SELECT * FROM admin WHERE nama = '$namaadmin' && pass ='$passadmin'");
$tabel=mysql_fetch_array($sql);
$kdadmin = $tabel['kdadmin'];
$nama = $tabel['nama'];
$pass = $tabel['pass'];



if($nama != $namaadmin && $pass != $passadmin)
{
?>
<script language="JavaScript">alert('Username atau password Anda salah'); 
document.location='adminlogin.php'</script>
<?
}
else{

session_start();
$_SESSION['nama'] = $nama;
$_SESSION['kdadmin'] = $tabel['kdadmin'];


?>
<script language="JavaScript">alert('Anda Berhasil Melakukan Login, Terima Kasih');
document.location='adminhome.php'</script>
<?
}
?>