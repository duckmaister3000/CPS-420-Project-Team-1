<?php

$title = "Company Settings - Checkmate";

include 'inc/app.php';
include 'page-parts/header.php';
include 'page-parts/sidebar.php';
include 'page-parts/settings-header.php';

$user = $app->db->Select_User($_SESSION['user_id']);
$company = $user->get_store()->get_company();
 ?>
<div class="company">
  <div class="company-info">
    <form>
      <h1>Company Info</h1>
      <label>Company Name:</label>
      <input type="text" id="company-name" value="<?php echo $company->get_name(); ?>" /><br><br>
      <label>Company Phone:</label>
      <input type="phone" id="company-phone" value="<?php echo $company->get_contact(); ?>" /><br>
    </form>
  </div>
  <div class="company-stores">
    <h1>Stores</h1>
    <div id="store-list" class="store-list">
      <?php
      $app->Get_Store_HTML($company);
      ?>
    </div>
  </div>
  <div class="company-add-store">
    <div class="button" onclick="showStoreForm()" id="add-store-button">Add Store</div>
    <input type="hidden" value="<?php echo $user->get_id(); ?>" id="user-id" />
    <form id="add-store-form">
      <input type="text" placeholder="Name" id="store-name" required /><br>
      <input type="text" placeholder="Street Address" id="store-street" required /><br>
      <input type="text" placeholder="City" id="store-city" required /><br>
      <input type="text" placeholder="State" id="store-state" required /><br>
      <input type="text" placeholder="Zip Code" id="store-zip" required /><br>
      <input type="button" class="button" value="Add" onclick="addStore()"/>
    </form>
  </div>
</div>

 <?php
include 'page-parts/footer.php';
