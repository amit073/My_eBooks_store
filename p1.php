<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
echo "User ID or Password  invalid";
header("Refresh: 2;URL:content.php");
echo "</br>";
echo "If you are not directed automatically";
echo "<a href='content.php'>Click Here</a>";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=password_hash($_POST['password']);
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$db=mysql_connect("localhost", "root", "amit@1");
// Selecting Database
mysql_select_db("mylibrary", $db);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from user where user_pass='$password' AND user_uname='$username'", $db);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: p1.php"); // Redirecting To Other Page
} else {
echo "User ID or Password  invalid";
header("Refresh: 2;URL:content.php");
echo "</br>";
echo "If you are not directed automatically";
echo "<a href='content.php'>Click Here</a>";
}
mysql_close($db); // Closing Connection
}
}
?>