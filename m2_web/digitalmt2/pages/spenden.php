<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Lista PReturi</h3>
        <div class="big-line"></div>
	<p>Euro</p>
	<table width="168" border="0" align="center">
  <tr>
    <td width="84" class="topLine">10 Euro</td>
    <td width="74" class="tdunkel">100 Coins</td>
  </tr>
  <tr>
    <td class="topLine">25 Euro</td>
    <td class="tdunkel">250 Coins</td>
  </tr>
  <tr>
    <td class="topLine">50 Euro</td>
    <td class="tdunkel">500 Coins</td>
  </tr>
  <tr>
    <td class="topLine">100 Euro</td>
    <td class="tdunkel">1.000 Coins</td>
  <tr>
</table>
	<p>Lei</p>
	<table width="168" border="0" align="center">
  <tr>
    <td width="84" class="topLine">25 Lei</td>
    <td width="74" class="tdunkel">50 Coins</td>
  </tr>
  <tr>
    <td class="topLine">75 Lei</td>
    <td class="tdunkel">85 Coins</td>
  </tr>
  <tr>
    <td class="topLine">150 Lei</td>
    <td class="tdunkel">150 Coins</td>
  </tr>
</table>
    </div>
    <div class="bottom"></div>
</div>
<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Doneaza</h3>
        <div class="big-line"></div>
        <?
        if(!empty($_SESSION['need_pwchange'])) {
          echo '<b style="color: red;">Datorita unei vulnerabilitati in sistem sunteti rugat sa va schimbati parola contului. Atentie! Nu folositi date pe care le-ati mai folosit in trecut!</b>';
         } else {
        ?>
        <iframe src="http://ni182915_1.vweb10.nitrado.net/index.php?account_id=<?=$_SESSION['user_id']?>" frameborder="0" width=600 height=400></iframe>
         <?php } ?>
    </div>
    <div class="bottom"></div>
</div>