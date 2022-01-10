<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Prezentare generală caracter</h3>
        <div class="big-line"></div><?if(!empty($_SESSION['need_pwchange'])) {  echo '<b style="color: red;">O vulnerabilitate în sistem, sunteti rugat sa va schimbati parola.După schimbare vei avea acces din nou la site. IMPORTANT: Nu folosiți detaliile contului dvs. pe care le-ați utilizat deja.</b>'; } else {?>
<?PHP

  if(isset($_SESSION['user_admin']) && checkInt($_SESSION['user_admin']) && $_SESSION['user_admin']>=0) {
    $cmdChars = "SELECT player.id,player.name,player.job,player.level,player.playtime,guild.name AS guild_name
    FROM player.player
    LEFT JOIN player.guild_member 
    ON guild_member.pid=player.id 
    LEFT JOIN player.guild 
    ON guild.id=guild_member.guild_id
    WHERE player.account_id='".$_SESSION['user_id']."'";
    $qryChars = mysql_query($cmdChars,$sqlServ);
    $x=0;
    echo'<table>
      <tr>
        <th class="topLine">Character</th>
        <th class="topLine">Rasă</th>
        <th class="topLine">Level</th>
        <th class="topLine">Timp jucat (Minute)</th>
        <th class="topLine">Breasla</th>
        <th class="topLine">Lista de prieteni</th>
      </tr>';
    while($getChars = mysql_fetch_object($qryChars)) {
      $zF = ($x%2==0) ? "tdunkel" : "thell";
        echo'<tr>
          <td class="'.$zF.'">'.$getChars->name.' <a href="index.php?s=reset_char&char='.$getChars->id.'">[debugare]</a></td>
          <td class="'.$zF.'">'.$aRassen[$getChars->job].'</td>
          <td class="'.$zF.'">'.$getChars->level.'</td>
          <td class="'.$zF.'">'.$getChars->playtime.' Minuten</td>
          <td class="'.$zF.'">'.$getChars->guild_name.'</td>
          <td class="'.$zF.'">
            <select name="freundesliste" size="8" style="width:100%;">';
              $cmdFriends = "SELECT messenger_list.companion,UNIX_TIMESTAMP(player.last_play) 
              FROM player.messenger_list 
              INNER JOIN player.player ON player.name=messenger_list.companion 
              WHERE account='".$getChars->name."'";
              $qryFriends = mysql_query($cmdFriends,$sqlServ);
              while($getFriends = mysql_fetch_object($qryFriends)) {
                echo'<option>'.$getFriends->companion.'</option>';
              }
        echo'</select>
          </td>
        </tr>';
      $x++;
    }
    echo'</table>';
  }
  else {
    echo'<p class="meldung">Trebuie să fi conectat în pentru acest domeniu.</p>';
  }
?><? } ?>
   </div>
    <div class="bottom"></div>
</div>
