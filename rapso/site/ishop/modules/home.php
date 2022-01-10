

<?php

require('inc/config.inc.php');

if ($aasdas == "814#911!21$2") {



if($reducere > "1")

{

alert("<blink><font color='yellow'>Toate itemele au o reducere de pret de $reducere%</font></blink>");

 

}



if(isset($_SESSION['is_user']) && isset($_SESSION['is_pass']))



	{

		$is_user = $_SESSION['is_user']; 

		$acc = mysql_fetch_object(mysql_query("Select * from ".$account_db.".account where login='$is_user'"));

?>



Bun venit , <?=$is_user?>.Ai in total <?=$acc->coins?> monezi.Alege o categorie pentru a incepe cumparaturile.<?php } ?>



<br /><br />

<?php 

$ene = mysql_query("Select * from ".$web_db.".dev_is_news");

while($news = mysql_fetch_object($ene))

{

$con = $news->continut;

$plm = unentities($con);



?>	



<br />



<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td><b><?=$news->titlu?></b></td>

  </tr>

  <tr>

    <td><?=$plm?></td>

  </tr>

  <tr>

    <td style="border-bottom:1px dotted #963;"><i><?=$news->data?></i></td>

  </tr>

</table>



<?php  }}?>