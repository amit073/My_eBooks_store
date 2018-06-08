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
    font-size: 14px;
    border: none;
    cursor: pointer;
}
.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}
.dropdown {
    float: right;
    display: inline-block;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f6;
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
<h3>List of all the available PDFs version of books  you selected..8</h3>
<?php
$query="SELECT pbook_name,pbook_authname,pbook_category FROM pdfbooks WHERE pbook_category='".$_GET['pdfbook2']."'";
$result=mysql_query($query,$db) or die(mysql_error($db));
while($row=mysql_fetch_array($result)){
		extract ($row);
		echo "<table>";
		echo "<tr><td>";
		echo $pbook_name.'--'.$pbook_authname;
		echo "</td><td>";
		echo "<a href='C:/wamp64/www/MyLIBRARY/userpdf/$pbook_name ' target='_blank'><i class='icon icon-file-pdf-o big-font'></i> PDF Download</a>";
		echo "</td>";
		echo "</tr></table>";
}
?>
</body>
</html>