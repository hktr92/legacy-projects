<?php

class IPBlock {
   
   private $mysql;
   
   public function __construct($IP) {
      
      $this->checkAlreadyBlocked($IP);
      
      require 'inc/special.mysql.php';
      $this->mysql = new mysqli($host, $username, $password);
      $this->mysql->select_db("starlong_ipblock");
      if(!$this->mysql->connect_error) {
         $sql = "SELECT `count`, `last` FROM `log` WHERE `ip`='" . $IP . "'";
         $result = $this->mysql->query($sql);
         if($result->num_rows == 1) {
            $row = $result->fetch_row();
            if($row[0] <= 250 && $row[1] + 60 > time()) {
               $sql = "UPDATE `log` SET `count`=`count`+1, `last`='" . time() . "' WHERE `ip`='" . $IP . "'";
               $this->mysql->query($sql);
            } else {
               if($row[1] + 60 < time()) {
                  $sql = "UPDATE `log` SET `count`='1', `last`='" . time() . "' WHERE `ip`='" . $IP . "'";
                  $this->mysql->query($sql);
               } else if($row[0] > 250) {
                  $handle = fopen("blocked/ips.txt", "a+");
                  fwrite($handle, $IP . PHP_EOL);
                  fclode($handle);
                  
                  echo file_get_contents("blocked.html");
                  exit();
               }
            }
         } else {
            $sql = "INSERT INTO `log`(`count`, `last`, `ip`) VALUES('1', '" . time() . "', '" . $IP . "')";
            $this->mysql->query($sql);
         }
      } else {
      }
      
   }
   
   public function checkAlreadyBlocked($IP) {
      $content = file_get_contents("blocked/ips.txt");
      $ips = explode(PHP_EOL, $content);
      if(array_search($IP, $ips) === false) 
      {
         
      } else 
      {
         echo file_get_contents("blocked.html");
         exit();
      }
   }
   
}
?>
