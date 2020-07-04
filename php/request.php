<?php
	include '../db/db.php';
	session_start();
	if (isset($_POST['btnSearch']))
  	{
    # code...
	  	$name=$_SESSION['name'];
	  	$contact=$_SESSION['contact'];
	  	$address=$_SESSION['address'];
	  	$userid=$_SESSION['id'];
	    $search = $_POST['search'];
	    $date ="3/3/4";
	    #$sql="INSERT INTO `requestsearchdata`(`UserName`, `Name`, `Contact`, `Address`,`Search`, `Date`) VALUES ('$userid','$name','$contact','$address','$search','$currentDateTime')";
	    $sql="INSERT INTO `requestsearchdata`(`UserName`, `Name`, `Contact`, `Address`, `Search`, `Date`) VALUES ('$userid','$name','$contact','$address','$search','$date')";

	    $query="insert into requestsearchdata(UserName,Name,Contact,Aadress, Search,Date) VALUES ('$userid','$name','$contact','$address','$search','$date')";
	    if (mysqli_query($con,$sql)){
	      # code...
	      echo "<script>alert('Successfully Sent Request, Thank You!!');</script>";
	      echo "<script>location.href='HomePage.php'</script>";
	    }
	    else
	    {
	      echo "<script>alert('Sorry!! Failed to send Request.');</script>";
	    }

	}
    if (isset($_POST['btnSearch1']))
  	{
		    # code...
		  	$name=$_SESSION['name'];
		  	$contact=$_SESSION['contact'];
		  	$address=$_SESSION['address'];
		  	$userid=$_SESSION['id'];
		    $search = $_POST['search1'];
		    $currentDateTime = date('Y-m-d H:i:s');
		    #$sql="INSERT INTO `requestsearchdata`(`Search`, `Date`) VALUES ('$search','$currentDateTime')";
		    $sql="INSERT INTO `requestentrydata`(`UserName`, `Name`, `Contact`, `Address`,`Entry`, `Date`) VALUES ('$userid','$name','$contact','$address','$search','$currentDateTime')";
		    if (mysqli_query($con,$sql)){
		      # code...
		      echo "<script>alert('Successfully Sent Request, Thank You!!');</script>";
		      echo "<script>location.href='HomePage.php'</script>";
		    }
		    else
		    {
		      echo "<script>alert('Sorry!! Failed to send Request.');</script>";
		    }
	}
		    if (isset($_POST['btnSearch2']))
		  	{
		    # code...
			  	$name=$_SESSION['name'];
			  	$contact=$_SESSION['contact'];
			  	$address=$_SESSION['address'];
			  	$userid=$_SESSION['id'];
			    $search = $_POST['search2'];
			    $currentDateTime = date('Y-m-d H:i:s');
			    #$sql="INSERT INTO `requestsearchdata`(`Search`, `Date`) VALUES ('$search','$currentDateTime')";
			    $sql="INSERT INTO `requestbothdata`(`UserName`, `Name`, `Contact`, `Address`,`Both`, `Date`) VALUES ('$userid','$name','$contact','$address','$search','$currentDateTime')";
			    if (mysqli_query($con,$sql)){
			      # code...
			      echo "<script>alert('Successfully Sent Request, Thank You!!');</script>";
			      echo "<script>location.href='HomePage.php'</script>";
			    }
			    else
			    {
			      echo "<script>alert('Sorry!! Failed to send Request.');</script>";
			    }

			}

?>