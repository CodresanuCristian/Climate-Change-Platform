
$('#loginbtn').click(function(){
$.ajax({
    type:"POST",
    url:"login.php",
    data:{ nume : $('input').val(), 
    },
    success:function(data){
        window.location.href = "index.html";
    },
    error:function(){
        alert('eroare');
    }
});

});