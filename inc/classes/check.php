<?php
class Check {
  private $id;
  private $amount;
  private $check_date;
  private $letter_sent_date;
  private $payment_recieved;
  private $store;
  private $company;
  private $account;
  private $letter_status;

  public function __construct($_id, $_amount, $_check_date, $_letter_sent_date, $_payment_recieved, $_store, $_company, $_account, $_letter_status) {
    $this->id = $_id;
    $this->amount = $_amount;
    $this->check_date = $_check_date;
    $this->letter_sent_date = $_letter_sent_date;
    $this->payment_recieved = $_payment_recieved;
    $this->store = $_store;
    $this->company = $_company;
    $this->account = $_account;
    $this->letter_status = $_letter_status;
  }

  public function get_id() { return $this->id; }
  public function get_amount() { return $this->amount; }
  public function get_check_date() { return $this->check_date; }
  public function get_letter_sent_date() { return $this->letter_sent_date; }
  public function get_payment_recieved() { return $this->payment_recieved; }
  public function get_store() { return $this->store; }
  public function get_company() { return $this->company; }
  public function get_account() { return $this->account; }
  public function get_letter_status() {return $this->letter_status; }

  public function set_amount($amount) { $this->amount = $amount; }
  public function set_check_date($date) {$this->check_date = $date; }
  public function set_letter_sent_date($date) { $this->letter_sent_date = $date; }
  public function set_payment_recieved($bool) { $this->payment_recieved = $bool; }
  public function set_store($store) {$this->store = $store; }
  public function set_company($company) { $this->company = $company; }
  public function set_account($account) { $this->account = $account; }
  public function set_letter_status($status) { $this->letter_status = $status; }
};
?>
