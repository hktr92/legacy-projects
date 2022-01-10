<?php
if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
$log = $_SESSION['user'];

?>
<h4>STERGERE CONT </h4>
<?php 
include ('inc/configurare.php');
				$co = mysql_query("Select * from account.account where login='".$_SESSION['user']."'");
				$c = mysql_fetch_object($co);
				$id = $c->id;
				$qq = mysql_query("Select * from player.player where account_id='$id'") or die(mysql_error());
				
				while($char = mysql_fetch_object($qq))
				{
					$pid = $char->id;
					$q2 = mysql_query("Select * from player.guild_member where pid='$pid'");
					$q3 = mysql_query("Select * from player.marriage where pid1='$pid' or pid2='$pid'");
					
				}
				if(mysql_num_rows($q2) > 0 || mysql_num_rows($q3) > 0) 
				{
					echo error("Iesiti din orice bresla sau mariaj inainte sa stergeti contul!");
				}
				else { ?>
<?php stergere_cont_final();?><br />
<?php
$qq= mysql_fetch_object(mysql_query("Select * from account.account where login='$log'"));
if($qq->stergere_account==NULL && $qq->status="BLOCK")
{
?>
Pentru a incepe procedura de stergere a contului apasati butonul de mai jos si urmati instructiunile primite prin email.
	<?php 
	
	sterge_cont();?>
	<form method="post" action="" name="DeleteAccount">
	<input type="submit" name="accountdeletion_submit" class="buton" value="TRIMITE MAIL"/>
</form>
<?php } else { stergere_cont_cancel();?>
Data stergere : <?=$qq->stergere_account;?>
Apasa butonul de mai jos pentru a anula stergerea contului.
<form method="post" action="" name="DeleteAccount">
	<input type="submit" name="accountdeletion_cancel" class="buton" value="ANULARE STEGERE!"/>
</form>
<?php } }?>
<?php } else {echo "Acces restrictionat!";}?>