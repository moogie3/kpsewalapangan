<?php
require("connect.php");
$kdlapangan = $_GET["kdlapangan"];
$sql="delete from lapangan where kdlapangan ='$kdlapangan'";
if(isset($sql) && !empty($sql)) 
   { echo "<!--".$sql."-->";
     $result=mysql_query($sql) or die ("Invalid Query:".mysql_error());
	  ?>

<script language="JavaScript">alert('Anda Berhasil Menghapus Data '); 
document.location='admintabellapangan.php'</script>
	<?php
	}
	?>
