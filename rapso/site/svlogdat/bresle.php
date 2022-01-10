<table border="0" align="center" cellpadding="0" cellspacing="0" width="90%" >

   <tr>

    <td colspan="3" height="5"></td>

    </tr>

  <tr class="top">

    <td>#</td>

    <td>NUME</td>

    <td align="center">PUNCTE</td>

  </tr>

<?php 

$db	= "player";		
$cache_content2 = "";

mysql_select_db($db) OR

die();

$query2 = "SELECT * FROM guild WHERE guild.name NOT LIKE 'STAFF' ORDER BY win desc, level desc, exp desc, exp desc, name asc limit 0,10";

$i = "0" ;

$doQuery2 = mysql_query($query2);

while($b = mysql_fetch_object($doQuery2))

{

	$i = $i + 1 ;

	$leader = $b->master;

	$cache_content2 .= '

	<tr class="top">

    <td width="23">'.$i.'</td>

    <td width="141">'.$b->name.'</td>

    <td width="53" align="center">'.$b->ladder_point.'</td>

  	</tr>

	';

}

if (!file_exists('see/bresle_cache.txt'))

{

	$b2_cache = fopen('see/bresle_cache.txt', 'w');

	fwrite($b2_cache, $cache_content2);

	fclose($b2_cache);

}

else

{

	if (filemtime('see/bresle_cache.txt') < (time() - 18000))

	{

		unlink('see/bresle_cache.txt');

		$b2_cache = fopen('see/bresle_cache.txt', 'w');

		fwrite($b2_cache, $cache_content2);

		fclose($b2_cache);

	

	}

	else

	{

		$b2_cache = fopen('see/bresle_cache.txt', 'r');

		$cache_content2 = fread($b2_cache, filesize('see/bresle_cache.txt') + 1);

		fclose($b2_cache);

		echo $cache_content2;	

	}

}

	





?>

<tr>

    <td colspan="3" height="5"></td>

    </tr></table>

	