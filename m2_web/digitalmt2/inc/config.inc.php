<?PHP
    
      DEFINE('SQL_HOST', ' ');
      DEFINE('SQL_USER', ' ');
      DEFINE('SQL_PASS', ' ');
      
      DEFINE('SQL_HP_HOST', ' ');
      DEFINE('SQL_HP_USER', ' ');
      DEFINE('SQL_HP_PASS', ' ');
      DEFINE('SQL_HP_DB', ' ');
      
      DEFINE('SQL_FORUM_HOST', ' ');
      DEFINE('SQL_FORUM_USER', ' ');
      DEFINE('SQL_FORUM_PASS', ' ');
      DEFINE('SQL_FORUM_DB', ' ');
      
      $serverSettings['titel_page']="Digital Metin2";         // Webseiten-Titel
      $serverSettings['titel']="Digital Metin2";                           // Servername
      $serverSettings['url']="http://digitalmt2.ro";                     // URL zur Seite (ohne letzten "/")
      $serverSettings['server_ip']=" ";                         // Server-IP
      $serverSettings['register_on']=false;                              // Registration aktiviert (ja = true / nein = false)
      $serverSettings['mail_activation']=false;                          // Mailaktivierung (ja = true / nein = false)
      $serverSettings['page_entries']=30;                               // Eintr�ge pro Seite
      $serverSettings['reg_mail']='no-reply@digitalmt2.ro';                   // E-Mail-Absender bei Registration
      $serverSettings['pass_mail']='no-reply@digitalmt2.ro';                 // E-Mail-Absender bei Passwortreset
      
      require("daten.inc.php");
      
    ?>