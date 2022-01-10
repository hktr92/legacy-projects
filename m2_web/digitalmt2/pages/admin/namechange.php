<?php
// Einstellungen
$vnum = 71055;
$logging = true;
?>
<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Tinktur des Namens</h3>
        <div class="big-line"></div>
        <?php 
			if($_SESSION['user_admin']>=2) {
				if(!empty($_POST["give"]) && $_POST["give"] == 1)
				{
					$sqlItem="INSERT INTO player.item_award (pid , login, vnum , count , given_time, why, socket0 , socket1 , socket2 ,  mall ) VALUES ('".$_SESSION['user_id']."', '".$_SESSION['user_name']."', '".$vnum."', '1', NOW(), 'Tinktur des Namens', '0', '0', '0' , '1')";
					$qryItem=mysql_query($sqlItem,$sqlServ) or die(mysql_error());
					
					if($logging) {
						$sqlLog="INSERT INTO homepage.namechange_log (account, date, ip) VALUE ('".$_SESSION['user_name']."', NOW(), '" . $_SERVER["REMOTE_ADDR"] . "')";
						$sqlLog=mysql_query($sqlLog,$sqlHp) or die(mysql_error());
					}
					
					echo "Das Item wurde in dein Itemshop Lager hinzugefügt. <br />";
				}
		?>
			Wenn du diesen Button drückst erhälst du eine Tinktur des Namens in deinem Itemshop-Lager.
			<form method="post" action="index.php?s=admin&a=namechange">
				<input type="hidden" name="give" value="1" />
				<input type="submit" value="Item erstellen" />
			</form>
		<?php
			} else {
		?>
			Kein Zugriff auf diesen Bereich!
		<?php
			}
		?>
    </div>
    <div class="bottom"></div>
</div>