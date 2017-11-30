<?php
include 'inc/app.php';
include 'page-parts/header.php';
include 'page-parts/sidebar.php';
$account = $app->Get_Account_by_Id($_GET['account']);
if($account == null) {
  echo "<h1>404</h1>";
  echo $_GET['account'];
  exit();
  //go to 404 page
}
 ?>
 <div class="page-head">
   <h1>John Doe</h1>
 </div>
 <div class="page-body">
   <div class="account-info">
     <p>
       <label>First Name</label><input type="text" value="<?php echo $account->get_first_name(); ?>" /><br>
       <label>Last Name</label><input type="text" value="<?php echo $account->get_last_name(); ?>" />
     </p>
     <p>
       <label>Street</label><input type="text" value="<?php echo $account->get_address(); ?>" /><br>
       <label>City</label><input type="text" value="<?php echo $account->get_city(); ?>" /><br>
       <label>State</label><input type="text" value="<?php echo $account->get_state(); ?>" /><br>
       <label>Zip</label><input type="text" value="<?php echo $account->get_zip(); ?>" />
     </p>
   </div>
   <?php $app->Get_Checks_HTML($account); ?>
 </div>
 <?php
 include 'page-parts/footer.php';
