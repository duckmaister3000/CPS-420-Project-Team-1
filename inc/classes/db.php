<?php
// Database access Class

class Database {
  private $connection;

  public function __construct($host, $user, $password, $db_name) {
    $this->connection = new mysqli($host, $user, $password, $db_name);
    if($this->connection->connect_error) {
      echo $connection->connect_error;
    }
  } // End __construct

  public function Create_Account($account) {
    $insert = $connection->prepare("INSERT INTO account  (account_fname, account_lname, account_street, account_city, account_state, account_zip)
                                    VALUES (?,?,?,?,?,?)");
    $insert->bind_param("ssssss", $first, $last, $street, $city, $state, $zip);
    $first = $account->get_first_name();
    $last = $account->get_last_name();
    $street = $account->get_address();
    $city = $account->get_city();
    $state = $account->get_state();
    $zip = $account->get_zip();
    $insert->execute();
    if($insert->error){
      return false;
    }
    return true;
  }

  public function Delete_Account($account) {
    $delete = $connection->prepare("DELETE FROM account WHERE account_ID = ?");
    $delete->bind_param("i", $id);
    $id = $account->get_id();
    $delete->execute();
  }

  public function Update_Account($account) {
    $update = $connection->prepare("UPDATE account SET account_fname = ?, account_lname = ?, account_street = ?, account_city = ?, account_state = ?, account_zip = ? WHERE account_ID = ?");
    $update->bind_param("sssssssssi", $first, $last, $street, $city, $state, $zip, $id);
    $first = $account->get_first_name();
    $last = $account->get_last_name();
    $street = $account->get_address();
    $city = $account->get_city();
    $state = $account->get_state();
    $zip = $account->get_zip();
    $id = $account->get_id();
    $update->execute();
    if($update->error != ""){
      echo $update->error;
      return false;
    }
    return true;
  }

  public function Select_Accounts_All() {
    $sql = "SELECT * FROM `account`";
    $results = $this->connection->query($sql);
    $ret = array();
    if($results->num_rows > 0) {
      while($row = $results->fetch_assoc()) {
        array_push($ret, new account($row['account_ID'], $row['account_fname'], $row['account_lname'], $row['account_street'], $row['account_city'], $row['account_state'], $row['account_zip']));
      }
    }
    return $ret;
  }

  public function Select_Account($id) {
    $sql = "SELECT * FROM `account` WHERE `account_ID` = " . $id;
    $results = $this->connection->query($sql);
    if($results->num_rows > 0) {
      while($row = $results->fetch_assoc()) {
        return new account($row['account_ID'], $row['account_fname'], $row['account_lname'], $row['account_street'], $row['account_city'], $row['account_state'], $row['account_zip']);
      }
    }
    return $ret;
  }

  public function Select_Checks($account) {
    $sql = "SELECT * FROM `check` WHERE `Account_account_ID` = " . $account->get_id();
    $results = $this->connection->query($sql);
    if($this->connection->error) {
      echo $this->connection->error;
    }
    $ret = array();
    if($results->num_rows > 0) {
      while($row = $results->fetch_assoc()) {
        array_push($ret, new Check($row["check_ID"], $row['check_ammount'], $row['check_date'], $row['letter_sent_date'], $row['account_number'], $row['acocunt_routing_number'], $row['payment_received'], $row['Store_store_ID'], $row['Store_Company_company_ID'], $row['Account_account_ID'], $row['letter_status']));
      }
    }
    return $ret;
  }
  public function Select_Checks_All() {
    $sql = "SELECT * FROM `check`";
    $results = $this->connection->query($sql);
    if($this->connection->error) {
      echo $this->connection->error;
      return null;
    }
    $ret = array();
    if($results->num_rows > 0) {
      while($row = $results->fetch_assoc()) {
        array_push($ret, new Check($row["check_ID"], $row['check_ammount'], $row['check_date'], $row['letter_sent_date'], $row['account_number'], $row['acocunt_routing_number'], $row['payment_received'], $row['Store_store_ID'], $row['Store_Company_company_ID'], $row['Account_account_ID'], $row['letter_status']));
      }
    }
    return $ret;
  }


  // STORE METHODS
  public function Select_Stores($company) {
    $sql = "SELECT * FROM `store` WHERE Company_company_ID = " . $company->get_id();
    $results = $this->connection->query($sql);
    if($this->connection->error) {
      echo $this->connection->error;
      return array();
    }
    $ret = array();
    if($results->num_rows > 0) {
      while($row = $results->fetch_assoc()) {
        array_push($ret, new Store($row['store_ID'], $row['store_name'], $row['store_street'], $row['store_city'], $row['store_state'], $row['store_zip'], $company));
      }
    }
    return $ret;
  }
  public function Select_Store($id) {
    $sql = "SELECT * FROM `store` WHERE store_ID = " . $id;
    $results= $this->connection->query($sql);
    if($this->connection->error) {
      echo $this->connection->error;
      return null;
    }
    if($results->num_rows == 1) {
      $row = $results->fetch_assoc();
      return new Store($row['store_ID'], $row['store_name'], $row['store_street'], $row['store_city'], $row['store_state'], $row['store_zip'], $this->Select_Company($row['Company_company_ID']));
    }
    return null;
  }

  public function Insert_Store($name, $street, $city, $state, $zip, $companyId) {
    $stmt = $this->connection->prepare("INSERT INTO `store` (store_name, store_street, store_city, store_state, store_zip, Company_company_ID)
      VALUES (?,?,?,?,?,?)");

    $stmt->bind_param("sssssi", $name, $street, $city, $state, $zip, $companyId);
    $stmt->execute();
    if($stmt->error) {
      echo $stmt->error;
      return false;
    }
    return true;
  }


  // COMPANY METHODS
  public function Select_Company($id) {
    $sql = "SELECT * FROM `company` WHERE company_ID = " . $id;
    $results = $this->connection->query($sql);
    if($this->connection->error) {
      echo $this->connection->error;
    }
    if($results->num_rows >= 1) {
      while($row = $results->fetch_assoc()) {
        return new Company($row['company_ID'], $row['company_name'], $row['company_contact'], $row['company_letter_interval']);
      }
    }
    return null;
  }

  // USER METHODS
  public function Select_User($id) {
    $sql = "SELECT * FROM `user` WHERE user_ID = " . $id;
    $results= $this->connection->query($sql);
    if($this->connection->error) {
      echo $this->connection->error;
      return null;
    }
    if($results->num_rows == 1) {
      $row = $results->fetch_assoc();
      return new User($row['user_ID'], $row['user_email'], $row['user_password'], $row['user_role_name'], $this->Select_Store($row['Store_store_ID']));
    }
    return null;
  }

  public function Select_Users($company) {
    $sql = "SELECT * FROM `user` WHERE Store_Company_company_ID = " . $company->get_id();
    $results= $this->connection->query($sql);
    if($this->connection->error) {
      echo $this->connection->error;
      return null;
    }
    $ret = array();
    if($results->num_rows > 0) {

    }
  }
};

?>
