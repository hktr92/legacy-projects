<?php

echo '<!-- TinyMCE -->
';
echo '<s';
echo 'cript type="text/javascript" src="plugins/tiny_mce/tiny_mce.js"></script>

';
echo '<s';
echo 'cript type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
';
echo '				theme_advanced_buttons1 : "code,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,|,outdent,indent,blockquote,|,image,|,undo,redo,visualblocks",
		theme_advanced_buttons2 : "styleselect,formatselect,fontselect,fontsizeselect,|,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "|,hr,|,sub,sup,|,charmap,emotions,iespell,media,a';
echo 'dvhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : ';
echo 'true,

		// Example content CSS (should be your site CSS)
		content_css : "css/devilium.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_for';
echo 'mats : [
			{title : \'Bold text\', inline : \'b\'},
			{title : \'Red text\', inline : \'span\', styles : {color : \'#ff0000\'}},
			{title : \'Red header\', block : \'h1\', styles : {color : \'#ff0000\'}},
			{title : \'Example 1\', inline : \'span\', classes : \'example1\'},
			{title : \'Example 2\', inline : \'span\', classes : \'example2\'},
			{title : \'Table styles\'},
			{title : \'Table row 1\', selector : \'tr\'';
echo ', classes : \'tablerow1\'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>

<!-- /TinyMCE -->

';
echo '<s';
echo 'cript type="text/javascript">

<!--

    function toggle_visibility(id) {

       var e = document.getElementById(id);

       if(e.style.display == \'block\')



          e.style.display = \'none\';



       else



          e.style.display = \'block\';



    }



//-->



</script><div  class="roundbox"><h4><center>Adauga news :</center></h4></div>

';
require( 'inc/config.inc.php' );

if ($aasdas == '814#911!21$2') {
	if (isset( $_POST['adauga'] )) {
		if (( $_POST['titlu'] != NULL && $_POST['elm1'] != NULL )) {
			$titlu = replace( $_POST['titlu'] );
			$continut = $_POST['elm1'];
			$data = date( 'h:i:s , d/m/Y' );
			mysql_query( 'Insert into web.dev_is_news (titlu,continut,data) values (\'' . $titlu . '\',\'' . $continut . '\',\'' . $data . '\')' );
			echo success( 'Adaugat cu succes!' );
		}
	}

	echo '
';

	if (isset( $_GET['edit'] )) {
		$id = replace( $_GET['edit'] );
		$row = mysql_fetch_row( mysql_query( 'SELECT titlu,continut FROM web.dev_is_news where id=\'' . $id . '\'' ) );

		if (isset( $_POST['editeaza'] )) {
			$titlu = replace( $_POST['titlu'] );
			$continut = $_POST['elm1'];
			mysql_query( 'UPDATE web.dev_is_news SET titlu=\'' . $titlu . '\', continut=\'' . $continut . '\' where id=\'' . $id . '\'' );
			echo success( 'Editat cu succes!' );
		}

		echo '

<form action="" method="post">
<table width="350" border="0" style="padding-top:15px;">
  <tr>
    <td> Titlu Stire : <input type="text" name="titlu" id="titlu" value="';
		echo $row[0];
		echo '" class="field" style="text-align:center;"/></td>
  </tr>
  <tr>
    <td  style="padding-top:15px;"> <textarea id="elm1" name="elm1" rows="15" cols="20" style="width:350px;">';
		echo $row[1];
		echo '</textarea></td>
  </tr>
  <tr>
    <td align="right"><input type="submit" name="editeaza" id="adauga" value="Edit" class="field" /></td>
  </tr>
</table>



</form>

';
		return 1;
	}

	echo '<form action="" method="post">
<table width="350" border="0" style="padding-top:15px;">
  <tr>
    <td align="left"> Titlu Stire : <input type="text" name="titlu" id="titlu"  class="field" width="350px"/></td>
  </tr>
  <tr>
    <td  style="padding-top:15px;"><textarea id="elm1" name="elm1" rows="15" cols="20" style="width:350px"></textarea></td>
  </tr>
  <tr>
    <td align="right"><input type="submit" ';
	echo 'name="adauga" id="adauga" value="Adauga" class="field" /></td>
  </tr>
</table>

</form>


';

	if (isset( $_POST['da'] )) {
		$id = replace( $_POST['id'] );

		if (!( mysql_query( 'Delete from web.dev_is_news where id=\'' . $id . '\'' ))) {
			exit( mysql_error(  ) );
			(bool)true;
		}
	}

	$ene = mysql_query( 'Select * from web.dev_is_news' );

	while ($news = mysql_fetch_object( $ene )) {
		++$nr;
		echo '
<h5>Lista Stiri :</h5>
<table width="481" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px dotted;">
<tr>
<td width="5%" class="tabel4" align="center"> ID</td>
<td width="62%" class="tabel4" align="center">Titlu Stire</td>
<td width="33%" class="tabel4" style="padding-left:25px;">Optiuni</td>
</tr>
</table>
<table width="481" border="0" cellspacing="0" cellpadding="0" style="borde';
		echo 'r-bottom:1px dotted;">

  <tr>

    <td width="5%" class="tabel3" style="padding-left:17px;">#';
		echo $news->id;
		echo '</td>

    <td width="62%" title="';
		echo $news->continut;
		echo '" class="tabel3" align="center">';
		echo $news->titlu;
		echo '</td>

    <td width="33%" class="tabel3" align="center"><a href="index.php?page=admin_addnews&edit=';
		echo $news->id;
		echo '">Edit</a> | <a href="#" onclick="toggle_visibility(\'sterge';
		echo $nr;
		echo '\');">Sterge</a>

    <div id="sterge';
		echo $nr;
		echo '" style=\'display:none;\'>



Sigur stergi ';
		echo $news->id;
		echo ' ?



<form action="" method="POST">



<input type="hidden" name=\'id\' value="';
		echo $news->id;
		echo '" />



<input type="submit" name="da" value="Da" class="field" />



<input type="submit" name="nu" value="Nu" class="field" />



</form>



</div>

    </td>

  </tr>

</table>



';
	}
}

?>
