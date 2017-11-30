<?php
class User {
  private $id;
  private $email;
  private $password;
  private $role;
  private $store;

  public function __construct($_id, $_email, $_password, $_role, $_store) {
    $this->id = $_id;
    $this->email = $_email;
    $this->password = $_password;
    $this->role = $_role;
    $this->store = $_store;
  }

  public function get_id() { return $this->id; }
  public function get_email() { return $this->email; }
  public function get_password() { return $this->password; }
  public function get_role() { return $this->role; }
  public function get_store() { return $this->store; }

  public function set_email($email) { $this->email = $email; }
  public function set_password($password) { $this->password = $password; }
  public function set_role($role) {$this->role = $role; }
  public function set_store($store) { $this->store; }
};
?>
