
			<div class="postui2 text-title">
					<h2>
                Account Chars
                    
                    </h2>
				
				</div>
				<div class="postui2 text-con">
				<div class="con-wrap">
<?PHP
  if($_SESSION['user_admin']>=$adminRights['acc_ansicht']) {
  

    echo '<p>Auflistung aller Charakere eines Accounts.</p>';
    if(isset($_GET['acc']) && !empty($_GET['acc'])) 
    {
      $sqlCmd = "SELECT login FROM account.account WHERE id='".$_GET['acc']."' LIMIT 1";
      $sqlQry = mysql_query($sqlCmd,$sqlServ);
      if(mysql_num_rows($sqlQry)>0) 
      {
        $accData = mysql_fetch_object($sqlQry);
        echo'<h3>Charaktere von "'.$accData->login.'"</h3>';
        echo'<div class="user"><table>
        <tr>
          <th class="topLine">Char-ID</th>
          <th class="topLine">Name</th>
          <th class="topLine">Level</th>
          <th class="topLine">letzte IP</th>
        </tr>';
        $sqlCmd = "SELECT player.id,player.name,player.level,player.ip 
        FROM player.player_index 
        INNER JOIN player.player 
        ON player_index.pid1=player.id 
        OR player_index.pid2=player.id 
        OR player_index.pid3=player.id 
        OR player_index.pid4=player.id 
        WHERE player_index.id='".$_GET['acc']."'";
        $sqlQry = mysql_query($sqlCmd,$sqlServ);
        $x=0;
        while($getChars=mysql_fetch_object($sqlQry)) 
        {
          if(($x%2)==0) 
          { 
            $zF="tdunkel"; 
          }
          else 
          { 
            $zF="thell"; 
          }
          echo '<tr><td class="'.$zF.'">'.$getChars->id.'</td>';
          echo '<td class="'.$zF.'"><a href="index.php?s=admin&a=char&id='.$getChars->id.'">'.$getChars->name.'</a></td>';
          echo '<td class="'.$zF.'">'.$getChars->level.'</td>';
          echo '<td class="'.$zF.'"><a href="index.php?s=admin&a=iplist&filter='.$getChars->ip.'">'.$getChars->ip.'</a></td></tr>';
          $x++;
        }
        echo'</table></div>';
      }
      else
      {
        echo'<p>Die eingegebene Account-ID existiert nicht!</p>';      
      }
    }
    else 
    {
      echo'<p class="meldung">Es wurde keine Account-ID eingegeben.</p>';
    }
    
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>	</div>

  </div> 
				<div class="postui2 text-end">
             
                
                  
    </div>