<?php
		
		define("INC","include/");
		define("PG","pages/");
		define("U_IMG", "Images/Users/");
		define("U_VIDEO","Gallery/videos/");
		define("VIDEO_IMG","Gallery/thumbnail/");
		session_start();
		$connect=mysql_connect("localhost","root","");
		$db=mysql_select_db("t-spot",$connect);
	
?>