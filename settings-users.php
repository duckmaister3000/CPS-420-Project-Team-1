<?php
include 'inc/app.php';
include 'page-parts/header.php';
include 'page-parts/sidebar.php';
include 'page-parts/settings-header.php';



$user = $app->db->Select_User($_SESSION['user_id']);
$company = $user->get_store()->get_company();


$errmsg = "";


$userid= $_SESSION['user_id'];

$sql="SELECT user_id FROM user WHERE user_id ='$userid' and user_role_name='manager'";
$res = mysqli_query($db, $sql);
$count1 = mysqli_num_rows($res); // to check and see if it is manager

if ($count1==1) // if manger it gives access to add and remove buttons else not.
{

  if( isset($_POST['add']) ){
    $newemail = mysqli_real_escape_string($db, $_POST['new_user_email']);
    $newpassword = mysqli_real_escape_string($db, $_POST['new_user_password']);
    $newrole = mysqli_real_escape_string($db, $_POST['new_user_role']);
    $new_store_ID = mysqli_real_escape_string($db, $_POST['new_store_ID']);
    $new_company_ID = mysqli_real_escape_string($db, $_POST['new_company_ID']);

//updates the database
  $update = "INSERT INTO user (user_email, user_password,user_role_name, Store_store_ID,Store_Company_company_ID)
  VALUES ('$newemail', '$newpassword', '$newrole','$new_store_ID','$new_company_ID')";
  $run_update = mysqli_query($db,$update);
  $errmsg = "inserted";
  }
  else if ( isset($_POST['remove']) & $count1==1)
  {

    $email = mysqli_real_escape_string($db, $_POST['user_email']);
    $password = mysqli_real_escape_string($db, $_POST['user_password']);

    $sql="SELECT user_id FROM user WHERE user_email ='$email' and user_password='$password' ";
    $res = mysqli_query($db, $sql);
    $count = mysqli_num_rows($res);
    if($count == 1){
      $update= "DELETE FROM user WHERE user_email='$email'";
      $run_update = mysqli_query($db,$update);
      }
      else{
        $errmsg="Email address or password not correct.";
      }
    }

    else if ( isset($_POST['update'])){

      $current_email = mysqli_real_escape_string($db, $_POST['current_user_email']);
      $current_password = mysqli_real_escape_string($db, $_POST['current_user_password']);
      $updated_email = mysqli_real_escape_string($db, $_POST['updated_user_email']);

      $update = "UPDATE user SET user_email = '$updated_email' WHERE user.user_password = '$current_password'";
      $run_update = mysqli_query($db,$update);
      $errmsg = "Email address has been updated";

    }

}

else {

  if( isset($_POST['update']) ){

//updates the database
  $current_email = mysqli_real_escape_string($db, $_POST['current_user_email']);
  $current_password = mysqli_real_escape_string($db, $_POST['current_user_password']);
  $updated_email = mysqli_real_escape_string($db, $_POST['updated_user_email']);

  $update = "UPDATE user SET user_email = '$updated_email' WHERE user.user_password = '$current_password'";
  $run_update = mysqli_query($db,$update);
  $errmsg = "Email address has been updated";
}
else if($count1 !=1) {

  $errmsg = "Adding and Removing Users Diabled";
}

}

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/user_settings.css">
</head>
<body>

<div class="container">
  <h2 class="heading">Manage Users</h2>

  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Add User</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <form class="add_user" method="POST">

            <div class="container">
            </br>
              <!-- <label><b>Username</b></label> -->
              <input type="text" placeholder="Enter Email Address" name="new_user_email" required>
              <input type="text" placeholder="Enter Password" name="new_user_password" required>
              <input type="text" placeholder="Enter User Role" name="new_user_role" required>
              <input type="text" placeholder="Enter Store ID" name="new_store_ID" required>
              <input type="text" placeholder="Enter Company" name="new_company_ID" required>

              <div style="color:red" class="error">
              <?php echo $errmsg; ?>

            </div>
            <button type="Add" name="add" value="add">Add User</button>
          </div>
        </form>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Remove User</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <form class="add_user" method="POST">

    				<div class="container">
            </br>
    					<!-- <label><b>Username</b></label> -->
    					<input type="text" placeholder="Enter Email Address" name="user_email" required>
    					<input type="text" placeholder="Enter Password" name="user_password" required>

    					<div style="color:red" class="error">
    					<?php echo $errmsg;?>

            </div>
            <button type="Add" name="remove" value ="remove">Remove User</button>
          </div>
        </form>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Upadate Email Address</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <form class="add_user" method="POST">

    				<div class="container">
            </br>
    					<!-- <label><b>Username</b></label> -->
    					<input type="text" placeholder="Enter Current Email Address" name="current_user_email" required>
    					<input type="text" placeholder="Enter Current Password" name="current_user_password" required>
              <input type="text" placeholder="Enter New Email Address" name="updated_user_email" required>

    					<div style="color:red" class="error">
    					<?php echo $errmsg;?>

            </div>
            <button type="Add" name="update" value="update">Update Email Address</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>


 <?php
include 'page-parts/footer.php';
?>
