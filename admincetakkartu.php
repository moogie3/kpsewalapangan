<?
session_start();
if(!isset($_SESSION['nama']) ) {
?>
<script language='javascript'>alert('Anda belum login. Silahkan login dulu');
document.location='login.php'</script>
<?
} 
 else{
 $nama = $_SESSION['nama']; 
 $kdadmin = $_SESSION['kdadmin']; 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Suria Harapan School</title>
<style type="text/css">
<!--
.style2 {font-size: 36px}
.style3 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<div align="center">
<table width="500" border="0" align="center">
  <tr>
    <td width="100"><img src="images/logo.jpg" width="100px" height="100px"/></td>
    <td width="700"><div align="center" class="style2">
      <div align="left" class="style3">
      Kartu Member Suria Harapan School</div>
    </div>      
      <div align="left">
    Alamat : Jl. Hayam Wuruk No.171, RT.10, Talang Jauh, Kec. Jelutung, Kota Jambi, Jambi 36133
      <br/>
      Tanggal Cetak : <? echo date('d-m-Y'); ?>

</div></td>
  </tr>
</table>

<br/>
   <?php
		require ("connect.php");
		$kdpenyewa = $_GET['kdpenyewa'];
		$query="select * from penyewa where kdpenyewa = '$kdpenyewa'";
		$result = mysql_query($query) or die(mysql_error());
		$row =  mysql_fetch_array($result);
		$nama = $row['nama'];
		$telp=$row['telp'];
		$status=$row['status'];
		$alamat=$row['alamat'];
		?>
  <table width="500" border="1" cellpadding="5" cellspacing="0">
<tr>
      <td width="100" bgcolor="#FFFF99">Kode Member </td>
      <td width="218" bgcolor="#FFFF99"><label>
        : <? echo $kdpenyewa; ?>
      </label></td>
    </tr>
    <tr>
      <td width="100" bgcolor="#FFFF99">Nama </td>
      <td width="218" bgcolor="#FFFF99"><label>
        : <? echo $nama; ?>
      </label></td>
    </tr>
    <tr>
      <td width="100" bgcolor="#FFFF99">Telepon</td>
      <td width="218" bgcolor="#FFFF99"><label>
        : <? echo $telp; ?>
      </label></td>
    </tr>
     <tr>
      <td width="100" bgcolor="#FFFF99">Alamat</td>
      <td width="218" bgcolor="#FFFF99"><label>
        : <? echo $alamat; ?>
      </label></td>
    </tr>
    <tr>
      <td width="100" bgcolor="#FFFF99">Status</td>
      <td width="218" bgcolor="#FFFF99"><label>
        : <? echo $status; ?>
      </label></td>
    </tr>
   
    </table>
  <br />
    
      <input name="" type="button" value="Cetak" onClick="window.print()" />
<br />
<br />
<a href="admintabelpenyewa.php">Kembali Ke Tampilan Utama</a>
</div>
</body>

</html>
