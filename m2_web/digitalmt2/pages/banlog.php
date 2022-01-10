<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Lista celor Banati</h3>
        <div class="big-line"></div>
		<b>Timpul Ban-ului:</b></br>
		<table width="100%">
			<tr>
				<th class="topLine">Character</th>
				<th class="topLine">Motivul</th>
				<th class="topLine">Unban în</th>
			</tr>
			<?php
				$sql = "SELECT `account_id`,`charname`,`availDt`,`reason` FROM `homepage`.`timeban_log` WHERE `account_id`!='' or `charname`!='' ORDER BY `id` DESC LIMIT 0,25";
				$result = mysql_query($sql, $sqlHp);
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					echo '<tr>';
					$name = mysql_result($result, $i, "charname");
					if(empty($name))
					{
						$sql2 = "SELECT `name` FROM `player`.`player` WHERE `account_id`='". mysql_result($result, $i, "account_id") . "'";
						$result2 = mysql_query($sql2, $sqlServ);
						$name = mysql_result($result2, 0, "name");
					}
					echo '<td>' . $name . '</td>';
					echo '<td>' . mysql_result($result, $i, "reason") . '</td>';
					$time = strtotime(mysql_result($result, $i, "availDt"));
					echo '<td>' . date("d.m.Y H:i", $time) . '</td>';
					echo '</tr>';
				}
			?>
		</table>
		<br />
		<b>Ban-uri Permanente:</b></br>
		<table width="100%">
			<tr>
				<th class="topLine">Character</th>
				<th class="topLine">Motivul</th>
			</tr>
			<?php
				$sql = "SELECT `account_id`,`grund` FROM `homepage`.`ban_log` WHERE `typ`='BLOCK' ORDER BY `id` DESC LIMIT 0,25";
				$result = mysql_query($sql, $sqlHp);
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					echo '<tr>';
					$sql2 = "SELECT `name` FROM `player`.`player` WHERE `account_id`='". mysql_result($result, $i, "account_id") . "'";
					$result2 = mysql_query($sql2, $sqlServ);
					echo '<td>' . mysql_result($result2, 0, "name") . '</td>';
					echo '<td>' . mysql_result($result, $i, "grund") . '</td>';
					echo '</tr>';
				}
			?>
		</table>
    </div>
    <div class="bottom"></div>
</div>
