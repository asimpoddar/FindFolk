<?php

include "dbh.php";
session_start();

echo "<h2>Upcoming events that match your interests: </h2>";

$username = $_SESSION["username"];
$sql = "SELECT username, group_name, event_id, title, an_event.description, start_time, end_time, an_event.location_name, an_event.zipcode FROM member NATURAL JOIN interested_in NATURAL JOIN about NATURAL JOIN a_group NATURAL JOIN organize JOIN an_event USING (event_id)";
$result = $conn->query($sql);

if($result->num_rows <=0 ){
	echo "<h3>There are no upcoming events</h3>";
}
else{
	echo "<h2> Here are the events: </h2>";
    $counter = 0;
	while($row = $result->fetch_assoc()){
		if ($row["username"] == $username){
			++$counter;
			echo "<h3>Event #" . $counter . "</h3>";
			echo "Hosted by: " . $row["group_name"] . "<br>Event ID: " . $row["event_id"] . "<br>Title: " . $row["title"] . "<br>Description: " . $row["description"] . "<br>Start Time: " .$row["start_time"] . "<br>End Time: " . $row["end_time"] . "<br>Location: " . $row["location_name"] . "<br>Zipcode: " . $row["zipcode"];
			echo "<br><br>";
		}
	}
}

echo '<form action="http://localhost:8888/FindFolks/userProfilePage.php">';
echo "<button>Go Back</button>";
echo "</form>";
echo '<form action="http://localhost:8888/FindFolks/logout.php">';
echo "<button>Logout</button>";
echo "</form>";


?>