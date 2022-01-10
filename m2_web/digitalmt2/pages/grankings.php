<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Gilden</h3>
        <div class="big-line"></div>
<center>
<?PHP
$handle = fopen("grankings/lastsave.txt", "a+");
$content = @fread($handle, @filesize("grankings/lastsave.txt"));
fclose($handle);

$aktuell = time();

if($content + 15 * 60 >= $aktuell)
{
	$handle = fopen("grankings/save.txt", "a+");
	$content = @fread($handle, @filesize("grankings/save.txt"));
	fclose($handle);
	echo $content;
} else { 
	$content = "";
  @unlink("grankings/lastsave.txt");
  @unlink("grankings/save.txt");
  $handle = fopen("grankings/lastsave.txt", "a+");
  fwrite($handle, time());
  fclose($handle);
  $CPSeite = 50;
  $markierteZeile=0;
  if(isset($_GET['p'])) {
    if(!checkInt($_GET['p']) || !($_GET['p']>0)) $aSeite = 1;
    else $aSeite = $_GET['p'];
  }
  else { $aSeite = 1; }
  
  if(isset($_POST['suche']) && $_POST['suche']=='suchen') {
    if(!empty($_POST['charakter'])) {
      $sqlCmd="SELECT win, loss, draw, name, level , exp, master
      FROM (
      
        SELECT win, loss, draw, name, level , exp, master, @num := @num +1 AS rang
        FROM (
        
          SELECT SELECT win, loss, draw, name, level , exp, master, @num :=0
          FROM player.guild
          ORDER BY win DESC, loss ASC, draw ASC, level DESC , exp DESC
          
        ) AS t1
        
      ) AS t2
      
      WHERE name LIKE '".mysql_real_escape_string($_POST['charakter'])."' LIMIT 1";
      $sqlQry=mysql_query($sqlCmd,$sqlServ);
      if(mysql_num_rows($sqlQry)>0) {
      
        $getRang = mysql_fetch_object($sqlQry);
        $aSeite = ceil($getRang->rang/$CPSeite);
        $markierteZeile = $getRang->rang;
      }
      
    }
    
  }
  
  $sqlCmd = "SELECT COUNT(*) as summeChars  
  FROM player.guild 
  ORDER BY win DESC, loss ASC, draw ASC, level DESC, exp DESC";
  
  $sqlQry = mysql_query($sqlCmd,$sqlServ);
  
  $getSum = mysql_fetch_object($sqlQry);
  $cSeite = calcPages($getSum->summeChars,$aSeite,$CPSeite);
  
  $maxRange = 5;
  $maxStep = 15;
  if(($aSeite-$maxRange)>0) $sStart = $aSeite-$maxRange;
  else $sStart = 1;
  if(($aSeite+$maxRange)<=$cSeite[0]) $sEnde = $aSeite+$maxRange;
  else $sEnde = $cSeite[0];
  $content .='<table style="width: 100%;"><tr><th class="topLine">Platz</th><th class="topLine">Name</th><th class="topLine">Siege</th><th class="topLine">Niederlagen</th><th class="topLine">Leader</th></tr>';
  $sqlCmd = "SELECT name, level , exp, master, win, loss, draw
  FROM player.guild 
  ORDER BY win DESC, loss ASC, draw ASC, level DESC, exp DESC
  LIMIT ".$cSeite[1].",".$CPSeite;
  //echo $sqlCmd;
  $sqlQry = mysql_query($sqlCmd,$sqlServ);
  $x=$cSeite[1]+1;
  while($getPlayers = mysql_fetch_object($sqlQry)) {
    $zF = ($x%2==0) ? "thell" : "tdunkel";
    if(checkInt($markierteZeile) && $markierteZeile==$x) { $zF = "tmarkiert"; }
    $content .= "<tr>";
    $content .= "<td class=\"$zF\">".$x."</td>";
    $content .= "<td class=\"$zF\">".$getPlayers->name."</td>";
    $content .= "<td class=\"$zF\">".$getPlayers->win."</td>";
	$content .= "<td class=\"$zF\">".$getPlayers->loss."</td>";
	$sql = "SELECT `name` FROM `player`.`player` WHERE `id`='".$getPlayers->master."'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)!=''){
		
    	$content .= "<td class=\"$zF\">".mysql_result($result, 0, 'name')."</td>";
		
	} else {
		
		$content .= "<td class=\"$zF\">Error Charackter not Found</td>";
		
	}
    $content .= "</tr>";
    
    $x++;
    
  }
  $content .= "</table>";
  
  echo $content;
	
  $handle = fopen("grankings/save.txt", "a+");
  fwrite($handle, $content);
  fclose($handle);
 }
?>
</center>
   </div>
    <div class="bottom"></div>
</div>
