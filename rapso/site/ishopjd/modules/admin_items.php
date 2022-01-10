 <?php 

 require('inc/config.inc.php');

 if($aasdas == "814#911!21$2") {

 if(isset($_SESSION['is_user']) && isset($_SESSION['is_pass']) && $_SESSION['is_admin']>0) 



	{ ?><script type="text/javascript">



<!--



    function toggle_visibility(id) {



       var e = document.getElementById(id);



       if(e.style.display == 'block')



          e.style.display = 'none';



       else



          e.style.display = 'block';



    }



//-->



</script>

<style>

#tabel

{

border:1px dotted black;

background-color: #211511;

}

</style>

<?php



if(isset($_POST['new_pret']))



{



	$id = replace($_POST['id']);

	$lp = mysql_query("Select pret from ".$web_db.".dev_jd_items where id='$id'");

	$last = mysql_fetch_object($lp);

	$last_price = $last->pret;

	$pret = $_POST['pret'];



	if($pret!=NULL)



	{



		mysql_query("Update ".$web_db.".dev_jd_items set pret='$pret',last_price='$last_price' where id='$id'") or die(mysql_error());	



	}



}



if(isset($_POST['da']))



{



	$id=replace($_POST['id']);



	mysql_query("Delete from ".$web_db.".dev_jd_items where id='$id'");	



}



?>



<div  class="roundbox"><h4><center>Lista iteme disponibile in itemshop :</h4></center></div>







<table width="100%"  border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px dotted #963; padding-top:15px;">



  <tr class="header">



    <td width="20%" class="tabel3">ID</td>



    <td width="60%" class="tabel3">Nume</td>



    <td width="20%" class="tabel3">Pret</td>

    <td width="20%" class="tabel3">&nbsp;</td>

    <td width="20%" class="tabel3">&nbsp;</td>

  </tr><?php

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



	$result = mysql_query("Select * from ".$web_db.".dev_jd_items");



	if (($pagenum > $last) && ($last > 0)) { $pagenum = $last; }



	$max = $pagenum * $page_rows;



	$min = $max - $page_rows;

	$rows = mysql_num_rows($result);



	$last = ceil($rows/$page_rows);







$i = 0;

  include('inc/daten.php');

  $query = mysql_query("Select * from ".$web_db.".dev_jd_items  ORDER BY id DESC limit ".($page_rows * ($pagenum - 1)).", ".$page_rows."");

//////////////////////////



///////////////////////////////



while($item = mysql_fetch_object($query))



{



	$nr++;



	$in = mysql_fetch_object(mysql_query("Select * from ".$player_db.".item_proto where vnum='".$item->vnum."'"));

$cat = mysql_fetch_object(mysql_query("Select * from ".$web_db.".dev_jd_cat where id='$item->cat_id'"));

	$categorie =  $cat->titlu;

		$item_name = $in->locale_name;



		$optiune1=$in->applytype0;



		$optiune2=$in->applytype1;



		$optiune3=$in->applytype2;



		$valoare1=$in->applyvalue0;



		$valoare2=$in->applyvalue1;



		$valoare3=$in->applyvalue2;



		$piatra1=$item->socket0;



		$piatra2=$item->socket1;



		$piatra3=$item->socket2;



?>



 <div id="smart-paginator">

  



  <tr>



    <td class="tabel5"><?=$item->id?>. </td>



    <td class="tabel5">



    <a class="tip link_cat" href="#"  title="

    <?php 

$atacx = $in->value3 + $in->value5;

$atacx2 = $in->value4 + $in->value5;

$atacm = $in->value1 + $in->value5;

$atacm2 = $in->value2 + $in->value5;

echo "<div style='margin-top:-28px; margin-left:-40px;'>";

$item_namez = romana($item_name);

echo "<center><font color='#ffc700'><div class='tada'>$item_namez</div></font><br/><br/>";

if ($in->limitvalue0 > "1" AND $in->type != 18  ){

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

if(($piatra3>1	&& ($in->type != 16))) {echo "<table border='0' cellspacing='0' cellpadding='0' style='padding-left:55px;'>

<tr>

<td align='center' width='36' height='36' background='images/pietra.png'><img src='".img_pietre($piatra3)."' width=20 height=20></td>

<td><font color='#c1c1c1'>".pietre_name($piatra3)."</font></td>

</tr>

</table>"; }



if($item->descriere==NULL){

echo "<center><font color='white'>Descriere</font><br/> <li>Nici o descriere disponibila.</li></center>";}

else {

echo "<center><font color='white'>Descriere</font><br/> 

<table width='245' border='0' cellspacing='0' cellpadding='0' align='center' style='padding-left:25px;'>

<tr> 

   <td width='245'>  <font color='white'>$item->descriere</font></td>

</tr>

</table></center>";}?>

    "><?=$categorie;echo '';?>

    

    <? $test = romana($item_name);

	 $test = substr("$test", 0, 13);

	echo "$test";?>

    

	

	</a></td>



    <td class="tabel5"><?=$item->pret?> jetoane </td>



    <td>



    



    <table border="0" width="100%" cellspacing="0" cellpadding="0">



  <tr>



    <td width="49%"class="tabel5"> <a href="#" onclick="toggle_visibility('foo<?=$nr?>');">Edit</a></td>

    <td width="51%" class="tabel5"><div id="foo<?=$nr?>" style='display:none;'>

    <form action="" method="post"><br />

<table width="140" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td width="50" class="tabel5" class="tabelx">Pret :</td>

    <td width="35" class="tabel5" class="tabelx">

    <input type="hidden" name='id' value="<?=$item->id?>" />

    <input name="pret" type="text" size="5" maxlength="5" class="field" /></td>

    <td width="55" class="tabel5"><input name="new_pret" type="submit" value="update"  class="field"/></td>

 </tr>

</table>



</form>

</td>

</div>



  </tr>



</table>

</td>

 <td class="tabel5"><a href="#" onclick="toggle_visibility('sterge<?=$nr?>');">Sterge</a>

 <div id="sterge<?=$nr?>" style='display:none;'>



Sigur stergi ?



<form action="" method="POST" class="tabel3">



<input type="hidden" name='id' value="<?=$item->id?>" />



<input type="submit" name="da" value="Da" class="field" />



<input type="submit" name="nu" value="Nu" class="field" />



</form>



</div>

</td>



  </tr>

  </div>













<?php }



	echo "</table><br /><center>";



	echo generatePages($last, $pagenum, "field");



	echo "<br /><br /></center>";

} else { echo error("Acces insuficient pentru aceasta zona.");} } ?>

