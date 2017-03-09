<html>
<body>
<h2>Mock Film Management Component: Films of title chars
<?php
echo $_GET["title"]."</h2>";
$server = mysql_connect('localhost', 'root', '');

if(!$server)
	die("Unable to connect to MySql Server". $server -> connect_error);

$db = mysql_select_db('sakila');

if(!$db)
	die("Unable to connect to sakila database" . $db -> connect_error);

$result = "SELECT title,length FROM film where title like \"".$_GET["title"]."%\"";
$answer = mysql_query($result);

if(!$answer)
	die("Unable to connect to sakila database" . $answer -> connect_error);


echo "<ol type = 1>";
echo "Number of films for ".$_GET["title"].": ".mysql_num_rows($answer).":";

//$count = 1;

while($eachans = mysql_fetch_array($answer)) {
	echo "<li>";
	
	$findid = "SELECT film_id from film where title = \"".$eachans["title"]."\"";
	$idquery = mysql_query($findid);
	
	if(!$idquery)
		die("Unable to connect to sakila database" . $idquery -> connect_error);
    
	$id = mysql_fetch_array($idquery);
	echo '<a href = "film.php?filmId='.urlencode(($id["film_id"])).'">';
	echo $eachans["title"];
	echo "</a>";
	echo ": ".$eachans["length"]."minutes.<br></li>";
	//$count++;
}

echo "</ol>";
	
?>
</body>
</html>
