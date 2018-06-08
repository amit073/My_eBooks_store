<?php
$db=mysql_connect('localhost','root','amit@1') or die('Unable to connect.Check your connection parameters');
mysql_select_db('mylibrary',$db) or die(mysql_error($db));
$targetfolder = 'C:/wamp64/www/MyLIBRARY/userpdf/';
$targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
 {
 echo "The file ". basename( $_FILES['file']['name']). " is uploaded";
echo "</br>";
 }
 else {
 echo "Problem in uploading file";
 }
$pbook_date=date('Y-m-d');
$ext='.pdf';
$filename=$_POST['pbname'].$ext;
switch ($_GET['action']){
	case 'submit':
$query='INSERT INTO pdfbooks(pbook_name,pbook_authname,pbook_category,pbook_date) values("'.$filename.'","'.$_POST['apbname'].'","'.$_POST['pdfbook'].'","'.$pbook_date.'")';
break;
}
if (isset($query)) {
$result = mysql_query($query, $db) or die(mysql_error($db));
echo "Book insertion is successfull";
header('Refresh: 1;URL=p1.php');
echo '<p>You will be redirected to the main page.</p>';
echo '<p>If your browser doesn\'t redirect you properly or automatically,'.
'<a href="p1.php">CLICK HERE</a>.</p>';
}
?>
<?php
?>