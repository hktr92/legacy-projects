<?php

error_reporting(0);
if (isset($_POST['gen']) && $_POST['gen'] == 1) {
	$num = $num2 = rand(1,16);
	$key ="m2-roata";
	#$num2 = $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $num, MCRYPT_MODE_CBC, md5(md5($key))));
	echo "$num | $num2";
}

if (isset($_POST['username']) && $_POST['p']==1) {
	include("../config/configurare.php");
	$username = $_POST['username'];
	$que = mysql_query("SELECT * FROM account.account WHERE id='{$username}'");
	$res = mysql_fetch_array($que);
	$que2 = mysql_query("SELECT * FROM account.roata");
	$res2 = mysql_fetch_array($que2);
	$points = $res['jcoins'] - $res2['cost'];

	$q = mysql_query("UPDATE account.account SET jcoins ='$points' WHERE id = '{$username}'");
	if ($q) {
		mysql_query("INSERT INTO `account`.`wof_logs` (`owner_id`, `date`, `status`, `action`) VALUES ({$username}, NOW(), 'SUCCESS', 'Retragere jetoane de la utilizator.')");
	} else {
		mysql_query("INSERT INTO `account`.`wof_logs` (`owner_id`, `date`, `status`, `action`) VALUES ({$username}, NOW(), 'FAIL', 'Retragere jetoane de la utilizator.')");
	}
}

if (isset($_POST['item']) && isset($_POST['user'])) {
	include("../config/configurare.php");
	$key="m2-roata";
	$idi = $idi2 = $_POST['item'];
	#$idi2 = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($idi), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
	$owner_id = $_POST['user'];
	$query_a = mysql_query("SELECT * FROM account.iteme WHERE pozitie='{$idi2}'");
	$dvy = mysql_fetch_array($query_a);
	$id = $dvy['id'];
	$count = $dvy['count'];
	$socket0 = $dvy['socket0'];
	$socket1 = $dvy['socket1'];
	$socket2 = $dvy['socket2'];
	$bag = array();
	for ($i=1;$i<=8;$i++) {
		for ($j=1;$j<=5;$j++) {
			$bag[$i][$j] = 0;
		}
	}

	$line = 1;
	$getallitems = mysql_query("SELECT vnum,pos FROM player.item WHERE window='MALL' AND owner_id='{$owner_id}' ORDER BY pos");
	while ($row=mysql_fetch_array($getallitems)) {
		if ($row['pos'] > 0 && $row['pos'] <=5) {
			$line = 1;
			$sl = $row['pos'];
		} else if ($row['pos'] > 5 && $row['pos'] <= 10) {
			$line = 2;
			$sl = (5 - $row['pos']) * -1;
		} else if ($row['pos'] > 10 && $row['pos'] <= 15) {
			$line = 3;
			$sl = (10 - $row['pos']) * -1;
		} else if ($row['pos'] > 15 && $row['pos'] <= 20) {
			$line = 4;
			$sl = (15 - $row['pos']) * -1;
		} else if ($row['pos'] > 20 && $row['pos'] <= 25) {
			$line = 5;
			$sl = (20 - $row['pos']) * -1;
		} else if ($row['pos'] > 25 && $row['pos'] <= 30) {
			$line = 6;
			$sl = (25 - $row['pos']) * -1;
		} else if ($row['pos'] > 30 && $row['pos'] <= 35) {
			$line = 7;
			$sl = (30 - $row['pos']) * -1;
		} else if ($row['pos'] > 35 && $row['pos'] <= 40) {
			$line = 8;
			$sl = (35 - $row['pos']) * -1;
		} else {
			$line = null;
			$sl = null;
		}

		$vnum = $row['vnum'];
		$qq = mysql_query("SELECT size FROM player.item_proto WHERE vnum='{$vnum}'");
		$ret = mysql_fetch_array($qq);
		if ($ret['size'] == 1) {
			$bag[$line][$sl] = 1;
		} else if ($ret['size'] == 2) {
			$bag[$line ][$sl ] = 1;
			$bag[$line + 1][$sl] = 1;
		} else if ($ret['size'] == 3) {
			$bag[$line][$sl] = 1;
			$bag[$line + 1][$sl] = 1;
			$bag[$line + 2][$sl] = 1;
		} else {
			$bag[$line][$sl] = null;
		}
	}
	// Insert into the pos
	$q = mysql_query("SELECT size FROM player.item_proto WHERE vnum='{$id}'");
	$res = mysql_fetch_array($q);
	$size = $res['size'];

	function freeslot($bag,$size) {
		$c = 1;
		for ($i=1;$i<=8;$i++) {
			for($j=1;$j<=5;$j++) {
				if ($size == 1) {
					if ($bag[$i][$j] == 0) {
						return $c;
					}
				}	else if ($size == 2) {
					if ($bag[$i][$j] == 0 && $bag[$i+1][$j] ==0) {
						return $c;
					}
				} else if ($size == 3) {
					if ($bag[$i][$j] == 0 && $bag[$i+1][$j] ==0 && $bag[$i+2][$j] == 0) {
						return $c;
					}
				}
				$c++;
				if ($c == 41) {
					return -1;
				}
			}
		}
	}

	$pos = freeslot($bag,$size);

	if ($pos != -1) {
		$q = mysql_query("INSERT INTO player.item (owner_id,window,pos,count,vnum, socket0, socket1, socket2)VALUES('{$owner_id}','MALL','{$pos}','{$count}','{$id}','{$socket0}', '{$socket1}', '{$socket2}')") or die (mysql_error());
		if ($q) {
			mysql_query("INSERT INTO `account`.`wof_logs` (`owner_id`, `date`, `status`, `action`) VALUES ({$owner_id}, NOW(), 'SUCCESS', '".sprintf('Inserarea item %s in item-shop.', $id)."')");
			echo "<img class='won-item' src='components/".$dvy['id'].".png'><br><br>Felicitari ai castigat acest item ! <br><br><button onclick='$(\"#won\").fadeOut()' class='confirm'>Continua</button>";
		} else {
			mysql_query("INSERT INTO `account`.`wof_logs` (`owner_id`, `date`, `status`, `action`) VALUES ({$owner_id}, NOW(), 'FAIL', 'Inserarea item-ului castigator in item-shop.')");
			echo "<br><br>Ne pare rau, a aparut o eroare de server.<br><br><button onclick='$(\"#won\").fadeOut()' class='confirm'>Continua</button>";
		}
	} else {
		mysql_query("INSERT INTO `account`.`wof_logs` (`owner_id`, `date`, `status`, `action`) VALUES ({$owner_id}, NOW(), 'FAIL', 'Depozitul item-shop este plin.')");
		echo "<br><br>Nu ai destul spatiu in depozitul itemshop.<br> Jetoanele ti-au fost inapoiate. Da-i refresh la aceasta pagina ca sa-ti revina Jetoanele.<br><br><button onclick='$(\"#won\").fadeOut()' class='confirm'>Continua</button> ";
		mysql_query("UPDATE account.account SET jcoins= jcoins + (SELECT cost FROM account.roata LIMIT 1) WHERE id={$owner_id}");
	}
}
