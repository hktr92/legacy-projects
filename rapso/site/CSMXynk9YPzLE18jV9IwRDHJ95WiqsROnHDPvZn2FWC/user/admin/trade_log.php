<?PHP
  if($_SESSION['user_admin']>=$adminRights['itemsearch']) {
    if(isset($_GET['char']) && !empty($_GET['char'])) $_SESSION['search_char']=$_GET['char'];
?>
<style type="text/css">
<!--
body,td,th {
		font-family: Arial, Helvetica, sans-serif;
	font-size: 8px;
}
-->
</style>
<!-- start -->
<form action="" method="POST">
<table width="66%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="25%"><h5>Nume jucator : </h5></td>
    <td width="24%" ><input type="text" name="numeadmin" id="barx" class="iRg_input" /></td>
    <td width="51%"><input type="submit" name="cauta" class="iR_stats_level" value="Cauta" /></td>
  </tr>
</table>
</form>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="70px">#</td>
    <td>Ora</td>
    <td>Tip</td>
    <td>ID</td>
    <td>Detalii</td>
    <td>IP</td>
     <td>VNUM</td>
  </tr>

<?php

if(isset($_POST['cauta'])) {
$caracter = mysql_real_escape_string($_POST['numeadmin']);
$xplm = mysql_query("Select * from player.player where name='".$caracter."'") or die(mysql_error());
$xplm2 = mysql_fetch_array($xplm) or die(mysql_error());
$xplm3 = $xplm2['id'];
$co = mysql_query("Select * from log.log where type='ITEM' and who='$xplm3' and how LIKE '%EXCHANGE%' ");
	} 
	else 
	{ 
	$co = mysql_query("Select * from log.log where type='ITEM' and how LIKE '%EXCHANGE%'");
}
while($trade = mysql_fetch_object($co))
	{
	$getName= mysql_query("SELECT * FROM player.player where id='".$trade->who."' ");
	$showName = mysql_fetch_object($getName);
	$name = $showName->name;
	?>


		

  <tr>
    <td width="70px"><?=$name?></td>
    <td><?=$trade->time;?></td>
    <td><?=$trade->how;?></td>
    <td><?=$trade->what;?></td>
    <td><?=$trade->hint;?></td>
    <td><?=$trade->ip;?></td>
     <td><?=$trade->vnum;?></td>
  </tr>


        <?php
	}
	
	?>
    
	</table>

 

<!-- end -->
<?PHP
  }
  else {
    echo'<p class="meldung">Nu ave&#355;i acces la aceast&#259; zon&#259;!</p>';
  }
?>
<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>