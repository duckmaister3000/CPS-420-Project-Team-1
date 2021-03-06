var selected = -1;

function closeModal() {
  var modal = document.getElementById("error-modal");
  if(modal.classList.contains("show")) {
    modal.classList.remove("show");
  }
}
function showModal() {
  var modal = document.getElementById("error-modal");
  if(!modal.classList.contains("show")) {
    modal.classList.add("show");
  }
}

function select(id){
  var item = document.getElementById(id);
  if(!document.getElementById(id).classList.contains('selected')){
    var list = document.getElementsByClassName('account');
    for(var i = 0; i < list.length; i++) {
      if(list[i].classList.contains('selected')){
        list[i].classList.remove('selected');
      }
    }
    item.classList.add('selected');
    selected = id;
  }
  document.getElementById('firstname').value = item.cells[0].innerHTML;
  document.getElementById('lastname').value = item.cells[1].innerHTML;
  document.getElementById('street').value = item.cells[2].innerHTML;
  document.getElementById('city').value = item.cells[3].innerHTML;
  document.getElementById('state').value = item.cells[4].innerHTML;
  document.getElementById('zip').value = item.cells[5].innerHTML;
  //document.getElementById('country').value = item.cells[6].innerHTML;
  document.getElementById('routingNumber').value = item.cells[6].innerHTML;
  document.getElementById('accountNumber').value = item.cells[7].innerHTML;
}

function get_data(action, target){
  var data = new FormData();
  var first = document.getElementById('first-name').value;
  var last = document.getElementById('last-name').value;
  var street = document.getElementById('street').value;
  var city = document.getElementById('city').value;
  var state = document.getElementById('state').value;
  var zip = document.getElementById('zip').value
  var routing = document.getElementById('routing-number').value;
  var account = document.getElementById('account-number').value;
  var amount = document.getElementById('amount').value;
  var date = document.getElementById('date').value;
  var number = document.getElementById('number');
  if(first == "") {
    //showModal();
    return null;
  }
  if(last == "") {
    //showModal();
    return null;
  }
  if(street == "") {
    //showModal();
    return null;
  }
  if(city == "") {
    //showModal();
    return null;
  }
  if(state == "") {
    //showModal();
    return null;
  }
  if(zip == "") {
    //showModal();
    return null;
  }
  if(routing == "") {
    //showModal();
    return null;
  }
  if(account == "") {
    //showModal();
    return null;
  }
  if(amount == "") {
    //showModal();
    return null;
  }
  if(date == "") {
    //showModal();
    return null;
  }
  if(number == "") {
    //showModal();
    return null;
  }
  data.append("action", action);
  data.append("target", target);
  data.append("id", selected);
  data.append("first", first);
  data.append("last", last);
  data.append("street", street);
  data.append("city", city);
  data.append("state", state);
  data.append("zip", zip);
  data.append("country", "United States");
  data.append("routing", routing);
  data.append("account", account);
  data.append("amount", amount);
  data.append("date", date);
  data.append("number", number);

  return data;
}

function update() {
  var data = get_data("update");
  if(data == null) {
    return;
  }
  $.ajax({
    url: 'ajax-handler.php', // point to server-side PHP script
    dataType: 'text',  // what to expect back from the PHP script, if anything
    cache: false,
    contentType: false,
    processData: false,
    data: data,
    type: 'post',
    success: function(response){
      $('#list').html(response);
    }
  });
}
function create() {
  var data = get_data("create");
  if(data == null) {
    return;
  }
  $.ajax({
    url: 'ajax-handler.php', // point to server-side PHP script
    dataType: 'text',  // what to expect back from the PHP script, if anything
    cache: false,
    contentType: false,
    processData: false,
    data: data,
    type: 'post',
    success: function(response){
      $('#list').html(response);
    }
  });
}
function del() {
  var data = get_data("delete");
  if(data == null) {
    return;
  }
  $.ajax({
    url: 'ajax-handler.php', // point to server-side PHP script
    dataType: 'text',  // what to expect back from the PHP script, if anything
    cache: false,
    contentType: false,
    processData: false,
    data: data,
    type: 'post',
    success: function(response){
      $('#list').html(response);
    }
  });
}

function addCheck() {
  var data = get_data('create', 'check');
  if(data == null) {
    return;
  }

  $.ajax({
    url: 'ajax-handler.php', // point to server-side PHP script
    dataType: 'text',  // what to expect back from the PHP script, if anything
    cache: false,
    contentType: false,
    processData: false,
    data: data,
    type: 'post',
    success: function(response){
      console.log(response);
      document.getElementsByClassName('notif')[0].innerHTML = response;
      document.getElementsByClassName('notif')[0].classList.toggle('show');
    }
  });
}

function deleteCheck(user) {
  var username = document.getElementById('manager-username').value;
  var password = document.getElementById('manager-password').value;
  var check = document.getElementById('target-check').value;
  var data = new FormData();
  var ret = false;
  data.append("action", "delete");
  data.append("target", "check");
  data.append("username", username);
  data.append("password", password);
  data.append("check", check);
  $.ajax({
    url: 'ajax-handler.php', // point to server-side PHP script
    dataType: 'text',  // what to expect back from the PHP script, if anything
    cache: false,
    contentType: false,
    processData: false,
    data: data,
    type: 'post',
    success: function(response){
      console.log(response.substring(0,5));
      if(response.substring(0,5) == "[ERR]") {
        document.getElementsByClassName('notif')[0].innerHTML = response.substring(5);
        closeManagerConfirm();
        if(!document.getElementsByClassName('notif')[0].classList.contains('show')) {
          document.getElementsByClassName('notif')[0].classList.add('show');
        }
      } else {
        document.getElementById('check-list').innerHTML = response;
        closeManagerConfirm();
      }
    }
  });
}

function addStore() {
  var data = new FormData();
  var action = "create";
  var target = "store";
  var name = document.getElementById('store-name').value;
  var street = document.getElementById('store-street').value;
  var city = document.getElementById('store-city').value;
  var state = document.getElementById('store-state').value;
  var zip = document.getElementById('store-zip').value;

  if(name == "") {
    return;
  }
  if(street == "") {
    return;
  }
  if(city == "") {
    return;
  }
  if(state == "") {
    return;
  }
  if(zip == "") {
    return;
  }

  data.append("name", name);
  data.append("street", street);
  data.append("city", city);
  data.append("state", state);
  data.append("zip", zip);
  data.append("action", action);
  data.append('target', target);

  $.ajax({
    url: 'ajax-handler.php', // point to server-side PHP script
    dataType: 'text',  // what to expect back from the PHP script, if anything
    cache: false,
    contentType: false,
    processData: false,
    data: data,
    type: 'post',
    success: function(response){
      console.log(response);
      if(response == "ERROR") {
        return;
      } else {
        document.getElementById('store-list').innerHTML = response;
        document.getElementById('add-store-form').classList.toggle('show');
      }
    }
  });


}

// UTILITY SCRIPTS
function verifyManager(userId) {
  var data = new FormData();
  var ret = false;
  data.append("action", "verify-manager");
  data.append("user", userId);
  $.ajax({
    url: 'ajax-handler.php', // point to server-side PHP script
    dataType: 'text',  // what to expect back from the PHP script, if anything
    cache: false,
    contentType: false,
    processData: false,
    data: data,
    type: 'post',
    success: function(response){
      console.log(response);
      if(response.includes("true")){
        ret = true;
      } else {
        ret = false;
      }
    }
  });
  return ret;
}

// UI SCRIPTS

function toggleSubMenu(menuId) {
  var menu = document.getElementById(menuId);
  menu.classList.toggle('show');
}



function showStoreForm() {
  var userid = document.getElementById('user-id').value;
  var data = new FormData();
  var ret = false;
  data.append("action", "verify-manager");
  data.append("user", userid);
  $.ajax({
    url: 'ajax-handler.php', // point to server-side PHP script
    dataType: 'text',  // what to expect back from the PHP script, if anything
    cache: false,
    contentType: false,
    processData: false,
    data: data,
    type: 'post',
    success: function(response){
      console.log(response);
      if(response.includes("true")){
        document.getElementById('add-store-form').classList.toggle('show');
      } else {
        window.alert("Insufficient permissions to perform this action!");
      }
    }
  });
}

function closeManagerConfirm() {
  document.getElementById('manager-confirm').classList.remove('show');
}
function showManagerConfirm(check) {
  document.getElementsByClassName('notif')[0].classList.remove('show');
  document.getElementById('target-check').value = check;
  document.getElementById('manager-confirm').classList.add('show');
}

function showPayCheckModal(check) {
  var modal = document.getElementById('payment-modal');
  document.getElementById('check-id').value = check;
  if(!modal.classList.contains('show')) {
    modal.classList.add('show');
  }
}
function closePayCheckModal() {
  var modal = document.getElementById('payment-modal');
  if(modal.classList.contains('show')) {
    modal.classList.remove('show');
  }
}

function setPrinted(reportId) {
  var data = new FormData();
  data.append("action", "report-printed");
  data.append("report", reportId);
  $.ajax({
    url: 'ajax-handler.php', // point to server-side PHP script
    dataType: 'text',  // what to expect back from the PHP script, if anything
    cache: false,
    contentType: false,
    processData: false,
    data: data,
    type: 'post',
    success: function(response){
      console.log(response);
    }
  });
}

function payCheck() {
  var check_id = document.getElementById('check-id').value;
  var data = new FormData();
  data.append("action", "pay-check");
  data.append("check", check_id);
  var amount = document.getElementById('amount-paid').value;
  data.append("amount-paid", amount);
  $.ajax({
    url: 'ajax-handler.php', // point to server-side PHP script
    dataType: 'text',  // what to expect back from the PHP script, if anything
    cache: false,
    contentType: false,
    processData: false,
    data: data,
    type: 'post',
    success: function(response){
      document.getElementById('check-list').innerHTML = response;
      closePayCheckModal();
    }
  });
}
