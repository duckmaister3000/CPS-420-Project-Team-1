<?php
$title = "Accounts";

include 'inc/app.php';
include 'page-parts/header.php';
include 'page-parts/sidebar.php';

$user = $app->db->Select_User($_SESSION['user_id']);
$company = $user->get_store()->get_company();
 ?>
 <div class="page-head">
   <h1>Accounts</h1>
 </div>
 <div class="page-body">
   <div class="account-list-wrapper">
     <div class="account-list-header">
       <!--<input type="text" name="search" placeholder="search" />
       <select name="search-criteria">
         <option>First Name</option>
         <option>Last Name</option>
         <option>Street Address</option>
         <option>Zip Code</option>
       </select>
       <input type="button" value="Add Search Criteria" />
       <input type="submit" value="Search" />-->
     </div>
     <div class="account-list">
       <table>
           <tr class="header-labels">
             <th>First Name</th>
             <th>Last Name</th>
             <th>Street Address</th>
             <th>City</th>
             <th>State</th>
             <th>Zip</th>
             <th>Account Number</th>
           </tr>
           <?php $app->Get_Accounts_HTML($company); ?>
       </table>
     </div>
   </div>
 </div>
 <?php
include 'page-parts/footer.php';
