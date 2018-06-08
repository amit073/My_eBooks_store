<?php
$db=mysql_connect('localhost','root','amit@1') or die('Unable to connect.Check connection parameters');
mysql_select_db('mylibrary',$db) or die(mysql_error($db));
session_start();
$address=$_SESSION['useradress_username'];
$query="SELECT *FROM useraddress where uaddress_username='$address' ";
$result=mysql_query($query,$db) or die(mysql_error($db));
while($row=mysql_fetch_array($result)){
	extract($row);
	$useraddress_address=$row['uaddress_address'];
	$useraddress_city=$row['uaddress_city'];
	$useraddress_citypin=$row['uaddress_citypin'];
	$useraddress_state=$row['uaddress_state'];
	$useraddress_country=$row['uaddress_country'];
}
?>