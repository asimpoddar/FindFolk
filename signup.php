<?php

include 'dbh.php';



if ( isset($_POST["signup"]) ){
	if( empty($_POST["first_name"]) || empty($_POST["last_name"]) || empty($_POST["username"]) || empty($_POST["zipcode"]) 
		|| empty($_POST["password"]) || empty($_POST["email"]) ){
			echo "<script>
	    		if (confirm('Please Fill Out All Fields') == true) {
	        		window.location.href = 'http://localhost:8888/FindFolks/index.php';
	    		} else {
	    			window.location.href = 'http://localhost:8888/FindFolks/index.php';
	    		}
				
			</script>";
	} 
	else{
		if (strlen($_POST["zipcode"]) != 5 || !ctype_digit($_POST["zipcode"])){
			echo "<script>
	    		if (confirm('Invalid Zipcode') == true) {
	        		window.location.href = 'http://localhost:8888/FindFolks/index.php';
	    		} else {
	    			window.location.href = 'http://localhost:8888/FindFolks/index.php';
	    		}
				
			</script>";
		} 
		else {
			if (strlen($_POST["password"])< 6){
				echo "<script>
		    		if (confirm('Password Must Be At Least 6 Characters Long') == true) {
		        		window.location.href = 'http://localhost:8888/FindFolks/index.php';
		    		} else {
		    			window.location.href = 'http://localhost:8888/FindFolks/index.php';
		    		}
					
				</script>";
			} 
			else {
				$username = $_POST["username"];
				$password = md5($_POST["password"]);

				$confirmUsername = "SELECT * FROM member WHERE username = '$username'";
				$result = $conn->query($confirmUsername);
				$tuple = $result->fetch_assoc();

				if (!$tuple){
					$first_name = $_POST["first_name"];
					$last_name = $_POST["last_name"];
					$zipcode = $_POST["zipcode"];
					$email = $_POST["email"];

				// 	$_SESSION["username"] = $username;
				// 	$_SESSION["password"] = $password;
				// 	$_SESSION["first_name"] = $first_name;
				// 	$_SESSION["last_name"] = $last_name;
				// 	$_SESSION["email"] = $email;
				// 	$_SESSION["zipcode"] = $zipcode;

				// 	header("Location: http://localhost:8888/FindFolks/createAccount.php");

					$sql = "INSERT INTO member (username, password, firstname, lastname, email, zipcode) VALUES ( '$username', '$password', '$first_name', '$last_name', '$email', '$zipcode' )";


					if ($conn->query($sql) === TRUE) {
					    echo "New member added";
					} else {
					    echo "Error: " . $sql . "<br>" . $conn->error;
					}

					$conn->close();

					header("Location: http://localhost:8888/FindFolks/index.php");

				} 
				else{
					echo "<script>
		    			if (confirm('Username Already Exists') == true) {
		        			window.location.href = 'http://localhost:8888/FindFolks/index.php';
		    			} else {
		    				window.location.href = 'http://localhost:8888/FindFolks/index.php';
		    			}
					</script>";
				}
			}
		}  
	}
}

?>