
<?php
session_start();
	if($_SESSION['user'] == "") {
		echo "Trebuie sa fii logat pentru a accesa pagina";
		echo "<meta http-equiv='refresh' content='2; URL=http://metin2rapsodia.ro/'>";
	} else {
?>         				

<?php
session_start ();

$nume = $_SESSION['user'];
$filelog = "log/".date("d-m-Y").".txt";

require("smsfunctionsasygames.php");
if(isset($_POST['cod'])){
	$cod = $_POST['cod'];
	$userkey = ""; // aici completeaza userkey furnizat de noi
	$userid = ""; // aici completeaza userid furnizat de noi
	$res = smsapi($userid,$userkey,$cod);
	//$sms = explode(";",$res);
	if($res->success==1){
 		//$tel = $sms[2];
		$tel = $res->tel;
  		//$total = $sms[1];
		$total = $res->value;
		$nrmd = "0";
			if($total == "3"){
				$nrmd = "21";}
			elseif($total == "5"){
				$nrmd = "35";}
			elseif($total == "10"){
				$nrmd = "70";}
			elseif($total == "20"){
				$nrmd = "145";}
		echo '<p align="center">Contul tau a fost incarcat cu '.$nrmd.' MD!<br />';
		echo "Telefon: $tel";
		echo "<br />";
		echo "Valoare: $total Euro";
		echo "</p>";

		$paysms = mysql_query("UPDATE account.account SET coins = coins + '$nrmd' WHERE login='$nume'");		

		$text = ' '.$_SESSION['user'].' a cumparat '.$nrmd.' de pe '.$tel.' cu '.$total.' EURO';
		$fh = fopen($filelog, "a") or die("Nu pot deschide Log-ul .");
		fwrite($fh, date("H:i")." - $text\n") or die("Nu pot scrie Log-ul !");
		fclose($fh);
		if (!$paysms) { 

            $message  = 'Invalid query: ' . mysql_error() . "\n"; 
            $message .= 'Whole query: ' . $query; 
            die($message); 
    } 
		

	}else{
	$error .= $res->message;
	echo $error;
	}
}else{		
?>
<center>
<u>Doneaza sms</u>
<p></p>
<center><a href="http://metin2rapsodia.ro/index.php?page=sms" target="_blank" title="Click!Plata automata prin SMS!"><img src="http://metin2rapsodia.ro/images/platasms.png" border="0" alt="Click!Plata automata prin SMS!"></a></center>
<center><h2><br />  <i>Numere SMS</i>  >> <a href="index.php?page=smscod"><b><u>CLICK AICI</u></b></a> <<</h2></center>
<br><FONT COLOR="blue">
<br><FONT COLOR="blue">
<br><FONT COLOR="red">
<br><FONT COLOR="red">

<br /><strong>Donatiile</strong> se fac doar la [RP]Vlad cat si [RP]Pavel !
<br /><strong>NU!</strong> si la alti admini(gm) de pe server, playeri etc. etc. | ci doar la <strong>[GF]Vlad (Duca Marius-Vlad)</strong>
<br /><strong>Pentru donatii</strong> ne puteti contacta la ym,skype!(aveti mai jos toate datele de contact):
<center><br />--------------------------------------------------------------------
<h2>-=>[RP]Vlad | [RP]Pavel<=-</h2>
<br /><strong>Nume real</strong> -> Duca Marius-Vlad([RP]Vlad) | Rebenciuc Pavel-Ilie ([RP]Pavel)
<br /><strong>Y!M(Yahoo Messenger)</strong> -> metin2rapsodia@yahoo.com
<br /><strong>Skype</strong> -> metin2rapsodia
<br />--------------------------------------------------------------------</center>
<center><br />>> Itemshop-ul MD >> <a href="http://metin2rapsodia.ro/ishop"><b>CLICK AICI</b></a> <<</center>
</center>

<div id="op"></div>
<form method="POST">
<p align="center">
<br />*Aici iti verifici codul primit in ultimul mesaj!<br />
	<input type="text" name="cod" size="20" class="iRg_input" style="height:25px;"><input type="submit" value="Submit" name="B1" class="buton" style="height:25px;"></p>
</form>
<?php
}
?>
<br />
 <table class="tablebg" width="400px" cellspacing="1">
        <th><FONT COLOR="BLUE"><FONT SIZE="3">IMPORTANT:</FONT SIZE="3"></FONT COLOR="BLUE"></th>
	</tr>
	<tr>
        <td class="row1" align="center">
			<ul class="nav" style="margin: 0; padding: 0; list-style-type: none; line-height: 175%;">
                <FONT SIZE="2"><li><b>Plata se realizeaza in 2 pasi:</b></FONT SIZE="2">
           </ul>
		</td>
	</tr>
	    <td class="row1" align="center">
			<ul class="nav" style="margin: 0; padding: 0; list-style-type: none; line-height: 175%;">
                <FONT SIZE="2"><li><b>1. Trimite mesajul cu textul ASYGAMES la numarul corespunzator. Acest mesaj nu va fi taxat. Daca mesajul trimis este corect vei primi un mesaj de raspuns cu indicatiile pentru pasul 2 si vei fi taxat cu 0,05 centi.</b></FONT SIZE="2">
           </ul>
		</td>
	</tr>
	    <td class="row1" align="center">
			<ul class="nav" style="margin: 0; padding: 0; list-style-type: none; line-height: 175%;">
				<FONT SIZE="2"><li><b>2. La pasul 2 trebuie sa urmezi indicatiile mesajului de raspuns. Dupa trimiterea celui de-al doilea mesaj vei fi taxat cu suma corespunzatoare si plata se va inregistra. </b></FONT SIZE="2">
           </ul>
		</td>
	</tr>
	</tr>
	
 </table></br>
<?php
}
?>
