<?php
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
        <link rel="stylesheet" href="css/signup.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>

<<script>
  var Transport=-1,Mancare=-1,Curent=-1,ApaCaldaSiRece =-1,Reciclat =-1;
</script>
<body class="d-flex justify-content-center align-items-center py-5">

    <div class="sign-up-container my-5">
        <h2 class="text-center">Sign Up</h2>

        <form id="form-nume mt-5">
                <div class="mb-3 my-5">
                    <h4>Nume</h4>
                    <!-- <label for="email" class="form-label">Nume:</label> -->
                    <input type="email" class="form-control" id="email" placeholder="Nume" name="nume">
                </div>

                
                <h4 class="mt-5">Transport</h4>
                <div class="ui steps d-flex justify-content-center">

                    <?php
                      $res=Q($conn,"select * from  pyramid.definitii order by ID");
                      while($data = mysqli_fetch_assoc($res))
                      {
                        $ID=$data["ID"];
                        $Txt=$data["Transport"];
                          echo "
                          <div class='step step-$ID' id='transport'>
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
                          <div class='step step-$ID id='mancare'>
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
                        $Txt=$data["Curent"];
                          echo "
                          <div class='step step-$ID' id='curent'>
                            <div class='content'>
                              <div class='title'>$Txt</div>
                              <div class='description'>$ID</div>
                            </div>
                          </div>";
                      }
                   ?>
                </div>



                
                <h4 class="mt-5">ApaCaldaSiRece (MC/persoana pe luna)</h4>
                <div class="ui steps d-flex justify-content-center">

                    <?php
                      $res=Q($conn,"select * from  pyramid.definitii order by ID");
                      while($data = mysqli_fetch_assoc($res))
                      {
                        $ID=$data["ID"];
                        $Txt=$data["ApaCaldaSiRece"];
                          echo "
                          <div class='step step-$ID' id='apa'>
                            <div class='content'>
                              <div class='title'>$Txt</div>
                              <div class='description'>$ID</div>
                            </div>
                          </div>";
                      }
                   ?>
                </div>


                
                <h4 class="mt-5">Reciclat (in cate fractii ?)</h4>
                <div class="ui steps d-flex justify-content-center">

                    <?php
                      $res=Q($conn,"select * from  pyramid.definitii order by ID");
                      while($data = mysqli_fetch_assoc($res))
                      {
                        $ID=$data["ID"];
                        $Txt=$data["Reciclat"];
                          echo "
                          <div class='step step-$ID' id='reciclat'>
                            <div class='content'>
                              <div class='title'>$Txt</div>
                              <div class='description'>$ID</div>
                            </div>
                          </div>";
                      }
                   ?>
                </div>


                <div class="ui animated button w-25 mt-3" id='submit' tabindex="0">
                    <div class="visible content">Submit</div>
                    <div class="hidden content">
                    <i class="right arrow icon"></i>
                    </div>
                </div>

          </form>
    </div>

    <script src="signup.js"></script>
</body>
</html>