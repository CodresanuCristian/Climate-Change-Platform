

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
                
        <meta charset="UTF-8">
        <meta name="author" content="Chart.js">


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

<style type="text/css">
  .chartBox {
    width: 80%;
    margin: auto;
  }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>


    
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
        <span style="font-size:30px;cursor:pointer"  onclick="openNav()">&#9776; <span class="mx-3">Dashboard</span></span>
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


        <div class='player mt-5'>
            <div class='d-flex'>
            <div class='avatar'></div>

            <div class='xp d-flex flex-column justify-content-around'>
                <h1><?php echo strtoupper($_SESSION["User"]["Nume"]); ?></h1>
                <h5>Level: 13 <i class="star yellow icon"></i></h5>
                <div>
                <span>6500 XP / 10000 XP</span>
                <div class="ui indicating blue progress">
                    <div class="bar"></div>
                    <div class="label">Funding</div>
                </div>
</div>
            </div>
</div>
            <div class='achievements'>
                <h3 class='text-center'>Achievements</h3>
                <div class='d-flex justify-content-center align-items-center'>
                <i class="trophy yellow icon"></i>
</div>
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
                    if ($Tip == 'Reciclat') echo "<li>$Tip: Poti incerca sa sortezi gunoiul in $FromTxt fractii in loc de $ToTxt fractii</li>";

                }


            ?>
            </ul>
        </div>

        <div class="ui blue message">
            <div class="header">
                Provocarea saptamanii:
            </div>
            <ul class="list">
                <li>Incearca sa mergi 2 zile cu mijlocul de transport in comun</li>
                <button class="ui tiny blue button mt-3">Efectuat</button>
            </ul>
        </div>

        <div>
            <div class='my-5'>


        <h5 class='text-center my-5'>Consuml tau de CO2, limita este de 50%
        </h5>
        <div id="gauge2" class="gauge-container two"></div>
            </div>
        </div>

















        <h5 class='text-center my-5' style="margin-top:150px;">Cum te raportezi la nivel national</h5>
    <div class="chartBox">
        <canvas id="myChart"></canvas>
    </div>

    <script>



    var EuBuget=<?php echo 5*($_SESSION["User"]["Transport"]+$_SESSION["User"]["Mancare"]+$_SESSION["User"]["Electricitate"]+$_SESSION["User"]["ApaCaldaSiRece"]+$_SESSION["User"]["Reciclat"]) ;?>;




    var argx=0;


    const x_vals = [

    <?php

        $conn3 = new mysqli($servername, $username, $password);
        $res = Q($conn3,"SELECT 5*(Transport+Mancare+Electricitate+ApaCaldaSiRece+Reciclat) Scor,count(*) Caunt FROM pyramid.user group by Scor ORDER by Scor");
        while($data = mysqli_fetch_assoc($res))
            echo $data["Scor"].",";


    ?>

    ];
    const y_vals = [


        <?php

        $conn4 = new mysqli($servername, $username, $password);
        $res = Q($conn4,"SELECT 5*(Transport+Mancare+Electricitate+ApaCaldaSiRece+Reciclat) Scor,count(*) Caunt FROM pyramid.user group by Scor ORDER by Scor");
        while($data = mysqli_fetch_assoc($res))
            echo $data["Caunt"].",";


        ?>

    ]


    // const x_vals = [0+2.5,5+2.5,15+2.5,20+2.5,25+2.5,30+2.5,35+2.5,40+2.5,45+2.5,50+2.5,55+2.5,60+2.5,65+2.5,70+2.5,75+2.5,80+2.5,85+2.5,90+2.5,100+2.5];
    // const y_vals = [2,2,1,4,6,6,6,10,21,15,6,8,5,9,3,4,1,1,1];


    for(var i=0;i<x_vals.length;i++)
    {
        if(x_vals[i]==EuBuget)
            argx=i;
        x_vals[i]+=2.5;
    }

    const data = x_vals.map((k, i) => ({x: k, y: y_vals[i]}));

    var backgroundColor = Array(x_vals.length).fill('rgba(255, 99, 132, 0.2)');
    for(var i=0;i<x_vals.length;i++)
        {
            var temp=100.0*i/(x_vals.length+1);


            if(temp < 20) {
                backgroundColor[i]="rgba(44, 186, 0, 0.5)   ";
            }else if(temp < 40) {
                backgroundColor[i]= "rgba(163,255,0, 0.5)";
            }else if(temp < 60) {
                backgroundColor[i]= "rgba(255,244,0, 0.5)";
            }else if(temp < 80) {
                backgroundColor[i]= "rgba(255,167,0, 0.5) ";
            }else {
                backgroundColor[i]= "rgba(255, 0, 0, 0.5)";
            }

        }


    var borderColor = Array(x_vals.length).fill('rgba(255, 99, 132, 1)');

    backgroundColor[argx] = 'rgba(54, 162, 235, 0.2)';
    borderColor[argx] = 'rgba(54, 162, 235, 1)';

    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            datasets: [{
                label: 'Numar utilizatori',
                data: data,
                backgroundColor: backgroundColor,
                borderColor: borderColor,
                borderWidth: 1,
                barPercentage: 1,
                categoryPercentage: 1,
                borderRadius: 5,
            }]
        },
        options: {
            scales: {
                x: {
                    type: 'linear',
                    offset: false,
                    grid: {
                    offset: false
                    },
                    ticks: {
                    stepSize: 5
                    },
                    title: {
                    display: true,
                    text: 'Buget CO2',
                    font: {
                        size: 14
                    }
                    }
                }, 
                y: {
                    // beginAtZero: true
                    title: {
                    display: true,
                    text: 'Numar utilizatori',
                    font: {
                        size: 14
                    }
                    }
                }
            },
            plugins: {
            legend: {
                display: false,
                },
            tooltip: {
                callbacks: {
                title: (items) => {
                    if (!items.length) {
                    return '';
                    }
                    const item = items[0];
                    const x = item.parsed.x;
                    const min = x - 2.5;
                    const max = x + 2.5;
                    return `Buget CO2: ${min} - ${max}`;
                }
                }
            }
            }
        }
    });
    </script>





















    </div>
  </div>


    <script src="index.js"></script>
    <script type="text/javascript" src="gauge.js"> </script>
    <script>
        var gauge2 = Gauge(
  document.getElementById("gauge2"),
  {
    min: 0,
    max: 100,
    dialStartAngle: 0,
    dialEndAngle: 180,
    value: <?php echo 5*($_SESSION["User"]["Transport"]+$_SESSION["User"]["Mancare"]+$_SESSION["User"]["Electricitate"]+$_SESSION["User"]["ApaCaldaSiRece"]+$_SESSION["User"]["Reciclat"]) ;?>,
    viewBox: "-200 0 500 57",
    color: function(value) {
      if(value < 20) {
        return "#2cba00  ";
      }else if(value < 40) {
        return "#a3ff00  ";
      }else if(value < 60) {
        return "#fff400";
      }else if(value < 80) {
        return "#ffa700 ";
      }else {
        return "#ff0000  ";
      }
    }
  }
);
</script>
</body>
</html>