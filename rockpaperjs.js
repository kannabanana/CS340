
var computer = 0;
var user = 0;


function display(computer,user)
{
	document.getElementById("result").innerHTML = ("The computer score is: " +computer+". The user score is: " +user);
}

function compute(num) {
		
	var x = Math.floor((Math.random() * 3) + 1);
	
	if(num ==1)						//Rock
	{
		if(x == 2)					//Paper
		{
			++computer;
			document.getElementById("compresult").src = "https://image.freepik.com/free-photo/rumpled-paper--paper-ball--garbage--objects_385314.jpg";
			display(computer,user);
			alert("Loose");
			--$score
		}
		else if(x == 3)				//Scissors
		{
			++user;
			document.getElementById("compresult").src = "https://s3.amazonaws.com/rapgenius/edward_scissorhands.jpg";
			display(computer,user);
			alert("Win");
			++$score;
			
		}
		else						//Rock
		{
			document.getElementById("compresult").src = "http://dreamatico.com/data_images/diamond/diamond-6.jpg";
			alert("Draw");
		}
	}
	
	
	else if (num ==2)				//Paper
	{
		if(x==1)					//Rock
		{	
			++user;
			document.getElementById("compresult").src = "http://dreamatico.com/data_images/diamond/diamond-6.jpg";
			display(computer,user);
			alert("Win");
			++$score;
		}	
		else if(x ==3)
		{
			++user;
						//Scissors
			document.getElementById("compresult").src = "https://s3.amazonaws.com/rapgenius/edward_scissorhands.jpg";
			display(computer,user);
			alert("Loose");
			--$score;
		}
		else(x==2)
		{
			document.getElementById("compresult").src = "https://image.freepik.com/free-photo/rumpled-paper--paper-ball--garbage--objects_385314.jpg";
			alert("Draw");			//Paper
		}
	}
	else{
		if(x==2)
		{
			++user;
			document.getElementById("compresult").src = "https://image.freepik.com/free-photo/rumpled-paper--paper-ball--garbage--objects_385314.jpg";
			display(computer,user);
			alert("Win");			//Paper
			++$score;
		}
		else if(x==1)
		{	
			++computer;
			document.getElementById("compresult").src = "http://dreamatico.com/data_images/diamond/diamond-6.jpg";
			display(computer,user);
			alert("Loose");			//Rock
			--$score;
		}	
		else
		{
			document.getElementById("compresult").src = "https://s3.amazonaws.com/rapgenius/edward_scissorhands.jpg";
			alert("Draw");			//Scissors
		}	
	}
}


document.getElementById("myImage") = function() {compute(1)};
document.getElementById("myImage2") = function() {compute(2)};
document.getElementById("myImage3") = function() {compute(3)};