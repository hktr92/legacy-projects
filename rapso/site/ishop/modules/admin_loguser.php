<?php require('inc/config.inc.php');?>

<?php if ($aasdas == "814#911!21$2") { ?>

 <?php  if(isset($_SESSION['is_user']) && isset($_SESSION['is_pass']) && $_SESSION['is_admin']>0)



	{ ?><div  class="roundbox"><h4><center>Jurnalul obiectelor achizitionate de catre jucatori :</center></h4></div>

  

    <table width="109%" border="0" cellspacing="0" cellpadding="0" style="padding-top:15px;">

<tr>

<td width="33%" class="tabel4">Ora & Data</td>

<td width="67%" class="tabel4">Obiectul si pretul</td>

</tr>

</table>



<?php

 include('inc/daten.php');

 function generatePages($max, $page, $class)



	{



		if ($max>=10)



		{



			if (($page>4) && ($page<$max-3))



			{



				for ($i = 1; $i <= 3; $i++)



				{



					$data .= showPage($i,$page,$class);



				}



				$data .= '<span class="'. $class .'">...</span> ';



				for ($i = $page-1; $i <= $page+1; $i++)



				{



					$data .= showPage($i,$page,$class);



				}



				$data .= '<span class="'. $class .'">...</span> ';



				for ($i = $max-2; $i <= $max; $i++)



				{



					$data .= showPage($i,$page,$class);



				}



			}



			else



			{



				for ($i = 1; $i <= 5; $i++)



				{



					$data .= showPage($i,$page,$class);



				}



				$data .= '<span class="'. $class .'">...</span> ';



				for ($i = $max-5+1; $i <= $max; $i++)



				{



					$data .= showPage($i,$page,$class);



				}



			}



		}



		else



		{

			$max = (10 >= $max) ? $max : 10;

			for ($i = 1; $i <= $max; $i++)

			{



				$data .= showPage($i,$page,$class);

			}



		}



		return $data;



	}



		



	/**



	 * Page Style Generator .



	 * 



	 * @param int $i



	 * @param int $page



	 * @param string $class



	 * @param string $selected



	 */



	function showPage($i, $page, $class, $selected = 'boxSelected')



	{



		if ($page==$i)



		{



			$data .= '<span class="'. $selected .'">'. $i .'</span> ';



		}



		else



		{



			global $name;

			$data .= '<span  class="'. $class .'"><a href="?page='.$_GET['page'].'&id='.$i.'" onclick="load()">'. $i .'</a></span> ';



		}



		



		return $data;



	}

	if ((!isset($_GET['id'])) || (!is_numeric($_GET['id'])) || ($_GET['id'] < 1)) { $pagenum = 1; }



	else { $pagenum = $_GET['id']; }



	



	$page_rows = 20;



	$result = mysql_query("Select * from ".$web_db.".dev_is_logs");



	if (($pagenum > $last) && ($last > 0)) { $pagenum = $last; }



	$max = $pagenum * $page_rows;



	$min = $max - $page_rows;

	$rows = mysql_num_rows($result);



	$last = ceil($rows/$page_rows);







$i = 0;

$lg = mysql_query("Select * from ".$web_db.".dev_is_logs ORDER BY id DESC limit ".($page_rows * ($pagenum - 1)).", ".$page_rows."") or die(mysql_error());

while($log = mysql_fetch_object($lg))

{

	$owner = mysql_fetch_object(mysql_query("Select * from account where id='$log->owner_id'"));

	$item = mysql_fetch_object(mysql_query("Select * from ".$player_db.".item_proto where vnum='$log->vnum'"));

		$item_name = $item->locale_name;

		$porco = mysql_query("Select * from ".$player_db.".item where id='$log->item_id'");

		$getItems = mysql_fetch_object($porco);

		

		$optiune1=$item->applytype0;

		$optiune2=$item->applytype1;

		$optiune3=$item->applytype2;

		$valoare1=$item->applyvalue0;

		$valoare2=$item->applyvalue1;

		$valoare3=$item->applyvalue2;

		$piatra1=$getItems->socket0;

		$piatra2=$getItems->socket1;

		$piatra3=$getItems->socket2;

?>

<table width="109%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td width="33%" class="tabel5"><?=$log->timp;?></td>

    <td width="67%" class="tabel5"><b>

	<a class="tip link_cat" href="#"  title="

    <?php

	echo "<div style='margin-top:-28px; margin-left:-40px;'>";

	echo "<center><font color='#ffc700'><div class='tada'>$owner->login [$owner->coins MD]</div></font><br/><br/>";

	$mch = mysql_query("Select * from ".$player_db.".player where account_id='$log->owner_id'");

	while($ch = mysql_fetch_object($mch))

	{

		

		echo "&raquo;<font color='#c1c1c1'> ".$ch->name."<br>";

	}

	?>

    </font></div></div>

    ">

	<?=$owner->login;?>

    </a>

    

    </b> a cumparat <a class="tip link_cat" href="#"  title="

    

    <?php 

$atacx = $in->value3 + $in->value5;

$atacx2 = $in->value4 + $in->value5;

$atacm = $in->value1 + $in->value5;

$atacm2 = $in->value2 + $in->value5;

echo "<div style='margin-top:-28px; margin-left:-40px;'>";

$item_namez = romana($item_name);

echo "<center><font color='#ffc700'><div class='tada'>$item_namez</div></font><br/><br/>";

echo "<div align='center'>".img_item($item->vnum)."</div><br/>";

if ($in->limitvalue0 > "1"  ){

echo "<div align='center'><font color='#c1c1c1'>De la nivel : $in->limitvalue0</font></div>";

}

if ($in->type == 2  ){

$armura = $in->magic_pct + $in->value3 + $in->value5 + $in->value1;

echo "<div align='center'><font color='#c1c1c1'>Armura  : $armura </font></div>";

}

if ($in->value3 AND $in->value4 > 0  ){

echo "<div align='center'><font color='#c1c1c1'>Atac : $atacx - $atacx2</font></div>";

}

if ($in->value1 AND $in->value2 > 0  ){

echo "<div align='center'><font color='#c1c1c1'>Atac magic : $atacm - $atacm2</font></div>";

}

if  ($getItems->count > "1"  ){

 $cantitatex = $getItems->count;

	 $cantitatex = substr("$cantitatex", 1, 3);

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

if($piatra2 > 1){

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

?>

    

    ">

  

	<?php 

	   $item_namez = romana($item->locale_name);

		  $item_namez = substr("$item_namez", 0, 13);

	echo $item_namez;?> cu <?php 

	$pret = $log->pret;

	if ($pret >= "$val_max")  {

	echo "<font color='yellow'>$pret </font>";

	}

	else {

	echo $pret;

	};

	?> MD. </td>

 

  </tr>

</table>





<?php 



}



	echo "<br /><center>";



	echo generatePages($last, $pagenum, "field");



	echo "<br /><br /></center>";





 } else { echo error("Acces insuficient pentru aceasta zona.");} }?>