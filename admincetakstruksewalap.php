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
<table width="800" border="0" align="center">
  <tr>
    <td width="100"><img src="images/logo.jpg" width="100px" height="100px"/></td>
    <td width="700"><div align="center" class="style2">
      <div align="left" class="style3">
      Bukti Pembayaran Suria Harapan School</div>
    </div>      
      <div align="left">
   Alamat : Jl. Hayam Wuruk No.171, RT.10, Talang Jauh, Kec. Jelutung, Kota Jambi, Jambi 36133
      <br/>
      Tanggal Cetak : <? echo date('Y-m-d'); ?>

</div></td>
  </tr>
</table>
<hr/>
 <?php
		require ("connect.php");
		$kdbayar = $_GET['kdbayar'];
		$query8="select * from bayar where kdbayar = '$kdbayar'";
		$result8 = mysql_query($query8) or die(mysql_error());
		$row8 =  mysql_fetch_array($result8);
		$kdsewa = $row8['kdsewa'];
		$keterangan = $row8['keterangan'];
		$tglbayar = $row8['tglbayar'];
		$tgllunas = $row8['tgllunas'];
		$diskon = $row8['diskon'];
		$dp = $row8['dp'];
		$sisa = $row8['sisa'];
		
		$query="select * from sewa where kdsewa = '$kdsewa'";
		$result = mysql_query($query) or die(mysql_error());
		$row =  mysql_fetch_array($result);
		$kdlapangan = $row['kdlapangan'];
		$kdpenyewa=$row['kdpenyewa'];
		$harisewa=$row['harisewa'];
		$jamsewa=$row['jamsewa'];
		$lamasewa=$row['lamasewa'];
		$tglsewa=$row['tglsewa'];
		$tarifsewa=$row['tarifsewa'];
		$statussewa=$row['status'];
		$jamakhir=$jamsewa+$lamasewa;
		
		$query3="select * from lapangan where kdlapangan = '$kdlapangan'";
		$result3 = mysql_query($query3) or die(mysql_error());
		$row3 =  mysql_fetch_array($result3);
		$nolapangan = $row3['nolapangan'];
		
		
		
		$query5="select * from penyewa where kdpenyewa = '$kdpenyewa'";
		$result5 = mysql_query($query5) or die(mysql_error());
		$row5 =  mysql_fetch_array($result5);
		$nama = $row5['nama'];
		$telp = $row5['telp'];
		$status = $row5['status'];
		

		
		?>
<table width="800" border="1" cellpadding="4" cellspacing="0">
  <tr>
    <td width="241" bgcolor="#FFFF99">Kode Sewa</td>
    <td width="537" bgcolor="#FFFF99"><label>
      : <? echo $kdsewa; ?>
    </label></td>
  </tr>
  <tr>
    <td width="241" bgcolor="#FFFF99">No. Lapangan</td>
    <td width="537" bgcolor="#FFFF99"><label>
        : <? echo $nolapangan; ?> (<?php echo 'Rp. '.number_format($tarifsewa,2,",","."); ?> / Jam)
    </label></td>
  </tr>
    <tr>
    <td width="241" bgcolor="#FFFF99">Penyewa</td>
    <td width="537" bgcolor="#FFFF99"><label>
      : <? echo $nama; ?> (<? echo $status; ?>) - <? echo $telp; ?>
    </label></td>
  </tr>
  <tr>
    <td width="241" bgcolor="#FFFF99">Hari</td>
    <td width="537" bgcolor="#FFFF99"><label>
   : <? echo $harisewa; ?>
    </label></td>
  </tr>
  
    <tr>
    <td width="241" bgcolor="#FFFF99">Jam</td>
    <td width="537" bgcolor="#FFFF99"><label>
      : <? echo $jamsewa; ?> : 00 - <? echo $jamakhir; ?> : 00 
    </label></td>
  </tr>
    <tr>
    <td width="241" bgcolor="#FFFF99">Tanggal Sewa</td>
    <td width="537" bgcolor="#FFFF99"><label>
   : <? echo $tglsewa; ?>
    </label></td>
  </tr>
   <tr>
    <td width="241" bgcolor="#FFFF99">Status</td>
    <td width="537" bgcolor="#FFFF99"><label>
   : <? echo $statussewa; ?>
    </label></td>
  </tr>
 <tr>
    <td width="241" bgcolor="#FFFF99">Kode Bayar</td>
    <td width="537" bgcolor="#FFFF99"><label>
   : <? echo $kdbayar; ?>
    </label></td>
  </tr>
   <tr>
    <td width="241" bgcolor="#FFFF99">Total Sewa </td>
    <td width="537" bgcolor="#FFFF99"><label>
   : <?php 
   $totalsewa = $lamasewa*$tarifsewa;
   echo 'Rp. '.number_format($totalsewa,2,",","."); ?>
    </label></td>
  </tr>
      <tr>
    <td width="241" bgcolor="#FFFF99">Tanggal Bayar</td>
    <td width="537" bgcolor="#FFFF99"><label>
     : <? echo $tglbayar ?>
    </label></td>
  </tr>
  <tr>
    <td width="241" bgcolor="#FFFF99">Tanggal Lunas</td>
    <td width="537" bgcolor="#FFFF99"><label>
     : <? echo $tgllunas ?>
    </label></td>
  </tr>
  <tr>
    <td width="241" bgcolor="#FFFF99">Keterangan</td>
    <td width="537" bgcolor="#FFFF99"><label>
     : <? echo $keterangan ?>
    </label></td>
  </tr>
      <tr>
    <td width="241" bgcolor="#FFFF99">Diskon</td>
    <td width="537" bgcolor="#FFFF99"><label>
     : <?php 
   echo 'Rp. '.number_format($diskon,2,",","."); ?>
    </label></td>
  </tr>
   <tr>
    <td width="241" bgcolor="#FFFF99">DP (Uang Muka)</td>
    <td width="537" bgcolor="#FFFF99"><label>
    : <?php 
   echo 'Rp. '.number_format($dp,2,",","."); ?>
    </label></td>
  </tr>
   <tr>
    <td width="241" bgcolor="#FFFF99">Sisa Yang Harus Dibayar</td>
    <td width="537" bgcolor="#FFFF99"><label>
   : <?php 
   echo 'Rp. '.number_format($sisa,2,",","."); ?>
    </label></td>
  </tr>


</table>
<br />
   
      <input name="" type="button" value="Cetak" onClick="window.print()" />
<br />
<a href="admintabelsewa.php">Kembali Ke Tampilan Utama</a>
</div>
</body>

</html>
