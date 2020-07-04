<?php
  include '../db/db.php';
  session_start();
  if (isset($_POST['entryno']))
  {
    # code...
    $col=$_POST['col'];
    $block=$_POST['block'];
    $_SESSION['block']=$block;
    $currentDateTime = date('Y-m-d H:i:s');

  }
     $token = "";
     $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
     $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
     $codeAlphabet.= "0123456789";
     $max = strlen($codeAlphabet);

    for ($i=0; $i < 6; $i++) {
        $token .= $codeAlphabet[random_int(0, $max-1)];
    }
  //Here Sava Form Data into db
  if (isset($_POST['submitCol']))
  {
      $name=$_SESSION['name'];
      $contact=$_SESSION['contact'];
      $block=$_SESSION['block'];
      $address=$_SESSION['address'];
      $userid=$_SESSION['id'];
      $formno=$_POST['formno'];
      $applicant=$_POST['applicant'];
      $rtps=$_POST['rtps'];
      $status=$_POST['status'];
      #$sql="INSERT INTO `allentrydata`(`UserName`, `Name`, `Contact`, `Address`, `FormNo`, `Applicant`, `RTPS`, `Status`,'Block') VALUES ('$userid','$name','$contact','$address','$formno','$applicant','$rtps','$status','$block')";
      $sql="INSERT INTO `allentrydata`(`UserName`, `Name`, `Contact`, `Address`, `FormNo`, `Applicant`, `RTPS`, `Status`, `Block`) VALUES ('$userid','$name','$contact','$address','$formno','$applicant','$rtps','$status','$block')";
      if (strlen($rtps)==18) {
        # code...
        if (mysqli_query($con,$sql)){
        # code...
        echo "<script>alert('Successfully Save, Thank You!!');</script>";
        #echo "<script>location.href='HomePage.php'</script>";
        }
        else
        {
          echo "<script>alert('Sorry!! Failed to Save.');</script>";
        }
      }
      else
      {
          echo "<script>alert('Sorry!! RTPS No  is Wrong.');</script>";
      }
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

    <title>Add Entry Form</title>
    <style type="text/css">
      body
      {
        background-color: #abc7b2;
      }
      strong
      {
        color: white;
        font-size: 20px;
      }
    </style>
  </head>
  <body>
    <div class="container-flued bg-primary">
        <center>
          <strong style="font-size: 25px;"><br>Add Entry Form<br></strong>
          
        </center>
    </div>
    <br>
    <div class="container " style="border-radius: 30px;border-color: blue;border-style: groove;background-color: #1c2c4d;">
      <br><br>
      <form action="" method="post">
          <div class="row">
              <div class="col-6">
                  <strong>Form No</strong>
                  <input type="text" readonly="" value="<?php echo $token; ?>" style="border-radius: 20px;color: white;background-color: transparent;" name="<?php echo "formno";?>" class="form-control" required=""  placeholder="Type Form No" s>
              </div>
              <div class="col-6">
                <strong>Enter Applicant Name</strong>
                  <input type="text" style="border-radius: 20px;color: white;background-color: transparent;" name="<?php echo "applicant"; ?>" class="form-control" required="" placeholder="Type Applicant Name">
              </div>
            </div><br>
            <div class="row">
              <div class="col-6">
                <strong>Enter RTPS No</strong>
                  <input type="number" style="border-radius: 20px;color: white;background-color: transparent;" name="<?php echo "rtps"; ?>" class="form-control" required="" placeholder="Type RTPS No">
              </div>
              <div class="col-6" >
                <strong>Choose Entry Status</strong>
                  <select class="form-control" style="border-radius: 20px;color: white;background-color: transparent;" name="<?php echo "status"; ?>">
                    <option>Saved</option>
                    <option>Forwarded</option>
                  </select>
              </div>
              
            </div>
            <div class="row">
              <div class="col-12">
                <br><br><center>
                  <input type="submit" value="Save" name="submitCol" class="btn btn-success" style="width: 60%;border-radius: 10px;"></center>
              </div>
            </div>
            
      </form>
            <br>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>