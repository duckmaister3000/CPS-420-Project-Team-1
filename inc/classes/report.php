<?php
class Report {
  private $id;
  private $filename;
  private $letter_number;
  private $printed;
  private $check;
  private $company;

  public function __construct($_id, $_filename, $_letter_number, $_printed, $_check, $_company) {
    $this->id = $_id;
    $this->filename = $_filename;
    $this->letter_number = $_letter_number;
    $this->printed = $_printed;
    $this->check = $_check;
    $this->company = $_company;
  }

  public function get_id() {return $this->id;}
  public function get_filename() {return $this->filename;}
  public function get_letter_number() {return $this->letter_number;}
  public function get_printed() {return $this->printed;}
  public function get_check() {return $this->check; }
  public function get_company() {return $this->company; }

  public function set_filename($file) {$this->filename = file;}
  public function set_letter_number($num) {$this->letter_number = $num;}
  public function set_printed($printed) {$this->printed = $printed;}
  public function set_check($check) {$this->check = $check;}
  public function set_company($company) {$this->company = $company;}
}
?>
