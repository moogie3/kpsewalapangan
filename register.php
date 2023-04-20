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
     alert( "Nama Member Harus Diisi" );
     document.myForm.nama.focus() ;
     return false;
   }
               if( document.myForm.telp.value == "" )
   {
     alert( "Telepon Harus Diisi" );
     document.myForm.telp.focus() ;
     return false;
   }
          if(isNaN( document.myForm.telp.value ) )
   {
     alert( "Telepon Harus Angka" );
     document.myForm.telp.focus() ;
     return false;
   }
   		 if( document.myForm.alamat.value == "" )
   {
     alert( "Alamat Harus Diisi" );
     document.myForm.alamat.focus() ;
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
          <h2>Pendaftaran Member</h2>
          
          <div class="clr"></div>

     <br/>
      <div align="justify"> 
     <?
require ("connect.php");
$query="select MAX(kdpenyewa) from penyewa";
$result = mysql_query($query) or die(mysql_error());
$row =  mysql_fetch_array($result);
$kdpenyewa = $row['MAX(kdpenyewa)'];
if($kdpenyewa == null){
$kdpenyewa = 'M-2019-001';
}
else{
$kdpenyewa ++;
 }
?>
  <form action="prosesregister.php" name="myForm" onSubmit="return(validate());" method="post">
<table width="500" border="0" cellpadding="4" cellspacing="10">
  <tr>
    <td width="150">Nama Member</td>
    <td width="144"><label>
      <input type="text" name="nama" id="nama" class="text" size="45"  />
    </label></td>
  </tr>
    <tr>
    <td width="150">Telepon</td>
    <td width="144"><label>
      <input type="text" name="telp" id="telp" class="text1" size="45"  />
    </label></td>
  </tr>
    <tr>
    <td width="150">Alamat</td>
    <td width="144"><label>
  <textarea name="alamat" cols="" rows="5"></textarea>
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
       <input type="hidden" name="kdpenyewa" id="kdpenyewa" value="<? echo $kdpenyewa ?>" />
     <input class="button" type="submit" name="contact_submitted" value="Register" />
    </label></td>
  </tr>

</table>

</form>	
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
