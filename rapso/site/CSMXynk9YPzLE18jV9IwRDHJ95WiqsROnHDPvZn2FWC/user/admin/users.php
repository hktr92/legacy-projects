<?PHP
  if($_SESSION['user_admin']>=$adminRights['acc_ansicht']) {
  
    echo '<h2>Administrare - editare cont</h2>';
    
    if(isset($_GET['acc']) && !empty($_GET['acc'])) 
    {
      $sqlCmd = "SELECT login,status FROM account.account WHERE id='".$_GET['acc']."' LIMIT 1";
      $sqlQry = mysql_query($sqlCmd,$sqlServ);
      if(mysql_num_rows($sqlQry)>0) 
      {
        $accData = mysql_fetch_object($sqlQry);
        
        echo'<h3><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Editare "'.$accData->login.'"<br/><br/></h3>';
        echo'<div class="splitLeft">';
        echo'<ul class="menue">';
        
        echo'<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=chars&acc='.$_GET['acc'].'">Profil caractere</a></li>';
        echo'<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=rights&acc='.$_GET['acc'].'">Drepturile utilizatorului</a></li>';
        /*echo'<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=psc_add&acc='.$_GET['acc'].'">Add PSC for this account</a></li>';*/
        echo'<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=coins&acc='.$_GET['acc'].'">Schimbare monede</a></li>';
        echo'<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=create_item&acc='.$_GET['acc'].'">Modare iteme</a></li>';
        if($accData->status=='OK') 
        {
          echo'<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=ban&acc='.$_GET['acc'].'">Blocare cont</a></li>';
        }
        elseif($accData->status=='BLOCK') 
        {
          echo'<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=unban&acc='.$_GET['acc'].'">Deblocare cont</a></li>';
        }
        echo'</ul>';
        echo'</div>';
        echo'<div class="splitRight">';
        
        $sqlBanlog = "SELECT * FROM ".SQL_HP_DB.".ban_log WHERE account_id='".$_GET['acc']."'";
        $qryBanlog = mysql_query($sqlBanlog,$sqlHp);
        
        echo'<h3><i>Log blocare cont</i></h3>
        <table>
        <tr>
          <th class="topLine">Stare&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th class="topLine">Timp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th class="topLine">Admin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        </tr>';
        while($getBanlog = mysql_fetch_object($qryBanlog)) {
          echo'<tr>
            <td class="tdunkel">'.$getBanlog->typ.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td class="tdunkel">'.$getBanlog->zeitpunkt.'&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td class="tdunkel"><a href="index.php?s=admin&a=users&acc='.$getBanlog->admin_id.'">'.$getBanlog->admin_id.'</a></td>
          </tr>
          <tr>
            <td class="thell" colspan="3">Motiv: '.$getBanlog->grund.'<br/><br/></td>
          </tr>';
        }
        echo'</table><br/><br/>';
        echo'</div>';
      }
      else
      {
        echo'<p>ID-ul contului introdus nu exist&#259;.</p>';      
      }
    }
    else 
    {
      echo'<p class="meldung">Nu a&#355;i introdus nici un ID.</p>';
    }
    
  }
  else {
    echo'<p class="meldung">>Nu ave&#355;i acces la aceast&#259; zon&#259;!</p>';
  }
?><br/><br/><br/><br/><br/><br/>
<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>