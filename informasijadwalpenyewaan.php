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
          <li><a href="index.php"><span>Beranda</span></a></li>
         <li><a href="lapangan.php"><span>Lapangan</span></a></li>
          <li><a href="register.php"><span>Pendaftaran</span></a></li>
          <li><a href="bukutamu.php"><span>Buku Tamu</span></a></li>
     
        </ul>
      </div>
      <div class="clr"></div>
      <div class="slider">
        <div id="coin-slider"> 
        
        <a href="#"><img src="images/slide1.jpg" width="1135" height="293" alt="" /> </a> 
        <a href="#"><img src="images/slide2.jpg" width="1135" height="293" alt="" /> </a>
         <a href="#"><img src="images/slide3.jpg" width="1135" height="293" alt="" /> </a> </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
          <h2>Informasi Penyewaan Lapangan</h2>
          
          <div class="clr"></div>

     <br/>
      <div align="justify"> 
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

<h2>Informasi Jadwal Sewa Lapangan Member</h2>
<br/>
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
          <h2 class="star">Menu Lainnya</h2>
          <div class="clr"></div>
            <ul class="sb_menu">
          <li><a href="carapemesanan.php">Cara Pemesanan</a></li>
          <li><a href="konfirmasi.php">Konfirmasi Pembayaran</a></li>
          <li><a href="tabelbukutamu.php">Informasi Buku Tamu</a></li>
           <li><a href="infolapangan.php"><span>Informasi Lapangan</span></a></li>
          </ul>
        </div>
        
        <div class="gadget">
          <h2 class="star">Informasi Bantuan</h2>
          <div class="clr"></div>
            <ul class="sb_menu">
             <li><a href="#">Telepon : 0741 - 3061101</a></li>
            <li><a href="#">Handphone : 0811-7422-558</a></li>
            <li><a href="#">E-mail : suriaharapanschool@gmail.com</a></li>
            <li><a href="#">Alamat : Jl. Hayam Wuruk No.171, RT.10, Talang Jauh, Kec. Jelutung, Kota Jambi, Jambi 36133</a></li>
          </ul>
        </div>
        
         <div class="gadget">
          <h2 class="star">Sosial Media</h2>
          <div class="clr"></div>
          <br/>
            <input type="image" src="images/facebook.jpg" width="200" height="70" >
   		<br/><br/>
         <input type="image" src="images/twitter.jpg" width="200" height="70">
        <br/><br/>
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
