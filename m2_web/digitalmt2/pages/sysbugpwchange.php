<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Schimbare parolă</h3>
        <div class="big-line"></div> 
	<?php
	echo '<b style="color: red;">O vulnerabilitate în sistem, ești forțat să schimbe parola este dvs. stabilit aici după schimbarea te poți uita înapoi în contul de joc datele de conectare. IMPORTANT: Nu folosiți detaliile contului dvs. pe care le-ați utilizat deja.</b><br><br>';
	?>
	<?php if(isset($message)) { echo $message; } ?>
	<?php 
		if(isset($_SESSION['user_admin']) && checkInt($_SESSION['user_admin']) && $_SESSION['user_admin']>=0 && isset($_SESSION['need_pwchange'])) {   
	?>
	<form action="index.php?s=sysbugpwchange" method="POST">
		<input type="hidden" type="hidden" name="sysbug" value="1" />
		<p>Noua parolă trebuie să aibă următoarele proprietăți:<br/><b>8-16 Caractere (doar a-Z,0-9)</b>.</p>
        <table>
			<tr>
				<th class="topLine" colspan="2">Parola cont :</th>
            </tr>
            <tr>
				<th class="topLine">Parola Veche:</th>
				<td class="tdunkel"><input class="txt" type="password" name="opass" size="16" maxlength="16"/></td>
            </tr>
            <tr>
				<th class="topLine">Parola nouă:</th>
				<td class="tdunkel"><input class="txt" type="password" name="npass" size="16" maxlength="16"/></td>
            </tr>
            <tr>
				<th class="topLine">Parola nouă (repetă):</th>
				<td class="tdunkel"><input class="txt" type="password" name="npass2" size="16" maxlength="16"/></td>
            </tr>
			<tr>
				<th class="topLine">Numele caracterului *:</th>
				<td class="tdunkel"><input class="txt" type="text" name="char" size="16" maxlength="16"/></td>
            </tr>
			<tr>
				<th class="topLine">Numărul de Caractere:</th>
				<td class="tdunkel"><select name="charcount">
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select></td>
            </tr>
            <tr>
				<th class="topLine" style="text-align:center;" colspan="2"><input type="submit" name="submit" value="Passwort bearbeiten"/></th>
            </tr>
		</table>
		* Dacă nu detineti un caracter atunci vă rugăm să lăsați gol.
    </form>
	<?php
		} else {
	?>
		<b style="color: red;">Nu aveți acces la această pagină!</b>
	<?php } ?>
				    </div>
    <div class="bottom"></div>
</div>