<?php

// include_once("config.php");
// if (isset($_REQUEST["action"])) {


if(isset($_REQUEST["action"]))
{
	$action=$_REQUEST["action"];
	$row;
	switch($action)
	{
		case "insert_book":
			mysql_query("insert into books(Book_name,Course_id) values('".$_REQUEST["book_title"]."',".$_REQUEST["course"].")");
			header("location:../index.php?page=home");
			break;

		case 'FollowerReq':
			if (isset($_POST['followed']) && isset($_POST['followby'])) {
				//echo "<script>window.alert('Function Called');</script>";
		    $followby = mysql_real_escape_string($_POST['followby']);
		    $User = mysql_real_escape_string($_POST['followed']);

		    $query = mysql_query("select * from followers where User_id=".$User." AND FollowedBy=".$followby."");

		    if (mysql_num_rows($query) > 0) {
		    	while ($getval= mysql_fetch_array($query)) {

		    		if ($getval["IsActive"] == 1) {
		    		$sql ="update followers SET `IsActive`=0 where User_id=".$User." AND FollowedBy=".$followby."";
		    		if ( mysql_query($sql)) {
		    			//print(1);
		    			print('<i class="icon-plus"></i> Follow');
		    		}else {
		       			print(0);
		    		}
			    	}
			    	elseif ($getval["IsActive"] == 0){
			    		$sql ="update followers SET `IsActive`=1 where User_id=".$User." AND FollowedBy=".$followby."";
			    		if ( mysql_query($sql)) {
			    			//print(1);
			    			print('<i class="icon-minus"></i> Unfollow');
			    		}else {
			       			print(0);
			    		}
			    	  }
		    	}
		    	
		    }
		    else{
		    	 $sql = "insert into followers(`User_id`, `FollowedBy`) VALUES(".$User.",".$followby.")";

		    	
		    	if(mysql_query($sql)){
		       		//print(1);
		       		print('<i class="icon-minus"></i> Unfollow');    
		    	} else {
		       	print(0);
		    	}
		    }
		    
		   
			}
			die();
			// if (isset($_REQUEST['followed']) && isset($_REQUEST['folloedBy'])) {

			// 	$query = mysql_query("select `id`,`User_id`,`FollowedBy`,`IsActive` FROM `followers` WHERE User_id='".$_REQUEST['followed']."' AND FollowedBy='".$_REQUEST['folloedBy']."'");
			// 	$count = mysql_num_rows($query);
			// 	//echo '<script> window.alert("UserId ='.trim($_REQUEST['followed']).'  AND FollowedBy='.trim($_REQUEST['folloedBy']).'") </script>';
			// 	if ($count > 0) { 
			// 		while($val=mysql_fetch_array($query))
			// 		{
			// 			echo 'Already';
			// 	//echo '<script> window.alert("'.trim($row['User_id']).'") </script>';
						
			// 		}
			// 		break;
			// 	}
			// 	else
			// 		{
			// 			//echo ''.$_REQUEST['followed'].'=='.$_REQUEST['folloedBy'];
			// 			$addfollower = mysql_query("insert into followers (User_id,FollowedBy) values (".$_REQUEST['followed'].",".$_REQUEST['folloedBy'].") ");
			// 			//$resultrow = mysql_affected_rows($addfollower);
			// 			if ($addfollower) {
			// 				echo ' UnFollow ';
			// 			}
			// 			else{
			// 				echo ' Abee yrrr ';
			// 			}
			// 		}
			// }
			break;

		case 'user_logout':
			
			if (isset($_SESSION["User_info"])) {
				session_unset();
    			session_destroy();
				header("location:Login.php");
				die("");
			}
			break;

		case 'user_login':
			
			if (isset($_REQUEST['usermail']) && isset($_REQUEST['minipassword'])) {
				$usermail = trim($_REQUEST['usermail']);
				$minipassword = trim($_REQUEST['minipassword']);

				$query = mysql_query("select * FROM user WHERE Email ='".trim($usermail)."'");
				$count = mysql_num_rows($query);
				if ($count > 0) {
					
					while($row=mysql_fetch_array($query))
					{
						if($usermail==$row["Email"] && $minipassword==$row["Password"])
						{

							$_SESSION["User_info"] = $row;
							//session_start();
							header("location:index.php?page=home&msg=Welcome ".$row["User_Name"]);
						}
						else
						{
							header('location:Login.php?error_msg=<h6 class="alert-heading" style="color:red;" >Email and password did not match</h6>');
						}
					}
					
					
				}
				else{
					header('location:Login.php?error_msg=<h6 class="alert-heading" style="color:red;" >User not registered</h6>');
					
				}
			}
			else{
				header('location:Login.php?error_msg=<h6 class="alert-heading" style="color:red;" >Invalid login details</h6>');
			}


			break;

		case "Reg_User":

			$msg = "";
			$username;
			$email;
			$password;

			if (isset($_REQUEST['username'])) {
					
				$username = $_REQUEST['username'];
				if ($username != "" && !ctype_space($username)) {
					
					$query = mysql_query("select User_Name FROM user WHERE User_Name ='".trim($username)."'");
					$count = mysql_num_rows($query);
					if ($count > 0) {
						
						$username = "";
						$msg .= '<h6 class="alert-heading" style="color:red;" >Username Already Exist</h6>';
					}
					else{
						
						trim($username);
					}
				}
				else{
					$username = "";
					$msg .= '<h6 class="alert-heading" style="color:red;" >Username Not be Empty </h6>';
				}


				}else{
					$username = "";
					$msg .= '<h6 class="alert-heading" style="color:red;" >Invalid Input in Username </h6>';
				}

				if (isset($_REQUEST['email'])) {

					$email = $_REQUEST['email'];

					if ($email != "" && filter_input(INPUT_POST, 'email' , FILTER_VALIDATE_EMAIL)) {

						$query = mysql_query("select Email FROM user WHERE Email ='".trim($email)."'");
						$count = mysql_num_rows($query);
						if ($count > 0) {

							$email = "";
							$msg .= '<h6 class="alert-heading" style="color:red;" >Email Already Exist</h6>';

						}
						else{
							
							trim($email);
						}
					}
					else{
						
						$msg .= '<h6 class="alert-heading" style="color:red;" >Email Not be Empty </h6>';
						$email = "";
					}
				}else{
					$msg .= '<h6 class="alert-heading" style="color:red;" >Invalid Input in Email </h6>';
					$email = "";
					
				}
				if (isset($_REQUEST['password']) && isset($_REQUEST['confirm'])) {


					$password = trim($_REQUEST['password']);
					$cpassword = trim($_REQUEST['confirm']);

					if ($password == $cpassword) {
						if (strlen($password) >= 6) {
							
						}
						else{
							$msg .= '<h6 class="alert-heading" style="color:red;" > Password were be 6 Or more characters </h6>';
							$password = "";
						}

					}
					else
					{
						$msg .= '<h6 class="alert-heading" style="color:red;" >Password Not Match </h6>';
						$password = "";
					}

				}else{
					$msg .= '<h6 class="alert-heading" style="color:red;" >Invalid Input in Password </h6>';
					$password = "";
				}


				if ($username != "" && $email != "" && $password != "" && $msg == "") {



					if ($_REQUEST['accept'] == true) {
						$query = mysql_query("insert into  user(User_Name, Email, Password) values('".trim($username)."','".trim($email)."','".trim($password)."')");
						//mysql_affected_rows($query);
						if($query) {
							$getid = mysql_query("select User_id from user where Email='".trim($email)."'");
							$Userid = mysql_fetch_row($getid);
							header("location:index.php?action=New_User&User_id=".trim($Userid[0]));
							die();
						}
						
					}
					else
					{
						header('location:SignUp.php?error_msg=<h6 class="alert-heading" style="color:red;" >Forgot to checked on Privacy Policy</h6>');	
					}
					

				}
				else{

					
					header("location:SignUp.php?error_msg=".trim($msg));	

					break;
				}

			break;
		
		case 'update_image':

			     if (isset($_FILES["U_image"])) {
			     	$msg ="";

				 		$target_dir = "Images/Users/";
						$target_file = $target_dir . basename($_FILES["U_image"]["name"]);
						$uploadOk = 1;
						$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						
						// Check if image file is a actual image or fake image
						if(isset($_POST["submit"])) {
						    $check = getimagesize($_FILES["U_image"]["tmp_name"]);
						    if($check !== false) {
						        $msg .= "File is an image - " . $check["mime"] . ".";
								//header("location:../pages/updateprofile.php?error_msg=".trim($msg));	

						        $uploadOk = 1;
						    } else {
						        $msg .= "File is not an image.";
						        
						        $uploadOk = 0;
						    }
						}
						// Check if file already exists
						if (file_exists($target_file)) {
						    $msg .= "Sorry, file already exists.";
						    
						    $uploadOk = 0;
						}
						// Check file size
						if ($_FILES["U_image"]["size"] > 500000) {
						    $msg .= "Sorry, your file is too large.";
						    
						    $uploadOk = 0;
						}
						// Allow certain file formats
						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
						    $msg .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
						    $uploadOk = 0;
						}
						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
						    $msg .= "Sorry, your file was not uploaded.";
						    header("location:pages/updateprofile.php?error_msg=".trim($msg));
						// if everything is ok, try to upload file
						} else {
						    if (move_uploaded_file($_FILES["U_image"]["tmp_name"], $target_file)) {
						        //echo "The file ". basename( $_FILES["U_image"]["name"]). " has been uploaded.";
						        if (isset($_REQUEST["User_id"])) {
						        	$query = mysql_query('update user_detail set Image="'.basename( $_FILES["U_image"]["name"]).'" WHERE User_id = '.$_REQUEST["User_id"].' And IsActive = 1');
				 					//mysql_affected_rows($query);
				 					//header("location:../pages/updateprofile.php?error_msg=Successfull ");
				 					if ($query) {
				 						echo "<script> top.location = 'index.php?page=profile&msg=Successfull Updated..'; </script>";
										die(mysql_error());	
				 					}
						        }
						        else{
						        	die("invalid user");
						        }

						    } else {
						        $msg .= "Sorry, there was an error uploading your file.";
						        header("location:pages/updateprofile.php?error_msg=".$msg);
						    }
						}
				 	}
			     break;

		case 'New_User':
			if (isset($_REQUEST["User_id"])) {

				$userid= $_REQUEST["User_id"];
				//die($userid);
				$check_id = mysql_query("select * from user_detail where User_id=".$userid);
				$count = mysql_num_rows($check_id);
				if ($count > 0) {
					header("location:Login.php");
				}
				else{
					$query = mysql_query("insert into user_detail(User_id) value(".$userid.")");
					if ($query) {
						header("location:Login.php?error_msg=User Registeration Successfull, Please Login");
						die();
					}
					else
					{

					}
				}
			 }
			 break;

		case "Update_info":

				 if (isset($_REQUEST["User_id"])) {

				 	$Userid = $_REQUEST["User_id"];
				 	$Fname= ""; if (isset($_REQUEST["F_Name"])) { $Fname =$_REQUEST["F_Name"]; }
				 	$Lname= ""; if (isset($_REQUEST["L_Name"])) { $Lname =$_REQUEST["L_Name"]; } 
				 	$aboutuser = ""; if (isset($_REQUEST["description"])) { $aboutuser =$_REQUEST["description"]; }
				 	$skills; if (isset($_REQUEST["skills"])) { $skills =$_REQUEST["skills"]; }

				 	$query = mysql_query("select * from user_detail where User_id = ".$Userid." AND IsActive = 1");
				 	
					$count = mysql_num_rows($query);
					if ($count > 0) {

						$update = mysql_query("update user_detail set First_Name='".$Fname."',Last_Name='".$Lname."',Description='".$aboutuser."' where User_id=".$Userid." and IsActive=1");
						//$res = mysql_affected_rows($update);
						if (!$update) {
							header("location:../index.php?page=update_info&msg=Invalid Input.");	
						}
						else{
							//session_start();
							$data = mysql_fetch_array($query);
							$_SESSION["user_detail"] = $data;
							echo "<script> top.location = 'index.php?page=profile'; </script>";
							die();							
							//header("location:../index.php?page=profile&error_msg=Update Successfully..");
						}
					}
				 
					}
			   		break;

		case 'skills_update':

			if (isset($_POST['Userid']) && isset($_POST['value'])) {
				//echo "<script>window.alert('Function Called');</script>";
		    $Skill = mysql_real_escape_string($_POST['value']);
		    $User = mysql_real_escape_string($_POST['Userid']);

		    $query = mysql_query("select * from skill_map where User_id=".$User." AND Skill_id=".$Skill."");

		    if (mysql_num_rows($query) > 0) {
		    	while ($getval= mysql_fetch_array($query)) {

		    		if ($getval["IsActive"] == 1) {
		    		$sql ="update skill_map SET `IsActive`=0 where User_id=".$User." AND Skill_id=".$Skill."";
		    		if ( mysql_query($sql)) {
		    			print(1);
		    		}else {
		       			print(0);
		    		}
			    	}
			    	elseif ($getval["IsActive"] == 0){
			    		$sql ="update skill_map SET `IsActive`=1 where User_id=".$User." AND Skill_id=".$Skill."";
			    		if ( mysql_query($sql)) {
			    			print(1);
			    		}else {
			       			print(0);
			    		}
			    	  }
		    	}
		    	
		    }
		    else{
		    	 $sql = "insert into skill_map(`User_id`, `Skill_id`) VALUES(".$User.",".$Skill.")";

		    	
		    	if(mysql_query($sql)){
		       		print(1);    
		    	} else {
		       	print(0);
		    	}
		    }
		    
		   
			}
			die();
				break;


		case 'upload_video':
				if (isset($_FILES['U_video']) && isset($_REQUEST['title'])) {

				$allowedExts = array('mpg', 'wma', 'mov', 'flv', 'mp4', 'avi', 'qt', 'wmv', 'rm');
				$extension = explode(".", $_FILES["U_video"]["name"]);
				// if ((($_FILES["file"]["type"] == "image/gif")
				// || ($_FILES["file"]["type"] == "image/jpeg")
				// || ($_FILES["file"]["type"] == "image/pjpeg"))
				// && ($_FILES["file"]["size"] < 20000)
				// && in_array($extension, $allowedExts))
				  if (in_array($extension, $allowedExts)) {
				  	
				  if ($_FILES["file"]["error"] > 0)
				    {
				    // echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
				    	header("location:pages/UploadVideo.php?msg=Return Code: " . $_FILES["file"]["error"] . "");
				    }
				  else
				    {
				    // echo "Upload: " . $_FILES["file"]["name"] . "<br />";
				    // echo "Type: " . $_FILES["file"]["type"] . "<br />";
				    // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
				    // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

				    if (file_exists(U_VIDEO.$_FILES["file"]["name"]))
				      {
				      	//echo $_FILES["file"]["name"] . " already exists. ";
				      	header("location:pages/UploadVideo.php?msg=already exists.");
				      }
				    else
				      {
				      move_uploaded_file($_FILES["file"]["tmp_name"],
				      U_VIDEO. $_FILES["file"]["name"]);
				      //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
				      header("location:pages/UploadVideo.php?msg=uploaded..");
				      }
				    }
				  }
				else
				  {
				  echo "Invalid file";
				  }
				}
				else{
					header("location:pages/UploadVideo.php?msg=Invalid Extension");	
					die();
				}
				
			break;


		case 'FollowerCount':

			if (isset($_REQUEST['userid'])) {

				$getfollowers = mysql_query("select COUNT(FollowedBy) FROM followers WHERE IsActive=1 AND User_id=".trim($_REQUEST['userid']));
              	if ($getfollowers) {
              		$followers = mysql_fetch_row($getfollowers);
              		print($followers[0]);
              	}
              	else{
              		print(0);
              	}
			}
			die();
			break;

	}
}
/*}
else{
	header("location:../SignUp.php?");
}*/
?>