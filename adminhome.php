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
          <h2>Suria Harapan School</h2>
          
          <div class="clr"></div>


      <div align="justify"> 
Suria Harapan School beralamat di Jl. Hayam Wuruk No 171 RT 10, Talang Jauh, Kec. Jelutung, Kota Jambi, Jambi, merupakan sekolah swasta yang memiliki 2 lapangan basket dengan nama kepala sekolah yang bernama Bapak Efendi. Lapangan basket pada Suria Harapan School dibangun karena permainan basket yang sedang digemari oleh masyarakat dari berbagai kalangan, sedangkan lapangan basket yang tersedia masih sedikit. Dengan melihat peluang tersebut, pemilik yayasan sekolah mencoba untuk membuka penyewaan lapangan basket, karena merasa peluang usaha tersebut sangat menjanjikan dan dapat memberikan keuntungan tersendiri. 
<br/><br/>
	Perkembangan Suria Harapan School cukup pesat, hal ini dikarenakan dari bertahannya usaha tersebut selama 5 tahun, dan telah memiliki 2 buah lapangan, penambahan lapangan ini dilakukan agar penyewa dapat mempunyai berbagai pilihan sehingga dapat menarik minat para pengunjung Suria Harapan School untuk menyewa Pemilik selalu ingin memberikan pelayanan prima dengan harga yang terjangkau. Untuk mewujudkan pelayanan tersebut pemilik telah memiliki 1 orang karyawan untuk membantu melayani penyewa yang akan melakukan penyewaan lapangan. Sehingga tak jarang penyewa yang datang sekali menyewa, biasanya akan menjadi member (anggota) tetap di Suria Harapan School.
    <br/>     <br/>
  <h2>Informasi Penyewaan Lapangan</h2>

<table>
  <thead>
  <tr>
  <th>Tgl Sewa</th>
   <th>Kode Sewa</th>
    <th>Penyewa</th>
    <th>Lapangan</th>
    <th>Hari</th>
    <th>Jam</th>
  
  
  </tr>
  </thead>
   <?php
	  	  include("connect.php");
			  $tgl1 = date("Y-m-d");
			  
			 
$jangkawaktu='+ 7 days';
$date1 = new DateTime($tgl1);
$date1->modify($jangkawaktu);
		$tgl2 = $date1->format('Y-m-d');

		  $query="select * from sewa where tglsewa between '$tgl1' and '$tgl2' ";
		 
	  $result=mysql_query($query) or die ("Kesalahan pada perintah SQL!!!!!!");
	  while ($row = mysql_fetch_array($result)) {
	  ?> 
      <tbody>
     <tr class="light">
      <td ><div align="center"><?php echo $row['tglsewa'];?></div></td>
  
     <td ><div align="center"><?php echo $row['kdsewa'];?></div></td>
    <td ><div align="center">
    <?php $kdpenyewa = $row['kdpenyewa'];
	
	$query63="select * from penyewa where kdpenyewa = '$kdpenyewa'";
		$result63 = mysql_query($query63) or die(mysql_error());
		$row63 =  mysql_fetch_array($result63);
		echo $row63['nama'];
		
	?>
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
    
  </tr>
  </tbody>
                   <?php
					}
					?>
</table>
  <br/>
<h2>Informasi Jadwal Sewa Lapangan Member</h2>

 <table>
  <thead>
  <tr>
  <th >No.</th>
  <th >Kode Jadwal</th>
    <th >Penyewa</th>
    <th >Lapangan</th>
    <th >Hari</th>
    <th >Jam</th>
  </tr>
  </thead>
 <?php
	include("connect.php");
	// jlh data per halaman
	$brs=10;
	// jlh angka hal yg tampil di navigasi
	$bts=10;
	// cek isi var hal dari URL
	if(!isset($_GET['hal']))
	{
		$hal=1;
		$mulai=0;
	}
	else
	{
		$hal=$_GET['hal'];
		$mulai=($_GET['hal']-1)*$brs;
	}
	// cari jlh semua data
	$qryall="select * from jadwal";
	$hsl=mysql_query($qryall);
	$jlhdata=mysql_num_rows($hsl);	

	    $key=$_GET['key'];
	  if(empty($key)){
	  	  $query="select * from jadwal order by kdjadwal asc limit $mulai, $brs ";
		  }
		  else{
		  $query="select * from jadwal where kdjadwal like '%$key%' ";
		  }
		  $i=1;
	  $result=mysql_query($query) or die ("Kesalahan pada perintah SQL!!!!!!");
	  while ($row = mysql_fetch_array($result)) {
	  ?>  
      <tbody>
     <tr class="light">
     <td ><div align="center"><?php echo $i;?></div></td>
     <td ><div align="center"><?php echo $row['kdjadwal'];?></div></td>
    <td ><div align="center">
    <?php $kdpenyewa = $row['kdpenyewa'];
	
	$query63="select * from penyewa where kdpenyewa = '$kdpenyewa'";
		$result63 = mysql_query($query63) or die(mysql_error());
		$row63 =  mysql_fetch_array($result63);
		echo $row63['nama'];
		
	?>
    </div></td>
    <td ><div align="center"><?php $kdlapangan = $row['kdlapangan'];
	
	$query3="select * from lapangan where kdlapangan = '$kdlapangan'";
		$result3 = mysql_query($query3) or die(mysql_error());
		$row3 =  mysql_fetch_array($result3);
		echo $row3['nolapangan'];
		
	?></div></td>
    <td ><div align="center"><?php echo $row['harijadwal'];?></div></td>
    <td ><div align="center"><?php echo $row['jamjadwal'];?> : 00 - <?php $jamakhir = $row['jamjadwal'] + $row['lamajadwal'];
	echo $jamakhir ?> : 00</div></td>

  </tr>
  </tbody>
                   <?php
				   $i++;
					}
					?>
</table>
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
