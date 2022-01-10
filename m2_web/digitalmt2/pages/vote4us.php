<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Vote4Us</h3>
        <div class="big-line"></div>
<?
if(!empty($_SESSION['need_pwchange'])) {
  echo '<b style="color: red;">Datorita unei vulnerabilitati in sistem sunteti rugat sa va schimbati parola contului. Atentie! Nu folositi date pe care le-ati mai folosit in trecut!</b>';
 } else {
?>
<?
	date_default_timezone_set('Europe/Berlin'); 
	$VotePage = "http://www.topliste.top-pserver.com/";
	$VoteBonusCoins	= 1000;

if(isset($_SESSION['user_id']) && checkInt($_SESSION['user_id'])) {
	
	/*
	 * Vote Page
	 */
	
	/*
	 * Check if User can vote
	 */
	$VoteLinkClick 			= trim(mysql_real_escape_string(@$_REQUEST['f']));
	$EnableVotePage			= true;
	$ShowMSG				= false;
	$SuccessMSG				= "";
	
	$CheckPlayerVotes_SQL		= "SELECT * FROM homepage.account_votes WHERE account_id = '".$_SESSION['user_id']."'";
	$CheckPlayerVotes_Query		= mysql_query($CheckPlayerVotes_SQL,$sqlServ)or die(mysql_error());
	$CheckPlayerVotes_Result	= mysql_fetch_array($CheckPlayerVotes_Query);
	
	/*
	 * Insert Player's Vote-Log in homepage.account_votes, if non-existent mom
	 */
	if( $CheckPlayerVotes_Result['account_id'] != $_SESSION['user_id'] or empty($CheckPlayerVotes_Result['account_id']) ) {
		$Account_AddVoteEntry		= "INSERT INTO homepage.account_votes 
											(account_id, last_vote_at, votes_given, coins_received, new_vote_at) 
										VALUES 
											('".$_SESSION['user_id']."', '0', '0', '0', '0')";
		
		@mysql_query($Account_AddVoteEntry,$sqlServ);
	}

	mysql_free_result($CheckPlayerVotes_Query);
	$CheckPlayerVotes_Query		= mysql_query($CheckPlayerVotes_SQL,$sqlServ);
	$CheckPlayerVotes_Result	= mysql_fetch_array($CheckPlayerVotes_Query);
	
	/*
	 * Check if User has an entry in our Vote-Log Table
	 */
	if( $CheckPlayerVotes_Result['account_id'] == $_SESSION['user_id'] ) {
		
		/*
		 * Initialize Voting variables
		 */	
		$Player_LastVoteAt			= $CheckPlayerVotes_Result['last_vote_at'];
		$Player_VotesGiven			= $CheckPlayerVotes_Result['votes_given'];
		$Player_CoinsReceived		= $CheckPlayerVotes_Result['coins_received'];
		$Player_NewVoteAt			= $CheckPlayerVotes_Result['new_vote_at'];
		$TimeNow					= time();
		
		/*
		 * Check if IP is already logged and can vote
		 */
		$IPCheck					= false;
		
		$_SERVER['REMOTE_ADDR']		= $_SERVER["HTTP_CF_CONNECTING_IP"];
		$PlayerIP					= $_SERVER['REMOTE_ADDR'];
		$PlayerIPCheck_SQL			= "SELECT * FROM homepage.account_vote_ip WHERE ip = '$PlayerIP'";
		$PlayerIPCheck_Query		= mysql_query($PlayerIPCheck_SQL,$sqlServ)or die(mysql_error());
		$PlayerIPCheck_Result 		= mysql_fetch_array($PlayerIPCheck_Query);
		$VoteExpire					= $PlayerIPCheck_Result['vote_expire'];
		
		if( mysql_num_rows($PlayerIPCheck_Query) <= 0 ) {
			$InsertIPLogEntry_SQL	= "INSERT INTO homepage.account_vote_ip (ip, vote_expire) VALUES ('$PlayerIP', '0')";
			$InsertIPLogEntry_Query	= mysql_query($InsertIPLogEntry_SQL,$sqlServ);
			$VoteExpire = 0;
		} 
		
		$next = $TimeNow * 1;
		if($next >= $VoteExpire)
			mysql_query("UPDATE homepage.account_vote_ip SET vote_expire=0 where ip='$PlayerIP'",$sqlServ)or die(mysql_error());
		$count_ip = mysql_fetch_object(mysql_query("SELECT count(ip) AS sum FROM homepage.account_vote_ip where ip='".$PlayerIP."' and vote_expire != 0;",$sqlServ))->sum;
		if($count_ip==0)
		{
		
			/*
			 * Check if Player is allowed to vote
			 */
			if( $TimeNow >= $Player_NewVoteAt == true ) {
				
				/*
				 * Check if User has clicked on the Link
				 */
				if( $VoteLinkClick == true ) {
					
					/*
					 * Initialize new Vote-Log entry
					 */
					$NewVoteAt_Time		= $TimeNow + 60*60*12;
					$LastVoteAt_Time	= $TimeNow;
					$Player_VotesGiven	+= 1;
					$NewCoinsAmount		= $Player_CoinsReceived + $VoteBonusCoins;
					
					$NewVoteLog_SQL		= "UPDATE homepage.account_votes
											  SET last_vote_at = '$LastVoteAt_Time',
												  votes_given = '$Player_VotesGiven', 
												  coins_received = '$NewCoinsAmount',
												  new_vote_at = '$NewVoteAt_Time'
												WHERE account_id = '".$_SESSION['user_id']."'";
						
						$IPLog_SQL 			= "UPDATE homepage.account_vote_ip 
												  SET vote_expire = '$NewVoteAt_Time' 
												WHERE ip = '$PlayerIP'";
						
						/*
						 * Initialize Player Coins + Bonus for Voting
						 */
						$GetPlayerCoins_SQL		= "SELECT vote_coins FROM account.account WHERE id = '".$_SESSION['user_id']."'";
						$GetPlayerCoins_Query	= mysql_query($GetPlayerCoins_SQL,$sqlServ);
						$GetPlayerCoins_Result	= mysql_fetch_array($GetPlayerCoins_Query);
						
						$PlayerCoins			= $GetPlayerCoins_Result['vote_coins'] + $VoteBonusCoins;
						
						$PlayerNewCoins_SQL	= "UPDATE account.account 
												  SET vote_coins = $PlayerCoins 
												WHERE id = '".$_SESSION['user_id']."'";
						
						/*
						 * Update Database entries
						 */
						mysql_query($NewVoteLog_SQL,$sqlServ);
						mysql_query($PlayerNewCoins_SQL,$sqlServ);
						mysql_query($IPLog_SQL,$sqlServ);
						
						$EnableVotePage		= false;
						$ShowMSG			= true;
						$SuccessMSG			.= "DVeți primi monedele în scurt timp, daca ce ați votat.<br>";
						
						/*
						 * Redirect User to Vote Page
						 */
		?>
		<script type="text/javascript" language="javascript">
		<!--
		window.location.href = '<? echo $VotePage; ?>';
		//-->
		</script>
		<?
						exit;
					} else {
						$EnableVotePage 	= true;
				}
			} else {
				$EnableVotePage = false;
			}
		} else 
			$EnableVotePage = false;
	}

	if( $EnableVotePage == true ) {
?>

<p class="meldung">
	Pentru fiecare vot primesti <?=$VoteBonusCoins;?> Vote-Coins!
	Abuzul sau folosirea bug-urilor se pedepsesc prin<br>
	banarea permanenta a conturilor(toate)!
</p>
<br>
<p>Pentru a vota, click pe link-ul următor:
<a href="<? echo $_SERVER['PHP_SELF']; ?>?s=vote4us&f=true"><font color="red">Vote!</font></a></p>
<?
	} else {
		if( $ShowMSG == true ) {
			echo "<p>$SuccessMSG</p>";
		} else {
			echo "<p>Puteți vota numai la fiecare 12 ore!</p>";
			echo "<br>";
			if( $Player_NewVoteAt > 0 ) {
				echo "<div align=\"center\">Poti vota din nou la ora <br><b>". date("d.m.Y H:i:s", $Player_NewVoteAt) ."</b><br> din nou.</div>";
			}
		}
	}
} else {
	echo'<p><font color="red">ATENTIE:</font> Monedele le primesti doar DACA esti logat!<br>
	<a href="'.$VotePage.'"><img style="border: 0px;" src="http://www.topliste.top-pserver.com/buttons/vote_8_0.png"/></a></p>';
}

?>
<? } ?>
    </div>
    <div class="bottom"></div>
</div>