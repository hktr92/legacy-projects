

<?php



?>



<?php





include('inc/config.inc.php');

if($jd_module > "0")

{

include('inc/daten.php');







JBuyItem();











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



			if($_GET['cat'] != null)



				$data .= '<span  class="'. $class .'"><a href="?page='.$_GET['page'].'&cat='.$_GET['cat'].'&id='.$i.'" onclick="load()">'. $i .'</a></span> ';



			else



				$data .= '<span  class="'. $class .'"><a href="?page='.$_GET['page'].'&id='.$i.'" onclick="load()">'. $i .'</a></span> ';



		}



		



		return $data;



	}







if ((!isset($_GET['id'])) || (!is_numeric($_GET['id'])) || ($_GET['id'] < 1)) { $pagenum = 1; }



	else { $pagenum = $_GET['id']; }



	



	$page_rows = 15;



	



	if (($pagenum > $last) && ($last > 0)) { $pagenum = $last; }



	$max = $pagenum * $page_rows;



	$min = $max - $page_rows;







if(isset($_GET) && ($_GET['cat']!=NULL))







{







	$result = mysql_query("SELECT * FROM ".$web_db.".dev_jd_items WHERE cat_id='".$_GET['cat']."' ORDER BY id DESC");







}







else {







	$result = mysql_query("SELECT * FROM ".$web_db.".dev_jd_items"); 



} 











	$rows = mysql_num_rows($result);



	$last = ceil($rows/$page_rows);







$i = 0;







if(mysql_num_rows($result)=='0')







{







	echo"<br><br><br><br>";







	echo error("Nici un item in aceasta categorie");







}

//// reducere ///

if($reducere > "0")

{

	alert("<blink><font color='yellow'>Toate itemele au o reducere de pret de $reducere%</font></blink>");

}

echo '<table><tr>';

/////////////////////



if(isset($_GET) && ($_GET['cat']!=NULL))







{







	$result2 = mysql_query("select * from ".$web_db.".dev_jd_items WHERE cat_id='".$_GET['cat']."' ORDER BY id DESC limit ".($page_rows * ($pagenum - 1)).", ".$page_rows.""); 



}







else {



$result2 = mysql_query("select * from ".$web_db.".dev_jd_items limit ".($page_rows * ($pagenum - 1)).", ".$page_rows.""); 



} 











while ($getItems = mysql_fetch_object($result2)){







	$in = mysql_fetch_object(mysql_query("Select * from ".$player_db.".item_proto where vnum='".$getItems->vnum."'"));







		$item = romana($in->locale_name);

		





		echo '<td>';







		







		$optiune1= $in->applytype0;







		$optiune2=$in->applytype1;







		$optiune3=$in->applytype2;







		$valoare1= romana($in->applyvalue0);







		$valoare2=romana($in->applyvalue1);







		$valoare3=romana($in->applyvalue2);







		$piatra1=$getItems->socket0;







		$piatra2=$getItems->socket1;







		$piatra3=$getItems->socket2;







		







	?>















<table width="143" border="0" cellspacing="0" cellpadding="0">















      <tr>















        <td height="83" align="center" background="images/bg223.PNG" style="border:1px solid #141112;">







<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">







  <tr>







    <td align="right"><table width="35%" border="0" cellspacing="0" cellpadding="0">







  <tr>







    <td  align="center" bgcolor="#000000">

    <?php

	if(isset($_POST['da']))



{



	$id=replace($_POST['id']);



	mysql_query("Delete from ".$web_db.".dev_jd_items where id='$id'");	



}

?>



 <a href="index.php?page=jitems&buy=<?=$getItems->id;?>" class="link_cat" onclick="buyitem()">Cumpara </a>

</td>







  </tr>







</table>







</td>







  </tr>







  <tr>







    <td align="center"><a class="tip" href="#"  title="

<?php 



$atacx = $in->value3 + $in->value5;

$atacx2 = $in->value4 + $in->value5;

$atacm = $in->value1 + $in->value5;

$atacm2 = $in->value2 + $in->value5;

echo "<div style='margin-top:-28px; margin-left:-40px;'>";

echo "<center><font color='#ffc700'><div class='tada'>$item</div></font><br/><br/>";

if ($in->limitvalue0 > "1" AND $in->type != 18  ){

echo "<div align='center'><font color='#c1c1c1'>De la nivel : $in->limitvalue0</font></div>";

}

if($in->type == "2"){

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

echo "<div align='center'><font color='yellow'>Cantitate : $cantitatex </font></div>";

}

if ($in->type == "16" && $getItems->socket2 > "60")  {

$varr = round($getItems->socket2 / 60);

echo "<div align='center'><font color='orange'>Durata : $varr Ore </font></div>";

}



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

if($piatra2 > 1) {

echo "<table border='0' cellspacing='0' cellpadding='0' style='padding-left:55px;'>

<tr>

<td align='center' width='36' height='36' background='images/pietra.png'><img src='".img_pietre($piatra2)."' width=20 height=20></td>

<td><font color='#c1c1c1'>".pietre_name($piatra2)."</font></td>

</tr></table>

</font>"; } 

if(($piatra3>1	&& ($in->type != 16))){echo "<table border='0' cellspacing='0' cellpadding='0' style='padding-left:55px;'>

<tr>

<td align='center' width='36' height='36' background='images/pietra.png'><img src='".img_pietre($piatra3)."' width=20 height=20></td>

<td><font color='#c1c1c1'>".pietre_name($piatra3)."</font></td>

</tr>

</table>"; }



if($getItems->descriere==NULL){

echo "<center><font color='white'>Descriere</font><br/> <li>Nici o descriere disponibila.</li></center>";}

else {

echo "<center><font color='white'>Descriere</font><br/> 

<table width='245' border='0' cellspacing='0' cellpadding='0' align='center' style='padding-left:25px;'>



<tr> 

<td width='245'>  <font color='white'>$getItems->descriere</font></td>

</tr>

</table></center>";}



if(isset($_SESSION['is_user']) && isset($_SESSION['is_pass']) && $_SESSION['is_admin']>0) 



	{ 

	echo "<br><center><font color='yellow'>Vnum : $getItems->vnum </font></center>";

	}

?> ">

<table width="40" height="90" border="0">

  <tr>

    <td style="max-height:90px; height:90px;">

	

	<?php 

		img_item($getItems->vnum)

	?></td>

  </tr>

</table>





    </div>







    </td>







  </tr>







</table>







<table width="90%" border="0"  cellspacing="0" cellpadding="0">















  <tr>













    <td bgcolor="#000000" class="item_name">

<?php

if  ($getItems->count > "1"  ){

 $cantitatex = $getItems->count;

	 $cantitatex = substr("$cantitatex", 0, 3);

echo "<font color='yellow'>$cantitatex x</font> ";}



?>

<?=$item = (strlen($item) > 13) ? substr($item,0,13).'...' : $item;?>

	</td>















  </tr>















</table>















</td>















      </tr>















      <tr>















        <td height="29" background="images/itmdesc.png" class="coins_cost"



        <?php if($reducere >"0"){ ?>



         title="Pret normal <?=$getItems->pret;?> monezi "



         <?php }



		  ?>



         >



         Cost : <?php



		$pretn = ($reducere/100)*$getItems->pret;



		$pretf = $getItems->pret-$pretn;



		echo round($pretf);		?> JD 







        </td>















      </tr>















    </table>







</td>







<?php 







echo '</td>';







$rows = mysql_num_rows($result);







while($i++ % 4 == 2)







echo '</tr><tr>';







}







echo '</tr></table>';





	echo "<br /><center><font class='pagination'><b>&lt; Pagina : ";



	echo generatePages($last, $pagenum, "pagination");



	echo "&gt;<br /><br /></b></font></center>";







?>







<?php } else { alert('Imi pare rau dar acest modul este dezactivat'); } ?>



	



