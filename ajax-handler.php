<?php
  require "inc/app.php";

  $user = $app->db->Select_User($_SESSION['user_id']);
  $company = $user->get_store()->get_company();

  $action = "False";
  if(array_key_exists("action", $_POST)){
    $action = $_POST['action'];
  }
  if($action !== "False") {

    if($action == "verify-manager") {
      if($app->verifyManager($_POST['user'])){
        echo "true";
      } else {
        echo "false";
      }
      exit();
    }

    if($action == "update"){
      $account = new Account(
        $_POST['id'], $_POST['first'], $_POST['last'],
        $_POST['street'],$_POST['city'],$_POST['state'],$_POST['zip'],
        $_POST['country'],$_POST['routing'],$_POST['account']
      );
      //print_r($account);
      AccountDAO::Update($account);
      App::get_accounts();
      exit();
    }
    if($action == "create"){
      $target = $_POST['target'];
      switch ($target) {
        case 'store':
          if(!$app->Add_Store($_POST['name'], $_POST['street'], $_POST['city'], $_POST['state'], $_POST['zip'], $company)) {
            echo "ERROR";
          } else {
            $app->Get_Store_HTML($company);
          }
          break;
        case 'check':
            if(!$app->Add_Check($_POST['first'], $_POST['last'], $_POST['street'], $_POST['city'], $_POST['state'], $_POST['zip'],
              $_POST['routing'], $_POST['account'], $_POST['amount'], $_POST['date'], $_POST['number'])) {
                echo "Error Adding Check";
              } else {
                echo "Successfully Added Check";
              }
          break;

        default:
          # code...
          break;
      }
      exit();
    }
    if($action == "delete"){
      $account = new Account(
        $_POST['id'], $_POST['first'], $_POST['last'],
        $_POST['street'],$_POST['city'],$_POST['state'],$_POST['zip'],
        $_POST['country'],$_POST['routing'],$_POST['account']
      );
      AccountDAO::Delete($account);
      App::get_accounts();
      exit();
    }
  }
