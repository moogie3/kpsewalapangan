<?php
require("connect.php");
$kdbukutamu = $_GET["kdbukutamu"];
$sql="delete from bukutamu where kdbukutamu ='$kdbukutamu'";
if(isset($sql) && !empty($sql)) 
   { echo "<!--".$sql."-->";
     $result=mysql_query($sql) or die ("Invalid Query:".mysql_error());
	  ?>

<script language="JavaScript">alert('Anda Berhasil Menghapus Data '); 
document.location='admintabelbukutamu.php'</script>
	<?php
	}
	?>
