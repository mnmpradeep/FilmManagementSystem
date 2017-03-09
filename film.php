<html>
<body>
<h2>Mock Film Management Component: Display one film</h2>
 
<?php
$server = mysql_connect('localhost', 'root', '');

if(!$server)
	die("Unable to connect to MySql Server". $server -> connect_error);

$db = mysql_select_db('sakila');

if(!$db)
	die("Unable to connect to sakila database" . $db -> connect_error);

$query = 'select * from film where film_id = "'.$_GET["filmId"].'"';
$idCheck = mysql_query($query);
if(!$idCheck)
	die("Unable to connect to sakila database". $idCheck -> connect_error);
$idArray = mysql_fetch_array($idCheck);
echo '<h3 style = "display: inline;">Film: </h3>'.$idArray["title"]."<br><br>";
echo '<h3 style = "display: inline;">Rental Rate:</h3>$'.$idArray["rental_rate"]."<br>";

$query = 'select count(*) from inventory where film_id = "'.$_GET["filmId"].'"';
$Check = mysql_query($query);
if(!$Check)
	die("Unable to connect to sakila database". $Check -> connect_error);
$iArray = mysql_fetch_array($Check);
echo '<h3 style = "display: inline;">Number of copies in the inventory: </h3>'.$iArray["count(*)"].".<br>";

$query = 'select count(*) from rental where inventory_id IN (select inventory_id from inventory where film_id ="'.$_GET["filmId"].'")';
$Check = mysql_query($query);
if(!$Check)
	die("Unable to connect to sakila database". $Check -> connect_error);
$iArray = mysql_fetch_array($Check);
echo '<h3 style = "display: inline;">Number of times rented: </h3>'.$iArray["count(*)"].".<br>";


$query = 'select sum(amount) from payment where rental_id IN (select rental_id from rental where inventory_id IN (select inventory_id from inventory where film_id ="'.$_GET["filmId"].'"))';
$Check = mysql_query($query);
if(!$Check)
	die("Unable to connect to sakila database". $Check -> connect_error);
$iArray = mysql_fetch_array($Check);
echo '<h3 style = "display: inline;">Rental fees collected: </h3>$'.$iArray["sum(amount)"].".<br>";

?>

</body>
</html>