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
      <link rel="stylesheet" href="themes/base/jquery.ui.all.css">

<script src="ui/jquery.ui.core.js"></script>
	<script src="ui/jquery.ui.widget.js"></script>
	<script src="ui/jquery.ui.datepicker.js"></script>

	<script>
	$(function() {
		$("#tglbayar").datepicker({ dateFormat: "yy-mm-dd" }).val()
		
	});
	


	</script>
     <script type="text/javascript">

function validate()
{
		 if( document.myForm.tglbayar.value == "" )
   {
     alert( "Tgl Bayar Harus Diisi" );
     document.myForm.tglbayar.focus() ;
     return false;
   }
		 if( document.myForm.diskon.value == "" )
   {
     alert( "Diskon Harus Diisi" );
     document.myForm.diskon.focus() ;
     return false;
   }

       if(isNaN( document.myForm.diskon.value ) )
   {
     alert( "Diskon Harus Angka" );
     document.myForm.diskon.focus() ;
     return false;
   }
 		 if( document.myForm.dp.value == "" )
   {
     alert( "DP (Uang Muka) Harus Diisi" );
     document.myForm.dp.focus() ;
     return false;
   }

       if(isNaN( document.myForm.dp.value ) )
   {
     alert( "DP (Uang Muka) Harus Angka" );
     document.myForm.dp.focus() ;
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
          <h2>Pembayaran Jadwal</h2>
          
          <div class="clr"></div>

     <br/>
      <div align="justify">    
     <?php
		require ("connect.php");
		$kdjadwal = $_GET['kdjadwal'];
		$query="select * from jadwal where kdjadwal = '$kdjadwal'";
		$result = mysql_query($query) or die(mysql_error());
		$row =  mysql_fetch_array($result);
		$kdlapangan = $row['kdlapangan'];
		$kdpenyewa=$row['kdpenyewa'];
		$harijadwal=$row['harijadwal'];
		$jamjadwal=$row['jamjadwal'];
		$lamajadwal=$row['lamajadwal'];
		$jamakhir=$jamjadwal+$lamajadwal;
		$tarifjadwal=$row['tarifjadwal'];
		
		$query3="select * from lapangan where kdlapangan = '$kdlapangan'";
		$result3 = mysql_query($query3) or die(mysql_error());
		$row3 =  mysql_fetch_array($result3);
		$nolapangan = $row3['nolapangan'];
		$tarif = $row3['tarif'];
		
		
		$query5="select * from penyewa where kdpenyewa = '$kdpenyewa'";
		$result5 = mysql_query($query5) or die(mysql_error());
		$row5 =  mysql_fetch_array($result5);
		$nama = $row5['nama'];
		$telp = $row5['telp'];
		$status = $row5['status'];
		
		require ("connect.php");
$query7="select MAX(kdbayar) from bayar";
$result7 = mysql_query($query7) or die(mysql_error());
$row7 =  mysql_fetch_array($result7);
$kdbayar = $row7['MAX(kdbayar)'];
if($kdbayar == null){
$kdbayar = "B-001";
}
else{
$kdbayar++;
 }
		
		?>
  <form action="prosesadminaddbayar.php" name="myForm" onSubmit="return(validate());" method="post">
<table width="500" border="0" cellpadding="4" cellspacing="10">
  <tr>
    <td width="150">Kode Jadwal</td>
    <td width="144"><label>
      : <? echo $kdjadwal; ?>
    </label></td>
  </tr>
  <tr>
    <td width="150">No. Lapangan</td>
    <td width="144"><label>
        : <? echo $nolapangan; ?> (<?php echo 'Rp. '.number_format($tarifjadwal,2,",","."); ?> / Jam)
    </label></td>
  </tr>
    <tr>
    <td width="150">Penyewa</td>
    <td width="144"><label>
      : <? echo $nama; ?> (<? echo $status; ?>) - <? echo $telp; ?>
    </label></td>
  </tr>
  <tr>
    <td width="150">Hari</td>
    <td width="144"><label>
   : <? echo $harijadwal; ?>
    </label></td>
  </tr>
  
    <tr>
    <td width="150">Jam</td>
    <td width="144"><label>
      : <? echo $jamjadwal; ?> : 00 - <? echo $jamakhir; ?> : 00 
    </label></td>
  </tr>
 <tr>
    <td width="150">Kode Bayar</td>
    <td width="144"><label>
   : <? echo $kdbayar; ?>
    </label></td>
  </tr>
   <tr>
    <td width="150">Total Sewa (x4)</td>
    <td width="144"><label>
   : <?php 
   $totalsewa = $lamajadwal*$tarifjadwal*4;
   echo 'Rp. '.number_format($totalsewa,2,",","."); ?>
    </label></td>
  </tr>
      <tr>
    <td width="150">Tanggal Bayar</td>
    <td width="144"><label>
      <input type="text" name="tglbayar" id="tglbayar" class="text1" size="45" value="<? echo date('Y-m-d'); ?>"  />
    </label></td>
  </tr>
  <tr>
    <td width="150">Keterangan</td>
    <td width="144"><label>
     <textarea name="keterangan" cols="" rows="5"></textarea>
    </label></td>
  </tr>
      <tr>
    <td width="150">Diskon</td>
    <td width="144"><label>
      <input type="text" name="diskon" id="diskon" class="text1" size="45"  />
    </label></td>
  </tr>
   <tr>
    <td width="150">DP (Uang Muka)</td>
    <td width="144"><label>
      <input type="text" name="dp" id="dp" class="text1" size="45"  />
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
    <input type="hidden" name="kdbayar" id="kdbayar" value="<? echo $kdbayar ?>" />
    <input type="hidden" name="totalsewa" id="totalsewa" value="<? echo $totalsewa ?>" />
       <input type="hidden" name="kdjadwal" id="kdjadwal" value="<? echo $kdjadwal ?>" />
     <input class="button" type="submit" name="contact_submitted" value="Input" />
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
