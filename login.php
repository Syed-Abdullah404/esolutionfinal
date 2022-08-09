<?php
session_start();
include 'header.php';
include 'connection.php';

?>

<div class="container mb-5">
    <div class="row">
        <div class="col-lg-12" style="margin: 150px 0px 20px 0px;">
            <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item login" role="presentation">
                    <button class="nav-link loginlink " id="pills-home-tab " data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Log In as Admin</button>
                </li>
                <li class="nav-item login" role="presentation">
                    <button class="nav-link loginlink" id="pills-profile-tab " data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Log In as Student</button>
                </li>
                <li class="nav-item login" role="presentation">
                    <button class="nav-link loginlink" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Log In as Tutor</button>
                </li>

            </ul>
        </div>
    </div>



    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">

                </div>
                <div class="col-lg-4 col-md-12 col-sm-12  text-center" style="background-color: #f3f3f3; border-top: 4px solid #0B0452; border-bottom: 4px solid #0B0452;  border-radius: 15px; ">
                    <div class="col-lg-12">
                        <h1 class=" text-center mt-5">Log In as Admin</h1>
                        <hr>
                    </div>

                    <div class="col-lg-12">


                        <form id="contact-form" method="POST">

                            <div class="col-md-12 ">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="">
                            </div>
                            <div class="col-md-12 ">
                                <input type="password" class="form-control" name="password" placeholder="Password" required="">
                                <a href="login.php" style="text-decoration: none;">Forgot Password?</a>
                            </div>


                            <div class="col-md-12 mb-5">
                                <button id="submit" type="submit" class="form-control" name="admin">Log In</button>


                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">

                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">

                </div>


                <div class="col-lg-4 col-md-12 col-sm-12  text-center" style="background-color: #f3f3f3; border-top: 4px solid #0B0452; border-bottom: 4px solid #0B0452;  border-radius: 15px; ">
                    <div class="col-lg-12">
                        <h1 class=" text-center mt-5">Log In as Student</h1>
                        <hr>
                    </div>

                    <div class="col-lg-12">


                        <form id="contact-form" method="POST">

                            <div class="col-md-12 ">
                                <input type="email" class="form-control" name="stuemail" placeholder="Email" required="">
                            </div>
                            <div class="col-md-12 ">
                                <input type="password" class="form-control" name="stupassword" placeholder="Password" required="">
                                <a href="login.php" style="text-decoration: none;">Forgot Password?</a>
                            </div>


                            <div class="col-md-12 mb-5">
                                <button id="submit" type="submit" class="form-control" name="stulog">Log In</button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">

                </div>
            </div>
        </div>


        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">

                </div>


                <div class="col-lg-4 col-md-12 col-sm-12  text-center" style="background-color: #f3f3f3; border-top: 4px solid #0B0452; border-bottom: 4px solid #0B0452;  border-radius: 15px; ">
                    <div class="col-lg-12">
                        <h1 class=" text-center mt-5">Log In as Teacher</h1>
                        <hr>
                    </div>

                    <div class="col-lg-12">


                        <form id="contact-form" method="POST">

                            <div class="col-md-12 ">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="">
                            </div>
                            <div class="col-md-12 ">
                                <input type="password" class="form-control" name="password" placeholder="Password" required="">
                                <a href="login.html" style="text-decoration: none;">Forgot Password?</a>
                            </div>


                            <div class="col-md-12 mb-5">
                                <button id="submit" type="submit" class="form-control" name="teacher">Log In</button>


                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">

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

//login for Admin

if (isset($_POST['admin'])) {
    $admin_email = $_POST['email'];
    $admin_password = $_POST['password'];

    $query = mysqli_query($conn, "select * from users where email='$admin_email'");
    $res = mysqli_fetch_assoc($query);
    $email = $res['email'];
    $id = $res['id'];

    if ($admin_email == $email) {

        $password = $res['password'];
        if ($password == $admin_password) {
            $_SESSION['id'] = $res['id'];
            //  echo "<script>alert('$id')</script>";
?>
            <script>
                window.location = "<?php echo $app_url . 'admin/admin_dashboard.php'?>";
            </script>
        <?php
        } else {
            echo "<script>alert('Wrong Password !!') </script>";
        }
    } else {
        echo "<script>alert('Please Enter Correct Email') </script>";
    }
}

//login for Student

if (isset($_POST['stulog'])) {

    $email = $_POST['stuemail'];
    $password = $_POST['stupassword'];

    $check = mysqli_query($conn, "select * from student_sign_up where email='$email' AND approval ='YESLOG' ");

    $row = mysqli_num_rows($check);
    //echo $row;
    if ($row == 1) {
        $check_student = mysqli_query($conn, "select * from admin_student where email='$email' and status = 'pending'");
        $res_stu = mysqli_fetch_assoc($check_student);
        $dbpassword = $res_stu['password'];
        $db_id = $res_stu['id'];

        if ($password == $dbpassword) {
            // $_SESSION['student']=$_POST['stuemail'];
   
        ?>
            <script>
                window.location = "<?php echo $app_url . 'student_profile.php?id=' . "$db_id" ?>";
            </script>
            <?php
        } else {
            echo "<script>alert('WRONG PASSWORD !! ') </script>";
        }
    } else {
        $sql = mysqli_query($conn, "select * from admin_student where email='$email' ;");

        // $sql=mysqli_query($conn,"select s.id,s.email,s.password,a.id from student_sign_up where email='$email' AND approval ='YES' ");
        $nm = mysqli_num_rows($sql);
        if ($nm > 0) {
            $res = mysqli_fetch_assoc($sql);
            $db_id = $res['id'];
            // echo "<script>alert('$db_id')</script>";

            $db_password = $res['password'];
            if ($password == $db_password) {
                $_SESSION['id'] = $db_id;
            ?>


                <script>
                    window.location = "<?php echo $app_url . 'student/student_dashboard.php' ?>";
                </script>
            <?php

            } else {
                echo "<script>alert('WRONG PASSWORD !! ') </script>";
            }
        } else {
            echo "<script>alert('YOUR REQUEST HAS NOT BEEN APPROVED FROM ADMIN !! ') </script>";
        }
    }
}
//teacher login

if (isset($_POST['teacher'])) {
    $teacher_email = $_POST['email'];
    $teacher_password = $_POST['password'];

    $query = mysqli_query($conn, "select * from admin_teacher where email='$teacher_email'");
    $res = mysqli_fetch_assoc($query);
    $status = $res['status'];
    $email = $res['email'];
    $tch_id = $res['id'];

    if ($teacher_email == $email) {
        if ($status == 'active') {
            $password = $res['password'];
            if ($password == $teacher_password) {
                $_SESSION['id'] = $tch_id;
            
            ?> <script>
                    window.location = "<?php echo $app_url . 'teacher/assignment.php' ?>";
                </script>
<?php
            } else {
                echo "<script>alert('Wrong Password !!') </script>";
            }
        } else {
            echo "<script>alert(' You Are Currently Inactive. Please Contact with Admin ..! ') </script>";
        }
    } else {
        echo "<script>alert('Please Enter Correct Email') </script>";
    }
}



?>