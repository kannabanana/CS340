<!DOCTYPE html>
<html>
<head>
	<title>Course Sign Up</title>
	<link rel="stylesheet" href="style2.css">
    <!-- Script for the event handlers    -->
	<script type = "text/javascript"  src = "validateSignUp.js" > </script>	
</head>
<body>
  <h3>Course Sign Up</h3>
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
   $description = $_POST['course'];    //just the course description
   $term = $_POST['term'];
   $grade = $_POST['grade'];
   //get info about dept
   if($description == "Intro Programming")
   {
      $course_num = "161";
      $department = "CS";
   }

   if($description == "Intermediate Programming")
   {
      $course_num = "162";
      $department = "CS";
   }
   if($description == "Data Structures")
   {
      $course_num = "261";
      $department = "CS";
   }
    if($description == "Writing")
   {
      $course_num = "101";
      $department = "ENG";
   }
     if($description == "Western History")
   {
      $course_num = "101";
      $department = "HST";
   }
     if($description == "Discrete Math")
   {
      $course_num = "231";
      $department = "MTH";
   }
     if($description == "Calculus 1")
   {
      $course_num = "251";
      $department = "MTH";
   }
     if($description == "Calculus 2")
   {
      $course_num = "252";
      $department = "MTH";
   }
     if($description == "Fitness")
   {
      $course_num = "101";
      $department = "PE";
   }
    if($description == "Management")
   {
      $course_num = "201";
      $department = "BUS";
   }
        $query = "INSERT INTO enrollment (grade, term, sid, department, course_num) VALUES ('$grade','$term','$sid','$department','$course_num')";
//$query = "INSERT INTO enrollment (sid, department, course_number, grade, term) VALUES ('$sid', '$department', '$course_number', '$grade', '$term')";

        $var = mysqli_query($dbc, $query);
     if ($var) {
        
      echo '<p> We have inputed your course. Please click the link below to enter another course</p>';
      echo '<a href="course_signup.php" target="blank">Input another Course &nbsp; &nbsp; &nbsp; &nbsp;</a>';
     }
     else{
       echo '<p>Failure. Could not add your course.</p>';
     }
        mysqli_close($dbc);
        exit();

  }

  mysqli_close($dbc);
?>

  <p>Please enter your Student ID select the courses you would like sign up for. </p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      <legend>Course Sign Up</legend>
      <label for="username">Student ID:</label>
      <input type="text" id="sid" name="sid" value="<?php if (!empty($sid)) echo $sid; ?>" /><br />


      <!-- choose a class --> 
    <fieldset>
        <legend>Please sign up for a course: </legend>
      <input type="radio" name="course" value="Intro Programming"> CS 161<br>
      <input type="radio" name="course" value="Intermediate Programming"> CS 162<br>
      <input type="radio" name="course" value="Data Structures"> CS 261<br>
      <input type="radio" name="course" value="Calculus 1"> MTH 251<br>
      <input type="radio" name="course" value="Calculus 2"> MTH 252<br>
      <input type="radio" name="course" value="Discrete Math"> MTH 231<br>
      <input type="radio" name="course" value="Writing"> ENG 101<br>
      <input type="radio" name="course" value="Western History"> HST 101<br>
      <input type="radio" name="course" value="Fitness"> PE 101<br>
      <input type="radio" name="course" value="Management"> BUS 201<br>
    </fieldset>


    <!-- second input (term)  -->    
    <fieldset>
      <legend>Please enter the term: </legend>
       <input type="radio" name="term" value="FA"> Fall <br>
      <input type="radio" name="term" value="WI"> Winter<br>
      <input type="radio" name="term" value="SP"> Spring<br>
      <input type="radio" name="term" value="SU"> Summer<br>
    </fieldset>

 <!-- third input (grade)  -->    
    <fieldset>
    <legend>Input grade (optional): </legend>

      <label for="grade">Grade:</label>
      <input type="text" id="grade" name="grade" /><br /> 

    </fieldset>

    </fieldset>
    <input type="submit" value="Sign Up" name="submit" />
  </form>
</body> 
</html>
