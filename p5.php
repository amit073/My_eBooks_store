<?php
$db=mysql_connect('localhost','root','amit@1') or die('Unable to connect.Check your connection parameters');
mysql_select_db('mylibrary',$db) or die(mysql_error($db));
include('session_connection.php');
?>
<html>
<head>
<title>User Address</title>
<style>
body{
background-color:#EEE9E5;
}
h2{
color:#B22225;
}
h3{
	float:;
}
img{
border:2px solid #FF0000;
float:right;
width:220px;
height:220px;
}
</style>
</head>
<body>
<center>
<h2>Please Enter Your Address here</h2>
</center>
<img src="C:/wamp64/www/MyLIBRARY/mylibuserimages/<?php echo $photo; ?>">
<h3>Username:   <?php echo $username1; ?></h3>
<form name="form3" method="post" action="response.php?action=submit" >
<table>
<tr><td>Enter your Address:</td><td><textarea id="description" name="descriptionarea" rows="5" cols="30">
Give address about your area, street no. house no. locality, landmark, etc..
</textarea></td></tr>
<tr><td>Enter Your City:</td><td><input type="text" name="ucity" /></td></tr>
<tr><td>Enter Your City PIN:</td><td><input type="text" name="ucitypin" /></td></tr>
<tr><td>Select Your State name:</td><td><select name="state">
<option value="">Select Your State</option>
<option value="Delhi">Delhi</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal ">West Bengal</option>
<option value="other">Other region..</option>
</select></td></tr>
<tr><td>Select Country:</td><td><select name="country">
<option value="India">India</option>
<option value="Other Country">Other Country</option>
</select></td></tr>
<tr><td></td><td><input type="submit" name="submit" value="Save & Continue" /></td></tr>
</table>
</form>
<form name="continueform" action="response2.php?action=submit" method="post" >
<h3>Continue with the saved address</h3>
<input type="submit" name="submit" value="Continue" />
</form>
</body>
</html>