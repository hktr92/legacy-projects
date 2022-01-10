<?PHP
  if($_SESSION['user_admin']>=$adminRights['worldmaps']) {
  
    echo'<!--<h2>Map &Uuml;bersicht</h2>-->';
    if(isset($_GET['mapindex']) && checkInt($_GET['mapindex'])) {
      
      $tsNow = time();
      $minDif = 10; // Tolleranzbereich f&uuml;r "online" in Minuten
      $sekDif = $minDif*60;
      $pufferStamp = $tsNow-$sekDif;
      $mapData = getMapByIndex($_GET['mapindex']);
      if($mapData) {
        $mapX = $mapData[4];
        $mapY = $mapData[5];
        
        $baseX = $mapData[2];
        $baseY = $mapData[3];
        
        $mapImage = "./img/maps/".$mapData[0].".jpg";
        $mapGroesse = getimagesize($mapImage);
        $imageX = $mapGroesse[0];
        $imageY = $mapGroesse[1];
        
        $difX = $imageX/$mapX;
        $difY = $imageY/$mapY;
       
        $sqlZeitpunkt = "SELECT UNIX_TIMESTAMP() as tsNow";
        $qryZeitpunkt = mysql_query($sqlZeitpunkt,$sqlServ);
        $getTs = mysql_fetch_object($qryZeitpunkt);
        
        //echo $getTs->tsNow;
       
        $sqlCmd="SELECT name,x,y,level FROM player.player WHERE map_index='".$mapData[0]."' AND UNIX_TIMESTAMP(last_play)>=".$pufferStamp.";";
        $sqlQry=mysql_query($sqlCmd,$sqlServ);
        $anzChar = mysql_num_rows($sqlQry);
     //   echo $anzChar;
        $chaData=array();
        $x=0;
        while($getChars=mysql_fetch_object($sqlQry)) {
          $chaData[$x]['x']=((($getChars->x-$baseX)/200)/0.5);
          $chaData[$x]['y']=((($getChars->y-$baseY)/200)/0.5); // 80 Tolleranz
          $chaData[$x]['name']=$getChars->name;
          $chaData[$x]['level']=$getChars->level;
          $x++;
        }
        echo '<br>';
    ?>
    <!-- <p><?PHP echo $mapData[6]; ?></p> -->
    <div class="worldmap" style="background: url('./img/maps/<?PHP echo $mapData[0]; ?>.jpg'); width:<?PHP echo $imageX; ?>px; height:<?PHP echo $imageY; ?>px;">
    <?PHP
      $x=1;
      foreach($chaData AS $cha) {
        //echo'<div style="position:absolute; margin-top:'.round(($cha['y']*$difY),0).'px;margin-left:'.round(($cha['x']*$difX),0).'px;"><a onMouseOver="document.getElementById(\'player'.$x.'\').style.display=\'inline\'" onMouseOut="document.getElementById(\'player'.$x.'\').style.display=\'none\';">.</a></div>'."\n";
        echo'<div class="worldmapBubble" style="margin-top:'.(round($cha['y']*$difY)).'px;margin-left:'.(round($cha['x']*$difX)).'px;" onMouseOver="document.getElementById(\'player'.$x.'\').style.display=\'inline\'" onMouseOut="document.getElementById(\'player'.$x.'\').style.display=\'none\';"></div>'."\n";
        echo'<div class="worldmapTables" style="margin-top:'.(round(($cha['y']*$difY),0)+5).'px;margin-left:'.(round(($cha['x']*$difX),0)+15).'px;" id="player'.$x.'">'.$cha['name'].' (Lv. '.$cha['level'].')</div>';
        $x++;
      }
    ?>
    </div>
    <?PHP
      }
      else {
        echo'<p class="meldung">Die angegebene Map existiert nicht</p>';
      }
      echo'<p style="clear:both;"><a href="index.php?s=admin&a=map">Zur&uuml;ck zur &Uuml;bersicht</a></p>';
      
      /*
      echo 'Ingame-Koords: 343/479 | DB-Koords: 955931/252730<br>';
      echo 'BasePointer Map1 (Blau) 921600/204800<br>';
      echo 'Rechnung: ((955931-921600)/200)/0.5 / ((252730-204800)/200)/0.5 <<< die Werte m&uuml;ssen auf ganze Stellen gerundet werden.';
      echo 'Ergebnis: '.round((((295711-204800)/200)/0.5),0).'/'.round((((546859-486400)/200)/0.5),0); 
      */
    }
    else {
    
      listMaps();
    
    }
    
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>