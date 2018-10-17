<?php

	include "dbh.php";
	session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sign up for Events</title>
	</head>
	<body>
		<h2>Sign up using the event ID:</h2> <br>
		<form method="POST">
			<label>Event ID: </label><br>
			<input type="text" name="event_id" placeholder="Event ID"> <br>

			<input name="submit" type="submit" value=" Sign Up ">
		</form>
	</body>
</html>


<?php
	$username = $_SESSION['username'];
	$event_id = $_POST['event_id'];

	if(isset($_POST['submit'])){
		if(empty($_POST['event_id'])){
			echo "<script>
	            		if (confirm('Please enter all fields') == true) {
	                		window.location.href = 'http://localhost:8888/FindFolks/eventSignup.php';
	            		} else {
	                		window.location.href = 'http://localhost:8888/FindFolks/eventSignup.php';
	            		}
	            
	        		</script>";
		}
		else{
			$sql = "SELECT * FROM an_event WHERE event_id = '$event_id'";
			$result = $conn->query($sql);
			if($result->num_rows <= 0){
				echo "<script>
	            		if (confirm('Event not found') == true) {
	                		window.location.href = 'http://localhost:8888/FindFolks/eventSignup.php';
	            		} else {
	                		window.location.href = 'http://localhost:8888/FindFolks/eventSignup.php';
	            		}
	            
	        		</script>";
			}
			else{
				$sql = "INSERT INTO sign_up (event_id, username, rating) VALUES ('$event_id','$username',0)";
				$result = $conn->query($sql);
				echo "<script>
	            		if (confirm('Successfully signed up') == true) {
	                		window.location.href = 'http://localhost:8888/FindFolks/eventSignup.php';
	            		} else {
	                		window.location.href = 'http://localhost:8888/FindFolks/eventSignup.php';
	            		}
	            
	        		</script>";
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