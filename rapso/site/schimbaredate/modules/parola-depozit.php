<?php
if(isset($_SESSION['user']) && isset($_SESSION['pass'])){

?>
<h4>CERE PAROLA DEPOZIT :</h4>
Din motive de securitate parola va fi trimis la adresa dumneavoastra de email prin simpla apasare a butonului de mai jos.
<?php parola_depozit();?>
<div align="right"><form method="POST" action="" name="sendStoragePassword">
<input type="submit" name="sendStoragePassword" class="buton" value="TRIMITE PRIN EMAIL"/>
</form></div>

<?php } else {echo "Acces restrictionat!";} ?>