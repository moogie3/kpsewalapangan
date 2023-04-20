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
   <link rel="stylesheet" href="themes/base/jquery.ui.all.css">

<script src="ui/jquery.ui.core.js"></script>
	<script src="ui/jquery.ui.widget.js"></script>
	<script src="ui/jquery.ui.datepicker.js"></script>

	<script>
	$(function() {
		$("#tglsewa").datepicker({ dateFormat: "yy-mm-dd",minDate:0 }).val()
		
	});
	


	</script>
     <script type="text/javascript">

function validate()
{
               if( document.myForm.nama.value == "" )
   {
     alert( "Nama Penyewa Harus Diisi" );
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
		 if( document.myForm.tglsewa.value == "" )
   {
     alert( "Tanggal Sewa Harus Diisi" );
     document.myForm.tglsewa.focus() ;
     return false;
   }
		 if( document.myForm.lama.value == "" )
   {
     alert( "Lama / Jam Harus Diisi" );
     document.myForm.lama.focus() ;
     return false;
   }

       if(isNaN( document.myForm.lama.value ) )
   {
     alert( "Lama / Jam Harus Angka" );
     document.myForm.lama.focus() ;
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
          <h2>Pesan Lapangan</h2>
          
          <div class="clr"></div>

     <br/>
      <div align="justify"> 
      <?php
		require ("connect.php");
		$query3="select MAX(kdpenyewa) from penyewa";
$result3 = mysql_query($query3) or die(mysql_error());
$row3 =  mysql_fetch_array($result3);
$kdpenyewa = $row3['MAX(kdpenyewa)'];
if($kdpenyewa == null){
$kdpenyewa = 1;
}
else{
$kdpenyewa ++;
 }
 
$query7="select MAX(kdsewa) from sewa";
$result7 = mysql_query($query7) or die(mysql_error());
$row7 =  mysql_fetch_array($result7);
$kdsewa = $row7['MAX(kdsewa)'];
if($kdsewa == null){
$kdsewa = "S-001";
}
else{
$kdsewa++;
 } 
 
		$kdlapangan = $_GET['kdlapangan'];
		$query="select * from lapangan where kdlapangan = '$kdlapangan'";
		$result = mysql_query($query) or die(mysql_error());
		$row =  mysql_fetch_array($result);
		$nolapangan = $row['nolapangan'];
		$keterangan=$row['keterangan'];
		$gambar=$row['gambar'];
		?>
  <form action="prosespesanlapangan.php" method="post" enctype="multipart/form-data" name="myForm" onSubmit="return(validate());">
<table width="500" border="0" cellpadding="4" cellspacing="10">
<tr>
    <td width="150">Gambar</td>
    <td width="144"><label>
    <img src="<? echo $gambar; ?>" width="200" height="200" />
    </label></td>
  </tr>

  <tr>
    <td width="150">No Lapangan</td>
    <td width="144"><label>
      : <? echo $nolapangan ?>
    </label></td>
  </tr>
    <tr>
    <td width="150">Kode Sewa</td>
    <td width="144"><label>
      : <? echo $kdsewa; ?>
    </label></td>
  </tr>
    <tr>
    <td width="150">Nama Penyewa</td>
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
    <td width="150">Tanggal Sewa</td>
    <td width="144"><label>
      <input type="text" name="tglsewa" id="tglsewa" class="text1" size="45"  />
    </label></td>
  </tr>

  
    <tr>
    <td width="150">Jam</td>
    <td width="144"><label>
      <select name="jam" id="jam" class="button7">
   <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
    </select>
: 00
    </label></td>
  </tr>
      <tr>
    <td width="150">Lama / Jam</td>
    <td width="144"><label>
      <input type="text" name="lama" id="lama" class="text1" size="45"  />
    </label></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><label>
    <input type="hidden" name="kdsewa" id="kdsewa" value="<? echo $kdsewa ?>" />
    <input type="hidden" name="kdpenyewa" id="kdpenyewa" value="<? echo $kdpenyewa ?>" />
       <input type="hidden" name="kdlapangan" id="kdlapangan" value="<? echo $kdlapangan ?>" />
     <input class="button" type="submit" name="contact_submitted" value="Pesan" />
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
