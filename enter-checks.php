<?php
$title = "Enter Checks";
include 'inc/app.php';
include 'page-parts/header.php';
include 'page-parts/sidebar.php';

$user = $app->db->Select_User($_SESSION['user_id']);
$company = $user->get_store()->get_company();
 ?>
         <div class="check-form">
           <div class="row">
             <span class="address">
               <input type="text" id="first-name" placeholder="First Name"/>
               <input type="text" id="last-name" placeholder="Last Name"/><br>
               <input type="address" id="street" placeholder="Street Address" /><br>
               <input type="text" id="city", placeholder="City" />
               <select id="state">
                 <option value="AL">Alabama</option>
                 <option value="AK">Alaska</option>
                 <option value="AZ">Arizona</option>
                 <option value="AR">Arkansas</option>
                 <option value="CA">California</option>
                 <option value="CO">Colorado</option>
                 <option value="CT">Connecticut</option>
                 <option value="DE">Delaware</option>
                 <option value="GL">Florida</option>
                 <option value="GA">Georgia</option>
                 <option value="HI">Hawaii</option>
                 <option value="ID">Idaho</option>
                 <option value="IL">Illinois</option>
                 <option value="IN">Indiana</option>
                 <option value="IA">Iowa</option>
                 <option value="KS">Kansas</option>
                 <option value="KY">Kentucky</option>
                 <option value="LA">Louisiana</option>
                 <option value="ME">Maine</option>
                 <option value="MD">Maryland</option>
                 <option value="MA">Massachusetts</option>
                 <option value="MI">Michigan</option>
                 <option value="MN">Minnesota</option>
                 <option value="MS">Mississippi</option>
                 <option value="MO">Missouri</option>
                 <option value="MT">Montana</option>
                 <option value="NE">Nebraska</option>
                 <option value="NV">Nevada</option>
                 <option value="NH">New Hampshire</option>
                 <option value="NJ">New Jersy</option>
                 <option value="NM">New Mexico</option>
                 <option value="NY">New York</option>
                 <option value="NC">North Carolina</option>
                 <option value="ND">North Dakota</option>
                 <option value="OH">Ohio</option>
                 <option value="OK">Oklahoma</option>
                 <option value="OR">Oregon</option>
                 <option value="PA">Pennsylvania</option>
                 <option value="RI">Rhode Island</option>
                 <option value="SC">South Carolina</option>
                 <option value="SD">South Dakota</option>
                 <option value="TN">Tennessee</option>
                 <option value="TX">Texas</option>
                 <option value="UT">Utah</option>
                 <option value="VT">Vermont</option>
                 <option value="VA">Virginia</option>
                 <option value="WA">Washington</option>
                 <option value="WV">West Virginia</option>
                 <option value="WI">Wisconson</option>
                 <option value="WY">Wyoming</option>\
               </select>
               <input type="text" id="zip" placeholder="Zip" />
             </span>
             <span class="date-number">
               <span class="number">
                 <input type="text" id="number" placeholder="####" oninput="inputCheckNumber($(this))"/>
               </span>
               <span class="date">
                 <label for="date">Date</label>
                 <input type="date" id="date" />
               </span>
             </span>
           </div>
           <div class="row">
             <span class="pay-to">
               <div class="pay-to-label">Pay to the order of</div>
               <div class="pay-to-field"><?php echo $company->get_name(); ?></div>
             </span>
             <span class="amount">
               <label for="amount">$</label>
               <input type="text" id="amount" placeholder="0.00"/>
             </span>
           </div>
           <div class="row">
             <div class="dollars">
               <div class="dollars-field"></div>
               <div class="dollars-label">Dollars</div>
             </div>
           </div>
           <div class="row bank-font">
             <span class="numbers">
               <label>a</label>
               <span class="routing-number-container">
                 <input type="text" id="routing-number" placeholder="00000000" class="routing" maxlength="8"/>
               </span>
               <label>a</label>
               <span class="account-number-container">
                 <input type="text" id="account-number" placeholder="00000000000"class="account" maxlength="11"/>
               </span>
               <label>a</label>
               <span id="check-number">####</span>
             </span>
             <div class="button" onclick="addCheck()">Submit</div>
             <!--<div class="button" onclick="closeModal()">Cancel</div>-->
           </div>
         </div>
 <?php
 include 'page-parts/footer.php';
