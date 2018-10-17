<?php

include "dbh.php";

if (isset($_GET["fromTime"])){
	if ( empty($_GET["fromTime"]) || empty($_GET["toTime"]) ){
		echo "<script>
    		if (confirm('Please fill out all fields') == true) {
        		window.location.href = 'http://localhost:8888/FindFolks/viewPublicInfo.php';
    		} else {
    			window.location.href = 'http://localhost:8888/FindFolks/viewPublicInfo.php';
    		}
			
		</script>";
	}
	else{
		$fromTime = $_GET["fromTime"];
		$toTime = $_GET["toTime"];

		$sql = "SELECT * FROM an_event WHERE start_time>='$fromTime' and end_time<='$toTime'";
		$result = $conn->query($sql);

		if($result->num_rows > 0){
			echo "<h2> Here are the events: </h2> <br>";
        	$counter = 0;

        	while($row = $result->fetch_assoc()){
        		++$counter;
        		echo "<h3>Event #" . $counter . "</h3>";
        		echo "Event ID: " . $row["event_id"] . "<br>Title: " . $row["title"] . "<br>Description: " . $row["description"] . "<br>Start Time: " .$row["start_time"] . "<br>End Time: " . $row["end_time"] . "<br>Location: " . $row["location_name"] . "<br>Zipcode: " . $row["zipcode"];
        		echo "<br><br>";
        	}
		}
		else{
			echo "<h3> There are no events within that timeframe </h3>";
		}


		$conn->close();
	}
}

echo "</br>";
echo '<form action="http://localhost:8888/FindFolks/viewPublicInfo.php">';
echo "<button>Back</button>";
echo "</form>";


?>