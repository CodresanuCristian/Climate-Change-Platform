
    var Transport=-1,Mancare=-1,Curent=-1,ApaCaldaSiRece =-1,Reciclat =-1;

    $('.transport').click(function(){
        for(id =0 ; id<5; id++)
           $('#'+id+'.transport').css({'background':'transparent'});
        Transport = $(this).attr('id');
    });
    $('.mancare').click(function(){
        for(id =0 ; id<5; id++)
            $('#'+id+'.mancare').css({'background':'transparent'});
        Mancare = $(this).attr('id');
    });
    $('.curent').click(function(){
        for(id =0 ; id<5; id++)
            $('#'+id+'.curent').css({'background':'transparent'});
        Curent = $(this).attr('id');
    });
    $('.apa').click(function(){
        for(id =0 ; id<5; id++)
            $('#'+id+'.apa').css({'background':'transparent'});
        ApaCaldaSiRece = $(this).attr('id');
    });
    $('.reciclat').click(function(){
        for(id =0 ; id<5; id++)
            $('#'+id+'.reciclat').css({'background':'transparent'});
        Reciclat = $(this).attr('id');
    });
 


    //  0000000
    $('#0.transport').click(function(){
        $(this).css({'background':'#2cba00'});
    });
    $('#0.mancare').click(function(){
        $(this).css({'background':'#2cba00'});
    });
    $('#0.curent').click(function(){
        $(this).css({'background':'#2cba00'});
    });
    $('#0.apa').click(function(){
        $(this).css({'background':'#2cba00'});
    });
    $('#0.reciclat').click(function(){
        $(this).css({'background':'#2cba00'});
    });



    // 1111111
    $('#1.transport').click(function(){
        $(this).css({'background':'#a3ff00'});
    });
    $('#1.mancare').click(function(){
        $(this).css({'background':'#a3ff00'});
    });
    $('#1.curent').click(function(){
        $(this).css({'background':'#a3ff00'});
    });
    $('#1.apa').click(function(){
        $(this).css({'background':'#a3ff00'});
    });
    $('#1.reciclat').click(function(){
        $(this).css({'background':'#a3ff00'});
    });



    // 222222222222
    $('#2.transport').click(function(){
        $(this).css({'background':'#fff400'});
    });
    $('#2.mancare').click(function(){
        $(this).css({'background':'#fff400'});
    });
    $('#2.curent').click(function(){
        $(this).css({'background':'#fff400'});
    });
    $('#2.apa').click(function(){
        $(this).css({'background':'#fff400'});
    });
    $('#2.reciclat').click(function(){
        $(this).css({'background':'#fff400'});
    });



    // 333333333333333
    $('#3.transport').click(function(){
        $(this).css({'background':'#ffa700'});
    });
    $('#3.mancare').click(function(){
        $(this).css({'background':'#ffa700'});
    });
    $('#3.curent').click(function(){
        $(this).css({'background':'#ffa700'});
    });
    $('#3.apa').click(function(){
        $(this).css({'background':'#ffa700'});
    });
    $('#3.reciclat').click(function(){
        $(this).css({'background':'#ffa700'});
    });



    // 444444444444444
    $('#4.transport').click(function(){
        $(this).css({'background':'#ff0000'});
    });
    $('#4.mancare').click(function(){
        $(this).css({'background':'#ff0000'});
    });
    $('#4.curent').click(function(){
        $(this).css({'background':'#ff0000'});
    });
    $('#4.apa').click(function(){
        $(this).css({'background':'#ff0000'});
    });
    $('#4.reciclat').click(function(){
        $(this).css({'background':'#ff0000'});
    });



    $('#submit').click(function(){
        
        if(Transport<0 || Mancare <0 || Curent <0 || ApaCaldaSiRece <0 || Reciclat <0)
            {
                alert("completeaza tot");
                return;
            }
        let username=$('input').val();
        $.ajax({
            type:"POST",
            url:"addsignup.php",
            data:{ name : $('input').val(), 
                   transport : Transport,
                   mancare : Mancare, 
                   curent : Curent, 
                   apa : ApaCaldaSiRece, 
                   reciclat : Reciclat, 
            },
            success:function(data){
                if (data == '')
                {
                    //window.location.href = "login.html";


                    $.ajax({
                        type:"POST",
                        url:"login.php",
                        data:{ nume : username, 
                        },
                        success:function(data){
                            window.location.href = "index.php";
                        },
                        error:function(){
                            alert('eroare');
                        }
                    });
                }
                else
                    alert('nume existent: '  );
            },
            error:function(){
                alert('eroare');
            }
        });
    })