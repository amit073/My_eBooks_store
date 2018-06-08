<?php
   $db=mysql_connect("localhost", "root", "amit@1") or die("Error connecting to database: ".mysql_error());
    /*
        localhost - it's location of the mysql server, usually localhost
        root - your username
        third is your password
         
        if connection fails it will stop loading the page and display an error
    */
     
    mysql_select_db('mylibrary',$db) or die(mysql_error($db));
    /* tutorial_search is the name of database we've created */
	include('session_connection.php');
include('session_connection2.php');
include('session_connection3.php');
?>
 
<html>
<head>
    <title>Search</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<style>
	object{
		border:3px solid #FF0000;
	}
	body{
background-color:#EEE9E6;
}
h3{
	color:black;
}
.dropbtn {
    background-color: #4CAF52;
    color: white;
    padding: 18px;
    font-size: 18px;
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
    background-color: #f9f9f8;
    min-width: 165px;
    overflow: auto;
    box-shadow: 0px 8px 15px 0px rgba(0,0,0,0.2);
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
<?php
    $query1 = $_GET['query1']; 
    // gets value sent over search form
     
    $min_length = 3;
	echo "<center>";
	echo "<h2>Result for $query1 city advertisement</h2>";
	echo "</center>";
	 if(strlen($query1) >= $min_length){ // if query length is more or equal minimum length then
         
        $query1 = htmlspecialchars($query1); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query1 = mysql_real_escape_string($query1);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysql_query("SELECT * FROM useraddress
            WHERE (uaddress_city LIKE '%".$query1."%') OR (uaddress_citypin LIKE '%".$query1."%')") or die(mysql_error());
             
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
                // posts results gotten from database(title and text) you can also show id ($results['id'])
				$query="SELECT user.user_uname,user.user_name,user.user_mob,useraddress.uaddress_username,useraddress.uaddress_city,useraddress.uaddress_citypin,useraddress.uaddress_address,books.book_username,books.book_author,books.book_name,books.book_category,books.book_price,books.book_publication,books.book_description,books.book_date,images2.image2_username,images2.image2_filename FROM user,books,useraddress,images2 WHERE uaddress_city='".$results['uaddress_city']."' AND uaddress_citypin='".$results['uaddress_citypin']."' ";
$result=mysql_query($query,$db) or die(mysql_error($db));
while($row=mysql_fetch_assoc($result)){
	extract ($row);
	if($row['uaddress_username']==$row['book_username']){
		if($row['uaddress_username']==$row['image2_username']){
			if($row['uaddress_username']==$row['user_uname']){
			echo "<table>";
			echo "<h3>";
			echo "<tr><td>";
			echo "Seller's Name:";
			echo "</td><td>";
			echo "$user_name";
			echo "</td></tr>";
			echo "<tr><td>";
			echo "Seller Contact Number:";
			echo "</td><td>";
			echo "$user_mob";
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
	echo "Book Category";
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
	echo "Seller's Citypin:";
	echo "</td><td>";
	echo "$uaddress_citypin";
	echo "</td></tr>";
	echo "<tr><td>";
	echo "Seller Address:";
	echo "</td><td>";
	echo "$uaddress_address";
	echo "</td></tr>";
	echo "</h3>";
	echo "</table>";
	
	echo '<img src="C:/wamp64/www/MyLIBRARY/mylibsellpics/$image2_filename" >';
	}
		}
	}
}
			
            }
             
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }
         
    }
	else{ // if query length is less than minimum
        echo "Minimum length ".$min_length;
    }
?>
</body>
</html>