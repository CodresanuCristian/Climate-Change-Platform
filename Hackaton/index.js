
      $.ajax({
        type:"POST",
        url:"electricitate.php",
        success:function(data){
          document.getElementsByClassName('electricitate-val')[0].textContent = data + 'MW';
          if (data < 0 ){
            document.getElementById('electricitate-icon').classList.remove('down');
            document.getElementById('electricitate-icon').classList.remove('red');
            document.getElementById('electricitate-icon').classList.add('up');
            document.getElementById('electricitate-icon').classList.add('green');
          }
          else{
            document.getElementById('electricitate-icon').classList.remove('up');
            document.getElementById('electricitate-icon').classList.remove('green');
            document.getElementById('electricitate-icon').classList.add('down');
            document.getElementById('electricitate-icon').classList.add('red');
          }
        },
        error: function(){
        }
    });
  


function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}


var gauge2 = Gauge(
  document.getElementById("gauge2"),
  {
    min: -100,
    max: 100,
    dialStartAngle: 180,
    dialEndAngle: 0,
    value: 50,
    viewBox: "0 0 100 57",
    color: function(value) {
      if(value < 20) {
        return "#5ee432";
      }else if(value < 40) {
        return "#fffa50";
      }else if(value < 60) {
        return "#f7aa38";
      }else {
        return "#ef4655";
      }
    }
  }
);