<h4>Metin2Rapsodia - DETALII BREASLA</h4><?php
if(isset($_GET['id'])){
$gID = replace($_GET['id']);
$gN = mysql_query("Select * from player.guild where id='$gID'");
if(mysql_num_rows($gN)!=NULL && is_numeric($_GET['id']))
{
	$b = mysql_fetch_object($gN);
	$liderr =  mysql_fetch_object(mysql_query("Select * from player.player where id='$b->master'"));
	$lider = $liderr->name;
?>
<fieldset class="is_cats" style="width:250px; "><legend class="top">Nume Breasla :: <?=$b->name?> </legend>
<table width="100%"  border="0">
  <tr>
    <td width="40%"><div align="right">Lider : </div></td>
    <td width="60%">
    <div align="center"><?=$lider?></div></td>
  </tr>
  <tr>
    <td><div align="right">Puncte : </div></td>
    <td><div align="center"><?=$b->ladder_point?></div></td>
  </tr>
  <tr>
    <td><div align="right">Experienta : </div></td>
    <td><div align="center"><?=$b->exp?></div></td>
  </tr>
  <tr>
    <td><div align="right">Level : </div></td>
    <td><div align="center"><?=$b->level?></div></td>
  </tr>
   <tr>
    <td><div align="right">Victorii : </div></td>
    <td><div align="center"><?=$b->win?></div></td>
  </tr>
  <tr>
    <td><div align="right">Infrangeri : </div></td>
    <td><div align="center"><?=$b->loss?></div></td>
  </tr>
  <tr>
    <td><div align="right">Egaluri : </div></td>
    <td><div align="center"><?=$b->draw?></div></td>
  </tr>
</table>

</fieldset><Br>
<fieldset class="is_cats" style="width:250px; "><legend class="top">Membrii Breasla</legend>

<?php $gP = mysql_query("Select * from player.guild_member where guild_id='$b->id'");
while($m = mysql_fetch_object($gP))
{
	$gpN = mysql_fetch_object(mysql_query("Select * from player.player where id='$m->pid' order by level desc"));
?>
<a href="index.php?page=jucator&id=<?=$gpN->id?>"><?=$gpN->name?> :: <?=$gpN->level?> </a> <br>
<?php } ?> 
</select>

</fieldset>
<?php } }?>