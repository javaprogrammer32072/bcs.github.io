<?php
	session_start();
	#Now get session data
	$id=$_SESSION['id'];
	$firstname=$_SESSION['fname'];
	$lastname=$_SESSION['lname'];
	$fathername=$_SESSION['fathername'];
	$aadhaar=$_SESSION['aadhaar'];
	$contact=$_SESSION['contact'];
	$email=$_SESSION['email'];
	$village=$_SESSION['village'];
	$block=$_SESSION['block'];
	$thana=$_SESSION['thana'];
	$po=$_SESSION['po'];
	$distic=$_SESSION['distic'];
	$pass=$_SESSION['password'];
	$cPass=$_SESSION['conformpassword'];
	$securityQ=$_SESSION['securityQ'];
	$securityAns=$_SESSION['securityA'];
	#now get session data otp
	$sotp=$_SESSION['otp'];	
	# Now Store html value into proper variable.
	include '../db/db.php';
	if (isset($_POST['btnOTPSubmit']))
	{
		
		#now get form data
		$otp=$_POST['otp'];
		if ($sotp==$otp)
		{
			//$id=234;
			
				#$query="INSERT INTO `operatordetails`(`id`, `FirstName`, `LastName`, `FatherName`, `Aadhaar`, `Contact`, `Email`, `Village`, `Block`, `Thana`, `PO`, `Distic`, `SecurityQ`, `SecurityAns` `Password`) VALUES ('$id','$firstname','$lastname','$fathername','$aadhaar','$contact','$email','$village','$block','$thana','$po','$distic','$securityQ','$securityAns','$pass')";
			$query="INSERT INTO `operatordetails`(`id`, `FirstName`, `LastName`, `FatherName`, `Aadhaar`, `Contact`, `Email`, `Village`, `Block`, `Thana`, `PO`, `Distic`, `SecurityQ`, `SecurityAns`, `Password`, `ConformPassword`) VALUES ('$id','$fname','$lastname','$fathername','$aadhaar','$contact','$email','$village','$block','$thana','$po','$distic','$securityQ','$securityAns','$pass','$cPass')";
				if (mysqli_query($con,$query))
				{
	    		   		echo "<script>alert('Successfully Registered');</script>";
	    		   		echo "<script>location.href='../index.php'</script>";
	    		}
	    		else
	    		{
	    			echo "<script>alert('Sorry Can,t Registered. $id ID exists, Try another ID ');</script>";
	    		}

		}
		else
		{
			echo "<script>alert('OTP not Matched!!');</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Verification Page</title>
	<style type="text/css">
		{
	margin: 0;
	padding: 0;
	background: url(../pic/register.jpg);
	background-position: center;
	background-size: cover;
}
.login-box
{
	width: 400px;
	height: 400px;
	background:rgba(0,0,0,0.6);
	color: white;
	position: absolute;
	left: 50%;
	top: 50%;
	transform: translate(-50%,-50%);
	box-sizing: border-box;
}
.logo
{
	height: 100px;
	width: 100px;
	border-radius: 50%;
	position: absolute;
	top: -15%;
	align-items: center;
	left: 37%;
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
.login-box input
{
	width: 60%;
	height: 35px;
	margin-left: 50px;
}
.login-box p
{
	margin-top: 3px;
	margin-left: 50px;
	font-size: 20px;
}
.login-box input[type="number"],input[ type="password"],input[ type="text"],input[ type="email"]
{
	background-color: red;
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
.login-box select
{
	background-color: red;
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

.login-box select
{
	width: 60%;
	height: 35px;
	margin-left: 50px;
}
.login-box select:focus
{
	width: 80%;
}
.login-box input[type="number"]:focus,input[ type="password"]:focus,input[ type="email"]:focus,input[ type="text"]:focus
{
	width: 80%;
	background:transparent;
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
.login-box a
{
	margin: 20px;
	margin-top: 30px;
	color: red;
	background-color: transparent;
}
.login-box a:hover
{
	color: red;
}

	</style>
</head>
<body style="background: url(../pic/background.jpg); background-size: cover;">
	<div class="login-box">
		<img src="../pic/verifypic2.jpg" class="logo">
		<br>
		<h1 class="heading">User Verification Form</h1>
		<form action="" method="post">
			<p>Type OTP</p>
			<input type="number" name="otp"  placeholder="Type OTP"  required="">
			<br><br><br>
			<input type="submit" name="btnOTPSubmit" value="Verify OTP">
		</form>
	</div>
</body>
</html>