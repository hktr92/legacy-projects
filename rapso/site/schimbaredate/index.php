<?php
session_start();
ob_start();
include_once("inc/configurare.php");
include("inc/func.dark.php");
include("inc/security.php");
error_reporting(0);
auto_unban();
sterge_cont_automat();
?>
<!-- This website is using Devilium Metin2CMS from www.darkdev.eu -->
<!-- this is the free version wich can be downloaded from www.darkdev.eu -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?=$titlu?></title>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>
<link href='images/style.css' rel='stylesheet' type='text/css'>

<style type="text/css">
<!--
a:visited {
	color: #946767;
	text-decoration: none;
}
a:link {
	color: #946767;
	text-decoration: none;
}
a:hover {
	color: #FFF;
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
-->
</style></head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<table width="1110" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="239" valign="top"><table width="239" border="0" cellpadding="0" cellspacing="0">
       <tr>
        <td height="40">&nbsp;</td>
      </tr>
	  <tr>
        <td height="47" background="images/wmbm2_08.png" class="head">ZONA MEMBRI </td>
      </tr>
      <tr>
        <td background="images/wmbm2_14.png" style="background-repeat:repeat-y; " valign="top">
			<div id="ack"></div> <?php if(!isset($_SESSION['user']) && !isset($_SESSION['pass'])){
			login();
									?><form id="myForm" action="index.php" method="POST">
				<table border="0" align="center" cellpadding="1" cellspacing="0" style="padding-left:5px; ">
				  <tr>
					<td width="158"><input name="username" type="text" class="login_field" id="username" OnClick="this.value=''" value="utilizator"></td>
					<td width="61" rowspan="2"><button name="submit" type="submit" class="login_btn" id="submit">LOGIN</button></td>
				  </tr>
				  <tr>
					<td><input name="password" type="password" class="login_field" id="password" OnClick="this.value=''" value="password"></td>
					</tr>
				  <tr>
					<td colspan="2" class="login_text"><a href="" class="login_text"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="index.php?page=recuperare-pw" class="login_text">PAROLA UITATA</a></td>
					</tr>
  			</table>
  </form><?php } else{ ?> <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="196" height="10"></td>
			</tr><?php if($_SESSION['admin'] > 0){?>
          <tr>
            <td class="main_menu"><a HREF="index.php?page=panou-admin">&raquo; Administrare</a></td>
		  </tr>                                           <?php } ?>
          <tr>
            <td class="main_menu"><a HREF="index.php?page=schimbare-email">&raquo; Schimba email</a></td>
          </tr>
		    <tr>
            <td class="main_menu"><a HREF="index.php?page=schimbare-pw">&raquo; Schimba parola</a></td>
          </tr>
		    <tr>
            <td class="main_menu"><a HREF="index.php?page=parola-depozit">&raquo; Cere parola depozit</a></td>
          </tr>
		    <tr>
            <td class="main_menu"> <a HREF="index.php?page=cod-stergere">&raquo; Cod stergere caractere</a></td>
          </tr>
		  <tr>
            <td class="main_menu"> <a HREF="index.php?page=cod-secret">&raquo; Codul secret</a></td>
          </tr>
		    <tr>
            <td class="main_menu"><a HREF="index.php?page=iesire">&raquo; Logout</a></td>
          </tr>
		  
        </table>   <Br> 

<?php } ?>

		</td>
      </tr>
      <tr>
        <td height="42" background="images/wmbm2_11.png" class="head" style="background-repeat:no-repeat ">MENIU PRINCIPAL </td>
      </tr>
      <tr>
        <td background="images/wmbm2_14.png" style="background-repeat:repeat-y; "><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="196" height="10"></td>
          </tr>
          <tr>
            <td class="main_menu"><a href="index.php" >ACASA</a></td>
          </tr>
		   <tr>
            <td class="main_menu"><a href="http://metin2rapsodia.ro/" >INAPOI LA SITEUL PRINCIPAL</a></td>
          </tr>
     
        </table>    </td>
      </tr>
      <tr>
        <td background="images/wmbm2_18.png" width="239" height="80" style="background-repeat:no-repeat; background-position:top; " valign="top"><table border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="123" height="23">&nbsp;</td>
            <td width="115">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="20">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
			</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="10"></td>
          </tr>
          </table></td>
      </tr>
    
    </table></td>
    <td width="631" valign="top"><table border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="631"><img src="images/wmbm2_03.png" width="631" height="219" alt=""></td>
      </tr>
      <tr>
        <td height="50" background="images/wmbm2_13.png" class="content_head" style="background-repeat:no-repeat;padding-left:23px; ">WWW.METIN2RAPSODIA.RO</td>
      </tr>
      <tr>
        <td background="images/wmbm2_15.png" style="background-repeat:repeat-y; " valign="top" height="250">
         <table width="91%" align="center" class="content">
		 	<tr>
				<td valign="top"><?php loadcontent();?>
          </td>
			</tr>
		 </table>
		 </td>
      </tr>
      <tr>
        <td><img src="images/wmbm2_23.png" width="631" height="78" alt=""></td>
      </tr>
    </table></td>
    <td width="240" valign="top"><table border="0" cellpadding="0" cellspacing="0">
	<tr>
        <td height="40">&nbsp;</td>
      </tr>
  <tr>
    <td height="49" background="images/wmbm2_05.png" class="head" style="background-repeat:no-repeat; "> TOP 10 CARACTERE </td>
  </tr>
  <tr>
    <td background="images/wmbm2_09.png" style="background-repeat:repeat-y; " valign="top">

	</td>
  </tr>
  <tr>
    <td height="37" background="images/wmbm2_16.png" class="head" >TOP 10 BRESLE</td>
  </tr>
  <tr>
    <td background="images/wmbm2_09.png" style="background-repeat:repeat-y; " valign="top">	</td>
  </tr>
  <tr>
    <td><img src="images/wmbm2_19.png" width="240" height="22" alt=""></td>
  </tr>
</table>
&nbsp;</td>
  </tr>
</table>
</body>
</html>
















<!-- This website is using Devilium Metin2CMS from www.darkdev.eu -->
<!-- this is the free version wich can be downloaded from www.darkdev.eu -->
