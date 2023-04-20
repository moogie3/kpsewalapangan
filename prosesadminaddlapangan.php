<?php
$kdlapangan = $_POST['kdlapangan'];
$nolapangan = $_POST['nolapangan'];
$keterangan = $_POST['keterangan'];
	        move_uploaded_file($_FILES["file"]["tmp_name"],"lapangan/" . $_FILES["file"]["name"]);

	  $file1 = "lapangan/" . $_FILES["file"]["name"];



	  require("connect.php");
       $query1="INSERT INTO lapangan VALUES ('$kdlapangan','$nolapangan','$keterangan','$file1')";


if(!mysql_query($query1))
{
  ?>
<script language="JavaScript">alert('Anda Gagal Input Lapangan'); 
document.location='adminaddlapangan.php'</script>
<?
}
?>
<script language="JavaScript">alert('Selamat Anda Berhasil Input Lapangan'); 
document.location='adminaddlapangan.php'</script>
<?      
?> 