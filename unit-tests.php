<?php
require "inc/app.php";

$app = new APP();

// Active assert and make it quiet
assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_WARNING, 0);
assert_options(ASSERT_QUIET_EVAL, 1);

// Create a handler function
function my_assert_handler($file, $line, $code, $desc = null)
{
    echo "Assertion failed at $file:$line: $code";
    if ($desc) {
        echo ": $desc";
    }
    echo "\n";
}

// Set up the callback
assert_options(ASSERT_CALLBACK, 'my_assert_handler');

echo '<p>sizeof($app=>Get_All_Accounts()) == 30 -';
$accounts = $app->Get_Raw_Accounts();
if(sizeof($accounts) == 30) {
  echo ' OK</p>';
} else {
  echo ' FAILED</p>';
}

echo '<p>sizeof($app->Get_Raw_Checks()) == 30 -';
$checks = $app->Get_Raw_Checks();
if(sizeof($checks) == 30) {
  echo ' OK</p>';
} else {
  echo ' FAILED</p>';
}

echo '<p>sizeof($app->db->Select_Checks($accounts[0])) == 2 -';
$checks2 = $app->db->Select_Checks($accounts[0]);
if(sizeof($checks2) == 2) {
  echo ' OK</p>';
} else {
  echo sizeof($checks2);
  echo ' FAILED</p>';
}

// TEST 4
echo '<p>Test 4 - ';
$company = $app->db->Select_Company(1);
if($company != null && $company->get_contact() == '321654987') {
  echo ' OK</p>';
} else {
  echo ' FAILED</p>';
}

// TEST 5
echo '<p>Test 5 -';
$stores = $app->db->Select_Stores($company);
if(sizeof($stores) == 2) {
  echo ' OK</p>';
} else {
  echo ' FAILED</p>';
}

// TEST 6
echo "<p>Test 6 -";
$store = $app->db->Select_Store(2);
if($store != null && $store->get_zip() == "35485") {
  echo ' OK</p>';
} else {
  echo ' FAILED</p>';
}

echo "<p>Test 7 -";
$user = $app->db->Select_User(2);
if($user != null && $user->get_email() == "emmitt@gmail.com") {
  echo ' OK</p>';
} else {
  echo 'FAILED</p>';
}

echo "<p>Test 8 -";
if($app->verifyManager(1)) {
  echo ' OK</p>';
} else {
  echo 'FAILED</p>';
}
echo "<p>Test 9 -";
if(!$app->verifyManager(2)) {
  echo ' OK</p>';
} else {
  echo 'FAILED</p>';
}
