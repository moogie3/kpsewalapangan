<?php
require("connect.php");
$kdadmin = $_GET["kdadmin"];
$sql="delete from admin where kdadmin ='$kdadmin'";
if(isset($sql) && !empty($sql)) 
   { echo "<!--".$sql."-->";
     $result=mysql_query($sql) or die ("Invalid Query:".mysql_error());
	  ?>

<script language="JavaScript">alert('Anda Berhasil Menghapus Data '); 
document.location='admintabeladmin.php'</script>
	<?php
	}
	?>
