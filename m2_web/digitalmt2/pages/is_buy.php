<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Itemshop</h3>
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
    
      $sqlCmd="SELECT vnum, preis, attrtype0, attrvalue0, attrtype1, attrvalue1, attrtype2, attrvalue2, attrtype3, attrvalue3, attrtype4, attrvalue4, attrtype5, attrvalue5, attrtype6, attrvalue6, socket0, socket1, socket2 FROM ".SQL_HP_DB.".is_items WHERE id='".$_GET['id']."' AND anzeigen='J' LIMIT 1";
      $sqlQry=mysql_query($sqlCmd,$sqlHp);
      if(mysql_num_rows($sqlQry)==1) {
      
        $getItem=mysql_fetch_object($sqlQry);
        
        $sqlCoins = "SELECT coins FROM account.account WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."' LIMIT 1";
        $qryCoins = mysql_query($sqlCoins,$sqlServ);
        $getCoins = mysql_fetch_object($qryCoins);
        
		if(canBuy())
		{
			if(($getCoins->coins)>=$getItem->preis) {
		  
			  $getGroesse = compareItems($getItem->vnum);
			  $belPos = checkPos($_SESSION['user_id']);
			  $possiblePos = findPos($belPos['islager'],$getGroesse['groesse']);
			  if(!empty($possiblePos)) {
				
				$nCoins = $getCoins->coins-$getItem->preis;
				
				$sqlCmd="UPDATE account.account SET coins='".mysql_real_escape_string($nCoins)."' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."' LIMIT 1";
				$sqlQry=mysql_query($sqlCmd,$sqlServ);
				
				$sqlLog="INSERT INTO ".SQL_HP_DB.".is_log (account_id,vnum,preis,zeitpunkt) VALUES ('".mysql_real_escape_string($_SESSION['user_id'])."','".$getItem->vnum."','".$getItem->preis."','".$sqlZeit."')";
				$qryLog=mysql_query($sqlLog,$sqlHp);
				
				$sqlStats="SELECT * FROM `".SQL_HP_DB."`.`is_stats` WHERE `vnum`='" . $getItem->vnum . "'";
				$qryStats=mysql_query($sqlStats,$sqlHp);
				if(mysql_num_rows($qryStats) == 1) {
					$sqlUpdateStats="UPDATE `".SQL_HP_DB."`.`is_stats` SET `count`+='1', `income`+='" . $getItem->preis . "'";
					mysql_query($sqlUpdateStats,$sqlHp);
				} else {
					$sqlUpdateStats="INSERT INTO `".SQL_HP_DB."`.`is_stats`('vnum', 'count', 'income') VALUES('" . $getItem->vnum . "', '1', '" . $getItem->preis . "')";
					mysql_query($sqlUpdateStats,$sqlHp);
				}
				
				$sqlItem="INSERT INTO player.item_award (pid , login, vnum , count , given_time, why, socket0 , socket1 , socket2 ,  mall ) VALUES ('".$_SESSION['user_id']."', '".$_SESSION['user_name']."', '".$getItem->vnum."', '1', NOW(), 'Itemshop IP: ".$_SERVER["REMOTE_ADDR"]."', '".$getItem->socket0."', '".$getItem->socket1."', '".$getItem->socket2."' , '1')";
				$qryItem=mysql_query($sqlItem,$sqlServ) or die(mysql_error());
				
				echo'<p class="meldung"><b>Acest item a fost achiziționat cu succes. Daca nu a aparut în itemshop/depozit vă rugăm să luați legătura cu un admin.</b></p>';
				
			  }
			  else {
				echo'<p>Nu aveți suficient spațiu în magazinul de stocare . Cumpararea nu a avut loc.</p>';
			  }
			  
			}
			else {
			  echo'<p class="meldung">Nu ai destule MD.</p>';
			}
		}
		else
		{
			echo'<p class="meldung">Se poate doar la fiecare 5 secunde un item să fie achiziționat.</p>';
		}
      }
      else {
        echo'<p class="meldung">Elementul specificat nu există.</p>';
      }
    }
    else {
      echo'<p class="meldung">Nu a fost dat un ID corect</p>';
    }
    echo'<p><a style="color: #c38000; text-decoration: underline;" href="javascript:history.back()">înapoi</a></p>';
  }
  else {
    echo'<p class="meldung">Trebuie să fii logat pentru acest domeniu.</p>';
  }
?>
    </div>
    <div class="bottom"></div>
</div>