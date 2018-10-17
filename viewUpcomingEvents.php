<!DOCTYPE html>
 <head>
 	<title>Upcoming Events</title>
 </head>
</html>

<?php
	include "dbh.php";
	session_start();

	echo "<h1>Upcoming Events:</h1>";
	$username = $_SESSION["username"];

	$sql = "SELECT event_id, title, description, start_time, end_time, location_name, zipcode FROM sign_up NATURAL JOIN an_event WHERE username = '$username' AND start_time >= CURDATE() AND end_time <= DATE_ADD(CURDATE(), INTERVAL 3 DAY) ";
	$result = $conn->query($sql);
	if ($result->num_rows > 0 ){
		$counter = 0;
    	while($row = $result->fetch_assoc()){
    		++$counter;
    		echo "<h3>Event #" . $counter . "</h3>";
    		echo "Event ID: " . $row["event_id"] . "<br>Title: " . $row["title"] . "<br>Description: " . $row["description"] . "<br>Start Time: " .$row["start_time"] . "<br>End Time: " . $row["end_time"] . "<br>Location: " . $row["location_name"] . "<br>Zipcode: " . $row["zipcode"];
    		echo "<br><br>";
    	}
	}
	else{
		echo "<h2>You have no upcoming events </h2>";
	}

	$conn->close(); 

	echo "<br><br><br>";
	echo '<form action="http://localhost:8888/FindFolks/userProfilePage.php">';
	echo "<button>Go Back</button>";
	echo "</form>";
	echo '<form action="http://localhost:8888/FindFolks/logout.php">';
	echo "<button>Logout</button>";
	echo "</form>";
?>