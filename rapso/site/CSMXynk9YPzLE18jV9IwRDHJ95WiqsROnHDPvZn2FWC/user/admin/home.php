<?PHP
  if($_SESSION['user_admin']>0) {
?>
<h2>Administrare - prezentare general&#259;</h2>
<br>
<div class="splitLeft">
   <h5>&nbsp;&nbsp;&nbsp;&nbsp;Gestionare utilizatori</h5>
  <ul class="menue">
    <li><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=user">C&#259;utare cont</a></h3></li>
	<li><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=itemsearch">C&#259;utare iteme</a></h3></li>
	<li><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=iplist">C&#259;utare IP-uri</a></h3></li>
	<li><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=banlist">Conturi blocate</a></h3></li>
    <li><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=charlist">C&#259;utare caractere</a></h3></li>
    <li><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=add_coins_multi">Ad&#259;ugare monede (multi utilizator)</a></h3></li>
	<li><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=add_jcoins_multi">Ad&#259;ugare jetoane (multi utilizator)</a></h3></li>
  </ul>
  </div>
<div class="splitRight">
   </ul>
   </ul>
    <h5>Logs</h5>
  <ul class="menue">
    <li><h3>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=gmlog">Log GM</a></h3></li>
    <li><h3>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=hacklog">Log Hack</a></h3></li>
  </ul>  

   <!-- <li><h3>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=admin&a=stat">Statistici2</a></h3></li>-->
  </ul>
  <!--<h5>Chat</h5>
  <ul class="menue">
    <li><h3>&nbsp;&nbsp;&nbsp;&nbsp;<a href="chat">Chat</a></h3></li>
    <li><h3>&nbsp;&nbsp;&nbsp;&nbsp;<a href="chat/admin/">Administrare chat</a></h3></li>
  </ul>--><br/><br/><br/>
  </div>
<?PHP
  }
  else {
    echo'<p class="meldung">Nu ave&#355;i acces la aceast&#259; zon&#259;!</p>';
  }
  
?>
