<html>
<body>
<?php

$host = "localhost";
$user = "root";
$passwd = "";
$dbname = "blackpanda";

$cxn = mysqli_connect($host,$user,$passwd,$dbname);
if (!$cxn) {
	echo "<h1>Could not connect to database.</h1>";
	die("Connection failed: " . mysqli_connect_error());
}

$dbstart = "CREATE DATABASE blackpanda";
mysqli_query($cxn, $dbstart); 

$queries = array(
	"DROP TABLE IF EXISTS interestedusers",

"CREATE TABLE interestedusers(
	email VARCHAR(100) NOT NULL,
	name VARCHAR(100) NOT NULL,
	interest VARCHAR(100) NOT NULL,
	dateCreated TIMESTAMP NOT NULL
)",
);

$isError = false;
for ($x = 0; $x < count($queries); $x++) {
    mysqli_query($cxn, $queries[$x])
	or die("Database Creation Failed: " . mysqli_error($cxn));	
}
	
echo "<h1>Database Creation Successful!</h1>";

?>
</body>
</html>

