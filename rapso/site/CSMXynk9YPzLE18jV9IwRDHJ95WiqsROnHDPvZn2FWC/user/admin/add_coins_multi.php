<!--
Simbol   Cod HTML    Unicode 
  a       &#259;      U0103 
  A       &#258;      U0102 
  â       &#226;      U00E2 
  Â       &#194;      U00C2 
  î       &#238;      U00EE 
  Î       &#206;      U00CE 
  t       &#355;      U0163 
  T       &#354;      U0162 
  s       &#351;      U015F 
  S       &#350;      U015E 
-->
<?PHP
  if($_SESSION['user_admin']>=$adminRights['multi_coins']) {
  
  echo'<h2>Administrare - ad&#259;ugare monede(multi utilizator)</h2>';
  echo'<p>&#206;n aceast&#259; zon&#259; pute&#355;i ad&#259;uga Monede la mai mul&#355;i utilizatori. Aceast&#259; func&#355;ie necesit&#259; un anumit format:<br/>
  <b>ID-ul Contului||Monedele</b> Exemplu: (ExCont||1000)</p>';
  
  if(isset($_POST['aufladen']) && $_POST['aufladen']=="Adauga") {
    echo'<h3>Rezult&#259;</h3>';
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
            echo'<p><b>Linia '.($x+1).' <img src="./img/icons/success.gif"/>: Monedele contului <u>'.$userLogin.'</u> au fost setate la <u>'.$userCoins.'</u> !</b></p>';
          }
          else 
          {
            $fehlerZeilen[]=$x;
            echo'<p><b>Linia '.($x+1).' <img src="./img/icons/fail.gif"/>: '.$aktZeile.'</b> (SQL-Qry)</p>';
          }
          
        }
        else 
        {
          $fehlerZeilen[]=$x;
          echo'<p><b>Linia '.($x+1).' <img src="./img/icons/fail.gif"/>: '.$aktZeile.'</b> (nu exist&#259;)</p>';
        }
      
      }
      else {
        $fehlerZeilen[]=$x;
        echo'<p><b>Linia '.($x+1).' <img src="./img/icons/fail.gif"/>: '.$aktZeile.'</b> (Data format)</p>';
      }
    }
    
    if(!(count($fehlerZeilen)==0)) 
    {
      echo'<h3>Finiile gresite</h3>';
      echo'<p>Urmatoarele linii ar trebui s&#259; fie verificate pentru prezen&#355;a erorilor si apoi s&#259; fie trimise din nou.</p>';
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
<table>
  <tr>
    <th class="topLine">
      Introduce&#355;i datele:<br/><br/>
      ID-ul contului||monedele<br/>
      Exemplu: (ExCont||1000)
    </th>
    <td class="thell">
      <textarea cols="35" rows="5" name="inputCoins"></textarea>
    </td>
  </tr>
  <tr>
    <th class="topLine" colspan="2">
      <input type="submit" name="aufladen" value="Adauga"/>
    </th>
  </tr>
</table>
</form>
<?PHP
  }
  else {
    echo'<p class="meldung">Nu ave&#355;i acces la aceast&#259; zon&#259;!</p>';
  }
?>
<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>