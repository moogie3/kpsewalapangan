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
		$("#tglsewa").datepicker({ dateFormat: "yy-mm-dd" }).val()
		
	});
	


	</script>
     <script type="text/javascript">

function validate()
{
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
          <h2>Sewa Pengunjung</h2>
          
          <div class="clr"></div>

     <br/>
      <div align="justify">    
    <?
require ("connect.php");
$query="select MAX(kdsewa) from sewa";
$result = mysql_query($query) or die(mysql_error());
$row =  mysql_fetch_array($result);
$kdsewa = $row['MAX(kdsewa)'];
if($kdsewa == null){
$kdsewa = "S-001";
}
else{
$kdsewa++;
 }
?>
  <form action="prosesadminaddsewa.php" name="myForm" onSubmit="return(validate());" method="post">
<table width="500" border="0" cellpadding="4" cellspacing="10">
  <tr>
    <td width="150">Kode Sewa</td>
    <td width="144"><label>
      : <? echo $kdsewa; ?>
    </label></td>
  </tr>
  <tr>
    <td width="150">No. Lapangan</td>
    <td width="144"><label>
         <select name="kdlapangan" id="kdlapangan" class="button7">
          <?
		  require("connect.php");
		  $query1 = "select * from lapangan order by nolapangan asc";
		  $result1 = mysql_query($query1);
		  
		  while ($row1 = mysql_fetch_array($result1)) {
		  $kdlapangan=$row1['kdlapangan'];
		  $hari=$row1['hari'];
		  $jam=$row1['jam'];
		  $tarif=$row1['tarif'];
		  $nolapangan=$row1['nolapangan'];
		  ?>
            
              
			  <option value="<? echo $kdlapangan ?>"> <? echo $nolapangan;?>  </option>
              <? 
			  }
			  ?>
            </select>
    </label></td>
  </tr>
    <tr>
    <td width="150">Penyewa</td>
    <td width="144"><label>
         <select name="kdpenyewa" id="kdpenyewa" class="button6">
          <?
		  require("connect.php");
		  $query1 = "select * from penyewa order by kdpenyewa asc";
		  $result1 = mysql_query($query1);
		  
		  while ($row1 = mysql_fetch_array($result1)) {
		  $kdpenyewa=$row1['kdpenyewa'];
		  $nama=$row1['nama'];
		  ?>
            
              
			  <option value="<? echo $kdpenyewa ?>"> <? echo $nama;?> </option>
              <? 
			  }
			  ?>
            </select>
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
     <input class="button" type="submit" name="contact_submitted" value="Input" />
    </label></td>
  </tr>

</table>

</form>

<br/>

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
