<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Categorii</h3>
        <div class="big-line"></div><center>
<?
if(!empty($_SESSION['need_pwchange'])) {
  echo '<b style="color: red;">Datorita unei vulnerabilitati in sistem sunteti rugat sa va schimbati parola contului. Atentie! Nu folositi date pe care le-ati mai folosit in trecut!</b>';
 } else {
?>	
<?PHP

  if(isset($_SESSION['user_admin']) && checkInt($_SESSION['user_admin']) && $_SESSION['user_admin']>=0) {
    if(isset($_GET['k']) && checkInt($_GET['k'])) {
      $sqlCmdS="SELECT * FROM ".SQL_HP_DB.".vote_items WHERE kategorie_id='".$_GET['k']."' ORDER BY id DESC LIMIT " . ($_GET["page"] * 5) . ", 5";
      $sqlCmdS_2="SELECT * FROM ".SQL_HP_DB.".vote_items WHERE kategorie_id='".$_GET['k']."' ORDER BY id DESC";
    }
    else {
      $sqlCmdS="SELECT * FROM ".SQL_HP_DB.".vote_items ORDER BY id DESC LIMIT " . ($_GET["page"] * 5) . ", 5";
      $sqlCmdS_2="SELECT * FROM ".SQL_HP_DB.".vote_items ORDER BY id DESC";
    }
  ?>

         
      <?PHP
        $sqlCmd = "SELECT * FROM ".SQL_HP_DB.".vote_kategorien ORDER BY titel ASC;";
        $sqlQry = mysql_query($sqlCmd,$sqlHp);
        while($getKats = mysql_fetch_object($sqlQry)) {
          echo'
		   <a href="index.php?s=vote&k='.$getKats->id.'">
<input type="submit" style="color:'.$getKats->color.';" value="'.$getKats->titel.'" name="submit" class="button2">
		</a>';
        }
      ?>

		</center>    
    </div>
    <div class="bottom"></div>
</div>
 <div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Voteaza</h3>
        <div class="big-line"></div>
        <center>
            <?php
                $count = mysql_num_rows(mysql_query($sqlCmdS_2, $sqlHp));
                for($i = 0; $i < $count / 5; $i++) {
                    $isCurrent = $_GET["page"] == $i;
                    $color = $isCurrent ? "black" : "#c38000";
                    echo '<a style="margin-left: 10px; margin-right: 10px; color: ' . $color . '; font-size: 14px;" href="?s=vote&page=' . $i . '">' . ($i + 1) . "</a>";
                }
            ?>
        </center><br />
  <div id="isright">
      <table>
    <?PHP
      $sqlQry=mysql_query($sqlCmdS,$sqlHp);
      while($getItems=mysql_fetch_object($sqlQry)) {
        $aktItem = compareItems($getItems->vnum);
        $itemStufe = (checkInt($aktItem['stufe'])) ? "+".$aktItem['stufe'] : '';
        ?>
        <tr>
          <th colspan="2" class="topLine"><?PHP echo $aktItem['item'].$itemStufe; ?></th>
        </tr>
        <tr>
          <td class="isImg">
            <?PHP 
              if(!empty($getItems->bild)) echo'<center><img src="./is_img/'.$getItems->bild.'" title="'.$aktItem['item'].'" alt="'.$aktItem['item'].'"/></center>';
            ?>
          </td>
          <td class="tdunkel"><?PHP echo $getItems->descriere; ?><br />
          Costa:<b> <?PHP echo $getItems->preis; ?> Vote-Coins</b></td>
        </tr>
        <tr>
          <td colspan="2" class="isBuy"><a href="index.php?s=vote_buy&id=<?PHP echo $getItems->id; ?> ">
          <input type="submit" value="Kaufen"  class="button2">
          </a>
           
          </td>
        </tr>
        <?PHP
      }
    ?>
      </table><br />
      <center>
            <?php
                $count = mysql_num_rows(mysql_query($sqlCmdS_2, $sqlHp));
                for($i = 0; $i < $count / 5; $i++) {
                    $isCurrent = $_GET["page"] == $i;
                    $color = $isCurrent ? "black" : "#c38000";
                    echo '<a style="margin-left: 10px; margin-right: 10px; color: ' . $color . '; font-size: 14px;" href="?s=vote&page=' . $i . '">' . ($i + 1) . "</a>";
                }
            ?>
        </center>
  </div>
  <?PHP
  }
  else {
    echo'<p class="meldung">Trebuie să fii logat pentru acest domeniu.</p>';
  }
?>
<? } ?>
    </div>
    <div class="bottom"></div>
</div>