<?php
session_start();
include_once '../buslogic.php';
if(isset($_REQUEST["pcod"]))
{
    $obj=new clsmod();
    $obj->modcod=$_SESSION["mcod"];
    $obj->modmanpiccod=$_REQUEST["pcod"]; 
    $obj->update_rec();
}
if(isset($_POST["btnsub"]))
{
    $obj=new clsmodpic();
    $obj->modpicmodcod=$_SESSION["mcod"];
    $obj->modpicpic=$_FILES["filupl"]["name"];
    $obj->modpicdsc=$_POST["txtdsc"];
    $obj->save_rec();
    if($_FILES["filupl"]["name"]!=="")
    {
        move_uploaded_file($_FILES["filupl"]["tmp_name"],"../mobpic/".$_FILES["filupl"]["name"]);
    }
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
                echo $obj->modnam."pictures";
            ?>
            </h3>
              
       <form method="Post" action="frmmobpic.php" enctype="multipart/form-data" >
     <table border="2" width="100%">
         <tr>
             <td>Browse Picture</td>
             <td>
                 <input type="file" name="filupl" />
             </td>
         </tr> 
         <tr>
             <td>Description</td>
             <td><textarea name="txtdsc" row="5" cols="70"></textarea></td>
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
        if(isset($_SESSION["mcod"])) 
        {
            $obj=new clsmodpic();
            $arr=$obj->disp_rec($_SESSION["mcod"]);
            echo '<table border="5">';
            for($i=0;$i<count($arr);$i++)
            {
               if($i==0 || $i%3==0)//yeh method picture ki formating ka lea ek row ma esma 3picture he aaygi
                  echo "<tr>";
                echo "<td><img src=../mobpic/".$arr[$i][2]." height=130px width=130px />";
                echo "<br>".$arr[$i][3]."<br>";
                echo "<a href=frmmobpic.php?pcod=".$arr[$i][0]." >set as main picture</a>";
                echo "</td>";
                if($i!=0 && $i%2==0)
                    echo "</tr>";
               
            }
             echo '</table>';
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
