<!DOCTYPE html>
<html>
<head>
	<title>Student Information</title>
	<link rel="stylesheet" href="style2.css">
    <!-- Script for the event handlers    -->
	<script type = "text/javascript"  src = "validateSignUp.js" > </script>	
</head>
<body>
  <h3>Student Information</h3>
  	<ul>
			<!--Tool bar for navigation which include about, menu, reviews, locations -->
			<li> <a href="signup.php" target="blank">Student Information &nbsp; &nbsp; &nbsp; &nbsp;</a></li>  					
			<li> <a href="scoreboard.php" target="blank">List all Students &nbsp; &nbsp; &nbsp; &nbsp;</a></li>    
      <li> <a href="course_signup.php" target="blank">Add Course &nbsp; &nbsp; &nbsp; &nbsp;</a></li>    
     	<li> <a href="course_list.php" target="blank">View Courses &nbsp; &nbsp; &nbsp; &nbsp;</a></li>  
      <li> <a href="courseandstudent.php" target="blank">View Courses and Students &nbsp; &nbsp; &nbsp; &nbsp;</a></li>  
      <li> <a href="courseroster.php" target="blank">Course Roster &nbsp; &nbsp; &nbsp; &nbsp;</a></li>  

  </ul>

<?php

  require_once('connect.php');
  // Connect to the database
  
  // Define database connection constants
  

  $dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
  if (!$dbc) {
    die('Could not connect: ' . mysql_error());
  }
 // or die("Error connecting to database server");


  //mysql_select_db($DBNAME, $dbc)
   // or die("Error selecting database: $DBNAME");

  //echo 'Successfully connected to database!';


  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
   $sid = $_POST['sid'];
   echo $sid;
  $first_name = $_POST['first_name'];
   echo $first_name;
  $last_name = $_POST['last_name'];
  echo $last_name;
  $email = $_POST['email'];
  echo $email;
  $major = $_POST['major']; 
  echo $major; 
  $dob = $_POST['dob'];
  echo $dob;


    if (!empty($sid)) {
  
      // Make sure someone isn't already regist
      $query = "SELECT * FROM cs340_hw1 WHERE sid = '$sid'";
      $data = mysqli_query($dbc, $query);
  
 // if(!$data){
   // echo "You're not connected!";
  //} else{
   // echo "connected.";
  //}
      if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        echo '<p>attempting to insert</p>';
         $query = "INSERT INTO cs340_hw1 (sid, first_name, last_name, email, major, dob) VALUES ('$sid', '$first_name', '$last_name', '$email', '$major', '$dob')";

        $var = mysqli_query($dbc, $query);
     if ($var) {
        
      echo '<p>Your new account has been successfully created. You\'re now ready to log in.</p>';
      echo '<a href="login.php" target="blank">Log in &nbsp; &nbsp; &nbsp; &nbsp;</a>';
     }
     else{
       echo '<p>Failure</p>';
     }
        mysqli_close($dbc);
        exit();
      }
      else {
  echo $sid;
  echo $first_name;
        // An account already exists for this username, so display an error message
        echo '<p class="error">An account already exists for this student id. Please use a different student id.</p>';
        $sid = "";
      }
    }
    else {
      echo '<p class="error">You must enter all of the sign-up data.</p>';
    }
  }

  mysqli_close($dbc);
?>

  <p>Please enter your student information. All fields are required except major.</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      <legend>Registration Info</legend>
      <label for="username">Student ID:</label>
      <input type="text" id="sid" name="sid" value="<?php if (!empty($sid)) echo $sid; ?>" /><br />
      
      <label for="first_name">First name:</label>
      <input type="text" id="first_name" name="first_name" value="<?php if (!empty($first_name)) echo $first_name; ?>" /><br />   

      <label for="last_name">Last Name:</label>
      <input type="text" id="last_name" name="last_name" value="<?php if (!empty($last_name)) echo $last_name; ?>"/><br />  
      
      <label for="address">Email:</label>
      <input type="text" id="email" name="email" value="<?php if (!empty($email)) echo $email; ?>"/><br /> 
  
      <label for="major">Major:</label>
      <input type="text" id="major" name="major" /><br /> 

      <label for="dob">Date of Birth:</label>
      <input type="date" id="major" name="dob" value="<?php if (!empty($email)) echo $email; ?>"/><br /> 

    </fieldset>
    <input type="submit" value="Sign Up" name="submit" />
  </form>
</body> 
</html>
