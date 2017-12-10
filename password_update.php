<?php
require_once('config.php');


//Array to store validation errors
	$errmsg = "";

if(isset($_POST) & !empty($_POST)){
	$myemail = mysqli_real_escape_string($db, $_POST['user_email']);
	$mypassword = mysqli_real_escape_string($db, $_POST['user_password']);
	$myre_password = mysqli_real_escape_string($db, $_POST['user_reentered_password']);

	$sql="SELECT user_id FROM user WHERE user_email ='$myemail' ";
	$res = mysqli_query($db, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){

		if(strcmp($mypassword, $myre_password) == 0)
		{

			$update = "UPDATE user SET user_password = '$mypassword' WHERE user.user_ID = 4";
			$run_update = mysqli_query($db,$update);
			$errmsg = "Password has been updated";
		}
		else{
			$errmsg = "Passwords don't match";
		}
}
	else{
		$errmsg= "Email address does not exist in database";
	}
}
?>

<!DOCTYPE html>
<html style="background-color:#d6d8db">
<head>
   <link rel="stylesheet" type="text/css" href="css\forgot_password_stylesheet.css">
</head>

<form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Update Password</h2>
				<div class="container">
					<!-- <label><b>Username</b></label> -->
					<input type="text" placeholder="Enter Email" name="user_email" required>
					<input type="text" placeholder="Enter Password" name="user_password" required>
					<input type="text" placeholder="ReEnter Password" name="user_reentered_password" required>

					<div style="color:red" class="error">
					<?php echo $errmsg;?>
				</div>

					<button type="submit">Update Password</button>
					<!--<br><input type="checkbox" checked="checked"> Remember me </br> -->
				</div>
</form>
