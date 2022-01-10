<?PHP
error_reporting(0);
	session_name("m2_shiro2");
	session_start();

  	require("./inc/config.inc.php");
  	require("./inc/rights.inc.php");
    require("./inc/functions.inc.php");
	
	$sqlServ = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS);
	
	if(!is_resource($sqlServ)) {
		exit("Conectarea a esuat!");
	}
	
    $includeDir = ".".DIRECTORY_SEPARATOR."pages".DIRECTORY_SEPARATOR;
    $includeDefault = $includeDir."home.php";
         
    if(isset($_GET['s']) && !empty($_GET['s'])){
		$_GET['s'] = str_replace("\0", '', $_GET['s']);
		$includeFile = basename(realpath($includeDir.$_GET['s'].".php"));
		$includePath = $includeDir.$includeFile;
		if(!empty($includeFile) && file_exists($includePath)) 
			{
				include($includePath);
			}
			else 
			{
				include($includeDir . "notfound.php");
		}
	} 
	else 
	{
		include($includeDefault);
	}
	
	mysql_close();
?>