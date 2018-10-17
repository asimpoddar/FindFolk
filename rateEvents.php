<?php

include "dbh.php";
session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Rate Events</title>
	</head>
	<body>
		<h2>Rate using the event ID:</h2> <br>
		<form method="POST">
			<label>Event ID: </label><br>
			<input type="text" name="event_id" placeholder="Event ID"> <br>
			
			<label>Rating: </label><br>
			<input type="text" name="rating" placeholder="Rating"> <br>

			<input name="submit" type="submit" value=" Rate ">
		</form>
	</body>
</html>

<?php
	$event_id = $_POST["event_id"];
	$rating = $_POST["rating"];

	if (isset($_POST["submit"])){
		if ( empty($_POST["event_id"]) || empty($_POST["rating"]) ){
			echo "<script>
	            		if (confirm('Please enter all fields') == true) {
	                		window.location.href = 'http://localhost:8888/FindFolks/rateEvents.php';
	            		} else {
	                		window.location.href = 'http://localhost:8888/FindFolks/rateEvents.php';
	            		}
	            
	        		</script>";
		}
		else{
			$sql = "SELECT rating FROM sign_up WHERE event_id = '$event_id'";
			$result = $conn->query($sql);
			if($result->num_rows <= 0){
				echo "<script>
	            		if (confirm('Event not found') == true) {
	                		window.location.href = 'http://localhost:8888/FindFolks/rateEvents.php';
	            		} else {
	                		window.location.href = 'http://localhost:8888/FindFolks/rateEvents.php';
	            		}
	            
	        		</script>";
			}
			else{
				if ($rating < 1 || $rating >5){
					echo "<script>
	            		if (confirm('Invalid Rating') == true) {
	                		window.location.href = 'http://localhost:8888/FindFolks/rateEvents.php';
	            		} else {
	                		window.location.href = 'http://localhost:8888/FindFolks/rateEvents.php';
	            		}
	            
	        		</script>";
				}
				else{
					$sql = "UPDATE sign_up SET rating = '$rating' WHERE event_id = '$event_id'";
					$result = $conn->query($sql);
					echo "<script>
	            		if (confirm('Successfully Rated') == true) {
	                		window.location.href = 'http://localhost:8888/FindFolks/rateEvents.php';
	            		} else {
	                		window.location.href = 'http://localhost:8888/FindFolks/rateEvents.php';
	            		}
	            
	        		</script>";
				}
			}
		}
	}

	echo "<br><br><br>";
	echo '<form action="http://localhost:8888/FindFolks/userProfilePage.php">';
	echo "<button>Go Back</button>";
	echo "</form>";
	echo '<form action="http://localhost:8888/FindFolks/logout.php">';
	echo "<button>Logout</button>";
	echo "</form>";
?>