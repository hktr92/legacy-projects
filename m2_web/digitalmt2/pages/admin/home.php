<?PHP
  if($_SESSION['user_admin']>0) {
?>
<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>User-Verwaltung</h3>
        <div class="big-line"></div>
  <ul class="menue">
    <li><a href="index.php?s=admin&a=user">Accountsuche</a></li>
    <li><a href="index.php?s=admin&a=banliste">Banliste</a></li>
    <li><a href="index.php?s=admin&a=iplist">IP-Suche</a></li>
    <li><a href="index.php?s=admin&a=charlist">Charaktersuche</a></li>
    <li><a href="index.php?s=admin&a=itemsuche">Itemsuche</a></li>
    <li><a href="index.php?s=admin&a=create_item">Item-Erstellung</a></li>
	<li><a href="index.php?s=admin&a=commandLog">Command Log</a></li>

    <li><a href="index.php?s=admin&a=add_coins_multi">Coins aufladen (Multiuser)</a></li>
  </ul>
    </div>
    <div class="bottom"></div>
</div>
<div style="margin-top: 40px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Itemshop Verwaltung</h3>
        <div class="big-line"></div>
  <ul class="menue">
    <li><a href="index.php?s=admin&a=is_kat">Kategorien</a></li>
    <li><a href="index.php?s=admin&a=is_items">Items</a></li>
    <li><a href="index.php?s=admin&a=is_log">Log</a></li>
    <li><a href="index.php?s=admin&a=voucher">Voucher-Datenbank</a></li>
  </ul>
    </div>
    <div class="bottom"></div>
</div>
<div style="margin-top: 40px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Datenbank Verwaltung</h3>
        <div class="big-line"></div>
  <ul class="menue">

    <li><a href="index.php?s=admin&a=change_rates">Rates ver&auml;ndern</a></li>
    <li><a href="index.php?s=admin&a=stats">Statistiken</a></li>
  </ul>
    </div>
    <div class="bottom"></div>
</div>

 
<?PHP
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
  
?>