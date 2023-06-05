<html>
<head>
	<title>Registration complete</title>
<head>
<body background="https://initiafy-website-images.s3.amazonaws.com/wordpress-upload/2015/06/Canada-New-Worker-Safety-group-of-workers.jpg" style= "background-repeat:no-repeat;background-position:center;background-attachment:fixed;background-size:cover">
	<link rel="stylesheet" href="signinpage.css">
	<div id="seged2"></div>
	<div align=center>
		<h1><?php
			$con=mysqli_connect("localhost","root","","mester");
			if(isset($_POST['register']))
			{
				$last=$_POST['last'];
				$first=$_POST['first'];
				$date=$_POST['date'];
				$email=$_POST['email'];
				$pass=$_POST['pass'];
				$tabla1=mysqli_query($con,"SELECT bool FROM users WHERE `E-mail` like '$email'");
				$sor=mysqli_fetch_array($tabla1);
				if($sor['bool'] == 1)
				{
					echo "E-mail already used!";
					echo "<br>";
					echo "<a href='register.html'>" ;
					echo "<font color=black>";
					echo "Click here to return to registration!";
					echo "</font>";
					echo "</a>";
				}
				else 
				{
					$tabla=mysqli_query($con,"INSERT INTO `users`(`First_name`, `Last_name`, `Date_of_birth`, `E-mail`, `Pasword`, `bool`) VALUES ('$first','$last','$date','$email','$pass',1)");
					echo "Registration successful!";
					echo "<br>";
					echo "<a href='Mester1.html'>" ;
					echo "<font color=black>";
					echo "Click here to enter main page!";
					echo "</font>";
					echo "</a>";
				}
			}
		?></h1>
	</div>
</body>
</html>