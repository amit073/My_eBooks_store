<?php
$db=mysql_connect('localhost','root','amit@1') or die('Unable to connect.Check your connection parameters');
mysql_select_db('mylibrary',$db) or die(mysql_error($db));
include('session_connection.php');
session_start();
if (isset($_POST['submit'])){
	switch ($_GET['action']){
	case 'submit':
$adress_username=$username1;
$_SESSION['useradress_username']=$adress_username;
header('Refresh: 2;URL=p1.php');
echo '<p>You will be redirected for log out page.</p>';
echo '<p>If your browser doesn\'t redirect you properly automatically,'.
'<a href="p1.php">CLICK HERE</a>.</p>';
break;
	}
}
?>