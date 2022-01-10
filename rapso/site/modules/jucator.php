<h4>Metin2Rapsodia - DETALII JUCATOR</h4><?php
if(is_numeric($_GET['id']))
{
	$id = replace($_GET['id']);
	$getCh = mysql_query("Select * from player.player where id='$id'");
	if(mysql_num_rows($getCh)==NULL){ echo error("Caracterul nu exista");} else {
	$c = mysql_fetch_object($getCh);
	$query2 = mysql_query("SELECT * FROM player.player_index WHERE pid1='$id' or pid2='$id' or pid3='$id' or pid4='$id'");
	$row2 = mysql_fetch_array($query2);
	$empire = $row2['empire'];
	$gB = mysql_query("Select * from player.guild_member where pid='$id'");
	$exe = mysql_fetch_array(mysql_query("SELECT *,count(*) as total_line FROM player.player WHERE id='".$id."' AND DATE_SUB(NOW(), INTERVAL 5 MINUTE) < last_play")); 
	$username = $_SESSION['create_time'];
	$sql = mysql_query("Select * from account.account where create_time='".$_SESSION['create_time']."'") or die(mysql_error());
	$accc=mysql_fetch_object($sql);

  if(mysql_num_rows($gB)==NULL)
	{
		$bresla =  "Fara breasla";
	}
	else
	{
		$b = mysql_fetch_object($gB);
		$gid= $b->guild_id;
		$gN = mysql_query("Select * from player.guild where id='$gid'");
		$guild = mysql_fetch_object($gN);
		$bresla = $guild->name;
	}

?>
<fieldset class="is_cats"><legend class="top">Nume jucator :: <?=$c->name?> </legend>

<table width="100%"  border="0">
  <tr>
    <td width="22%"><div align="right">Rasa : </div></td>
    <td width="22%"><div align="center"><?=clasa_c($c->job);?></div>
    </td>
    <td width="56%" rowspan="8" align="center"><img src="images/clase/<?=$c->job?>.png"  /></td>
  </tr>
  <tr>
    <td><div align="right">Regat : </div></td>
    <td>
    <div align="center"><?=nume_regat($empire)?></div></td>
  </tr>
  <tr>
    <td><div align="right">Breasla : </div></td>
    <td><div align="center"><a href="index.php?page=bresla&id=<?=$gid?>"><?=$bresla?></a></div></td>
  </tr>
  <tr>
    <td><div align="right">Putere : </div></td>
    <td><div align="center"><?=$c->st?></div></td>
  </tr>
  <tr>
    <td><div align="right">Dexteritate : </div></td>
    <td><div align="center"><?=$c->dx?></div></td>
  </tr>
  <tr>
    <td><div align="right">Inteligenta : </div></td>
    <td><div align="center"><?=$c->iq?></div></td>
  </tr>
  <tr>
    <td><div align="right">Vitalitate : </div></td>
    <td><div align="center"><?=$c->ht?></div></td>
  </tr>
  <tr>
  <td><div align="right">Stare : </div></td>
    <td><div align="center"><?php  
    if ($exe['total_line'] > 0 ) { 
    echo '<font color="green">Online</font>';
  } else {
    echo '<font color="red">Offline</font>';
  } 
 ?></div></td>
	</tr>
   <tr>
    <td valign="top"><div align="right">Yang : </div></td>
    <td valign="top"><div align="center"><input type="text" disabled value="<?=number_format($c->gold)?>" class="iRg_input"></div></td>
  </tr>
</table>


</fieldset>
<?php } }?>