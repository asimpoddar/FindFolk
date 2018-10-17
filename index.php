<!DOCTYPE html>
	<head>
		<meta charset="UTF-8">
		<title> Find Folks </title>
	</head>
	<body>
		<h1> Welcome to FindFolks! </h1>
		
		<br>
	
		<h3> View Public Events </h3>
		<form action="viewPublicInfo.php">
			<input name="submit" type="submit" value="View">
		</form>

		<h3> Login </h3>
		<form action="login.php" method="POST">
			<label>Username: </label>
			<input type="text" name="username" placeholder="Username"> <br>
			<label>Password: </label>
			<input type="password" name="password" placeholder="Password"> <br>
			<label>First Name: </label>
			<input name="submit" type="submit" value=" Login ">
		</form>
		
		<br>

		<h3> Sign Up For An Account </h3>
		<form action="signup.php" method="POST">
			<label>Username: </label>
			<input type="text" name="username" placeholder="Username"> <br>
			<label>Password: </label>
			<input type="password" name="password" placeholder="Password"> <br>
			<label>First Name: </label>
			<input type="text" name="first_name" placeholder="FirstName"> <br>
			<label>Last Name: </label>
			<input type="text" name="last_name" placeholder="LastName"> <br>
			<label>E-mail Address: </label>
			<input type="text" name="email" placeholder="Email Address"> <br>
			<label>Zipcode: </label>
			<input type="text" name="zipcode" placeholder="Zipcode"> <br>
			<input name="signup" type="submit" value= " Sign Up ">
		</form>
	</body>




</html>

