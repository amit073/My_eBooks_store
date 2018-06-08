<?php
$db=mysql_connect("localhost", "root", "amit@1") or die("Error connecting to database: ".mysql_error());
mysql_select_db('mylibrary',$db) or die(mysql_error($db));
session_start();
session_unset();
session_destroy();
ob_start();
header("location:content.php");
include 'content.php';
exit();
?>