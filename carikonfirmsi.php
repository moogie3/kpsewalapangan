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
		$("#tglkonfirm").datepicker({ dateFormat: "yy-mm-dd",minDate:0 }).val()
		
	});
	


	</script>
     <script type="text/javascript">

function validate()
{
               if( document.myForm.tglkonfirm.value == "" )
   {
     alert( "Tanggal Konfirm Harus Diisi" );
     document.myForm.tglkonfirm.focus() ;
     return false;
   }
                   if( document.myForm.atasnama.value == "" )
   {
     alert( "Atas Nama Harus Diisi" );
     document.myForm.atasnama.focus() ;
     return false;
   }     
                  if( document.myForm.rekening.value == "" )
   {
     alert( "No. Rekening Harus Diisi" );
     document.myForm.rekening.focus() ;
     return false;
   }    
                  if( document.myForm.bank.value == "" )
   {
     alert( "Bank Harus Diisi" );
     document.myForm.bank.focus() ;
     return false;
   }
                  if( document.myForm.keterangan.value == "" )
   {
     alert( "Keterangan Harus Diisi" );
     document.myForm.keterangan.focus() ;
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
          <h2>Konfirmasi Pembayaran</h2>
          
          <div class="clr"></div>

      <div align="justify"> 
      <?php
		require ("connect.php");
	$kdsewa = $_POST['kdsewa'];
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
		
		if($kdpenyewa == null){
		echo "Maaf Kode Sewa Tidak Tersedia, Silahkan Melakukan Penyewaan Lapangan Terlebih Dahulu";	
		}
		else{
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
           

<table width="500" border="0" cellpadding="4" cellspacing="10">
  <tr>
    <td width="90">Kode Sewa</td>
    <td width="244"><label>
      : <? echo $kdsewa; ?>
    </label></td>
  </tr>
  <tr>
    <td width="90">No. Lapangan</td>
    <td width="244"><label>
        : <? echo $nolapangan; ?> (<?php echo 'Rp. '.number_format($tarifsewa,2,",","."); ?> / Jam)
    </label></td>
  </tr>
    <tr>
    <td width="90">Penyewa</td>
    <td width="244"><label>
      : <? echo $nama; ?> (<? echo $status; ?>) - <? echo $telp; ?>
    </label></td>
  </tr>
  <tr>
    <td width="90">Hari</td>
    <td width="244"><label>
   : <? echo $harisewa; ?>
    </label></td>
  </tr>
  
    <tr>
    <td width="90">Jam</td>
    <td width="244"><label>
      : <? echo $jamsewa; ?> : 00 - <? echo $jamakhir; ?> : 00 
    </label></td>
  </tr>
    <tr>
    <td width="90">Tanggal Sewa</td>
    <td width="244"><label>
   : <? echo $tglsewa; ?>
    </label></td>
  </tr>
   <tr>
    <td width="90">Status</td>
    <td width="244"><label>
   : <? echo $statussewa; ?>
    </label></td>
  </tr>
 
   <tr>
    <td width="90">Total Sewa </td>
    <td width="244"><label>
   : <?php 
   if ($status == "Biasa"){
   $totalsewa = $lamasewa*$tarifsewa;
   }
   else{
	$totalsewa = ($lamasewa*$tarifsewa*4)-30000;   
   }
   echo 'Rp. '.number_format($totalsewa,2,",","."); ?>
    </label></td>
  </tr>
  
</table>


<br/>
<h2>Data Pembayaran</h2>

  <form action="prosescarikonfirmsi.php" method="post" enctype="multipart/form-data" name="myForm" onSubmit="return(validate());">
<table width="500" border="0" cellpadding="4" cellspacing="10">
 
  <tr>
    <td width="150">Tanggal</td>
    <td width="144"><label>
      <input type="text" name="tglkonfirm" id="tglkonfirm" class="text1" size="45"  />
    </label></td>
  </tr>
  <tr>
    <td>Bank</td>
    <td><label>
       <select name="bank" id="bank" class="button7">
                      <option value="BCA">BCA</option>
                      <option value="Panin">Panin</option>
                      <option value="UOB">UOB </option>
                      <option value="Mega">Mega</option>
                      <option value="Danamon">Danamon</option>
                      <option value="Pundi">Pundi</option>
                      <option value="Sinar Mas">Sinar Mas</option>
                      <option value="BII">BII</option>
              <option value="BRI">BRI</option>
              <option value="BNI">BNI</option>
                    </select>
    </label></td>
  </tr>
    <tr>
    <td width="150">No. Rekening</td>
    <td width="144"><label>
      <input type="text" name="rekening" id="rekening" class="text1" size="45"  />
    </label></td>
  </tr>
 <tr>
    <td width="150">Atas Nama</td>
    <td width="144"><label>
      <input type="text" name="atasnama" id="atasnama" class="text" size="45"  />
    </label></td>
  </tr>

  
  <tr>
    <td width="150">Keterangan</td>
    <td width="144"><label>
      <textarea name="keterangan" cols="" rows="5"></textarea>
    </label></td>
  </tr>
  <tr>
    <td width="150">Slip Pembayaran</td>
    <td width="144">
      
      <label><input type="file" name="file" id="file" class="button6" /> </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
       <input type="hidden" name="kdsewa" id="kdsewa" value="<? echo $kdsewa ?>" />
     <input class="button" type="submit" name="contact_submitted" value="Input" />
    </label></td>
  </tr>
</table>

</form>	
<?
		}
?>
<br/>
Bank Tujuan Pembayaran :
<br/>
1. BCA Atas Nama Suria Harapan School  No. AC 571 0192 9922
<br/>
2. Mandiri Atas Nama Suria Harapan School  No. AC 111 2392 9182
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
