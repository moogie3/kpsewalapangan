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
        <script type="text/javascript">

function validate()
{
               if( document.myForm.nama.value == "" )
   {
     alert( "Nama Harus Diisi" );
     document.myForm.nama.focus() ;
     return false;
   }
               if( document.myForm.email.value == "" )
   {
     alert( "Email Harus Diisi" );
     document.myForm.email.focus() ;
     return false;
   }
   		 if( document.myForm.isi.value == "" )
   {
     alert( "Isi Harus Diisi" );
     document.myForm.isi.focus() ;
     return false;
   }
   return( true );
}
</script>
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
          <h2>Informasi Buku Tamu</h2>
          
          <div class="clr"></div>

     <br/>
      <div align="justify">    
      
      <table>
  <thead>
  <tr>
   <th >Tanggal</th>
    <th >Nama</th>
    <th >Email</th>
    <th >Isi</th>
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
	$qryall="select * from bukutamu";
	$hsl=mysql_query($qryall);
	$jlhdata=mysql_num_rows($hsl);	

	     $query="select * from bukutamu order by tgl desc limit $mulai, $brs ";
		$result=mysql_query($query) or die ("Kesalahan pada perintah SQL!!!!!!");
	  while ($row = mysql_fetch_array($result)) {
	  ?>  
      <tbody>
     <tr class="light">
    <td ><div align="center"><?php echo $row['tgl'];?></div></td>
    <td ><div align="center"><?php echo $row['namatamu'];?></div></td>
    <td ><div align="center"><?php echo $row['email'];?></div></td>
    <td ><div align="center"><?php echo $row['isi'];?></div></td>
    
  </tr>
  </tbody>
                   <?php
					}
					?>
</table>
 <br/>
 Halaman :		 <?php
	// hitung jlh hal yang akan ditampilkan
	$jlhhal=(int)ceil($jlhdata/$brs);
	// cetak "<"
	
	if($hal!=1)
	{
		$x=$hal-1;
			 
	}
	else
	{
		
	}
	// cetak angka hal berdasarkan jlh angka yg ingin ditampilkan
	$d=(int)ceil($hal/$bts);
	$hmulai=($d-1)*$bts+1;
	$hakhir=$d*$bts;
	if($hakhir>$jlhhal)
	{
		$hakhir=$jlhhal;
	}
	for($i=$hmulai;$i<=$hakhir;$i++)
	{
		if($i==$hal)
		{
			echo " [ ".$i." ] ";
		}
		else
		{
			echo "<a href='tabelbukutamu.php?hal=".$i."'> [ ".$i." ] </a> "; 
		}
	}
	// cetak ">"
	if($hal!=$jlhhal)
	{
		$x=$hal+1;
		;	 
	}
	else
	{
		
	}
?> 
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
