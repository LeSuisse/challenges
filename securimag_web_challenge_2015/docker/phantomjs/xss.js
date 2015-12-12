var page = require('webpage').create();
var host = "web";
var url = "http://"+host+"/admin.php";

phantom.addCookie({
    'name': 'flag',
    'value': 'TGV0J3MgZ28gZ3JhYiBhIGJlZXIgby8=',
    'domain': host,
    'httponly': false
});

page.settings.resourceTimeout = 1500;
page.onResourceTimeout = function(e) {
    setTimeout(function(){
        console.log("Timeout");
        phantom.exit();
    }, 1);
};

page.onConsoleMessage = function(msg) {
    console.log("Console log: "+msg);
};

page.open(url, function(status) {
    setTimeout(function(){
        phantom.exit();
    }, 5000);
});
