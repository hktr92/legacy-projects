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

<div  class="roundbox"><h4><center>Lista categoriilor</h4></center></div>

<?php

if(isset($_POST['da']))

{

	$id=replace($_POST['id']);

	mysql_query("Delete from ".$web_db.".dev_is_cat where id='$id'");

	mysql_query("Delete from ".$web_db.".dev_is_items where cat_id='$id'");	

}

?>

<table width="100%" border="0" cellspacing="1" cellpadding="1" style="border-bottom:1px dotted #963; padding-top:15px;">

  <tr>

    <td width="7%" class="tabelx">ID</td>

    <td width="37%" class="tabelx">Nume Categorie</td>

    <td width="30%" class="tabelx">Iteme</td>

    <td width="26%" class="tabelx">Optiuni</td>

  </tr>

<?php

$categorii = mysql_query("Select * from ".$web_db.".dev_is_cat order by id");

while($c = mysql_fetch_object($categorii))

{

	$count++;

	$citems = mysql_query("Select * from ".$web_db.".dev_is_items where cat_id='$c->id'");

	$nritems = mysql_num_rows($citems);

	

?>



  <tr>

    <td class="tabel5"><?=$count?>.</td>

    <td class="tabel5"><?=$c->titlu?></td>

    <td class="tabel5"><a class="link_cat"  href="index.php?page=items&cat=<?=$c->id?>" onclick="load()"><?=$nritems?> <?php

    if($nritems ==1)

	{

		echo "item disponibil";	

	}

	else {

		echo "iteme disponibile";	

	}

	?></a></td>

    <td class="tabel5"><a href="#" class="link_cat" onclick="toggle_visibility('sterge<?=$count?>');"> &raquo; Elimina Categoria</a><div id="sterge<?=$count?>" style='display:none;'>

Elimina ?

<form action="" method="POST">

<input type="hidden" name='id' value="<?=$c->id?>" />

<input type="submit" name="da" value="Da" class="field" />

<input type="submit" name="nu" value="Nu" class="field" />

</form>

</div> </td>

  </tr>





<?php

}

?>

<?php

if(isset($_POST['save']))

{

	$title = replace($_POST['nume']);

	if($title!=NULL)

	{

		mysql_query("Insert into ".$web_db.".dev_is_cat (id,titlu) values ('','$title')");

			echo '<meta http-equiv="refresh" content="0;url=index.php?page=admin_categorii">';	

		

	}

}

?>

</table>

<br />

<a href="#" class="link_cat" onclick="toggle_visibility('adauga');"><button class="field">Adauga</button></a>

<div id="adauga" style='display:none;'>

<form action="" method="post">

<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td width="30%">Nume categorie :</td>

    <td width="70%"><input type="text" name="nume" id="nume" class="field" />

      <input type="submit" name="save" id="save" class="field" value="Adauga" /></td>

  </tr>

</table>

</form>

</div><?php } else { echo error("Acces insuficient pentru aceasta zona.");} ?>

<?php } ?>