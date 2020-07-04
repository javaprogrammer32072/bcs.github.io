<?php
session_start();
	#Now Set session data with no value.
	$id=rand(1000000000,9999999999);
	$id="BGP".$id;
	if ($_SESSION['i']==1)
	{
		$_SESSION['id']="no";
		$_SESSION['fname']="no";
		$_SESSION['lname']="no";
		$_SESSION['fathername']="no";
		$_SESSION['aadhaar']="no";
		$_SESSION['contact']="no";
		$_SESSION['email']="no";
		$_SESSION['village']="no";
		$_SESSION['thana']="no";
		$_SESSION['po']="no";
		$_SESSION['block']="no";
		$_SESSION['distic']="no";
		$_SESSION['securityQ']="no";
		$_SESSION['securityA']="no";
	}
	# Now Store html value into proper variable.
	if (isset($_POST['btnSubmit']) )
	{
			$id=$_POST['id'];
			$firstName=$_POST['fname'];
			$lastName=$_POST['lname'];
			$fatherName=$_POST['fathername'];
			$aadhaar=$_POST['aadhaar'];
			$contact=$_POST['contact'];
			$email=$_POST['email'];
			$village=$_POST['village'];
			$block=$_POST['block'];
			$thana=$_POST['thana'];
			$po=$_POST['po'];
			$distic=$_POST['distic'];
			$pass=$_POST['pass'];
			$cPass=$_POST['cpass'];
			$securityQ=$_POST['securityQ'];
			$securityAns=$_POST['securityA'];
			
			#Now Set Session Data
			$_SESSION['id']=$id;
			$_SESSION['fname']=$firstName;
			$_SESSION['lname']=$lastName;
			$_SESSION['fathername']=$fatherName;
			$_SESSION['aadhaar']=$aadhaar;
			$_SESSION['contact']=$contact;
			$_SESSION['email']=$email;
			$_SESSION['village']=$village;
			$_SESSION['block']=$block;
			$_SESSION['thana']=$thana;
			$_SESSION['po']=$po;
			$_SESSION['distic']=$distic;
			$_SESSION['password']=$pass;
			$_SESSION['conformpassword']=$cPass;
			$_SESSION['email']=$email;
			$_SESSION['securityQ']=$securityQ;
			$_SESSION['securityA']=$securityAns;
			$_SESSION['i']=11;

			# Here Validation Form Value
			if ($pass==$cPass)
			{
					if (strlen($aadhaar)==12)
					{
						# code...
						if (strlen($contact)==10)
						{
							# code...
							echo "<script>alert('Ok')</script>";
		    		   		$otp=rand(100000,999999);
		    		   		$_SESSION['otp']=$otp;
		    		   		//the subject
							$sub = "Data Entry Website Bgp";
							//the message
							$msg = "Your Otp is:".$otp." and Admin UserType".$utype." Please not share to any one.";
							//recipient email here
							$rec = $email;
							//send email
							if (mail($rec,$sub,$msg)) {
								# code...
								#echo "Send Successfully";
								echo "<script>alert('OTP is sent Your Email');</script>";
								echo "<script>location.href='VerifyTeacher.php'</script>";

								//post
								$url="https://www.sms4india.com/api/v1/sendCampaign";
				                $message ="Your OTP for registration in www.bgpconsultancyservices.com is ".$otp; 
				                urlencode("message-text");// urlencode your message
				                $curl = curl_init();
				                curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
				                curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=10MIIKSLDD1EBONF6SHMYMXTR0C5FHZH&secret=LMG5ZEIECIXRD9BC&usetype=stage&phone=6204847381&senderid=IITBST&message=$message");// post data
				                // query parameter values must be given without squarebrackets.
				                 // Optional Authentication:
				                curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				                curl_setopt($curl, CURLOPT_URL, $url);
				                curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				                curl_setopt($curl, CURLOPT_URL, $url);
				                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				                $result = curl_exec($curl);
				                curl_close($curl);
				                echo $result;
							}
							else
							{
								#echo "Failed to send";
								echo "<script>alert('Failed to sent OTP.');</script>";
							}
						}
						else
						{
							echo "<script>alert('Sorry!! Wrong Phone No.');</script>";
						}
					}
					else
					{
						echo "<script>alert('Sorry!! Wrong Aadhaar No.');</script>";
					}
			}
			else
			{
				echo "<script>alert('Password not mactch.');</script>";
				echo "<script> location.href='registerForm.php'</script>";
		
			}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<style type="text/css">
		body
{
	margin: 0;
	padding: 0;
	
	background-position: center;
	background-size: cover;
}
.login-box
{
	width: 500px;
	height: 1700px;
	background:rgba(0,0,0,1);
	color: white;
	position: absolute;
	left: 50%;
	top: 150%;
	transform: translate(-50%,-50%);
	box-sizing: border-box;
}
.logo
{
	height: 100px;
	width: 100px;
	border-radius: 50%;
	position: absolute;
	top: -4%;
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
.login-box select:hover
{
	background-color: white;
	cursor: pointer;
	color: black;
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
<body style="background-color: white;">
	<div class="login-box">
		<img src="../pic/register.png" class="logo">
		<br>
		<h1 class="heading">Registration Form</h1>
		<form action="" method="post">
			<p>User Name</p>
			<input type="text" name="id" placeholder="User Name" readonly="" value="<?php echo $id; ?>">
			<p>First Name</p>
			<input type="text" name="fname" placeholder="First Name" required="" value="<?php if($_SESSION['fname']=="no"){}else{ echo $_SESSION['fname'];}?>">
			<p>Last Name</p>
			<input type="text" name="lname" placeholder="Last Name" required="" value="<?php if($_SESSION['lname']=="no"){}else {echo $_SESSION['lname'];}?>">
			<p>Father Name</p>
			<input type="text" name="fathername" placeholder="Father Name" required="" value="<?php if($_SESSION['fathername']=="no"){}else {echo $_SESSION['fathername'];}?>">
			<p>Aadhaar No</p>
			<input type="number" name="aadhaar" placeholder="Aadhaar No" required="" value="<?php if($_SESSION['aadhaar']=="no"){}else {echo $_SESSION['aadhaar'];}?>">
			
			<p>Phone Number</p>
			<input type="number" name="contact" placeholder="Phone No" required="" value="<?php  if($_SESSION['contact']=="no"){}else { echo $_SESSION['contact'];}?>">
			<p>Email ID</p>
			<input type="email" name="email" placeholder="Email ID" required="" value="<?php if($_SESSION['email']=="no"){}else {echo $_SESSION['email'];}?>">
			<p>Village Name</p>
			<input type="text" name="village" placeholder="Village Name" required="" value="<?php if($_SESSION['village']=="no"){}else {echo $_SESSION['village'];}?>">
			<p>Block Name</p>
			<input type="text" name="block" placeholder="Block Name" required="" value="<?php if($_SESSION['block']=="no"){}else {echo $_SESSION['block'];}?>">
			<p>Thana</p>
			<input type="text" name="thana" placeholder="Thana" required="" value="<?php if($_SESSION['thana']=="no"){}else {echo $_SESSION['thana'];}?>">
			<p>PO</p>
			<input type="text" name="po" placeholder="Post Office" required="" value="<?php if($_SESSION['email']=="no"){}else {echo $_SESSION['email'];}?>">
			<p>Dist. Name</p>
			<input type="text" name="distic" placeholder="District" required="" value="<?php if($_SESSION['distic']=="no"){}else {echo $_SESSION['distic'];}?>">
			<p>Password</p>
			<input type="password" name="pass" placeholder="Password" required="">
			<p>Conform Password</p>
			<input type="password" name="cpass" placeholder="Conform Password" required="">
			<br>
			<p>Security Questions</p>
			<select name="securityQ" required="">
				<option><?php if($_SESSION['securityQ']=="no"){echo "Select A Security Question";}else {echo $_SESSION['securityQ'];}?></option>>          
           	   <option>What is your nick name?</option>
               <option>What is your Ambition?</option>
               <option>Which game you like</option>
               <option>What is your College name?</option>
               <option>Which class do you read in?</option>
        	</select></br>
        	<p>Security Answer</p>
			<input type="text" name="securityA" placeholder="Type Security Answer.." required="" value="<?php if($_SESSION['securityA']=="no"){}else{ echo $_SESSION['securityA'];}?>"><br>
			<br>
			<input type="submit" value="Register" name="btnSubmit">
			<center>
				<br><br>
			<a href="../index.php" style=" margin: 20px; font-size: 22px; color: white;">Login Here?</a>
			</center>
		</form>
	</div>
</body>
</html>