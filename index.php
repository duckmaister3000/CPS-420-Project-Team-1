<?php
include 'inc/app.php';
include 'page-parts/header.php';
include 'page-parts/sidebar.php';
 ?>




 <?php //print_r($_SESSION);

$Users="SELECT * FROM user  ";
$res = mysqli_query($db, $Users);
$No_Users = mysqli_num_rows($res);

$accounts= "SELECT * FROM account ";
$ac_res = mysqli_query($db, $accounts);
$No_Accounts = mysqli_num_rows($ac_res);

$company= "SELECT * FROM company  ";
$cp_res = mysqli_query($db, $company);
$No_Companies = mysqli_num_rows($cp_res);

$store= "SELECT * FROM store  ";
$store_res = mysqli_query($db, $company);
$No_store = mysqli_num_rows($store_res);

//no. of letters sent
// logged in as






 ?>
<!--PAGE CONTENT GOES HERE-->

<!DOCTYPE html>
<html>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="css/dashboard.css">
<head>

<body>

<div class="w2-container">
  <h2 class= "dashboard">DashBoard</h2>

  <blockquote class="w3-panel w3-leftbar w3-black">
    <p class="w3-large" font color="white"><i>"Succes is when the checks don't bounce."</i></p>
    <p>Andy Warhol</p>
  </blockquote>
</div>

</br>
</br>

<div class="w3-container">

  <div class="w3-card-4" style="width:130%;"  >
    <header class="w3-container w3-black">
      <h3 style="text-align:center;" font color="white">System Status</h3>
    </header>

    <div class="w3-container" style="text-align:center;">
      <h4>Users...............<?php echo $No_Users;?></h4>
      <h4>Accounts......<?php echo $No_Accounts;?></h4>
      <h4>Companies.....<?php echo $No_Companies;?></h4>
      <h4>Stores...............<?php echo $No_store;?></h4>
    </div>

    <footer class="w3-container w3-blue">
      <h5>Checkmate©</h5>
    </footer>


  </div>
</div>

<div class="w4-container" name= "first">

  <div class="w3-card-4" style="width:130%;">
    <header class="w3-container w3-black">
      <h3 style="text-align:center;" font color="white">Check Info</h3>
    </header>

    <div class="w3-container">
      <h4>Users...............<?php echo $No_Users;?></h4>
      <h4>Accounts......<?php echo $No_Accounts;?></h4>
      <h4>Companies.....<?php echo $No_Companies;?></h4>
      <h4>Stores...............<?php echo $No_store;?></h4>
    </div>

    <footer class="w3-container w3-blue">
      <h5>Checkmate©</h5>
    </footer>

  </div>
</div>


</div>
</head>
</body>
</html>



 <?php

 include 'page-parts/footer.php';
