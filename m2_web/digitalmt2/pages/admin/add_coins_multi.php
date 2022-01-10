<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>MultiCoins</h3>
        <div class="big-line"></div>
<?PHP
  if($_SESSION['user_admin']>=$adminRights['multi_coins']) {
  
  echo'<h2>Admin - Coins aufladen (Multiuser)</h2>';
  echo'<p>Auf dieser Seite k&ouml;nnen mehrere Accounts gleichzeitig per Eingabe mit Coins aufgeladen werden. Die Eingabe bedarf eines bestimmten Formates:<br/>
  <b>LoginID||zu addierende Coins</b> (Beispiel: BspAccount||1000)</p>';
  
  if(isset($_POST['aufladen']) && $_POST['aufladen']=="aufladen") {
    echo'<h3>Ergebnis</h3>';
    $zeilen=explode("\n",$_POST['inputCoins']);
    $mengeZeilen = count($zeilen);
    $fehlerZeilen=array();
    for($x=0;$x<$mengeZeilen;$x++) {
      $aktZeile=$zeilen[$x];
      $rowData = explode("||",$zeilen[$x]);
      $userLogin = (isset($rowData[0])) ? trim($rowData[0]) : "";
      $userCoins = (isset($rowData[1])) ? trim($rowData[1]) : "";
      if(checkAnum($userLogin) && checkInt($userCoins)) {
      
        $sqlUser = "SELECT id FROM account.account WHERE login='".$userLogin."' LIMIT 1";      
        $qryUser = mysql_query($sqlUser,$sqlServ);
        if(mysql_num_rows($qryUser)>0) {
          $sqlCoins = "UPDATE account.account SET coins=coins+".$userCoins." WHERE login='".$userLogin."' LIMIT 1";
          $qryCoins = mysql_query($sqlCoins,$sqlServ);
          
          if($qryCoins) 
          {
            echo'<p><b>Zeile '.($x+1).' <img src="./img/success.gif"/>: Die Coins f&uuml;r den Account <u>'.$userLogin.'</u> wurden um <u>'.$userCoins.'</u> erh&ouml;ht</b></p>';
          }
          else 
          {
            $fehlerZeilen[]=$x;
            echo'<p><b>Zeile '.($x+1).' <img src="./img/fail.gif"/>: '.$aktZeile.'</b> (SQL-Qry)</p>';
          }
          
        }
        else 
        {
          $fehlerZeilen[]=$x;
          echo'<p><b>Zeile '.($x+1).' <img src="./img/fail.gif"/>: '.$aktZeile.'</b> (Existiert nicht)</p>';
        }
      
      }
      else {
        $fehlerZeilen[]=$x;
        echo'<p><b>Zeile '.($x+1).' <img src="./img/fail.gif"/>: '.$aktZeile.'</b> (Datenformat)</p>';
      }
    }
    
    if(!(count($fehlerZeilen)==0)) 
    {
      echo'<h3>Fehlerhafte Zeilen</h3>';
      echo'<p>Folgende Zeilen sollten auf Fehler &uuml;berpr&uuml;ft werden und dann noch einmal abgesendet werden.</p>';
      echo'<p class="meldung">';
      foreach($fehlerZeilen AS $aktFehler) 
      {
        $fehlerZeile = trim($zeilen[$aktFehler]);
        if(!empty($fehlerZeile)) 
        {
          echo $fehlerZeile.'<br/>';
        }
      }
      echo'</p>';
    }  
    
  }
  
?>
<form method="POST" action="index.php?s=admin&a=add_coins_multi">
<table width="100%">
  <tr>
    <th class="topLine">
      Daten eingeben:<br/><br/>
     
    </th>
    <td class="thell">
      <textarea cols="40" rows="5" name="inputCoins"></textarea>
     

    </td>
  </tr>
  <tr>
    <th class="topLine" colspan="2">
      <input type="submit" name="aufladen" value="aufladen"/>
    </th>
  </tr>
</table>
</form>
<?PHP
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>    </div>
    <div class="bottom"></div>
</div>