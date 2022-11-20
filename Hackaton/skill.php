

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

function GetSingleLine(&$con,$String,$PhpFile='File not implemented yet') 
{
	$res = Q($con,$String);
	while($data = mysqli_fetch_assoc($res))
		return $data;
	return "?";
}


$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js" integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.css" integrity="sha512-KXol4x3sVoO+8ZsWPFI/r5KBVB/ssCGB5tsv2nVOKwLg33wTFP3fmnXa47FdSVIshVTgsYk/1734xSk9aFIa4A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/signup.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="index.js"></script>
        
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
        <span style="font-size:30px;cursor:pointer"  onclick="openNav()">&#9776; <span class="mx-3">Skills</span></span>
        <span style="font-size:30px;cursor:pointer" ><i class="user icon"></i> Salut <?php echo strtoupper($_SESSION["User"]["Nume"]); ?></span>
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
  </div>
<!-- <div class="sign-up-container my-5"> -->

        <form id="form-nume mt-5">
                               
                <h4 class="mt-5">Transport</h4>
                <div class="ui steps d-flex justify-content-center">

                    <?php
                      $res=Q($conn,"select * from  pyramid.definitii order by ID");
                      while($data = mysqli_fetch_assoc($res))
                      {
                        $ID=$data["ID"];
                        $Txt=$data["Transport"];
                          echo "
                          <div class='step transport step-$ID' id='$ID'>
                            <div class='content'>
                              <div class='title'>$Txt</div>
                              <div class='description'>$ID</div>
                            </div>
                          </div>";
                      }
                   ?>
                </div>


                
                <h4 class="mt-5">Mancare (cate zile consumi carne pe saptamana ?) </h4>
                <div class="ui steps d-flex justify-content-center">

                    <?php
                      $res=Q($conn,"select * from  pyramid.definitii order by ID");
                      while($data = mysqli_fetch_assoc($res))
                      {
                        $ID=$data["ID"];
                        $Txt=$data["Mancare"];
                          echo "
                          <div class='step mancare step-$ID' id='$ID'>
                            <div class='content'>
                              <div class='title'>$Txt</div>
                              <div class='description'>$ID</div>
                            </div>
                          </div>";
                      }
                   ?>
                </div>


                
                <h4 class="mt-5">Curent (KWH / luna de persoana)</h4>
                <div class="ui steps d-flex justify-content-center">

                    <?php
                      $res=Q($conn,"select * from  pyramid.definitii order by ID");
                      while($data = mysqli_fetch_assoc($res))
                      {
                        $ID=$data["ID"];
                        $Txt=$data["Electricitate"];
                          echo "
                          <div class='step curent step-$ID' id='$ID'>
                            <div class='content'>
                              <div class='title'>$Txt</div>
                              <div class='description'>$ID</div>
                            </div>
                          </div>";
                      }
                   ?>
                </div>



                
                <h4 class="mt-5">Apa (calda+rece, MC/persoana pe luna)</h4>
                <div class="ui steps d-flex justify-content-center">

                    <?php
                      $res=Q($conn,"select * from  pyramid.definitii order by ID");
                      while($data = mysqli_fetch_assoc($res))
                      {
                        $ID=$data["ID"];
                        $Txt=$data["ApaCaldaSiRece"];
                          echo "
                          <div class='step apa step-$ID' id='$ID'>
                            <div class='content'>
                              <div class='title'>$Txt</div>
                              <div class='description'>$ID</div>
                            </div>
                          </div>";
                      }
                   ?>
                </div>


                
                <h4 class="mt-5">Reciclat (in cate fractii imparti gunoiul ?)</h4>
                <div class="ui steps d-flex justify-content-center">

                    <?php
                      $res=Q($conn,"select * from  pyramid.definitii order by ID");
                      while($data = mysqli_fetch_assoc($res))
                      {
                        $ID=$data["ID"];
                        $Txt=$data["Reciclat"];
                          echo "
                          <div class='step reciclat step-$ID' id='$ID'>
                            <div class='content'>
                              <div class='title'>$Txt</div>
                              <div class='description'>$ID</div>
                            </div>
                          </div>";
                      }
                   ?>
                </div>



                <div class="ui animated button w-25 mt-3" id='submitSkill' tabindex="0">
                    <div class="visible content">Submit</div>
                    <div class="hidden content">
                    <i class="right arrow icon"></i>
                    </div>
                </div>

          </form>
    </div>
                    <!-- </div> -->
                    <script src="signup.js"></script>

                    
                    <?php
                        $val=$_SESSION["User"]["Transport"];echo "<script>$('#$val.transport').trigger('click');</script>";
                        $val=$_SESSION["User"]["Mancare"];echo "<script>$('#$val.mancare').trigger('click');</script>";
                        $val=$_SESSION["User"]["Electricitate"];echo "<script>$('#$val.curent').trigger('click');</script>";
                        $val=$_SESSION["User"]["ApaCaldaSiRece"];echo "<script>$('#$val.apa').trigger('click');</script>";
                        $val=$_SESSION["User"]["Reciclat"];echo "<script>$('#$val.reciclat').trigger('click');</script>";

                    ?>
                    
    </body>
    </html>