
			<div class="postui2 text-title">
					<h2>
                   Itemshop - Item Entfernen
                    
                    </h2>
				
				</div>
				<div class="postui2 text-con">
				<div class="con-wrap"><?PHP
  if($_SESSION['user_admin']>=$adminRights['is_items']) {
    if(isset($_GET['id']) && checkInt($_GET['id'])) {
      $sqlCmd="DELETE FROM ".SQL_HP_DB.".is_items WHERE id='".$_GET['id']."' LIMIT 1";
      $sqlQry=mysql_query($sqlCmd,$sqlHp);
      if($sqlQry) { echo'<p class="meldung">Das Item wurde erfolgreich aus dem Itemshop gel&ouml;scht.</p>'; }
    }
    else { echo '<p class="meldung">Keine g&uuml;ltige ID.</p>'; }
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>			</div>

  </div> 
				<div class="postui2 text-end">
             
                
                  
    </div>