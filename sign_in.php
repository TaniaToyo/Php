<?php	
	// Inialize session
	session_start();

	// All the data entered by user stored in variables below
	$server = "127.0.0.1";
	$user = "root";
	$pass = "";

	// connection variable initialization
	$connection = mysqli_connect($server, $user, $pass);	
	if (!$connection)
		{
			die("Connection failed: " . mysqli_connect_error());
		}

	$db = mysqli_select_db($connection,"SignIn");
	if (!$db)
		{
			die("Database selection failed: " . mysqli_connect_error());
		}

	$name = "";
	$username = "";
    $email = "";
    $password='';
	
	if (isset($_POST['signin']))
	{
		$name = $_POST['name'];
		$username = $_POST['username'];
        $email = $_POST['email'];
        $password =$_POST['password'];
		$mysql= "INSERT INTO sign_in_info(name,username,email,password) VALUES ('$name', '$username', '$email','$password')";
		mysqli_query($connection,$mysql);
		echo "One record inserted successfully";
	}
	echo "<br><br><br>";
	echo '<a href="home.html"> Home </a>';
	mysqli_close($connection);
?>