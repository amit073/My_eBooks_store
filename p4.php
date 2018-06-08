<?php
$db=mysql_connect('localhost','root','amit@1') or die('Unable to connect.Check your connection parameters');
mysql_select_db('mylibrary',$db) or die(mysql_error($db));
include('session_connection.php');
session_start();
$dir='C:/wamp64/www/MyLIBRARY/mylibsellpics';
if($_FILES['uploadfile']['error'] !=UPLOAD_ERR_OK){
	switch($_FILES['uploadfile']['error']){
		case UPLOAD_ERR_INI_SIZE :
		die('Uploaded file exceeds the upload_max_filesize directive'.'in php.ini.');
		break;
		case UPLOAD_ERR_FORM_SIZE :
		die('Uploaded file exceeds the max. size of html form support');
		break;
		case UPLOAD_ERR_PARTIAL :
		 die('Uploaded file partially uploaded');
		 break;
		 case UPLOAD_ERR_NO_FILE :
		 die('No file uploaded');
		 break;
		 case UPLOAD_ERR_NO_TMP_DIR :
		 die('The server is missing temporary folder');
		 break;
		 case UPLOAD_ERR_CANT_WRITE :
		 die('the server failed to write the uploaded file to disk');
		 break;
		 case UPLOAD_ERR_EXTENSION :
		 die('File uploaded stopped by extension');
		 break;
	}
}
$image2_username=$username1;
$image2_date=date('Y-m-d');
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
die('The file you uploaded has not in supported format');
}
$query='INSERT INTO images2(image2_username,image2_date) VALUES("'.$image2_username.'","'.$image2_date.'")';
$result=mysql_query($query,$db) or die(mysql_error($db));
$last_id=mysql_insert_id();
$imagename=$last_id.$ext;
$query='UPDATE images2 SET image2_filename="'.$imagename.'" WHERE image2_id='.$last_id;
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
<title>Here is your Book picture</title>
</head>
<body>
<img src="C:/wamp64/www/MyLIBRARY/mylibsellpics/<?php echo $imagename;?>">
<table>
<tr><td>Image saved as:</td><td><?php echo $imagename;?></td></tr>
<tr><td>Image type as:</td><td><?php echo $ext;?></td></tr>
<tr><td>Height:</td><td><?php echo $height;?></td></tr>
<tr><td>Width:</td><td><?php echo $width;?></td></tr>
<tr><td>Upload date is:</td><td><?php echo $image2_date;?></td></tr>
</table>
<?php
if (isset($_POST['submit'])) {
	$bname=(isset($_POST['bname'])) ? trim($_POST['bname']) : '';
	$bauthname=(isset($_POST['baname'])) ? trim($_POST['baname']) : '';
$category=(isset($_POST['pdfbook3'])) ? $_POST['pdfbook3'] : '';
$bpub=(isset($_POST['bpub'])) ? trim($_POST['bpub']) : '';
$bprice=(isset($_POST['bprice'])) ? trim($_POST['bprice']) : '';
$des=(isset($_POST['description'])) ? $_POST['description'] : '';
$book_username=$username1;
if(empty($bname)){
echo 'Book name cannot blank.';
header("Refresh: 2;URL:p1.php");
echo "</br>";
echo "If you are not redirected automatically";
echo "<a href='p1.php'>Click Here</a>";
}	
if(empty($category)){
echo 'Book Category cannot blank.';
header("Refresh: 2;URL:p1.php");
echo "</br>";
echo "If you are not redirected automatically";
echo "<a href='p1.php'>Click Here</a>";
}	
if(empty($bprice)){
echo 'Book Price cannot blank.';
header("Refresh: 2;URL:p1.php");
echo "</br>";
echo "If you are not redirected automatically";
echo "<a href='p1.php'>Click Here</a>";
}
if(empty($des)){
echo 'Book Description cannot blank.';
header("Refresh: 2;URL:p1.php");
echo "</br>";
echo "If you are not redirected automatically";
echo "<a href='p1.php'>Click Here</a>";
}	
else{ 
$_SESSION['book_info']=$book_username;	
switch ($_GET['action']){
	case 'submit':
$query='INSERT INTO books(book_name,book_username,book_author,book_category,book_publication,book_price,book_description,book_date) values("'.$bname.'","'.$book_username.'","'.$bauthname.'","'.$category.'","'.$bpub.'","'.$bprice.'","'.$des.'","'.$image2_date.'")';
break;
}
if (isset($query)) {
$result = mysql_query($query, $db) or die(mysql_error($db));
echo "<h3>";
echo "Book Data is Successfully inserted";
echo "</h3>";
header('Refresh: 2;URL=p5.php');
echo '<p>You will be redirected to address page.</p>';
echo '<p>If your browser doesn\'t redirect you properly  or automatically,'.
'<a href="p5.php">CLICK HERE</a>.</p>';
}
}
}
?>
<h3></h3>
<h3>To give your address here<a href="p5.php">Click Here.</a></h3>
</body>
</html>