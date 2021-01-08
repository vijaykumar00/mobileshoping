<?php
session_start();
include_once '../buslogic.php';
if(isset($_POST["btnsub"]))
{
    $obj=new clsmodfet();
    $obj->modfetmodcod=$_SESSION["mcod"];
    $obj->modfetfetcod=$_POST["drpfet"];
    $obj->modfetdsc=$_POST["txtdsc"];
    $obj->save_rec();
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
        <li><a href="../index.php">Home</a></li>
        <li><a href="frmfet.php">Features</a></li>
        <li><a href="frmtec.php">Technologies</a></li>
        <li><a href="frmcmp.php">Companies</a></li>
        <li class="active"><a href="frmnewmod.php">Add New Model</a></li>
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
  <div class="about-content">    
      <div class="heading">
        <h3>
            <?php
            if(isset($_REQUEST["mcod"]))
                $_SESSION["mcod"]=$_REQUEST["mcod"];
                $obj=new clsmod();
                $obj->modcod=$_SESSION["mcod"];
                $obj->find_rec();
                echo $obj->modnam."features"
            ?>
        </h3>
      
      <form method="POST" action="frmmobfet.php" >
     <table border="2" width="100%">
         <tr>
             <td>select feature</td>
             <td>
                 <select name="drpfet">
                     <?php
                     $obj=new clsfet();
                     $arr=$obj->disp_rec();
                     for($i=0;$i<count($arr);$i++)
                     {
                         echo "<option value=".$arr[$i][0]." />".$arr[$i][1];
                     }
                     ?>
                 </select>
             </td>
         </tr>
         <tr>
             <td>Description</td>
             <td>
                 <textarea name="txtdsc" row="5" cols="70" ></textarea>
             </td>
         </tr>
         <tr>
             <td></td>
             <td>
                 

                 <input type="submit" name="btnsub" value="submit" />
             </td>
         </tr>
     </table>
          </div>
     <?php
        $obj=new clsmodfet();
        $arr=$obj->disp_rec($_SESSION["mcod"]);
        echo "<table width=100%><tr>";
        echo "<th>Features</th><th>Description</th></tr>";
        for($i=0;$i<count($arr);$i++)
        {
            echo "<tr><td>".$arr[$i][3]."</td>";
            echo "<td>".$arr[$i][2]."</td>";
            echo "</tr>";
        }
      ?>
 </form>
    </div></div>
  </div></div>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-sm-6">&copy; 2018</div>
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
