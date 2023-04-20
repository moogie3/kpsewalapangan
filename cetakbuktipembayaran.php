
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
      BUKTI SEWA LAPANGAN SURIA HARAPAN SCHOOL</div>
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
		$kdkonfirmasi = $_GET['kdkonfirmasi'];
		$query="select * from konfirmasi where kdkonfirmasi = '$kdkonfirmasi'";
		$result = mysql_query($query) or die(mysql_error());
		$row =  mysql_fetch_array($result);
		$kdsewa = $row['kdsewa'];
		$tglkonfirm=$row['tglkonfirm'];
		$atasnama=$row['atasnama'];
		$rekening=$row['rekening'];
		$bank=$row['bank'];
		$keterangan=$row['keterangan'];
	$slip=$row['slip'];
	
	$query7="select * from sewa where kdsewa = '$kdsewa'";
		$result7 = mysql_query($query7) or die(mysql_error());
		$row7 =  mysql_fetch_array($result7);
		$kdpenyewa = $row7['kdpenyewa'];
		$tglsewa = $row7['tglsewa'];
		$harisewa = $row7['harisewa'];
		$jamsewa = $row7['jamsewa'];
		$lamasewa = $row7['lamasewa'];
		$jamakhir=$jamsewa+$lamasewa;
		
			$query71="select * from penyewa where kdpenyewa = '$kdpenyewa'";
		$result71 = mysql_query($query71) or die(mysql_error());
		$row71 =  mysql_fetch_array($result71);
		$status = $row71['status'];
		if($status == "Biasa"){
		?>
<table width="800" border="1" cellpadding="6" cellspacing="0">
  <tr>
    <td width="150" bgcolor="#FFFF99">Slip Pembayaran</td>
    <td width="144" bgcolor="#FFFF99"><label>
      <img src="<? echo $slip; ?>" width="300" height="400" />  
    </label></td>
  </tr>
  <tr>
    <td width="150" bgcolor="#FFFF99">Kode Sewa</td>
    <td width="144" bgcolor="#FFFF99"><label>
      : <? echo $kdsewa; ?>
    </label></td>
  </tr>
  <tr>
    <td width="223" bgcolor="#FFFF99">Hari</td>
    <td width="555" bgcolor="#FFFF99"><label>
   : <? echo $harisewa; ?>
    </label></td>
  </tr>
  
    <tr>
    <td width="223" bgcolor="#FFFF99">Jam</td>
    <td width="555" bgcolor="#FFFF99"><label>
      : <? echo $jamsewa; ?> : 00 - <? echo $jamakhir; ?> : 00 
    </label></td>
  </tr>
    <tr>
    <td width="223" bgcolor="#FFFF99">Tanggal Sewa</td>
    <td width="555" bgcolor="#FFFF99"><label>
   : <? echo $tglsewa; ?>
    </label></td>
  </tr>
  <tr>
    <td width="150" bgcolor="#FFFF99">Tanggal Konfirmasi</td>
    <td width="144" bgcolor="#FFFF99"><label>
        : <? echo $tglkonfirm; ?> 
    </label></td>
  </tr>
    <tr>
    <td width="150" bgcolor="#FFFF99">Rekening</td>
    <td width="144" bgcolor="#FFFF99"><label>
      : <? echo $rekening; ?> Atas Nama <? echo $atasnama; ?> - Bank <? echo $bank; ?>
    </label></td>
  </tr>
  <tr>
    <td width="150" bgcolor="#FFFF99">Keterangan</td>
    <td width="144" bgcolor="#FFFF99"><label>
   : <? echo $keterangan; ?>
    </label></td>
  </tr>
  </table>
<?
		}
else{
?>
<table width="800" border="1" cellpadding="6" cellspacing="0">
  <tr>
    <td width="150" bgcolor="#FFFF99">Slip Pembayaran</td>
    <td width="144" bgcolor="#FFFF99"><label>
      <img src="<? echo $slip; ?>" width="300" height="400" />  
    </label></td>
  </tr>
  <tr>
    <td width="150" bgcolor="#FFFF99">Kode Sewa</td>
    <td width="144" bgcolor="#FFFF99"><label>
      : <? echo $kdsewa; ?>
    </label></td>
  </tr>
   <tr>
    <td width="223" bgcolor="#FFFF99">Hari</td>
    <td width="555" bgcolor="#FFFF99"><label>
   : <? echo $harisewa; ?>
    </label></td>
  </tr>
  
    <tr>
    <td width="223" bgcolor="#FFFF99">Jam</td>
    <td width="555" bgcolor="#FFFF99"><label>
      : <? echo $jamsewa; ?> : 00 - <? echo $jamakhir; ?> : 00 
    </label></td>
  </tr>
    <tr>
    <td width="223" bgcolor="#FFFF99">Tanggal Sewa</td>
    <td width="555" bgcolor="#FFFF99"><label>
   : <? echo $tglsewa; ?> Sampai Dengan <?
						   $jangkawaktu = $jangkawaktu='+ 21 days';
							$date = new DateTime($tglsewa);
                            $date->modify($jangkawaktu);
							echo $date->format('Y-m-d');
							?> 
    </label></td>
  </tr>
   <tr>
    <td width="223" bgcolor="#FFFF99">Tanggal Main</td>
    <td width="555" bgcolor="#FFFF99"><label>
   <? echo $harisewa; ?>, <? echo $tglsewa; ?>
   <br/>
    <? echo $harisewa; ?>, <?
						   $jangkawaktu = $jangkawaktu='+ 7 days';
							$date = new DateTime($tglsewa);
                            $date->modify($jangkawaktu);
							echo $date->format('Y-m-d');
							?>
                            <br/>
    <? echo $harisewa; ?>, <?
						   $jangkawaktu = $jangkawaktu='+ 14 days';
							$date = new DateTime($tglsewa);
                            $date->modify($jangkawaktu);
							echo $date->format('Y-m-d');
							?>
                            <br/>
    <? echo $harisewa; ?>, <?
						   $jangkawaktu = $jangkawaktu='+ 21 days';
							$date = new DateTime($tglsewa);
                            $date->modify($jangkawaktu);
							echo $date->format('Y-m-d');
							?>
    
    </label></td>
  </tr>
  <tr>
    <td width="150" bgcolor="#FFFF99">Tanggal Konfirmasi</td>
    <td width="144" bgcolor="#FFFF99"><label>
        : <? echo $tglkonfirm; ?> 
    </label></td>
  </tr>
    <tr>
    <td width="150" bgcolor="#FFFF99">Rekening</td>
    <td width="144" bgcolor="#FFFF99"><label>
      : <? echo $rekening; ?> Atas Nama <? echo $atasnama; ?> - Bank <? echo $bank; ?>
    </label></td>
  </tr>
  <tr>
    <td width="150" bgcolor="#FFFF99">Keterangan</td>
    <td width="144" bgcolor="#FFFF99"><label>
   : <? echo $keterangan; ?>
    </label></td>
  </tr>
  </table>
<?
}
?>
<br />
   
      <input name="" type="button" value="Cetak" onClick="window.print()" />
<br />
<a href="konfirmasi.php">Kembali Ke Tampilan Utama</a>
</div>
</body>

</html>
