<?php
	include "dbh.php";
	session_start();

 	$group_id = (int)$_POST["c_gID"];
 	$title = $_POST["c_title"];
 	$description = $_POST["c_descrip"];
 	$start_time = $_POST["c_start"];
 	$end_time = $_POST["c_end"];
 	$location = $_POST["c_loc"];
 	$zipcode = $_POST["c_zip"];
	$username = $_SESSION["username"];

	// if (isset($_POST("submit"))){
		if ( empty($_POST["c_gID"]) || empty($_POST["c_title"]) || empty($_POST["c_descrip"]) || empty($_POST["c_start"]) || empty($_POST["c_end"]) ||empty($_POST["c_loc"]) || empty($_POST["c_zip"]) ){
			echo "<script>
	            		if (confirm('Please enter all fields') == true) {
	                		window.location.href = 'http://localhost:8888/FindFolks/createEventForm.php';
	            		} else {
	                		window.location.href = 'http://localhost:8888/FindFolks/createEventForm.php';
	            		}
	            
	        		</script>";
		}
		else{
			$sql = "SELECT group_id FROM belongs_to WHERE username = '$username' AND authorized = '1'";
			$result = $conn->query($sql);
			$authorized = FALSE;
			if($result->num_rows > 0){
				while ($row = $result->fetch_assoc()) {
					if($row["group_id"] == $group_id){
						$authorized = TRUE;	
					}
				}
				if ($authorized == TRUE){
					//Actuallly create the event
					
					$sql = "SELECT location_name, zipcode FROM location WHERE location_name = '$location' AND zipcode = '$zipcode'";
					$result = $conn->query($sql);
					$row = $result->fetch_assoc();
					if($result->num_rows <= 0){
						echo "<script>
		            		if (confirm('Invalid location and/or zipcode!') == true) {
		                		window.location.href = 'http://localhost:8888/FindFolks/createEventForm.php';
		            		} else {
		                		window.location.href = 'http://localhost:8888/FindFolks/createEventForm.php';
		            		}
		            
		        		</script>";
					}
					else{
						if($end_time <= $start_time){
							echo "<script>
		            		if (confirm('Invalid Times') == true) {
			                		window.location.href = 'http://localhost:8888/FindFolks/createEventForm.php';
			            		} else {
			                		window.location.href = 'http://localhost:8888/FindFolks/createEventForm.php';
			            		}
			            
			        		</script>";
						}


						$sql = "INSERT INTO an_event (title, description, start_time, end_time, location_name, zipcode) VALUES ('$title', '$description', '$start_time', '$end_time', '$location', '$zipcode')";
						$result = $conn->query($sql);
						echo "<script>
				    		if (confirm('You have successfully created an event') == true) {
				        		window.location.href = 'http://localhost:8888/FindFolks/userProfilePage.php';
				    		} else {
				    			window.location.href = 'http://localhost:8888/FindFolks/userProfilePage.php';
				    		}
						</script>";
					}
				}
				else{
					echo "<script>
			    		if (confirm('You are not authorized to create an event for this group') == true) {
			        		window.location.href = 'http://localhost:8888/FindFolks/userProfilePage.php';
			    		} else {
			    			window.location.href = 'http://localhost:8888/FindFolks/userProfilePage.php';
			    		}
					</script>";
				}
			}
			else{
				echo "<script>
			    		if (confirm('You are not authorized to create an event for this group') == true) {
			        		window.location.href = 'http://localhost:8888/FindFolks/userProfilePage.php';
			    		} else {
			    			window.location.href = 'http://localhost:8888/FindFolks/userProfilePage.php';
			    		}
					</script>";
			}
		}
	// }


?>