
$('#loginbtn').click(function()
{
    $.ajax({
        type:"POST",
        url:"do_login.php",
        data:{ nume : $('input').val(), 
        },
        success:function(data)
        {
            //alert(data);
            window.location.href = "index.php";
        },
        error:function(){
            alert('eroare');
        }
    });

});



$('#SignUp').click(function(){
    window.location.href = "signup.php";
    
    });