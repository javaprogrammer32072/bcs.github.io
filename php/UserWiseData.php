<?php
	include '../db/db.php';
	session_start();
	if (isset($_POST['btnSearch']))
	{
		# code...
		$search=$_POST['search'];
		$_SESSION['search']=$search;
		$sql="select * from allentrydata where UserName='$search' ";

	      $result = $con->query($sql);
	      if ($result->num_rows > 0)
	      {
	        // output data of each row
	          if($row = $result->fetch_assoc())
	          {
	              
	              /*$search=$row["Search"];
	              $entry=$row["Entry"];*/
	              $name=$row["Name"];
	              $_SESSION['name']=$name;
	              
	        }
	        #echo "<script>alert('Successfully data found');</script>";
	      }
	      else
	      {
	      	echo "<script>alert('data not found');</script>";
	      }
	}
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>User Wise Data</title>
</head>
<body>

	<div class="container-fluid" style="background-color: purple;">
		<center>
			<br>
			<strong style="color: white;margin-bottom: 2%;margin-top: 3%;font-size: 30px;"><?php echo $_SESSION['name']; ?> All Entry Data</strong>
		</center>
		<br>
	</div>
		<table class="table table-hover table-responsive">
					<thead>
						 <tr>
						 	<th scope="col">SrNo</th>
							<th scope="col">UserName</th>
							<th scope="col">Name</th>
							<th scope="col">Contact</th>
							<th scope="col">FormNo</th>
							<th scope="col">Applicant</th>
							<th scope="col">RTPS</th>
							<th scope="col">Status</th>
							<th scope="col">Block</th>
						  </tr>
					</thead>
							  
				<?php
						$search=$_SESSION['search'];
					  $sql="select * from allentrydata where UserName='$search' ";
				      $result = $con->query($sql);
				      $cnt=0;
				      if ($result->num_rows > 0)
				      {
				        // output data of each row
				          while($row = $result->fetch_assoc())
				          {
				              
				              $uname=$row["UserName"];
				              #$uname=$row["UserName"];
				              
				              $name=$row["Name"];
				              
				              $contact=$row["Contact"];
				              $formno=$row["FormNo"];
				              $applicant=$row["Applicant"];
				              $rtps=$row["RTPS"];
				              $status=$row["Status"];
				              $block=$row["Block"];
				              $cnt++;
				             ?>
				             
							 <tbody style="border-color: #c7ccd6;">
							    <tr style="border-color: purple;border:1px solid #c7ccd6;">
							      <th scope="row"><?php echo $cnt; ?></th>

							      <td><?php echo $uname; ?></td>
							      <td><?php echo $name; ?></td>
							      <td><?php echo $contact; ?></td>
							      <td><?php echo $formno; ?></td>
							      <td><?php echo $applicant; ?></td>
							      <td><?php echo $rtps; ?></td>
							      <td><?php echo $status; ?></td>
							      <td><?php echo $block; ?></td>
							    </tr>
							  </tbody>
				             <?php 
				              
				        }
				        #echo "<script>alert('Successfully data found');</script>";
				      }
				?>
				  </table>
				  
				  <center><strong style="color: purple;font-size: 20px;">Total Data Found: <?php echo $cnt; ?></strong></center>
				  <br><br>
	<center>
		<a href="AdminDashboard.php" class="btn btn-success" style="width: 50%;border-radius: 20px;">Go Back</a>
		<br>
	</center>
				  
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>
</html>