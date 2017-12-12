<?php

require_once('config.php');

//Array to store validation errors
	$errmsg = "";

if(isset($_POST) & !empty($_POST)){
	$myemail = mysqli_real_escape_string($db, $_POST['user_email']);

	$sql="SELECT * FROM user WHERE user_email ='$myemail' ";
	$res = mysqli_query($db, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){
				header("location: password_update.php");
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

	<div class="imgcontainer">
		<img src="forgot-password.gif" >
	</div>

        <h2 class="form-signin-heading">Forgot your password?</h2>

				<div class="container">
					<!-- <label><b>Username</b></label> -->
					<input type="text" placeholder="Enter Email Address" name="user_email" required>

					<div style="color:red" class="error">
					<?php echo $errmsg;?>
				</div>

					<button type="submit">Reset Password</button>
					<!--<br><input type="checkbox" checked="checked"> Remember me </br> -->
				</div>
</form>
