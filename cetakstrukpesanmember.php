
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
		$kdsewa = $_GET['kdsewa'];
		$query="select * from sewa where kdsewa = '$kdsewa'";
		$result = mysql_query($query) or die(mysql_error());
		$row =  mysql_fetch_array($result);
		$kdlapangan = $row['kdlapangan'];
		$kdpenyewa=$row['kdpenyewa'];
		$harisewa=$row['harisewa'];
		$jamsewa=$row['jamsewa'];
		$lamasewa=$row['lamasewa'];
		$tglsewa=$row['tglsewa'];
		$statussewa=$row['status'];
		$tarifsewa=$row['tarifsewa'];
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
<table width="800" border="1" cellpadding="6" cellspacing="0">
  <tr>
    <td width="223" bgcolor="#FFFF99">Kode Sewa</td>
    <td width="555" bgcolor="#FFFF99"><label>
      : <? echo $kdsewa; ?> (Digunakan Untuk Konfirmasi Pembayaran)
    </label></td>
  </tr>
  <tr>
    <td width="223" bgcolor="#FFFF99">No. Lapangan</td>
    <td width="555" bgcolor="#FFFF99"><label>
        : <? echo $nolapangan; ?> (<?php echo 'Rp. '.number_format($tarifsewa,2,",","."); ?> / Jam)
    </label></td>
  </tr>
    <tr>
    <td width="223" bgcolor="#FFFF99">Penyewa</td>
    <td width="555" bgcolor="#FFFF99"><label>
      : <? echo $nama; ?> (<? echo $status; ?>) - <? echo $telp; ?>
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
    <td width="223" bgcolor="#FFFF99">Status</td>
    <td width="555" bgcolor="#FFFF99"><label>
   : <? echo $statussewa; ?>
    </label></td>
  </tr>
    <tr>
    <td width="223" bgcolor="#FFFF99">Diskon</td>
    <td width="555" bgcolor="#FFFF99"><label>
   : Rp. 30.000,00
    </label></td>
  </tr>
 
   <tr>
    <td width="223" bgcolor="#FFFF99">Total Sewa </td>
    <td width="555" bgcolor="#FFFF99"><label>
   : <?php 
   $totalsewa = $lamasewa*$tarifsewa*4 - 30000;
   echo 'Rp. '.number_format($totalsewa,2,",","."); ?>
    </label></td>
  </tr>
     


</table>
<br />
   
      <input name="" type="button" value="Cetak" onClick="window.print()" />
<br />
<a href="lapangan.php">Kembali Ke Tampilan Utama</a>
</div>
</body>

</html>
