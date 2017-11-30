<?php
class Company {
  private $id;
  private $name;
  private $contact;
  private $letter_interval;

  public function __construct($_id, $_name, $_contact, $_letter_interval) {
    $this->id = $_id;
    $this->name = $_name;
    $this->contact = $_contact;
    $this->letter_interval = $_letter_interval;
  }

  public function get_id() { return $this->id; }
  public function get_name() { return $this->name; }
  public function get_contact() { return $this->contact; }
  public function get_letter_interval() { return $this->letter_interval; }

  public function set_name($name) { $this->name = $name; }
  public function set_contact($contact) {$this->contact = $contact; }
  public function set_letter_interval($interval) {$this->letter_interval = $interval; }
};
