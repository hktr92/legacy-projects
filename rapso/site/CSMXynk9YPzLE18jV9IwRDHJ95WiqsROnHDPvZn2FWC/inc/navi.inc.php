<style type="text/css">
<!--
.style1 {color: #00FFFF}
-->
</style>
<ul>
 <center> <li><a href="index.php">Acas�</a></li>
  <li><a href="index.php?s=news">Nout�&#355;i</a></li>
  <li><a href="index.php?s=events">Evenimente</a></li>
  <li><a href="index.php?s=rankings">Clasament</a></li>
  <span class="style1">
  <?PHP
  if(isset($_SESSION['user_admin']) && checkInt($_SESSION['user_admin']) && $_SESSION['user_admin']>=0) {
    echo'<li><a href="index.php?s=login">Contul t�u</a></li>';
    echo'<li><a href="#">Forum</a></li>';
	echo'<font color=\"blue\"><li><a href="/chat">Chat*</a></li></font>';
  }
  else {
    echo'<li><a href="index.php?s=register">�nregistrare</a></li>';
    echo'<li><a href="index.php?s=login">Login</a></li>';
	echo'<li><a href="index.php?s=video">Video</a></li>';
  }
?>
  </span>
  <!--<li><a href="index.php?s=video">Video</a></li></center>-->
  <li><a href="index.php?s=team">Echip�</a></li></center>
  <li><a href="index.php?s=downloads">Desc�rcare</a></li></center>
</ul>