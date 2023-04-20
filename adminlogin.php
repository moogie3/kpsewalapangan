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
     <script type="text/javascript">
function validate()
{
               if( document.myForm.nama.value == "" )
   {
     alert( "Nama Harus Diisi" );
     document.myForm.nama.focus() ;
     return false;
   }
	 if( document.myForm.pass.value == "" )
   {
     alert( "Password Harus Diisi" );
     document.myForm.pass.focus() ;
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
      </div>
      <div class="clr"></div>
      <div class="slider">
      
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
          <h2>Login Admin</h2>
          
          <div class="clr"></div>

     <br/>
      <div align="justify"> 
      <form action="prosesadminlogin.php" method="post" name="myForm" onSubmit="return(validate());">
<table width="222" border="0">
  <tr>
    <td width="68">Nama</td>
    <td width="144"><label>
       <input name="nama" id="nama"   type="text" class="text" />
    </label></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><label>
     <input type="password" id="pass" name="pass" class="text"/>
    </label></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td><label>

      <input type="submit" name="button" id="button" value="Login" class="button" />
    </label></td>
  </tr>

</table>
</form>
          </div>
          <div class="clr"></div>
        </div>
      
      </div>
      <div class="sidebar">
       
        
        
        
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
