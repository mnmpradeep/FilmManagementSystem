<html>
<body>
<h2>Mock Film Management Component</h2>
Please select the first character of the film titles:
<br><br>

<form action = "films.php" method  = "get">
Select:<select name="title" id="selectid">;
<?php
$server = mysql_connect('localhost', 'root', '');

if(!server)
	die("Unable to connect to MySql Server". $server -> connect_error);

$db = mysql_select_db('sakila');

if(!db)
	die("Unable to connect to sakila database" . $db -> connect_error);


$result = "SELECT distinct LEFT(title,1) as title FROM film";
$answer = mysql_query($result);

while($eachans = mysql_fetch_array($answer))
	 echo "<option value='" . $eachans['title'] ."'>" . $eachans['title'] ."</option>";
?>
</select>

<!&nbsp>
&emsp;
<?php

if(isset($_GET['title']))
	{
		//echo "$";
		$r= $_GET['title'];
		echo $r;
		echo "<br>";

		}
	
	?>
<input type = "submit">
</form>

</body>
</html>
