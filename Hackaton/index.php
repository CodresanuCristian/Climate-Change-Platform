

<?php

if(!session_id()) session_start();



var_dump($_SESSION["User"]);

// if(isset($_SESSION["User"])==false)
//     header('Location: login.html');

?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js" integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.css" integrity="sha512-KXol4x3sVoO+8ZsWPFI/r5KBVB/ssCGB5tsv2nVOKwLg33wTFP3fmnXa47FdSVIshVTgsYk/1734xSk9aFIa4A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
<body>



    
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="index.html">Dashboard</a>
    <a href="maps.html">Maps</a>
    <a href="news.php">News</a>
  </div>
  
  <div id="main">
    <div class="d-flex justify-content-between">
        <span style="font-size:30px;cursor:pointer">&#9776; <span class="mx-3">Dashboard, salut <?php echo $_SESSION["User"]["Nume"]; ?></span></span>
        <div class="d-flex" id="signout">
            <i class="user outline icon"></i>
            <h5 style="font-weight:bold">Logout</h5>
        </div>
    </div>
    <div class="page-content my-5">        
        <div class="date-utile d-flex">
            <div class="date-utile-box">
                <p class="m-0">Electricitate (<span class="electricitate-val"></span>)</p>
                <i id='electricitate-icon' class="level down alternate icon red"></i>
            </div>
            <div class="date-utile-box" style="border-left: 2px solid gainsboro;">
                <p class="m-0">Apa</p>
                <i class="level down alternate icon red"></i>
            </div>
            <div class="date-utile-box" style="border-left: 2px solid gainsboro;">
                <p class="m-0">Gaz</p>
                <i class="level up alternate icon green"></i>
            </div>
            <div class="date-utile-box" style="border-left: 2px solid gainsboro;">
                <p class="m-0">Temperatura: 20,5 </p>
            </div>
        </div>

        aici


    </div>
  </div>


    <script src="index.js"></script>
    <script>
        $('#signout').click(function(){
            <?php //session_destroy(); ?>
            window.location.href = "login.html";
        })
    </script>
</body>
</html>