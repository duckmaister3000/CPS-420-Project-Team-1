<?php
  define("MYSQL_HOST", "localhost");
  define("MYSQL_USER", "dev");
  define("MYSQL_PASS", "devs");
  define("MYSQL_DB_NAME", "checkmate-dev");

  $db= new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS,MYSQL_DB_NAME);
