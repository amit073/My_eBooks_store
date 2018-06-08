<?php
$db=mysql_connect('localhost','root','amit@1') or die('Unable to connect.Check your connection parameters');
mysql_select_db('mylibrary',$db) or die(mysql_error($db));
include('session_connection.php');
session_start();
if (isset($_POST['submit'])){
	$desa=(isset($_POST['descriptionarea'])) ? $_POST['descriptionarea'] : '';
	$ucity=(isset($_POST['ucity'])) ? $_POST['ucity'] : '';
	$ucitypin=(isset($_POST['ucitypin'])) ? $_POST['ucitypin'] : '';
	$state=(isset($_POST['state'])) ? $_POST['state'] : '';
	$country=(isset($_POST['country'])) ? $_POST['country'] : '';
	$adress_username=$username1;
	$adress_date=date('Y-m-d');
	if(empty($desa)){
echo 'User Address cannot blank.';
header("Refresh: 2;URL:p5.php");
echo "</br>";
echo "If you are not redirected automatically";
echo "<a href='p5.php'>Click Here</a>";
}
if(empty($ucity)){
echo 'User city cannot blank.';
header("Refresh: 2;URL:p5.php");
echo "</br>";
echo "If you are not redirected automatically";
echo "<a href='p5.php'>Click Here</a>";
}
if(empty($ucitypin)){
echo 'User city PIN cannot  blank.';
header("Refresh: 2;URL:p5.php");
echo "</br>";
echo "If you are not redirected automatically";
echo "<a href='p5.php'>Click Here</a>";
}
if(empty($state)){
echo 'User State cannot  blank.';
header("Refresh: 2;URL:p5.php");
echo "</br>";
echo "If you are not redirected automatically";
echo "<a href='p5.php'>Click Here</a>";
}
else{
	$_SESSION['useradress_username']=$adress_username;
	switch ($_GET['action']){
	case 'submit':
	$query='INSERT INTO useraddress(uaddress_username,uaddress_address,uaddress_city,uaddress_citypin,uaddress_state,uaddress_country,uaddress_date) values("'.$adress_username.'","'.$desa.'","'.$ucity.'","'.$ucitypin.'","'.$state.'","'.$country.'","'.$adress_date.'")';
	break;
}
if (isset($query)) {
$result = mysql_query($query, $db) or die(mysql_error($db));
echo "<h3>";
echo "Book Data inserted";
echo "</h3>";
header('Refresh: 1;URL=p1.php');
echo '<p>You will be redirected to main page.</p>';
echo '<p>If your browser doesn\'t redirect you properly automatically,'.
'<a href="p1.php">CLICK HERE</a>.</p>';
}
}
}
?>