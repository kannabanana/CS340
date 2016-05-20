<?php
	session_start();
	$old_user = $_SESSION['valid_user'];
	unset($_SESSION['valid_user']);
	session_destroy();
?>
<html>
<body>
	<h1> Log Out Page</h1>
	<ul>
			<!--Tool bar for navigation which include about, menu, reviews, locations -->
			<li> <a href ="login.php" target="_blank">login in &nbsp; &nbsp; &nbsp; &nbsp;</a></li> 
			<li> <a href ="logout.php" target="_blank">log out &nbsp; &nbsp; &nbsp; &nbsp;</a></li> 
			<li> <a href="signup.php" target="blank">sign up &nbsp; &nbsp; &nbsp; &nbsp;</a></li>  					
			<li> <a href="phprockpaperscissors2.html" target="blank">Play Game &nbsp; &nbsp; &nbsp; &nbsp;</a></li>
	</ul>
	<?php
		if (!empty($old_user)) {
			echo 'User: '.$old_user.' is logged out';
		} else {
			echo 'You were not logged in!';
		}
	?>

</body>
</html>

