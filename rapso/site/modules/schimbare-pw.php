<?php
if(isset($_SESSION['user']) && isset($_SESSION['pass'])){

?><?php if(isset($_GET['cod']) && $_GET['cod']!=NULL)
{ 	
	include ('inc/configurare.php');
	$cod = replace($_GET['cod']);
	$log = $_SESSION['user'];
	$vrf = mysql_query("Select * from ".$account_db.".account where passchange_token='$cod' and login='$log'");
	if(mysql_num_rows($vrf)==0)
	{
		echo error("Link incorect sau expirat");
	}
	else { 
	schimbare_pw_confirmata();
	?>
       
 <h4>  Schimbare parola :</h4>

   
       Noua parola : 
        <form action="" method="POST">
        <input type="password" id="newPassword" name="newPassword" value="" maxlength="16" class="iRg_input"/>
        <input id="submitBtn" type="submit" name="SubmitLostPasswordCodeForm" value="Schimba" class="iR_stats"/>
        </form>
    
    <?php }	
} 
else 
{?>
<h4>SCHIMBARE PAROLA  :</h4>
<?php schimbare_pw();?>
Din motive de securitate trebuie sa confirmi prin email intentia de a schimba parola.<Br />
Pentru a confirma apasa linkul primit.<br>
<div align="right"><form action="" name="passwordchangerequestForm" method="POST">
<input type="submit" name="passwordchangerequest"  class="buton" value="TRIMITE EMAIL CONFIRMARE"/>
</form></div>
<?php } ?>

<?php } else { echo "Acces restrictionat";}?>