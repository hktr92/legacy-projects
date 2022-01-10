<?php
if(isset($_SESSION['user']) && isset($_SESSION['pass']))
{
    auto_unban();
	$username = $_SESSION['user'];
	$sql = mysql_query("Select * from account.account where login='".$_SESSION['user']."'") or die(mysql_error());
	$accc=mysql_fetch_object($sql);
	$charss = mysql_query("Select * from player.player where account_id='".$accc->id."'") or die(mysql_error());
	$chars = mysql_num_rows($charss);
?>
<script type='text/javascript'>
function myFunction()
{
var jmsg = "<? echo "Contul tau este blocat pana la data : ".$acc->unban_date." pentru ".$acc->motiv_ban.".Dupa aceasta data banul va fi scos automat."; ?>";
	if(jmsg){
		alert(jmsg);
	}
	window.onload=myFunction;
}
</script>


<h4>INFORMATII UTILIZATOR</h4>

<table width="100%" border="0" class="iR_class">
  <tr>
    <td width="34%" height="21"><li>
      Utilizator : 
        <?=acc($username,login)?>
      
    </li></td>
    
  </tr>
  <tr>
    <td><li>
      Email : <span id="yourEmail"> <?=acc($username,email);?>
      </span>
    </li></td>
  </tr>
  <tr>
    <td><li>
      Stare cont : <span id="yourEmail"> <?=acc($username,status);?>
        </span>
        <?php if($acc->status=="BLOCK")
{ 
echo '<a href="#" onclick="myFunction()"> Informatii ban</a>';
}
?>
      
    </li></td>
  </tr>
  <tr>
    <td><li>
      Monezi Dragon : 
          <strong>
          <?=acc($username,coins);?>  
            </strong><a id="payment_middle" href="index.php?page=doneaza" class="iR_stats_reset"><font color=white>Cumpara</font></a>
    </li></td>
  </tr>
  <tr>
    <td><li>
      Jetoane Dragon : 
        <strong><?=acc($username,jcoins);?> </strong>
      
    </li>
</td>
  </tr>
  <tr>
    <td><li>
     Cont creat la data : 
        <?=acc($username,create_time);?> 
      
    </li>
</td>
  </tr>
</table>
<?php } else { echo "Aceasta zona este restrictionata.Logati-va pentru a avea acces.";} ?>
