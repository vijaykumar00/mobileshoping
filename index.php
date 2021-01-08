<?php
session_start();
include_once './buslogic.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Business Circle :: Upload</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script>
document.createElement("article");
document.createElement("aside");
document.createElement("audio");
document.createElement("canvas");
document.createElement("command");
document.createElement("datalist");
document.createElement("details");
document.createElement("embed");
document.createElement("figcaption");
document.createElement("figure");
document.createElement("footer");
document.createElement("header");
document.createElement("hgroup");
document.createElement("keygen");
document.createElement("mark");
document.createElement("meter");
document.createElement("nav");
document.createElement("output");
document.createElement("progress");
document.createElement("rp");
document.createElement("rt");
document.createElement("ruby");
document.createElement("section");
document.createElement("source");
document.createElement("summary");
document.createElement("time");
document.createElement("video");
</script>
</head>
<body>
<!-- wrapper start -->
<div id="wrapper">
<header>
<div class="container">
<div class="row">
<div class="top">
<div class="col-sm-12">
<div class="menu">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt=""/></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Home</a></li>
        <li><a href="frmreg.php">Register</a></li>
        <li><a href="frmlogin.php">Login</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
</div>
</div>
</div>
</div>

</header>
<div class="mid-section">
  <div class="container">
    <section class="reviews-page">
    <div class="col-sm-4">
      <div class="sidebar">
       <h4>SEARCH PRODUCTS</h4>
        <div class="recent rated">
         
          <div class="recent">
              <h4>Top Companies</h4>
            <ul>
              <?php
              $obj=new clscmp();
              $arr=$obj->disp_rec();
              for($i=0;$i<count($arr);$i++)
              {
                echo "<li><a href=index.php?ccod=".$arr[$i][0].">";
                echo "<div class=imgbox ><img src=cmplog/".$arr[$i][2]." height=80px width=80px /></div>";
                echo $arr[$i][1] ."</a> </li>";
              }
              ?>
              
            
            </ul>
          </div>
          <div class="recent">
            <h4>Latest Technologies</h4>
            <ul>
            <?php
    $obj=new clstec();
    $arr=$obj->disp_rec();
    for($i=0;$i<count($arr);$i++)
    {
  echo "<li><a href=index.php?tcod=".$arr[$i][0]." >".$arr[$i][1]."</a></li>";
    }
            ?>
            </ul>
          </div>
          
        </div>
      </div>
      </div>
      <div class="col-sm-8"><div class="right-bar">
      <div class="recent all-reviews">
      <h4>SEARCH RESULTS</h4>
      <ul>
      <?php
      $obj=new clsmod();
      if(isset($_REQUEST["ccod"]))
          $arr=$obj->srcbycmp ($_REQUEST["ccod"]);
      else if(isset ($_REQUEST["tcod"]))
          $arr=$obj->srcbytec($_REQUEST["tcod"]);
      if(isset($_REQUEST["ccod"])||isset($_REQUEST["tcod"]))
      {
      for($i=0;$i<count($arr);$i++)
      {
           echo "<li>";
// modcod,modnam,modnum,modprc,tecnam,cmpnam,moddsc,modavlsts,pic
    echo "<div class=imgbox><img src=mobpics/".$arr[$i][8]." height=140px width=140px ></div>";
     echo "<div class=right-part >";
    echo "<b><a href=frmprddet.php?pcod=".$arr[$i][0]." >".$arr[$i][1]."</a></b>";
    echo "<br><i>".$arr[$i][5]."</i>&nbsp;&nbsp;&nbsp;&nbsp;<u>".$arr[$i][4]."</u>";
    echo "<p>".$arr[$i][6]."</p>";
    echo "<b>Price :$".$arr[$i][3]."</b><p>";
    if($arr[$i][7]=='T')
     echo "<a href=frmcrt.php?pcod=".$arr[$i][0]." >Add To Cart</a>";
    else
     echo "Currently Unavailable";
            echo "</p></div></li>";
      }
      }
      ?>
            
            
       
            
            </ul>
          </div>
      </div></div>
      </section>
    </div>
  </div>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-sm-6">&copy; 2016</div>
        <div class="col-sm-6">
          <ul class="socail">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</div>
<!-- wrapper closed --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script>
</body>
</html>
