<?php
  require "config.php";
  require "inc/app.php";
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css\style.css">
  <title>Check Tracking System</title>
  <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/scripts.js"> </script>
</head>
<body>
<div id="wrapper">
  <h1>Check Tracking System</h1>
  <div class="list-panel">
    <div class="item-list">
      <table id="list" style="width:100%">
        <?php App::get_accounts(); ?>
      </table>
    </div>
  </div>
  <div class="input-panel">
    <form action="/" method="post">
      <div class="input-section">
        <h2>Name</h2>
        <label for="firstname">First </label><input type="text" id="firstname"><br>
        <label for="firstname">Last </label><input type="text" id="lastname">
      </div>
      <div class="input-section">
        <h2>Address</h2>
        <label for="street"><input type="text" id="street"><br>
        <label for="city"><input type="text" id="city"><br>
        <label for="state"><input type="text" id="state"><br>
        <label for="zip"><input type="text" id="zip"><br>
      </div>
      <div class="input-section">
        <h2>Check Informtation</h2>
        <label for="routingNumber">Routing No.</label>
        <input type="text" id="routingNumber"><br>
        <label for="accountNumber">Account No.</label>
        <input type="text" id="accountNumber">
      </div>
      <div class="input-section">
        <input type="button" onclick="update()" value="Update" />
        <input type="button" onclick="create()" value="Create" />
        <input type="button" onclick="del()" value="Delete" />
      </div>
    </form>
  </div>
</div>

</body>
</html>
