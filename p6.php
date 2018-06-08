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
	</style>
</head>
<body>
<?php
    $query = $_GET['query']; 
    // gets value sent over search form
     
    $min_length = 3;
	echo "<center>";
	echo "<h2>Result for $query</h2>";
	echo "</center>";
	 if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysql_query("SELECT * FROM pdfbooks
            WHERE (pbook_name LIKE '%".$query."%') OR (pbook_authname LIKE '%".$query."%')") or die(mysql_error());
             
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             echo "<table><tr>";
                echo "<td><h4>".$results['pbook_name']."</h4></td>"."<td>".$results['pbook_authname']."</td>";
                // posts results gotten from database(title and text) you can also show id ($results['id'])
				echo "<td>";
				echo "<a href='C:/wamp64/www/MyLIBRARY/userpdf/'".$results['pbook_name']."' ' target='_blank'><i class='icon icon-file-pdf-o big-font'></i> PDF Download</a>";
				echo "</td>";
				echo "</tr></table>";
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