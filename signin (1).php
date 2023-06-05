<html>
<head>
	<title>Workcenter</title>
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
				$tabla1=mysqli_query($con,"SELECT `E-mail` , `Pasword` FROM users WHERE `E-mail` like '$email'");
				$sor=mysqli_fetch_array($tabla1);
				if($sor['E-mail'] === $email )
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
					$tabla=mysqli_query($con,"INSERT INTO `users`(`First_name`, `Last_name`, `Date_of_birth`, `E-mail`, `Pasword`) VALUES ('$first','$last','$date','$email','$pass')");
					echo "Registration successful!";
					echo "<br>";
					echo "<a href='Mester2.html'>" ;
					echo "<font color=black>";
					echo "Click here to enter main page!";
					echo "</font>";
					echo "</a>";
				}
			}
			if(isset($_POST['admin'])){
				$email1 = $_POST['e-mail'] ;
				$password=$_POST['password'] ;
				$tabla=mysqli_query($con,"SELECT `E-mail` , `Pasword` FROM admins WHERE `E-mail` LIKE '$email1' AND `Pasword` LIKE '$password'") ;
				$sor=mysqli_fetch_array($tabla) ;
				if($sor['E-mail'] === $email1 and $sor['Pasword'] === $password ) {header("Location: Mester1.html");
                    exit();}
				else echo "You are not an admin! <a href='signinpage.html'><font color=black>Try signing in as a customer here!</font></a>" ;
			}
			if(isset($_POST['guest'])){
				$email2 = $_POST['e-mail1'] ;
				$password=$_POST['pasword'] ;
				$tabla=mysqli_query($con,"SELECT `E-mail` , `Pasword` FROM users WHERE `E-mail` LIKE '$email2' AND `Pasword` LIKE '$password'") ;
				$sor=mysqli_fetch_array($tabla) ;
				if($sor['E-mail'] === $email2 and $sor['Pasword'] === $password ) {header("Location: Mester2.html");
                    exit();}
				else echo "This account doesn't exist! <a href='register.html'><font color=black>Create one here!</font></a>" ;
			}
		?></h1>
	</div>
</body>
</html>