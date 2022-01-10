 <?php 

 require('inc/config.inc.php');

 if($aasdas == "814#911!21$2") {

 if(isset($_SESSION['is_user']) && isset($_SESSION['is_pass']) && $_SESSION['is_admin']>0)



	{ ?>

    <?php

    include('inc/daten.php');

	?>

<?php







if(isset($_POST['adauga']))



{

	$vnum = replace($_POST['vnum']);

	$pret = replace($_POST['pret']);

	$categorie = replace($_POST['cat']);

	$vnum_exact = $_POST['vnum_exact'];

	$descriere = replace($_POST['descriere']);

	$socket2 = replace($_POST['socket2']);

	if(($vnum!=NULL) && ($pret!=NULL))

	{

$allowedExts = array("jpg", "jpeg", "gif", "png");



$extension = end(explode(".", $_FILES["file"]["name"]));



if ((($_FILES["file"]["type"] == "image/gif")



|| ($_FILES["file"]["type"] == "image/jpeg")



|| ($_FILES["file"]["type"] == "image/jpg")



|| ($_FILES["file"]["type"] == "image/png")



|| ($_FILES["file"]["type"] == "image/pjpeg"))



&& ($_FILES["file"]["size"] < 2000000)



&& in_array($extension, $allowedExts))



  {



  if ($_FILES["file"]["error"] > 0)



    {



    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";



    }



  else



    {



    



    if (file_exists("images/item/" . $_FILES["file"]["name"]))



      {



      echo $_FILES["file"]["name"] . " already exists. ";



      }



    else



      {



      move_uploaded_file($_FILES["file"]["tmp_name"], "images/item/" . $_FILES["file"]["name"]); // idioten ..=))

	  $img_name  =  $_FILES["file"]["name"]; // acu urca

  

  

  

      mysql_query("Insert into ".$web_db.".dev_is_items (vnum,img_status,descriere,pret,imagine,cat_id,socket0,socket1,socket2,attrtype0,attrvalue0,attrtype1,attrvalue1,attrtype2,attrvalue2,attrtype3,attrvalue3,attrtype4,attrvalue4,attrtype5,attrvalue5,attrtype6,attrvalue6) values ('$vnum',$vnum_exact,'$descriere','$pret','$img_name','$categorie','".$_POST['socket0']."','".$_POST['socket1']."','".$_POST['socket2']."','".$_POST['boni0']."','".$_POST['boniv0']."','".$_POST['boni1']."','".$_POST['boniv1']."','".$_POST['boni2']."','".$_POST['boniv2']."','".$_POST['boni3']."','".$_POST['boniv3']."','".$_POST['boni4']."','".$_POST['boniv4']."','".$_POST['boni5']."','".$_POST['boniv5']."','".$_POST['boni6']."','".$_POST['boniv6']."')") or die(mysql_error());



	 echo success("Itemul a fost adaugat cu succes !");



	 echo '<meta http-equiv="refresh" content="1;url=index.php?page=admin_additems">';



	  }



    }



  }



else



  {

	$vnum_exact = $_POST['vnum_exact'];

	$cantitate = $_POST['cantitate'];

	if(empty($cantitate)){

	$cantitate = "1";

	}

	if($vnum_exact == 1){

  mysql_query("Insert into ".$web_db.".dev_is_items (vnum,descriere,pret,imagine,cat_id,socket0,socket1,socket2,attrtype0,attrvalue0,attrtype1,attrvalue1,attrtype2,attrvalue2,attrtype3,attrvalue3,attrtype4,attrvalue4,attrtype5,attrvalue5,attrtype6,attrvalue6,img_status,count) values ('$vnum','$descriere','$pret','$vnum','$categorie','".$_POST['socket0']."','".$_POST['socket1']."','".$_POST['socket2']."','".$_POST['boni0']."','".$_POST['boniv0']."','".$_POST['boni1']."','".$_POST['boniv1']."','".$_POST['boni2']."','".$_POST['boniv2']."','".$_POST['boni3']."','".$_POST['boniv3']."','".$_POST['boni4']."','".$_POST['boniv4']."','".$_POST['boni5']."','".$_POST['boniv5']."','".$_POST['boni6']."','".$_POST['boniv6']."', '1', '$cantitate')") or die(mysql_error());



	 echo success("Itemul a fost adaugat cu succes !");



	 echo '<meta http-equiv="refresh" content="1;url=index.php?page=admin_additems">';

} else {

  mysql_query("Insert into ".$web_db.".dev_is_items (vnum,descriere,pret,imagine,cat_id,socket0,socket1,socket2,attrtype0,attrvalue0,attrtype1,attrvalue1,attrtype2,attrvalue2,attrtype3,attrvalue3,attrtype4,attrvalue4,attrtype5,attrvalue5,attrtype6,attrvalue6,count) values ('$vnum','$descriere','$pret','','$categorie','".$_POST['socket0']."','".$_POST['socket1']."','".$_POST['socket2']."','".$_POST['boni0']."','".$_POST['boniv0']."','".$_POST['boni1']."','".$_POST['boniv1']."','".$_POST['boni2']."','".$_POST['boniv2']."','".$_POST['boni3']."','".$_POST['boniv3']."','".$_POST['boni4']."','".$_POST['boniv4']."','".$_POST['boni5']."','".$_POST['boniv5']."','".$_POST['boni6']."','".$_POST['boniv6']."','$cantitate')") or die(mysql_error());



	 echo success("Itemul a fost adaugat cu succes !");



	 echo '<meta http-equiv="refresh" content="1;url=index.php?page=admin_additems">';

}

	}



		



		



		



		



		



		



	}



	



}



?>



<form action="" method="POST" enctype="multipart/form-data">



<table width="100%" border="0" cellspacing="1" cellpadding="1">



  <tr>



    <td colspan="2" align="center" class="roundbox"><h4>Adauga item in itemshop :</h4></td>



  </tr>



  <tr>



    <td width="150" class="barax" style="padding-top:15px;">Vnum :</td>



    <td width="480">



      <input type="text" class="search_field" name="vnum"  maxlength="6" id="vnum"/>

      &nbsp; | &nbsp;

           <a class="tip" href="#"  title="

          <div style='margin-top:-28px;'>

<center><font color='#339933'><div class='tada2'>Informatie </div></font></br>

</center>

 Aceasta optiune este folosita pentru<br> iteme cu VNUM fix , de exemplu: 71113.<br> Pentru a procesa imaginile corect in itemshop">

<input type="checkbox" name="vnum_exact" class="search_field" value="1" style="position:absolute;"/>

&nbsp; &nbsp; &nbsp; &nbsp; <font color="#339933"> &lt; <b>ID Fix?</b></font></a> 

     



    </td>



  </tr>



  <tr>



    <td class="barax">Pret :</td>



    <td>



      <input type="text" class="search_field" name="pret"  maxlength="12" id="pret"/>



    </td>



  </tr>

  <tr>



    <td class="barax">

     <a class="tip" href="#"  title="

     <div style='margin-top:-28px;'>

<center><font color='#CC6633'><div class='tada2'>Informatie </div></font></br>

</center>

     Cantitate : Campul pentru a specifica numarul de iteme. Atentie, folositi doar <br>la obiecte ce merg grupate,gen : <b>Licori / Pergamente</b>. Valoare Maxima <b>200</b>.">

   <font color="#CC6633"><b> Cantitate </b></font>:</a></td>



    <td>



      <input type="search_field" name="cantitate" class="search_field" maxlength="3"/>



    </td>



  </tr>

  <tr>



    <td class="barax">Categorie :</td>



    <td><select name="cat" class="search_field">



    <?php 



	$cs = mysql_query("Select * from ".$web_db.".dev_is_cat");



	while($cat = mysql_fetch_object($cs))



	{



	?>



    <option value="<?=$cat->id?>"><?=$cat->titlu?></option>



    <?php } ?>



    </select></td>



  </tr>



   <tr>



    <td class="barax">Descriere :</td>



    <td>



     <textarea name="descriere" cols="48" class="search_field" style="height:70px; max-width:350px;"></textarea>



    </td>



  </tr>

  

  </tr>





 



 



  <tr>



    <td  class="barax">Piatra #1:</td>



      <td class="thell">



        <select class="search_field" name="socket0">



          <?PHP



            foreach($itemSteine AS $aKey => $aValue) {



              echo'<option value="'.$aKey.'">'.$aValue.'</option>';



            }



          ?>



        </select>



      </td>



    </tr>



    <tr>



      <td class=" class="barax"">

   

    Piatra #2  :</td>



      <td class="tdunkel">



        <select class="search_field" name="socket1">



          <?PHP

				

            foreach($itemSteine AS $aKey => $aValue) {

				

             	 echo'<option value="'.$aKey.'">'.$aValue.'</option>';

			  



            }



          ?>



        </select>



      </td>



    </tr>



    <tr>



      <td  class="barax"> 

      <a class="tip" href="#"  title="

      <div style='margin-top:-28px;'>

<center><font color='yellow'><div class='tada2'>Informatie </div></font></br>

</center>

      Atentie ! Nu folositi timpul pe alte iteme <br>in afara de Sigilii / Masti sau alte lucruri<br>care permit timpul in joc.">

      <font color="yellow"><b>Piatra #3</b></font></a>:</td>



      <td >



        <select class="search_field" name="socket2">



          <?PHP

 				echo'<option value="0">Fara Slot</option>';

				echo'<option value="1">Slot Liber</option>';

				echo'<option value="28960">Aschie</option>';

 				 echo'<option value="120"> ---- 2  Ore</option>';

				 echo'<option value="180"> ---- 3  Ore</option>';

				 echo'<option value="240"> ---- 4  Ore</option>';

			     echo'<option value="1440"> ---- 1 Zi</option>';

				 echo'<option value="4320"> ---- 3 Zile</option>';

				 echo'<option value="10080"> ---- 7 Zile</option>';

				 echo'<option value="21600"> ---- 15 Zile</option>';

				 echo'<option value="43200"> ---- 30 Zi</option>';

				 echo'<option value="28800">480 Ore</option>';

            foreach($itemSteine AS $aKey => $aValue) {



              echo'<option value="'.$aKey.'">'.$aValue.'</option>';

			 



            }



          ?>



        </select>



      </td>



    </tr>



    <tr>



      <td class="barax">Bonus #1:</td>



      <td>



        <select name="boni0"  class="search_field">



          <?PHP



            foreach($itemBoni AS $aKey => $aValue) {



              echo'<option value="'.$aKey.'">'.$aValue.'</option>';



            }



          ?>



        </select>



        <input type="text" class="search_field" name="boniv0" size="6" maxlength="6"/>



      </td>



    </tr>



    <tr>



      <td  class="barax">Bonus #2:</td>



      <td>



        <select class="search_field" name="boni1">



          <?PHP



            foreach($itemBoni AS $aKey => $aValue) {



              echo'<option value="'.$aKey.'">'.$aValue.'</option>';



            }



          ?>



        </select>



        <input type="text" class="search_field" name="boniv1" size="6" maxlength="6"/>



      </td>



    </tr>



    <tr>



      <td class="barax">Bonus #3:</td>



      <td>



        <select class="search_field" name="boni2">



          <?PHP



            foreach($itemBoni AS $aKey => $aValue) {



              echo'<option value="'.$aKey.'">'.$aValue.'</option>';



            }



          ?>



        </select>



        <input type="text" class="search_field" name="boniv2" size="6" maxlength="6"/>



      </td>



    </tr>



    <tr>



      <td  class="barax">Bonus #4:</td>



      <td>



        <select class="search_field" name="boni3">



          <?PHP



            foreach($itemBoni AS $aKey => $aValue) {



              echo'<option value="'.$aKey.'">'.$aValue.'</option>';



            }



          ?>



        </select>



        <input type="text" class="search_field" name="boniv3" size="6" maxlength="6"/>



      </td>



    </tr>



    <tr>



      <td class="barax">Bonus #5:</td>



      <td>



        <select class="search_field" name="boni4">



          <?PHP



            foreach($itemBoni AS $aKey => $aValue) {



              echo'<option value="'.$aKey.'">'.$aValue.'</option>';



            }



          ?>



        </select>



        <input type="text" class="search_field" name="boniv4" size="6" maxlength="6"/>







      </td>



    </tr>



    <tr>



      <td class="barax">Bonus #6:</td>



      <td>



        <select class="search_field" name="boni5">



          <?PHP



            foreach($itemBoni AS $aKey => $aValue) {



              echo'<option value="'.$aKey.'">'.$aValue.'</option>';



            }



          ?>



        </select>



        <input type="text" class="search_field" name="boniv5" size="6" maxlength="6"/>



      </td>



    </tr>



    <tr>



      <td class="barax">Bonus #7:</td>



      <td>



        <select class="search_field" name="boni6">



          <?PHP



            foreach($itemBoni AS $aKey => $aValue) {



              echo'<option value="'.$aKey.'">'.$aValue.'</option>';



            }



          ?>



        </select>



        <input type="text" class="search_field" name="boniv6" size="6" maxlength="6"/>



      </td>



  </tr>



  <tr>



  <td colspan="2" align="center"><br /><button name="adauga" class="solved" >Adauga item</button></td>



  </tr>



</table></form>

<center>

<br /> &raquo; LEGENDA :</center>

<font color="#CC6633">

Cantitate : Campul pentru a specifica numarul de iteme. Atentie, folositi doar la iteme ce merg grupate,gen : <b>Licori / Pergamente</b>. Maxim <b>200</b>.

</font>

<br />

<font color="#339933">

ID Fix : Acesta casuta trebuie bifata cand aveti un item cu VNUM fix. De exemplu <b>71113</b>, acesta este un id UNIC.

Ca sa apara imaginea corecta in itemshop bifati campul acesta.

<br />

<font color="yellow">

Piatra #3 sau TIMP : Acest camp poate fii folosit sa setati timpul unui item. De exemplu : <b>Masca Emotiei</b>. Nu folositi optiunea de TIMP la alte iteme decat cele care permit timpul in joc. Altfel nu va functiona.

</font>

<?php } else { echo error("Acces insuficient pentru aceasta zona.");} } ?>



