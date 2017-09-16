<?php
// Class Account

class Account {

  private $id;

  // Name
  private $firstName;
  private $lastName;

  // Address Info
  private $address;
  private $city;
  private $state;
  private $zip;
  private $country;

  // Bank Info
  private $routingNumber;
  private $accountNumber;

  // Constructor
  public function __construct($_id, $_first_name, $_last_name, $_address, $_city, $_state, $_zip, $_country, $_routing_number, $_account_number){
    $this->id = $_id;
    $this->firstName = $_first_name;
    $this->lastName = $_last_name;
    $this->address = $_address;
    $this->city = $_city;
    $this->state = $_state;
    $this->zip = $_zip;
    $this->country = $_country;
    $this->routingNumber = $_routing_number;
    $this->accountNumber = $_account_number;
  }

  // Getter Methds
  public function get_id() { return $this->id; }
  public function get_first_name() { return $this->firstName; }
  public function get_Last_Name() { return $this->lastName; }
  public function get_address() { return $this->address; }
  public function get_city() { return $this->city; }
  public function get_state() { return $this->state; }
  public function get_zip() { return $this->zip; }
  public function get_country() { return $this->state; }
  public function get_routing_number() { return $this->routingNumber; }
  public function get_account_number() { return $this->accountNumber; }

  // Setter Methods
  public function set_first_name($_first_name) { $this->firstName = $_first_name; }
  public function set_Last_Name($_last_name) { $this->lastName = $_last_name; }
  public function set_address($_address) { $this->address = $_address; }
  public function set_city($_city) { $this->city = $_city; }
  public function set_state($_state) { $this->state = $_state; }
  public function set_zip($_zip) { $this->zip = $_zip; }
  public function set_country($_country) { $this->state = $_country; }
  public function set_routing_number($_routing_number) { $this->routingNumber = $_routing_number; }
  public function set_account_number($_account_number) { $this->accountNumber = $_account_number; }
};

class AccountDAO {

  // Returns a list of all accounts
  public static function LoadAll() {
    global $db;

    $sql = "SELECT * FROM Accounts";
    $result = $db->query($sql);
    if($result == NULL) {
      return array();
    }
    $ret = array();
    while($row = $result->fetch_assoc()){
      array_push($ret, new Account($row['Account_ID'], $row['Account_FName'], $row['Account_LName'], $row['Account_Street'],
      $row['Account_City'], $row['Account_State'], $row['Account_Zip'], $row['Account_Country'], $row['Account_Routing_Number'], $row['Account_Account_Number']));
    }
    return $ret;
  }

  public static function Update($account) {
    global $db;
    $update = $db->prepare("UPDATE Accounts SET Account_FName = ?, Account_LName = ?, Account_Street = ?, Account_City = ?, Account_State = ?, Account_Zip = ?,
    Account_Country = ?, Account_Routing_Number = ?, Account_Account_Number = ? WHERE Account_ID = ?");
    $update->bind_param("sssssssssi", $first, $last, $street, $city, $state, $zip, $country, $routing, $accountNum, $id);
    $first = $account->get_first_name();
    $last = $account->get_last_name();
    $street = $account->get_address();
    $city = $account->get_city();
    $state = $account->get_state();
    $zip = $account->get_zip();
    $country = $account->get_country();
    $routing = $account->get_routing_number();
    $accountNum = $account->get_account_number();
    $id = $account->get_id();
    //print_r($account);
    $update->execute();
    if($update->error != ""){
      echo $update->error;
      return false;
    }
    return true;
  }

  public static function Create($account) {
    global $db;
    $insert = $db->prepare("INSERT INTO Accounts  (Account_FName, Account_LName, Account_Street, Account_City, Account_State, Account_Zip,
    Account_Country, Account_Routing_Number, Account_Account_Number) VALUES (?,?,?,?,?,?,?,?,?)");
    $insert->bind_param("sssssssss", $first, $last, $street, $city, $state, $zip, $country, $routing, $accountNum);
    $first = $account->get_first_name();
    $last = $account->get_last_name();
    $street = $account->get_address();
    $city = $account->get_city();
    $state = $account->get_state();
    $zip = $account->get_zip();
    $country = $account->get_country();
    $routing = $account->get_routing_number();
    $accountNum = $account->get_account_number();
    $insert->execute();
    if($insert->error){
      return false;
    }
    return true;
  }

  public static function Delete($account) {
    global $db;
    $delete = $db->prepare("DELETE FROM Accounts WHERE Account_ID = ?");
    $delete->bind_param("i", $id);
    $id = $account->get_id();
    $delete->execute();
  }
};
?>
