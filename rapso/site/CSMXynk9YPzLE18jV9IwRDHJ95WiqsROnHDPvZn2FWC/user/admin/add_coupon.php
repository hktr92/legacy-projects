<?PHP
  if($_SESSION['user_admin']>=$adminRights['multi_coins']) {
  
  echo'<h2>Admin - Coupon Codes erstellen</h2>';
  echo'<p>Hier k&ouml;nnen Sie Coupon Codes generieren.<br/>';
  echo "<b>Sie k&ouml;nnen aus dem Team ausgeschlossen werden wenn Sie
  		Coupons \"verschenken\".</b><br/></p>";
  
  if(isset($_POST['genCoupon']) && $_POST['genCoupon']=="Coupon Erstellen") {
	$userName = mysql_real_escape_string($_POST["userName"]);
	$worth = mysql_real_escape_string($_POST["worth"]);
	$voucher = mysql_real_escape_string($_POST["voucher"]);
	
	if($userName != "" && $worth != "" && $voucher != ""){
	
	echo '<h3>Code und Passwort</h3>';
	
	$coupon_code = genCouponCode();
	$coupon_pass = generateRandomPassword();
	$status = 0;
	$time = date("Y-m-d h:i:s",time());
	
	$sqlCheck = "SELECT * FROM ".SQL_HP_DB.".coupons";
	$sqlCheckQ = mysql_query($sqlCheck);
	$sqlCheckA = mysql_fetch_array($sqlCheckQ);
	
	if($sqlCheckA["code"] != $coupon_code && $sqlCheckA["password"] != $coupon_pass)
	{
		$sqlCmd = "INSERT INTO ".SQL_HP_DB.".coupons (code, password, user, worth, status, generation_date, created_by) VALUES ('".$coupon_code."', '".$coupon_pass."', '".$userName."', '".$worth."', '".$status."', '".$time."', '".$_SESSION['user_name']."')";
		$sqlCmdQ = mysql_query($sqlCmd);
		
		echo "Coupon Code: <b>".$coupon_code."</b><br/>";
		echo "Coupon Passwort: <b>".$coupon_pass."</b><br/>";
		echo "Coupon Wert: <b>".$worth."</b><br/>";
		
		$pscLog = mysql_query("UPDATE ".SQL_HP_DB.".psc_log SET admin_id = '". $_SESSION['user_id']."', status = '1'");
	}
	else
	{
		echo "Dieser Code exisitert Bereits.";	
	}
	}
	else{
		echo "Sie m&uuml;ssen alle Felder ausf&uuml;llen!";
	}
  }
  
?>
<form method="POST" action="index.php?s=admin&a=add_coupon">
	<table>
    	<tr>
       		<th class="topLine">
            	Beantragt von [UserID]:
          	</th>
            <td class="thell">
            	<input type="text" name="userName" value="<?php echo $_GET["psc_user"]; ?>" />
            </td>
		</tr>
        <tr>
        	<th class="topLine">
            	Wert:
            </th>
            <td class="tdunkel">
            	<input type="text" name="worth" />
            </td>
        </tr>
        <tr>
        	<th class="topLine">
            	Voucher Code:
            </th>
            <td class="thell">
            	<input type="text" name="voucher" value="<?php echo $_GET["id"]; ?>" />
            </td>
        </tr>
        <tr>
        	<th class="topLine" colspan="2">
        		<input type="submit" value="Coupon Erstellen" name="genCoupon">
          	</th> 
        </tr>
    </table>
</form>
<?PHP
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
?>
<div style="position=:center; margin-left:10px;"><a href="javascript: history.go(-1)" class="back-btn-news" rel="nofollow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#206;napoi</a></div>