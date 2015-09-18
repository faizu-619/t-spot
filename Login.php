<?php
  session_start();
  if(isset($_SESSION["User_info"]))
  {
    
    header("location:index.php?msg=Welcome Back");
  }

  //include_once("include/config.php");


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>T-Spot - A New way for learning !</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
  <link href="assets/css/jkit.css" rel="stylesheet">

    <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/animate.css" rel="stylesheet">

    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">



    <style type="text/css">
 body {
padding-top: 40px;
padding-bottom: 40px;
background-image:-moz-radial-gradient(50% 50%,circle farthest-side,rgb(82,184,235) 0%,rgba(20,137,182,0.78) 100%); 
background-image:-webkit-gradient(radial,50% 50%,0,50% 50%,154.5,color-stop(0, rgb(82,184,235)),color-stop(1, rgba(20,137,182,0.78)));
background-image:-webkit-radial-gradient(50% 50%,circle farthest-side, rgb(82,184,235) 0%,rgba(20,137,182,0.78) 100%);
background-image:-ms-radial-gradient(50% 50%,circle farthest-side, rgb(82,184,235) 0%,rgba(20,137,182,0.78) 100%);
background-image:radial-gradient(50% 50%,circle farthest-side, rgb(82,184,235) 0%,rgba(20,137,182,0.78) 100%);
-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100,FinishOpacity=78,Style=2)";
filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=100,FinishOpacity=78,Style=2);}

 .form-signin {
 max-width: 500px;
 padding: 130px 29px 29px;
margin: 0 auto 20px;
background-color: transparent;
border: 0px solid #e5e5e5;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
-moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
 box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
.form-signin .form-signin-heading{color:#CAE8F7;margin-bottom: 25px;font-size: 23px;font-weight: 400;margin-bottom: 10px;}
.form-signin a{color: black;font-weight: 400;font-size: 10px;}
.form-signin input[type="text"],
.form-signin input[type="password"] {font-size: 16px;
height: auto;
margin-bottom: 15px;
padding: 7px 9px;
opacity: 0.9;
border: 1px solid #28759B;}
.form-signin span { font-size: 13px;color: white;float: right;}
.form-signin label {color: white;}
.form-signin .btn {font-family: inherit;}



    </style>

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

  <body class="animated fadeIn">

    <div class="container">



      <form class="form-signin" method="post" action="<?php echo 'index.php?action=user_login' ?>" >

<img src="assets/img/logo-cs.png">
        <h2 class="form-signin-heading">Please Login <span >Need to Register? <a href="<?php echo 'SignUp.php' ?>">Click Here</a></span></h2>

        <?php
if(isset($_REQUEST["error_msg"]))
{
    //$msg = $_REQUEST["error_msg"];
    echo '<div id="info-unit error-form"> <div class="alert  alert-info fade in" style="border:1px solid red;">'.$_REQUEST["error_msg"].'</div></div>';
}
?>


<fieldset>
        <input name="usermail" id="miniusername"  type="email" class="input-block-level" placeholder="Email address">
        <input type="password" class="input-block-level" placeholder="Password" name="minipassword" id="minipassword"  class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <br>
        <br>
        <button OnClick="spinner()" name="submit" value="Login"  class="btn btn-medium btn-primary" type="submit"><i id="submit" class=" ast-alt icon-spin"></i> Login</button>
        </fieldset>

      </form>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
    function spinner()
        {
            window.alert("callin");
            var SubmitButton = document.getElementById('submit');
            if (SubmitButton.indexOf("icon-spinner") != -1) {

                SubmitButton.className='ast-alt icon-spin ';
                window.alert("hello world");
            }
            else{
                SubmitButton.className='ast-alt icon-spin icon-spinner';
                window.alert("hello pakistan");
            };
            
            
        }
    </script>
    <script src="assets/js/Custom.js"></script>
     <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
     <script src="assets/js/jquery.jkit.1.1.10.js"></script>
    <script src="assets/js/jquery.easing.1.3.js"></script>
<script type="text/javascript">
    $("[rel=tooltip]").tooltip();
</script>



  </body>


</html>
