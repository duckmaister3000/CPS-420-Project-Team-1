<?php
class Letter {
  private $id;
  private $header;
  private $body;
  private $footer;
  private $number;
  private $company;

  public function __construct($_id, $_header, $_body, $_footer, $_number, $_company) {
    $this->id = $_id;
    $this->header = $_header;
    $this->body = $_body;
    $this->footer = $_footer;
    $this->number = $_number;
    $this->company = $_company;
  }

  public function get_id() {return $this->id;}
  public function get_header() {return $this->header;}
  public function get_body() {return $this->body;}
  public function get_footer() {return $this->footer;}
  public function get_number() {return $this->number;}
  public function get_company() {return $this->company;}
}
 ?>
