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
		$kdjadwal = $row8['kdjadwal'];
		$keterangan = $row8['keterangan'];
		$tglbayar = $row8['tglbayar'];
		$tgllunas = $row8['tgllunas'];
		$diskon = $row8['diskon'];
		$dp = $row8['dp'];
		$sisa = $row8['sisa'];
		
		$query="select * from jadwal where kdjadwal = '$kdjadwal'";
		$result = mysql_query($query) or die(mysql_error());
		$row =  mysql_fetch_array($result);
		$kdlapangan = $row['kdlapangan'];
		$kdpenyewa=$row['kdpenyewa'];
		$harijadwal=$row['harijadwal'];
		$jamjadwal=$row['jamjadwal'];
		$lamajadwal=$row['lamajadwal'];
		$jamakhir=$jamjadwal+$lamajadwal;
		$tarifjadwal=$row['tarifjadwal'];
		
		$query3="select * from lapangan where kdlapangan = '$kdlapangan'";
		$result3 = mysql_query($query3) or die(mysql_error());
		$row3 =  mysql_fetch_array($result3);
		$nolapangan = $row3['nolapangan'];
		$tarif = $row3['tarif'];
		
		
		$query5="select * from penyewa where kdpenyewa = '$kdpenyewa'";
		$result5 = mysql_query($query5) or die(mysql_error());
		$row5 =  mysql_fetch_array($result5);
		$nama = $row5['nama'];
		$telp = $row5['telp'];
		$status = $row5['status'];
		

		
		?>
<table width="800" border="1" cellpadding="4" cellspacing="0">
  <tr>
    <td width="255" bgcolor="#FFFF99">Kode Jadwal</td>
    <td width="523" bgcolor="#FFFF99"><label>
      : <? echo $kdjadwal; ?>
    </label></td>
  </tr>
  <tr>
    <td width="255" bgcolor="#FFFF99">No. Lapangan</td>
    <td width="523" bgcolor="#FFFF99"><label>
        : <? echo $nolapangan; ?> (<?php echo 'Rp. '.number_format($tarifjadwal,2,",","."); ?> / Jam)
    </label></td>
  </tr>
    <tr>
    <td width="255" bgcolor="#FFFF99">Penyewa</td>
    <td width="523" bgcolor="#FFFF99"><label>
      : <? echo $nama; ?> (<? echo $status; ?>) - <? echo $telp; ?>
    </label></td>
  </tr>
  <tr>
    <td width="255" bgcolor="#FFFF99">Hari</td>
    <td width="523" bgcolor="#FFFF99"><label>
   : <? echo $harijadwal; ?>
    </label></td>
  </tr>
  
    <tr>
    <td width="255" bgcolor="#FFFF99">Jam</td>
    <td width="523" bgcolor="#FFFF99"><label>
      : <? echo $jamjadwal; ?> : 00 - <? echo $jamakhir; ?> : 00 
    </label></td>
  </tr>
 <tr>
    <td width="255" bgcolor="#FFFF99">Kode Bayar</td>
    <td width="523" bgcolor="#FFFF99"><label>
   : <? echo $kdbayar; ?>
    </label></td>
  </tr>
   <tr>
    <td width="255" bgcolor="#FFFF99">Total Sewa (x4)</td>
    <td width="523" bgcolor="#FFFF99"><label>
   : <?php 
   $totalsewa = $lamajadwal*$tarifjadwal*4;
   echo 'Rp. '.number_format($totalsewa,2,",","."); ?>
    </label></td>
  </tr>
      <tr>
    <td width="255" bgcolor="#FFFF99">Tanggal Bayar</td>
    <td width="523" bgcolor="#FFFF99"><label>
     : <? echo $tglbayar ?>
    </label></td>
  </tr>
  <tr>
    <td width="255" bgcolor="#FFFF99">Tanggal Lunas</td>
    <td width="523" bgcolor="#FFFF99"><label>
     : <? echo $tgllunas ?>
    </label></td>
  </tr>
  <tr>
    <td width="255" bgcolor="#FFFF99">Keterangan</td>
    <td width="523" bgcolor="#FFFF99"><label>
     : <? echo $keterangan ?>
    </label></td>
  </tr>
      <tr>
    <td width="255" bgcolor="#FFFF99">Diskon</td>
    <td width="523" bgcolor="#FFFF99"><label>
     : <?php
	 
	  
   echo 'Rp. '.number_format($diskon,2,",",".");
  
    ?>
    
    </label></td>
  </tr>
   <tr>
    <td width="255" bgcolor="#FFFF99">DP (Uang Muka)</td>
    <td width="523" bgcolor="#FFFF99"><label>
    : <?php 
	if($tgllunas == "0000-00-00")
	 {
   echo 'Rp. '.number_format($dp,2,",",".");
    }
    else{
    echo 'Rp. 0,00';
    }
    ?>
    </label></td>
  </tr>
   <tr>
    <td width="255" bgcolor="#FFFF99">Sisa Yang Harus Dibayar</td>
    <td width="523" bgcolor="#FFFF99"><label>
   : <?php 
   echo 'Rp. '.number_format($sisa,2,",","."); ?>
    </label></td>
  </tr>


</table>
  <br />
<br />     
      <input name="" type="button" value="Cetak" onClick="window.print()" />
<br />
<br />
<a href="admintabelbayar.php?kdjadwal=<? echo $kdjadwal; ?>">Kembali Ke Tampilan Utama</a>
</div>
</body>

</html>
