<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Itemshop Logs</h3>
        <div class="big-line"></div><?PHP
  if($_SESSION['user_admin']>=$adminRights['is_log']) {
  
    echo'<h2>Admin - Itemshop-Log</h2>';
    echo'<p>Zur Kontrolle, welcher User, welches Item gekauft hat.</p><br />';
    
    $sqlCmd="SELECT * 
    FROM ".SQL_HP_DB.".is_log 
    ORDER BY is_log.zeitpunkt DESC LIMIT " . $_GET["page"] * 50 . ", 50";
    $sqlCmd_2="SELECT * 
    FROM ".SQL_HP_DB.".is_log 
    ORDER BY is_log.zeitpunkt DESC";
          
    $sqlQry=mysql_query($sqlCmd,$sqlHp);
    $sqlQry_2=mysql_query($sqlCmd_2,$sqlHp);
    ?>
    
      <center>
        <?php
            $count = mysql_num_rows($sqlQry_2);
            for($i = 0; $i < $count / 15 && $i < 10; $i++) {
                $isCurrent = $_GET["page"] == $i;
                $color = $isCurrent ? "black" : "#c38000";
                echo '<a style="margin-left: 10px; margin-right: 10px; color: ' . $color . '; font-size: 14px;" href="?s=admin&a=is_log&page=' . $i . '">' . ($i + 1) . "</a>";
            }
      ?>
      </center><br />
        
      <table style="width: 100%;">
        <tr>
          <th class="topLine">KaufID</th>
          <th class="topLine">Item/Vnum</th>
          <th class="topLine">Account</th>
          <th class="topLine">Preis</th>
          <th class="topLine">Zeitpunkt</th>
        </tr>
        <?PHP
          $x=0;
          while($getIS=mysql_fetch_object($sqlQry)) {
            $zF=($x%2==0) ? "tdunkel" : "thell";
            $itemOut = compareItems($getIS->vnum);
            $itemStufe = (checkInt($itemOut['stufe'])) ? "+".$itemOut['stufe'] : '';
            echo'<tr>
              <td class="'.$zF.'">'.$getIS->id.'</td>
              <td class="'.$zF.'">'.$itemOut['item'].$itemStufe.'</td>
              <td class="'.$zF.'"><a href="index.php?s=admin&a=users&acc='.$getIS->account_id.'">'.$getIS->account_id.'</a></td>
              <td class="'.$zF.'">'.$getIS->preis.'</td>
              <td class="'.$zF.'">'.$getIS->zeitpunkt.'</td>
            </tr>';
            $x++;
          }
        ?>
      </table><br />
      
      <center>
        <?php
            $count = mysql_num_rows($sqlQry_2);
            for($i = 0; $i < $count / 15 && $i < 10; $i++) {
                $isCurrent = $_GET["page"] == $i;
                $color = $isCurrent ? "black" : "#c38000";
                echo '<a style="margin-left: 10px; margin-right: 10px; color: ' . $color . '; font-size: 14px;" href="?s=admin&a=is_log&page=' . $i . '">' . ($i + 1) . "</a>";
            }
      ?>
      </center>
    
    <?PHP
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>    </div>
    <div class="bottom"></div>
</div>