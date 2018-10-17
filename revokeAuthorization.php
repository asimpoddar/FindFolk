<?php
	include "dbh.php";
	session_start();
?>

<!DOCTYPE html>
	<head>
		<title>Revoke Authorization</title>
	</head>
	<body>
		<h2>Revoke Authorization</h2>
		<h3>Revokes authorization for groups you have authorization for</h3>
		<form method="POST">
			<label>User</label>
			<input type="text" name="user" placeholder="Username"> <br>

			<label>Group ID</label>
			<input type="text" name="group_id" placeholder="Group ID"> <br>

			<input name="submit" type="submit" value=" Revoke ">
		</form>
	</body>
</html>

<?php
	$username = $_SESSION["username"];

	if (isset($_POST["submit"])){
		if( empty($_POST["user"]) || empty($_POST["group_id"]) ){
			echo "<script>
	            		if (confirm('Please enter all fields') == true) {
	                		window.location.href = 'http://localhost:8888/FindFolks/revokeAuthorization.php';
	            		} else {
	                		window.location.href = 'http://localhost:8888/FindFolks/revokeAuthorization.php';
	            		}
	            
	        		</script>";
		}
		else{
			$user = $_POST["user"];
			$group_id = $_POST["group_id"];

			$sql = "SELECT group_id FROM belongs_to WHERE username = '$username' AND authorized = '1'";
			$result = $conn->query($sql);
			$authorized = FALSE;

			if($result->num_rows <= 0){
				echo "<script>
			    		if (confirm('You are not authorized to do this action') == true) {
			        		window.location.href = 'http://localhost:8888/FindFolks/revokeAuthorization.php';
			    		} else {
			    			window.location.href = 'http://localhost:8888/FindFolks/revokeAuthorization.php';
			    		}
					</script>";
			}
			else{
				while ($row = $result->fetch_assoc()) {
					if($row["group_id"] == $group_id){
						$authorized = TRUE;	
					}
				}
				if ($authorized == TRUE){
					$sql="SELECT authorized FROM belongs_to WHERE group_id = '$group_id' AND username = '$user'";
					$result = $conn->query($sql);
					$row = $result->fetch_assoc();
					if(!$row){
						echo "<script>
				    		if (confirm('User is not a part of this group') == true) {
				        		window.location.href = 'http://localhost:8888/FindFolks/revokeAuthorization.php';
				    		} else {
				    			window.location.href = 'http://localhost:8888/FindFolks/revokeAuthorization.php';
				    		}
						</script>";
					}
					else{
						$sql = "UPDATE belongs_to SET authorized = '0' WHERE group_id = '$group_id' and username = '$user'";
						$result = $conn->query($sql);
						echo "<script>
				    		if (confirm('Authorization revoked') == true) {
				        		window.location.href = 'http://localhost:8888/FindFolks/revokeAuthorization.php';
				    		} else {
				    			window.location.href = 'http://localhost:8888/FindFolks/revokeAuthorization.php';
				    		}
						</script>";
					}
				}
				else{
					echo "<script>
			    		if (confirm('You are not authorized to do this action') == true) {
			        		window.location.href = 'http://localhost:8888/FindFolks/revokeAuthorization.php';
			    		} else {
			    			window.location.href = 'http://localhost:8888/FindFolks/revokeAuthorization.php';
			    		}
					</script>";
				}

			}
		}

	}


	echo "<br><br>";
	echo '<form action="http://localhost:8888/FindFolks/userProfilePage.php">';
	echo "<button>Go Back</button>";
	echo "</form>";
	echo '<form action="http://localhost:8888/FindFolks/logout.php">';
	echo "<button>Logout</button>";
	echo "</form>";	

?>