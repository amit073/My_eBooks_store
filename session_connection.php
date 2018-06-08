<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$db=mysql_connect("localhost", "root", "amit@1");
// Selecting Database
mysql_select_db("mylibrary", $db);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select user.user_uname,user.user_mob,images.image_username,images.image_filename from user,images where user_uname='$user_check' ", $db);
$row=mysql_fetch_array($ses_sql);
while($row=mysql_fetch_array($ses_sql)){
		extract ($row);
		if($row['user_uname'] == $row['image_username']){
$login_session =$row['user_uname'];
    $email = $row['user_email'];//." ".$row['vLastName'];
	
    $username1 = $row['user_uname'];
    $password = $row['user_pass'];
    $photo = $row['image_filename'];
	$contacts=$row['user_mob'];
		}
}
if(!isset($login_session)){
mysql_close($db); // Closing Connection
header('Location: content.php'); // Redirecting To Home Page
}
?>