<?php
include 'inc/app.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myemail = mysqli_real_escape_string($db,$_POST['user_email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['user_password']);

      $sql="SELECT * FROM user WHERE user_email ='$myemail' and user_password='$mypassword' ";
      $result = mysqli_query($db,$sql);
      $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {

        // session_register("myusername");
         $_SESSION['login_user'] = $myemail;
         $store = $app->db->Select_Store($row['Store_store_ID']);
         $user = new User($row['user_ID'], $row['user_email'], $row['user_password'], $row['user_role_name'], $store);
         $_SESSION['user_id'] = $user->get_id();
         $_SESSION['auth'] = true;
        header("location: index.php");
      }else {
         $error = "Your Email ID or Password is invalid";
         echo "$error";

      }
   }
?>


<!DOCTYPE html>
<html style="background-color:#d6d8db">
<head>
   <link rel="stylesheet" type="text/css" href="Login_stylesheet.css">
</head>

<form action=" " method = "post">
  <div class="imgcontainer">
    <img src="logo.jpg" >
  </div>

  <div class="container">
    <!-- <label><b>Username</b></label> -->
    <input type="text" placeholder="Enter Email" name="user_email" required>

    <!--<label><b>Password</b></label>-->
    <input type="password" placeholder="Enter Password" name="user_password" required>

    <button type="submit">Login</button>
    <!--<br><input type="checkbox" checked="checked"> Remember me </br> -->

  </div>
  <div class="container" style="background-color:#f1f1f1">
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>

</form>

    </body>
</html>
