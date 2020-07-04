<?php
	session_start();
	$_SESSION['i']=1;
		$_SESSION['cnt']="no";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<style type="text/css">
		body
		{
			margin: 0;
			padding: 0;
			background-color: white;
			background-position: center;
			background-size: cover;
		}
		.login-box
		{
			width: 300px;
			height: 550px;
			background:rgba(0,0,0,1);
			color: white;
			position: absolute;
			left: 50%;
			top: 53%;
			transform: translate(-50%,-50%);
			box-sizing: border-box;
		}
		.logo
		{
			height: 100px;
			width: 100px;
			border-radius: 50%;
			position: absolute;
			top: -10%;
			align-items: center;
			left: 32%;
		}
		.heading
		{
			margin: 0;
			padding:37px;
			text-align: center;
		}
		.login-box
		{
			margin: 0;
			padding: 0;
			font-weight: bold;
		}
		.login-box input,select
		{
			width: 60%;
			height: 35px;
			margin-left: 50px;
		}
		.login-box select:hover
		{
			background-color: white;
			cursor: pointer;
			color: black;
		}
		.login-box p
		{
			margin-top: 3px;
			margin-left: 50px;
			font-size: 20px;
		}
		.login-box input[type="text"],input[ type="password"],input[ type="email"],select
		{
			border-radius: 50px;
			background:transparent;
			outline: none;
			border-bottom: 1.5px solid;
			border-top: 1.5px solid;
			border-left: 1.5px solid;
			border-right: 1.5px solid;
			border-color: green;
			cursor: text;
			color: white;
			text-align: center;
			font-size: 18px;
		}
		.login-box input[type="text"]:focus,input[ type="password"]:focus,input[ type="email"]:focus,select:focus
		{
			width: 80%;
		}
		.login-box input[type="submit"]
		{
			width: 75%;
			font-size: 20px;
			margin-left: 40px;
			margin-top: 30px;
			background:transparent;
			color: white;
			border-radius: 50px;
		}
		.login-box input[type="submit"]:focus
		{
			width: 60%;
			background-color: blue;
		}
		.login-box a :hover
		{
			margin: 20px;
			margin-top: 30px;
			color: red;
			background-color: red;
		}
		#teacher
		{
			font-size: 20px;
			text-decoration: none;
			color: white;
			text-align: center;
			padding-left: 50px;
		}
		#teacher :hover
		{
			padding-left: 50px;
			transition: all 0.7s;
			color: yellow;
			text-decoration: overline;
		}
		#student :focus
		{
			color: yellow;
			padding-left: 50px;
			text-decoration-style: solid;
}
	</style>
</head>
<body style="background-color: white;">
	<div class="login-box">
		<img src="pic/user.jpg" class="logo">
		<h1 class="heading">Login Form</h1>
		<form action="php/HomePage.php" method="post">
			<p>User Name</p>
			<input type="text" name="userid" placeholder="User Name" required="">
			<p>User Password</p>
			<input type="password" name="userpass" placeholder="Password" required="">
			
			<br>
			<a href="" style="color: red; font-size: 17px; margin-left: 150px; margin-top: 20px">Forget Password</a>
			<input type="submit" value="Log In" name="btnok">
			<center>
				<br>
			<a href="php/registerForm.php" style="color: white; margin: 20px; font-size: 20px;" id="student">New User Register Here?</a>
			</center>
		
		</form>
	</div>
</body>
</html>