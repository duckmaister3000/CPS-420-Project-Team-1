<?php
  require "config.php";
  require "inc/app.php";
  $action = "False";
  if(array_key_exists("action", $_POST)){
    $action = $_POST['action'];
  }
  if($action !== "False") {
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
      $account = new Account(
        $_POST['id'], $_POST['first'], $_POST['last'],
        $_POST['street'],$_POST['city'],$_POST['state'],$_POST['zip'],
        $_POST['country'],$_POST['routing'],$_POST['account']
      );
      AccountDAO::Create($account);
      App::get_accounts();
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
