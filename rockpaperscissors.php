<?php
	session_start();
	include 'connect.php'; 
	
	$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}



	 /*
	 $score_query = "SELECT score FROM Users WHERE userName = '$username'";
	
				if(!$score_query)
				{
					echo'<p>There is no query</p>';
				}
				$score_previous = mysqli_query($conn, $score_query);
				echo 'debug'. $username;
				if(!$score_previous)
				{
					echo'<p>There is no result in the sql</p>';
				}
	 
	
	$query = "SELECT * FROM Users";
	if (!$query){
		echo'<p>There is no query/p>';
	}
	$result = mysqli_query($conn, $query);
	
	//echo "resukt iS : " . $result;	
	
	if (!$result) {
		die("Query to show fields from table failed");
	} else{
		echo "ASDfasdf";
		$row = mysqli_fetch_array($result);
		echo $row['userName'];
		echo $row['password'];
		echo $row['score'];
		++$row['score'];
		echo $row['score'];
	}

*/

	

// change the value of $dbuser and $dbpass to your username and password
	
	$computer_random = rand(1,3);
	
	
	//function to play if the user is not logged in
	function rockpaperscissors_nostore($computer_random,$user)
	{
		if($user ==1)						//Rock
		{
			if($computer_random == 2)					//Paper
			{
				echo "<p>You Loose</p>";
				echo "<p>The computer choose paper</p>";
				echo '<a href="phprockpaperscissors2.html" target="blank" >Play Game Again &nbsp; &nbsp; &nbsp; &nbsp;</a>';
			}
			else if($computer_random == 3)				//Scissors
			{
				echo "<p>You Win..somehow</p>";
				echo "<p>The computer choose scissors</p>";
				echo '<a href="phprockpaperscissors2.html" target="blank" >Play Game Again &nbsp; &nbsp; &nbsp; &nbsp;</a>';
			}
			else						//Rock
			{
				echo "<p>Draw</p>";
				echo '<a href="phprockpaperscissors2.html" target="blank" >Play Game Again &nbsp; &nbsp; &nbsp; &nbsp;</a>';
			}
		}
	
		else if ($user ==2)				//Paper
		{
			if($computer_random==1)					//Rock
			{
				echo "<p>You Win..somehow</p>";
				echo "<p>The computer choose rock</p>";
				echo '<a href="phprockpaperscissors2.html" target="blank" >Play Game Again &nbsp; &nbsp; &nbsp; &nbsp;</a>';
			
			}	
			else if($computer_random ==3)
			{
				echo "<p>You Loose</p>";
				echo "<p>The computer choose scissors</p>";
				echo '<a href="phprockpaperscissors2.html" target="blank" >Play Game Again &nbsp; &nbsp; &nbsp; &nbsp;</a>';
			}
			else
			{
				echo "<p>Draw</p>";			//Paper
				echo '<a href="phprockpaperscissors2.html" target="blank" >Play Game Again &nbsp; &nbsp; &nbsp; &nbsp;</a>';
			}
		}
		else
		{
			if($computer_random==2)
			{
				echo "<p>You Win..somehow</p>";
				echo "<p>The computer choose paper</p>";
				echo '<a href="phprockpaperscissors2.html" target="blank" >Play Game Again &nbsp; &nbsp; &nbsp; &nbsp;</a>';
			}
			else if($computer_random==1)
			{	
				echo "<p>You Loose</p>";
				echo "<p>The computer choose rock</p>";
				echo '<a href="phprockpaperscissors2.html" target="blank" >Play Game Again &nbsp; &nbsp; &nbsp; &nbsp;</a>';
			
			 }
			else
			{
				echo "<p>Draw</p>";		//Scissors
				echo '<a href="phprockpaperscissors2.html" target="blank" >Play Game Again &nbsp; &nbsp; &nbsp; &nbsp;</a>';
			}	
		
		}
	}
	


	
	function rockpaperscissors($computer_random,$user,$username,$conn)
	{
		if($user == 1)
		{
			if($computer_random == 2)
			{
			echo "The username is ".$username;
			$score_query = "SELECT score FROM Users WHERE userName = '$username'";
				if(!$score_query)
				{
					echo'<p>There is no query</p>';
				}
				$score_previous = mysqli_query($conn, $score_query);
				if(!$score_previous)
				{
					echo'<p>There is no result in the sql</p>';
				}
				else{
					$row = mysqli_fetch_array($score_previous);
					if(!$row)
						echo"no row";
					else
						echo "yes row ".$row;
				}
					$score = $row['score'];
					
					echo "The current score is ".$score;
					$new_score= --$row['score'];
					echo "The new score is ".$new_score;
				
		//UPDATE table_name SET column1=value1,column2=value2,..WHERE some_column=some_value
						
					$final_score = "UPDATE Users SET score=$new_score WHERE userName='$username'";
					$result = mysqli_query($conn, $final_score);
			//	  $row = mysqli_fetch_array($result);
				echo "<p>You Loose</p>";
				echo "<p>The computer choose paper</p>";
				echo '<a href="phprockpaperscissors2.html" target="blank" >Play Game Again &nbsp; &nbsp; &nbsp; &nbsp;</a>';
			}
			
			else if($computer_random == 3)				//Scissors
			{
		
				$score_query = "SELECT score FROM Users WHERE userName = '$username'";
				if(!$score_query)
				{
					echo'<p>There is no query</p>';
				}
				$score_previous = mysqli_query($conn, $score_query);
				if(!$score_previous)
				{
					echo'<p>There is no result in the sql</p>';
				}
				else{
					$row = mysqli_fetch_array($score_previous);
					if(!$row)
						echo"no row";
					else
						echo "yes row ".$row;
				}
					$score = $row['score'];
					
					echo "The current score is ".$score;
					$new_score= ++$row['score'];
					echo "The new score is ".$new_score;
				
					//UPDATE table_name SET column1=value1,column2=value2,..WHERE some_column=some_value
						
					$final_score = "UPDATE Users SET score=$new_score WHERE userName='$username'";
					$result = mysqli_query($conn, $final_score);
					echo "<p>You Win</p>";
					echo "<p>The computer choose paper</p>";
					echo '<a href="phprockpaperscissors2.html" target="blank" >Play Game Again &nbsp; &nbsp; &nbsp; &nbsp;</a>';
				}
			else						//Rock
			{
				echo "<p>Draw</p>";
				echo '<a href="phprockpaperscissors2.html" target="blank" >Play Game Again &nbsp; &nbsp; &nbsp; &nbsp;</a>';
			}
		}
	
		else if ($user ==2)				//Paper
		{
			if($computer_random==1)					//Rock
			{
				$score_query = "SELECT score FROM Users WHERE userName = '$username'";
				if(!$score_query)
				{
					echo'<p>There is no query</p>';
				}
				$score_previous = mysqli_query($conn, $score_query);
				if(!$score_previous)
				{
					echo'<p>There is no result in the sql</p>';
				}
				else{
					$row = mysqli_fetch_array($score_previous);
					if(!$row)
						echo"no row";
					else
						echo "yes row ".$row;
				}
					$score = $row['score'];
					
					echo "The current score is ".$score;
					$new_score= ++$row['score'];
					echo "The new score is ".$new_score;
				
					//UPDATE table_name SET column1=value1,column2=value2,..WHERE some_column=some_value
						
					$final_score = "UPDATE Users SET score=$new_score WHERE userName='$username'";
					$result = mysqli_query($conn, $final_score);
				echo "<p>You Win..somehow</p>";
				echo "<p>The computer choose rock</p>";
				echo '<a href="phprockpaperscissors2.html" target="blank" >Play Game Again &nbsp; &nbsp; &nbsp; &nbsp;</a>';
			
			}	
			else if($computer_random ==3)
			{
				$score_query = "SELECT score FROM Users WHERE userName = '$username'";
				if(!$score_query)
				{
					echo'<p>There is no query</p>';
				}
				$score_previous = mysqli_query($conn, $score_query);
				if(!$score_previous)
				{
					echo'<p>There is no result in the sql</p>';
				}
				else{
					$row = mysqli_fetch_array($score_previous);
					if(!$row)
						echo"no row";
					else
						echo "yes row ".$row;
				}
					$score = $row['score'];
					
					echo "The current score is ".$score;
					$new_score= --$row['score'];
					echo "The new score is ".$new_score;
				
		//UPDATE table_name SET column1=value1,column2=value2,..WHERE some_column=some_value
						
					$final_score = "UPDATE Users SET score=$new_score WHERE userName='$username'";
					$result = mysqli_query($conn, $final_score);
				echo "<p>You Loose</p>";
				echo "<p>The computer choose scissors</p>";
				echo '<a href="phprockpaperscissors2.html" target="blank" >Play Game Again &nbsp; &nbsp; &nbsp; &nbsp;</a>';
			}
			else
			{
				echo "<p>Draw</p>";			//Paper
				echo '<a href="phprockpaperscissors2.html" target="blank" >Play Game Again &nbsp; &nbsp; &nbsp; &nbsp;</a>';
			}
		}
		else
		{
			if($computer_random==2)
			{
				$score_query = "SELECT score FROM Users WHERE userName = '$username'";
				if(!$score_query)
				{
					echo'<p>There is no query</p>';
				}
				$score_previous = mysqli_query($conn, $score_query);
				if(!$score_previous)
				{
					echo'<p>There is no result in the sql</p>';
				}
				else{
					$row = mysqli_fetch_array($score_previous);
					if(!$row)
						echo"no row";
					else
						echo "yes row ".$row;
				}
					$score = $row['score'];
					
					echo "The current score is ".$score;
					$new_score= ++$row['score'];
					echo "The new score is ".$new_score;
				
					//UPDATE table_name SET column1=value1,column2=value2,..WHERE some_column=some_value
						
					$final_score = "UPDATE Users SET score=$new_score WHERE userName='$username'";
					$result = mysqli_query($conn, $final_score);
				echo "<p>You Win..somehow</p>";
				echo "<p>The computer choose paper</p>";
				echo '<a href="phprockpaperscissors2.html" target="blank" >Play Game Again &nbsp; &nbsp; &nbsp; &nbsp;</a>';
			}
			else if($computer_random==1)
			{	
				$score_query = "SELECT score FROM Users WHERE userName = '$username'";
				if(!$score_query)
				{
					echo'<p>There is no query</p>';
				}
				$score_previous = mysqli_query($conn, $score_query);
				if(!$score_previous)
				{
					echo'<p>There is no result in the sql</p>';
				}
				else{
					$row = mysqli_fetch_array($score_previous);
					if(!$row)
						echo"no row";
					else
						echo "yes row ".$row;
				}
					$score = $row['score'];
					
					echo "The current score is ".$score;
					$new_score= --$row['score'];
					echo "The new score is ".$new_score;
				
		//UPDATE table_name SET column1=value1,column2=value2,..WHERE some_column=some_value
						
					$final_score = "UPDATE Users SET score=$new_score WHERE userName='$username'";
					$result = mysqli_query($conn, $final_score);
				echo "<p>You Loose</p>";
				echo "<p>The computer choose rock</p>";
				echo '<a href="phprockpaperscissors2.html" target="blank" >Play Game Again &nbsp; &nbsp; &nbsp; &nbsp;</a>';
			
			}
			else
			{
				echo "<p>Draw</p>";		//Scissors
				echo '<a href="phprockpaperscissors2.html" target="blank" >Play Game Again &nbsp; &nbsp; &nbsp; &nbsp;</a>';
			}	
		}

	}
	
	
	$user = $_GET['game'];
	 $computer_random = rand(1,3);
	 $username = $_SESSION['valid_user'];
	
	 
	 //echo $username;
	 if($username)
	 {
		 echo"<p>Let's keep score</p>";
		 rockpaperscissors($computer_random,$user,$username,$conn);
	 }
	 else
	 {
		echo"<p>Let's play a round</p>";
		rockpaperscissors_nostore($computer_random,$user);
	 }
	 
	 
	mysqli_free_result($score_previous);
	mysqli_free_result($result);

	mysqli_close($conn);
?>
	