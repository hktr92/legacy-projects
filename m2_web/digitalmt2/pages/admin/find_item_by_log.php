<?PHP
  if($_SESSION['user_admin']>=9) {
?>
<?php if(isset($_GET["logid"])) { ?>
<div style="margin-top: 70px;" class="box">
	<div class="top"></div>
    <div class="middle">
        <h3>Gefundene Items</h3>
        <div class="big-line"></div>
		<?php
		$sql1 = "SELECT * FROM `log`.`create_item_log` WHERE `id`='" . $_GET["logid"] . "'";
		$result1 = mysql_query($sql1, $sqlServ);
		
		$row = mysql_fetch_array($result);
		
		$sql2 = "SELECT * FROM `player`.`item` WHERE `vnum`='" . $row["vnum"] . "' and `attrtype0`='" . $row["attrtype0"] . "'" . 
			" and `attrtype1`='" . $row["attrtype1"] . "' and `attrtype2`='" . $row["attrtype2"] . "' and `attrtype3`='" . $row["attrtype3"] . "'" . 
			" and `attrtype4`='" . $row["attrtype4"] . "' and `attrtype5`='" . $row["attrtype5"] . "' and `attrtype6`='" . $row["attrtype6"] . "'" .
			" and `attrvalue0`='" . $row["attrvalue0"] . "' and `attrvalue1`='" . $row["attrvalue1"] . "' and `attrvalue2`='" . $row["attrvalue2"] . "'" . 
			" and `attrvalue3`='" . $row["attrvalue3"] . "' and `attrvalue4`='" . $row["attrvalue4"] . "' and `attrvalue5`='" . $row["attrvalue5"] . "' " . 
			" and `attrvalue6`='" . $row["attrvalue6"] . "' LIMIT 0,50";
		$result2 = mysql_query($sql2, $sqlServ);
		?>
		<table style="width: 100%;">
			<tr>
				<th class="topLine">ID:</th>
				<th class="topLine">Besitzer:</th>
				<th class="topLine">VNUM:</th>
				<th class="topLine">Attr 1:</th>
				<th class="topLine">Attr 2:</th>
				<th class="topLine">Attr 3:</th>
				<th class="topLine">Attr 4:</th>
				<th class="topLine">Attr 5:</th>
				<th class="topLine">Attr 6:</th>
				<th class="topLine">Attr 7:</th>
			</tr>
			<?php
			for($i = 0; $i < mysql_num_rows($result2); $i++)
			{
				$row = mysql_fetch_array($result2);
			?>
				<td><?=$row["id"]?></td>
				<td><a href="index.php?s=admin&a=users&acc=<?=$row["owner_id"]?>"><?=$row["owner_id"]?></a></td>
				<td><?=$row["vnum"]?></td>
				<td><?=$row["attrvalue0"]?> (<?=$row["attrtype0"]?>)</td>
				<td><?=$row["attrvalue1"]?> (<?=$row["attrtype1"]?>)</td>
				<td><?=$row["attrvalue2"]?> (<?=$row["attrtype2"]?>)</td>
				<td><?=$row["attrvalue3"]?> (<?=$row["attrtype3"]?>)</td>
				<td><?=$row["attrvalue4"]?> (<?=$row["attrtype4"]?>)</td>
				<td><?=$row["attrvalue5"]?> (<?=$row["attrtype5"]?>)</td>
				<td><?=$row["attrvalue6"]?> (<?=$row["attrtype6"]?>)</td>
				<td><?=$row["attrvalue7"]?> (<?=$row["attrtype7"]?>)</td>
			<?php
			}
			?>
		</table>
	</div>
    <div class="bottom"></div>
</div>
<div class="box">
<?php } else { ?>
<div style="margin-top: 70px;" class="box">
<?php } ?>
    <div class="top"></div>
    <div class="middle">
        <h3>Item Suche</h3>
        <div class="big-line"></div>
		<table style="width: 100%;">
			<tr>
				<th class="topLine">ID:</th>
				<th class="topLine">Ersteller:</th>
				<th class="topLine">VNUM:</th>
				<th class="topLine">Attr 1:</th>
				<th class="topLine">Attr 2:</th>
				<th class="topLine">Attr 3:</th>
				<th class="topLine">Attr 4:</th>
				<th class="topLine">Attr 5:</th>
				<th class="topLine">Attr 6:</th>
				<th class="topLine">Attr 7:</th>
				<th class="topLine">Uhrzeit:</th>
			</tr>
			<?php
			$sql = "SELECT * FROM `log`.`create_item_log` WHERE `id` DESC LIMIT 0,50";
			$result = mysql_query($sql, $sqlServ);
			
			for($i = 0; $i < mysql_num_rows($result); $i++)
			{
				$row = mysql_fetch_array($result);
			?>
			<tr>
				<td><a href="index.php?s=admin&a=find_item_by_log&logid=<?=$row["id"]?>"><?=$row["id"]?></a></td>
				<td><?=$row["creator"]?></td>
				<td><?=$row["vnum"]?></td>
				<td><?=$row["attrvalue0"]?> (<?=$row["attrtype0"]?>)</td>
				<td><?=$row["attrvalue1"]?> (<?=$row["attrtype1"]?>)</td>
				<td><?=$row["attrvalue2"]?> (<?=$row["attrtype2"]?>)</td>
				<td><?=$row["attrvalue3"]?> (<?=$row["attrtype3"]?>)</td>
				<td><?=$row["attrvalue4"]?> (<?=$row["attrtype4"]?>)</td>
				<td><?=$row["attrvalue5"]?> (<?=$row["attrtype5"]?>)</td>
				<td><?=$row["attrvalue6"]?> (<?=$row["attrtype6"]?>)</td>
				<td><?=$row["attrvalue7"]?> (<?=$row["attrtype7"]?>)</td>
				<td><?=$row["createtime"]?></td>
			</tr>
			<?php
			}
			?>
		</table>
	</div>
    <div class="bottom"></div>
</div>
<?php } ?>