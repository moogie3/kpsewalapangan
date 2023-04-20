<?
session_start();
//periksa apakah user telah login atau memiliki session
if(!isset($_SESSION['kdadmin'])) {
?><script language='javascript'>alert('Anda belum login. Silahkan login dulu');
document.location='adminlogin.php'</script><?
} else {
?>
<? 
	unset($_SESSION["nama"]);
unset($_SESSION["kdadmin"]);
	?>
	<script language='javascript'>alert('Anda Telah Berhasil Melakukan Logout, Terima Kasih');
      document.location='adminlogin.php'</script>
<? } ?>