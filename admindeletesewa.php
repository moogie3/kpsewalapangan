<?php
require("connect.php");
$kdsewa = $_GET["kdsewa"];
$sql="delete from sewa where kdsewa ='$kdsewa'";
$sql2="delete from bayar where kdsewa ='$kdsewa'";
mysql_query($sql2);
if(isset($sql) && !empty($sql)) 
   { echo "<!--".$sql."-->";
     $result=mysql_query($sql) or die ("Invalid Query:".mysql_error());
	  ?>

<script language="JavaScript">alert('Anda Berhasil Menghapus Data '); 
document.location='admintabelsewa.php'</script>
	<?php
	}
	?>
