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
          <h2>Tabel Penyewa</h2>
          
          <div class="clr"></div>

     <br/>
      <div align="justify">    
  <form id="form1" name="form1" method="get" >
  Nama Penyewa : <input name="key" type="text" size="20" class="text" /> <input type="submit"  value="Cari" class="button"  />
  </form>
<br/>
  <table>
  <thead>
  <tr>
  <th >No.</th>
    <th >Nama</th>
    <th >Telepon</th>
    <th >Alamat</th>
    <th >Status</th>
    <th >Kartu</th>
    <th >Ubah</th>
    <th >Hapus</th>
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
	$qryall="select * from penyewa";
	$hsl=mysql_query($qryall);
	$jlhdata=mysql_num_rows($hsl);	

	    $key=$_GET['key'];
	  if(empty($key)){
	  	  $query="select * from penyewa order by nama asc limit $mulai, $brs ";
		  }
		  else{
		  $query="select * from penyewa where nama like '%$key%' ";
		  }
		  $i=1;
	  $result=mysql_query($query) or die ("Kesalahan pada perintah SQL!!!!!!");
	  while ($row = mysql_fetch_array($result)) {
	  ?>  
      <tbody>
     <tr class="light">
     <td ><div align="center"><?php echo $i;?></div></td>
    <td ><div align="left"><?php echo $row['nama'];?></div></td>
    <td ><div align="center"><?php echo $row['telp'];?></div></td>
    <td ><?php echo $row['alamat'];?></td>
    <td ><div align="center"><?php echo $row['status'];?></div></td>
    <td > <div align="center">
    <?
	if($row['status'] == "Member"){
	?>
    <a href="admincetakkartu.php?kdpenyewa=<?php echo $row['kdpenyewa']?>">Cetak</a>
    <?
	}
	?>
    </div></td>
    <td > <div align="center"><a href="adminupdatepenyewa.php?kdpenyewa=<?php echo $row['kdpenyewa']?>">Ubah</a></div></td>
    <td > <div align="center"><a href="admindeletepenyewa.php?kdpenyewa=<?php echo $row['kdpenyewa']?>" onClick="return confirm('Anda Yakin Mau Menghapus Data Ini?');">Hapus</a></div></td>
  </tr>
  </tbody>
                   <?php
				   $i++;
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
			echo "<a href='admintabelpenyewa.php?hal=".$i."'> [ ".$i." ] </a> "; 
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
