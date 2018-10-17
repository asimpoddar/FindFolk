<!DOCTYPE html>
	<?php
		session_start();
	?>
	<head>
		<title>Create an Event</title>
	</head>
	<body>
		<h2>Create an Event</h2>
		<form action="createEvents.php" method="POST">
			
			<label>Group ID</label>
			<input name="c_gID" placeholder="Group ID" type="text" required>
			</br>
			</br>

			<label>Title</label>
			<input name="c_title" placeholder="Title" type="text" required>
			</br>
			</br>

			<label>Description</label>
			<input name="c_descrip" placeholder="Description" type="text" required>
			</br>
			</br>

			<label>Start Time</label>
			<input name="c_start" placeholder="Start Time" type="datetime-local" required>
			</br>
			</br>

			<label>End Time</label>
			<input name="c_end" placeholder="End Time" type="datetime-local" required>
			</br>
			</br>

			<label>Location Name</label>
			<input name="c_loc" placeholder="Location" type="text" required>
			</br>
			</br>

			<label>Zipcode</label>
			<input name="c_zip" placeholder="Zipcode" type="number" required>
			</br>
			</br>

			<input type="submit" name= "submit" value="Create">

		</form>

		<?php

		echo "<br>";
		echo '<form action="http://localhost:8888/FindFolks/userProfilePage.php">';
		echo "<button>Go Back</button>";
		echo "</form>";
		echo '<form action="http://localhost:8888/FindFolks/logout.php">';
		echo "<button>Logout</button>";
		echo "</form>";

		?>
	</body>
		
</html>