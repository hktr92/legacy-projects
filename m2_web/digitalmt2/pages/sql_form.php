<?PHP

$dateii = "./pages/test.txt";
$dateiInh = file($dateii);

echo $sqlZeit;

echo'INSERT INTO player.player (id,name,x,y,z,map_index,level,ip,last_play) VALUES <br/>';

foreach($dateiInh as $aktZeile) {
  $splitZeile=explode("\t",trim($aktZeile));
  //echo $aktZeile;
  echo'(\''.trim($splitZeile[0]).'\',';
  echo'\''.trim($splitZeile[1]).'\',';
  echo'\''.trim($splitZeile[2]).'\',';
  echo'\''.trim($splitZeile[3]).'\',';
  echo'\''.trim($splitZeile[4]).'\',';
  echo'\''.trim($splitZeile[5]).'\',';
  echo'\''.trim($splitZeile[6]).'\',';
  echo'\''.trim($splitZeile[7]).'\',';
  echo'\''.trim($splitZeile[8]).'\'';
  echo'),<br/>';

}

?>