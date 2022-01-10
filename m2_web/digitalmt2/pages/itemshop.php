<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Categorii</h3>
        <div class="big-line"></div><center>	
<?
if(!empty($_SESSION['need_pwchange'])) {
  echo '<b style="color: red;">O vulnerabilitate în sistem, sunteti fortat sa va schimbati parola contului. Dupa conectare vei avea din nou acces la cont. IMPORTANT: Nu folosiți detaliile contului dvs. pe care le-ați utilizat deja.</b>';
 } else {
?>
<?PHP

  if(isset($_SESSION['user_admin']) && checkInt($_SESSION['user_admin']) && $_SESSION['user_admin']>=0) {
    if(isset($_GET['k']) && checkInt($_GET['k'])) {
      $sqlCmdS="SELECT * FROM ".SQL_HP_DB.".is_items WHERE kategorie_id='".$_GET['k']."' ORDER BY id DESC LIMIT " . ($_GET["page"] * 5) . ", 5";
      $sqlCmdS_2 = "SELECT * FROM ".SQL_HP_DB.".is_items WHERE kategorie_id='".$_GET['k']."' ORDER BY id DESC";
    }
    else {
      $sqlCmdS="SELECT * FROM ".SQL_HP_DB.".is_items ORDER BY id DESC LIMIT " . ($_GET["page"] * 5) . ", 5";
      $sqlCmdS_2 = "SELECT * FROM ".SQL_HP_DB.".is_items ORDER BY id DESC";
    }
  ?>

         
      <?PHP
        $sqlCmd = "SELECT * FROM ".SQL_HP_DB.".is_kategorien ORDER BY titel ASC;";
        $sqlQry = mysql_query($sqlCmd,$sqlHp);
        while($getKats = mysql_fetch_object($sqlQry)) {
          echo'
		   <a href="index.php?s=itemshop&k='.$getKats->id.'">
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
        <h3>Itemshop</h3>
        <div class="big-line"></div>
        <center>
            <?php
                $count = mysql_num_rows(mysql_query($sqlCmdS_2, $sqlHp));
                for($i = 0; $i < $count / 5; $i++) {
                    $isCurrent = $_GET["page"] == $i;
                    $color = $isCurrent ? "black" : "#c38000";
                    echo '<a style="margin-left: 10px; margin-right: 10px; color: ' . $color . '; font-size: 14px;" href="?s=itemshop&page=' . $i . '">' . ($i + 1) . "</a>";
                }
            ?>
        </center><br />
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
          <td class="tdunkel"><?PHP echo $getItems->beschreibung; ?><br />
          Costa:<b> <?PHP echo $getItems->preis; ?> Monede Dragon</b></td>
        </tr>
        <tr>
          <td colspan="2" class="isBuy"><a href="index.php?s=is_buy&id=<?PHP echo $getItems->id; ?> ">
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
                  echo '<a style="margin-left: 10px; margin-right: 10px; color: ' . $color . '; font-size: 14px;" href="?s=itemshop&page=' . $i . '">' . ($i + 1) . "</a>";
              }
          ?>
      </center>
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