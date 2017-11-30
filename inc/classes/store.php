<?php
class Store {
  private $id;
  private $name;
  private $street;
  private $city;
  private $state;
  private $zip;
  private $company;

  public function __construct($_id, $_name, $_street, $_city, $_state, $_zip, $_company) {
    $this->id = $_id;
    $this->name = $_name;
    $this->street = $_street;
    $this->city = $_city;
    $this->state = $_state;
    $this->zip = $_zip;
    $this->company = $_company;
  }

  public function get_id() { return $this->id; }
  public function get_name() { return $this->name; }
  public function get_street() { return $this->street; }
  public function get_city() { return $this->city; }
  public function get_state() { return $this->state; }
  public function get_zip() { return $this->zip; }
  public function get_company() { return $this->company; }

  public function set_name($name) { $this->name = $name; }
  public function set_street($street) { $this->street = $street; }
  public function set_city($city) { $this->city = $city; }
  public function set_state($state) { $this->state = $state; }
  public function set_zip($zip) { $this->zip = $zip; }
  public function set_company($company) { $this->company = $company; }
}
