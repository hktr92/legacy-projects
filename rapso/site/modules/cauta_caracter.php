<?php 

include("svlogdat/drepturi.php");

if(isset($_SESSION['user']) && isset($_SESSION['pass']) && $_SESSION['admin'] >=$drepturi['cauta_caracter'])

{?>

<h4>CAUTA CARACTER </h4>

<form action="" method="POST">

<table width="301" border="0" >

  <tr>

    <td width="75">Caracter :</td>

    <td width="82"><input type="text" name="caracter" id="barx" class="iRg_input" /></td>

    <td width="130"><input type="submit" name="cauta" class="buton" value="CAUTA !" /></td>

  </tr>

</table>

</form><br />

<?php cauta_caracter();?>

<br>

<?php } else { echo error("Zona restrictionata.Drepturi de acces insuficiente.");}?><a href="index.php?page=panou-admin">&laquo; Inapoi la panou administrare</a>