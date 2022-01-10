<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Cumpara</h3>
        <div class="big-line"></div>
<?PHP

	function canBuy()
	{
		if(!isset($_SESSION['nextBuy']))
		{
			$_SESSION['nextBuy']=time();
		}
		
		if($_SESSION['nextBuy']<=time())
		{
			$_SESSION['nextBuy']=time()+5;
			return true;
		}
		else
			return false;
	}

  if(isset($_SESSION['user_admin']) && checkInt($_SESSION['user_admin']) && $_SESSION['user_admin']>=0) {
  
    if(isset($_GET['id']) && checkInt($_GET['id'])) {
    
      $sqlCmd="SELECT vnum, preis, attrtype0, attrvalue0, attrtype1, attrvalue1, attrtype2, attrvalue2, attrtype3, attrvalue3, attrtype4, attrvalue4, attrtype5, attrvalue5, attrtype6, attrvalue6, socket0, socket1, socket2 FROM ".SQL_HP_DB.".vote_items WHERE id='".$_GET['id']."' AND anzeigen='J' LIMIT 1";
      $sqlQry=mysql_query($sqlCmd,$sqlHp);
      if(mysql_num_rows($sqlQry)==1) {
      
        $getItem=mysql_fetch_object($sqlQry);
        
        $sqlVoteCoins = "SELECT vote_coins FROM account.account WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."' LIMIT 1";
        $qryVoteCoins = mysql_query($sqlVoteCoins,$sqlServ);
        $getVoteCoins = mysql_fetch_object($qryVoteCoins);
        
		if(canBuy())
		{
			if(($getVoteCoins->vote_coins)>=$getItem->preis) {
		  
			  $getGroesse = compareItems($getItem->vnum);
			  $belPos = checkPos($_SESSION['user_id']);
			  $possiblePos = findPos($belPos['islager'],$getGroesse['groesse']);
			  if(!empty($possiblePos)) {
				
				$nVoteCoins = $getVoteCoins->vote_coins-$getItem->preis;
				
				$sqlCmd="UPDATE account.account SET vote_coins='".mysql_real_escape_string($nVoteCoins)."' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."' LIMIT 1";
				$sqlQry=mysql_query($sqlCmd,$sqlServ);
				
				$sqlLog="INSERT INTO ".SQL_HP_DB.".vote_log (account_id,vnum,preis,zeitpunkt) VALUES ('".mysql_real_escape_string($_SESSION['user_id'])."','".$getItem->vnum."','".$getItem->preis."','".$sqlZeit."')";
				$qryLog=mysql_query($sqlLog,$sqlHp);
				
				$sqlItem="INSERT INTO player.item_award (pid , login, vnum , count , given_time, why, socket0 , socket1 , socket2 ,  mall ) VALUES ('".$_SESSION['user_id']."', '".$_SESSION['user_name']."', '".$getItem->vnum."', '1', NOW(), 'Itemshop IP: ".$_SERVER["REMOTE_ADDR"]."', '".$getItem->socket0."', '".$getItem->socket1."', '".$getItem->socket2."' , '1')";
				$qryItem=mysql_query($sqlItem,$sqlServ) or die(mysql_error());
				
				echo'<p class="meldung"><b>Acest punct a fost achiziționat cu succes. Ar trebui sa apara în depozit, vă rugăm să luați legătura cu un admin element.</b></p>';
				
			  }
			  else {
				echo'<p>Nu aveți suficient spațiu în magazinul de stocare de element. Itemul nu a fost cumparat</p>';
			  }
			  
			}
			else {
			  echo'<p class="meldung">Nu ai destule Vote-Coins.</p>';
			}
		}
		else
		{
			echo'<p class="meldung">Se poate doar la fiecare 5 secunde un element să fie achiziționat.</p>';
		}
      }
      else {
        echo'<p class="meldung">Elementul specificat nu există.</p>';
      }
    }
    else {
      echo'<p class="meldung">Acest ID nu exista</p>';
    }
    echo'<p><a style="color: #c38000; text-decoration: underline;" href="javascript:history.back()">zur&uuml;ck</a></p>';
  }
  else {
    echo'<p class="meldung">Trebuie să fii logat pentru acest domeniu.</p>';
  }
?>
    </div>
    <div class="bottom"></div>
</div>