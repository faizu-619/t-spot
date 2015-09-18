<?php 
  include_once("../include/config.php");
  //session_start();
  $User_basic;
  $user_detail;

  if (isset($_SESSION["User_info"]) && isset( $_SESSION["user_detail"])) {

        $User_basic = $_SESSION["User_info"];
        $user_detail =  $_SESSION["user_detail"];

          if ($user_detail["User_id"] != $User_basic["User_id"]) {
              echo "<script> top.location = '../index.php?page=user_logout'; </script>";
              die("Invalid User...");
          }
          else{

          }

        
  }
  else{
    //header('"location:'.INC.'controller.php?action=user_logout');
    echo "<script> top.location = '../index.php?page=user_logout'; </script>";
    die();              
  }

?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../assets/profile/css//bootstrap-3.2.0.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/profile/css/font-awesome-4.1.0.min.css">

  
</head>
<body>
<div class="container" style="padding-top: 0px;">
  <h1 class="page-header">Update Profile </h1>
  <div class="row">
    <!-- left column -->
    <form class="form-horizontal" role="form" action="<?php echo '../index.php?action=update_image'; ?>" method="post" enctype="multipart/form-data">
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="<?php if(isset($user_detail)){ echo "../".U_IMG.$user_detail["Image"]; } ?>" class="center-block  img-thumbnail img-responsive" alt="avatar">
        <h6>Upload a New photo...</h6>
        <input id="profile-image" name="U_image" type="file" class="text-center center-block well well-sm">
        <input type="hidden" name="User_id" value="<?php if(isset($User_basic)){ echo "".$User_basic["User_id"]; } ?>" >
      </div>
      <div class="text-right">
        <input class="btn btn-primary" value="Update Avatar" type="submit" name="submit_btn">
      </div>
    </div>
   </form>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <?php
        if (isset($_REQUEST['error_msg'])) {
          echo '<div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="icon-error"></i>
         <strong>'.$_REQUEST["error_msg"].'</strong>.
      </div>';
        }

      ?>
      <h3>Personal info</h3>
      <form class="form-horizontal" role="form" action="<?php echo '../index.php?action=Update_info'; ?>" method="post">
        <input type="hidden" name="User_id" value="<?php if(isset($User_basic)){ echo "".$User_basic["User_id"]; } ?>" >
        <div class="form-group">
          <label class="col-lg-3 control-label">First name: </label>
          <div class="col-lg-8">
            <input class="form-control" name="F_Name" value="<?php if(isset($user_detail)){ echo "".$user_detail["First_Name"]; } ?>" type="text" placeholder="Enter First Name ">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Last name:</label>
          <div class="col-lg-8">
            <input class="form-control" name="L_Name" value="<?php if(isset($user_detail)){ echo "".$user_detail["Last_Name"]; } ?>" type="text" placeholder="Enter Second Name ">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">About :</label>
          <div class="col-lg-8">
            <textarea class="form-control" name="description" type="text" placeholder="Enter About you"><?php if(isset($user_detail)){ echo "".$user_detail["Description"]; } ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Skills :</label>
          <div class="col-lg-8">

                <?php
                if (isset($user_detail)) {
                  
                
                  $query = mysql_query("select * FROM skills WHERE IsActive = 1");
                  $count = mysql_num_rows($query);

                  if ($count > 0) { 

                  while($row=mysql_fetch_array($query))
                  {     
                    $a = false;   
                    $query2 = mysql_query("select skills.Skill_Name FROM skills,skill_map WHERE skill_map.IsActive=1 AND skills.id = skill_map.Skill_id AND skill_map.User_id =".$user_detail["User_id"]);
                     $count2 = mysql_num_rows($query2);
                    if ($count2 > 0) {
                        
                        //echo '<script>window.alert("'.$row["Skill_Name"].' Overall Skills")</script>';
                        while ($skill = mysql_fetch_row($query2)) {

                            if ($skill[0] == $row["Skill_Name"]) {
                            //echo '<script>window.alert("'.$skill[0].' USer true")</script>';
                            echo '&nbsp; <span class="label label-info tags"><input type="checkbox" id="selected_Skill" name="skills[]" style="top-margin:15px;" value="'.$row["id"].'" checked >'.$row["Skill_Name"].'</span>';
                            $a = true;
                            break;
                            }

                            // else
                            // {
                            //    // echo '<script>window.alert("'.$skill[0].' USer false")</script>';
                            //     echo '&nbsp; <span class="label label-info tags"><input type="checkbox" style="top-margin:15px;" value="option1"  >'.$row["Skill_Name"].'</span>';
                            // }
                            
                        }
                         
                     }
                     if ($a == false) {
                         echo '&nbsp; <span class="label label-info tags"><input type="checkbox" id="selected_Skill" name="skills[]" style="top-margin:15px;" value="'.$row["id"].'"  >'.$row["Skill_Name"].'</span>';
                    }
                  }
              }
            }
                ?>
                <!-- <span class="label label-info tags" ><input type="checkbox" style="top-margin:15px;" value="option1" checked>Checkbox1</span>
                <span class="label label-info tags" ><input type="checkbox" style="top-margin:15px;" value="option1" checked>Checkbox2</span>
                <span class="label label-info tags" ><input type="checkbox" style="top-margin:15px;" value="option1" checked>Checkbox3</span>
                <span class="label label-info tags" ><input type="checkbox" style="top-margin:15px;" value="option1" checked>Checkbox4</span>
                <span class="label label-info tags" ><input type="checkbox" style="top-margin:15px;" value="option1" checked>Checkbox5</span> -->
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php if(isset($User_basic)){ echo "".$User_basic["Email"]; } ?>" type="text" disabled>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-md-3 control-label">Username:</label>
          <div class="col-md-8">
            <input class="form-control" value="<?php if(isset($User_basic)){ echo "".$User_basic["User_Name"]; } ?>" type="text" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Password:</label>
          <div class="col-md-8">
            <input class="btn btn-info" value="Request For Password Change" type="button">
          </div>
        </div>
        <!-- <div class="form-group">
          <label class="col-md-3 control-label">Confirm password:</label>
          <div class="col-md-8">
            <input class="form-control" value="11111122333" type="password">
          </div>
        </div> -->
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Save Changes" type="submit">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



<script src="../assets/profile/js/jquery.js"> </script>
<script src="../assets/profile/js/bootstrap.min.js"> </script>
<script>
  $("input[type='checkbox']").on('click', function(){
   // var checked = $(this).attr('checked');
   // if(checked){
      var value = $(this).val();
      $.post('../index.php?action=skills_update&', { value:value , Userid:<?php echo $User_basic["User_id"]; ?> }, function(data){
          // data = 0 - means that there was an error
          // data = 1 - means that everything is ok
          if(data == 1){
             location.reload();
             //alert('Data was saved in db!');
          }
          else{
            //alert('Data was not saved in db!');
            location.reload();
          }
      });
   // }
});
 </script>
<script type="text/javascript">
    var infolinks_pid = 2113816;
    var infolinks_wsid = 1;
</script>
</body>
</html>