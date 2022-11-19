// // $( document ).ready(function() {

      $.ajax({
        type:"POST",
        url:"electricitate.php",
        success:function(data){
          // alert(data);
          // $('.electricitate-val').textContent = data;
          document.getElementsByClassName('electricitate-val')[0].textContent = data + 'MW';
        },
        error: function(){
          alert('nu');
        }
    });
//   }



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