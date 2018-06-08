<?php
$db=mysql_connect('localhost','root','amit@1') or die('Unable to connect.Check connection parameters');
mysql_select_db('mylibrary',$db) or die(mysql_error($db));
session_start();
$book=$_SESSION['book_info'];
$query="SELECT books.book_username,books.book_name,books.book_author,books.book_category,books.book_price,books.book_publication,books.book_description,books.book_date,images2.image2_username,images2.image2_filename FROM books,images2 where book_username='$book' ";
$result=mysql_query($query,$db) or die(mysql_error($db));
while($row=mysql_fetch_array($result)){
	extract($row);
	if($row['book_username'] == $row['image2_username']){
	$book_name=$row['book_name'];
	$book_author=$row['book_author'];
	$book_category=$row['book_category'];
	$book_price=$row['book_price'];
	$book_publication=$row['book_publication'];
	$book_description=$row['book_description'];
	$book_date=$row['book_date'];
	$image2_filename=$row['image2_filename'];
}
}
?>