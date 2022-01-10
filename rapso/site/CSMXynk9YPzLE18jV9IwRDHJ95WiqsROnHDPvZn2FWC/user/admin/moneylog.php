<h2>Administrare - Log Yang</h2>
<p><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pe aceast&#259; pagin&#259; pute&#355;i urm&#259;ri ultimele 10 activit&#259;&#355;i cu yang.<br><br></p>
<table> 
<tr>
  <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;De la</th>
  <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tip</th>
  <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang</th>
  <th class="topLine">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Or&#259;</th>
</tr>
<?PHP
 if(isset($_SESSION['user_admin']) && checkInt($_SESSION['user_admin']) && $_SESSION['user_admin']>=0) {
 
	$sqlCmd = "SELECT COUNT(*) AS cnt FROM log.money_log LIMIT 100";
    $sqlQry = mysql_query($sqlCmd,$sqlServ);
    $anza = mysql_fetch_object($sqlQry);
    $cntEintraege = $anza->cnt;
    if(isset($_GET['p'])) {
      $aktSeite = (!checkInt($_GET['p'])) ? 0 : $_GET['p'];
    }
    else {
      $aktSeite=0;
    }
    if($aktSeite==0) $aktSeite=1;
    $test = calcPages($cntEintraege,$aktSeite,$serverSettings['page_entries']);
	
	$ergebnis = mysql_query("SELECT vnum,type,gold,time from log.money_log ORDER BY time DESC LIMIT ".$test[1].",".$serverSettings['page_entries']);

	 echo'<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pagin&#259;: ';
    for($i=1;$i<=$test[0];$i++) {
    
	if($i<=50) {
	
      echo'<a href="index.php?a=moneylog&p='.$i.'">';
      if($aktSeite==$i) { echo'<u>'.$i.'</u>'; }
      else { echo $i; }
      echo'</a> ';
    }
    }
    echo'</p>';
	
	
	while($row = mysql_fetch_object($ergebnis))
{


    echo "<tr>";
    echo '<td class="thell">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row->vnum.'</td>';
    echo '<td class="thell">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row->type.'</td>';
    echo '<td class="thell">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row->gold.'</td>';
	echo '<td class="thell">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row->time.'</td>';
    echo "</td>";
    echo "</tr>";
}
echo'</table>';

  
  }
    else {
    echo'<p class="meldung">&nbsp;&nbsp;&nbsp;&nbsp;Nu ave&#355;i acces la aceast&#259; zon&#259;!</p>';
  }
  include ('inc/config.inc.php');
$account  = mysql_connect(SQL_HOST,SQL_USER,SQL_PASS);
if($_POST['submit']){
$vnum = $_POST['vnum'];
$delete = "DELETE FROM log.command_log WHERE vnum = '".$vnum."'";
$query  = mysql_query($delete);
if(!$query) {
    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Log-urile adresei IP introduse nu pot fi &#351;terse!';
    } else { 
    echo '<font color="#669900">&nbsp;&nbsp;&nbsp;&nbsp;Log-urile adresei IP introduse au fost &#351;terse!</font>'; }
}
?><br/><br/><br/>
<center>
<form action="" method="post">
Introduce&#355;i adresa IP:<br>
<input class="txt" name="vnum">  <input type="submit" name="submit" value="&#350;terge" class="btn-bg"/>
</center><br/>
</form>
  
  <div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>