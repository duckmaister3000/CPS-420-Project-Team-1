<?php
  if(!isset($_SESSION['auth']) || $_SESSION['auth'] == false) {
    header("location: login.php");
  }
  //HEADER FILE
?>
<html>
  <head>
    <title><?php echo $title; ?></title>
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
  </head>
  <body>
    <header class="header">
      <div class="header-title">CheckMate</div>
    </header>
    <div class="notif">
      <p>Stuff</p>
    </div>
