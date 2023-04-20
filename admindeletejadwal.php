<?php
require("connect.php");
$kdjadwal = $_GET["kdjadwal"];
$sql="delete from jadwal where kdjadwal ='$kdjadwal'";
$sql2="delete from bayar where kdjadwal ='$kdjadwal'";
mysql_query($sql2);
if(isset($sql) && !empty($sql)) 
   { echo "<!--".$sql."-->";
     $result=mysql_query($sql) or die ("Invalid Query:".mysql_error());
	  ?>

<script language="JavaScript">alert('Anda Berhasil Menghapus Data '); 
document.location='admintabeljadwal.php'</script>
	<?php
	}
	?>
