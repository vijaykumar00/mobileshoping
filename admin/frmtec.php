<?php
include_once '../buslogic.php';
if(isset($_REQUEST["tcod"]))
{
    if($_REQUEST["mod"]=='D')
    {
        $obj=new clstec();
        $obj->teccod=$_REQUEST["tcod"];
        $obj->delete_rec();
    }
    else  
    {
       $obj=new clstec();
       $obj->teccod=$_REQUEST["tcod"];
       $obj->find_rec();
       $tecnam=$obj->tecnam;
    }
}
if(isset($_POST["btnsub"]))
{
    $obj=new clstec();
    $obj->tecnam=$_POST["t1"];
    $obj->save_rec();
}
?>
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
        <li class="active"><a href="frmtec.php">Technology</a></li>
        <li><a href="frmcmp.php">Compony</a></li>
        <li><a href="frmnewmod.php">Add new model</a></li>
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
  <div class="about-content">    <div class="heading"><h3>Technology</h3><br>
      <form action="frmtec.php" method="POST">
          <table border="5" width="100%" height="100px">
              <tr>
                  <td>Technology</td>
                  <td>
                      <input type="text" name="t1" value="<?php if(isset($tecnam)) echo $tecnam;?>"/>
                  </td>
              </tr>
              <tr>
                  <td></td>
                  <td>
                      <?php
                      if(isset($_REQUEST["tcod"]))
                          echo "<input type=submit name=btnupd value=update>";
                      else 
                          echo "<input type=submit name=btnsub value=submit>";
                      ?>
                       <input type="submit" name="button" value="cancel" />
                  </td>
              </tr>
          </table>
          </div>
          <?php
          $obj=new clstec();
          $arr=$obj->disp_rec();
          if(count($arr)>0)
          {
              echo "<table border=2 width=100%>";
              echo "<tr><th>s.no</th><th>Technology name</th></tr>";
              for($i=0;$i<count($arr);$i++)
              {
                  $c=$i+1;
                  echo "<tr><td> ".$c." </td>";
                  echo "<td> ".$arr[$i][1]." </td>";
                  echo "<td><a href=frmtec.php?tcod=".$arr[$i][0]."&mod=E>Edit</a>";
                  echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                  echo "<a href=frmtec.php?tcod=".$arr[$i][0]."&mod=D>Delete</a></td>";
                  echo "</tr>";
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

