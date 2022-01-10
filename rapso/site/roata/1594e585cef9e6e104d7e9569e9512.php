<?php 

	session_start();

	error_reporting(0);

	if ($_SESSION['metin2-roata-user'] =="")

	header("Location:index.php");

	include("config/configurare.php");

	$user = $_SESSION['metin2-roata-user'];

	$query = mysql_query("SELECT * FROM account.account WHERE login='$user'");

	while ($row=mysql_fetch_array($query))

	{

		$user_id = $row['id'];

		$admin = $row['web_admin'];

		$jcoins = $row['jcoins'];

	}

	$que = mysql_query("SELECT * FROM account.roata");

	$res = mysql_fetch_array($que);

	$cost = $res['cost'];

	if ($admin =="9")

		$a = 1;



?>

<!doctype html>

<html>

	<head>

		<title>Metin2Rapsodia - Roata Destinului</title>

		<script src="script/roata.js"></script>

		<script src="script/jq.js"></script>

		<link rel="stylesheet" href="css/roata.css">

	</head>

	<body>

		<script>

		user = "<?=$user_id?>";

		points = "<?=$jcoins?>";

		cost = "<?=$cost?>";

		</script>

		<div id="preload">

			<center>Se incarca (Asteptati)...</center>



		</div>

		<div id="panel">

			<?php

			if ($a==1)

				echo '<button onclick="fromTo(\'roata\',\'creator\')" id="create-roata">Administrare Roata Destinului</button>';

			?>
			

			<p id="pp">

			<?=$user?>:<b id="jcoins"><?=$jcoins?></b> Jetoane Dragon 
			
			
            <b><a href="http://metin2rapsodia.ro/roata">Acasa</a></b>

			<p onclick="window.location='logout.php'" id="pp" style="float:right;margin-right:10px;">

			Deconectare 
		  
			</p>
			
		</div>

		<?php 

			if ($a==1)

			{



				echo '

<div id="creator">

				<div id="creator-content">

					<h4 id="back"onclick="fromTo(\'creator\',\'roata\')"> <- Inapoi la roata </h4>

			';



						$que = mysql_query("SELECT * FROM account.roata");

						$res = mysql_fetch_array($que);

						$cost = $res['cost'];

				echo '

				<form action="1594e585cef9e6e104d7e9569e9512" method="POST" >

					<h3>Cost:</h3>

					<hr style="border-color:#222">

					<p><input class="fls" name ="cost" type="text" value="'.$cost.'"></p>

					

					<h3> Iteme: </h3>

					<hr style="border-color:#222">';



					$que = mysql_query("SELECT * FROM account.iteme ORDER BY pozitie");

					while ($row=mysql_fetch_array($que))

					{

						$poz = $row['pozitie'];

						$id_item = $row['id'];

					echo '

					<div class="fl">

					<p>Id Item #'.$poz.' </p>

					<p><input name ="item-id-'.$poz.'" type="text" value="'.$id_item.'"></p>

					</div>';

					}

				echo '<input name="send" type="submit" style="margin-top:200px;margin-left:70px" class="confirm" value="Salveaza"> ';

				if (isset($_POST['send']))

				{

					$items = array();

					for ($i=1;$i<=16;$i++)

					$items[$i] = mysql_real_escape_string($_POST['item-id-'.$i]);

					$cost = mysql_real_escape_string($_POST['cost']);

					mysql_query("UPDATE account.roata SET cost ='$cost'");

					for ($i=1;$i<=16;$i++)

					mysql_query("UPDATE account.iteme SET id='$items[$i]' WHERE pozitie='$i'");

					header("Location:1594e585cef9e6e104d7e9569e9512.php");

				}
				
				echo '</form></div><div id="clear"></div></div>';
			}



		?>

		<div id="roata" class="same">

			<div id="won">

				<div id="result">

					<div id="content">					

					</div>

				</div>

			</div>

			<p id="start" onclick="start()"><b>150 JD </b></p>

		<?php

	

			$query = mysql_query("SELECT * FROM account.iteme ORDER BY pozitie");

			$i=1;

			while ($row = mysql_fetch_array($query))

			{

				$poz = $row['pozitie'];

				$id = $row['id'];

				echo '

				<div id="item-'.$i.'" class="item">

				<img src="components/'.$id.'.png">

				</div>

				';

				$i++;

			}

		 ?>
		 
		 
		</div>
		

	</body>
	
	<center><button id="create-roata"><a href="http://metin2rapsodia.ro/inforoata.php">Informatii Roata</a></button></center>
	
</html>