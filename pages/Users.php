<?php
  if ($_SESSION["User_info"]) {

    $row = $_SESSION["User_info"];
    $userid = $row['User_id'];
    $userquery;
    

    if ($userid != null || $userid != "") {
      
      if (isset($_REQUEST['type'])) {


          $type = $_REQUEST['type'];

          switch ($type) {
            case 'all':
                $userquery = mysql_query("select user.User_id,user.User_Name,user_detail.Image,user_detail.Description from user_detail,user WHERE user.IsActive = 1 AND user.User_id =user_detail.User_id ORDER BY user.User_id DESC");
              
              break;
            
            case 'followers':
              
              $userquery = mysql_query("select user.User_id,user.User_Name,user_detail.Image,user_detail.Description from user_detail,user,followers WHERE user.IsActive = 1 AND user.User_id=followers.FollowedBy AND followers.User_id=".$userid." AND user.User_id =user_detail.User_id ORDER BY user.User_id DESC");
              
              //$follower_user = mysql_query("select FollowedBy  FROM `followers` WHERE IsActive = 1 AND User_id =".$userid);

              break;

            default:
              $userquery = mysql_query("select user.User_id,user.User_Name,user_detail.Image,user_detail.Description from user_detail,user WHERE user.IsActive = 1 AND user.User_id =user_detail.User_id ORDER BY user.User_id DESC");
      
              break;
          }
          $list = mysql_num_rows($userquery);
      }
    }
}
 ?>
<div class="container">

 <!-- Start Info Unit -->
<?php if (isset($_REQUEST["msg"])) { 
echo '<div id="info-unit"> <div class="alert alert-block alert-info fade in">
<button type="button" class="close" data-dismiss="alert">×</button>
<h4 class="alert-heading">'.$_REQUEST["msg"].'</h4>
</div>
</div>';}
?>

 <!-- End Info Unit -->


<div>
 


<div class="row-fluid" >
<div class="span9 main-section">


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
               


<!-- <li class="span3">
<div class="thumbnail">
<img data-src="holder.js/300x200" alt="300x200"  src="">
<div class="caption">
<h6><a href="#">Thumbnail label</a></h6>
<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
</div>
</div>
</li> -->
<?php
        if ($list > 0) {
          while ($Show=mysql_fetch_array($userquery)) {
           if($Show["Description"] != "" && $Show["User_id"] != $userid) { 
            echo '<li class="span3" style="height:300px; overflow:hidden;"><a href="index.php?page=profile&UserView='.trim($Show["User_id"]).'">
              <div class="thumbnail">
              <img data-src="holder.js/140x140" class="img-polaroid" alt="140x140" style="width: 180px; height: 180px;" src="'.U_IMG.$Show["Image"].'">
              
              <div class="caption" style="word-wrap: break-word; width:inherit; overflow:hidden;">
              <h4><a href="index.php?page=profile&UserView='.trim($Show["User_id"]).'">'.$Show["User_Name"].'</a></h4>
              <p style="height:18px;">'.$Show["Description"].'.</p>
              </div>
              </div></a>
              </li>';
            
            }
            
          }
        }

    
    
  
 ?>

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

 <!-- End Left Section -->

 