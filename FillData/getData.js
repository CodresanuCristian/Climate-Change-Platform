var system = require('system');var page = require('webpage').create();page.open(system.args[1], function(status){var ua = page.evaluate(function() {return     $("td")[10].textContent     });console.log(ua);phantom.exit();});

