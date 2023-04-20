<?php
require("connect.php");
$kdadmin = $_POST['kdadmin'];
$nama = $_POST['namaadmin'];
$pass = $_POST['namaadmin'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$telp = $_POST['telp'];


$query8="select * from admin where nama like '$nama' ";

	  $result8=mysql_query($query8) or die ("Kesalahan pada perintah SQL!!!!!!");
	  while ($row8 = mysql_fetch_array($result8)) {
	  $cekadmin = $row8['kdadmin'];
	  if($cekadmin == null){
	  $cek = 0;
	   }
	   else{
	   $cek = 1;
	   }
	  }
 
 if($cek == 1){
   ?>
<script language="JavaScript">alert('Maaf Nama Admin Yang Anda Input Telah Ada, Silahkan Menginput Nama Yang Lain'); 
document.location='adminaddadmin.php'</script>
<?
 }
 else{
	  require("connect.php");
       $query1="INSERT INTO admin VALUES ('$kdadmin','$nama','$pass','$email','$alamat','$telp')";


if(!mysql_query($query1))
{
  ?>
<script language="JavaScript">alert('Anda Gagal Input Admin'); 
document.location='adminaddadmin.php'</script>
<?
}
?>
<script language="JavaScript">alert('Selamat Anda Berhasil Input Admin'); 
document.location='adminaddadmin.php'</script>
<?  
 }
?> 