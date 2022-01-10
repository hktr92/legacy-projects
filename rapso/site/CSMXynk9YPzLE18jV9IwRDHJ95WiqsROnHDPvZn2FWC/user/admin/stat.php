<h2>Administrare - Statistici</h2>
<div style="position=:center; margin-left:10px;">
<?php
require("inc/config.inc.php");
$conn = mysql_connect(SQL_HP_HOST, SQL_HP_USER, SQL_HP_PASS);

	function GetServerStatus($site, $port) 
	{$status = array('<font color="red">Offline</font>', '<font color="gren">Online</font>'); 
	$fp = @fsockopen($site, $port, $errno, $errstr, 2); 
	if (!$fp) { return $status[0]; } else 
	{ return $status[1];} 
	} 
//Total Inregistrati:
mysql_select_db("account");
$query = mysql_query("SELECT * FROM account");
$iscritti = mysql_num_rows($query);
//Total Jucatori:
mysql_select_db("player");
$query1 = mysql_query ("SELECT * FROM player");
$player = mysql_num_rows($query1);
//Total Bresle:
$query2 = mysql_query ("SELECT * FROM guild");
$gilde = mysql_num_rows($query2);
//Regatul Shinsoo:
$query3 = mysql_query ("SELECT * FROM player_index where empire='1'");
$shinsoo = mysql_num_rows($query3);
//Regatul Chungjo:
$query4 = mysql_query ("SELECT * FROM player_index where empire='2'");
$chungjo = mysql_num_rows($query4);
//Regatul Jinno:
$query5 = mysql_query ("SELECT * FROM player_index where empire='3'");
$jinno = mysql_num_rows($query5);

//Statistici Jucatori
//PV:
$query6 = mysql_query ("SELECT name,hp FROM player ORDER by hp DESC limit 1");
$hp = mysql_fetch_row($query6);
//PM:
$query7 = mysql_query ("SELECT name,mp FROM player ORDER by mp DESC limit 1");
$mp = mysql_fetch_row($query7);
//Timp joc:
$query8 = mysql_query ("SELECT name,playtime FROM player ORDER by playtime DESC limit 1");
$anziano = mysql_fetch_row($query8);
//Nivel:
$query9 = mysql_query ("SELECT name,level FROM player ORDER by level DESC limit 1");
$lvl = mysql_fetch_row($query9);
//VIT:
$query10 = mysql_query ("SELECT name,ht FROM player ORDER by ht DESC limit 1");
$vit = mysql_fetch_row($query10);
//INT:
$query11 = mysql_query ("SELECT name,iq FROM player ORDER by iq DESC limit 1");
$int = mysql_fetch_row($query11);
//STR:
$query12 = mysql_query ("SELECT name,st FROM player ORDER by st DESC limit 1");
$str = mysql_fetch_row($query12);
//DEX:
$query13 = mysql_query ("SELECT name,dx FROM player ORDER by dx DESC limit 1");
$dex = mysql_fetch_row($query13);
//Yang:
$query14 = mysql_query ("SELECT name,gold FROM player ORDER by gold DESC limit 1");
$yang = mysql_fetch_row($query14);
//Grad:
$query15 = mysql_query ("SELECT name,alignment FROM player ORDER by alignment DESC limit 1");
$karma = mysql_fetch_row($query15);
//Cal:
$query16 = mysql_query ("SELECT name,horse_level FROM player ORDER by horse_level DESC limit 1");
$cavallo = mysql_fetch_row($query16);

//Statistici Bresle
//Nivel:
$query17 = mysql_query ("SELECT name,level FROM guild ORDER by level DESC limit 1");
$lv = mysql_fetch_row($query17);
//Exp:
$query18 = mysql_query ("SELECT name,exp FROM guild ORDER by exp DESC limit 1");
$ex = mysql_fetch_row($query18);
//Victorii:
$query19 = mysql_query ("SELECT name,win FROM guild ORDER by win DESC limit 1");
$vitt = mysql_fetch_row($query19);
//Egal:
$query20 = mysql_query ("SELECT name,draw FROM guild ORDER by draw DESC limit 1");
$pare = mysql_fetch_row($query20);
//infrangeri:
$query21 = mysql_query ("SELECT name,loss FROM guild ORDER by loss DESC limit 1");
$swithf = mysql_fetch_row($query21);
//Puncte:
$query22 = mysql_query ("SELECT name,ladder_point FROM guild ORDER by ladder_point DESC limit 1");
$pnt = mysql_fetch_row($query22);
//Yang:
$query23 = mysql_query ("SELECT name,gold FROM guild ORDER by gold DESC limit 1");
$gold = mysql_fetch_row($query23);
//Membri:
$query24 = mysql_query ("SELECT id,name FROM guild");
$gilda = mysql_fetch_row($query24);
$query25 = mysql_query ("SELECT * FROM guild_member where guild_id='$gilda[0]'");
$membri = mysql_num_rows($query25);
?><br>
			Serverul este: <b><?php echo $status = GetServerStatus($IP,$Porta); ?></b><br>
			Total &#238;nregistra&#355;i: <b><?php echo "$iscritti"; ?></b><br>
			Total juc&#259;tori: <b><?php echo "$player"; ?></b><br>
			Total bresle: <b><?php echo "$gilde"; ?></b><br>
			Total juc&#259;tori Shinsoo (Regatul Ro&#351;u): <b><?php echo "$shinsoo"; ?></b><br>
			Total juc&#259;tori Chunjo (Regatul Galben): <b><?php echo "$chungjo"; ?></b><br>		
			Total juc&#259;tori Jinno (Regatul Albastru): <b><?php echo "$jinno"; ?></b><br><br>	


			Juc&#259;torul cu cel mai mare PV; <b><?php echo "$hp[0]"; ?></b>, PV: <b><?php echo "$hp[1]"; ?></b><br>
			Juc&#259;torul cu cel mai mare PM; <b><?php echo "$mp[0]"; ?></b>, PM: <b><?php echo "$mp[1]"; ?></b><br>
			Juc&#259;torul cu cele mai multe minute: <b><?php echo "$anziano[0]"; ?></b>, Minute: <b><?php echo "$anziano[1]"; ?></b><br>
			Juc&#259;torul cu cel mai mare Nivel: <b><?php echo "$lvl[0]"; ?></b>, Nivel: <b><?php echo "$lvl[1]"; ?></b><br>
			Juc&#259;torul cu cel mai mare VIT; <b><?php echo "$vit[0]"; ?></b>, VIT: <b><?php echo "$vit[1]"; ?></b><br>
			Juc&#259;torul cu cel mai mare INT; <b><?php echo "$int[0]"; ?></b>, INT: <b><?php echo "$int[1]"; ?></b><br>
			Juc&#259;torul cu cel mai mare STR; <b><?php echo "$str[0]"; ?></b>, STR: <b><?php echo "$str[1]"; ?></b><br>
			Juc&#259;torul cu cel mai mare DEX; <b><?php echo "$dex[0]"; ?></b>, DEX: <b><?php echo "$dex[1]"; ?></b><br>
			Juc&#259;torul cu cel mai mult Yang; <b><?php echo "$yang[0]"; ?></b>, Yang: <b><?php echo "$yang[1]"; ?></b><br>
			Juc&#259;torul cu cel mai mare Grad; <b><?php echo "$karma[0]"; ?></b>, Grad: <b><?php echo "$karma[1]"; ?></b><br>
			Juc&#259;torul cu cel mai mare nivel la cal: <b><?php echo "$cavallo[0]"; ?></b>, Nivel cal: <b><?php echo "$cavallo[1]"; ?></b><br><br>


			Breasla cu cel mai mare nivel: <b><?php echo "$lv[0]"; ?></b>, Nivel: <b><?php echo "$lv[1]"; ?></b><br>
			Breasla cu cea mai mult&#259; experien&#355;&#259;: <b><?php echo "$ex[0]"; ?></b>, Experien&#355;&#259;: <b><?php echo "$ex[1]"; ?></b><br>
			Breasla cu cele mai multe victorii: <b><?php echo "$vitt[0]"; ?></b>, Victorii: <b><?php echo "$vitt[1]"; ?></b><br>
			Breasla cu cele mai multe egaluri: <b><?php echo "$pare[0]"; ?></b>, Egaluri: <b><?php echo "$pare[1]"; ?></b><br>
			Breasla cu cele mai multe &#238;nfr&#226;ngeri: <b><?php echo "$swithf[0]"; ?></b>, &#206;nfr&#226;ngeri: <b><?php echo "$swithf[1]"; ?></b><br>
			Breasla cu cele mai multe puncte: <b><?php echo "$pnt[0]"; ?></b>, Puncte: <b><?php echo "$pnt[1]"; ?></b><br>
			Breasla cu cel mai mult Yang: <b><?php echo "$gold[0]"; ?></b>, Yang: <b><?php echo "$gold[1]"; ?></b><br>
			Breasla cu cei mai mul&#355;i membrii: <b><?php echo "$gilda[1]"; ?></b>, Membrii: <b><?php echo "$membri"; ?></b><br><br>	
</div>
<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>