<?php

error_reporting(0);

function buildDate($day, $month) {
	return date("d.m.Y", mktime(0, 0, 0, $month, $day));
}

function fillArrayWhenDay($day, $icon) {
	$events = array();
	for($i = 1; $i <= 12; $i++) {
		for($x = 1; $x <= date("t", mktime(0, 0, 0, $i, 1)); $x++) {
			if(date("l", mktime(0, 0, 0, $i, $x)) == $day)
				$events[date("d.m.Y", mktime(0, 0, 0, $i, $x))] = $icon;
		}
	}
	return $events;
}

$events = array(
	"01.05.2013" => "../event_images/50137.png",
	);
// Jeden Freitag Beispiel
$events = array_merge($events, fillArrayWhenDay("Friday", "../event_images/50137.png"));

$month = $_GET["month"];
if(empty($month)) {
	$month = date("m");
}

$firstday = date("l", mktime(0, 0, 0, $month, 1));
$days = date("t", mktime(0, 0, 0, $month, 1));

?>
<html>
	<head>
		<style type="text/css">
			.ek, .ek-months {
				background-color: transparent;
				border: 1px solid black;
				padding: 3px;
				margin-bottom: 5px;
				width: 663px;
			}

			.ek-months {
				background-color: #630000; 
			}

			.ek-months a {
				color: white;
				text-decoration: none;
				font-weight: bold;
			}

			.ek-months a.yet {
				text-decoration: underline;
			}

			.ek .ek-headline {
				background-color: #630000; 
				color: white;
			}

			.ek tr td {
				border: 1px solid black;
				width: 13%;
			}

			.ek tr:not(.ek-headline) td {
				background-color: #DFCEA1;
			}

			.ek tr:not(.ek-headline) td img {
				margin: 0 auto;
				display: block;
			}

			.ek tr:not(.ek-headline) td div {
				margin: 10px;
				height: 60px;
				line-height: 60px;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<table class="ek-months">
			<tr>
				<td><a <?php if($month == 1) { echo "class='yet'"; }?> href="?month=1">Ianuarie</a></td>
				<td><a <?php if($month == 2) { echo "class='yet'"; }?> href="?month=2">Februarie</a></td>
				<td><a <?php if($month == 3) { echo "class='yet'"; }?> href="?month=3">Martie</a></td>
				<td><a <?php if($month == 4) { echo "class='yet'"; }?> href="?month=4">Aprilie</a></td>
				<td><a <?php if($month == 5) { echo "class='yet'"; }?> href="?month=5">Mai</a></td>
				<td><a <?php if($month == 6) { echo "class='yet'"; }?> href="?month=6">Iunie</a></td>
				<td><a <?php if($month == 7) { echo "class='yet'"; }?> href="?month=7">Iulie</a></td>
				<td><a <?php if($month == 8) { echo "class='yet'"; }?> href="?month=8">August</a></td>
				<td><a <?php if($month == 9) { echo "class='yet'"; }?> href="?month=9">Septemberie</a></td>
				<td><a <?php if($month == 10) { echo "class='yet'"; }?> href="?month=10">Octombrie</a></td>
				<td><a <?php if($month == 11) { echo "class='yet'"; }?> href="?month=11">Noiembrie</a></td>
				<td><a <?php if($month == 12) { echo "class='yet'"; }?> href="?month=12">Decembrie</a></td>
			</tr>
		</table>
		<table class="ek">
		    <tr class="ek-headline">
		      	<td>Luni</td>
		        <td>Marti</td>
		        <td>Miercuri</td>
		        <td>Joi</td>
		        <td>Vineri</td>
		        <td>Sâmbată</td>
		        <td>Duminică</td>
		    </tr>
		    <tr>
		        <td><?php if($firstday == "Monday") { $day = 1; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } ?></td>
		        <td><?php if($firstday == "Tuesday") { $day = 1; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } else if(!empty($day)) { $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } ?></td>
		        <td><?php if($firstday == "Wednesday") { $day = 1; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } else if(!empty($day)) { $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } ?></td>
		        <td><?php if($firstday == "Thursday") { $day = 1; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } else if(!empty($day)) { $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } ?></td>
		        <td><?php if($firstday == "Friday") { $day = 1; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } else if(!empty($day)) { $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } ?></td>
		        <td><?php if($firstday == "Saturday") { $day = 1; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } else if(!empty($day)) { $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } ?></td>
		        <td><?php if($firstday == "Sunday") { $day = 1; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } else if(!empty($day)) { $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } ?></td>
		    </tr>
		    <tr>
		        <td><?php $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } ?></td>
		        <td><?php $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } ?></td>
		        <td><?php $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } ?></td>
		        <td><?php $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } ?></td>
		        <td><?php $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } ?></td>
		        <td><?php $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } ?></td>
		        <td><?php $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } ?></td>
		    </tr>
		    <tr>
		        <td><?php $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } ?></td>
		        <td><?php $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } ?></td>
		        <td><?php $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } ?></td>
		        <td><?php $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } ?></td>
		        <td><?php $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } ?></td>
		        <td><?php $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } ?></td>
		        <td><?php $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } ?></td>
		    </tr>
		    <tr>
		        <td><?php $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } ?></td>
		        <td><?php $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } ?></td>
		        <td><?php $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } ?></td>
		        <td><?php $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } ?></td>
		        <td><?php $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } ?></td>
		        <td><?php $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } ?></td>
		        <td><?php $day++; if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } ?></td>
		    </tr>
		    <tr>
		        <td><?php $day++; if($day <= $days) { if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } ?></td>
		        <td><?php $day++; if($day <= $days) { if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } ?></td>
		        <td><?php $day++; if($day <= $days) { if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } ?></td>
		        <td><?php $day++; if($day <= $days) { if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } ?></td>
		        <td><?php $day++; if($day <= $days) { if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } ?></td>
		        <td><?php $day++; if($day <= $days) { if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } ?></td>
		        <td><?php $day++; if($day <= $days) { if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } ?></td>
		    </tr>
		    <?php if($day < $days) { ?>
		     <tr>
		        <td><?php $day++; if($day <= $days) { if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } ?></td>
		        <td><?php $day++; if($day <= $days) { if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } ?></td>
		        <td><?php $day++; if($day <= $days) { if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } ?></td>
		        <td><?php $day++; if($day <= $days) { if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } ?></td>
		        <td><?php $day++; if($day <= $days) { if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } ?></td>
		        <td><?php $day++; if($day <= $days) { if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } ?></td>
		        <td><?php $day++; if($day <= $days) { if(!empty($events[buildDate($day, $month)])) { echo "<img src='" . $events[buildDate($day, $month)] . "' />"; } else { echo "<div>" . $day . "</div>"; } } ?></td>
		    </tr>
		    <?php } ?>
		</table>
	</body>
</html>