<?php
require("connect.php");
$kdpenyewa = $_GET["kdpenyewa"];
$sql="delete from penyewa where kdpenyewa ='$kdpenyewa'";
if(isset($sql) && !empty($sql)) 
   { echo "<!--".$sql."-->";
     $result=mysql_query($sql) or die ("Invalid Query:".mysql_error());
	  ?>

<script language="JavaScript">alert('Anda Berhasil Menghapus Data '); 
document.location='admintabelpenyewa.php'</script>
	<?php
	}
	?>
