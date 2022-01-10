<?php

	session_start();

	if ($_SESSION['metin2-roata-user'] !="")

	header("Location:1594e585cef9e6e104d7e9569e9512");

	include("config/configurare.php");

	$user = "";

	$pass ="";

	$que="";

	$count="";

	$e="";

	if (isset($_POST['submit']))

	{

		$user = mysql_real_escape_string($_POST['username']);

		$pass = mysql_real_escape_string($_POST['password']);

		$que = mysql_query("SELECT * FROM account.account WHERE login='$user' AND password = PASSWORD('$pass') ");

		$count = mysql_num_rows($que);

		if ($count)

		{

			$_SESSION['metin2-roata-user'] = $user;

			header("Location:1594e585cef9e6e104d7e9569e9512");

		}

		else

			$e=1;

	}



?>

<!doctype html>

<html>

	<head>

		<title>Metin2Rapsodia- Roata Destinului</title>

		<link rel="stylesheet" href="css/logare.css">

	</head>

	<body>

			<div id="mainWindow">

				<div id="inputs">

				<form action="index.php" method="POST">

				<p>Nume de utilizator</p>

				<p><input name='username' class="fields" type="text"></p>

				<p>Parola</p>

				<p><input name='password' class="fields" type="password"></p>

				<input name="submit" id="login" type="submit" value="Login">

				<?php 

				if ($e==1)

					echo"<p> Nume sau parola gresita ! </p>";

			

				?>

			</form>

				</div>

			</div>





	</body>

</html>

