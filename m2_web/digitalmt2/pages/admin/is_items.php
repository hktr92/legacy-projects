<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Itemshop Items</h3>
        <div class="big-line"></div>
<?PHP
  if($_SESSION['user_admin']>=$adminRights['is_items']) {
    $maxDateiGr = 100;  //KByte
    $maxDateix = 100;   //Pixel X-Achse
    $maxDateiy = 100;   //Pixel Y-Achse

    echo'<p>Hier k&ouml;nnen die IS-Items bearbeitet werden</p>';
    
      if(isset($_POST['submit']) && $_POST['submit']=="eintragen") {
        if(!empty($_POST['itemtyp']) && checkInt($_POST['itemgrad']) && checkInt($_POST['preis']) && checkInt($_POST['kategorie'])) {
          $bildDatei=imageUpload('bildupload',$maxDateiGr,$maxDateix,$maxDateiy);
          if(!$bildDatei) $bildDatei='';
          
          $getStufen = compareItems($_POST['itemtyp']);
          if($_POST['itemgrad']<=$getStufen['maxStufe']) {
            $inVnum = $_POST['itemtyp']+$_POST['itemgrad'];
          }
          else {
            $inVnum = $_POST['itemtyp'];
          }
          
          $socket0 = (checkInt($_POST['socket0'])) ? $_POST['socket0'] : '0';
          $socket1 = (checkInt($_POST['socket1'])) ? $_POST['socket1'] : '0';
          $socket2 = (checkInt($_POST['socket2'])) ? $_POST['socket2'] : '0';
          $boni0 = ($_POST['boni0']>=0 && $_POST['boni0']<=255) ? $_POST['boni0'] : '0';
          $boni1 = ($_POST['boni1']>=0 && $_POST['boni1']<=255) ? $_POST['boni1'] : '0';
          $boni2 = ($_POST['boni2']>=0 && $_POST['boni2']<=255) ? $_POST['boni2'] : '0';
          $boni3 = ($_POST['boni3']>=0 && $_POST['boni3']<=255) ? $_POST['boni3'] : '0';
          $boni4 = ($_POST['boni4']>=0 && $_POST['boni4']<=255) ? $_POST['boni4'] : '0';
          $boni5 = ($_POST['boni5']>=0 && $_POST['boni5']<=255) ? $_POST['boni5'] : '0';
          $boni6 = ($_POST['boni6']>=0 && $_POST['boni6']<=255) ? $_POST['boni6'] : '0';
          $boniv0 = ($_POST['boniv0']>=(-32767) && $_POST['boniv0']<=32767) ? $_POST['boniv0'] : '0';
          $boniv1 = ($_POST['boniv1']>=(-32767) && $_POST['boniv1']<=32767) ? $_POST['boniv1'] : '0';
          $boniv2 = ($_POST['boniv2']>=(-32767) && $_POST['boniv2']<=32767) ? $_POST['boniv2'] : '0';
          $boniv3 = ($_POST['boniv3']>=(-32767) && $_POST['boniv3']<=32767) ? $_POST['boniv3'] : '0';
          $boniv4 = ($_POST['boniv4']>=(-32767) && $_POST['boniv4']<=32767) ? $_POST['boniv4'] : '0';
          $boniv5 = ($_POST['boniv5']>=(-32767) && $_POST['boniv5']<=32767) ? $_POST['boniv5'] : '0';
          $boniv6 = ($_POST['boniv6']>=(-32767) && $_POST['boniv6']<=32767) ? $_POST['boniv6'] : '0';
          
          
          
          $inPreis = $_POST['preis'];
          $inKategorie = $_POST['kategorie'];
          $inBeschreibung = mysql_real_escape_string($_POST['beschreibung']);
          $inAnzeigen = ($_POST['anzeigen']=="J") ? "J" : "N";
          
          $sqlCmd="INSERT INTO ".SQL_HP_DB.".is_items 
          (vnum, kategorie_id, bild, beschreibung, preis, anzeigen, attrtype0, attrvalue0, attrtype1, attrvalue1, attrtype2, attrvalue2, attrtype3, attrvalue3, attrtype4, attrvalue4, attrtype5, attrvalue5, attrtype6, attrvalue6, socket0, socket1, socket2) 
          VALUES
          ('".$inVnum."','".$inKategorie."','".$bildDatei."','".$inBeschreibung."','".$inPreis."','".$inAnzeigen."','".$boni0."', '".$boniv0."', '".$boni1."', '".$boniv1."', '".$boni2."', '".$boniv2."', '".$boni3."', '".$boniv3."', '".$boni4."', '".$boni4."', '".$boni5."', '".$boniv5."', '".$boni6."', '".$boniv6."', '".$socket0."', '".$socket1."', '".$socket1."')";
          $inSql = mysql_query($sqlCmd,$sqlHp);
          if($inSql) echo'<p class="meldung">Item erfolgreich in den Itemshop eingef&uuml;gt.</p>';
        }
      }
      elseif(isset($_POST['submit']) && $_POST['submit']=="bearbeiten") {
        if(!empty($_POST['itemtyp']) && checkInt($_POST['itemgrad']) && checkInt($_POST['preis']) && checkInt($_POST['kategorie']) && checkInt($_POST['iid'])) {
          $bildDatei=imageUpload('bildupload',$maxDateiGr,$maxDateix,$maxDateiy);
          if(!$bildDatei) $aktIMG=$_POST['bildAlt'];
          else $aktIMG=$bildDatei;
          $opDeleted=false;
          if((isset($_POST['loeschen']) && $_POST['loeschen']=='loeschen') || !empty($bildDatei)) {
            if(!empty($_POST['bildAlt'])) {
              if(unlink('./is_img/'.$_POST['bildAlt']))
              {
                echo'<p class="meldung">Altes Bild erfolgreich gel&ouml;scht.</p>';
                $opDeleted=true;
              }
            }
          }
          
          if((empty($_POST['bildAlt']) && !$bildDatei) || ($opDeleted==true && !$bildDatei)) {
            $aktIMG='';
          }
          
          $getStufen = compareItems($_POST['itemtyp']);
          if($_POST['itemgrad']<=$getStufen['maxStufe']) {
            $inVnum = $_POST['itemtyp']+$_POST['itemgrad'];
          }
          else {
            $inVnum = $_POST['itemtyp'];
          }
          
          $socket0 = (checkInt($_POST['socket0'])) ? $_POST['socket0'] : '0';
          $socket1 = (checkInt($_POST['socket1'])) ? $_POST['socket1'] : '0';
          $socket2 = (checkInt($_POST['socket2'])) ? $_POST['socket2'] : '0';
          $boni0 = ($_POST['boni0']>=0 && $_POST['boni0']<=255) ? $_POST['boni0'] : '0';
          $boni1 = ($_POST['boni1']>=0 && $_POST['boni1']<=255) ? $_POST['boni1'] : '0';
          $boni2 = ($_POST['boni2']>=0 && $_POST['boni2']<=255) ? $_POST['boni2'] : '0';
          $boni3 = ($_POST['boni3']>=0 && $_POST['boni3']<=255) ? $_POST['boni3'] : '0';
          $boni4 = ($_POST['boni4']>=0 && $_POST['boni4']<=255) ? $_POST['boni4'] : '0';
          $boni5 = ($_POST['boni5']>=0 && $_POST['boni5']<=255) ? $_POST['boni5'] : '0';
          $boni6 = ($_POST['boni6']>=0 && $_POST['boni6']<=255) ? $_POST['boni6'] : '0';
          $boniv0 = ($_POST['boniv0']>=(-32767) && $_POST['boniv0']<=32767) ? $_POST['boniv0'] : '0';
          $boniv1 = ($_POST['boniv1']>=(-32767) && $_POST['boniv1']<=32767) ? $_POST['boniv1'] : '0';
          $boniv2 = ($_POST['boniv2']>=(-32767) && $_POST['boniv2']<=32767) ? $_POST['boniv2'] : '0';
          $boniv3 = ($_POST['boniv3']>=(-32767) && $_POST['boniv3']<=32767) ? $_POST['boniv3'] : '0';
          $boniv4 = ($_POST['boniv4']>=(-32767) && $_POST['boniv4']<=32767) ? $_POST['boniv4'] : '0';
          $boniv5 = ($_POST['boniv5']>=(-32767) && $_POST['boniv5']<=32767) ? $_POST['boniv5'] : '0';
          $boniv6 = ($_POST['boniv6']>=(-32767) && $_POST['boniv6']<=32767) ? $_POST['boniv6'] : '0';
          
          $inPreis = $_POST['preis'];
          $inKategorie = $_POST['kategorie'];
          $inBeschreibung = mysql_real_escape_string($_POST['beschreibung']);
          $inAnzeigen = ($_POST['anzeigen']=="J") ? "J" : "N";
          
          $sqlCmd="UPDATE ".SQL_HP_DB.".is_items
            SET vnum='".$inVnum."', kategorie_id='".$inKategorie."', bild='".$aktIMG."', beschreibung='".$inBeschreibung."', preis='".$inPreis."', anzeigen='".$inAnzeigen."' ,attrtype0='".$boni0."', attrvalue0='".$boniv0."', attrtype1='".$boni1."', attrvalue1='".$boniv1."', attrtype2='".$boni2."', attrvalue2='".$boniv2."', attrtype3='".$boni3."', attrvalue3='".$boniv3."', attrtype4='".$boni4."', attrvalue4='".$boniv4."', attrtype5='".$boni5."', attrvalue5='".$boniv5."', attrtype6='".$boni6."', attrvalue6='".$boniv6."', socket0='".$socket0."', socket1='".$socket1."', socket2='".$socket2."' 
            WHERE id='".$_POST['iid']."'";
            echo $sqlCmd;
          $inSql = mysql_query($sqlCmd,$sqlHp) or die(mysql_error());
          if($inSql) echo'<p class="meldung">Item erfolgreich aktualisiert</p>';
        }
      }
      
      if(isset($_GET['do']) && $_GET['do']=="add") {
        include("./pages/admin/is_item_add.inc.php");
      }
      elseif(isset($_GET['do']) && $_GET['do']=="edit") {
        include("./pages/admin/is_item_edit.inc.php");
      }
      elseif(isset($_GET['do']) && $_GET['do']=="delete") {
        include("./pages/admin/is_item_delete.inc.php");
      } else {
    
    ?>
      <p><a href="index.php?s=admin&a=is_items&do=add">Item hinzuf&uuml;gen</a></p>
      <center>
        <?php
            $sqlCmd="SELECT is_items.*,is_kategorien.titel AS kat_titel FROM ".SQL_HP_DB.".is_items 
                INNER JOIN ".SQL_HP_DB.".is_kategorien 
                ON is_kategorien.id=is_items.kategorie_id 
                ORDER BY is_items.kategorie_id ASC
                LIMIT " . $_GET["page"] * 15 . ", 15";
                $sqlCmd_2="SELECT is_items.*,is_kategorien.titel AS kat_titel FROM ".SQL_HP_DB.".is_items 
                INNER JOIN ".SQL_HP_DB.".is_kategorien 
                ON is_kategorien.id=is_items.kategorie_id 
                ORDER BY is_items.kategorie_id ASC";

            $sqlQry=mysql_query($sqlCmd,$sqlHp);
            $sqlQry_2=mysql_query($sqlCmd_2, $sqlHp);
        
            $count = mysql_num_rows($sqlQry_2);
            for($i = 0; $i < $count / 15; $i++) {
                $isCurrent = $_GET["page"] == $i;
                $color = $isCurrent ? "black" : "#c38000";
                echo '<a style="margin-left: 10px; margin-right: 10px; color: ' . $color . '; font-size: 14px;" href="?s=admin&a=is_items&page=' . $i . '">' . ($i + 1) . "</a>";
            }
      ?>
      </center><br />
      <table style="width: 100%;">
        <tr>
          <th class="topLine">IS-ID</th>
          <th class="topLine">Item/Vnum</th>
          <th class="topLine">Bild</th>
          <th class="topLine">Kategorie</th>
          <th class="topLine">Preis</th>
          <th class="topLine">Beschreibung</th>
          <th class="topLine">Funktionen</th>
        </tr>
        <?PHP
          $x=0;
          while($getIS=mysql_fetch_object($sqlQry)) {
            $aktItem = compareItems($getIS->vnum);
            $itemStufe = (checkInt($aktItem['stufe'])) ? "+".$aktItem['stufe'] : '';
            $zF=($x%2==0) ? "tdunkel" : "thell";
            $zBild = (!empty($getIS->bild)) ? "success.gif" : "fail.gif";
            echo'<tr>
              <td class="'.$zF.'">'.$getIS->id.'</td>
              <td class="'.$zF.'">'.$aktItem['item'].$itemStufe.'</td>
              <td class="'.$zF.'"><img src="./img/'.$zBild.'"/></td>
              <td class="'.$zF.'">'.$getIS->kat_titel.'</td>
              <td class="'.$zF.'">'.$getIS->preis.'</td>
              <td class="'.$zF.'">'.$getIS->beschreibung.'</td>
              <td class="'.$zF.'">[<a href="index.php?s=admin&a=is_items&do=edit&id='.$getIS->id.'">bearbeiten</a>]&nbsp;[<a href="index.php?s=admin&a=is_items&do=delete&id='.$getIS->id.'">l&ouml;schen</a>]</td>
            </tr>';
            $x++;
          }
        ?>
      </table><br />
      <center>
      <?php
        $sqlQry=mysql_query($sqlCmd,$sqlHp);
        $sqlQry_2=mysql_query($sqlCmd_2, $sqlHp);
        
        $count = mysql_num_rows($sqlQry_2);
        for($i = 0; $i < $count / 15; $i++) {
            $isCurrent = $_GET["page"] == $i;
            $color = $isCurrent ? "black" : "#c38000";
            echo '<a style="margin-left: 10px; margin-right: 10px; color: ' . $color . '; font-size: 14px;" href="?s=admin&a=is_items&page=' . $i . '">' . ($i + 1) . "</a>";
        }
      ?>
      </center>
    
    <?PHP
      }
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>    </div>
    <div class="bottom"></div>
</div>