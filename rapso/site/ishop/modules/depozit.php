

<?php include('inc/daten.php'); ?>



<table width="360" border="0" cellspacing="3" cellpadding="3" align="center">

  <tr>

    <td style="border-bottom:1px dotted #633b15;"><strong><div  class="roundbox"><h4><center>Depozit itemshop</center></h4></div></strong></td>

  </tr>

</table>

<table width="360" border="0" cellspacing="0" cellpadding="0" align="center">

  <tr>

    <td height="456" background="images/depo.png" valign="top">



		<?php

	require('inc/config.inc.php');

 if($aasdas == "814#911!21$2") {

	$querys = mysql_query("Select id from ".$account_db.".account where login='".$_SESSION['is_user']."'");

	$q = mysql_fetch_object($querys);

$result = mysql_query("Select * from ".$player_db.".item where owner_id='".$q->id."' AND window='MALL'");

echo '<table><tr>';

while ($getItems = mysql_fetch_object($result)){

	$in = mysql_fetch_object(mysql_query("Select * from ".$player_db.".item_proto where vnum='".$getItems->vnum."'"));

		$item = romana($in->locale_name);

		echo '<td align="center">';

		$optiune1=$in->applytype0;

		$optiune2=$in->applytype1;

		$optiune3=$in->applytype2;

		$valoare1= romana($in->applyvalue0);

		$valoare2= romana($in->applyvalue1);

		$valoare3= romana($in->applyvalue2);

		$piatra1=$getItems->socket0;

		$piatra2=$getItems->socket1;

		$piatra3=$getItems->socket2;?>

<table width="40" border="0" cellpadding="0" cellspacing="0">

  <tr>

    <td height="71" align="center"><a class="tip" href="#" title="

    <?php 

$atacx = $in->value3 + $in->value5;

$atacx2 = $in->value4 + $in->value5;

$atacm = $in->value1 + $in->value5;

$atacm2 = $in->value2 + $in->value5;

echo "<div style='margin-top:-28px; margin-left:-40px;'>";

echo "<center><font color='#ffc700'><div class='tada'>$item</div></font><br/><br/>";

if ($in->limitvalue0 > "1"  ){

echo "<div align='center'><font color='#c1c1c1'>De la nivel : $in->limitvalue0</font></div>";

}

if ($in->type == 2  ){

$armura = $in->magic_pct + $in->value3 + $in->value5 + $in->value1;

echo "<div align='center'><font color='#c1c1c1'>Armura  : $armura </font></div>";

}

if ($in->value3 AND $in->value4 > "0"  AND $in->type != 18){

echo "<div align='center'><font color='#c1c1c1'>Atac : $atacx - $atacx2</font></div>";

}

if ($in->value1 AND $in->value2 > "0"  AND $in->type != 18){

echo "<div align='center'><font color='#c1c1c1'>Atac magic : $atacm - $atacm2</font></div>";

}

if  ($getItems->count > "1"  ){

 $cantitatex = $getItems->count;

	 $cantitatex = substr("$cantitatex", 0, 3);

echo "<div align='center'><font color='yellow'>Cantitate : $cantitatex </font></div>";}

echo "<font color='azzurro'>";

if ($optiune1!=""){

bonus_name($optiune1,$valoare1);

echo "<br/>";}

if ($optiune2!="") {

bonus_name($optiune2,$valoare2);

echo "<br/>"; }

if ($optiune3!=""){

bonus_name($optiune3,$valoare3);

echo "</font>";}

///



if(empty($getItems->attrtype0)){

$nr0 = "0";

} else {$nr0 = "1";}

if(empty($getItems->attrtype1)){

$nr1 = "0";

} else {$nr1 = "1";}

if(empty($getItems->attrtype2)){

$nr2 = "0";

} else {$nr2 = "1";}

if(empty($getItems->attrtype3)){

$nr3 = "0";

} else {$nr3 = "1";}

if(empty($getItems->attrtype4)){

$nr4 = "0";

} else {$nr4 = "1";}

if(empty($getItems->attrtype5)){

$nr5 = "0";

} else {$nr5 = "1";}

if(empty($getItems->attrtype6)){

$nr6 = "0";

} else {$nr6 = "1";}

$total = $nr0 + $nr1 + $nr2 + $nr3 + $nr4 + $nr5 + $nr6;



for($b=0;$b<$total;$b++) {

echo "<font color='#b0dfb4'>";

if($b==0) { $akBoni = $getItems->attrtype0; $akWert = $getItems->attrvalue0; }

if($b==1) { $akBoni = $getItems->attrtype1; $akWert = $getItems->attrvalue1; }

if($b==2) { $akBoni = $getItems->attrtype2; $akWert = $getItems->attrvalue2; }

if($b==3) { $akBoni = $getItems->attrtype3; $akWert = $getItems->attrvalue3; }

if($b==4) { $akBoni = $getItems->attrtype4; $akWert = $getItems->attrvalue4; }

if($b==5) { $akBoni = $getItems->attrtype5; $akWert = $getItems->attrvalue5; }

if($b==6) { $akBoni = $getItems->attrtype6; $akWert = $getItems->attrvalue6; }

echo'#'.($b+1).'&nbsp;';

if(isset($itemBoni[$akBoni])) {

echo $itemBoni[$akBoni];}

else {

echo $akBoni;}

echo':&nbsp;'.$akWert;

echo'<br/></font>';}

///

if($piatra1>1){

echo "<font color='red'></center>

<table border='0' cellspacing='0' cellpadding='0' style='padding-left:55px;'>

<tr>

<td align='center' width='36' height='36' background='images/pietra.png'><img src='".img_pietre($piatra1)."' width=20 height=20></td>

<td><font color='#c1c1c1'>".pietre_name($piatra1)."</font></td>

</tr>

</table>"; }

if(($piatra2 > 1) && ($in->type != 16)) {

echo "<table border='0' cellspacing='0' cellpadding='0' style='padding-left:55px;'>

<tr>

<td align='center' width='36' height='36' background='images/pietra.png'><img src='".img_pietre($piatra2)."' width=20 height=20></td>

<td><font color='#c1c1c1'>".pietre_name($piatra2)."</font></td>

</tr></table>

</font>"; } 

if($piatra3>1){echo "<table border='0' cellspacing='0' cellpadding='0' style='padding-left:55px;'>

<tr>

<td align='center' width='36' height='36' background='images/pietra.png'><img src='".img_pietre($piatra3)."' width=20 height=20></td>

<td><font color='#c1c1c1'>".pietre_name($piatra3)."</font></td>

</tr>

</table>"; }

echo'<br/>';?>"><?php img_item($getItems->vnum)?></a>

    </td>

  </tr>

</table>

</td>

<?php 

echo '</td>';

$rows = mysql_num_rows($result);

while($i++ % 9 == 7)

echo '</tr><tr>';

}

echo '</tr></table>';  }?>



	</td>

  </tr>

</table>





