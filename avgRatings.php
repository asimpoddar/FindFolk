<?php
	include "dbh.php";
	session_start();

	echo "<h2>Average ratings for your groups: </h2>";

	$username = $_SESSION['username'];

	$sql = "SELECT group_id, title, AVG(rating) as avg_rating FROM sign_up NATURAL JOIN organize NATURAL JOIN an_event WHERE end_time <= NOW() AND start_time >= CURRENT_DATE - INTERVAL 3 DAY AND group_id IN (SELECT group_id FROM belongs_to WHERE username = '$username') GROUP BY title, group_id";
	$result = $conn->query($sql);

	if($result->num_rows > 0){
		echo "<h2> Here are the events: </h2>";
        $counter = 0;

        while ($row = $result->fetch_assoc()) {
        	++$counter;
        	echo "<h3>Event #" . $counter . "</h3>";
        	echo "Title: " . $row["title"] . "<br>Hosted by: " . $row["group_id"] . "<br>Average Rating: " . $row["avg_rating"];
        }
	}
	else{
		echo "There are no ratings to see";
	}





	echo "<br><br><br>";
	echo '<form action="http://localhost:8888/FindFolks/userProfilePage.php">';
	echo "<button>Go Back</button>";
	echo "</form>";
	echo '<form action="http://localhost:8888/FindFolks/logout.php">';
	echo "<button>Logout</button>";
	echo "</form>";

?>