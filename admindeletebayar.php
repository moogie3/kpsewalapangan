<?php
require("connect.php");
$kdbayar = $_GET["kdbayar"];
$kdjadwal = $_GET["kdjadwal"];
$sql="delete from bayar where kdbayar ='$kdbayar'";
if(isset($sql) && !empty($sql)) 
   { echo "<!--".$sql."-->";
     $result=mysql_query($sql) or die ("Invalid Query:".mysql_error());
	  ?>

<script language="JavaScript">alert('Anda Berhasil Menghapus Data '); 
document.location='admintabelbayar.php?kdjadwal=<? echo $kdjadwal;?>'</script>
	<?php
	}
	?>
