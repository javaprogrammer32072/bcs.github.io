<?php 
include '../db/db.php';
session_start();
    #Now Fetch Operator Data
    #$id=$_SESSION['id'];

  if (isset($_POST['btnok']))
  {
      $userid=$_POST['userid'];
      $userpass=$_POST['userpass'];
      $_SESSION['id']=$userid;
      #$useremail=$_POST['useremail'];
      //Now Fetch data into database for login details
      $query="select * from operatordetails where id='$userid' and Password='$userpass'";
     $qrun=mysqli_query($con,$query);
      $row=mysqli_fetch_array($qrun,MYSQLI_ASSOC);
      $count=mysqli_num_rows($qrun);
     if ($count==1) {
      echo "<script> alert('Welcome to Our Home Work Shop Web Site Successfully Login. Thank You!!');</script>";
      }
     else
     {
       echo "<script> alert('Sorry Username or Password mismatch!!');</script>";
       echo "<script>location.href='../index.php'</script>";
      }
  }
  else
  {
       #echo "<script> alert('Something went wrong!!. Please Login');</script>";
       #echo "<script>location.href='../index.php'</script>";
  }
    $userid=$_SESSION['id'];
    $sql="select * from operatordetails where id='$userid' ";
    $result = $con->query($sql);
    if ($result->num_rows > 0)
    {
      // output data of each row
        if($row = $result->fetch_assoc())
        {
            $id=$row["id"];
            $fname=$row["FirstName"];
            $lname=$row["LastName"];
            $contact=$row["Contact"];
            $address=$row["Thana"];
            $name=$fname." ".$lname;
            $_SESSION['name']=$name;
            $_SESSION['contact']=$contact;
            $_SESSION['address']=$address;
            $_SESSION['id']=$id;
            
      }
      #echo "<script>alert('Successfully data found');</script>";
    }
    else
    {
      echo "<script>alert('Sorry Invalid ID Try Again!!');</script>";
      #echo "<script>location.href='HomePage.php';</script>";
    }
    //Get total data from db
    $n=1;
      $sql="select * from totaldata where SrNo='$n' ";
      $result = $con->query($sql);
      if ($result->num_rows > 0)
      {
        // output data of each row
          if($row = $result->fetch_assoc())
          {
              
              $search=$row["Search"];
              $entry=$row["Entry"];
              $both=$row["Both"];
              
              
        }
        #echo "<script>alert('Successfully data found');</script>";
      }
  
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Home Page</title>
    <style type="text/css">
      .header
      {
         background-color: #396344;
      }
      .header h2
      {
        font-style: italic;
         padding-top: 5px;
         padding-bottom: 5px;
         color: white;
      }
      .navbarcss
      {
         background-color: #396344;
         margin-top: -10px;

      }
      li:hover
      {
        transition: all 0.7s;
        background-color: blue;
      }
      ul li
      {
         font-size: 20px;

      }
      .menu
      {
         margin-left: -20px;
         width: 110%;
         height: 1000px;
         border-radius: 30px;
         background-color: #396344;
         z-index: 0;
      }
      .menu ul li
      {
         list-style: none;
      }
      .menu ul li a
      {
         color: white;
         line-height: 50px;
      }
      .iframe
      {
         padding-left: -3%;
         margin-left: -3%;
         width: 105%;
         height: 105%;

      }
      .footer
      {
         background-color: #396344;
         position: absolute;
         margin-top: 0;
         
         border:1px solid white;
         border-color: white;

      }
      .footer .contents ul li
      {
        text-decoration: none;
        list-style: none;
        text-align: left;
        margin-left: 80px;
        font-family: all;
      }
      .footer .contents ul li:hover
      {
         background-color: #396344;
         text-decoration: underline;
      }
      .footer .contents ul li a
      {
         color: #c0c2be;
         
         text-decoration: none;
      }
      .footer .contents
      {
        padding-top: 20px;
        font-size: 25px;
         text-align: center;
         color: white;
         margin: 0px;
         padding: 0px;
      }
      .footer .contents #email,#message
      {
        background-color: transparent;
        border-radius: 6px;
        color: white;
        border:1px solid #c0c2be;
      }
      .footer .contents #message
      {
         margin-top: 10px;
      }
      .footer .contents #btnSent
      {
         background-color: transparent;
         border:1px solid white;
         align-items: stretch;
      }
      .footer .contents #btnSent:hover
      {
          background-color: green;
      }
      p{
         font-size: 12px;
         color: #c0c2be;
      }
      .footer .bottom
      {
         background-color: #1b4d24;
         padding-top:6px;
         padding-bottom: 6px;
         color: white;
         width: 100%;
         text-align: center;
      }
    </style>
  </head>
  <body>
      <div class="container-fluid text-center header ">
          <h2><strong>Online Data Entry System
          </strong></h2><br><h3><strong style="color: red;">Welcome to <?php echo $name; ?></strong></h3>
      </div>
    
      <div class="coltainer bg-primary">
            <center>
              <h1>--Dashboard--</h1>
            </center>
            <br>
            <div class="coltainer bg-primary" style="border-color: white;border-radius: 30px;border-style: groove;">
                <center>
                  <h2>Current Work</h2>
                  <br>
                  <input type="button" name="" id="rashan" value="Rashan" class="btn btn-success" style="width: 40%;border-radius: 20px" onclick="disp();">
                  <input type="button" name=""data-toggle="modal" data-target="#submitModal" value="Submit Data in Sheet" class="btn btn-success" style="width: 40%;border-radius: 20px;">
                </center>
                <br>
                <div class="coltainer bg-info currentwork" style="height: 400px; width: 50%; display: none;" id="currentwork">
                    <center><h3>Data Entry Type</h3></center>
                    <input type="button" name="" data-toggle="modal" data-target="#searchModal" value="Search" class="btn btn-success" style="width: 30%;border-radius: 20px">
                    <input type="button" name="" data-toggle="modal" data-target="#entryModal" value="Entry" class="btn btn-success" style="width: 30%;border-radius: 20px">
                    <input type="button" name="" data-toggle="modal" data-target="#bothModal" value="Both" class="btn btn-success" style="width: 30%;border-radius: 20px">
                    <br>
                    <strong style="margin-left: 12%; color: white;"><?php echo $search; ?></strong>
                    <strong style="margin-left: 25%;color: white;"><?php echo $entry; ?></strong>
                    <strong style="margin-left: 25%;color: white;"><?php echo $both; ?></strong>
                </div>
            </div>
            <br>
      </div>
      <div class="container-fluid footer">
            <div class="container-fluid contents">
                <div class="row">
                    <div class="col-lg-4 col-sm-4 col-12">
                       <strong>Inspires</strong>
                       <br>
                       <p>An institute is an organisational body created for a certain purpose. They are often research organisations (research institutions) created to do research on specific topics. An institute can also be a professional body, or an educational unit imparting vocational training—see Mechanics' Institutes.</p>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-12">
                       <strong>Quick Links</strong>
                       <br>
                       <ul>
                         <li><a href="">Home</a></li>
                         <li><a href="">Courses</a></li>

                       </ul>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-12">
                       <strong>Contact Us</strong>
                       <br>
                       <form action="" method="post">
                          <input type="text" class="form-control" name="" placeholder="Type Email Address..." id="email">
                          <textarea rows="3" placeholder="Type Your Message..." class="form-control" id="message">
                        
                          </textarea>
                          <input type="submit" name="" class="btn btn-success" value="Sent" id="btnSent">
                       </form>
                    </div>
                </div>
            </div>
            <div class="container-fluid bottom">
              &copy;copyright 2020 | Developed by Ankit Kumar Thakur
            </div>
      </div>
    <!
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
      <script type="text/javascript">
      function disp()
      {
         var x=document.getElementsByClassName('currentwork');
         x[0].style.display='block';
         //var y=document.getElementsByClassName('disp2');
         //y[0].style.display='none';

      }
     
    </script>

<!--  Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Data Entry Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="request.php" method="post">
          <strong>Enter number of Search entry</strong>
          <input type="number" value="search" name="search" class="form-control">
          <br>
          <center>
            <br>
            <input type="submit" name="btnSearch" value="Request Entry" class="btn btn-primary">
          </center>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--  Entry Modal -->
<div class="modal fade" id="entryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Data Entry Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="request.php" method="post">
          <strong>Enter number of request entry</strong>
          <input type="number" name="search1" class="form-control" placeholder="No of Request Entry">
          <br>
          <center>
            <br>
            <input type="submit" name="btnSearch1" value="Request Entry" class="btn btn-primary">
          </center>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--  both Modal -->
<div class="modal fade" id="bothModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Data Entry Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="request.php" method="post">
          <strong>Enter number of request both entry</strong>
          <input type="number"name="search2" class="form-control" placeholder="No of Request Entry">
          <br>
          <center>
            <br>
            <input type="submit" name="btnSearch2" value="Request Entry" class="btn btn-primary">
          </center>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!--  Form Submit Modal -->
<div class="modal fade" id="submitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Data Entry Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="AddEntryForm.php" method="post">
          <strong>Enter Tehsil(Block)</strong>
          <input type="text"name="block" class="form-control" placeholder="Tehsil(Block)">
          <br>
          <center>
            <br>
            <input type="submit" name="entryno" value="Submit Details" class="btn btn-primary">
          </center>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

  </body>
</html>
