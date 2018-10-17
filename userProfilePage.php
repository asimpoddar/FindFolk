<!DOCTYPE html>
<?php
	include "dbh.php";
	session_start();
	$username = $_SESSION["username"];
	$sql = "SELECT firstname FROM member WHERE username = '$username'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$conn->close();
?>

	<head>
		<title>Homepage</title>		
	</head>
	<body>
		<h2>Welcome <?php echo $row["firstname"]; ?>!</h2>
		<h3>Choose any of the following options: </h3>
		<ul>
			<li>
				<a href="viewUpcomingEvents.php">View Your Upcoming Events </a>
			</li>
			<li>
				<a href="eventSignup.php">Sign up for Events</a>
			</li>
			<li>
				<a href="createEventForm.php">Create an Event </a>
			</li>
			<li>
				<a href="searchEventsOfInterest.php">View Events of Interest </a>
			</li>
			<li>
				<a href="rateEvents.php">Rate Events</a>
			</li>
			<li>
				<a href="avgRatings.php">View Average Ratings</a>
			</li>
			<li>
				<a href="seeFriendEvents.php">View Friend's Events </a>
			</li>

			<br>Extra Features</br>
			<li>
				<a href="createGroup.php">Create Groups</a>
			</li>
			<li>
				<a href="addFriends.php">Add Friends</a>
			</li>
			<li>
				<a href="grantAuthorization.php">Grant Authorization</a>
			</li>
			<li>
				<a href="revokeAuthorization.php">Revoke Authorization</a>
			</li>
		</ul>
		
		<br><br><br>


	
		<form action="http://localhost:8888/FindFolks/index.php">
		<button>Logout</button>
		</form>

	</body>



</html>