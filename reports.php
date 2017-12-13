<?php
include 'inc/app.php';
include 'page-parts/header.php';
include 'page-parts/sidebar.php';

$user = $app->db->Select_User($_SESSION['user_id']);
$company = $user->get_store()->get_company();

 ?>
<div class="report-list">
<?php
  $app->Get_Report_HTML($company);
 ?>
</div>
 <?php
 include 'page-parts/footer.php';
