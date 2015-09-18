<!-- Start Right Section -->

  <div id="side-section" class="span3">
  <ul class="nav nav-list">
                <li class="nav-header">filter by</li>
                <li class="active"><a href="#"><i class="icon-time"></i> Recently added</a></li>
                <li><a href="#"><i class="icon-heart-empty"></i> Most Popular</a></li>
                <li><a href="#"><i class="icon-star-empty"></i> Highest Rating</a></li>
              </ul>


<!-- <div class="module-top"><i class="icon-lock"></i> Quick Login</div>
<div class="module">
<form method="post" action="http://wbpreview.com/previews/WB0M61R7N/index.htm?" data-jkit="[form:validateonly=true]">
  <fieldset>
    <label class="label-main">Username</label>
    <input name="miniusername" class="span10" id="miniusername"  type="text" data-jkit="[validate:required=true;min=3;max=10;error=Please enter your username (3-10 characters)]">
    <label class="label-main">Password</label>
    <input name="miniusername" class="span10" id="miniusername"  type="text" data-jkit="[validate:required=true;min=3;max=10;error=Please enter your username (3-10 characters)]">
<p><label class="checkbox"><input type="checkbox">remember me</label></p>
    <button name="send" type="submit" value="Submit"  class="btn btn-small">Login</button>
  </fieldset>
</form></div> -->

 

<?php
  if ($_SESSION["User_info"]) {
    echo '<div class="module-top"><i class="icon-user"></i> Latest Users</div>
<div class="module">
<ul class="comment-list">';
    $row = $_SESSION["User_info"];
    $userid = $row['User_id'];

    if ($userid != null || $userid != "") {
      $userquery = mysql_query("select user.User_id,user.User_Name,user_detail.Image,user_detail.Description from user_detail,user WHERE user.IsActive = 1 AND user.User_id =user_detail.User_id ORDER BY user.User_id DESC LIMIT 20");
      $list = mysql_num_rows($userquery);
        if ($list > 0) {
          $limiter=0;
          while ($Show=mysql_fetch_array($userquery)) {
           if($Show["Description"] != "" && $Show["User_id"] != $userid && $limiter < 5) { echo '<li class="comment"> <a href="index.php?page=profile&UserView='.trim($Show["User_id"]).'">      
          <div class="comment-body">
          <h4 class="comment-heading">'.$Show["User_Name"].'<span class="time"><img src="'.U_IMG.$Show["Image"].'" style="width:40px; height:40px;" class="img-circle img-thumbnail img-responsive"></span></h4>
          <p>'.$Show["Description"].'.</p>
          </div></a>
          </li>';  $limiter++;}
            
          }
        }

    }
    echo '</ul>
</div>';
  }
 ?>
<!-- <li class="comment">         
<div class="comment-body">
<h4 class="comment-heading">Comment title <span class="time"><img src="images/Users/default.png" style="width:50px; height:50px;"></span></h4>
<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at.</p>
</div>
</li>
<li class="comment">         
<div class="comment-body">
<h4 class="comment-heading">Comment title <span class="time">4:34am</span></h4>
<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at.</p>
</div>
</li><li class="comment">         
<div class="comment-body">
<h4 class="comment-heading">Comment title <span class="time">4:34am</span></h4>
<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at.</p>
</div>
</li><li class="comment">         
<div class="comment-body">
<h4 class="comment-heading">Comment title <span class="time">4:34am</span></h4>
<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at.</p>
</div>
</li> -->

</div>
</div>
<hr>
</div>
</div>