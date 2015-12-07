<html>
	<head>
		<title>Bevy</title>
	</head>
	<body background="img/login.jpg">
		<?php
			if (!isset($_POST['submit'])){
		?>
		<!-- The HTML login form -->
			<center>
			<br><br><br><br>
			<h1>Login</h1>
				<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
					Username: <input type="text" name="username" /><br />
					Password: <input type="password" name="password" /><br />
					<br>
					<input type="submit" name="submit" value="Login" />
				</form>
				<a href="register.php"> <button>Register</button> </a>
			</center>
		<?php
		} else {
			require_once("db_const.php");
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
				# check connection
				if ($mysqli->connect_errno) {
					echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
					exit();
				}
			 
				$username = $_POST['username'];
				$password = $_POST['password'];
			 
				$sql = "SELECT * from students WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
				$result = $mysqli->query($sql);
				if (!$result->num_rows == 1) {
					echo "<p>Invalid username/password combination</p>";
				} else {
					header("location: admin.php");
				}
			}
		?>		
	</body>
</html>