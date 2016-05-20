<?php
	session_start();
	include 'connect.php';
 
	if ((isset($_POST['userName'])) && (isset($_POST['password'])) ){
		$userName = $_POST['userName'];
		$password = $_POST['password'];
		$password = sha1($password);
		$dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
		if (!$dbc) {
			die('Could not connect: ');
		}
	
	
		$query = "SELECT * FROM Users WHERE userName='$userName' and password='$password'";
		$result = mysqli_query($dbc, $query);
	
		if (mysqli_num_rows($result) == 1) {
	
			// The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
			  $row = mysqli_fetch_array($result);
			  $_SESSION['firstName'] = $row['firstName'];
			  $_SESSION['valid_user'] = $row['userName'];
			}
		else {
          // The username/password are incorrect so set an error message
			echo "<p>Sorry, you must enter a valid username and password to log in.</p>";
		}
		mysqli_free_result($result);
		mysqli_close($dbc);
	}  

?>
<!DOCTYPE html>
<body>
<h1> Log in Page </h1>

<?php

	if (isset($_SESSION['valid_user'])) {
		echo " <h3> You are logged in as </h3><p> User: ".$_SESSION['valid_user'];
		echo "<p>Play and keep score!</p>";
		echo '<a href="phprockpaperscissors2.html" target="blank" >Play Game &nbsp; &nbsp; &nbsp; &nbsp;</a>';
		echo " <p> First Name: ".$_SESSION['firstName']; 
		echo "<p> <a href='logout.php'>Log out </a><br />";
	}
	else {
		if (isset($userName)) {
			// user tried but can't log in
			echo "<h2> Could not log you in </h2>";
		} else {
			// user has not tried
			echo " <h2> You need to log in </h2> ";
		}
		// Log in form

		echo " <form method='post' action='login.php' > ";
		echo " User name <input type='text' name='userName'> <br /> ";
		echo "  Password <input type='password' name='password' /> <br />";
		echo '<input type="submit" value="Log In" name="submit" />';
		echo "</form>";
	}	
?>
	<p>
	<p>
	<a href="signup.php">Sign Up Section </a>
	<ul>
			<!--Tool bar for navigation which include about, menu, reviews, locations -->
			<li> <a href ="login.php" target="_blank">login in &nbsp; &nbsp; &nbsp; &nbsp;</a></li> 
			<li> <a href ="logout.php" target="_blank">log out &nbsp; &nbsp; &nbsp; &nbsp;</a></li> 
			<li> <a href="signup.php" target="blank">sign up &nbsp; &nbsp; &nbsp; &nbsp;</a></li>  					
			<li> <a href="phprockpaperscissors2.html" target="blank">Play Game &nbsp; &nbsp; &nbsp; &nbsp;</a></li>
	</ul>
</body>
</html>		
			
		

