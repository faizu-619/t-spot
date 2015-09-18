<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from wbpreview.com/previews/WB0M61R7N/index.htm by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Jul 2015 19:24:27 GMT -->
<head>
    <meta charset="utf-8">
    <title>T-Spot - A New way for learning ! </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Include CSS Assets -->

    <link href="assets/css/jkit.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.html">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.html">
    <link rel="shortcut icon" href="../assets/ico/favicon.html">

  </head>

  <body>

<!-- Start Header -->

<div id="header">
    <div class="navbar navbar-static-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
         <a href="#"> <h1>.</h1></a>
          <div class="nav-collapse collapse">
            <form class="navbar-form pull-left">
				<div class="input-append">
  				<input class="span3" id="appendedInputButtons" type="text">
  				<button class="btn btn-primary" type="button"><i class="icon-search"></i></button>
				</div>           
			</form>
            <ul class="nav">
              <li class="active"><a href="index.php?page=home">Home</a></li>
              <li><a href="index.php?page=User_all&type=all">All Users</a></li>
              <li><a href="#">Music</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Features <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="404.html">404 Page</a></li>
                  <li><a href="page-elements.htm">Page elements</a></li>
                  <li><a href="login.html">Login Page</a></li>
                  <li><a href="register.htm">Register Page</a></li>
                  <li><a href="pricing-plans.html">Pricing Plans</a></li>
                </ul>
              </li>
            </ul>
            <?php 
              //session_start();
              if(isset($_SESSION["User_info"]))
              {
                $row = $_SESSION["User_info"];

                echo '<ul class="nav" style="float:right;">
                  <li class="dropdown active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$row["User_Name"].' <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="index.php?page=profile">Profile</a></li>
                      <li><a href="">Page </a></li>
                      <li><a href="">Login Page</a></li>
                      <li><a href="">Register Page</a></li>
                      <li><a href="index.php?action=user_logout">Logout</a></li>
                    </ul>
                  </li>
                </ul>';
              }
              else{
                echo '<p class="navbar-text pull-right">
                      <a href="login.php" class="navbar-link">login</a> or <a href="SignUp.php"   class="navbar-link">register</a>
                      </p> ';
              }

            ?>
            
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
 </div>

 <!-- End Header -->
