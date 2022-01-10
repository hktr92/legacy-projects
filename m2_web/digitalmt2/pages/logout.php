<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Delogare</h3>
        <div class="big-line"></div>
<?PHP
  unset($_SESSION['user_id']);
  unset($_SESSION['user_name']);
  unset($_SESSION['user_admin']);
  unset($_SESSION['user_coins']);
  echo'<meta http-equiv="refresh" content="5; URL=index.php?s=home"> ';
?>
V-ați delogat cu succes.<br />
În <u>5 Secunde</u> vei fi redirectionat.
   </div>
    <div class="bottom"></div>
</div>
