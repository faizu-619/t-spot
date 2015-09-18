<?php

if (isset($_SESSION["User_info"])) {
		
		
		if (isset($_REQUEST["page"])) {

			$page=$_REQUEST["page"];
			
			switch($page)
			{
				case "home":
				include(PG."home.php");
				break;
			
				case "insert_book":
				include(PG."insert_book.php");
				break;

				case "profile":
				
				include(PG."profile.php");
				break;	

				case "update_info":
				include(PG."updateprofile.php");
				break;	
				
				case "User_all":
				include(PG."Users.php");
				break;

			}

		}
		else{

			include(PG."home.php");
		}
	}
else{
		header("location:Login.php?error_msg=Please Login First");
		}

?>