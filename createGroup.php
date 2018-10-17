<?php
	include "dbh.php";
	session_start();
?>

<!DOCTYPE html>
	<head>
		<title>Create a Group</title>
	</head>
	<body>
		<h2>Create a Group</h2>
		<form method="POST">
			<label>Group Name </label><br>
			<input type="text" name="group_name" placeholder="Group Name"><br><br>

			<label>Description</label><br>
			<textarea rows="7" cols="32" name="description" placeholder="Your description here..."></textarea><br>

			<input name="submit" type="submit" value=" Create ">
		</form>
	</body>
</html>

<?php
	$username = $_SESSION["username"];

	if (isset($_POST["submit"])){
		if( empty($_POST["group_name"]) || empty($_POST["description"]) ){
			echo "<script>
	            		if (confirm('Please enter all fields') == true) {
	                		window.location.href = 'http://localhost:8888/FindFolks/createGroup.php';
	            		} else {
	                		window.location.href = 'http://localhost:8888/FindFolks/createGroup.php';
	            		}
	            
	        		</script>";
		}
		else{
			$group_name = $_POST["group_name"];
			$description = $_POST["description"];

			$sql = "INSERT INTO a_group (group_name, description, creator) VALUES ('$group_name', '$description', '$username')";
			$result = $conn->query($sql);
			echo "<script>
	            		if (confirm('Group created') == true) {
	                		window.location.href = 'http://localhost:8888/FindFolks/createGroup.php';
	            		} else {
	                		window.location.href = 'http://localhost:8888/FindFolks/createGroup.php';
	            		}
	            
	        		</script>";

		}
	}







	echo "<br>";
	echo '<form action="http://localhost:8888/FindFolks/userProfilePage.php">';
	echo "<button>Go Back</button>";
	echo "</form>";
	echo '<form action="http://localhost:8888/FindFolks/logout.php">';
	echo "<button>Logout</button>";
	echo "</form>";	

?>