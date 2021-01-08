<?php
include_once '../buslogic.php';
session_start();
if(isset($_POST["btnsub"]))
{
    $obj=new clsdis();
    $obj->dismodcod=$_SESSION["mcod"];
    $obj->disper=$_POST["txtdisprc"];
    $obj->disofrstrdat=$_POST["txtstadat"];
    $obj->disofrenddat=$_POST["txtenddat"];
    $obj->save_rec();
    unset($_SESSION["mcod"]);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Business Circle :: Upload</title>
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../css/style.css" rel="stylesheet" type="text/css">
<link href="../css/responsive.css" rel="stylesheet" type="text/css">
<link href="../css/responsive.css" rel="stylesheet" type="text/css">
<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
      <a class="navbar-brand" href="index.html"><img src="../images/logo.png" alt=""/></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.html">Home</a></li>
        <li><a href="frmfet.php">Features</a></li>
        
        <li><a href="frmtec.php">Technology</a></li>
        <li><a href="frmcmp.php">Compony</a></li>
        <li><a href="frmnewmod.php">Add new model</a></li>
        <li class="active"><a href="frmdis.php">Discounts</a></li>
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
  <div class="about-us">
  <div class="about-content">    <div class="heading"><h3>Discount</h3><br>
      <form action="frmdis.php" method="POST">
        <?php
        if(isset($_REQUEST["mcod"]))
        {
            $_SESSION["mcod"]=$_REQUEST["mcod"];
           $obj=new clsmod();
           $obj->modcod=$_SESSION["mcod"];
           $obj->find_rec();
           echo '<table border="5">';
           echo "<tr><td>Model:</td><td>".$obj->modnam."</td></tr>";
           echo "<tr><td>Orignal Price:</td><td>".$obj->modprc."</td></tr>";
           echo "<tr><td>Discount</td><td><input type=text name=txtdisprc/></td></tr>";
           echo "<tr><td>startdate</td><td><input type=text name=txtstadat/></td></tr>";
           echo "<tr><td>enddate</td><td><input type=text name=txtenddat/></td></tr>";
           echo "<tr><td></td><td><input type=submit name=btnsub value=submit /></td></tr>";
           echo '</table>';
        }
        ?>
      </form>
      </div>
    </div></div>
  </div></div>
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


