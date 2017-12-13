<?php
  session_start();
  require "classes/classes.php";
  require "config.php";

  class App {

    public $db;

    public function __construct() {
      $this->db = new Database(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB_NAME);
    }

    public function Get_Raw_Checks() {
      return $this->db->Select_Checks_All();
    }

    public function Get_Raw_Accounts($company) {
      return $this->db->Select_Accounts_All($company);
    }
    public function Get_Accounts_HTML($company) {
      $accounts = $this->db->Select_Accounts_All($company);
      foreach($accounts as $account): ?>
        <tr class="list-item" id="account-<?php echo $account->get_id(); ?>">
          <td><a href="account-single.php?account=<?php echo $account->get_id(); ?>"><?php echo $account->get_first_name(); ?></a></td>
          <td><a href="account-single.php?account=<?php echo $account->get_id(); ?>"><?php echo $account->get_last_name(); ?></a></td>
          <td><a href="account-single.php?account=<?php echo $account->get_id(); ?>"><?php echo $account->get_address(); ?></a></td>
          <td><a href="account-single.php?account=<?php echo $account->get_id(); ?>"><?php echo $account->get_city(); ?></a></td>
          <td><a href="account-single.php?account=<?php echo $account->get_id(); ?>"><?php echo $account->get_state(); ?></a></td>
          <td><a href="account-single.php?account=<?php echo $account->get_id(); ?>"><?php echo $account->get_zip(); ?></a></td>
          <td><a href="account-single.php?account=<?php echo $account->get_id(); ?>"><?php echo $account->get_account_number(); ?></a></td>
        </tr>
      <?php endforeach;
    }
    public function Get_Account_by_Id($id) {
      if(!is_numeric($id)) {
        echo "invalid!!";
        return null;
      }
      return $this->db->Select_Account($id);
    }

    //CHECK Methods

    public function Get_Checks_HTML($account) {
      global $user;

      if($account == null) {
          echo "</div>";
          return;
        }
        $checks = $this->db->Select_Checks($account);
        foreach($checks as $check): ?>
        <div class="check">
          <span class="check-amount">$<?php echo $check->get_amount(); ?></span>
          <span class="check-status"><?php echo $check->get_payment_recieved() == 0 ? "Unpaid" : "Paid"; ?> </span>
          <div class="payment-button <?php echo $check->get_payment_recieved() == 0 ? "" : "disabled"; ?>" onclick="showPayCheckModal(<?php echo $check->get_id(); ?>)">
            Pay Check
          </div>
          <div class="button delete" onclick="showManagerConfirm(<?php echo $check->get_id(); ?>)">Delete</div>
        </div>
      <?php endforeach;
    }

    public function Add_Check($fname, $lname, $street, $city, $state, $zip, $routing, $account, $amount, $date, $number) {
      $user = $this->db->Select_User($_SESSION['user_id']);
      $store = $user->get_store();

      $accountObj = $this->db->Account_Exists($account, $routing);
      if($accountObj == null) {
        if(!$this->db->Insert_Account($fname, $lname, $street, $city, $state, $zip, $account, $routing, $store->get_company()->get_id())) {
          return false;
        }
      }

      if(!$this->db->Insert_Check($amount, $date, $store, $this->db->Account_Exists($account, $routing))){
        return false;
      }
      return true;
    }

    public function Delete_Check($checkId) {
      return $this->db->Delete_Check($checkId);
    }
    public function Pay_Check($checkId) {
      $check = $this->db->Select_Check($checkId);
      $check->set_payment_recieved('1');
      $this->db->Update_Check($check);
    }

    // STORE METHODS

    public function Get_Store_HTML($company) {
      $storeList = $this->db->Select_Stores($company);
      if(sizeof($storeList) == 0) {
        return;
      }
      foreach($storeList as $store): ?>
        <div class="store">
          <span class"store-name"><?php echo $store->get_name(); ?></span>
          <span class"store-street"><?php echo $store->get_street(); ?></span>
          <span class"store-city"><?php echo $store->get_city(); ?></span>
          <span class"store-state"><?php echo $store->get_state(); ?></span>
          <span class"store-zip"><?php echo $store->get_zip(); ?></span>
        </div>
        <?php
      endforeach;
    }

    // Adds a store to the Database and returns it as a new Store Object.
    public function Add_Store($name, $street, $city, $state, $zip, $company) {
      if(!$this->db->Insert_Store($name, $street, $city, $state, $zip, $company->get_id())) {
        return null;
      }
      //$store = $this->db->Select_Last_Store();
      return true;
    }

    // returns true if user is a manager, or false otherwise.
    public function verifyManager($userId) {
      $user = $this->db->Select_User($userId);
      if($user == null) {
        return false;
      }
      if($user->get_role() == "manager") {
        return true;
      } else {
        return false;
      }
    }

    public function Authenticate_User($username, $password) {
      return $this->db->Auth_User($username, $password);
    }

    public function Get_Letters($company) {
      return $this->db->Select_Letters($company);
    }

    public function Save_Letter($letter) {
      return $this->db->Update_Letter($letter);
    }

    public function Get_Report_HTML($company) {
      $reports = $this->db->Select_Reports($company);
      foreach($reports as $report) {
        ?>
          <div class="report <?php echo $report->get_printed() == 1 ? "printed": ""; ?>"
            <h3><?php echo $report->get_check()->get_account()->get_first_name() . ' ' . $report->get_check()->get_account()->get_last_name(); ?></h3>
            <h4>$<?php echo $report->get_check()->get_amount(); ?></h4>
            <a href="server/<?php echo $report->get_filename(); ?>" class="button" target="_blank" onclick="setPrinted(<?php echo $report->get_id(); ?>)">Print</a>
          </div>
        <?php
      }
    }

    public function Set_Printed($reportId) {
      $report = $this->db->Select_Report($reportId);
      $check = $report->get_check();
      $status = $check->get_letter_status();
      $status = $report->get_letter_number();
      $check->set_letter_status($status);
      $report->set_printed('1');
      $check->set_letter_sent_date("NOW()");
      $this->db->Update_Report($report);
      $this->db->Update_Check($check);
    }
  };

  // Create global app instance
  $app = new App();
?>
