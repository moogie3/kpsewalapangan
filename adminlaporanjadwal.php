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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
<title>Suria Harapan School</title>
<style type="text/css">
<!--
.style2 {font-size: 24px}
.style3 {color: #FFFFFF}
-->
</style>
</head>

<body>
<table width="100%" border="0" align="center">
  <tr>
    <td width="100"><img src="images/logo.jpg" width="100px" height="100px"/></td>
    <td><div align="center" class="style2">
      <div align="right"><strong>Suria Harapan School</strong></div>
    </div>      
      <div align="right">
         Alamat : Jl. Hayam Wuruk No.171, RT.10, Talang Jauh, Kec. Jelutung, Kota Jambi, Jambi 36133
        <br />
        Telepon  : 0741 - 3061101, Handphone : 0811-7422-558
        <br/>
        Email : suriaharapanschool@gmail.com
    </div></td>
    
  </tr>
</table>
<hr />
<h2>Laporan Data Jadwal</h2>
<table id="rounded-corner" border="1" cellpadding="5" cellspacing="0" align="center" width="1000">
    <thead>
<tr bgcolor="#660000">
            <th class="rounded style3" scope="col">No.</th>
      <th class="rounded style3" scope="col">Kode Jadwal</th>
      <th class="rounded style3" scope="col">Penyewa</th>
      <th class="rounded style3" scope="col">Lapangan</th>
      <th class="rounded style3" scope="col">Hari</th>
      <th class="rounded style3" scope="col">Jam</th>
      <th class="rounded style3" scope="col">Tarif / Jam</th>
      </tr>
    </thead>
        <?php
	  	  include("connect.php");
		  $i=1;
		  $query="select * from jadwal ";
	  $result=mysql_query($query) or die ("Kesalahan pada perintah SQL!!!!!!");
	  while ($row = mysql_fetch_array($result)) {
	  ?>    
    <tbody>
    	<tr bgcolor="#FFFFCC">
        	<td><div align="center"><?php echo $i;?></div></td>
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
     <td ><div align="center"><?php echo 'Rp. '.number_format($row['tarifjadwal'],2,",","."); ?></div></td>
        </tr>
    </tbody>
     <?php
					$i++;
					}
					?>
</table>

<br />
         <table width="410" border="0" align="left">
           <tr>
         
             <td width="200"><div align="left">Mengetahui, <? echo date('Y-m-d'); ?>
             <br/>
             Admin Suria Harapan School
              </div></td>
           </tr>
          
          
             <td>&nbsp;</td>
           </tr>
           <tr>
           
             <td><div align="left">(<? echo $nama; ?>)</div></td>
           </tr>
</table>

         <div align="center">
           
          
           
                <input name="" type="button" value="Cetak" onClick="window.print()" class="button" />
          
           <a href="adminhome.php">Kembali</a>
              </div>
         
</body>
</html>