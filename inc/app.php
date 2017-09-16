<?php
  require "db_connect.php";
  require "classes/classes.php";

  class App {
    public static function get_accounts() {
      ?>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zip</th>
        <th>Routing Number</th>
        <th>Account Number</th>
      </tr>
      <?php
      $accountList = AccountDAO::LoadAll();
      foreach($accountList as $account): ?>
      <tr class="account" onclick="select(<?php echo $account->get_id(); ?>)" id="<?php echo $account->get_id(); ?>">
        <td><?php echo $account->get_first_name(); ?></td>
        <td><?php echo $account->get_last_name(); ?></td>
        <td><?php echo $account->get_address(); ?></td>
        <td><?php echo $account->get_city(); ?></td>
        <td><?php echo $account->get_state(); ?></td>
        <td><?php echo $account->get_zip(); ?></td>
        <td><?php echo $account->get_routing_number(); ?></td>
        <td><?php echo $account->get_account_number(); ?></td>
        <input type="hidden" id="account-<?php echo $account->get_id(); ?>" value="<?php echo $account->get_id(); ?>" />
      </tr>
      <?php endforeach;
    }
  };
?>
