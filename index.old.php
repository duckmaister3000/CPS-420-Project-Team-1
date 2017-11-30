<?php
  require "config.php";
  require "inc/app.php";
?>
<!DOCTYPE html>
<html>
<div class="modal" id="error-modal">
  <div class="modal-content" onclick="closeModal()">
    <h1>ERROR!!</h1>
    <h3>You just bought hot pockets!!</h3>
    <p>Oh wait... Nevermind. You just missed something in the form. Go back and fix it</p>
    <p>Click this message to close it.</p>
  </div>
</div>
<head>
  <link rel="stylesheet" type="text/css" href="css\style.css">
  <title>Check Tracking System</title>
  <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/scripts.js"> </script>
</head>
<body>
<div id="wrapper">
  <header>
    <h1>CheckMate - PoC</h1>
  </header>
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
        <label for="street">Street: </label><input type="text" id="street"><br>
        <label for="city">City: </label><input type="text" id="city"><br>
        <label for="state">State: </label><input type="text" id="state"><br>
        <label for="zip">Zip: </label><input type="text" id="zip"><br>
      </div>
      <div class="input-section">
        <h2>Check Informtation</h2>
        <label for="routingNumber">Routing No.</label>
        <input type="text" id="routingNumber"><br>
        <label for="accountNumber">Account No.</label>
        <input type="text" id="accountNumber">
      </div>
    </form>
    <input type="button" onclick="update()" value="Update" />
    <input type="button" onclick="create()" value="Create" />
    <input type="button" onclick="del()" value="Delete" />
  </div>
</div>

</body>
</html>
