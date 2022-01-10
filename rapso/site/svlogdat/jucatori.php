<table border="0" align="center" cellpadding="0" cellspacing="0" width="90%" >

   <tr>

    <td colspan="3" height="5"></td>

    </tr>

  <tr class="top">

    <td>#</td>

    <td>NUME</td>

    <td align="center">LEVEL</td>

  </tr><?php 
	$cache_content = "";
 	$query = "SELECT * FROM player.player WHERE name NOT LIKE '[%]%' ORDER BY level desc, exp desc, name asc limit 0,10";

      $i = "0" ;

	  

	  

 $doQuery = mysql_query($query) or die(mysql_error());

while($getPlayers = mysql_fetch_object($doQuery))

   {

   $i = $i + 1 ;

  

   $cache_content .= '

 	<tr class="top">

    <td width="23">'.$i.'</td>

    <td width="141">'.$getPlayers->name.'</td>

    <td width="53" align="center">'.$getPlayers->level.'</td>

  	</tr>

	';



}



if ( !file_exists('see/player_cache.txt'))

 {

$q1_cache = fopen('see/player_cache.txt', 'w');

fwrite($q1_cache, $cache_content);

fclose($q1_cache);

 }

 else

 {

	 if (filemtime('see/player_cache.txt') < (time() - 18000))

	 {

		unlink('see/player_cache.txt');

		$q1_cache = fopen('see/player_cache.txt', 'w');

		fwrite($q1_cache, $cache_content);

		fclose($q1_cache);

	 }

	 else

	 {

		 $q1_cache = fopen('see/player_cache.txt', 'r');

		 $cache_content = fread($q1_cache, filesize('see/player_cache.txt') + 1);

		 fclose($q1_cache);

		 echo $cache_content;

	 }

 }

	





				?>  <tr>

    <td colspan="3" height="5"></td>

    </tr></table>

	