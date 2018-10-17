<?php
	include "dbh.php";
	session_start();
?>

<!DOCTYPE html>
	<head>
		<title>Add Friends</title>
	</head>
	<body>
		<h2>Add New Friends</h2>
		<form method="POST">
			<label>Add User:</label><br>
			<input type="text" name="friend" placeholder="Username">
			<input type="submit" name="submit" value="Add">
		</form>
	</body>
</html>

<?php
	
	$username = $_SESSION["username"];

	if (isset($_POST["submit"])){
		if( empty($_POST["friend"]) ){
			echo "<script>
	            		if (confirm('Please enter all fields') == true) {
	                		window.location.href = 'http://localhost:8888/FindFolks/addFriends.php';
	            		} else {
	                		window.location.href = 'http://localhost:8888/FindFolks/addFriends.php';
	            		}
	            
	        		</script>";
		}
		else{
			$friend = $_POST["friend"];

			$sql = "SELECT username FROM member WHERE username = '$friend'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();

			// echo $row["username"];
			// echo $username;

			if(!$row){
				echo "<script>
	            		if (confirm('User does not exist') == true) {
	                		window.location.href = 'http://localhost:8888/FindFolks/addFriends.php';
	            		} else {
	                		window.location.href = 'http://localhost:8888/FindFolks/addFriends.php';
	            		}
	            
	        		</script>";
			}
			else{
				if($row["username"] == $username){
					echo "<script>
	            		if (confirm('You can not add yourself') == true) {
	                		window.location.href = 'http://localhost:8888/FindFolks/addFriends.php';
	            		} else {
	                		window.location.href = 'http://localhost:8888/FindFolks/addFriends.php';
	            		}
	            
	        		</script>";

				}
				else{
					$sql = "SELECT * FROM friend WHERE friend_of = '$username' AND friend_to ='$friend' ";
					$result = $conn->query($sql);
					$row = $result->fetch_assoc();
					if (!row){
						$sql = "INSERT INTO friend (friend_of, friend_to) VALUES ('$username', '$friend') ";
						$result = $conn->query($sql);
						$row = $result->fetch_assoc();
						echo "<script>
			            		if (confirm('Successfully added as friend') == true) {
			                		window.location.href = 'http://localhost:8888/FindFolks/addFriends.php';
			            		} else {
			                		window.location.href = 'http://localhost:8888/FindFolks/addFriends.php';
			            		}
			            
			        		</script>";
					}
					else{
						echo "<script>
			            		if (confirm('You are already friends with this person') == true) {
			                		window.location.href = 'http://localhost:8888/FindFolks/addFriends.php';
			            		} else {
			                		window.location.href = 'http://localhost:8888/FindFolks/addFriends.php';
			            		}
			            
			        		</script>";
					}
				}	
			}
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