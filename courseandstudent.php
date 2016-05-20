<!DOCTYPE html>
<html>
<head>
  <title>Course Sign Up</title>
  <link rel="stylesheet" href="style2.css">
    <!-- Script for the event handlers    -->
  <script type = "text/javascript"  src = "validateSignUp.js" > </script> 
</head>
<body>
  <h3>List of Courses and Students</h3>
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
  

  $query = "SELECT department,course_num,count(*) FROM enrollment GROUP BY department,course_num";

  if (!$query){
    echo'<p>There is no query</p>';
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


  mysqli_free_result($result);
  mysqli_close($conn);
  ?>



</body> 
</html>
