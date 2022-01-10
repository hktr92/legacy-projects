<?php
	if($_SESSION['user_admin']>=9) {
?>
<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Itemshop Statistiken</h3>
        <div class="big-line"></div>
		<?php
		
		$sql = "SELECT * FROM `".SQL_HP_DB."` ORDER BY `count` DESC LIMIT 0,5";
		$result = mysql_query($sql, $sqlHp);
		
		?>
	</div>
	<div class="bottom"></div>
</div>
<?php
	}
?>