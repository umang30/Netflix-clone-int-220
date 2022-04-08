<?php

$username = "sonamnayak";
$password = "pwd123";

session_start();

if(isset($_SESSION['username'])){
	echo "<h1> Logged in successfully.</h1>";
	echo "<a href='myprofile.php'>My Profile</a> <br><br>";
	echo "<a href='logout.php'><input type=button value=logout name=logout></a>";
}

else{
	if($_POST['username']==$username && $_POST['password']==$password){
		$_SESSION['username']= $username;
		echo "<script>location.href='successfull.php'</script>";
	}
	else{
		echo "<script>alert('Wrong username or password')</script>";
		echo "<script>location.href='login.php'</script>";
	}
}

?>