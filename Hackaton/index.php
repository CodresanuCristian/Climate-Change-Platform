

<?php

if(!session_id()) session_start();

if(isset($_SESSION["User"])==false || $_SESSION["User"]=="?")
    header('Location: login.php');
    



    $servername = "localhost";
    $username = "root";
    $password = "";
    
    
    
    
    function Q(&$con,$q,$PhpFile='File not implemented yet')
    {
        try
        {
            $res = mysqli_query($con,$q);
        }
        catch(Exception $e)
        {
            $SQL_ERR=$e->getMessage();
            echo "QUERIUL $q a DAT: $SQL_ERR<br>\n";
        }
        return $res;
    }
    function GetSingleValue(&$con,$String,$PhpFile='File not implemented yet') 
    {
        $res = Q($con,$String);
        while($data = mysqli_fetch_assoc($res))
            foreach($data as $key => $value)
                return $value;
        return "?";
    }
    function GetSingleLine(&$con,$String,$PhpFile='File not implemented yet') 
    {
        $res = Q($con,$String);
        while($data = mysqli_fetch_assoc($res))
            return $data;
        return "?";
    }
    
    
    $conn = new mysqli($servername, $username, $password);
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
    <a href="index.php">Dashboard</a>
    <a href="maps.php">Maps</a>
    <a href="news.php">News</a>
    <a href="skill.php">My skills</a>
    <a href="logout.php">Logout</a>
  </div>
  
  <div id="main">
    <div class="d-flex justify-content-between">
        <span style="font-size:30px;cursor:pointer"  onclick="openNav()">&#9776; <span class="mx-3">Dashboard, salut <?php echo $_SESSION["User"]["Nume"]; ?></span></span>
        <!-- <div class="d-flex" id="signout">
            <i class="user outline icon"></i>
            <h5 style="font-weight:bold">Logout</h5>
        </div> -->
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


        <div class="ui green message">
            <div class="header">
                Recomandari:
            </div>
            <ul class="list">
            <?php

                $ID=$_SESSION["User"]["ID"];
                $res = Q($conn,"call pyramid.GetToDoList($ID)");
                while($data = mysqli_fetch_assoc($res))
                {
                    $Tip=$data["Tip"];
                    $DeLa=$data["DeLa"];
                    $La=$data["La"];

                    //echo "@$DeLa@";
                    //echo "!"."select $Tip from pyramid.definitii where ID=$DeLa"."!";
                    $conn2 = new mysqli($servername, $username, $password);


                    $FromTxt=GetSingleValue($conn2,"select $Tip from pyramid.definitii where ID=$DeLa");
                    $ToTxt=GetSingleValue($conn2,"select $Tip from pyramid.definitii where ID=$La");

                    if ($Tip == 'Transport') echo "<li>$Tip: Poti incerca $FromTxt in loc de $ToTxt</li>";
                    if ($Tip == 'Mancare') echo "<li>$Tip: Poti incerca sa consumi carne de la $FromTxt zile pe saptamana la  zi pe saptamana</li>";
                    if ($Tip == 'Electricitate') echo "<li>$Tip: Poti incerca sa consumi $ToTxt KWH / luna in loc de $FromTxt KWH / luna</li>";
                    if ($Tip == 'ApaCaldaSiRece') echo "<li>Apa: Poti incerca sa consumi $ToTxt MC / luna in loc de $FromTxt MC / persoana</li>";
                    if ($Tip == 'Reciclat') echo "<li>$Tip: Poti incerca sa sortezi gunoiul in $ToTxt fractii in loc de $FromTxt fractii</li>";

                }


            ?>
            </ul>
        </div>

        <div>

        <div id="gauge2" class="gauge-container two"></div>
        </div>

    </div>
  </div>


    <script src="index.js"></script>
</body>
</html>