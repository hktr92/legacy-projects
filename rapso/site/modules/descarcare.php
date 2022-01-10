<h4>DESCARCARE : </h4>
<table width="100%" border="0">
  <?php 
  	$d = mysql_query("Select * from web.dev_descarcari order by data");
	while($dw = mysql_fetch_object($d))
	{
		
  ?>
  <tr class="top">
    <td width="26%" class="iR_stats_reset">[<?=$dw->tip?>] <?=$dw->nume?></td>
    <td width="33%" class="iR_stats_reset"><?=$dw->data?></td>
    <td width="23%" class="iR_stats_reset"><?=$dw->marime?> MB</td>
    <td width="18%" class="collect"><a target="_blank" href="http://<?=$dw->link?>"><font color="white">DESCARC&Atilde;</font></a></td>
  </tr>
  <?php } ?>

<p></p>
  </table>

<table width="421" border="0"  class="mini_top">
<h4>  CERINTE MINIME DE SISTEM</h4>
<tbody>
<tr>
<td width="158" >OS</td>
<td width="288" >- Win XP, Win 2000, Win Vista, Win 7</td>
</tr>
<tr>
<td >CPU</td>
<td width="288" >- Pentium 3 1GHz</td>
</tr>
<tr>
<td >Memorie</td>
<td width="288" >- 512M</td>
</tr>
<tr>
<td >Hard Drive</td>
<td width="288" >- 1 GB</td>
</tr>
<tr>
<td >Placa grafica de memorie</td>
<td width="288" >- Placa grafica de baza cu minim 32MB RAM</td>
</tr>
<tr>
<td >Placa de sunet</td>
<td width="288" >- Support DirectX 9.0</td>
</tr>
<tr>
<td >Mouse</td>
<td width="288" >- Mouse compatibil cu Windows-ul</td>
</tbody>
</table>
