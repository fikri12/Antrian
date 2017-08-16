var url = '';
var ajax = function(url, data, callback, type) {
  var data_array, data_string, idx, req, value;
  if (data == null) {
    data = {};
  }
  if (callback == null) {
    callback = function() {};
  }
  if (type == null) {
    //default to a GET request
    type = 'GET';
  }
  data_array = [];
  for (idx in data) {
    value = data[idx];
    data_array.push("" + idx + "=" + value);
  }
  data_string = data_array.join("&");
  
  req = new XMLHttpRequest();
  req.open(type, url, false);
  req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  req.onreadystatechange = function() {
    if (req.readyState === 4 && req.status === 200) {
      return callback(req.responseText);
    }
  };
  req.send(data_string);
  return req;
};

function get_antrian(){
    
    ajax(url, {}, function(data) {
       if(data != 'null'){
            self.postMessage(JSON.parse(data));
        }else{
            setTimeout(get_antrian, 1000);
        }
    }, 'GET');
    /*
    $.ajax({
      
      dataType: 'json',
      success: function(data) {
        if(data != null){
            postMessage(data);
        }else{
            setTimeout(get_antrian(), 1000);
        }
      }
    }); */
}

self.addEventListener('message', function(e) {
  var data = e.data;
  switch (data.cmd) {
    case 'start':
      url = data.msg;
      get_antrian();
      break;
    //default:
      //self.postMessage('Unknown command: ' + data.msg);
  };
}, false);
