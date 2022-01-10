<?PHP
  if($_SESSION['user_admin']>=$adminRights['stats']) {
    function accountStats() {
      global $sqlServ;
      
      $cmdOK = "SELECT COUNT(*) AS anz_ok FROM account.account WHERE status='OK';";
      $cmdBAN = "SELECT COUNT(*) AS anz_ban FROM account.account WHERE status!='OK';";
      
      $getNoBan = mysql_fetch_object(mysql_query($cmdOK,$sqlServ));
      $getBan = mysql_fetch_object(mysql_query($cmdBAN,$sqlServ));

      $inTyp = 'torte';      
      $inTitel = 'Statistik - Account';
      $inWerte = array($getNoBan->anz_ok,$getBan->anz_ban);
      $inStrings = array('freie','gesperrte');
      
      //Cache-Datei generieren
      
      $cacheTitel = 'STA_'.md5($inTitel).'_'.date("d",time()).date("m",time()).date("y",time()).'.php';
      $cacheContent = "<?PHP /* \n".$inTyp."\n".$inTitel."\n".serialize($inWerte)."\n".serialize($inStrings)."\n */ ?>";
      
      $writeFile = fopen('./pages/admin/cache/'.$cacheTitel,'w');
      fwrite($writeFile,$cacheContent,strlen($cacheContent));
      fclose($writeFile);
      
      
      echo '<img src="./pages/admin/img_stats.php?file='.$cacheTitel.'" title="Account-Statistik" alt="Account-Statistik" />';
      
    }
    
    function charStats() {
      global $sqlServ;
      
      $cmdS1 = "SELECT COUNT(*) AS anz_15 FROM player.player WHERE level<'15';";
      $cmdS2 = "SELECT COUNT(*) AS anz_30 FROM player.player WHERE level>='15' AND level<'30';";
      $cmdS3 = "SELECT COUNT(*) AS anz_65 FROM player.player WHERE level>='30' AND level<'64';";
      $cmdS4 = "SELECT COUNT(*) AS anz_UE FROM player.player WHERE level>'64';";
      
      $getS1 = mysql_fetch_object(mysql_query($cmdS1,$sqlServ));
      $getS2 = mysql_fetch_object(mysql_query($cmdS2,$sqlServ));
      $getS3 = mysql_fetch_object(mysql_query($cmdS3,$sqlServ));
      $getS4 = mysql_fetch_object(mysql_query($cmdS4,$sqlServ));

      $inTyp = 'torte';      
      $inTitel = 'Übersicht - Charaktere';
      $inWerte = array($getS1->anz_15,$getS2->anz_30,$getS3->anz_65,$getS4->anz_UE);
      $inStrings = array("Lv. 0-14","Lv. 15-29","Lv. 30-64","Lv. 65-x");
      
      //Cache-Datei generieren
      
      $cacheTitel = 'STA_'.md5($inTitel).'_'.date("d",time()).date("m",time()).date("y",time()).'.php';
      $cacheContent = "<?PHP /* \n".$inTyp."\n".$inTitel."\n".serialize($inWerte)."\n".serialize($inStrings)."\n */ ?>";
      
      $writeFile = fopen('./pages/admin/cache/'.$cacheTitel,'w');
      fwrite($writeFile,$cacheContent,strlen($cacheContent));
      fclose($writeFile);
      
      
      echo '<img src="./pages/admin/img_stats.php?file='.$cacheTitel.'" title="'.$inTitel.'" alt="'.$inTitel.'" />';
     
    }
    
    function charClass() {
      global $sqlServ;
      
      $cmdS1 = "SELECT COUNT(*) AS anz_sura FROM player.player WHERE job='2' OR job='6';";
      $cmdS2 = "SELECT COUNT(*) AS anz_krieger FROM player.player WHERE job='0' OR job='4';";
      $cmdS3 = "SELECT COUNT(*) AS anz_ninja FROM player.player WHERE job='1' OR job='5';";
      $cmdS4 = "SELECT COUNT(*) AS anz_schamane FROM player.player WHERE job='7' OR job='3';";
      
      $getS1 = mysql_fetch_object(mysql_query($cmdS1,$sqlServ));
      $getS2 = mysql_fetch_object(mysql_query($cmdS2,$sqlServ));
      $getS3 = mysql_fetch_object(mysql_query($cmdS3,$sqlServ));
      $getS4 = mysql_fetch_object(mysql_query($cmdS4,$sqlServ));

      $inTyp = 'torte';      
      $inTitel = 'Charakterrassen';
      $inWerte = array($getS1->anz_sura,$getS2->anz_krieger,$getS3->anz_ninja,$getS4->anz_schamane);
      $inStrings = array("Sura","Krieger","Ninja","Schamane");
      
      //Cache-Datei generieren
      
      $cacheTitel = 'STA_'.md5($inTitel).'_'.date("d",time()).date("m",time()).date("y",time()).'.php';
      $cacheContent = "<?PHP /* \n".$inTyp."\n".$inTitel."\n".serialize($inWerte)."\n".serialize($inStrings)."\n */ ?>";
      
      $writeFile = fopen('./pages/admin/cache/'.$cacheTitel,'w');
      fwrite($writeFile,$cacheContent,strlen($cacheContent));
      fclose($writeFile);
      
      
      echo '<img src="./pages/admin/img_stats.php?file='.$cacheTitel.'" title="'.$inTitel.'" alt="'.$inTitel.'" />';
     
    }
    
    function charGender() {
      global $sqlServ;
      
      $cmdS1 = "SELECT COUNT(*) AS anz_male FROM player.player WHERE job='0' OR job='2' OR job='5' OR job='7';";
      $cmdS2 = "SELECT COUNT(*) AS anz_fmale FROM player.player WHERE job='4' OR job='6' OR job='1' OR job='3';";
      
      $getS1 = mysql_fetch_object(mysql_query($cmdS1,$sqlServ));
      $getS2 = mysql_fetch_object(mysql_query($cmdS2,$sqlServ));

      $inTyp = 'torte';      
      $inTitel = 'Charaktergeschlechter';
      $inWerte = array($getS1->anz_male,$getS2->anz_fmale);
      $inStrings = array("männlich","weiblich");
      
      //Cache-Datei generieren
      
      $cacheTitel = 'STA_'.md5($inTitel).'_'.date("d",time()).date("m",time()).date("y",time()).'.php';
      $cacheContent = "<?PHP /* \n".$inTyp."\n".$inTitel."\n".serialize($inWerte)."\n".serialize($inStrings)."\n */ ?>";
      
      $writeFile = fopen('./pages/admin/cache/'.$cacheTitel,'w');
      fwrite($writeFile,$cacheContent,strlen($cacheContent));
      fclose($writeFile);
      
      
      echo '<img src="./pages/admin/img_stats.php?file='.$cacheTitel.'" title="'.$inTitel.'" alt="'.$inTitel.'" />';
     
    }
    
    function charRaceGender() {
      global $sqlServ,$aRassen;
      
      $cmdS1 = "SELECT job, COUNT(*) AS anzPlayer
      FROM player.player
      GROUP BY player.job;";
      $qryS1 = mysql_query($cmdS1,$sqlServ);  
        
      $inTyp = 'torte';      
      $inTitel = 'Charaktere nach Rasse und Geschlecht';
      $inWerte = array();
      $inStrings = array();
      
      while($getS1 = mysql_fetch_object($qryS1)) {
        $inWerte[]=$getS1->anzPlayer;
        $inStrings[]=$aRassen[$getS1->job];
      }
      
      //Cache-Datei generieren
      
      $cacheTitel = 'STA_'.md5($inTitel).'_'.date("d",time()).date("m",time()).date("y",time()).'.php';
      $cacheContent = "<?PHP /* \n".$inTyp."\n".$inTitel."\n".serialize($inWerte)."\n".serialize($inStrings)."\n */ ?>";
      
      $writeFile = fopen('./pages/admin/cache/'.$cacheTitel,'w');
      fwrite($writeFile,$cacheContent,strlen($cacheContent));
      fclose($writeFile);
      
      
      echo '<img src="./pages/admin/img_stats.php?file='.$cacheTitel.'" title="'.$inTitel.'" alt="'.$inTitel.'" />';
     
    }
    
    // Content
    
    echo'<h2>Serverstatistiken</h2>';
    
    ?>
    
    <table>
      <tr>
        <td><?PHP accountStats(); ?></td>
        <td><?PHP charStats(); ?></td>
      </tr>
      <tr>
        <td><?PHP charClass(); ?></td>
        <td><?PHP charGender(); ?></td>
      </tr>
      <tr>
        <td><?PHP  charRaceGender(); /* */ ?></td>
        <td><?PHP ?></td>
      </tr>
    </table>
    
    <?PHP
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>