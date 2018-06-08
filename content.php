<?php
$db=mysql_connect("localhost", "root", "amit@1") or die("Error connecting to database: ".mysql_error());
mysql_select_db('mylibrary',$db) or die(mysql_error($db));
?>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
<link href='https://fonts.googleapis.com/css?family=Love Like A Sister' rel='stylesheet'>
<html>
<head>
<title>MyLIBRARY.com</title>
<style>
body{
background-image:url("hasura.png");
}
h1{
color:#FFFF00;
font-size:48pt;
font-family:"Love Like A Sister";
}
h3{
font-family: "Sergoe UI";
color:yellow;
}
.class1{
font-weight:bold;
text-decoration:italic;
color:#A8C45D;
}
img[data-type="image1"]{
}
.demo{
color:#CD4F39;
font-family:"Sergoe UI";
}
object{
margin:auto;
float:right;
margin-top:80px;
}
.user{
background-color:transparent;
backgopacity:0.6;
padding:5px 30px 8px 30px;
border-color:white;
border-width:0px 0px 1px 0px;
font-size:28px;
outline:none;
color:white;d
}
.pass{
background-color:transparent;
backgopacity:0.5;
padding:5px 30px 5px 30px;
border-color:white;
border-width:0px 0px 1px 0px;
font-size:29px;
outline:none;
color:white;
}
.click{
color:green;
}
.click:visited{
color:red;
}
.ss{
background-color:transparent;
backgopacity:0.7;
color:white;
border-width:1px;
font-size:29px;
padding:2px 30px 2px 30px;
outline:none;
margin-left:75px;
}
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 18px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}
.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e43;
}
.dropdown {
    
    display: inline-block;
	position:fixed;
	margin-top:0px;
	margin-right:0px;
	margin-left:1375px;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 18px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}
.dropdown a:hover {background-color: #f1f1f5}
.show {display:block;}
</style>
</head>
<body>
<script type="text/javascript">
function check(){
a=document.myform.username.value
b=document.myform.password.value
if(a==""){
alert("Please enter valid username.")
return false
}
else if(b==""){
alert("Please enter valid Password.")
return false
}
else{
return true
}
}
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
<center>
<h1>MyLIBRARY</h1>
</center>
<div class="dropdown">
<button onclick="myFunction()" class="dropbtn">Options..</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="home.php">Home</a>
    <a href="info.php">About</a>
    <a href="contact.php">Contact</a>
  </div>
</div>
<object data="Book_cover/BenefitsOfReading.mp4" height="300" width="400" repeat="0"></object> 

<h3>Welcome to the exciting world of books. As said in older days <span class="class1"><i>Books bring enlightment to the man's dark world.</i></span></h3>
<h3>Here is the whole new world of books waiting for you. To continue please login my friend</h3>
<form name="myform" method="post" onsubmit="check();" action="doit2.php?action=submit" >
<div class="input-group">
<table>
<tr>
<td>
<div class="form-group has-success has-feedback">
<span class="glyphicon glyphicon-user form-control-feedback"></span>
 <input class = "user form-control" type="text" name="username" placeholder = "Username" /></td>
 </div>
</tr>

<tr>
<td>
<div class="form-group has-success has-feedback">
<span class="glyphicon glyphicon-lock form-control-feedback"></span>
 <input class = "pass form-control" type="password" name="password" placeholder = "Password"/></td>
</div>
 </tr>
<tr>
<td><br/><input class = "ss" type="submit" name="submit" value="  Log In  " /></td>
</tr>
</table>
</div>
</form>
<h3>If you are new to this world of books<a class = "click" href="registration.php">Click here</a> to register.</h3

<img src="Book_cover/cover.jpg" width="200" data-type="image1" height="250">
<img src="Book_cover/photo2.jpg" width="200" height="250">
<img src="Book_cover/photo3.jpg" width="200" height="250">
<img src="Book_cover/photo4.jpg" width="200" height="250">
<img src="Book_cover/photo5.jpg" width="200" height="250">
<img src="Book_cover/photo6.jpg" width="200" height="250">
<img src="Book_cover/photo7.jpg" width="200" height="250">
<img src="Book_cover/photo8.jpg" width="200" height="250">
<img src="Book_cover/photo9.jpg" width="200" height="250">
<img src="Book_cover/photo10.jpg" width="200" height="250">
<img src="Book_cover/photo12.jpg" width="200" height="250">
<img src="Book_cover/photo13.jpg" width="200" height="250">
<img src="Book_cover/photo14.jpg" width="200" height="250">
<img src="Book_cover/photo15.jpg" width="200" height="250">
<img src="Book_cover/photo16.jpg" width="200" height="250">
<img src="Book_cover/photo17.jpg" width="200" height="250">
<img src="Book_cover/photo18.png" width="200" height="250">
<img src="Book_cover/photo19.jpg" width="200" height="250">
<center>
<h3 class="demo">And many more books are waiting for you....</h3>
</center>
</html>