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
<link href="css/table.css" rel="stylesheet" type="text/css" />
<title>Suria Harapan School</title>
<style type="text/css">
<!--
.style2 {font-size: 24px}
.style3 {color: #FFFFFF}
-->
</style>
</head>

<body>
<table width="100%" border="0" align="center">
  <tr>
    <td width="100"><img src="images/logo.jpg" width="100px" height="100px"/></td>
    <td><div align="center" class="style2">
      <div align="right"><strong>Suria Harapan School</strong></div>
    </div>      
      <div align="right">
         Alamat : Jl. Hayam Wuruk No.171, RT.10, Talang Jauh, Kec. Jelutung, Kota Jambi, Jambi 36133
        <br />
        Telepon  : 0741 - 3061101, Handphone : 0811-7422-558
        <br/>
        Email : suriaharapanschool@gmail.com
    </div></td>
    
  </tr>
</table>
<hr />
 <?
	   $tglsewaawal = $_POST['tglsewaawal'];
		  $tglsewaakhir = $_POST['tglsewaakhir'];
		  $status = $_POST['status'];
	  ?>
      <h2>Laporan Data Sewa Lapangan Tanggal <? echo $tglsewaawal; ?> s/d <? echo $tglsewaakhir; ?></h2>

<table id="rounded-corner" border="1" cellpadding="5" cellspacing="0" align="center" width="1200">
    <thead>
    <tr bgcolor="#660000">
      <th><span class="style3">Tgl Sewa</span></th>
  <th><span class="style3">Tgl Lunas</span></th>
  <th><span class="style3">Kode Sewa</span></th>
    <th><span class="style3">Penyewa</span></th>
    <th><span class="style3">Lapangan</span></th>
    <th><span class="style3">Hari</span></th>
    <th><span class="style3">Jam</span></th>
    <th><span class="style3">Status</span></th>
<th><span class="style3">Keterangan</span></th>
<th><span class="style3">Total Harus Bayar</span></th>

<th><span class="style3">Diskon</span></th>            
<th><span class="style3">DP</span></th>
<th><span class="style3">Sisa</span></th>
      </tr>
    </thead>
            <?php
	  	  include("connect.php");
		 
		  $i=1;
		  $query="select * from sewa  where tglsewa between '$tglsewaawal' and '$tglsewaakhir'  ";
	  $result=mysql_query($query) or die ("Kesalahan pada perintah SQL!!!!!!");
	  while ($row = mysql_fetch_array($result)) {
		 $statussewa = $row['status'];
		   $kdsewa = $row['kdsewa'];
		 if($statussewa == "Di Tempat"){
	  $query3="select * from bayar where kdsewa = '$kdsewa'";
		$result3 = mysql_query($query3) or die(mysql_error());
		$row3 =  mysql_fetch_array($result3);
		$tgllunas = $row3['tgllunas'];
		$totalbayar = $row3['totalbayar'];
		$diskon = $row3['diskon'];
		$keterangan = $row3['keterangan'];
		$dp = $row3['dp'];
		$sisa = $row3['sisa'];
	  }
	  else{
		  $query3="select * from konfirmasi where kdsewa = '$kdsewa'";
		$result3 = mysql_query($query3) or die(mysql_error());
		$row3 =  mysql_fetch_array($result3);
		$tglkonfirmasi = $row3['tglkonfirm'];
	  }
	  if($status == 'Lunas'){
		  if($statussewa == "Di Tempat"){
		if($tgllunas == '0000-00-00')continue;
		  }
		  else{
			if($tglkonfirmasi == null)continue;  
		  }
	  }
	  else{
		  if($statussewa == "Di Tempat"){
		if($tgllunas != '0000-00-00')continue;
		  }
		  else{
			if($tglkonfirmasi != null)continue;  
		  } 
	  }
	  ?>     
    <tbody>
    	<tr bgcolor="#FFFFCC">
        	   <td ><div align="center"><?php echo $row['tglsewa'];?></div></td>
      <td ><div align="center"><?php
	  $kdsewa = $row['kdsewa'];
	  if($statussewa == "Di Tempat"){
	  $query3="select * from bayar where kdsewa = '$kdsewa'";
		$result3 = mysql_query($query3) or die(mysql_error());
		$row3 =  mysql_fetch_array($result3);
		$tgllunas = $row3['tgllunas'];
		$totalbayar = $row3['totalbayar'];
		$diskon = $row3['diskon'];
		$keterangan = $row3['keterangan'];
		$dp = $row3['dp'];
		$sisa = $row3['sisa'];
		echo $tgllunas;
	  }
	  else{
		  $query3="select * from konfirmasi where kdsewa = '$kdsewa'";
		$result3 = mysql_query($query3) or die(mysql_error());
		$row3 =  mysql_fetch_array($result3);
		$tglkonfirmasi = $row3['tglkonfirm'];
		echo $tglkonfirmasi; 
	  }
	
	  ?></div></td>
     <td ><div align="center"><?php echo $row['kdsewa'];?></div></td>
    <td ><div align="center">
    <?php $kdpenyewa = $row['kdpenyewa'];
	
	$query63="select * from penyewa where kdpenyewa = '$kdpenyewa'";
		$result63 = mysql_query($query63) or die(mysql_error());
		$row63 =  mysql_fetch_array($result63);
		echo $row63['nama'];
		$statuspenyewa = $row63['status'];
		
	?>
    (<? echo $statuspenyewa; ?>)
    </div></td>
    <td ><div align="center"><?php $kdlapangan = $row['kdlapangan'];
	
	$query3="select * from lapangan where kdlapangan = '$kdlapangan'";
		$result3 = mysql_query($query3) or die(mysql_error());
		$row3 =  mysql_fetch_array($result3);
		echo $row3['nolapangan'];
		
	?></div></td>
    <td ><div align="center"><?php echo $row['harisewa'];?></div></td>
    <td ><div align="center"><?php echo $row['jamsewa'];?> : 00 - <?php $jamakhir = $row['jamsewa'] + $row['lamasewa'];
	echo $jamakhir ?> : 00</div></td>
      <td ><div align="center"><?php echo $row['status'];?></div></td>
      <?
	  if($row['status'] == "Di Tempat"){
	  ?>
    <td align="center"><?php echo $keterangan;?></td>
    <td ><?php echo 'Rp. '.number_format($totalbayar,2,",","."); ?></td>
    <td ><?php echo 'Rp. '.number_format($diskon,2,",","."); ?></td>
    <td ><?php echo 'Rp. '.number_format($dp,2,",","."); ?></td>
    <td ><?php echo 'Rp. '.number_format($sisa,2,",","."); ?></td>
    <?
	}
    else{
	?>
      <?php  $kdsewa = $row['kdsewa'];
	  $query23="select * from konfirmasi where kdsewa = '$kdsewa'";
		$result23 = mysql_query($query23) or die(mysql_error());
		$row23 =  mysql_fetch_array($result23);
		$atasnama=$row23['atasnama'];
		if($atasnama == null)
		{
			?>
            <td colspan="5" align="center" >
            <?
	echo "Belum Data Konfirmasi Pembayaran Lapangan";
	?>
    
    </td>
  <? }
  else{
	  $lamasewa = $row['lamasewa'];
	  $tarifsewa = $row['tarifsewa'];
	?>
  <td align="center">Lunas</td>
    <?
	if($statuspenyewa == "Biasa"){
	$totalbayar = $lamasewa*$tarifsewa;
	?>
    <td ><?php echo 'Rp. '.number_format($lamasewa*$tarifsewa,2,",","."); ?></td>
    <td >Rp. 0,00</td>
     <td >Rp. 0,00</td>
     <td >Rp. 0,00</td>
     <?
	}else{
		$totalbayar = ($lamasewa*$tarifsewa*4)-30000;
	 ?>
      <td ><?php echo 'Rp. '.number_format($lamasewa*$tarifsewa*4,2,",","."); ?></td>
    <td >Rp. 30.000,00</td>
     <td >Rp. 0,00</td>
     <td >Rp. 0,00</td>
     <?
	}
	 ?>
  <?
  }
  ?>
    <?
	}
	?>
        </tr>
    </tbody>
     <?php
	 
	 $totalpendapatansewa = $totalpendapatansewa + $totalbayar; 
					$i++;
					$totalbayar = 0;
					}
					?>
</table>
<h3>Total Pendapatan Sewa Lapangan : <?php echo 'Rp. '.number_format($totalpendapatansewa,2,",","."); ?></h3>


<br/>
<?
if($status == 'Lunas'){
$lapangan1 = 0;
$lapangan2 = 0;
	  $query="select * from sewa  where tglsewa between '$tglsewaawal' and '$tglsewaakhir'  ";
	  $result=mysql_query($query) or die ("Kesalahan pada perintah SQL!!!!!!");
	  while ($row = mysql_fetch_array($result)) {
		 $statussewa = $row['status'];
		   $kdsewa = $row['kdsewa'];
		   $kdlapangan = $row['kdlapangan'];
		 if($statussewa == "Di Tempat"){
	  $query3="select * from bayar where kdsewa = '$kdsewa'";
		$result3 = mysql_query($query3) or die(mysql_error());
		$row3 =  mysql_fetch_array($result3);
		$tgllunas = $row3['tgllunas'];
		$totalbayar = $row3['totalbayar'];
		$diskon = $row3['diskon'];
		$keterangan = $row3['keterangan'];
		$dp = $row3['dp'];
		$sisa = $row3['sisa'];
	  }
	  else{
		  $query3="select * from konfirmasi where kdsewa = '$kdsewa'";
		$result3 = mysql_query($query3) or die(mysql_error());
		$row3 =  mysql_fetch_array($result3);
		$tglkonfirmasi = $row3['tglkonfirm'];
	  }
	  if($status == 'Lunas'){
		  if($statussewa == "Di Tempat"){
		if($tgllunas == '0000-00-00')continue;
		  }
		  else{
			if($tglkonfirmasi == null)continue;  
		  }
	    }
	    if($kdlapangan =='1')$lapangan1++;
		if($kdlapangan =='2')$lapangan2++;
	  }
		 include "libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$dataSet = new XYDataSet();	
	$dataSet->addPoint(new Point('Lapangan 1',$lapangan1));
	$dataSet->addPoint(new Point('Lapangan 2',$lapangan2));
		$chart->setDataSet($dataSet);

$chart->setTitle("Grafik Penyewaan Lapangan Tanggal ".$tglsewaawal." Sampai Dengan ".$tglsewaakhir);
$chart->render("generated/demo1.png");

?>
 	<div align="center"><img alt="Vertical bars chart" src="generated/demo1.png" style="border: 1px solid gray;" width="800" height="600"/></div>
<?
$tahun = substr($tglsewaawal,0,4);
for ($s=1;$s<=12;$s++) {
$totalakhir = 0;
$tglawal = $tahun.'-'.$s.'-01';;
$tglakhir = $tahun.'-'.$s.'-31';
$query="select * from sewa  where tglsewa between '$tglawal' and '$tglakhir'  ";
	  $result=mysql_query($query) or die ("Kesalahan pada perintah SQL!!!!!!");
	  while ($row = mysql_fetch_array($result)) {
		 $statussewa = $row['status'];
		   $kdsewa = $row['kdsewa'];
		   $lamasewa = $row['lamasewa'];
		   $tarifsewa = $row['tarifsewa'];
		 if($statussewa == "Di Tempat"){
	  $query3="select * from bayar where kdsewa = '$kdsewa'";
		$result3 = mysql_query($query3) or die(mysql_error());
		$row3 =  mysql_fetch_array($result3);
		$tgllunas = $row3['tgllunas'];
	
	  }
	  else{
		  $query3="select * from konfirmasi where kdsewa = '$kdsewa'";
		$result3 = mysql_query($query3) or die(mysql_error());
		$row3 =  mysql_fetch_array($result3);
		$tglkonfirmasi = $row3['tglkonfirm'];
	  }
	  if($status == 'Lunas'){
		  if($statussewa == "Di Tempat"){
		if($tgllunas == '0000-00-00')continue;
		  }
		  else{
			if($tglkonfirmasi == null)continue;  
		  }
	    }
	    $totalakhir = $totalakhir + ($tarifsewa * $lamasewa);
	  }
	  $totalsemua[$s] = $totalakhir;
}

	 include "libchart/classes/libchart.php";

	$chart = new VerticalBarChart();

	$dataSet = new XYDataSet();	
	
	for ($n=1;$n<=12;$n++) {
	
	if($n == "1"){
 $bulanbenar = "Januari";
 }
 else if($n == "2"){
 $bulanbenar = "Februari";
 }
  else if($n == "3"){
 $bulanbenar = "Maret";
 }
  else if($n == "4"){
 $bulanbenar = "April";
 }
 else if($n == "5"){
 $bulanbenar = "Mei";
 }
  else if($n == "6"){
 $bulanbenar = "Juni";
 }
  else if($n == "7"){
 $bulanbenar = "Juli";
 }
   else if($n == "8"){
 $bulanbenar = "Agustus";
 }
   else if($n == "9"){
 $bulanbenar = "September";
 }
   else if($n == "10"){
 $bulanbenar = "Oktober";
 }
   else if($n == "11"){
 $bulanbenar = "November";
 }
   else{
 $bulanbenar = "Desember";
 }
	$dataSet->addPoint(new Point($bulanbenar,$totalsemua[$n]));
}
	$chart->setDataSet($dataSet);

$chart->setTitle("Grafik Penyewaan Lapangan Tahun 2020");
$chart->render("generated/demo2.png");
?>
<br/>
 	<div align="center"><img alt="Vertical bars chart" src="generated/demo2.png" style="border: 1px solid gray;" width="800" height="600"/></div>
<?
}
?>    
         <table width="410" border="0" align="left">
           <tr>
         
             <td width="200"><div align="left">Mengetahui, <? echo date('Y-m-d'); ?>
             <br/>
             Admin Suria Harapan School
              </div></td>
           </tr>
          
          
             <td>&nbsp;</td>
           </tr>
           <tr>
           
             <td><div align="left">(<? echo $nama; ?>)</div></td>
           </tr>
</table>

         <div align="center">
           
          
           
                <input name="" type="button" value="Cetak" onClick="window.print()" class="button" />
          
           <a href="adminlaporansewa.php">Kembali</a>
              </div>
         
</body>
</html>
