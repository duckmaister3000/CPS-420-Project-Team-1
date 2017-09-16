<?php
  $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB_NAME);
  if($db->connect_error){
      echo $db->error;
      die();
  }
