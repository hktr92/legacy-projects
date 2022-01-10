<?php
session_start();
ob_start();
include_once("svlogdat/svconfsig.php");
include("svlogdat/func.dark.php");
include("svlogdat/security.php");
//error_reporting(0);
auto_unban();
//sterge_cont_automat();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<!--------------------------------------------------------------------------START PROTECTION-------------------------------------------------------------->


<!-- START Anti-SQL Injection -->
<?php
function madSafety($string) {
$string = stripslashes($string);
$string = strip_tags($string);
$string = mysql_real_escape_string($string);
return $string;
} 
?>

<?php  
$ip = $_SERVER['REMOTE_ADDR'];  
$time = date("l dS of F Y h:i:s A");  
$fp = fopen ("[WEB]SQL_Injection.txt", "a+");  
$sql_inject_1 = array(";","'","%",'"'); #Whoth need replace  
$sql_inject_2 = array("", "","","&quot;"); #To wont replace  
$GET_KEY = array_keys($_GET); #array keys from $_GET  
$POST_KEY = array_keys($_POST); #array keys from $_POST 
$COOKIE_KEY = array_keys($_COOKIE); #array keys from $_COOKIE  
/*begin clear $_GET */  
for($i=0;$i<count($GET_KEY);$i++)  
{  
$real_get[$i] = $_GET[$GET_KEY[$i]];  
$_GET[$GET_KEY[$i]] = str_replace($sql_inject_1, $sql_inject_2, HtmlSpecialChars($_GET[$GET_KEY[$i]]));  
if($real_get[$i] != $_GET[$GET_KEY[$i]])  
{  
fwrite ($fp, "IP: $ip\r\n");  
fwrite ($fp, "Method: GET\r\n");  
fwrite ($fp, "Value: $real_get[$i]\r\n");  
fwrite ($fp, "Time: $time\r\n");  
fwrite ($fp, "==================================\r\n"); 
}  
}  
/*end clear $_GET */  
/*begin clear $_POST */  
for($i=0;$i<count($POST_KEY);$i++)  
{  
$real_post[$i] = $_POST[$POST_KEY[$i]];  
$_POST[$POST_KEY[$i]] = str_replace($sql_inject_1, $sql_inject_2, HtmlSpecialChars($_POST[$POST_KEY[$i]]));  
if($real_post[$i] != $_POST[$POST_KEY[$i]])  
{  
fwrite ($fp, "IP: $ip\r\n");  
fwrite ($fp, "Method: POST\r\n");  
fwrite ($fp, "Value: $real_post[$i]\r\n");  
fwrite ($fp, "Time: $time\r\n");  
fwrite ($fp, "==================================\r\n"); 
}  
}  
/*end clear $_POST */  
/*begin clear $_COOKIE */  
for($i=0;$i<count($COOKIE_KEY);$i++)  
{  
$real_cookie[$i] = $_COOKIE[$COOKIE_KEY[$i]];  
$_COOKIE[$COOKIE_KEY[$i]] = str_replace($sql_inject_1, $sql_inject_2, HtmlSpecialChars($_COOKIE[$COOKIE_KEY[$i]]));  
if($real_cookie[$i] != $_COOKIE[$COOKIE_KEY[$i]])  
{  
fwrite ($fp, "IP: $ip\r\n");  
fwrite ($fp, "Method: COOKIE\r\n");  
fwrite ($fp, "Value: $real_cookie[$i]\r\n");  
fwrite ($fp, "Script: $script\r\n");  
fwrite ($fp, "Time: $time\r\n");  
fwrite ($fp, "==================================\r\n"); 
}  
}  

/*end clear $_COOKIE */  
fclose ($fp);  
?>


<?PHP
    FUNCTION anti_injection( $user, $pass ) {

            $banlist = ARRAY (
                    "insert", "select", "update", "delete", "distinct", "having", "truncate", "replace",
                    "handler", "like", " as ", "or ", "procedure", "limit", "order by", "group by", "asc", "desc"
            );
            IF ( EREGI ( "[a-zA-Z0-9]+", $user ) ) {
                    $user = TRIM ( STR_REPLACE ( $banlist, '', STRTOLOWER ( $user ) ) );
            } ELSE {
                    $user = NULL;
            }

            IF ( EREGI ( "[a-zA-Z0-9]+", $pass ) ) {
                    $pass = TRIM ( STR_REPLACE ( $banlist, '', STRTOLOWER ( $userpass ) ) );
            } ELSE {
                    $pass = NULL;
            }

            $array = ARRAY ( 'user' => $user, 'pass' => $userpass );
            IF ( IN_ARRAY ( NULL, $array ) ) {
                    DIE ( 'Invalid use of login and/or password. Please use a normal method.' );
            } ELSE {
                    RETURN $array;
            }
    }
?>
<?php 

function mysql_safe($query,$params=false) { 
    if ($params) { 
        foreach ($params as &$v) { $v = mysql_real_escape_string($v); }  
        $sql_query = vsprintf( str_replace("?","'%s'",$query), $params );    
        $sql_query = mysql_query($sql_query);  
    } else { 
        $sql_query = mysql_query($query);  
    } 
    return ($sql_query); 
} 
?>

<?php 
class secure{    function secureSuperGlobalGET($key)
    {
        $_GET[$key] = str_ireplace("script", "blocked", $_GET[$key]);
        $_GET[$key] = strip_tags($_GET[$key]);
        return $_GET[$key];
    }


    function secureSuperGlobalPOST($key)
    {
        $_POST[$key] = str_ireplace("script", "blocked", $_POST[$key]);
        $_POST[$key] = strip_tags($_POST[$key]);
        return $_POST[$key];
    }



    function secureVar($key){
        $key = str_ireplace("script", "blocked", $key);
        $key = strip_tags($key);
        return $key;
    }
}
?>

<!-- END Anti-SQL Injection -->


<!-----------------------------------------------------------------------!>


<!-- Cookie Protect -->

<?php 
  foreach ($_COOKIE as $key => $value) { 
    if(get_magic_quotes_gpc()) $_COOKIE[$key]=stripslashes($value); 
    $_COOKIE[$key] = mysql_real_escape_string($value); 
  } 
?>

<!-- END Cookie Protect -->

	
<!-----------------------------------------------------------------------!>
	
	
<!-- START XSS Protection -->

<?php
/**
 * Protejeaza de atacuri xss
 * @param type string $str - stringul care trebuie protejat de xss
 * @param type string $allowable_tags - tagurile pe care nu le va elimina, exemplu <b>
 */
function strip_xss($str,$allowable_tags=false){
    //daca sa setat tag care sa nu fie eliminat
    if(!$allowable_tags){
        //facem strip_tags fara a elimina tagul(rile) dorit
        $rez = strip_tags($str,$allowable_tags); 
    }
    //altfel
    else{
        //facem strip_tags
        $rez = strip_tags($str);
    }
     
    //daca se introduce javascript:alert() in input
    if(stripos($rez, "javascript:") !== false) { 
        //eliminam javascript:
        $result = str_replace("javascript:","", htmlentities($rez, ENT_QUOTES)); 

    } 
    //altfel
    else { 
        //tranformama in entitati html, protectia este pusa pentru " onchange="alert(document.cookie); etc
        $result = htmlentities($rez, ENT_QUOTES); 
    }
    
    return $result; 
}
?>

<!-- END XSS Protection -->

<!-----------------------------------------------------------------------!>

<!-- START FIREWALL -->

<?php
define('PHP_FIREWALL_REQUEST_URI', strip_tags( $_SERVER['REQUEST_URI'] ) );
define('PHP_FIREWALL_ACTIVATION', true );
if ( is_file( @dirname(__FILE__).'/php-firewall/firewall.php' ) )
	include_once( @dirname(__FILE__).'/php-firewall/firewall.php' );
?>

<!-- STOP FIREWALL -->

<!-----------------------------------------------------------------------!>

<script language=Javascript1.2> function ejs_nodroit() {return(false); } document.oncontextmenu = ejs_nodroit; </script>


<!--------------------------------------------------------------------------END PROTECTION-------------------------------------------------------------->

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/images/favicon.ico" rel="icon" type="image/x-icon" />
<title>Rapsodia M2 - Istoria continua...</title>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>
<link href='images/style.css' rel='stylesheet' type='text/css'>
<style type="text/css">
<!--
body {
	background-image: url(images/bg.png);
	background-repeat: no-repeat;
	background-color: #040106;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-position:top center;
}
body,td,th {
	font-size: 12px;
	color: #999999;
}
a:visited {
	color: #946767;
	text-decoration: none;
}
a:link {
	color: #946767;
	text-decoration: none;
}
a:hover {
	color: #FFF;
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
-->
</style>
<SCRIPT TYPE="text/javascript">
<!--
//Disable right click script
var message="Sorry, right-click has been disabled";
///////////////////////////////////
function clickIE() {if (document.all) {(message);return false;}}
function clickNS(e) {if
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {(message);return false;}}}
if (document.layers)
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
document.oncontextmenu=new Function("return false")
// -->
</SCRIPT>
<script type="text/javascript" src="scripts1/jq_base.js"></script>
<script type="text/javascript" src="scripts1/jq.dataTables.js"></script> 
<script type="text/javascript" src="scripts1/jquery.js"></script>
<script type="text/javascript" src="scripts1/jquery.js"></script>

<script type="text/javascript">
//<!--
$(document).ready(function() {$(".w2bslikebox").hover(function() {$(this).stop().animate({right: "0"}, "medium");}, function() {$(this).stop().animate({right: "-250"}, "medium");}, 500);});
//-->
</script>
<style type="text/css">
.w2bslikebox{background: url("http://1.bp.blogspot.com/--tscpVzcBjo/TdUarKtcAlI/AAAAAAAAA3I/qVkypiYO9rc/s150/w2b_facebookbadge.pn") no-repeat scroll left center transparent !important;display: block;float: right;height: 270px;padding: 0 5px 0 46px;width: 245px;z-index: 99999;position:fixed;right:-250px;top:20%;}
.w2bslikebox div{border:none;position:relative;display:block;}
.w2bslikebox span{bottom: 12px;font: 8px "lucida grande",tahoma,verdana,arial,sans-serif;position: absolute;right: 6px;text-align: right;z-index: 99999;}
.w2bslikebox span a{color: #808080;text-decoration:none;}
.w2bslikebox span a:hover{text-decoration:underline;}
</style><div class="w2bslikebox" style=""><div>
<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FM2Rapsodia&amp;width&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=1405838673020229" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:290px; background:#fff;" allowTransparency="false"></iframe></div></div>
</head>
<body>

<table width="1024" height="1858" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td colspan="3" valign="middle" background="images/topmenu.png" width="1024" height="50" alt="" align="center">
        <!-- topbar -->
    Stil Joc : <font color="#8cff2f">PvP Classic</font> &nbsp;&nbsp;&nbsp; Canale Deschise: <font color="#8cff2f">1</font> &nbsp;&nbsp;&nbsp; Server : <img src="http://i.imgur.com/e4Mdoup.gif">  &nbsp;&nbsp;&nbsp; Jucatori Online :  <font color="#8cff2f"></font> <?php
    $exe = mysql_query("SELECT COUNT(*) as count FROM player.player WHERE DATE_SUB(NOW(), INTERVAL 15 MINUTE) < last_play;");
	$player_onlin = mysql_fetch_object($exe)->count;
	$player_online = $player_onlin + 1;
    if ($player_onlin < '3')
    echo "<span style=\"color:#008B8B\" title=\"Serverul poate fi offline\">$player_onlin</span>";
    else
    echo "<span style=\"color: #8cff2f\">$player_online</span>";
	$mcount = mysql_query("SELECT COUNT(*) as count from player.marriage");
	echo '&nbsp;&nbsp;&nbsp; Cupluri casatorite: <font color="#8cff2f"><b>'.mysql_result($mcount, 0).'</font></b>';
	
        ?>&nbsp;&nbsp;&nbsp; </span>Jucatori online in 24h:<span style="color: #FFFFF"></span><?php
    $exe = mysql_query("SELECT COUNT(*) as count FROM player.player WHERE DATE_SUB(NOW(), INTERVAL 1440 MINUTE) < last_play;");
    $player_onlin = mysql_fetch_object($exe)->count;
	$player_online = $player_onlin + 1;
    if ($player_onlin < '3')
    echo "<span style=\"color:#008B8B\" title=\"Serverul poate fi offline\">$player_onlin</span>";
    else
    echo "<span style=\"color:#8cff2f\">$player_online</span>";

        ?>

 <!-- topbar end -->
        </td>
	</tr>
	<tr>
		<td colspan="3"><img src="images/top.png" width="1024" height="397" alt=""></td>
	</tr>
	<tr valign="top">
		<td background="images/left.png" width="244" height="1227" alt="" >
        <!-- lefttable -->
        <table width="240" border="0" cellspacing="0" cellpadding="0" style="padding-top:45px; padding-left:4px;">
          <tr valign="top">
            <td height="300">
            <!-- login start-->
        <div id="ack"></div> <?php if(!isset($_SESSION['user']) && !isset($_SESSION['pass'])){
			login();
									?>
		<form id="myForm" action="Acasa" method="POST">
				<table border="0" align="center" cellpadding="1" cellspacing="0" style="padding-left:5px; padding-top:35px; ">
				  <tr>
					<td width="158"><input name="username" type="text" class="login_field" id="username" OnClick="this.value=''" value="utilizator"></td>
				  </tr>
				  <tr>
					<td><input name="password" type="password" class="login_field" id="password" OnClick="this.value=''" value="password"></td>
					</tr>
                     <tr>
                  <td width="61"  align="right"><button name="submit" type="submit" class="login_btn" id="submit"></button></td>
                  </tr>
				  <tr>
					<td  class="login_text"><a href="Inregistrare" class="login_text">Creaza cont</a> - <a href="http://metin2rapsodia.ro/schimbaredate/index.php?page=recuperare-pw" class="login_text">Recuperare parola</a></td>
					</tr>
					<tr>
					</tr>					
					</tr>
  			</table>
  </form><?php } else{ ?> <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="196" height="10"></td>
          <tr>
            <td class="main_menu"><a HREF="Panou">&raquo; Panou utilizator</a></td>
          </tr>
           <tr>
            <td class="main_menu"><a HREF="Caractere">&raquo; Caractere</a></td>
         </tr>
		<tr>
            <td class="main_menu"><a HREF="Doneaza">&raquo; Doneaza</a></td>
         </tr>
          <tr>
            <td class="main_menu"><a HREF="http://metin2rapsodia.ro/schimbaredate/index.php?page=schimbare-email">&raquo; Schimba email</a></td>
          </tr>
		    <tr>
            <td class="main_menu"><a HREF="http://metin2rapsodia.ro/schimbaredate/index.php?page=schimbare-pw">&raquo; Schimba parola</a></td>
          </tr>
		    <tr>
            <td class="main_menu"><a HREF="http://metin2rapsodia.ro/schimbaredate/index.php?page=parola-depozit">&raquo; Cere parola depozit</a></td>
          </tr>
		    <tr>
            <td class="main_menu"> <a HREF="http://metin2rapsodia.ro/schimbaredate/index.php?page=cod-stergere">&raquo; Cod stergere caractere</a></td>
          </tr>
		  <tr>
            <td class="main_menu"> <a HREF="http://metin2rapsodia.ro/schimbaredate/index.php?page=cod-secret">&raquo; Codul secret</a></td>
          </tr>
		  <tr>
            <td class="main_menu"> <a HREF="http://metin2rapsodia.ro/index.php?page=sms">&raquo; Plata Sms Automata</a></td>
          </tr>
		  <tr>
            <td class="main_menu"> <a HREF="http://metin2rapsodia.ro/index.php?page=schimba-regat">&raquo; Schimba regat</a></td>
          </tr>
		    <tr>
            <td class="main_menu"><a HREF="Delogare">&raquo; Logout</a></td>
          </tr>
		  
        </table>   <Br> 

<?php } ?>

		</td>
      </tr> <!-- login end -->
            </td>
          </tr>
          <tr>
            <td height="200" style="padding-top:25px; padding-left:17px;" align="center"> 
            <center><a href="http://metin2rapsodia.ro/index.php?page=jucatori"><img src="images/cc.png"></center>
            <table border="0" align="center" cellpadding="0" cellspacing="0" width="80%" >
   <tr>
    <td colspan="3" height="5"></td>
    </tr>
  	<?php include('svlogdat/jucatori.php');?>

	        </td>
          </tr>
        </table>

        <!--lefttable end-->
        </td>
		<td background="images/content.png" width="534" height="1227" alt="">
        <!-- content -->
        <table width="500" border="0" cellspacing="0" cellpadding="0" style="padding-left:25px; padding-top:25px;">
          <tr>
            <td>
         <table width="100%" align="center" class="content">
		 	<tr>
				<td valign="top"><?php loadcontent();?>
          </td>
			</tr>
		 </table>

  </td>
          </tr>
        </table>
        <!-- content end -->
        </td>
		<td background="images/right.png" width="246" height="1227" alt="">
        <!-- righttable -->
        <table width="240" border="0" cellspacing="0" cellpadding="0" style="padding-top:45px; padding-left:4px;">
          <tr>
            <td valign="top" height="300">
            <!-- rightmenu -->
            <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="196" height="10"></td>
          </tr>
          <tr>
            <td class="main_menu"><a href="Acasa" >ACASA</a></td>
          </tr>
          <tr>
            <td class="main_menu"><a href="Inregistrare">INREGISTRARE</a></td>
          </tr>
          <tr>
            <td class="main_menu"><a href="Descarcare">DESCARCARE</a></td>
          </tr>
		  <tr>
            <td class="main_menu"><a href="http://metin2rapsodia.ro/index.php?page=jucatori-activi">CLASAMENT JUCATORI ACTIVI</a></td>
          </tr>
		   <tr>
            <td class="main_menu"><a href="http://metin2rapsodia.ro/index.php?page=jucatori-ucideri">CLASAMENT JUCATORI UCIDERI</a></td>
          </tr>
		    <tr>
            <td class="main_menu"><a href="Regulament">REGULAMENT</a></td>
          </tr>
		  
		     <tr>
            <td class="main_menu"><a href="http://metin2rapsodia.ro/board/">FORUM</a></td>
          </tr>
		  <tr>
            <td class="main_menu"><a href="http://metin2rapsodia.ro/ishop">ITEMSHOP MD</a></td>
          </tr>
		  <tr>
            <td class="main_menu"><a href="http://metin2rapsodia.ro/ishopjd">ITEMSHOP JD</a></td>
          </tr>
		  <tr>
            <td class="main_menu"><a href="https://www.facebook.com/groups/metindinplictiseala/">GRUP FACEBOOK</a></td>
          </tr>
		   <tr>
            <td class="main_menu"><a href="https://www.facebook.com/M2Rapsodia">PAGINA FACEBOOK</a></td>
          </tr>
		  <tr>
            <td class="main_menu"><a href="http://metin2rapsodia.ro/ghiduri.php">DIVERSE GHIDURI M2RP</a></td>
          </tr>
		    <tr>
            <td class="main_menu"><a href="http://metin2rapsodia.ro/board/viewtopic.php?f=0&p=11219">DESCRIERE AMANUNTITA</a></td>
          </tr>
		  <tr>
            <td class="main_menu"><a href="http://metin2rapsodia.ro/board/viewtopic.php?f=18&t=1378">CALENDARUL EVENIMENTELOR</a></td>
          </tr>
		  <tr>
            <td class="main_menu"><a href="http://metin2rapsodia.ro/roata/">ROATA NOROCULUI</a></td>
          </tr>
		  <center>		  
</a></center>
        </table>
<br><br>
      <center><a href="index.php?page=alege"><img src="images/cufar.png"></a></center>
            <!-- rightmenu end-->
           
            </td>
          </tr>
          <tr>
            <td height="200" style="padding-top:25px; padding-right:17px;" align="center">
            <center><center><a href="http://metin2rapsodia.ro/index.php?page=bresle"><img src="images/cc.png"></center></center>
            <table border="0" align="center" cellpadding="0" cellspacing="0" width="80%" >
   <tr>
    <td colspan="3" height="5"></td>
    </tr>
	<?php include('svlogdat/bresle.php');?>

	            </td>
          </tr>
        </table>

        <!-- righttable end -->
        </td>
	</tr>
	<tr>
		<td colspan="3" background="images/footer.png" width="1024" height="184" alt="">
		<p class="copyright">Copyright @ 2014-2015 Metin2 Rapsodia. Toate drepturile sunt rezervate. </a> </p>
        <p class="copyright">Website created by <a href="http://darkdev.eu">darkdev.eu</a> si imbunatatit de catre Kostoman. </p>
        
<!--/ GTop.ro - (begin) v2.1/-->
<center><script type="text/javascript" language="javascript">
var site_id = 74610;
var gtopSiteIcon = 13;
var _gtUrl = (("https:" == document.location.protocol) ? "https://secure." : "http://fx.");
document.write(unescape("%3Cscript src='" + _gtUrl + "gtop.ro/js/gTOP.js' type='text/javascript'%3E%3C/script%3E"));
</script></center>
<!--/ GTop.ro - (end) v2.1/-->
		</td>
	</tr>
</table>
</body>
</html>
<embed src="login2.mp3" width="0" height="0"></embed>
