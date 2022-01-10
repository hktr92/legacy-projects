<?php
if(isset($_SESSION['user']) && isset($_SESSION['pass'])){

?>
<h4>CERE CODUL SECRET :</h4>
Codul secret este foarte important ceea ce implica cateva motive de securitate.<br />
Pentru a afla codul apasa butonul de mai jos si acesta va fi trimis in cel mai scurt timp la adresa dumneavoastra de email.
<?php cod_secret(); ?>
<div align="right"><form action="" name="sendSocialcodeDisplayLink" method="POST">
<input type="submit" name="sendSocialcodeDisplayLink" class="buton" value="TRIMITE COD"/>
</form></div>

<?php } else {echo "Acces restrictionat";}?> 