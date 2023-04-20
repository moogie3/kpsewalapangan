     <?
require ("connect.php");
$query="select MAX(kdkonfirmasi) from konfirmasi";
$result = mysql_query($query) or die(mysql_error());
$row =  mysql_fetch_array($result);
$kdkonfirmasi = $row['MAX(kdkonfirmasi)'];
if($kdkonfirmasi == null){
$kdkonfirmasi = 1;
}
else{
$kdkonfirmasi ++;
 }
 $kdsewa = $_POST['kdsewa'];
$tglkonfirm = $_POST['tglkonfirm'];
$atasnama = $_POST['atasnama'];
$rekening = $_POST['rekening'];
$bank = $_POST['bank'];
$keterangan = $_POST['keterangan'];

  move_uploaded_file($_FILES["file"]["tmp_name"],"slip/" . $_FILES["file"]["name"]);

	  $file1 = "slip/" . $_FILES["file"]["name"];



	  require("connect.php");
       $query1="INSERT INTO konfirmasi VALUES ('$kdkonfirmasi','$kdsewa','$tglkonfirm','$atasnama','$rekening','$bank','$keterangan','$file1')";


if(!mysql_query($query1))
{
  ?>
<script language="JavaScript">alert('Anda Gagal Konfirmasi Pembayaran'); 
document.location='konfirmasi.php'</script>
<?
}
?>
<script language="JavaScript">alert('Selamat Anda Berhasil Konfirmasi Pembayaran'); 
document.location='cetakbuktipembayaran.php?kdkonfirmasi=<? echo $kdkonfirmasi; ?>'</script>
<?      
?> 
