<?php
	session_start();
	include '../db/db.php';
	//Approve For Search data
	for ($i=1; $i <=100 ; $i++) { 
		# code...
		if (isset($_POST['approve'.$i])) {
		# code...
			$id=$_SESSION['id'.$i];
			$contact=$_SESSION['contact'.$i];
			$sql="DELETE FROM `requestsearchdata` WHERE UserName='$id'";
			if (mysqli_query($con,$sql)) {
				# code...
				#echo "Successfully";
				echo "<script> alert('Successfully Approved ID: $id');</script>";
				#echo "<script>location.href='AdminDashboard.php';<script>";
			}
			else
				echo "<script>alert('Failed to Approved $contact');</script>";
		}
	}
	//Approve For entry data
	for ($i=1; $i <=100 ; $i++) { 
		# code...
		if (isset($_POST['entry'.$i])) {
		# code...
			$id=$_SESSION['eid'.$i];
			$contact=$_SESSION['econtact'.$i];
			$sql="DELETE FROM `requestentrydata` WHERE UserName='$id'";
			if (mysqli_query($con,$sql)) {
				# code...
				#echo "Successfully";
				echo "<script> alert('Successfully Approved ID: $id');</script>";
				#echo "<script>location.href='AdminDashboard.php';<script>";
			}
			else
				echo "<script>alert('Failed to Approved $contact');</script>";
		}
	}
	//Approve For Both data
	for ($i=1; $i <=100 ; $i++) { 
		# code...
		if (isset($_POST['both'.$i])) {
		# code...
			$id=$_SESSION['bid'.$i];
			$contact=$_SESSION['bcontact'.$i];
			$sql="DELETE FROM `requestbothdata` WHERE UserName='$id'";
			if (mysqli_query($con,$sql)) {
				# code...
				#echo "Successfully";
				echo "<script> alert('Successfully Approved ID: $id');</script>";
				#echo "<script>location.href='AdminDashboard.php';<script>";
			}
			else
				echo "<script>alert('Failed to Approved $contact');</script>";
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

	<title>Admin Dashboard</title>
	<style type="text/css">
		table,tr,td,th,tbody
		{
			color: white;
			border-color: purple;

		}
	</style>
</head>
<body>

	<div class="container-fluied bg-success">
		<center>
			<strong style="color: white;font-size: 30px;padding-top: 30px;padding-bottom: 3%;margin-top: 30px;">--Admin Dashboard--</strong>
		</center>
	</div>
	<div class="container-fluied bg-info" style="margin-top: 2%;margin-bottom: 2%;">
		<form action="AllEntryData.php" method="post">
			<div class="row">
				<div class="col-6" style="margin-top: 20px;margin-bottom: 20px;">
					<center>
						<a href="AllEntryData.php" class="btn btn-success" style="width: 50%;border-radius: 20px;">All Entry Data</a>
					</center>
				</div>
				<div class="col-6" style="margin-top: 20px;margin-bottom: 20px;">
					<center>
					<input type="button" class="btn btn-success" value="User Wise Data" data-toggle="modal" data-target="#userWiseModal" style="width: 50%;border-radius: 20px;">
					</center>
				</div>
			</div>
		</form>
	</div>
	<div class="container-fluied">
		<div class="row">
			<div class="col-6">
				<div class="container" style=" background-color: purple;">
				<center><strong style="color: white;font-size: 25px;">All Curren User</strong></center>
				<br>
				<table class="table table-hover table-responsive">
					<thead>
						 <tr>
						 	<th scope="col">SrNo</th>
							<th scope="col">ID</th>
							<th scope="col">Name</th>
							<th scope="col">Contact</th>
						  </tr>
					</thead>
							  
				<?php
					  $sql="select * from operatordetails";
				      $result = $con->query($sql);
				      $cnt=0;
				      if ($result->num_rows > 0)
				      {
				        // output data of each row
				          while($row = $result->fetch_assoc())
				          {
				              
				              $id=$row["id"];
				              #$uname=$row["UserName"];
				              $fname=$row["FirstName"];
				              $lname=$row["LastName"];
				              $contact=$row["Contact"];
				              $name=$fname." ".$lname;
				              $cnt++;
				             ?>
				             
							 <tbody style="border-color: purple;">
							    <tr style="border-color: purple;border:3px solid purple;">
							      <th scope="row"><?php echo $cnt; ?></th>
							      <td><?php echo $id; ?></td>
							      <td><?php echo $name; ?></td>
							      <td><?php echo $contact; ?></td>
							    </tr>
							  </tbody>
				             <?php 
				              
				        }
				        #echo "<script>alert('Successfully data found');</script>";
				      }
				?>
				  </table>
				</div>
			</div>
			<div class="col-6">
				<div class="container" style=" background-color: #2f2a8c;">
				<center><strong style="color: white;font-size: 25px;">Approved Request Pending</strong></center>
				
				<br>
				<center><strong style="color: white;font-size: 20px;">Search Request</strong></center>
				<table class="table table-hover table-responsive">
					<thead>
						 <tr>
							<th scope="col">User Id</th>
							<th scope="col">Name</th>
							<th scope="col">Contact</th>
							<th scope="col">Address</th>
							<th scope="col">Search</th>
							<th scope="col">Date</th>
							<th scope="col">Approve</th>
						  </tr>
					</thead>
							  
				<?php
					  $sql="select * from requestsearchdata";
				      $result = $con->query($sql);
				      $cnt=0;
				      if ($result->num_rows > 0)
				      {
				        // output data of each row
				          while($row = $result->fetch_assoc())
				          {
				              
				              $id=$row["UserName"];
				              #$uname=$row["UserName"];
				              $name=$row["Name"];
				 
				              $contact=$row["Contact"];
				              $address=$row["Address"];
				              $search=$row["Search"];
				              $date=$row["Date"];
				            
				              $cnt++;
				              echo $cnt;
				             ?>
				             
							 <tbody style="border-color: transparent;">
							    <tr style="border-color: purple;border:3px solid transparent;">
							      <th scope="row"><?php echo $id; $_SESSION['cnt']=$cnt; $_SESSION['id'.$cnt]=$id; ?></th>
							      <td><?php echo $name;  ?></td>
							      <td><?php echo $contact; $_SESSION['contact'.$cnt]=$contact; ?></td>
							      <td><?php echo $address; ?></td>
							      <td><?php echo $search; ?></td>
							      <td><?php echo $date; ?></td>
							      <td>
							      	<form action="" method="post">
							      		<input type="submit" name="<?php echo "approve".$cnt; ?>" class="btn btn-primary" value="Approve">
							      	</form>
							      </td>
							    </tr>
							  </tbody>
				             <?php 
				              
				        }
				        #echo "<script>alert('Successfully data found');</script>";
				      }
				?>
				  </table>
				  <br>
				<center><strong style="color: white;font-size: 20px;">Entry Request</strong></center>
				<table class="table table-hover table-responsive">
					<thead>
						 <tr>
							<th scope="col">User Id</th>
							<th scope="col">Name</th>
							<th scope="col">Contact</th>
							<th scope="col">Address</th>
							<th scope="col">Entry</th>
							<th scope="col">Date</th>
							<th scope="col">Approve</th>
						  </tr>
					</thead>
							  
				<?php
					  $sql="select * from requestentrydata";
				      $result = $con->query($sql);
				      $cnt=0;
				      if ($result->num_rows > 0)
				      {
				        // output data of each row
				          while($row = $result->fetch_assoc())
				          {
				              
				              $id=$row["UserName"];
				              #$uname=$row["UserName"];
				              $name=$row["Name"];
				 
				              $contact=$row["Contact"];
				              $address=$row["Address"];
				              $search=$row["Entry"];
				              $date=$row["Date"];
				            
				              $cnt++;
				             ?>
				             
							 <tbody style="border-color: transparent;">
							    <tr style="border-color: purple;border:3px solid transparent;">
							      <th scope="row"><?php echo $id; $_SESSION['ecnt']=$cnt; $_SESSION['eid'.$cnt]=$id; ?></th>
							      <td><?php echo $name; ?></td>
							      <td><?php echo $contact; $_SESSION['econtact'.$cnt]=$contact;?></td>
							      <td><?php echo $address; ?></td>
							      <td><?php echo $search; ?></td>
							      <td><?php echo $date; ?></td>
							      <td>
							      	<form action="" method="post">
							      		<input type="submit" name="<?php echo "entry".$cnt; ?>" class="btn btn-primary" value="Approve">
							      	</form>
							      </td>
							    </tr>
							  </tbody>
				             <?php 
				              
				        }
				        #echo "<script>alert('Successfully data found');</script>";
				      }
				?>
				  </table>
				  <br>
				<center><strong style="color: white;font-size: 20px;">Both (Search & Entry) Request</strong></center>
				<table class="table table-hover table-responsive">
					<thead>
						 <tr>
							<th scope="col">User Id</th>
							<th scope="col">Name</th>
							<th scope="col">Contact</th>
							<th scope="col">Address</th>
							<th scope="col">Both</th>
							<th scope="col">Date</th>
							<th scope="col">Approve</th>
						  </tr>
					</thead>
							  
				<?php
					  $sql="select * from requestbothdata";
				      $result = $con->query($sql);
				      $cnt=0;
				      if ($result->num_rows > 0)
				      {
				        // output data of each row
				          while($row = $result->fetch_assoc())
				          {
				              
				              $id=$row["UserName"];
				              #$uname=$row["UserName"];
				              $name=$row["Name"];
				 
				              $contact=$row["Contact"];
				              $address=$row["Address"];
				              $search=$row["Both"];
				              $date=$row["Date"];
				            
				              $cnt++;
				             ?>
				             
							 <tbody style="border-color: transparent;">
							    <tr style="border-color: purple;border:3px solid transparent;">
							      <th scope="row"><?php echo $id; $_SESSION['bcnt']=$cnt; $_SESSION['bid'.$cnt]=$id; ?></th>
							      <td><?php echo $name; ?></td>
							      <td><?php echo $contact; $_SESSION['bcontact']=$contact; ?></td>
							      <td><?php echo $address; ?></td>
							      <td><?php echo $search; ?></td>
							      <td><?php echo $date; ?></td>
							      <td>
							      	<form action="" method="post">
							      		<input type="submit" name="<?php echo "both".$cnt; ?>" class="btn btn-primary" value="Approve">
							      	</form>
							      </td>
							    </tr>
							  </tbody>
				             <?php 
				              
				        }
				        #echo "<script>alert('Successfully data found');</script>";
				      }
				?>
				  </table>
			</div>
	
		</div>
	</div>
<!--  Search Modal -->
<div class="modal fade" id="userWiseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Data Entry Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="UserWiseData.php" method="post">
          <strong>Enter User Name</strong>
          <input type="text"  name="search" class="form-control" placeholder="UserName">
          <br>
          <center>
            <br>
            <input type="submit" name="btnSearch" value="View Data" class="btn btn-primary">
          </center>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>
</html>