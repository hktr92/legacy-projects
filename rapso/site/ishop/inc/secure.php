<?php
$ip = $_SERVER['REMOTE_ADDR'];
$sql_inject_1 = array(";","'","%",'"',"SHUTDOWN","DROP","SET","INSERT","SELECT","UPDATE","DELETE","ALTER","TRUNCATE ","shutdown","drop","set","insert","select","update","delete","alter","truncate");
$sql_inject_2 = array("", "","",'"');
$GET_KEY = array_keys($_GET);
$POST_KEY = array_keys($_POST);
$COOKIE_KEY = array_keys($_COOKIE);

/* CLEAR $_GET */
for($i=0;$i<count($GET_KEY);$i++)
{
$real_get[$i] = $_GET[$GET_KEY[$i]];
$_GET[$GET_KEY[$i]] = str_replace($sql_inject_1, $sql_inject_2, HtmlSpecialChars($_GET[$GET_KEY[$i]]));

}

/* CLEAR $_POST*/
for($i=0;$i<count($POST_KEY);$i++)
{
$real_post[$i] = $_POST[$POST_KEY[$i]];
$_POST[$POST_KEY[$i]] = str_replace($sql_inject_1, $sql_inject_2, HtmlSpecialChars($_POST[$POST_KEY[$i]]));
}
/*end clear $_POST */

/*a little sql script */
function check_inject() {
$badchars = array(";","'","%",'"',"SHUTDOWN","DROP","SET","INSERT","SELECT","UPDATE","DELETE","ALTER","TRUNCATE ","shutdown","drop","set","insert","select","update","delete","alter","truncate");
foreach($_POST as $value) {
if(in_array($value, $badchars)) { exit(); }
else { 
$check = preg_split("//", $value, -1, PREG_SPLIT_OFFSET_CAPTURE);
foreach($check as $char) {
if(in_array($char, $badchars)) { exit();}
}
 }
  }
   }
//*end sql script
?>