<?PHP
  if(isset($_SESSION['user_admin']) && checkInt($_SESSION['user_admin']) && $_SESSION['user_admin']>=0) {
    ?>
    <div id="userInfo">
      <a href="index.php?s=logout">Delogare</a>
      <a href="index.php?s=login">Contul t&#259;u</a>
      <a href="index.php?s=itemshop">Magazinul de iteme</a>
      <?PHP
        if($_SESSION['user_admin']>0) { echo'<a href="index.php?s=admin">Zonã administrare</a>'; }
      ?>
    </div>
    <?PHP
  }
  else {
  ?>
    <form id="userInfo" style="margin:0;padding:0; float:right;" action="index.php?s=login" method="POST">
      <input type="text"  AUTOCOMPLETE="off" maxlength="16" size="10" name="userid">&nbsp;<input type="password" AUTOCOMPLETE="off" maxlength="16" size="10" name="userpass">&nbsp;<input type="submit" value="LOGIN" name="submit"> 
    </form>
  <?PHP
  }
?>