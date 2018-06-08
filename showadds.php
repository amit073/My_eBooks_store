<?php
$db=mysql_connect('localhost','root','amit@1') or die('Unable to connect.Check your connection parameters');
mysql_select_db('mylibrary',$db) or die(mysql_error($db));
include('session_connection.php');
?>
<html>
<head>
<title>Selling Adds</title>
<style>
body{
background-color:#EEE9E6;
}
img.class1{
	width:200px;
	height:200px;
	float:right;
	border:4px solid #FF0000;
}
img.class2{
	width:200px;
	height:160px;
}
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 14px;
    font-size: 14px;
    border: none;
    cursor: pointer;
}
.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e42;
}
.dropdown {
    float: right;
    display: inline-block;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 162px;
    overflow: auto;
    box-shadow: 0px 8px 14px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
.dropdown-content a {
    color: black;
    padding: 14px 16px;
    text-decoration: none;
    display: block;
}
.dropdown a:hover {background-color: #f1f1f1}
.show {display:block;}
</style>
</head>
<body>
<script>
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<div class="dropdown">
<button onclick="myFunction()" class="dropbtn">Settings</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="info.php">About</a>
    <a href="contact.php">Contact</a>
	<a href="signout.php">Log Out</a>
  </div>
</div>
<h2>Username: <?php echo $username1; ?></h2>
<h3>Contacts: <?php echo $contacts; ?></h3>
<img src="C:/wamp64/www/MyLIBRARY/mylibuserimages/<?php echo $photo; ?>" class="class1">
<?php
$user=$username1;
$email1=$email;
$query="SELECT user.user_email,user.user_uname,user.user_name,user.user_mob,useraddress.uaddress_username,useraddress.uaddress_city,useraddress.uaddress_citypin,useraddress.uaddress_address,books.book_username,books.book_author,books.book_name,books.book_category,books.book_price,books.book_publication,books.book_description,books.book_date,images2.image2_username,images2.image2_filename FROM user,books,useraddress,images2 WHERE user_uname='".$user."' AND user_email='".$email1."' ";
$result=mysql_query($query,$db) or die(mysql_error($db));
while($row=mysql_fetch_assoc($result)){
	extract ($row);
	if($row['user_uname']==$row['book_username']){
		if($row['user_uname']==$row['image2_username']){
			if($row['user_uname']==$row['uaddress_username']){
			echo "<table>";
			echo "<tr><td>";
			echo "User Name:";
			echo "</td><td>";
			echo "$user_name";
			echo "</td></tr>";
	echo "<tr><td>";
	echo "Book Name:";
	echo "</td><td>";
	echo "$book_name";
	echo "</td></tr>";
	echo "<tr><td>";
	echo "Book Author name:";
	echo "</td><td>";
	echo "$book_author";
	echo "</td></tr>";
	echo "<tr><td>";
	echo "Book Publication:";
	echo "</td><td>";
	echo "$book_publication";
	echo "</td></tr>";
	echo "<tr><td>";
	echo "Book Category is";
	echo "</td><td>";
	echo "$book_category";
	echo "</td></tr>";
	echo "<tr><td>";
	echo "Book Description:";
	echo "</td><td>";
	echo "$book_description";
	echo "</td></tr>";
	echo "<tr><td>";
	echo "Book Price:";
	echo "</td><td>";
	echo "$book_price";
	echo "</td></tr>";
	echo "<tr><td>";
	echo "Seller's City:";
	echo "</td><td>";
	echo "$uaddress_city";
	echo "</td></tr>";
	echo "<tr><td>";
	echo "Seller Citypin:";
	echo "</td><td>";
	echo "$uaddress_citypin";
	echo "</td></tr>";
	echo "<tr><td>";
	echo "Seller Address:";
	echo "</td><td>";
	echo "$uaddress_address";
	echo "</td></tr>";
	echo "</table>";
	echo '<img src="C:/wamp64/www/MyLIBRARY/mylibsellpics/$image2_filename" class="class2">';
			}
		}
	}
}
?>
</body>
</html>