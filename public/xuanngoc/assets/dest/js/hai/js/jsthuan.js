new WOW().init();

var options = {
    useEasing: true,
    useGrouping: true,
    separator: ',',
    decimal: '.',
    prefix: '',
    suffix: ''
};

var counts = [];

$('.statvalue').each(function() {
    var num = $(this).attr('data-number'); //end count
    var nuen = $(this).text();
    if (nuen === "") {
    nuen = 0;
    }
  
   counts.push(new CountUp(this, nuen, num, 0, 3, options));
});

var waypoint1 = new Waypoint({
  element: document.getElementById("statistics"),
  handler: function(direction) {
    if (direction == "up") {
      for (var i = 0; i < counts.length; i++) {
        counts[i].reset();
      }
    } else {
      for (var i = 0; i < counts.length; i++) {
        counts[i].start();
      }
    }
  },
  offset: "50%"
});