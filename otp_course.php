<?php

include 'connection.php';
include 'header.php';

define("TITLE", "OTP");
define("PAGE", "OTP");

$getid = $_GET['id'];
if (isset($_POST['submit'])) {
     

    $id=$_POST['id'];
    // echo "<script>alert('$get_email') </script>";   
    $otp = $_POST['otp'];
    // echo "<script>alert('$otp') </script>";   

        
     $check = "UPDATE `student_sign_up_course` SET `approval`='YESLOG' WHERE id =$getid ";
     if($check){
        $sqli = "select * from student_sign_up_course where id = '$getid'";
        $sql = mysqli_query($conn, $sqli);
        while ($row = mysqli_fetch_assoc($sql)) {
            $name = $row['name'];
            $email = $row['email'];
            $password = $row['password'];
            $cpassword = $row['cpassword'];

        // $sql = mysqli_query($conn, "UPDATE `admin_student` SET `status`='approve' WHERE email='$email'");
        $approve_login = mysqli_query($conn, "INSERT INTO `admin_student_short_course`(`name`, `cnic`, `faculty`, `mobile`, `email`, `password`, `cpassword`, `address`, `session`, `start_date`, `end_date`, `status`) VALUES ('$name','0','0','$mobile','$email','$password','$cpassword','','0',NOW(),NOW(),'pending')");
        } 
    }
     $count = mysqli_query($conn,$check);


  if(mysqli_affected_rows($conn) == 0){
        // echo "<script>alert('failed') </script>";   
die("verification code filed");
  }else{
      ?>
    <script>
            
                window.location = "<?php echo $app_url .'login.php'; ?>";
          </script>
          <?php
  
  }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>OTP</title>
    <style>
        .sec_box {
            display: none;
        }

        span {
            color: red;
        }

        p {

            font-weight: 500;
            font: 2em sans-serif;
        }

        ul li a:hover {
            background: #0B0452;
            color: #fff !important;
            border-radius: 7px;
        }

        button {
            background: #0B0452;
            color: #fff !important;
            border-radius: 7px;
            padding: 10px;
            border: none;
        }

        h1,
        p {
            color: #0B0452;
        }
    </style>
</head>

<body>




    <div class="container bg-light  shadow-lg p-3 mb-5 bg-body rounded" style="margin-top:190px;">
        <div class="col-md-6 mx-auto f_box">
            <h1 class="text-center mt-5">Signup verification</h1><br>
            <h3 class="text-center mt-1">PLEASE CHECK YOUR MAIL</h3>
            <form method="post">
                <input type="text" name="otp" class="form-control" id="email" placeholder="Enter Your otp"><br>
                <input type="text" name="email" class="form-control" id="email_val"  value="<?php echo $_GET['id']; ?>"><br>
                <span id="email_error"></span><br>
                <button type="submit" class=" mt-1 mb-5" style="margin-left:230px;" name="submit">Send OTP</button>

            </form>
        </div>

       

         
        </div>

    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        function send_otp() {
            var email = $('#email').val();
            $.ajax({
                url: "send_otp.php",
                type: "post",
                data: "email=" + email,

                success: function(result) {
                    if (result == 'yes') {
                        $('.sec_box').show();
                        $('.f_box').hide();
                    }

                    if (result == 'no') {
                        $('#email_error').html('Please Enter Valid Email Address !!!');

                    }
                }
            });
        }

        function check_otp() {
            var otp = $('#otp').val();
            $.ajax({
                url: "check_otp.php",
                type: "post",
                data: "otp=" + otp,

                success: function(result) {
                    if (result == 'yes') {

                        window.location = "<?php echo $app_url . 'student/profile.php?id=' . "$ids" ?>";


                    }
                    if (result == 'no') {

                        $('#otp_error').html('Enter Correct OTP !!!');
                    }
                }
            });
        }
    </script>
</body>


</html>