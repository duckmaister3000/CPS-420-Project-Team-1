var selected = -1;

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

function get_data(action){
  var data = new FormData();
  data.append("action", action);
  data.append("id", selected);
  data.append("first", document.getElementById('firstname').value);
  data.append("last", document.getElementById('lastname').value);
  data.append("street", document.getElementById('street').value);
  data.append("city", document.getElementById('city').value);
  data.append("state", document.getElementById('state').value);
  data.append("zip", document.getElementById('zip').value);
  data.append("country", "United States");
  data.append("routing", document.getElementById('routingNumber').value);
  data.append("account", document.getElementById('accountNumber').value);

  return data;
}

function update() {
  var data = get_data("update");
  $.ajax({
    url: '/ajax-handler.php', // point to server-side PHP script
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
  $.ajax({
    url: '/ajax-handler.php', // point to server-side PHP script
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
  $.ajax({
    url: '/ajax-handler.php', // point to server-side PHP script
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
