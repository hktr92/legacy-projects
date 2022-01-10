<?PHP
  if($_SESSION['user_admin']>=$adminRights['is_log']) {
  
    echo'<h2>Admin - log-ul magazinului de iteme</h2>';
    ?>
    <br><br>
      <table>
        <tr>
          <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th class="topLine">Nume item&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th class="topLine">Cont&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th class="topLine">Monede&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th class="topLine">Timp&nbsp;&nbsp;&nbsp;&nbsp;</th>
        </tr>
        <?PHP
          $sqlCmd="SELECT * 
          FROM ".SQL_HP_DB.".is_log 
          ORDER BY is_log.zeitpunkt DESC LIMIT 100";
          
          $sqlQry=mysql_query($sqlCmd,$sqlHp);
          $x=0;
          while($getIS=mysql_fetch_object($sqlQry)) {
            $zF=($x%2==0) ? "tdunkel" : "thell";
            $itemOut = compareItems($getIS->vnum);
            $itemStufe = (checkInt($itemOut['stufe'])) ? "+".$itemOut['stufe'] : '';
            echo'<tr>
              <td class="'.$zF.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$getIS->id.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td class="'.$zF.'">'.$itemOut['item'].$itemStufe.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td class="'.$zF.'"><a href="index.php?s=admin&a=users&acc='.$getIS->account_id.'">'.$getIS->account_id.'</a></td>
              <td class="'.$zF.'">'.$getIS->preis.'</td>
              <td class="'.$zF.'">'.$getIS->zeitpunkt.'</td>
            </tr>';
            $x++;
          }
        ?>
      </table>
    
    <?PHP
  }
  else {
    echo'<p class="meldung">Nu ave&#355;i acces la aceast&#259; zon&#259;!</p>';
  }
?><br/>
<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>