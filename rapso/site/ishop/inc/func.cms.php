<?php

require("config.inc.php");

/*$domain = $_SERVER['SERVER_NAME'];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://darkdev.eu/licenta.php");

curl_setopt($ch, CURLOPT_HEADER, false);

curl_setopt($ch, CURLOPT_POST, true);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_POSTFIELDS, array(

    'id' => '3',

	'ip' => ''.$server.'',

	'domain' => ''.$domain.'',

	'user_key' => '3', 

    'submit' => 'Send' 

));*/

$result = "";


if(empty($result)){







///////////////////////////////////////////////////////

?>

<?php







error_reporting(0);



function error($text)



{



	echo "<center>



<div class='dev_warning'>



		".$text."



	</div></center>";	



}



function success($text)



{



	echo "<center>



<div class='dev_succes'>



		".$text."



	</div></center>";	



}



function alert($text)



{



	echo "<center>



<div class='dev_alert'>



		".$text."



	</div></center>";	



}



function Login()



{



		if(isset($_POST['logina']))



	{



		$user = replace($_POST['user']);



		$pass = replace($_POST['pass']);



		if(($user != NULL)&&($pass !=NULL))



		{



			$m2q = mysql_query("Select * from ".$account_db.".account where login='$user' and password=PASSWORD('".$pass."')");



			if(mysql_num_rows($m2q) >= 1)



			{



				$is = mysql_fetch_object($m2q);



				$_SESSION['is_admin'] = $is->web_admin;



				$_SESSION['is_user'] = $user;



				$_SESSION['is_pass'] = $pass;



				



				header("Location:index.php");



			}



			else



			{



				echo "Account sau parola gresita!";



			}



		} else { echo "Ambele campuri sunt obligatorii!"; } 



	}	



}



function LoadContent()



{







	if(isset($_GET['page']))



	{



		$page = replace($_GET['page']);



		if(!isset($_SESSION['is_user']) && !isset($_SESSION['is_pass']))



	{



		$page = 'home';



			require("modules/".$page.".php");



	}



	else {



		require("modules/".$page.".php");



	}



		if(!file_exists("modules/".$page.".php"))



		{



			$error=1;



			echo error("Modul inexistent!");



			echo '<meta http-equiv="refresh" content="2;url=index.php">';



		}



	}



	else



	{



		if($page == NULL)



		{



			$page = 'home';



			include("modules/".$page.".php");



		}



	



	}



}



//////////////////////////////////////////////////////////



function BuyItem()



{

include('config.inc.php');

	if(isset($_SESSION['is_user']) && isset($_SESSION['is_pass']))

	{

	if(isset($_GET) && ($_GET['buy']!=NULL))

	{

		$getbuy = replace($_GET['buy']);

		$m2user = mysql_fetch_object(mysql_query("Select * from ".$account_db.".account where login='".$_SESSION['is_user']."'"));

		$m2engine2 = mysql_query("Select * from ".$web_db.".dev_is_items where id='".$getbuy."'");

$luamid=mysql_query("select * from player.item where id=(SELECT MAX(id) FROM player.item)");

		$idul = mysql_fetch_array($luamid);

		$item_id_final=$idul['id']+1;

		if(mysql_num_rows($m2engine2)!=NULL)

		{

			$owner_id = $m2user->id;

			$monezi_actuale = $m2user->coins;

			$jetoane_actuale = $m2user->jcoins;

			$m2engine = mysql_fetch_object($m2engine2);

			$preta = $m2engine->pret;

			$pretf = ($reducere/100)*$preta;

			$pretrr = $preta-$pretf;

			$pret=round($pretrr);

			

			$new_coins = $monezi_actuale - $pret;

			$new_jcoins = $jetoane_actuale + $pret;

			$m2pos = mysql_query("Select * from ".$player_db.".item where owner_id='$owner_id' and window='MALL' order by pos desc limit 0,1") or die(mysql_error());



			$positione = mysql_fetch_object($m2pos);



			$posact = $positione->pos;



			$error=0;



			if($posact < 48 )



			{



				$posact=$posact+1;

				if($posact=='0')

					{

						$posact++;

					}



			}



			else



			{

				$error=1;

					 echo alert("Imi pare rau dar depozitul dumneavoastra este plin.");

				

			}

			if($monezi_actuale < $pret)

			{

				$error=1;

				echo error("Nu ai suficente monezi pentru a putea cumpara itemul.");

				echo "<meta HTTP-EQUIV='REFRESH' content='0; url=index.php'>";	

			}

			else { 

			if($error!=1)

			{

			mysql_query("Update ".$account_db.".account set coins='$new_coins' where id='$owner_id'");

				if($jd_module > "0")

				{

				mysql_query("Update ".$account_db.".account set jcoins='$new_jcoins' where id='$owner_id'");

				}

			$count = $m2engine->count;

			if(empty($count)){

			$count = 1;

			}

			mysql_query("INSERT INTO ".$player_db.".item 

				(owner_id,window,pos,count,vnum,attrtype0, attrvalue0, attrtype1, attrvalue1, attrtype2, attrvalue2, attrtype3, attrvalue3, attrtype4, attrvalue4, attrtype5, attrvalue5, attrtype6, attrvalue6, socket0, socket1, socket2)

				VALUES 

				('".mysql_real_escape_string($owner_id)."','MALL','".$posact."','".$count."','".$m2engine->vnum."','".$m2engine->attrtype0."', '".$m2engine->attrvalue0."', '".$m2engine->attrtype1."', '".$m2engine->attrvalue1."', '".$m2engine->attrtype2."', '".$m2engine->attrvalue2."', '".$m2engine->attrtype3."', '".$m2engine->attrvalue3."', '".$m2engine->attrtype4."', '".$m2engine->attrvalue4."', '".$m2engine->attrtype5."', '".$m2engine->attrvalue5."', '".$m2engine->attrtype6."', '".$m2engine->attrvalue6."', '".$m2engine->socket0."', '".$m2engine->socket1."', '".$m2engine->socket2."')");

////////////LOG////////////////

$luamid=mysql_query("select * from ".$player_db.".item where id=(SELECT MAX(id) FROM player.item)");

			$idul = mysql_fetch_array($luamid);

			$item_id_final=$idul['id']+1;

$today = date("H:i:s d/m/Y"); 

	mysql_query("Insert into ".$web_db.".dev_is_logs

		(owner_id,item_id,vnum,pret,timp) values 

		('$owner_id','$item_id_final','$m2engine->vnum','$pret','$today')

		") or die(mysql_error());

		

		///////////////////////////////

		







echo "<center>



<div class='dev_succes'>



		Item cumparat cu succes si adaugat pe pozitia $posact.Verificati depozit itemshop.



	</div></center>



";



echo "



<meta HTTP-EQUIV='REFRESH' content='0; url=index.php?page=depozit'>";



			



			 } }



		}



	}



	} else { echo "Zona restrictionata"; } 



}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



function JBuyItem()



{

include('config.inc.php');

	if(isset($_SESSION['is_user']) && isset($_SESSION['is_pass']))

	{

	if(isset($_GET) && ($_GET['buy']!=NULL))

	{

		$getbuy = replace($_GET['buy']);

		$m2user = mysql_fetch_object(mysql_query("Select * from ".$account_db.".account where login='".$_SESSION['is_user']."'"));

		$m2engine2 = mysql_query("Select * from ".$web_db.".dev_jd_items where id='".$getbuy."'");

$luamid=mysql_query("select * from ".$player_db.".item where id=(SELECT MAX(id) FROM player.item)");

		$idul = mysql_fetch_array($luamid);

		$item_id_final=$idul['id']+1;

		if(mysql_num_rows($m2engine2)!=NULL)

		{

			$owner_id = $m2user->id;

			$monezi_actuale = $m2user->coins;

			$jetoane_actuale = $m2user->jcoins;

			$m2engine = mysql_fetch_object($m2engine2);

			$preta = $m2engine->pret;

			$pretf = ($reducere/100)*$preta;

			$pretrr = $preta-$pretf;

			$pret=round($pretrr);

			

			//$new_coins = $monezi_actuale - $pret;

			$new_jcoins = $jetoane_actuale - $pret;

			$m2pos = mysql_query("Select * from ".$player_db.".item where owner_id='$owner_id' and window='MALL' order by pos desc limit 0,1") or die(mysql_error());



			$positione = mysql_fetch_object($m2pos);



			$posact = $positione->pos;



			$error=0;



			if($posact < 48 )



			{



				$posact=$posact+1;

				if($posact=='0')

					{

						$posact++;

					}



			}



			else



			{

				$error=1;

					 echo alert("Imi pare rau dar depozitul dumneavoastra este plin.");

				

			}

			if($jetoane_actuale < $pret)

			{

				$error=1;

				echo error("Nu ai suficente jetoane pentru a putea cumpara itemul.");

				echo "<meta HTTP-EQUIV='REFRESH' content='0; url=index.php'>";	

			}

			else { 

			if($error!=1)

			{

			//mysql_query("Update ".$account_db.".account set coins='$new_coins' where id='$owner_id'");

			mysql_query("Update ".$account_db.".account set jcoins='$new_jcoins' where id='$owner_id'");

			$count = $m2engine->count;

			if(empty($count)){

			$count = 1;

			}

			mysql_query("INSERT INTO ".$player_db.".item 

				(owner_id,window,pos,count,vnum,attrtype0, attrvalue0, attrtype1, attrvalue1, attrtype2, attrvalue2, attrtype3, attrvalue3, attrtype4, attrvalue4, attrtype5, attrvalue5, attrtype6, attrvalue6, socket0, socket1, socket2)

				VALUES 

				('".mysql_real_escape_string($owner_id)."','MALL','".$posact."','".$count."','".$m2engine->vnum."','".$m2engine->attrtype0."', '".$m2engine->attrvalue0."', '".$m2engine->attrtype1."', '".$m2engine->attrvalue1."', '".$m2engine->attrtype2."', '".$m2engine->attrvalue2."', '".$m2engine->attrtype3."', '".$m2engine->attrvalue3."', '".$m2engine->attrtype4."', '".$m2engine->attrvalue4."', '".$m2engine->attrtype5."', '".$m2engine->attrvalue5."', '".$m2engine->attrtype6."', '".$m2engine->attrvalue6."', '".$m2engine->socket0."', '".$m2engine->socket1."', '".$m2engine->socket2."')");

////////////LOG////////////////

$luamid=mysql_query("select * from ".$player_db.".item where id=(SELECT MAX(id) FROM player.item)");

			$idul = mysql_fetch_array($luamid);

			$item_id_final=$idul['id']+1;

$today = date("H:i:s d/m/Y"); 

	mysql_query("Insert into ".$web_db.".dev_is_logs

		(owner_id,item_id,vnum,pret,timp) values 

		('$owner_id','$item_id_final','$m2engine->vnum','$pret','$today')

		") or die(mysql_error());

		

		///////////////////////////////

		







echo "<center>



<div class='dev_succes'>



		Item cumparat cu succes si adaugat pe pozitia $posact.Verificati depozit itemshop.



	</div></center>



";



echo "



<meta HTTP-EQUIV='REFRESH' content='0; url=index.php?page=depozit'>";



			



			 } }



		}



	}



	} else { echo "Zona restrictionata"; } 



}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



function img_item($item){	

	
require("inc/config.inc.php");

	$q = mysql_query("Select img_status FROM ".$web_db.".dev_is_items where vnum='$item'");

	$it = mysql_fetch_object($q);

	$itemalin = mysql_fetch_row(mysql_query("SELECT imagine from  ".$web_db.".dev_is_items where vnum='$item'"));

	if ($it->img_status > "0") {

		echo "<img src='images/item/$itemalin[0].png'>";

	}

else {



	

	if (strlen($item) == 1){



	$immagine_item = "images/item/0000".$item.".png";



	}



	if(strlen($item) == 2){



	$immagine_item = "images/item/000".substr($item, 0, 1)."0.png";



    }



	if(strlen($item) == 3){



	$immagine_item = "images/item/00".substr($item, 0, 2)."0.png";



	}



	if(strlen($item) == 4){   



	$immagine_item = "images/item/0".substr($item, 0, 3)."0.png";



	}



	if(strlen($item) == 5){



	$immagine_item = "images/item/".substr($item, 0, 4)."0.png";





	}



	if(strlen($item) == 6){



	$immagine_item = "images/item/".substr($item, 0, 5)."0.png";



	}



	if(strlen($item) == 0){



	$immagine_item = "images/item/error.png";



	}

	



	echo "<div align='center'><img src='$immagine_item' border='0px' alt='' align='center'  style='max-height:90px;'></div>";



	}

	}

function optiuni_item_log($vnum)

{

	$in = mysql_fetch_object(mysql_query("Select * from ".$player_db.".item_proto where vnum='".$vnum."'"));

		$item = $in->locale_name;

		

		

		$optiune1=$in->applytype0;

		$optiune2=$in->applytype1;

		$optiune3=$in->applytype2;

		$valoare1=$in->applyvalue0;

		$valoare2=$in->applyvalue1;

		$valoare3=$in->applyvalue2;

		$piatra1=$in->socket0;

		$piatra2=$in->socket1;

		$piatra3=$in->socket2;

		echo "<div style='margin-top:-28px; margin-left:-40px;'>";

	echo "<center><font color='#ffc700'><div class='tada'>$item</div></font><br/><br/>";

	echo "<div align='center'><font color='#c1c1c1'>De la level : $in->limitvalue0</font></div>";

	echo "<font color='azzurro'>";

	if ($optiune1!="")

			  {

			  bonus_name($optiune1,$valoare1);

			  echo "<br/>";

			  }

	if ($optiune2!="")

			  {

			  bonus_name($optiune2,$valoare2);

			   echo "<br/>";

			  }

	if ($optiune3!="")

			  {

			  bonus_name($optiune3,$valoare3);

			   echo "<br/></font>";

			  }

	

	for($b=0;$b<7;$b++) {

		echo "<font color='#b0dfb4'>";

            if($b==0) { $akBoni = $in->attrtype0; $akWert = $in->attrvalue0; }

            if($b==1) { $akBoni = $in->attrtype1; $akWert = $in->attrvalue1; }

            if($b==2) { $akBoni = $in->attrtype2; $akWert = $in->attrvalue2; }

            if($b==3) { $akBoni = $in->attrtype3; $akWert = $in->attrvalue3; }

            if($b==4) { $akBoni = $in->attrtype4; $akWert = $in->attrvalue4; }

            if($b==5) { $akBoni = $in->attrtype5; $akWert = $in->attrvalue5; }

            if($b==6) { $akBoni = $in->attrtype6; $akWert = $in->attrvalue6; }

            echo'#'.($b+1).'&nbsp;';

            if(isset($itemBoni[$akBoni])) {

              echo $itemBoni[$akBoni];

            }

            else {

              echo $akBoni;

            }

            echo':&nbsp;'.$akWert;

           echo'<br/></font>';

          }

		  

		  if($piatra1>0)

		  {

		  echo "

		  <font color='red'>

		  <table border='0' cellspacing='0' cellpadding='0'>

  <tr>

    <td align='center' width='36' height='36' background='images/pietra.png'><img src='".img_pietre($piatra1)."' width=20 height=20></td>

     <td><font color='#c1c1c1'>".pietre_name($piatra1)."</font></td>

  </tr>

</table>

		  "; }

		  if($piatra2>0)

		  {

		   echo "

		  

		  <table border='0' cellspacing='0' cellpadding='0'>

  <tr>

    <td align='center' align='center' width='36' height='36' background='images/pietra.png'><img src='".img_pietre($piatra2)."' width=20 height=20></td>

     <td><font color='#c1c1c1'>".pietre_name($piatra2)."</font></td>

  </tr>

</table></font>

		  "; } 

		  if($piatra3>0)

		  {

		   echo "

		  

		  <table border='0' cellspacing='0' cellpadding='0'>

  <tr>

    <td align='center' width='36' height='36' background='images/pietra.png'><img src='".img_pietre($piatra3)."' width=20 height=20></td>

     <td><font color='#c1c1c1'>".pietre_name($piatra3)."</font></td>

  </tr>

</table>

		  "; }

		  

						  

		   echo'<br/>';

        

}

function romana($var){{

$new_var=str_replace("ã","a",$var);

$new_var=str_replace("â","a",$new_var);

$new_var=str_replace("Î","I",$new_var);

$new_var=str_replace("î","i",$new_var);

$new_var=str_replace("s","s",$new_var);

$new_var=str_replace("t","t",$new_var);

$new_var=str_replace("A","A",$new_var);

$new_var=str_replace("Â","I",$new_var);

$new_var=str_replace("S","S",$new_var);

$new_var=str_replace("T","T",$new_var);

$new_var=str_replace("þ","t",$new_var);

$new_var=str_replace("º","s",$new_var);

$new_var=str_replace("2147483647","-15",$new_var);

return $new_var;

}

}

?>

<?php } ?>