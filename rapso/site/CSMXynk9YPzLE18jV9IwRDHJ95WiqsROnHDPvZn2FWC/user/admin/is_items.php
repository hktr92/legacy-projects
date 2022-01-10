<?PHP
  if($_SESSION['user_admin']>=$adminRights['is_items']) {
    $maxDateiGr = 100;  //KByte
    $maxDateix = 100;   //Pixel X-Achse
    $maxDateiy = 100;   //Pixel Y-Achse
    echo'<h2>Administrare - magazinul de iteme</h2>';
    echo'<p><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aici po&#355;i ad&#259;uga, edita & &#351;terge itemele din magazinul de iteme.<br/><br/></p>';
    
      if(isset($_POST['submit']) && $_POST['submit']=="Adauga") {
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
          if($inSql) echo'<p class="meldung">Itemul a fost introdus cu succes &#238;n magazinul de iteme.</p>';
        }
      }
      elseif(isset($_POST['submit']) && $_POST['submit']=="Editeaza") {
        if(!empty($_POST['itemtyp']) && checkInt($_POST['itemgrad']) && checkInt($_POST['preis']) && checkInt($_POST['kategorie']) && checkInt($_POST['iid'])) {
          $bildDatei=imageUpload('bildupload',$maxDateiGr,$maxDateix,$maxDateiy);
          if(!$bildDatei) $aktIMG=$_POST['bildAlt'];
          else $aktIMG=$bildDatei;
          $opDeleted=false;
          if((isset($_POST['loeschen']) && $_POST['loeschen']=='loeschen') || !empty($bildDatei)) {
            if(!empty($_POST['bildAlt'])) {
              if(unlink('./is_img/'.$_POST['bildAlt']))
              {
                echo'<p class="meldung">Imaginea veche a fost &#351;tears&#259; cu succes.</p>';
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
          if($inSql) echo'<p class="meldung">Itemul a fost editat cu succes.</p>';
        }
      }
      
      if(isset($_GET['do']) && $_GET['do']=="add") {
        include("./user/admin/is_item_add.inc.php");
      }
      elseif(isset($_GET['do']) && $_GET['do']=="edit") {
        include("./user/admin/is_item_edit.inc.php");
      }
      elseif(isset($_GET['do']) && $_GET['do']=="delete") {
        include("./user/admin/is_item_delete.inc.php");
      }
    
    ?>
      <div style="position=:center; margin-left:10px;"><a href="index.php?s=admin&a=is_items&do=add" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ad&#259;ugare item</a></div>
      <table>
        <tr>
          <th class="topLine"><br/>&nbsp;&nbsp;&nbsp;&nbsp;ID</th>
          <th class="topLine"><br/>Item</th>
          <th class="topLine"><br/>Imagine&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th class="topLine"><br/>&nbsp;&nbsp;Categorie</th>
          <th class="topLine"><br/>&nbsp;&nbsp;&nbsp;&nbsp;Costuri</th>
          <th class="topLine"><br/>&nbsp;&nbsp;&nbsp;&nbsp;Descriere</th>
          <th class="topLine"><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Op&#355;iuni</th>
        </tr>
        <?PHP
          $sqlCmd="SELECT is_items.*,is_kategorien.titel AS kat_titel FROM ".SQL_HP_DB.".is_items 
          INNER JOIN ".SQL_HP_DB.".is_kategorien 
          ON is_kategorien.id=is_items.kategorie_id 
          ORDER BY is_items.kategorie_id ASC";
          $sqlQry=mysql_query($sqlCmd,$sqlHp);
          $x=0;
          while($getIS=mysql_fetch_object($sqlQry)) {
            $aktItem = compareItems($getIS->vnum);
            $itemStufe = (checkInt($aktItem['stufe'])) ? "+".$aktItem['stufe'] : '';
            $zF=($x%2==0) ? "tdunkel" : "thell";
            $zBild = (!empty($getIS->bild)) ? "success.gif" : "fail.gif";
            $oldstring = $getIS->beschreibung;
			$newstring = substr($oldstring,0,20);
		    echo'<tr>
              <td class="'.$zF.'">&nbsp;&nbsp;&nbsp;&nbsp;'.$getIS->id.'</td>
              <td class="'.$zF.'">&nbsp;&nbsp;'.$aktItem['item'].$itemStufe.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td class="'.$zF.'"><img src="./img/icons/'.$zBild.'"/></td>
              <td class="'.$zF.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$getIS->kat_titel.'</td>
              <td class="'.$zF.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$getIS->preis.'</td>
              <td class="'.$zF.'">'.$newstring.'...</td>
              <td class="'.$zF.'">&nbsp;&nbsp;[<a href="index.php?s=admin&a=is_items&do=edit&id='.$getIS->id.'">edit</a>]&nbsp;[<a href="index.php?s=admin&a=is_items&do=delete&id='.$getIS->id.'">&#351;terge</a>]</td>
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