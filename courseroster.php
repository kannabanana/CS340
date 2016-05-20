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

// change the value of $dbuser and $dbpass to your username and password
  include 'connect.php'; 
  
  $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
  if (!$conn) {
    die('Could not connect: ' . mysql_error());
  }

  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
   $description = $_POST['course'];

   if($description == "Intro Programming")
   {
      $course_num = "161";
      echo $course_num;
      $department = "CS";
      echo $department;
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


  $query = "SELECT sid FROM enrollment WHERE department='$department' AND course_num='$course_num'";
  if (!$query){
    echo'<p>There is no query/p>';
  }
  $result = mysqli_query($conn, $query);
  if (!$result) {
    die("Query to show fields from table failed");
  }
  
  $fields_num = mysqli_num_fields($result);
  echo "<table border='1'><tr>";
  // printing table headers
  for($i=0; $i<$fields_num; ++$i) { 
    $field = mysqli_fetch_field($result); 
    echo "<td><b>{$field->name}</b></td>";
  }
  echo "</tr>\n";
  while($row = mysqli_fetch_row($result)) { 
    echo "<tr>";  
    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable  
    foreach($row as $cell)    
      echo "<td>$cell</td>";  
    echo "</tr>\n";
  }


 }
  mysqli_free_result($result);
  mysqli_close($conn);
  ?>




  <p>Please enter your Student ID to view the list of courses you are enrolled for. </p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
        <legend>Please select the course you want to see the list of students from: </legend>
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
    <input type="submit" value="Sign Up" name="submit" />
  </form>
</body> 
</html>
