<?php

include "dbh.php";

if (isset($_GET["interestName"])){
	if (empty($_GET["interestName"])){
		echo "<script>
    		if (confirm('Please fill out interest name') == true) {
        		window.location.href = 'http://localhost:8888/FindFolks/viewPublicInfo.php';
    		} else {
    			window.location.href = 'http://localhost:8888/FindFolks/viewPublicInfo.php';
    		}
			
		</script>";
	}
	else{
		$interest = $_GET["interestName"];
		$sql = "SELECT about.group_id, group_name FROM about JOIN a_group WHERE about.group_id = a_group.group_id AND category = '$interest';";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			echo "<h2> The following groups have events that match your interest: </h2> <br>";
        	while($row = $result->fetch_assoc()){
        		echo "Group ID: " . $row["group_id"] . "<br>Group Name: " . $row["group_name"]; 
        		echo "<br><br>";
        	}
		}
		else{
			echo "<h3> There are no groups that share those interests. </h3>";
		}


		$conn->close();
	}


}


echo "</br>";
echo '<form action="http://localhost:8888/FindFolks/viewPublicInfo.php">';
echo "<button>Back</button>";
echo "</form>";

?>