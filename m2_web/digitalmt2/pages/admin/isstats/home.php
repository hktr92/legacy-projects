<?php
	if($_SESSION['user_admin']>=9) {
?>
<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Itemshop Statistiken</h3>
        <div class="big-line"></div>
		<ul class="menue">
			<li><a href="index.php?s=admin&a=isstats&is=top5">Top 5 Artikel</a></li>
			<li><a href="index.php?s=admin&a=isstats&is=mostincome">Am meisten Gewinn bringend</a></li>
			<li><a href="index.php?s=admin&a=isstats&is=last5">Die 5 am wenigsten gekauften</a></li>
		</ul>
	</div>
	<div class="bottom"></div>
</div>
<?php
	}
?>