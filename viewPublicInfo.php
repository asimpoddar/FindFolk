<!DOCTYPE html>
	<head>
		<meta charset="UTF-8">
		<title> Public Info</title>
	</head>
	<body>
		<h1> View Public info</h1>
		<h2> Search for events by date: </h2>
		<form action="searchViaDate.php" method="GET"> 
			<label>From:</label>
			<input id="fromTime" name="fromTime" placeholder="yyyy/mm/dd" type="datetime-local">
			<label>To:</label>
			<input id="toTime" name="toTime" placeholder="yyyy/mm/dd" type="datetime-local">
			<input type="submit" value="Search">
		</form>

		<br><br><br>

		<h2> Search by interest name: </h2>
		<form action="searchViaInterest.php" method="GET"> 
			<label>Interest Name</label>
			<input name="interestName" placeholder="Name" type="text">
			<input type="submit" value="Search">
		</form>

		<br><br>

		<form action="http://localhost:8888/FindFolks/index.php">
			<button>Back to main page</button>
		</form>
	</body>
</html>