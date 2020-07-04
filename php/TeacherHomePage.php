<?php
  error_reporting(0);
  session_start();
  if (isset($_POST['btnok']))
  {
      $userid=$_POST['userid'];
      $userpass=$_POST['userpass'];
     $useremail=$_POST['useremail'];
      //Now Fetch data into database for login details
      $con=mysqli_connect("localhost","root","");
      mysqli_select_db($con,"animsdb");
      $query="select * from teacherregister where UserID='$userid' and Password='$userpass' and Email='$useremail'";
     $qrun=mysqli_query($con,$query);
      $row=mysqli_fetch_array($qrun,MYSQLI_ASSOC);
      $count=mysqli_num_rows($qrun);
     if ($count==1) {
      echo "<script> alert('Welcome to ANIMS & DCC Site Successfully Login. Thank You!!');</script>";
    }
     else
     {
       echo "<script> alert('Sorry Username or Password mismatch!!');</script>";
       echo "<script>location.href='TeacherLogin.php'</script>";
      }
  }
  else
  {
       echo "<script> alert('Something went wrong!!. Please Login');</script>";
       echo "<script>location.href='TeacherLogin.php'</script>";
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
  <title>ANIMS & DCC Teacher Home Page</title>
  <link rel="stylesheet" href="../bootstraps/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <style type="text/css">
  	.menu
  	{
  		height: 1500px;
  		width: 30%;
  		background-color: #e1edd3;
  		margin-top: 1%;
  		margin-left: 1%;
  		border-radius: 20px;
  	}
  	a:hover
  	{
  		margin-left: 5%;
  		text-decoration: none;
  		animation: all 2s;
  		background-color:transparent;
  		color: blue;
  	}
  	.iframe
  	{
  		position: relative;
  		top: -1500px;
  		left: 31%;
  		height: 1500px;
  		width: 69%;
  	}
  </style>
</head>
<body>
	<nav class="navbar navbar-expand-md bg-dark navbar-dark ">
        <div class="container text-center navmenu">
           <a href="" class="navbar-brand text-sucess font-weight-bold text-center ">ANIMS & DCC OR Goodwill Mathematics</a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsenavbar">
             <span class="navbar-toggler-icon"></span>
           </button>

           <div class="collapse navbar-collapse menu1" id="collapsenavbar">
             <ul class="navbar-nav ml-auto text-center" >
               <li class="navbar-item">
                 <a href="HomePage.php" target="content" class="nav-link text-white"><i class="fas fa-home ho"></i>&nbsp;&nbsp;Home</a>
               </li>
               <li class="navbar-item">
                 <a href="AdmissionPage.php" class="nav-link text-white menuitem" target="content">Admission</a>
               </li>
               <li class="navbar-item">
                 <a href="" data-toggle="modal" data-target="#deleteModal" class="nav-link text-white" target="content">Delete</a>
               </li>
               <li class="navbar-item">
                 <a href="" data-toggle="modal" data-target="#updateModal" class="nav-link text-white" target="content">Update</a>
               </li>
               <li class="navbar-item">
                 <a href="StudentFeePage.php" class="nav-link text-white" target="content">&nbsp;&nbsp;Fees&nbsp;&nbsp;</a>
               </li>
               <li class="navbar-item">
                 <a href="ResultPage.php" class="nav-link text-white" target="content">&nbsp;Result&nbsp;</a>
               </li>
               <li class="navbar-item">
                 <a href="ContactPage.php" class="nav-link text-white">Contact_Us</a>
               </li>
               <li class="navbar-item">
                 <a href="AboutPage.html" class="nav-link text-white">About_Us</a>
               </li>
             </ul>
           </div>

        </div>
  </nav>
  <div class="menu">
  	<table height="99%" width="100%" style="margin-left: 1%;">
  		<tr>
  			<th width="30px"><img src="../pic/right.png" height="18%" style="border-radius: 50%;"></th>
  			<th><strong>&nbsp;Important Links</strong></th>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="AdmissionPage.php" target="content"><i class="fas fa-link"></i>&nbsp;Admission</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="" data-toggle="modal" data-target="#updateModal"><i class="fas fa-link"></i>&nbsp;Update Student</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="" data-toggle="modal" data-target="#deleteModal" ><i class="fas fa-link"></i>&nbsp;Delete Student</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="" data-toggle="modal" data-target="#paymentModal"><i class="fas fa-link"></i>&nbsp;Payment Student</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="TotalDuesStudent.php" target="content"><i class="fas fa-link"></i>&nbsp;Dues Student</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="" data-toggle="modal" data-target="#studentInfoModal" target="content"><i class="fas fa-link"></i>&nbsp;Student Info</a></td>
  		</tr>
      <tr>
        <td colspan="2"><a href="QuizHomeScreen.php"> <i class="fas fa-link"></i>&nbsp;Add Quiz Question</a></td>
      </tr>
      <tr>
        <td colspan="2"><a href="AddBookPage.php" target="content"> <i class="fas fa-link"></i>&nbsp;Add Books</a></td>
      </tr>
      <tr>
        <td colspan="2"><a href="AddFacultyPage.php" target="content"> <i class="fas fa-link"></i>&nbsp;Add Faculty</a></td>
      </tr>
      <tr>
        <td colspan="2"><a href="AddCoursePage.php" target="content"> <i class="fas fa-link"></i>&nbsp;Add Course</a></td>
      </tr>
  		<tr>
  			<th><img src="../pic/right1.png" height="40px" style="border-radius: 50%;"></th>
  			<th><strong>Student Information</strong></th>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="AllStudents.php" target="content"> <i class="fas fa-link"></i>&nbsp;Total Studet</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="FirstSemStudent.php" target="content"><i class="fas fa-link"></i>&nbsp;1st Sem Student</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="SecondSemStudent.php" target="content"><i class="fas fa-link"></i>&nbsp;2nd Sem Student</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="ThirdSemStudent.php" target="content"><i class="fas fa-link"></i>&nbsp;3rd Sem Student</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="ForthSemStudent.php" target="content"><i class="fas fa-link"></i>&nbsp;4th Sem Student</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="FifthSemStudent.php" target="content"><i class="fas fa-link"></i>&nbsp;5th Sem Student</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="SixthSemStudent.php" target="content"><i class="fas fa-link"></i>&nbsp;6th Sem Student</a></td>
  		</tr>
  		<tr>
  			<th><img src="../pic/right1.png" height="40px" style="border-radius: 50%;"></th>
  			<th><strong>Dues Information</strong></th>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="TotalDuesStudent.php" target="content"><i class="fas fa-link"></i>&nbsp;Total Dues</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="FirstSemDues.php" target="content"><i class="fas fa-link"></i>&nbsp;1st Sem Dues</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="SecondSemDues.php" target="content"><i class="fas fa-link"></i>&nbsp;2nd Sem Dues</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="ThirdSemDues.php" target="content"><i class="fas fa-link"></i>&nbsp;3rd Sem Dues</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="ForthSemDues.php" target="content"><i class="fas fa-link"></i>&nbsp;4th Sem Dues</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="FifthSemDues.php" target="content"><i class="fas fa-link"></i>&nbsp;5th Sem Dues</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="SixthSemDues.php" target="content"><i class="fas fa-link"></i>&nbsp;6th Sem Dues</a></td>
  		</tr>
  		<tr>
  			<th><img src="../pic/right1.png" height="40px" style="border-radius: 50%;"></th>
  			<th><strong>Full Paid Information</strong></th>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="TotalPaidStudent.php" target="content"><i class="fas fa-link"></i>&nbsp;Total Paid Student</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="FirstSemPaidStudent.php" target="content"><i class="fas fa-link"></i>&nbsp;1st Sem Paid</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="SecondSemPaidStudent.php" target="content"><i class="fas fa-link"></i>&nbsp;2nd Sem Paid</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="ThirdSemPaidStudent.php" target="content"><i class="fas fa-link"></i>&nbsp;3rd Sem Paid</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="ForthSemPaidStudent.php" target="content"><i class="fas fa-link"></i>&nbsp;4th Sem Paid</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="FifthSemPaidStudent.php" target="content"><i class="fas fa-link"></i>&nbsp;5th Sem Paid</a></td>
  		</tr>
  		<tr>
  			<td colspan="2"><a href="SixthSemPaidStudent.php" target="content"><i class="fas fa-link"></i>&nbsp;6th Sem Paid</a></td>
  		</tr>
  	</table>
  </div>
  <iframe src="HomePage.php" name="content" class="iframe" frameborder="0"></iframe>
    <script type="text/javascript">
      function disp()
      {
         var x=document.getElementsByClassName('disp1');
         x[0].style.display='block';
         var y=document.getElementsByClassName('disp2');
         y[0].style.display='none';

      }
      function disp1()
      {
         var x=document.getElementsByClassName('payment1');
         x[0].style.display='block';
         var y=document.getElementsByClassName('payment');
         y[0].style.display='none';

      }
      function info()
      {
         var x=document.getElementsByClassName('info1');
         x[0].style.display='block';
         var y=document.getElementsByClassName('info2');
         y[0].style.display='none';

      }
      function deleteStudent()
      {
         var x=document.getElementsByClassName('delete1');
         x[0].style.display='block';
         var y=document.getElementsByClassName('delete2');
         y[0].style.display='none';

      }
    </script>



    <!--/////////////////////Here Modal Code/////////////////////////////////////-->

    <!--Update Student Modal Code -->
      <div class="modal fade"  id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student Update Dialog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
           <form action="UpdateStudentPage.php" target="content" method="post">
            <label><strong>Type Student Roll number to which you want to Update</strong></label><br>
            <input type="number" name="roll" placeholder="Type Student Roll Number" class="form-control" required="">
            <br><br>
            <center>
              <button type="submit" name="btnroll" class="btn btn-primary disp2" onclick="disp();">Submit Roll</button>
              <button type="button" class="btn btn-success disp1" data-dismiss="modal" style="display: none;">Ok</button>
            </center>
        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        <!--Delete Student Modal Code -->
      <div class="modal fade"  id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Student Dialog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
           <form action="deleteStudentForm.php"  method="post" target="content">
            <label><strong>Type Student Roll number to which you want to Delete</strong></label><br>
            <input type="number" name="roll" placeholder="Type Student Roll Number" class="form-control" required="">
            <br><br>
            <center>
              <button type="submit" name="btnDelete" class="btn btn-primary delete2" onclick="deleteStudent();">Submit Roll</button>
               <button type="button" class="btn btn-success delete1"  data-dismiss="modal" style="display: none;">Ok</button>
            </center>
        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        <!-- Student Information Modal Code -->
      <div class="modal fade"  id="studentInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student Information Dialog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
           <form action="StudentInformationPage.php" target="content" method="post">
            <label><strong>Type Student Roll number to which you want to See Information</strong></label><br>
            <input type="number" name="roll" placeholder="Type Student Roll Number" class="form-control" required="">
            <br><br>
            <center>
              <button type="submit" name="btnroll" class="btn btn-primary info2" onclick="info();">Submit Roll</button>
              <button type="button" class="btn btn-success info1" data-dismiss="modal" style="display: none;">Ok</button>
            </center>
        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      <!--Student Payment Modal -->
            <div class="modal fade"  id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student Payment Dialog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
           <form action="PaymentStudentPage.php" method="post" target="content">
            <label><strong>Type Student Roll number to which you want to Payment</strong></label><br>
            <input type="number" name="roll" placeholder="Type Student Roll Number" class="form-control" required="">
            <br><br>
            <center>
              <button type="submit" name="btnroll" class="btn btn-primary payment" onclick="disp1();">Submit Roll</button>
              <button type="button" class="btn btn-success payment1" data-dismiss="modal" style="display: none;">Ok</button>
            </center>
        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



  </body>
</html>