<?php
$db=mysql_connect("localhost", "root", "amit@1") or die("Error connecting to database: ".mysql_error());
mysql_select_db('mylibrary',$db) or die(mysql_error($db));
?>
<html>
<head>
<title>About</title>
<style>
</style>
</head>
<body>
<center>
<h2>About Us</h2>
</center>
<h3>What is MyLIBRARY?</h3>
<h4>MyLIBRARY is like a house of books. There are many things we can do:-</br>
#. In this anybody can freely upload the PDFs over any topic and subject by just selecting it's genre and name.</br>
#. We can also download any PDF on any topic or subject freely.</br>
#. We can also place  advertisement for selling our old books.</br>
#. We can also buy any old book by just searching the books by name or by city.</br>
</h4>
<h3>What makes MyLIBRARY different?</h3>
<h4>MyLIBRARY is different from all as it gives the user the liberty to upload any PDF file. This can be even their own written books or derived topics over any subject. We can freely upload our thoughts through our books.
</h4>
<h3>Thankyou, my friends with your efforts our MyLIBRARY goes big and better.</h3>
</body>
</html>