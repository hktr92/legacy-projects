<?php 
include("inc/drepturi.php");
if(isset($_SESSION['user']) && isset($_SESSION['pass']) && $_SESSION['admin'] >=$drepturi['panou_admin'])
{
	$username = $_SESSION['user'];
$sql = mysql_query("Select * from account.account where login='".$_SESSION['user']."'");
	$acc=mysql_fetch_object($sql);

	$charss = mysql_query("Select * from player.player where account_id='".$acc->id."'");
	$chars = mysql_num_rows($charss);
?>


<h4>INFORMATII ADMIN </h4>
<ul>
&raquo; Nume de utilizator : <?=acc($username,login)?><br>
&raquo; Email : <?=acc($username,email)?><br>
&raquo; Grad :<span id="yourEmail"> <?=acc($username,web_admin);?></span><br>
</ul>

<br>


<table width="100%" border="0">
  <tr>
    <td width="25%"><h4>JUCATORI</h4>
&raquo; <a class="btn" href="index.php?page=u_acces" >Acces website</a>
<br>
&raquo; <a class="btn" href="index.php?page=adauga_admini">Acces joc</a>
<br>
&raquo; <a class="btn" href="index.php?page=cauta_cont">Cauta un cont</a><br>

&raquo; <a class="btn" href="index.php?page=cauta_caracter" >Cauta un caracter</a>
<br>
&raquo; <a class="btn" href="index.php?page=cauta_ip" >Cauta un IP</a>
<br>
&raquo; <a class="btn" href="index.php?page=cauta_vnum" >Cauta un item dupa vnum</a><br>
&raquo; 
  <a class="btn" href="index.php?page=create_item" >Creaza un item</a>
<br>
&raquo; 
  <a class="btn" href="index.php?page=a_donatii" >Donatii</a>
<br>
&raquo; 
  <a class="btn" href="index.php?page=retrage_item" >Retrage item</a>
  <br></td>
    <td width="25%" valign="top">
    <h4>SETARI WEBSITE </h4>
&raquo; 
  <a class="btn" href="index.php?page=adauga_stiri">Stiri / prima pagina</a>
<br>
&raquo; 
  <a class="btn" href="index.php?page=a_descarcari">Descarcari</a>
<br>
<br>
    </td>
    <td width="25%" valign="top">
    <h4>LOGURI</h4>
&raquo; <a class="btn" href="index.php?page=admin_comms" >Comenzi GM</a><br>
&raquo; <a class="btn" href="index.php?page=ic_log" >Iteme create</a><br>
&raquo; <a class="btn" href="index.php?page=ir_log" >Iteme retrase</a><br>
&raquo; <a class="btn" href="index.php?page=ec_log" >Edit caracter</a><br>
&raquo; <a class="btn" href="index.php?page=log_monezi" >Monezi</a><br>
&raquo; <a class="btn" href="index.php?page=ban_log" >Banuri</a><br>


    </td>
	
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<?php } else { echo error("Zona restrictionata.Drepturi de acces insuficiente.");}?><a href="index.php?page=panou-admin">&laquo; Inapoi la panou administrare</a>