<?php
session_start();
include_once '../buslogic.php';
if(isset($_REQUEST["ccod"]) && isset($_REQUEST["tcod"]))
{
    $_SESSION["ccod"]=$_REQUEST["ccod"];
    $_SESSION["tcod"]=$_REQUEST["tcod"];
}
?>
<!DOCTYPE html>
<html>
<head>
    <script language="javascript">
    function abc(a,b)
    {
        if(b=='C')
        {
    var t=document.getElementById("drptec").value;
    window.location="frmsrcmod.php?ccod="+a+"&tcod="+t;
        }
        else
        {
     var t=document.getElementById("drpcmp").value;
    window.location="frmsrcmod.php?ccod="+t+"&tcod="+a;        
        }
    }
    </script>
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
        <li><a href="frmnewmod.php">Add New Model</a></li>
        <li class="active"><a href="frmnewmod.php">search model's</a></li>
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
      <div class="heading"><h3>Search Models</h3><div>
 <form method="Post" action="frmsrcmod.php" >
     <table border="2" width="100%">
         <tr>
             <td>Select Company</td>
             <td>
                 <select id="drpcmp" name="drpcmp" onchange="abc(this.value,'C');">
                  <?php   
                     $obj=new clscmp();
                     $arr=$obj->disp_rec();
                     for($i=0;$i<count($arr);$i++)
                     {
            if(isset($_SESSION["ccod"]) && $_SESSION["ccod"]==$arr[$i][0])
              echo "<option value=".$arr[$i][0]." selected/>".$arr[$i][1];
            else
                 echo "<option value=".$arr[$i][0]."  />".$arr[$i][1];
                     }
                     ?>
                 </select>
             </td>
         </tr>
           <tr>
             <td>Select Technology</td>
             <td>
      <select id="drptec" name="drptec" onchange="abc(this.value,'T');">
                  <?php   
                     $obj=new clstec();
                     $arr=$obj->disp_rec();
                     for($i=0;$i<count($arr);$i++)
                     {
              if(isset($_SESSION["tcod"]) && $_SESSION["tcod"]==$arr[$i][0])
              echo "<option value=".$arr[$i][0]." selected />".$arr[$i][1];   
              else
              echo "<option value=".$arr[$i][0]." />".$arr[$i][1];
                     }
                     ?>
                 </select>
             </td>
         </tr>
     </table>
     <?php
 if(isset($_SESSION["ccod"]) && isset($_SESSION["tcod"]))
 {
     $obj=new clsmod();
     $arr=$obj->srcmod($_SESSION["ccod"], $_SESSION["tcod"]);
  echo "<table border=2 width=100% >";
  for($i=0;$i<count($arr);$i++)
  {
     echo "<tr><td width=150px >";
     //modcod,modnam,modnum,moddsc,modprc,modavlsts, pic
     if($arr[$i][6]=='') 
 echo "<img src=../mobpic/nopic.jpg height=120px width=120px />";
else 
 echo "<img src=../mobpic/".$arr[$i][6]." height=100px width=100px />";
   echo "</td><td>";
    echo "<h2>".$arr[$i][1]."(".$arr[$i][2].")"."</h2>";
    echo "<b>Cost :Rs.".$arr[$i][4]."</b>";
    echo "<p>".$arr[$i][3]."</p>";
    echo "<a href=frmmobfet.php?mcod=".$arr[$i][0]." >Add Features</a>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "<a href=frmmobpic.php?mcod=".$arr[$i][0]." >Add Pictures</a>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "<a href=frmdis.php?mcod=".$arr[$i][0]." >Set on Discount</a>";
   echo "</td></tr>";
  }
  echo "</table>";
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
