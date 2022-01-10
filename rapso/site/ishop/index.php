<?php
session_start("ishop");
ob_start();

require("inc/security.php");
require("inc/func.cms.php");

require("inc/config.inc.php");
$result="";
if(empty($result)){



///////////////////////////////////////////////////////
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $titlu; ?></title>
<script type="text/javascript" src="js/unitip.js"></script>
<link href="css/unitip.css" rel="stylesheet" type="text/css" /> 
<link href="css/devilium.css" rel="stylesheet" type="text/css" /> 
<link rel="icon" type="image/png" href="images/fav.png">
<link href='http://fonts.googleapis.com/css?family=Changa+One|Droid+Sans|Kavoon' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="jquery/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="javascript/jquery.min.js"></script>
<style type="text/css">
<!--
body{
	background: url(images/<?php echo $selectedBg; ?>) no-repeat;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 77px;
	margin-bottom: 0px;
	background-repeat: no-repeat;
	background-position:center top;
	background-color: #000000;
}
-->
</style>
</head>
<body>

<table width="740" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="57" colspan="2" background="images/top.png">
    
    <?php if(!isset($_SESSION['is_user']) && !isset($_SESSION['is_pass']))
	{
		Login(); ?>
      <form action="" method="POST">
    <table width="55%" border="0" align="right" cellpadding="1" cellspacing="1">
      <tr>
        <td width="35%"><input name="user" type="text" class="login" id="user" maxlength="16" /></td>
        <td width="34%"><input name="pass" type="password" class="login" id="pass" maxlength="16" /></td>
        <td width="31%"><input name="logina" type="submit" class="submit" id="logina" value="LOGIN" /></td>
      </tr>
   
    </table></form>
    <?php } else { 
	$is_user = $_SESSION['is_user']; 
	$acc = mysql_fetch_object(mysql_query("Select * from ".$account_db.".account where login='$is_user'"));
	?>
    <table width="35%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td><font color="gold">Bun venit, <b><?=$is_user?></b>.[<a href="index.php?page=logout" onclick="load()" class="link_cat"><font color="red">&rarr; Iesire</font></a>]</td>
  </tr>
</table>

    <?php } ?>
    
    </td>
  </tr>
  <tr>
    <td width="244" background="images/mid.png" height="550" valign="top">
      <?php if(isset($_SESSION['is_user']) && isset($_SESSION['is_pass']) && $_SESSION['is_admin']>0)
	{ ?>
    <table width="91%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="70" background="images/1top.PNG" align="center" style="text-shadow:0px 1px 1px #963;"><strong><font color="black">ADMIN PANEL</font></strong></td>
      </tr>
      <tr>
        <td background="images/1mid.png" valign="top">

          <table width="82%" border="0" align="center" cellpadding="0" cellspacing="0">

      

	
	<tr>
    <td width="183" class="categorii"><a class="link_cat"  href="index.php?page=admin_addnews" onclick="load()">News </a></td>
  </tr>
   <tr>
    <td width="183" class="categorii"><a class="link_cat"  href="index.php?page=admin_additems" onclick="load()">Adauga iteme</a></td>
  </tr>
      <?php
if($jd_module > 0)
{
echo '<tr>
    <td width="183" class="categorii"><a class="link_cat"  href="index.php?page=admin_addjitems" onclick="load()">Adauga iteme JD</a></td>
  </tr>';
}
?>
   <tr>
    <td width="183" class="categorii"><a class="link_cat"  href="index.php?page=admin_items" onclick="load()">Listare iteme</a></td>
  </tr>
   <tr>
    <td width="183" class="categorii"><a class="link_cat"  href="index.php?page=admin_categorii" onclick="load()">Categorii iteme</a></td>
  </tr>
   <tr>
    <td width="183" class="categorii"><a class="link_cat"  href="index.php?page=admin_loguser" onclick="load()">Loguri useri</a></td>
  </tr>


    
</table>



       </td>

      </tr>

      <tr>

        <td><img src="images/1bnt.PNG" width="218" height="24" alt="bottom" /></td>

      </tr>

    </table>

	
    
    <?php } ?>

    

    

      <?php if(isset($_SESSION['is_user']) && isset($_SESSION['is_pass']))

	{ 



	?>

    <table width="91%" border="0" align="center" cellpadding="0" cellspacing="0">

       <tr>

        <td height="70" background="images/1top.PNG" align="center" style="text-shadow:0px 1px 1px #963;"><strong><font color="black">CATEGORII</font></strong></td>

      </tr>

      <tr>

        <td background="images/1mid.png" valign="top">

          <table width="82%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    <td width="183" class="categorii"><a class="link_cat"  href="index.php?page=home" onclick="load()">&diams;&nbsp;Acasa</a></td>
  </tr>
          <?php

	$cats = mysql_query("Select * from ".$web_db.".dev_is_cat");

	while($cat = mysql_fetch_object($cats))

	{

	?>

  <tr>

    <td width="183" class="categorii"><a class="link_cat"  href="index.php?page=items&cat=<?=$cat->id?>" onclick="load()"><?=$cat->titlu?></a></td>

  </tr>
 <?php } ?>
  <?php
if($jd_module > 0)
{
echo '<tr>
  	  <td width="183" class="categorii"><a class="link_cat"  href="index.php?page=jitems" onclick="load()"> Iteme JD</a></td>
	  </tr>';
}
?>
    <tr>

    <td width="183" class="categorii"><a class="link_cat"  href="index.php?page=depozit" onclick="load()"><font color="bianco">&rarr; </font> Depozit itemshop</a><font color="bianco"> &larr;</font></td>

  </tr>
  <tr>
    <td width="183" class="categorii"><a class="link_cat"  href="index.php?page=loguri" onclick="load()">&rarr; Jurnal cumparaturi  &larr;</a></td>
  </tr>

</table>



       </td>

      </tr>

      <tr>

        <td><img src="images/1bnt.PNG" width="218" height="24" alt="bottom" /></td>

      </tr>

    </table>

    <table width="210" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td height="27" background="images/monezi_show.PNG" style="padding-left:5px;padding-right:42px;"> &raquo; Monezi dragon :<b> <?=$acc->coins?></b></td>

  </tr>
  
  <?php if($jd_module > "0")

{

?>
<tr>
<td>&nbsp;</td>
</tr>
<tr>

    <td height="27" background="images/monezi_show.PNG" style="padding-left:5px;padding-right:42px;"> &raquo; Jetoane dragon :<b> <?=$acc->jcoins?></b></td>

 </tr>

<?php } ?>



</table><?php } ?><br />

<table width="84%" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td ></td>

  </tr>

</table>





    </td>

    <td width="496" background="images/mid.png" valign="top">

   





<br /><table width="90%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td>

    

   <script type="text/javascript">

 function load()

{

document.getElementById("contentajax").innerHTML ="<center><img src="http://register.ivc19.com/images/load.gif'></center>";

}

</script>



<div id="contentajax" style="width:450px;"><?php LoadContent();?></div>

</td>

  </tr>

</table>

</td>

  </tr>
</table>

</body>

</html>
<?php

} else { 
echo '<meta http-equiv="refresh" content="0;url='.$result.'" /> ';
}?>