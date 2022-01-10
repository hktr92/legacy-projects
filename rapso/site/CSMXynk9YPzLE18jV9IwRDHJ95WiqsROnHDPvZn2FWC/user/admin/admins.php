<?PHP
  if($_SESSION['user_admin']>=$adminRights['web_admins']) {
?>
<h2>Administrare - dreptul de administrare pe site</h2>
 <br><p>&nbsp;&nbsp;&#206;n aceast&#259; zon&#259; pute&#355;i edita drepturile administratorilor pe site.</p>
  <table>
    <tr><br>
      <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID&nbsp;&nbsp;&nbsp;</th>
      <th class="topLine">&nbsp;&nbsp;&nbsp;Contul&nbsp;&nbsp;&nbsp;</th>
      <th class="topLine">&nbsp;&nbsp;&nbsp;Dreturi&nbsp;&nbsp;&nbsp;</th>
      <th class="topLine">&nbsp;&nbsp;&nbsp;Editare&nbsp;&nbsp;&nbsp;</th>
      <?PHP
        $sqlCmd = "SELECT id,login,web_admin FROM account.account WHERE web_admin>0 ORDER BY login ASC";
        $sqlQry = mysql_query($sqlCmd,$sqlServ);
        $x=0;;
        while($getAdmins = mysql_fetch_object($sqlQry)) {
          $zF = ($x%2==0) ? "tdunkel" : "thell";
          echo'<tr>';
          echo'<td class="'.$zF.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$getAdmins->id.'</td>';
          echo'<td class="'.$zF.'">&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=users&acc='.$getAdmins->id.'">'.$getAdmins->login.'</a></td>';
          echo'<td class="'.$zF.'">&nbsp;&nbsp;&nbsp;'.$getAdmins->web_admin.'</td>';
          echo'<td class="'.$zF.'">&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=rights&acc='.$getAdmins->id.'">Schimb&#259; drepturile</a></td>';
          echo'</tr>';
          $x++;
        }
      ?>
  </table>
<?PHP
  }
  else {
    echo'<p class="meldung">Nu ave&#355;i acces la aceast&#259; zon&#259;!</p>';
  }
?>
<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>