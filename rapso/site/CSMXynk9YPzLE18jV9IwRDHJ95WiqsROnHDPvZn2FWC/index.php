<?PHP
 error_reporting(0); 
  session_start();
  require("inc/config.inc.php");
  require("inc/rights.inc.php");
  require("inc/functions.inc.php");
  
  $sqlHp = mysql_connect(SQL_HP_HOST, SQL_HP_USER, SQL_HP_PASS);
  $sqlServ = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS);
  
  if(!is_resource($sqlServ) OR !is_resource($sqlHp)) {
    echo("<center>");
	echo"<img src=\"/img/icons/uhh.png\">";
	exit("<br/>Offline! Server-ul este in mentenanta.<center>");

  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?PHP echo $serverSettings['titel_page']; ?></title>

<meta name="description" content="<?PHP echo $serverSettings['titel']; ?>" />
<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon" />
<link href="css/reset.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/all.css" rel="stylesheet" type="text/css" media="all"/>
<link  href="css/plugins.css" rel="stylesheet" type="text/css" media="screen" />
<!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="css/IE/ie6.css" media="screen"/><![endif]-->
<!--[if gte IE 6]><link rel="stylesheet" type="text/css" href="css/IE/ie7.css" media="screen"/><![endif]-->
<script type="text/javascript" src="js/jquery-latest.pack.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine.modified.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine.rules.html"></script>
<script type="text/javascript" src="js/iepngfix_tilebg.js"></script>
<script type="text/javascript" src="js/jquery.tools.min.js"></script>
<script type="text/javascript" src="js/jquery.fancybox-1.3.1.pack.js"></script>
<script type="text/javascript" src="js/jquery.bgiframe.js"></script>
<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>
	<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images
			*/

			$("a#example1").fancybox();
             
			$("a#example2").fancybox({
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});

			$("a#example3").fancybox({
				'transitionIn'	: 'none',
				'transitionOut'	: 'none'	
			});

			$("a#example4").fancybox({
				'opacity'		: true,
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'none'
			});
			
			$("a#example_itemshop").fancybox({
				'opacity'		: true,
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'none'
			});
			
			$("a#example_profil").fancybox({
				'opacity'		: true,
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'none'
			});
			
			$("a#example5").fancybox();

			$("a#example6").fancybox({
				'titlePosition'		: 'outside',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});

			$("a#example7").fancybox({
				'titlePosition'	: 'inside'
			});

			$("a#example8").fancybox({
				'titlePosition'	: 'over'
			});

			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

			/*
			*   Examples - various
			*/

			$("#various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});

			$("#various2").fancybox();

			$("#various3").fancybox({
				'width'				: '66.8%',
				'height'			: '75.1%',
				'autoScale'			: true,
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				'type'				: 'iframe'
			});

			$("#various4").fancybox({
				'padding'			: 0,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
			$("#various_itemshop").fancybox({
				'width'				: '64%',
				'height'			: '78%',
				'autoScale'			: false,
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				'type'				: 'iframe'
			});
			$("#various5").fancybox({
				'width'				: '46.2%',
				'height'			: '78%',
				'autoScale'			: false,
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				'type'				: 'iframe'
			});
			$("#various_profil").fancybox({
				'width'				: '64%',
				'height'			: '78%',
				'autoScale'			: false,
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				'type'				: 'iframe'
			});
		});
	</script>
	
</head>
<div class="container-wrapper">
		<div class="container">
			<div class="col-1">
				<div class="boxes-top">&nbsp;</div>
				<div class="modul-box">
					<div class="modul-box-bg">
						<div class="modul-box-bg-bottom">
							<!-- main navigation -->
							<ul class="main-nav">
								
								<li class="active"><a href=""><font color="#FF8000"></a></li>
								<li class="active"><a href=""><font color="#FF8000"></a></li>
								<li class="active"><a href="index.php?a=home"><font color="#FF8000">Acasa</a></li>
								<li class="active"><a href="index.php?a=logout"><font color="#FF8000">Delogare</a></li>
								<li class="active"><a href="http://metin2rapsodia.ro/"><font color="#FF8000">Rapsodia II</a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="col-2">
	<div class="content content-last">
		<div class="content-bg">
			<div class="content-bg-bottom">
<?PHP
	if($_SESSION['user_admin']>0 && $_SESSION['user_id'] > 0) 
	{
		
		$adminPath = ".".DIRECTORY_SEPARATOR."user".DIRECTORY_SEPARATOR."admin".DIRECTORY_SEPARATOR;
		$includeDefault = $adminPath."home.php";
		if(isset($_GET['a']) && !empty($_GET['a']))
		{
			$_GET['a'] = str_replace("\0", '', $_GET['a']);
			$includeFile = basename(realpath($adminPath.$_GET['a'].".php"));
			$includePath = $adminPath.$includeFile;
			
			if(!empty($includeFile) && file_exists($includePath)) 
			{
				include($includePath);
			}
			else 
			{
				include($includeDefault);
			}
		} 
		else 
		{
			include($includeDefault);
		}
	}
	else
	{
?>
<form action="" method="POST">
	<p>Nume utilizator: <br><input type="text" name="login"></p>
	<p>Parola: <br><input type="password" name="password"></p>
	<p><input type="submit" value="Trimite"></p>
</form>
<?
		if(isset($_POST['login'], $_POST['password'])) {
			$login = mysql_real_escape_string($_POST['login']);
			$password = mysql_real_escape_string($_POST['password']);
			if(empty($login) || empty($password)) {
				echo 'Toate campurile sunt obligatorii!';
			} else {
				$sql = mysql_query("SELECT COUNT(*) FROM account.account WHERE login='{$login}' AND password=PASSWORD('{$password}')");
				$count = mysql_result($sql, 0);
				if($count == 0) {
					echo 'Numele de utilizator sau parola sunt invalide!';
				} else {
					
					$sql = mysql_query("SELECT web_admin FROM account.account WHERE login='{$login}'");
					$admin_rights = mysql_result($sql, 0);
					
					if($admin_rights < 9) {
						echo 'Nu ai permisiunea de a accesa aceasta zona!';
					} else {
						$sql = mysql_query("SELECT id FROM account.account WHERE login='{$login}'");
						$account_id = mysql_result($sql, 0);
						
						$_SESSION['user_admin'] = $admin_rights;
						$_SESSION['user_id'] = $account_id;
						header('Location: index.php?a=home');
						exit();
					}
				}
			}
		}
	}
?>
				<div class="box-foot"></div>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
</div>
</div>