<?PHP
function createHpTables() {

  global $sqlHp;

  
  
  $cmdHp=array();
  $cmdHp[] = "CREATE TABLE IF NOT EXISTS `is_items` (
    `id` int(10) unsigned NOT NULL AUTO_svlogdatREMENT,
    `vnum` int(10) unsigned NOT NULL,
    `kategorie_id` int(10) unsigned NOT NULL,
    `bild` varchar(50) NOT NULL,
    `beschreibung` varchar(200) NOT NULL,
    `preis` int(10) unsigned NOT NULL,
    `anzeigen` varchar(1) NOT NULL,
    `attrtype0` tinyint(4) NOT NULL DEFAULT '0',
    `attrvalue0` smallint(6) NOT NULL DEFAULT '0',
    `attrtype1` tinyint(4) NOT NULL DEFAULT '0',
    `attrvalue1` smallint(6) NOT NULL DEFAULT '0',
    `attrtype2` tinyint(4) NOT NULL DEFAULT '0',
    `attrvalue2` smallint(6) NOT NULL DEFAULT '0',
    `attrtype3` tinyint(4) NOT NULL DEFAULT '0',
    `attrvalue3` smallint(6) NOT NULL DEFAULT '0',
    `attrtype4` tinyint(4) NOT NULL DEFAULT '0',
    `attrvalue4` smallint(6) NOT NULL DEFAULT '0',
    `attrtype5` tinyint(4) NOT NULL DEFAULT '0',
    `attrvalue5` smallint(6) NOT NULL DEFAULT '0',
    `attrtype6` tinyint(4) NOT NULL DEFAULT '0',
    `attrvalue6` smallint(6) NOT NULL DEFAULT '0',
    `socket0` int(10) unsigned NOT NULL DEFAULT '0',
    `socket1` int(10) unsigned NOT NULL DEFAULT '0',
    `socket2` int(10) unsigned NOT NULL DEFAULT '0',
    `socket3` int(10) unsigned NOT NULL DEFAULT '0',
    `socket4` int(10) unsigned NOT NULL DEFAULT '0',
    `socket5` int(10) unsigned NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
  );";
  
  $cmdHp[] = "CREATE TABLE IF NOT EXISTS `is_kategorien` (
    `id` int(10) unsigned NOT NULL AUTO_svlogdatREMENT,
    `titel` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
  );";
  
  $cmdHp[] = "CREATE TABLE IF NOT EXISTS `is_log` (
    `id` int(10) unsigned NOT NULL AUTO_svlogdatREMENT,
    `account_id` int(10) unsigned NOT NULL,
    `vnum` int(10) unsigned NOT NULL,
    `preis` int(10) unsigned NOT NULL,
    `zeitpunkt` datetime NOT NULL,
    PRIMARY KEY (`id`)
  );";
  
  $cmdHp[] = "CREATE TABLE IF NOT EXISTS `psc_log` (
    `id` int(11) NOT NULL AUTO_svlogdatREMENT,
    `account_id` int(11) NOT NULL,
    `admin_id` int(11) DEFAULT NULL,
    `card_type` varchar(20) NOT NULL,
    `waehrung` varchar(10) NOT NULL,
    `psc_code` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `psc_betrag` decimal(5,2) NOT NULL,
    `psc_pass` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `status` int(1) NOT NULL,
    `kommentar` varchar(200) NOT NULL,
    `datum` datetime NOT NULL,
    PRIMARY KEY (`id`)
  );";
  
  $cmdHp[] = "CREATE TABLE IF NOT EXISTS `server_settings` (
    `id` int(11) NOT NULL AUTO_svlogdatREMENT,
    `variable` varchar(20) NOT NULL UNIQUE,
    `beschreibung` varchar(100) NOT NULL,
    `typ` enum('CHA','BOO','INT','DEC') NOT NULL,
    `value` varchar(20) NOT NULL,
    PRIMARY KEY (`id`)
  );";
  

  
  $cmdHp[] = "INSERT INTO `server_settings` (`variable`, `beschreibung`, `typ`, `value`) VALUES
  ('maxGoldRate', 'Faktor der max. Gold-Drop-Rate', 'DEC', '1');";
  
  $cmdHp[] = "INSERT INTO `server_settings` (`variable`, `beschreibung`, `typ`, `value`) VALUES
  ('expRate', 'Faktor der EXP-Rate', 'DEC', '1');";
  
  $cmdHp[] = "INSERT INTO `server_settings` (`variable`, `beschreibung`, `typ`, `value`) VALUES
  ('minGoldRate', 'Faktor der minimalen Gold-Drop-Rate', 'DEC', '1');";
  
  $cmdHp[]="CREATE TABLE IF NOT EXISTS `ban_log` (
    `id` int(10) unsigned NOT NULL AUTO_svlogdatREMENT,
    `admin_id` int(10) unsigned NOT NULL,
    `account_id` int(10) unsigned NOT NULL,
    `zeitpunkt` datetime NOT NULL,
    `grund` varchar(200) NOT NULL,
    `typ` varchar(5) NOT NULL,
    PRIMARY KEY (`id`)
  );";
  
  $cmdHp[]="CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_svlogdatREMENT,
  `titel` varchar(200) NOT NULL,
  `inhalt` text NOT NULL,
  `datum` int(10) unsigned NOT NULL,
  `hot` tinyint(1) NOT NULL,
  `kategorie` int(10) unsigned NOT NULL,
  `author` int(10) unsigned NOT NULL,
  `anzeigen` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_svlogdatREMENT=1 DEFAULT CHARSET=latin1;";
  
  foreach($cmdHp AS $blub) {
    echo '<p style="font-size:11px;">'.$blub;
    $aktQry = mysql_query($blub,$sqlHp);
    if($aktQry) 
    {
      echo '<br><span style="color: #080">Efectuat cu succes!</a>';
    }
    else
    {
      echo '<br><span style="color: #800">Nu s-a efectuat<br>';
      echo mysql_error();
      echo'</a>';
    }
    echo'</p>';
  }
}

function createGsTables() {

  echo'<h1 class="linkteam5">Baza de date a serverului</h1>';
  
  global $sqlServ;

  $cmdGS=array();

  $cmdGS[]="ALTER TABLE account.account 
    ADD `coins` int(11) NOT NULL DEFAULT '0';";
    
  $cmdGS[]="ALTER TABLE account.account 
    ADD `web_admin` int(1) NOT NULL DEFAULT '0';";
   
  $cmdGS[]="ALTER TABLE account.account 
    ADD `web_ip` varchar(15) NOT NULL;";
    
  $cmdGS[]="ALTER TABLE account.account
    ADD `web_aktiviert` varchar(32) NOT NULL;";
  
  foreach($cmdGS AS $blub) {
    echo '<p style="font-size:11px;">'.$blub;
    $aktQry = mysql_query($blub,$sqlServ);
    if($aktQry) 
    {
      echo '<br><span style="color: #080">Efectuat cu succes</a>';
    }
    else
    {
      echo '<br><span style="color: #800">Nu s-a efectuat<br>';
      echo mysql_error();
      echo'</a>';
    }
    echo'</p>';
  }
  
  
  
}

if(isset($_GET['step']) && !empty($_GET['step'])) {

  if($_GET['step']==1) {
    ?>
	<!-- CSS start -->    
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
<link rel="stylesheet" href="css/fonts.css" type="text/css" charset="utf-8" />
<!-- CSS stop --> 
    <h1 class="linkteam5">Configurarea conexiunii cu baza de date (DB)</h1>
    <br /><br /><br />
    <center>
	<form action="click.php?step=2" method="POST">
      <table class="linkteam4">
        <tr>
          <td>Titlu website</td>
          <td><input type="text" size="40" maxlength="50" value="" name="titlu_pagina"/> </td>
        <tr>
        <tr>
          <td>Titlu scurt</td>
          <td><input type="text" size="20" maxlength="50" value="" name="titlu_scurt"/></td>
        <tr>
        <tr>
          <td>URL-ul website-ului (farã ultimul slaºh) </td>
          <td><input type="text" size="30" maxlength="50" value="" name="url"/> (de exemplu: "http://metin.ro")</td>
        <tr>
        <tr>
          <td>Activezi înregistrarea pe server?</td>
          <td>
            <select name="activare_inregistrare">
              <option selected="selected" value="true">Activez înregistrarea pe server</option>
              <option value="false">Dezactivez înregistrarea pe server</option>
            </select>
          </td>
        <tr>
        <tr>
          <td>Activezi activarea contului prin e-mail?</td>
          <td>
            <select name="activare_email">
              <option value="true">Activez </option>
              <option selected="selected" value="false">Dezactivez</option>
            </select>
          </td>
        <tr>
        <tr>
          <td>Câte mesaje doresti sa aparã pe prima paginã?</td>
          <td><input type="text" size="20" maxlength="50" value="30" name="prima_pagina"/></td>
        <tr>
        <tr>
          <td>E-mailul de pe care se vor face expedierile de confirmare cont</td>
          <td><input type="text" size="20" maxlength="50" value="registration@metin.ro" name="reg_mail"/></td>
        <tr>
        <tr>
          <td>E-mailul de pe care se vor face expedierile de schimbare parola cont/depozit/etc</td>
          <td><input type="text" size="20" maxlength="50" value="password@metin2.ro" name="pass_mail"/></td>
        <tr>
      </table>
      <br /><br /><br />
      <h1 class="linkteam5">SQL - Server - Date</h1>
      <br /><br /><br />
      <table class="linkteam4" >
        <tr>
          <th colspan="2" style="text-align:left;">Server - Bazã de date</th>
        </tr>
        <tr>
          <td>SQL - Server (Pune IP-ul .100)</td>
          <td><input type="text" size="20" maxlength="50" name="sqlserver_game"/></td>
        <tr>
        <tr>
          <td>SQL - Utilizator (standard:root)</td>
          <td><input type="text" size="20" maxlength="50" value="root" name="sqluser_game"/></td>
        <tr>
        <tr>
          <td>SQL - Parolã (Parolã Navicat DB)</td>
          <td><input type="text" size="20" maxlength="50" name="sqlpass_game"/></td>
        <tr>
        <tr>
          <th colspan="2" style="text-align:left;">Configurare WebSite</th>
        </tr>
        <tr>
          <td>SQL-Server (WebSite)(IP-ul .100)</td>
          <td><input type="text" size="20" maxlength="50" name="sqlserver_hp"/></td>
        <tr>
        <tr>
          <td>SQL-User (WebSite)(standard:root)</td>
          <td><input type="text" size="20" maxlength="50" value="root" name="sqluser_hp"/></td>
        <tr>
        <tr>
          <td>SQL-Parola (WebSite)(Parola Navicat)</td>
          <td><input type="text" size="20" maxlength="50" name="sqlpass_hp"/></td>
        <tr>
        <tr>
          <td>SQL-Bazã de date (WebSite)(ex:account, ori alta fila)</td>
          <td><input type="text" size="20" maxlength="50" value="account" name="sqldb_hp"/></td>
        <tr>
        <tr>
          <td></td>
        <tr>
      </table>
	  <br /><br />
	  <input type="submit" class="btn2 s2" name="Urmãtorul Pas" value="Urmãtorul Pas"/>
    </form>
	</center>
	
    <?PHP 
	
  }
  
  elseif($_GET['step']==2) {
    
    echo'<h2 align="center">Creare Configurare<h2>';
  
    
  
    $checkGS = @mysql_connect($_POST['sqlserver_game'],$_POST['sqluser_game'],$_POST['sqlpass_game']);
    $checkHP = @mysql_connect($_POST['sqlserver_hp'],$_POST['sqluser_hp'],$_POST['sqlpass_hp']);
    $checkDB = @mysql_select_db($_POST['sqldb_hp'],$checkHP);
    
    if(!$checkGS || !$checkHP || !$checkDB)
    {
      echo'<p><b>Eroare:</b><br>';
      if(!$checkGS) echo'- Nu am putut realiza conexiunea cu serverul<br>';
      if(!$checkHP) echo'- Nu am gasit baya de date specificata<br>';
      if(!$checkDB) echo'- Nu am putut realiza conexiunea cu baza de date<br>';
      
      echo'<b><a href="javascript:history.back()">Inapoi</a></b>';
      
      echo'</p>';
    }
    
    foreach($_POST AS $bla=>$bla2)
    {
      $_POST[$bla]=str_replace('"','\"',$_POST[$bla]);
      $_POST[$bla]=str_replace("'","\'",$_POST[$bla]);
    }
  
    $cfgContent ='<?PHP
    
      DEFINE(\'SQL_HOST\', \''.$_POST['sqlserver_game'].'\');
      DEFINE(\'SQL_USER\', \''.$_POST['sqluser_game'].'\');
      DEFINE(\'SQL_PASS\', \''.$_POST['sqlpass_game'].'\');
      
      DEFINE(\'SQL_HP_HOST\', \''.$_POST['sqlserver_hp'].'\');
      DEFINE(\'SQL_HP_USER\', \''.$_POST['sqluser_hp'].'\');
      DEFINE(\'SQL_HP_PASS\', \''.$_POST['sqlpass_hp'].'\');
      DEFINE(\'SQL_HP_DB\', \''.$_POST['sqldb_hp'].'\');
      
      $serverSettings[\'titel_page\']="'.$_POST['titlu_pagina'].'";         // Webseiten-Titel
      $serverSettings[\'titel\']="'.$_POST['titlu_scurt'].'";                           // Servername
      $serverSettings[\'url\']="'.$_POST['url'].'";                     // URL zur Seite (ohne letzten "/")
      $serverSettings[\'server_ip\']="";                         // Server-IP
      $serverSettings[\'register_on\']='.$_POST['activare_inregistrare'].';                              // Registration aktiviert (ja = true / nein = false)
      $serverSettings[\'mail_activation\']='.$_POST['activare_email'].';                          // Mailaktivierung (ja = true / nein = false)
      $serverSettings[\'page_entries\']='.$_POST['prima_pagina'].';                               // Einträge pro Seite
      $serverSettings[\'reg_mail\']=\''.$_POST['reg_mail'].'\';                   // E-Mail-Absender bei Registration
      $serverSettings[\'pass_mail\']=\''.$_POST['pass_mail'].'\';                 // E-Mail-Absender bei Passwortreset
      
      require("daten.svlogdat.php");
      
    ?>';

    $cfgFile = fopen('./svlogdat/svconfsig.php','w+');
    
    $writeCfg = fwrite($cfgFile,$cfgContent);
  
    if($writeCfg)
    {
      echo'
        <h3 align="center">Configurarea a fost creeatã cu succes!</h3><br>
        <a href="click.php?step=3" ><h1 align="center">Înainte</h1></a>';
     
    }
  
  }
  elseif($_GET['step']==3) {
    echo'<h1 class="linkteam5">Crearea Tabelelor în Baza de Date</h1>';
    require_once('./svlogdat/click.svlogdat.php');
    
    $sqlHp = mysql_connect(SQL_HP_HOST, SQL_HP_USER, SQL_HP_PASS);
    $sqlServ = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS);
    $selectHpDb = mysql_select_db(SQL_HP_DB,$sqlHp);
    
    if(!is_resource($sqlServ) OR !is_resource($sqlHp) OR !$selectHpDb) {
      exit("S-a pierdut conexiunea la baza de date");
    }
    
    createHpTables();
    createGsTables();
    
    ?>
	<!-- CSS start -->    
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
<link rel="stylesheet" href="css/fonts.css" type="text/css" charset="utf-8" />
<!-- CSS stop --> 
    <p class="linkteam5">Pentru ca website-ul sa functioneze pe webhost va rugam sa 
    dati permisiunea '777' la toate fisierele.
   
    
    Exemplu:
    ./is_img/: CHMOD 777
    ./archives/: CHMOD 777 (si tot asa la toate fisierele)
    </p>
    <br /><br /><br />
    <a href="click.php?step=4" class="btn2 s2">Pasul urmator</a>
    <?PHP
    
  }
  elseif($_GET['step']==4) 
  {
    echo'<p class="linkteam5"><b>Stabilirea administratorului</b></p>';
    
    if(!isset($_POST['submit']) && !$_POST['submit']=='Actualizare')
    {
    ?>
    <!-- CSS start -->    
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
<link rel="stylesheet" href="css/fonts.css" type="text/css" charset="utf-8" />
<!-- CSS stop --> 
    <p class="linkteam7">Adaugati un cont existent pentru a-i atribui drepturi de administrator!</p>
    <form action="prot.php?step=4" method="POST">
    <input type="text" size="16" maxlength="20" name="account">
    <input type="submit" name="submit" class="btn2 s2" value="Actualizare">
    </form>
    
    <p><b>În cele din urmã, stergeti click.php!</b></p>
    <?PHP
    }
    else {
    
      if(!empty($_POST['account']))
      {
      
        require_once('./svlogdat/svconfsig.php');
    
        $sqlHp = mysql_connect(SQL_HP_HOST, SQL_HP_USER, SQL_HP_PASS);
        $sqlServ = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS);
        $selectHpDb = mysql_select_db(SQL_HP_DB,$sqlHp);
        
        if(!is_resource($sqlServ) OR !is_resource($sqlHp) OR !$selectHpDb) {
          exit("Conexiunea la baza de date nu a reusit.");
        }
        
        $userAccount = mysql_real_escape_string($_POST['account']);
        
        $checkAccount = "SELECT id,login FROM account.account WHERE login='".$userAccount."' LIMIT 1";
        $queryAccount = mysql_query($checkAccount,$sqlServ);
        if(mysql_num_rows($queryAccount)>0) 
        {
          $sqlUpdate = "UPDATE account.account SET web_admin='9' WHERE login='".$userAccount."' LIMIT 1";
          $qryUpdate = mysql_query($sqlUpdate,$sqlServ);
          
          if($qryUpdate)
          {
            echo'Cont Adaugat.Acum puteti sterge prot.php<br><a href="index.php" >Catre Site</a>';
          }
          
        }
        else
        {
          echo'Contul nu exista <a href="click.php?step=4">Repeta!</a>';
        }
      }
      else
      {
        echo'Aceasta actiune nu a fost luata in considerare. <a href="click.php?step=4">Repeta!</a>';
      }
    
    }
  }

}
else {
?>
<!-- CSS start -->    
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
<link rel="stylesheet" href="css/fonts.css" type="text/css" charset="utf-8" />
<!-- CSS stop --> 
  <br /><br /><br /><br /><br /><br /><br />
  <img src="images/prot/prot.png" alt="GraphicsAngel">
  <br /><br /><br />
<?PHP
}
?>