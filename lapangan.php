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
          <h2>Lapangan</h2>
          
          <div class="clr"></div>

      <div align="justify">    <?php
	include("connect.php");
		  $query="select * from lapangan order by kdlapangan asc ";
	  $result=mysql_query($query) or die ("Kesalahan pada perintah SQL!!!!!!");
	  while ($row = mysql_fetch_array($result)) {
	  ?>         
       
        
          <div class="article">
           <h3>No. <?php echo $row['nolapangan'];?></h3>
   <div class="comment"><img  class="userpic" src="<?php echo $row['gambar'];?>" alt="" width="250" height="300" />
            <p><?php echo $row['keterangan'];?>
           <br/><br/>
              <a href="pesanlapangan.php?kdlapangan=<? echo $row['kdlapangan']; ?>" class="button">Pesan</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="pesanlapanganmember.php?kdlapangan=<? echo $row['kdlapangan']; ?>" class="button">Pesan Member</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
             <a href="informasijadwalpenyewaan.php" class="button">Informasi Penyewaan</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     

          </div>

    </div>
        <?php
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
