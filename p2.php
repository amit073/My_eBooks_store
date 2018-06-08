<?php
$db=mysql_connect('localhost','root','amit@1') or die('Unable to connect.Check your conne3ction parameters');
mysql_select_db('mylibrary',$db) or die(mysql_error($db));
$dir='C:/wamp64/www/MyLIBRARY/mylibuserimages';
if($_FILES['uploadfile']['error'] !=UPLOAD_ERR_OK){
	switch($_FILES['uploadfile']['error']){
		case UPLOAD_ERR_INI_SIZE :
		die('Uploaded file exceeds the upload_max_filesize directive'.'in php.ini.');
		break;
		case UPLOAD_ERR_FORM_SIZE :
		die('Uploaded file exceeds the max. size of html form support');
		break;
		case UPLOAD_ERR_PARTIAL :
		 die('Uploaded file  partially uploaded');
		 break;
		 case UPLOAD_ERR_NO_FILE :
		 die('No file is uploaded');
		 break;
		 case UPLOAD_ERR_NO_TMP_DIR :
		 die('The server is missing temporory folder');
		 break;
		 case UPLOAD_ERR_CANT_WRITE :
		 die('the server failed to write the uploaded file to disk');
		 break;
		 case UPLOAD_ERR_EXTENSION :
		 die('File uploaded stopped by extension');
		 break;
	}
}
$image_username=$_POST['uname'];
$image_date=date('Y-m-d');
list($width,$height,$type,$attr)=getimagesize($_FILES['uploadfile']['tmp_name']);
switch($type){
	case IMAGETYPE_GIF:
	$image=imagecreatefromgif($_FILES['uploadfile']['tmp_name']) or die('Unsupported file format');
	$ext='.gif';
	break;
	case IMAGETYPE_PNG:
	$image=imagecreatefrompng($_FILES['uploadfile']['tmp_name']) or die('Unsupported file format');
	$ext='.png';
	break;
	case IMAGETYPE_JPEG:
$image=imagecreatefromjpeg($_FILES['uploadfile']['tmp_name']) or die('Unsupported file format');
$ext='.jpg';
break;
default:
die('The file you uploaded does not support format');
}
$query='INSERT INTO images(image_username,image_date) VALUES("'.$image_username.'","'.$image_date.'")';
$result=mysql_query($query,$db) or die(mysql_error($db));
$last_id=mysql_insert_id();
$imagename=$last_id.$ext;
$query='UPDATE images SET image_filename="'.$imagename.'" WHERE image_id='.$last_id;
$result=mysql_query($query,$db) or die(mysql_error($db));
switch($type){
	case IMAGETYPE_GIF:
	imagegif($image,$dir.'/'.$imagename);
	break;
	case IMAGETYPE_PNG:
	imagepng($image,$dir.'/'.$imagename);
	break;
	case IMAGETYPE_JPEG:
	imagejpeg($image,$dir.'/'.$imagename);
	break;
}
imagedestroy($image);
?>
<html>
<head>
<title>Here is your picture</title>
</head>
<body>
<img src="C:/wamp64/www/MyLIBRARY/mylibuserimages/<?php echo $imagename;?>">
<table>
<tr><td>Image saved as:</td><td><?php echo $imagename;?></td></tr>
<tr><td>Image type is:</td><td><?php echo $ext;?></td></tr>
<tr><td>Height:</td><td><?php echo $height;?></td></tr>
<tr><td>Width:</td><td><?php echo $width;?></td></tr>
<tr><td>Upload date is:</td><td><?php echo $image_date;?></td></tr>
</table>
<?php
if (isset($_POST['submit'])) {
	$name=(isset($_POST['name1'])) ? trim($_POST['name1']) : '';
	$username=(isset($_POST['uname'])) ? trim($_POST['uname']) : '';
$password=crypt(isset($_POST['pass'])) ? crypt($_POST['pass']) : '';
$cpass=(isset($_POST['pass1'])) ? $_POST['pass1'] : '';
$email=(isset($_POST['email'])) ? trim($_POST['email']) : '';
$mobi=(isset($_POST['mob'])) ? $_POST['mob'] : '';
if(empty($username)){
echo 'User ID cannot  blank.';
header("Refresh: 2;URL:register.php");
echo "</br>";
echo "If you are not redirected automatically";
echo "<a href='register.php'>Click Here</a>";
}
if(empty($password)){
echo 'Password cannot  blank.';
header("Refresh: 2;URL:register.php");
echo "</br>";
echo "If you are not redirected automatically";
echo "<a href='register.php'>Click Here</a>";
}	
if(empty($cpass)){
echo 'Confirm Password cannot  blank.';
header("Refresh: 2;URL:register.php");
echo "</br>";
echo "If you are not redirected automatically";
echo "<a href='register.php'>Click Here</a>";
}	
if($password != $cpass){
echo 'Password do not match.';	
header("Refresh: 2;URL:register.php");
echo "</br>";
echo "If you are not redirected automatically";
echo "<a href='register.php'>Click Here</a>";
}
if(empty($name)){
echo 'Name cannot  blank.';
header("Refresh: 2;URL:register.php");
echo "</br>";
echo "If you are not redirected automatically";
echo "<a href='register.php'>Click Here</a>";
}
if(empty($mobi)){
echo 'Mobile Number cannot  blank.';
header("Refresh: 2;URL:register.php");
echo "</br>";
echo "If you are not redirected automatically";
echo "<a href='register.php'>Click Here</a>";
}
if(empty($email)){
echo 'EMail ID cannot  blank.';
header("Refresh: 2;URL:register.php");
echo "</br>";
echo "If you are not redirected automatically";
echo "<a href='register.php'>Click Here</a>";
}
else{ 	
switch ($_GET['action']){
	case 'submit':
$query='INSERT INTO user(user_name,user_uname,user_pass,user_email,user_mob) values("'.$name.'","'.$username.'","'.$password.'","'.$email.'","'.$mobi.'")';
break;
}
if (isset($query)) {
$result = mysql_query($query, $db) or die(mysql_error($db));
echo "<h3>";
echo "Registration Successfull";
echo "</h3>";
}
}
}
?>
<h3></h3>
<h3>To go to Login page<a href="content.php">Click Here.</a></h3>
</body>
</html>