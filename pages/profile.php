<?php 
  $View_user_id;
  if (isset($_REQUEST['UserView'])) {

    $View_user_id = $_REQUEST['UserView'];
  }else{

      $View_user_id = $row["User_id"];
  }

  $profile_data;
  $followers;
  $following;
  if (isset($View_user_id)) {

        $query = mysql_query("select * FROM user_detail WHERE User_id =".$View_user_id."");
        $count = mysql_num_rows($query);
        if ($count > 0) {

              $profile_data = mysql_fetch_array($query);

              $getfollowers = mysql_query("select COUNT(FollowedBy) FROM followers WHERE IsActive=1 AND User_id=".trim($View_user_id));
              $followers = mysql_fetch_row($getfollowers);

              $getfollowing = mysql_query("select COUNT(User_id) FROM followers WHERE IsActive=1 AND FollowedBy=".trim($View_user_id));
              $following = mysql_fetch_row($getfollowing);

          // if ($profile_data["User_id"] != $row["User_id"]) {

          //     header('location:index.php?action=user_logout');
          // }
          // else{
               $_SESSION["user_detail"] = $profile_data;
          // }

        }

    
  }
  

 ?>


<div class="container">

 <!-- Start Info Unit -->
<?php if (isset($_REQUEST["msg"])) {
  echo '
<div id="info-unit"> <div class="alert alert-block alert-info fade in">
<button type="button" class="close" data-dismiss="alert">×</button>
<h4 class="alert-heading">'.$_REQUEST["msg"].'</h4>
<p></p>
</div>
</div>';
} ?>
 <!-- End Info Unit -->

<div class="page-header">
  <?php
              if ($profile_data["User_id"] == $row["User_id"]) {
                echo '<h4><small> Welcome , </small> '.strtoupper($row["User_Name"]).'<small> to your\'s Profile.</small></h4>';
              }
              else{
                echo '<h4><small> Welcome to </small> '.strtoupper($profile_data["First_Name"]).'\'s<small> Profile.</small></h4>';
              }
              ?>
  
</div>

<div class="row-fluid">

  <div class="span9 ">
    <br/>

    <div class="row">
      <div class="span2 offset1">
    <img src="<?php if(isset($profile_data)){ echo "".U_IMG.$profile_data["Image"]; } ?>" alt="" class="center-block img-circle img-thumbnail img-responsive">
      </div>
      <div class="span7 offset1">
        <h2><?php if(isset($profile_data)){ echo "".$profile_data["First_Name"]."  ".$profile_data["Last_Name"]; } ?></h2>
              <p><strong>About: </strong> <?php if(isset($profile_data)){ echo "".$profile_data["Description"]; } ?> </p>
              <!-- <p><strong>Hobbies: </strong> Read, out with friends, listen to music, draw and learn new things. </p> -->
              <p><strong>Skills: </strong>
                <?php 
                  $query = mysql_query("select skills.Skill_Name FROM skills,skill_map WHERE skill_map.IsActive=1 AND skills.id = skill_map.Skill_id AND skill_map.User_id =".$View_user_id);
                  $count = mysql_num_rows($query);
                  if ($count > 0) { 
                    
                    while($fetch_skill=mysql_fetch_array($query))
                    {
                      echo '&nbsp; <span class="label label-info tags" >'.$fetch_skill["Skill_Name"].'</span>';
                    }     
                  }                        
                ?>
              </p>
      </div>

    </div>
    <hr>
    <div class="row">
      
          <div class="clearfix"></div>
            <div class="span3 offset1 pagination-centered">
              <h2><strong><?php if(isset($following)){ echo "".$following[0]; } ?></strong></h2>
              <p><small>Following</small></p>
              <?php
              if ($profile_data["User_id"] == $row["User_id"]) {
                echo '<a href="'.PG.'updateprofile.php" data-jkit="[lightbox]" style="text-decoration:none;" title="Update Profile">
                  <button class="btn btn-info btn-block"><i class="icon-refresh"></i> Update Profile </button>
              </a>';
              }
              else{
                echo '<button class="btn btn-info btn-block"><i class="icon-plus"></i> vacant </button>';
              }
              ?>
              
            </div>
            
            <!--/col-->
            <div class="span4  pagination-centered ">
              <h2><strong id="ShowFollwer"> <?php if(isset($followers)){ echo "".$followers[0]; } ?> </strong></h2>
              <p><small>Followers</small></p>
              
              <?php
              if ($profile_data["User_id"] == $row["User_id"]) {
                echo '<a href="index.php?page=User_all&type=followers" style="text-decoration:none;"><button  class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> View Followers </button></a>';
              }
              else{
                $CheckQuery = mysql_query("select * from followers where `IsActive`=1 AND User_id=".$profile_data["User_id"]." AND FollowedBy=".$row["User_id"]."");
                $showFollow;
                if (mysql_num_rows($CheckQuery) > 0) {
                  $showFollow = '<i class="icon-minus"></i> Unfollow';
                }
                else{
                  $showFollow = '<i class="icon-plus"></i> Follow';
                }
                echo '<button id="follow_btn"  class="btn btn-success btn-block">'.$showFollow.' </button>';
                echo '<input type="hidden" id="followed" value="'.$profile_data["User_id"].'" > 
              <input type="hidden" id="folloedBy" value="'.$row["User_id"].'" >';
              }
              ?>
              <!-- <p id="Follow_btn">Hello</p> -->
              
            </div>
            <!--/col-->
            <div class="span3  pagination-centered">
              <h2><strong>43</strong></h2>
              <p><small>Tutorials</small></p>
              <?php
              if ($profile_data["User_id"] == $row["User_id"]) {
                echo '<a href="'.PG.'UploadVideo.php" data-jkit="[lightbox]" style="text-decoration:none;" title="Upload New Tutorial">
                <button type="button" class="btn btn-primary btn-block"><i class="icon-upload"></i> Upload New </button>
                 </a>';
              }
              else{
                echo '<button class="btn btn-primary btn-block"><i class="icon-view"></i> View All  </button>';
              }
              ?>
                
            </div>

    </div>
    <hr>



<div class="row-fluid" >
<div class="span12 main-section">

 <!-- Options bar (Left Section) -->

<div class="options-bar"><select class="span2 pull-left"><option>Sort By </option>
  <option>Date</option>
  <option>Popular</option>
  <option>Highest Rating</option>
  <option>Lowest Rating</option>
</select><span><strong>12,487</strong> Titles Found</span>
</div>

 <!-- End Options Bar -->


 <!-- Start Left Section -->

      <div class="row-fluid">
            <ul class="thumbnails">
               


<li class="span3">
<div class="thumbnail">
<img data-src="holder.js/300x200" alt="300x200"  src="http://placehold.it/300x400">
<div class="caption">
<h6><a href="#">Thumbnail label</a></h6>
<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
</div>
</div>
</li>


<li class="span3">
<div class="thumbnail">
<img data-src="holder.js/300x200" alt="300x200"  src="http://placehold.it/300x400">
<div class="caption">
<h6><a href="#">Thumbnail label</a></h6>
<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
</div>
</div>
</li>

<li class="span3">
<div class="thumbnail">
<img data-src="holder.js/300x200" alt="300x200"  src="http://placehold.it/300x400">
<div class="caption">
<h6><a href="#">Thumbnail label</a></h6>
<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
</div>
</div>
</li>

<li class="span3">
<div class="thumbnail">
<img data-src="holder.js/300x200" alt="300x200"  src="http://placehold.it/300x400">
<div class="caption">
<h6><a href="#">Thumbnail label</a></h6>
<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
</div>
</div>
</li>

<li class="span3">
<div class="thumbnail">
<img data-src="holder.js/300x200" alt="300x200"  src="http://placehold.it/300x400">
<div class="caption">
<h6><a href="#">Thumbnail label</a></h6>
<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
</div>
</div>
</li>

<li class="span3">
<div class="thumbnail">
<img data-src="holder.js/300x200" alt="300x200"  src="http://placehold.it/300x400">

                 <div class="caption">
                    <h6><a href="#">Thumbnail label</a></h6>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                  </div>
                </div>
              </li>



                   <li class="span3">
                <div class="thumbnail">
<img data-src="holder.js/300x200" alt="300x200"  src="http://placehold.it/300x400">

                <div class="caption">
                    <h6><a href="#">Thumbnail label</a></h6>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                  </div>
                </div>
              </li>


                   <li class="span3">
                <div class="thumbnail">
<img data-src="holder.js/300x200" alt="300x200"  src="http://placehold.it/300x400">

                   <div class="caption">
                    <h6><a href="#">Thumbnail label</a></h6>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                  </div>
                </div>
              </li>




  <li class="span3">
                <div class="thumbnail">
<img data-src="holder.js/300x200" alt="300x200"  src="http://placehold.it/300x400">

               <div class="caption">
                    <h6><a href="#">Thumbnail label</a></h6>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                  </div>
                </div>
              </li>




                   <li class="span3">
                <div class="thumbnail">
<img data-src="holder.js/300x200" alt="300x200"  src="http://placehold.it/300x400">

                 <div class="caption">
                    <h6><a href="#">Thumbnail label</a></h6>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                  </div>
                </div>
              </li>



                   <li class="span3">
                <div class="thumbnail">
<img data-src="holder.js/300x200" alt="300x200"  src="http://placehold.it/300x400">

                <div class="caption">
                    <h6><a href="#">Thumbnail label</a></h6>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                  </div>
                </div>
              </li>


                   <li class="span3">
                <div class="thumbnail">
<img data-src="holder.js/300x200" alt="300x200"  src="http://placehold.it/300x400">

                   <div class="caption">
                    <h6><a href="#">Thumbnail label</a></h6>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                  </div>
                </div>
              </li>

</ul>
</div>

<div class="pagination pagination-small pull-right">
              <ul>
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div>


  </div>
</div>
 <!-- End Left Section -->
</div>
