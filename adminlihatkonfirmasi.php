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
<title>Suria Harapan School</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />

<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
 <script src="jquery-1.7.2.js"></script>
   <script src="script.js"></script>
   <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="#">Suria Harapan School </a></h1>
      </div>
      <div class="menu_nav">
        <ul>
         <li><a href="adminhome.php">Beranda</a></li>
       <li><a href="adminpassword.php">Password</a></li>
    <li><a href="adminlogout.php">Logout</a></li>
     
        </ul>
      </div>
      <div class="clr"></div>
      <div class="slider">
      
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
          <h2>Konfirmasi Pembayaran</h2>
          
          <div class="clr"></div>

     <br/>
      <div align="justify">    
     <?php
		require ("connect.php");
		$kdsewa = $_GET['kdsewa'];
		
		$query1="select * from sewa where kdsewa = '$kdsewa'";
		$result1 = mysql_query($query1) or die(mysql_error());
		$row1 =  mysql_fetch_array($result1);
		$kdlapangan = $row1['kdlapangan'];
		$kdpenyewa=$row1['kdpenyewa'];
		$harisewa=$row1['harisewa'];
		$jamsewa=$row1['jamsewa'];
		$lamasewa=$row1['lamasewa'];
		$tglsewa=$row1['tglsewa'];
		$statussewa=$row1['status'];
		$tarifsewa=$row1['tarifsewa'];
		$jamakhir=$jamsewa+$lamasewa;
		
			$query5="select * from penyewa where kdpenyewa = '$kdpenyewa'";
		$result5 = mysql_query($query5) or die(mysql_error());
		$row5 =  mysql_fetch_array($result5);
		$nama = $row5['nama'];
		$telp = $row5['telp'];
		$status = $row5['status'];
		
		if ($status == "Biasa"){
   $totalsewa = $lamasewa*$tarifsewa;
   }
   else{
	$totalsewa = ($lamasewa*$tarifsewa*4)-30000;   
   }
		
		$query="select * from konfirmasi where kdsewa = '$kdsewa'";
		$result = mysql_query($query) or die(mysql_error());
		$row =  mysql_fetch_array($result);
		$tglkonfirm=$row['tglkonfirm'];
		$atasnama=$row['atasnama'];
		$rekening=$row['rekening'];
		$bank=$row['bank'];
		$keterangan=$row['keterangan'];
	$slip=$row['slip'];
	if($atasnama == null){
	echo "Maaf Belum Ada Data Konfirmasi Pembayaran Lapangan";
	}
	else{
		?>
 <table width="600" border="1" cellpadding="4" cellspacing="0">
  <tr>
    <td width="150">Slip Pembayaran</td>
    <td width="144"><label>
      <img src="<? echo $slip; ?>" width="400" height="600" />  
    </label></td>
  </tr>
  <tr>
    <td width="150">Kode Sewa</td>
    <td width="144"><label>
      : <? echo $kdsewa; ?>
    </label></td>
  </tr>
    <tr>
    <td width="150">Total Sewa</td>
    <td width="144"><label>
      : <?  echo 'Rp. '.number_format($totalsewa,2,",","."); ?>
    </label></td>
  </tr>
  <tr>
    <td width="150">Tanggal Konfirmasi</td>
    <td width="144"><label>
        : <? echo $tglkonfirm; ?> 
    </label></td>
  </tr>
    <tr>
    <td width="150">Rekening</td>
    <td width="144"><label>
      : <? echo $rekening; ?> Atas Nama <? echo $atasnama; ?> - Bank <? echo $bank; ?>
    </label></td>
  </tr>
  <tr>
    <td width="150">Keterangan</td>
    <td width="144"><label>
   : <? echo $keterangan; ?>
    </label></td>
  </tr>
  
  


</table>

<?
}
?>
          </div>
          <div class="clr"></div>
        </div>
      
      </div>
      <div class="sidebar">
       <div class="gadget">
          <h2 class="star">Menu</h2>
          <div class="clr"></div>
            
            <div id='cssmenu'>
<ul>
   
   <li class='has-sub'><a href='#'>Data Admin</a>
      <ul>
          <li><a href="adminaddadmin.php">Input Admin</a></li>
          <li><a href="admintabeladmin.php">Tabel Admin</a></li>
                   
      </ul>
   </li>
   <li class='has-sub'><a href='#'>Data Lapangan</a>
      <ul>
    <li><a href="adminaddlapangan.php">Input Lapangan</a></li>
    <li><a href="admintabellapangan.php">Tabel Lapangan</a></li>
                   
      </ul>
   </li>
   
   <li class='has-sub'><a href='#'>Data Penyewa</a>
      <ul>
   <li><a href="adminaddpenyewa.php">Input Penyewa</a></li>
      <li><a href="admintabelpenyewa.php">Tabel Penyewa</a></li>
                   
      </ul>
   </li>
  
   
   <li class='has-sub'><a href='#'>Data Sewa Member</a>
      <ul>
   <li><a href="adminaddjadwal.php">Input Sewa Member</a></li>
     <li><a href="admintabeljadwal.php">Tabel Sewa Member</a></li>        
      </ul>
   </li>
   
     <li class='has-sub'><a href='#'>Data Sewa Pengunjung</a>
      <ul>
     <li><a href="adminaddsewa.php">Input Sewa Pengunjung</a></li>
     <li><a href="admintabelsewa.php">Tabel Sewa Pengunjung</a></li>       
      </ul>
   </li>
   
   
   <li class='has-sub'><a href='#'>Data Buku Tamu</a>
      <ul>
     <li><a href="admintabelbukutamu.php">Tabel Buku Tamu</a></li>     
      </ul>
   </li>
   
      </li>
     
      <li class='has-sub'><a href='#'>Laporan</a>
      <ul>
     <li><a href="adminlaporanadmin.php">Laporan Admin</a></li>
            <li><a href="adminlaporanlapangan.php">Laporan Lapangan</a></li>
            <li><a href="adminlaporanpenyewa.php">Laporan Penyewa</a></li>
            <li><a href="adminlaporanjadwal.php">Laporan Jadwal</a></li>
            <li><a href="adminlaporansewa.php">Laporan Sewa Lapangan</a></li>
                   
      </ul>
   </li>
</ul>
</div>
      </div>  
        
        
      </div>
      <div class="clr"></div>
    </div>
  </div>
 
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">&copy; Copyright 2020 Suria Harapan School</p>

      <div style="clear:both;"></div>
    </div>
  </div>
</div>
</body>
</html>
