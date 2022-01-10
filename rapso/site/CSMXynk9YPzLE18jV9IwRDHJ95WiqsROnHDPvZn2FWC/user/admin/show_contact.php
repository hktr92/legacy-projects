<h2>Citire informatiile de contact</h2>
<br/>
<?php
$parola = "phnxd9";

if (isset($_POST['parola'])) {
	if (md5($_POST['parola'])==md5($parola)) {
		fopen("arhiva/contact.txt","w");
		fclose("arhiva/contact.txt");
		$mesaj = "Informatiile fost sterse.";
		$culoare = "green";
	} else {
		$mesaj = "Parola nu este corect&#259;.";
		$culoare = "red";
	}

}
?>

  <style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
  </style>
  <body>
  <div id="main">
    <?php if (!empty($mesaj)) echo "\n<div align=\"center\" style=\"color:".$culoare.";font-weight:bold\">".$mesaj."</div>\n"; ?>
    
    <div align="center"><br/>
      <form method="post" action="index.php?s=admin&a=show_contact">
        <span>Introduce&#355;i parola</span> : 
	<input type="password" name="parola" />
	<input type="submit" value="Sterge" style="border:1px solid #777;background-color:#ccc" />
      </form><br/>
    </div>
 
    <h2>&nbsp;&nbsp;&nbsp;&nbsp;Mesaje utilizatori :</h2>
      <div align="center"><?php include('arhiva/contact.txt'); ?>
<br/> </form></a></div>

  </div> 
 </body><br/><br/>
 <div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>