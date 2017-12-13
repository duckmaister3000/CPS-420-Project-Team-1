<?php
include 'inc/app.php';
include 'page-parts/header.php';
include 'page-parts/sidebar.php';
$account = $app->Get_Account_by_Id($_GET['account']);
$user = $app->db->Select_User($_SESSION['user_id']);
$company = $user->get_store()->get_company();
if($account == null) {
  echo "<h1>404</h1>";
  echo $_GET['account'];
  exit();
  //go to 404 page
}
 ?>
 <div class="modal" id="manager-confirm">
   <div class="modal-content">
     <h3>Please enter your manager credentials</h3>
     <form>
       <label>Username: </label>
       <input type="text" id="manager-username" /><br>
       <br>
       <label>Password: </label>
       <input type="password" id="manager-password" /><br>
       <br>
       <input type="hidden" id="target-check" />
       <input type="button" class="button" onclick="deleteCheck()" value="Submit"/>
       <input type="button" class="button" onclick="closeManagerConfirm()" value="Cancel" />
     </form>
   </div>
 </div>
 <div class="modal" id="payment-modal">
   <div class="modal-content">
     <form>
       <p>Enter amount paid: $
       <input type="text" id="amount-paid" /></p>
       <input type="hidden" value="" id="check-id" />
       <input type="button" class="button" value="Save" onclick="payCheck()"/>
       <input type="button" class="button" value="Cancel" onclick="closePayCheckModal()"/>
     </form>
   </div>
 </div>
 <div class="page-head">
   <h1><?php echo $account->get_first_name() . ' ' . $account->get_last_name(); ?></h1>
 </div>
 <div class="page-body">
   <div class="account-info">
     <p>
       <label>First Name</label><input disabled type="text" value="<?php echo $account->get_first_name(); ?>" /><br>
       <label>Last Name</label><input disabled type="text" value="<?php echo $account->get_last_name(); ?>" />
     </p>
     <p>
       <label>Street</label><input disabled type="text" value="<?php echo $account->get_address(); ?>" /><br>
       <label>City</label><input disabled type="text" value="<?php echo $account->get_city(); ?>" /><br>
       <label>State</label><input disabled type="text" value="<?php echo $account->get_state(); ?>" /><br>
       <label>Zip</label><input disabled type="text" value="<?php echo $account->get_zip(); ?>" />
     </p>
   </div>
   <div class="check-list" id="check-list">
     <?php $app->Get_Checks_HTML($account); ?>
   </div>
 </div>
 <?php
 include 'page-parts/footer.php';
