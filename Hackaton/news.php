

<?php

if(!session_id()) session_start();

if(isset($_SESSION["User"])==false || $_SESSION["User"]=="?")
    header('Location: login.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js" integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.css" integrity="sha512-KXol4x3sVoO+8ZsWPFI/r5KBVB/ssCGB5tsv2nVOKwLg33wTFP3fmnXa47FdSVIshVTgsYk/1734xSk9aFIa4A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="news/style.css">
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

  <!-- PANEL -->
  <span style="font-size:30px;cursor:pointer"  onclick="openNav()">&#9776; <span class="mx-3">News, salut <?php echo $_SESSION["User"]["Nume"]; ?></span></span>
    <div class="page-content my-5">        
        <div class="date-utile d-flex">
            <div class="date-utile-box">
                <p class="m-0">Electricitate (<span class="electricitate-val"></span>)</p>
                <i id='electricitate-icon' class="level down alternate icon red"></i>
            </div>
            <div class="date-utile-box" style="border-left: 2px solid gainsboro;">
                <p class="m-0">Apa (to do)</p>
                <i class="level down alternate icon red"></i>
            </div>
            <div class="date-utile-box" style="border-left: 2px solid gainsboro;">
                <p class="m-0">Gaz (to do)</p>
                <i class="level up alternate icon green"></i>
            </div>
            <div class="date-utile-box" style="border-left: 2px solid gainsboro;">
                <p class="m-0">Temperatura: (to do) </p>
            </div>
        </div>


        <!-- CONTENT -->
        <div class="content mt-5">
            <?php
                foreach(
                    array(
                    "https://www.dailyclimate.org/feeds/good-news.rss",
                    //"https://skepticalscience.com/feed.xml",
                    //"https://www.greenpeace.org.au/feed/",
                    // "https://www.thegwpf.org/feed/",
                    // "https://www.joboneforhumanity.org/blog.rss",
                    // "https://notrickszone.com/feed/",
                    //"http://arctic-news.blogspot.com/feeds/posts/default?alt=rss",
                    // "https://www.nytimes.com/svc/collections/v1/publish/http://www.nytimes.com/topic/subject/global-warming-climate-change/rss.xml"
                    ) as $url)
                {
                    $invalidurl = false;
                    if(@simplexml_load_file($url)){
                        $feeds = simplexml_load_file($url);
                    }else{
                        $invalidurl = true;
                        echo "<h2>Invalid RSS feed URL.</h2>";
                    }
                    $i=0;
                    if(!empty($feeds)){
                        $site = $feeds->channel->title;
                        $sitelink = $feeds->channel->link;

                        echo "<h1 class='text-center mt-5'>".$site."</h1>";
                        foreach ($feeds->channel->item as $item) {

                            $title = $item->title;
                            $link = $item->link;
                            $description = $item->description;
                            $postDate = $item->pubDate;
                            $pubDate = date('D, d M Y',strtotime($postDate));


                            if($i>=9) break;
                    ?>
                      <br>
                    <div class='d-flex'>
                    <div class='test-wrap'>
                            <div class="post" style='margin-top:100px;'>
                                <div class="post-head text-center d-flex justify-content-around">
                                    <a class="feed_title" style="text-decoration:none; color:#444; font-size:1.5em;" href="<?php echo $link; ?>"><?php echo $title; ?></a>
                                  
                                    <span><?php echo $pubDate; ?></span>
                                </div>
                                <div class="post-content d-flex flex-column align-items-center mt-4">
                                    <?php echo implode(' ', array_slice(explode(' ', $description), 0, 20)) . "..."; ?> <a href="<?php echo $link; ?>">Read more</a>
                                </div>
                            </div>
                        </div>
                        </div>

                            <?php
                            $i++;
                        }
                    }else
                    {
                        if(!$invalidurl){
                            echo "<h2>No item found</h2>";
                        }
                    }
                }
            ?>
        </div>
    </div>
  </div>


    <script src="index.js"></script>
</body>
</html>