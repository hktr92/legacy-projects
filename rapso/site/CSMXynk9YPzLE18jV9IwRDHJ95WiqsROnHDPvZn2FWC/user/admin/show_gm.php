<h2>Citire cererile de administrare server</h2>
<br/>
<?php
$parola = "phnxd9";

if (isset($_POST['parola'])) {
	if (md5($_POST['parola'])==md5($parola)) {
		fopen("arhiva/cereri_gm.txt","w");
		fclose("arhiva/cereri_gm.txt");
		$mesaj = "Cerile au fost sterse.";
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
    <?php if (!empty($mesaj)) echo "<hr/>\n<div align=\"center\" style=\"color:".$culoare.";font-weight:bold\">".$mesaj."</div>\n"; ?>
    <hr/>
    <div align="center"><br/>
      <form method="post" action="index.php?s=admin&a=show_gm">
        <span class="style1">Introduce&#355;i parola</span> : 
	<input type="password" name="parola" />
	<input type="submit" value="Sterge" style="border:1px solid #777;background-color:#ccc" />
      </form><br/>
    </div>
    <hr/>
    <h2 align="center" class="style1">Cererile utilizatorilor :</h2>
      <div align="center"><?php include('arhiva/cereri_gm.txt'); ?>
<br/> </form></a></div>

  </div> 
 </body><br/><br/><br/><br/>