<?php
include 'inc/app.php';
include 'page-parts/header.php';
include 'page-parts/sidebar.php';
include 'page-parts/settings-header.php';

$user = $app->db->Select_User($_SESSION['user_id']);
$company = $user->get_store()->get_company();

if(isset($_POST['save-letter-1'])){
  $letter = new Letter($_POST['letter-1-id'], $_POST['letter-1-header'], $_POST['letter-1-body'], $_POST['letter-1-footer'], 1, $company);
  $app->Save_Letter($letter);
}
if(isset($_POST['save-letter-2'])){
  $letter = new Letter($_POST['letter-2-id'], $_POST['letter-2-header'], $_POST['letter-2-body'], $_POST['letter-2-footer'], 2, $company);
  $app->Save_Letter($letter);
}
if(isset($_POST['save-letter-3'])){
  $letter = new Letter($_POST['letter-3-id'], $_POST['letter-3-header'], $_POST['letter-3-body'], $_POST['letter-3-footer'], 3, $company);
  $app->Save_Letter($letter);
}

$letters = $app->Get_Letters($company)

 ?>
<div class="letter-settings">
<h1>1st Letter Template</h1>
<form action="settings-letters.php" method="post">
  <h3>Header<h3>
  <textarea name="letter-1-header"><?php echo $letters[0]->get_header(); ?></textarea>
  <h3>Body<h3>
  <textarea name="letter-1-body"><?php echo $letters[0]->get_body(); ?></textarea>
  <h3>Footer<h3>
  <textarea name="letter-1-footer"><?php echo $letters[0]->get_footer(); ?></textarea>
  <br>
  <input type="hidden" value="<?php echo $letters[0]->get_id();?>" name="letter-1-id"/>
  <input type="submit" value="Save" name="save-letter-1" class="button"/>
</form>

<h1>2nd Letter Template</h1>
<form action="settings-letters.php" method="post">
  <h3>Header<h3>
  <textarea name="letter-2-header"><?php echo $letters[1]->get_header(); ?></textarea>
  <h3>Body<h3>
  <textarea name="letter-2-body"><?php echo $letters[1]->get_body(); ?></textarea>
  <h3>Footer<h3>
  <textarea name="letter-2-footer"><?php echo $letters[1]->get_footer(); ?></textarea>
  <br>
  <input type="hidden" value="<?php echo $letters[1]->get_id();?>" name="letter-2-id"/>
  <input type="submit" value="Save" name="save-letter-2" class="button"/>
</form>
<h1>3rd Letter Template</h1>
<form action="settings-letters.php" method="post">
  <h3>Header<h3>
  <textarea name="letter-3-header"><?php echo $letters[2]->get_header(); ?></textarea>
  <h3>Body<h3>
  <textarea name="letter-3-body"><?php echo $letters[2]->get_body(); ?></textarea>
  <h3>Footer<h3>
  <textarea name="letter-3-footer"><?php echo $letters[2]->get_footer(); ?></textarea>
  <br>
  <input type="hidden" value="<?php echo $letters[1]->get_id();?>" name="letter-3-id"/>
  <input type="submit" value="Save" name="save-letter-3" class="button"/>
</form>
</div>
 <?php
include 'page-parts/footer.php';
