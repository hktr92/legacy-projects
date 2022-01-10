<?PHP
  if($_SESSION['user_admin']>=$adminRights['acc_ansicht']) {
  
    echo '<h2>Administrare - profil caractere</h2>';
    if(isset($_GET['acc']) && !empty($_GET['acc'])) 
    {
      $sqlCmd = "SELECT login FROM account.account WHERE id='".$_GET['acc']."' LIMIT 1";
      $sqlQry = mysql_query($sqlCmd,$sqlServ);
      if(mysql_num_rows($sqlQry)>0) 
      {
        $accData = mysql_fetch_object($sqlQry);
        echo'<h3><br/>&nbsp;&nbsp;&nbsp;&nbsp;Caracterele lui "'.$accData->login.'"</h3><br/>';
        echo'<div class="user"><table>
        <tr>
          <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID caracter</th>
          <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nume</th>
          <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nivel</th>
          <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ultimul IP</th>
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
          echo '<tr><td class="'.$zF.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$getChars->id.'</td>';
          echo '<td class="'.$zF.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=char&id='.$getChars->id.'">'.$getChars->name.'</a></td>';
          echo '<td class="'.$zF.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$getChars->level.'</td>';
          echo '<td class="'.$zF.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=iplist&filter='.$getChars->ip.'">'.$getChars->ip.'</a></td></tr>';
          $x++;
        }
        echo'</table></div>';
      }
      else
      {
        echo'<p>ID-ul contului care l-a&#355;i introdus nu exist&#259;!</p>';      
      }
    }
    else 
    {
      echo'<p class="meldung">Nu a&#355;i introdus nici un ID!</p>';
    }
    
  }
  else {
    echo'<p class="meldung">Nu ave&#355;i acces la aceast&#259; zon&#259;!</p>';
  }
?><br/><br/>
<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>