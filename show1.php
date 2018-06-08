<?php
$db=mysql_connect('localhost','root','amit@1') or die('Unable to connect.Check your connection parameters');
mysql_select_db('mylibrary',$db) or die(mysql_error($db));
?>
<html>
<head>
<title>Book Shows</title>
<style>
body{
background-color:#EEE9E6;
}
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 14px;
    font-size: 16px;
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
    min-width: 160px;
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
.dropdown a:hover {background-color: #f1f1f2}
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
<h3>List of all the available books  you have selected...</h3>
<?php
$query="SELECT book_name,book_author,book_category,book_username,book_price,book_publication,book_description,book_date FROM books WHERE book_category='".$_GET['book4']."'";
$result=mysql_query($query,$db) or die(mysql_error($db));
while($row=mysql_fetch_array($result)){
		extract ($row);
		echo "<table>";
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
	echo "Book Price is:";
	echo "</td><td>";
	echo "$book_price";
	echo "</td></tr>";
		echo "</tr></table>";
}
?>
</body>
</html>