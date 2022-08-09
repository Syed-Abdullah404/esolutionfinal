<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



// require 'PHPMailer/SMTP.php';
// require 'PHPMailer/PHPMailer.php';
// require 'PHPMailer/Exception.php';
//Load Composer's autoloader
require 'vendor/autoload.php';
include 'header.php';
include 'connection.php';
?>

<!--Signup-->
<div class="container mb-5">
    <div class="row">
        <div class="col-lg-12" style="margin: 150px 0px 20px 0px;">
            <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item login" role="presentation">
                    <button class="nav-link loginlink " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Student Solution</button>
                </li>
                <li class="nav-item login" role="presentation">
                    <button class="nav-link loginlink" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Short Courses</button>
                </li>


            </ul>
        </div>
    </div>



    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row">


                <div class="col-lg-4 col-md-12 col-sm-12">

                </div>
                <div class="col-lg-4 col-md-12 col-sm-12  text-center" style="background-color: #f3f3f3; border-top: 4px solid #0B0452; border-bottom: 4px solid #0B0452;  border-radius: 15px; margin: 0px 0px 100px 0px;">

                    <div class="col-lg-12">
                        <h2 class=" text-center mt-5">Sign Up for Solution</h2>
                        <hr>
                    </div>

                    <div class="col-lg-12">


                        <form id="contact-form" method="POST">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <input type="text" class="form-control" name="name" placeholder="Name" required="">
                                </div>

                            </div>
                            <div class="col-md-12 ">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="">
                            </div>

                            <div class="col-md-12 ">
                                <input type="password" class="form-control" name="password" placeholder="Password" id="myInput1" required>
                            </div>
                            <div class="col-md-12 ">
                                <input type="password" class="form-control" name="cpassword" id="myInput" placeholder="Confirm Password" require>

                            </div>

                            <div class="col-md-12 mb-5">
                                <button id="submit" type="submit" class="form-control" name="solution">Sign Up</button>
                                <a href="login.php" style="text-decoration: none;">Already Have an Account?</a>

                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">

                </div>
            </div>
        </div>


        <?php

        if (isset($_POST['solution'])) {
            $name = $_POST['name'];


            $email = $_POST['email'];
            $password = $_POST['password'];

            $cpassword = $_POST['cpassword'];
           

            $check = mysqli_query($conn, "select * from student_sign_up where email='$email'");
            $count = mysqli_num_rows($check);
            if ($count == 0) {
                if ($password == $cpassword ) {
               


                    //Instantiation and passing `true` enables exceptions
                    $mail = new PHPMailer(true);

                    try {
                        //Enable verbose debug output
                        $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;

                        //Send using SMTP
                        $mail->isSMTP();

                        //Set the SMTP server to send through
                        $mail->Host = 'smtp.gmail.com';

                        //Enable SMTP authentication
                        $mail->SMTPAuth = true;

                        //SMTP username
                        $mail->Username = 'fix404error@gmail.com';

                        //SMTP password
                        $mail->Password = 'wtzugksivbzsgbei';

                        //Enable TLS encryption;
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

                        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                        $mail->Port = 587;

                        //Recipients
                        $mail->setFrom('fix404error@gmail.com', 'Virtual Skills');

                        //Add a recipient
                        $mail->addAddress($email, $name);

                        //Set email format to HTML
                        $mail->isHTML(true);

                        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

                         $mail->Subject = 'Email verification';
                        // $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
                         $mail->Body    = '<p><div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2 ;">
                         <div style="margin:50px auto;width:70%;padding:20px 0">
                           <div style="border-bottom:1px solid #eee">
                             <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Virtual Skills</a>
                           </div>
                           <p style="font-size:1.1em">Hi,</p>
                           <p>Thank you for choosing Your Brand. Use the following OTP to complete your Sign Up procedures.</p>
                           <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 17px;color: #fff;border-radius: 4px;">'. $verification_code .'</h2>
                           <p style="font-size:0.9em;">Regards,<br />Virtual Skills</p>
                           <hr style="border:none;border-top:1px solid #eee" />
                           <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
                             <p>Your Brand Inc</p>
                             <p>Gujranwla satellite Town</p>
                             <p>Pakistan</p>
                           </div>
                         </div>
                       </div>';

                        $mail->send();
                        // echo 'Message has been sent';

                        $sql = mysqli_query($conn, "INSERT INTO `student_sign_up`(`name`,`email`, `password`, `cpassword`,`approval`,`otp_code`) VALUES ('$name','$email','$password','$cpassword','pending','$verification_code')");
                        if ($sql) {
                            echo "<script>alert('Sign Up Successful.. Wait For Admin Approval !!') </script>";
                            echo "<script>alert('check your mail for verification !!') </script>";
                            $select_student = "select * from student_sign_up";
                            $run = mysqli_query($conn, $select_student);
                            while ($row = mysqli_fetch_assoc($run)) {
                                $id_for_otp = $row['id'];
                            }

        ?>
                            <script>
                                window.location = "<?php echo $app_url . 'otp.php?id=' . "$id_for_otp" ?>";
                            </script>
        <?php

                        } else {
                            echo "<script>alert('Something Went Wrong  !!') </script>";
                        }
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
             

                } else {
                    echo "<script>alert('Password Not Match  !!') </script>";
                }
           
            } else {
                echo "<script>alert('Email Already Exist !!') </script>";
            }
       
    }

        ?>


        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row">


                <div class="col-lg-4 col-md-12 col-sm-12">

                </div>
                <div class="col-lg-4 col-md-12 col-sm-12  text-center" style="background-color: #f3f3f3; border-top: 4px solid #0B0452; border-bottom: 4px solid #0B0452;  border-radius: 15px; margin: 0px 0px 100px 0px;">

                    <div class="col-lg-12">
                        <h2 class=" text-center mt-5">Sign Up for Courses</h2>
                        <hr>
                    </div>

                    <div class="col-lg-12">


                        <form id="contact-form" method="POST">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <input type="text" class="form-control " name="name" placeholder="Name" required="">
                                </div>

                            </div>
                            <div class="col-md-12 ">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="">
                            </div>

                            <div class="col-md-12 ">
                                <input type="password" class="form-control" name="password" placeholder="Password" required="">

                            </div>
                            <div class="col-md-12 ">
                                <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" required="">

                            </div>

                            <div class="col-md-12 mb-5">
                                <button id="submit" type="submit" class="form-control" name="course">Sign Up</button>
                                <a href="login.php" style="text-decoration: none;">Already Have an Account?</a>

                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>


<!--footer-->
<div class="container-fluid management">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-5 text-center   ">
                <h2 id="managementheading" class="display-4">
                    Social Media
                </h2>

                <ul class="social-icon">
                    <li><a href="" class="fab fa-facebook-f"></a></li>
                    <li><a href="" class="fab fa-twitter"></a></li>
                    <li><a href="" class="fab fa-instagram"></a></li>
                    <li><a href="" class="fab fa-youtube"></a></li>
                </ul>
            </div>
        </div>

    </div>
</div>


<div class="container-fluid management">
    <div class="container">
        <div class="row">
            <div class=" col-lg-12 mt-2" style="color: white;">
                <hr>
                <p>Copyright 2021 All Right Reserved. Design and Developed by Centre of Technological Excellence.
                </p>
            </div>

        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>



<?php

if (isset($_POST['course'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $check = mysqli_query($conn, "select * from student_sign_up_course where email='$email'");
    $count = mysqli_num_rows($check);
    if ($count == 0) {
        if ($password == $cpassword) {


            //Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Enable verbose debug output
                $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;

                //Send using SMTP
                $mail->isSMTP();

                //Set the SMTP server to send through
                $mail->Host = 'smtp.gmail.com';

                //Enable SMTP authentication
                $mail->SMTPAuth = true;

                //SMTP username
                $mail->Username = 'fix404error@gmail.com';

                //SMTP password
                $mail->Password = 'wtzugksivbzsgbei';

                //Enable TLS encryption;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

                //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                $mail->Port = 587;

                //Recipients
                $mail->setFrom('fix404error@gmail.com', 'your_website_name');

                //Add a recipient
                $mail->addAddress($email, $name);

                //Set email format to HTML
                $mail->isHTML(true);

                $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

                // $mail->Subject = 'Email verification';
                $mail->header  = '<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
                <div style="margin:50px auto;width:70%;padding:20px 0">
                  <div style="border-bottom:1px solid #eee">
                    <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Virtual skill</a>
                  </div>';

                  $mail->Body = ' <p style="font-size:1.1em">Hi,</p>
                  <p>Thank you for choosing Your Brand. Use the following OTP to complete your Sign Up procedures.</p>';
                $mail->Body = '<h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">'. $verification_code .'</h2>';
$mail->Body = '<p style="font-size:0.9em;">Regards,<br />Your Brand</p>
<hr style="border:none;border-top:1px solid #eee" />
<div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
  <p>Your Brand Inc</p>
  <p>1600 Amphitheatre Parkway</p>
  <p>California</p>
</div>
</div>
</div>';
                $mail->send();
                // echo 'Message has been sent';


                $sql = mysqli_query($conn, "INSERT INTO `student_sign_up_course`(`name`,`email`, `password`, `cpassword`,`approval`,`otp_code`) VALUES ('$name','$email','$password','$cpassword','pending','$verification_code')");
                if ($sql) {
                    echo "<script>alert('Sign Up Successful.. Wait For Admin Approval !!') </script>";
                    echo "<script>alert('check your mail for verification !!') </script>";
                    $select_student = "select * from student_sign_up_course";
                    $run = mysqli_query($conn, $select_student);
                    while ($row = mysqli_fetch_assoc($run)) {
                        $id_for_otp = $row['id'];
                    }

?>
                    <script>
                        window.location = "<?php echo $app_url . 'otp_course.php?id=' . "$id_for_otp" ?>";
                    </script>
<?php

                } else {
                    echo "<script>alert('Something Went Wrong  !!') </script>";
                }
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "<script>alert('Password Not Match  !!') </script>";
        }
    } else {
        echo "<script>alert('Email Already Exist !!') </script>";
    }
}

?>