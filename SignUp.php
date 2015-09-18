<?php
    session_start();
  if(isset($_SESSION["User_info"]))
  {
    
    header("location:index.php?msg=Welcome Back");
  }

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
    <link href="assets/css/bootstrap.html" rel="stylesheet">
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

.error-form{
    
}

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

      <form class="form-signin" action="<?php echo 'index.php?action=Reg_User' ?>" method="post">

<img src="assets/img/logo-cs.png">
        <h2 class="form-signin-heading">Register it's Free<span >Already a user? <a href="login.php">Login</a></span></h2>


        <?php
if(isset($_REQUEST["error_msg"]))
{
    //$msg = $_REQUEST["error_msg"];
    echo '<div id="info-unit error-form"> <div class="alert  alert-info fade in" style="border:1px solid red;">'.$_REQUEST["error_msg"].'</div></div>';
}
?>

        <input id="Username" name="username" type="text" class="input-block-level error-form" placeholder="Username"  required>

        <input id="email" name="email" type="email" class="input-block-level" placeholder="Email address" required>
        <input id="password" name="password" type="password" class="input-block-level" placeholder="Password " required>
        <input id="confirm" name="confirm" type="password" class="input-block-level" placeholder="Confirm Password" onfocusout="passcheck()" required>
        <label class="checkbox">
          <input id="legacy" name="accept" type="checkbox" value="remember-me" required> I Agree , For Terms Conditions
        </label>
        <br>
        <button class="btn btn-medium" type="submit" OnClick="spinner()" ><i id="submit" class=" ast-alt icon-spin"></i> Submit</button>
      </form>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
        function passcheck(){
            var password1 = document.getElementById('password').value;
            var password2 = document.getElementById('confirm').value;

            if (password1 == password2) {
                //window.alert("Hello");
                
            }
            else{
                window.alert("Password Does't Match !");
            };

        }
        function spinner()
        {
            var SubmitButton = document.getElementById('submit');
            if (SubmitButton.indexOf("icon-spinner") != -1) {

                SubmitButton.className='ast-alt icon-spin ';
            }
            else{
                SubmitButton.className='ast-alt icon-spin icon-spinner';
            };
            
            
        }
        
    </script>
    
    <script src="../assets/js/jquery.html"></script>
    <script src="../assets/js/bootstrap-transition.html"></script>
    <script src="../assets/js/bootstrap-alert.html"></script>
    <script src="../assets/js/bootstrap-modal.html"></script>
    <script src="../assets/js/bootstrap-dropdown.html"></script>
    <script src="../assets/js/bootstrap-scrollspy.html"></script>
    <script src="../assets/js/bootstrap-tab.html"></script>
    <script src="../assets/js/bootstrap-tooltip.html"></script>
    <script src="../assets/js/bootstrap-popover.html"></script>
    <script src="../assets/js/bootstrap-button.html"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.html"></script>
    <script src="../assets/js/bootstrap-typeahead.html"></script>

  </body>


</html>
