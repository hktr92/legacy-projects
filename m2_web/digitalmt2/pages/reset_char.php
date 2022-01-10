<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Resetare caracter</h3>
        <div class="big-line"></div>
<?PHP

  if(isset($_SESSION['user_admin']) && checkInt($_SESSION['user_admin']) && $_SESSION['user_admin']>=0) {
    
    echo'<h2>Resetare caracter</h2>';
    
    if(isset($_GET['char']) && checkInt($_GET['char'])) {
      $sqlCmd = "SELECT player.name, player_index.empire, UNIX_TIMESTAMP(player.last_play) AS timeStamp 
        FROM player.player
        INNER JOIN player.player_index ON player.account_id = player_index.id
        WHERE player.id = '".$_GET['char']."'
        AND player.account_id = '".$_SESSION['user_id']."'
        LIMIT 1";
      $sqlQry = mysql_query($sqlCmd,$sqlServ);
    
      if(mysql_num_rows($sqlQry)>0) {
        $getChar = mysql_fetch_object($sqlQry);
        $toGoTime = (5*60);
        $toGoMin = floor(($toGoTime)/60);
        $toGoSek = (5*0);
		$difSpielzeit = time() - $getChar->last_play; 
        if(($difSpielzeit/60)>=5) {
			if($getChar->empire <=3){
				$sqlUpdate = "UPDATE player.player SET map_index='".$resetPos[$getChar->empire]['map_index']."', x='".$resetPos[$getChar->empire]['x']."', y='".$resetPos[$getChar->empire]['y']."', 	exit_x='".$resetPos[$getChar->empire]['x']."', exit_y='".$resetPos[$getChar->empire]['y']."', exit_map_index='".$resetPos[$getChar->empire]['map_index']."', horse_riding='0' WHERE id='".$_GET['char']."' LIMIT 1";
				$updatePos = mysql_query($sqlUpdate,$sqlServ);
				if($updatePos) {
					echo '<p>Caracterul '.$getChar->name.' a fost resetat cu succes și acum caracterul tau e în map1. Dacă acest lucru nu sa întâmplat , vă rugăm să vă deconectați și să așteptati un moment. Apoi, încercați din nou această procedură.</p>';
				}
				else 
				{ 
					echo'<p class="meldung">A apărut o eroare, vă rugăm să contactați un admin</p>'; 
				}
			}
			else 
			{
				echo'<p class="meldung">A apărut o eroare, vă rugăm să contactați un admin</p>'; 
			}
        }
        else {
			echo'<p class="meldung">Nu sunteți deconectat  de 5 minute. Va trebui să asteptati '.$toGoMin.' Minute si '.$toGoSek.' Secunde.</p>';
        }
        
      }
      else {
        echo'<p class="meldung">Caracterul specificată nu există.</p>';
      }
    
    }
    echo'<p><a href="javascript:history.back()">inapoi</a></p>';
  }
  else {
    echo'<p class="meldung">Trebuie să fii logat pentru acest serviciu.</p>';
  }
?>
   </div>
    <div class="bottom"></div>
</div>
 