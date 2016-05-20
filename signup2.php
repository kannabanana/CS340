<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="style2.css">
    <!-- Script for the event handlers    -->
	<script type = "text/javascript"  src = "validateSignUp.js" > </script>	
</head>
<body>
  <h3>Sign Up</h3>
  	<ul>
			<!--Tool bar for navigation which include about, menu, reviews, locations -->
			<li> <a href ="login2.php" target="_blank">login in &nbsp; &nbsp; &nbsp; &nbsp;</a></li> 
			<li> <a href ="logout2.php" target="_blank">log out &nbsp; &nbsp; &nbsp; &nbsp;</a></li> 
			<li> <a href="signup2.php" target="blank">sign up &nbsp; &nbsp; &nbsp; &nbsp;</a></li>  					
			<li> <a href="phprockpaperscissors.html" target="blank">Play Game &nbsp; &nbsp; &nbsp; &nbsp;</a></li>
	</ul>

<?php

  require_once('connect.php');
  // Connect to the database
  $dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
  
  
  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
	$userName = $_POST['userName'];
    $password1 = $_POST['password1'];
	
	if(!preg_match('/^[A-Z][a-z|A-Z]{0,20}[0-9][0-9]$/',$password1))
	{
			echo '<p>The password should begin with a capital and end with two digit</p>';
			mysqli_close($dbc);
	}
	
	$password1 = sha1($password1);
    $firstName = $_POST['firstName'];	
	$lastName = $_POST['lastName'];
	

    if (!empty($userName) && !empty($password1)) {
	
      // Make sure someone isn't already registered using this username
      $query = "SELECT * FROM Users WHERE userName = '$userName'";
      $data = mysqli_query($dbc, $query);
	if($data){
		echo "You're connected!";
	} else{
		echo "Not connected sorry.";
	}
      if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        $query = "INSERT INTO Users (userName, password, firstName, lastName) VALUES ('$userName', '$password1', '$firstName', '$lastName')";
        $var = mysqli_query($dbc, $query);
		 if ($var) {
        // Confirm success with the user
			echo '<p>Your new account has been successfully created. You\'re now ready to log in.</p>';
			echo '<a href="login2.php" target="blank">Log in &nbsp; &nbsp; &nbsp; &nbsp;</a>';
		 }
		 else{
			 echo '<p>Failure</p>';
		 }
        mysqli_close($dbc);
        exit();
      }
      else {
		  echo "3";
	echo $userName;
	echo $password1;
        // An account already exists for this username, so display an error message
        echo '<p class="error">An account already exists for this username. Please use a different address.</p>';
        $userName = "";
      }
    }
    else {
      echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
    }
  }

  mysqli_close($dbc);
?>

  <p>Please enter your username and desired password to sign up for an account.</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      <legend>Registration Info</legend>
      <label for="username">Username:</label>
      <input type="text" id="userName" name="userName" value="<?php if (!empty($userName)) echo $userName; ?>" /><br />
      <label for="password1">Password:</label>
      <input type="password" id="password1" name="password1" /><br />
      <label for="firstname">First name:</label>
      <input type="text" id="firstName" name="firstName" /><br />    
	  <label for="lastname">Last Name:</label>
      <input type="text" id="lastName" name="lastName" /><br />   	  
    </fieldset>
    <input type="submit" value="Sign Up" name="submit" />
  </form>
</body> 
</html>
