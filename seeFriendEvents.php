<?php
	include "dbh.php";
	session_start();

	echo "<h2>Friend's Events: </h2>";

	$username = $_SESSION["username"];


	$sql = "SELECT DISTINCT title, username, description, start_time, end_time, location_name, zipcode FROM sign_up NATURAL JOIN an_event WHERE username IN (SELECT friend_to FROM friend WHERE friend_of = '$username')";
	$result = $conn->query($sql);

	if($result->num_rows > 0){
		echo "<h2> Here are the events: </h2>";
        $counter = 0;

        while ($row = $result->fetch_assoc()) {
        	++$counter;
        	echo "<h3>Event #" . $counter . "</h3>";
        	echo "User: " . $row["username"] . "<br>Title: " . $row["title"] . "<br>Description: " . $row["description"] . "<br>Start Time: " .$row["start_time"] . "<br>End Time: " . $row["end_time"] . "<br>Location: " . $row["location_name"] . "<br>Zipcode: " . $row["zipcode"];
        }
	}
	else{
		echo "There are no events to see";
	}



	echo "<br><br><br>";
	echo '<form action="http://localhost:8888/FindFolks/userProfilePage.php">';
	echo "<button>Go Back</button>";
	echo "</form>";
	echo '<form action="http://localhost:8888/FindFolks/logout.php">';
	echo "<button>Logout</button>";
	echo "</form>";
?>