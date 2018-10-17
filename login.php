<?php

include "dbh.php";

if(isset($_POST["submit"])){

	if( empty($_POST["username"]) || empty($_POST["password"]) ){

		echo "<script>
    		if (confirm('Please fill out all fields') == true) {
        		window.location.href = 'http://localhost:8888/FindFolks/index.php';
    		} else {
    			window.location.href = 'http://localhost:8888/FindFolks/index.php';
    		}
			
		</script>";

	} else{

		$username = $_POST["username"];
		$password = md5($_POST["password"]);
		
		$sql = "SELECT * FROM member WHERE username='$username' and password='$password'";
		$result = $conn->query($sql);
		$tuple = $result->fetch_assoc();

		//Wrong password
		if(!$tuple){
			//Goes back to first page
			echo "<script>
	    		if (confirm('Incorrect Login Information') == true) {
	        		window.location.href = 'http://localhost:8888/FindFolks/index.php';
	    		} else {
	    			window.location.href = 'http://localhost:8888/FindFolks/index.php';
	    		}
			</script>";
			// header("Location: http://localhost:8888/FindFolks/index.php");
			// echo "Incorrect Password";
			// exit();

		} else{
			session_start();
			$_SESSION['username'] = $username;
			header("Location: http://localhost:8888/FindFolks/userProfilePage.php");
		}

	}

}
