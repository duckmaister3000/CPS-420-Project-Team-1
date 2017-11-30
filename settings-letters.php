<?php
include 'inc/app.php';
include 'page-parts/header.php';
include 'page-parts/sidebar.php';
include 'page-parts/settings-header.php';

$user = $app->db->Select_User($_SESSION['user_id']);
$company = $user->get_store()->get_company();
 ?>

 <?php
include 'page-parts/footer.php';
