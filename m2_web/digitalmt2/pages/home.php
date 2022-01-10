<div class="slider"><div class="box">
    <div id="render-azrael"></div>
    <div id="render-shamy"></div>
    <div class="top"></div>
    <div class="middle">
        <div id="slider" class="nivoSlider">
            <img src="img/slider/slider_1.png" alt="" title="#caption1" />
            <img src="img/slider/slider_2.png" alt="" title="#caption2" />
        </div>
        <div id="caption1" class="nivo-html-caption">
            <strong>Siteul are un nou design!</strong><br />
            Noul site oferă nu numai un nou look, dar de asemenea, caracteristici complet noi cum ar fi sistemul de știri.
        </div>
        <div id="caption2" class="nivo-html-caption">
            <strong>Digital Metin2</strong><br />
            Noi garantam longevitate, noi nu doar zicem, noi si facem!
        </div>
    </div>
    <div class="bottom"></div>
</div></div><br /><br />
<div class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Digital Metin2</h3>
        <div class="big-line"></div>
        <?php
            $sqlCmd = "SELECT `threadID`, `boardID`, `topic`, `firstPostPreview`, `time`, `username`, `replies` FROM `wbb1_1_thread` WHERE `boardID`='2' or `boardID`='3' ORDER BY `lastPostTime` DESC LIMIT 0, 4";
            $sqlQry = mysql_query($sqlCmd, $sqlForum);
            for($i = 0; $i < mysql_num_rows($sqlQry); $i++) {
                $obj = mysql_fetch_object($sqlQry);
                echo '<div class="news">';
                echo '<div class="news-ico-' . ($i + 1) . '"></div>';
                echo '<div class="comments"><p class="count">' . $obj->replies . '</p><p>' . ($obj->replies != 1 ? "Antworten" : "Antwort") . '</p></div>';
                echo '<div class="inner">';
                echo '<a href="http://www.digitalmt2.ro/board/' . $obj->threadID . '"><b>' . $obj->topic . '</b></a><br />';
                
                $pattern = '#http(s?)://\S+#i';
                $s = preg_replace($pattern, '', $obj->firstPostPreview);
                
                echo substr($s, 0, 150);
                if(strlen($s) >= 150)
                    echo '...';
                echo '<br />' . date("d.m.Y", $obj->time) . ' <img src="img/news_type_' . ($obj->boardID == 2 ? "news" : "events") . '.png" />';
                echo '</div>';
                echo '</div>';
                if($i < mysql_num_rows($sqlQry) - 1)
                    echo '<div class="small-line"></div>';
            }
        ?>
        <form action="http://www.digitalmt2.ro/board/" method="get"><input type="submit" value="Visit Forum" /></form>
        <div style="clear: both"></div>
    </div>
    <div class="bottom"></div>
</div><br /><br />
<div class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Ingame Screenshots</h3>
        <div class="big-line"></div>
        <div class="screenshots">
            <a rel="prettyPhoto" href="img/screenshots/screen_big_1.png"><img src="img/screenshots/mini_pic1.png" /></a><a rel="prettyPhoto" href="img/screenshots/screen_big_2.png"><img src="img/screenshots/mini_pic2.png" /></a><a rel="prettyPhoto" href="img/screenshots/screen_big_3.png"><img src="img/screenshots/mini_pic3.png" /></a><a rel="prettyPhoto" href="img/screenshots/screen_big_4.png"><img src="img/screenshots/mini_pic4.png" /></a> 
        </div>
        <form action="http://www.digitalmt2.ro/board/" method="get"><input type="submit" value="Display more" /></form>
        <div style="clear: both"></div>
    </div>
    <div class="bottom"></div>
</div>
<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider({
        pauseTime: 5000,
        controlNav: false,
        controlNavThumbs: false,
        prevText: "",
        nextText: ""
    });
});
</script>