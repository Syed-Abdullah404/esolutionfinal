<?php

include '../connection.php';

define("TITLE", "Profile");
define("PAGE", "Profile");

// $ids = $_SESSION['id'];
$ids = $_GET['id'];
$sql = mysqli_query($conn, "select * from student_sign_up_course where id='$ids'");
$ress = mysqli_fetch_assoc($sql);

?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
  <link rel="stylesheet" href="css\styles.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <script src="ckeditor/ckeditor.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

</head>
<style>
  @media screen and (max-width: 500px) {
    .ww {
      width: 200px !important;
    }
  }
</style>

<body>
  <div class="sidebar shadow">


    <ul class="nav-list ">
      <li>
        <a href="#">

          <span class="links_name"><img src="images/esloution.png" alt="" height="76px" width="200px">
          </span>
        </a>

      </li>

    </ul>
  </div>
  <div class="top-section container-fluid">
    <div class="row shadow">
      <div class="col-lg-1">
        <div class="logo-details">
          <i class='bx bx-menu' id="btn"></i>

        </div>
      </div>
      <div class="col-lg-8 col-sm-12 heading">
        <h2 class="display-4">Dashboard</h2>
      </div>
      <div class="col-lg-3 col-sm-12  text-end">
        <button class="btn " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="images/dummy-dp.png" style="border-radius: 100px;" class="m-4" alt="" height="50px" width="60px">
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li><a class="dropdown-item" href="#">Log Out</a></li>

        </ul>

      </div>
    </div>
  </div>

  <div class="body-section">
    <div class="container ">
      <div class="card ">
        <div class="card-header border-0">
          <h3 class="card-title display-6">Profile</h3>
          <hr>
          <div class="container mt-1">


            <form id="contact-form" class="studentform" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6 ">
                  <label class="form-label">Faculty:</label>
                  <select class="form-select" name="faculty" id="faculty">
                    <?php
                    include '../connection.php';
                    $sqli = "select * from admin_fauclty";

                    $sql = mysqli_query($conn, $sqli);
                    while ($row = mysqli_fetch_assoc($sql)) {

                    ?>
                      <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                    <?php
                    }

                    ?>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Course:</label><br>
                  <select class="songs form-select ww" name="songs[]" multiple style="width:260px; " id="course">
                    <?php
                    include '../connection.php';
                    $sqli = "select * from admin_course";

                    $sql = mysqli_query($conn, $sqli);
                    while ($row = mysqli_fetch_assoc($sql)) {

                    ?>
                      <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php
                    }
                    ?>
                  </select>

                </div>
              </div><br>

              <?php
                    include '../connection.php';
                  $id = $_GET['id'];


                    $sql=mysqli_query($conn,"select * from admin_student_short_course where id='$id'");
                  
                    while ($row = mysqli_fetch_assoc($sql)) {
                      ?>
              <div class="row">

                <div class="col-md-4 ">
                  <label class="form-label">Name:</label>
        
                  <input type="text" class="form-control  mt-0 mb-0"
                   name="name" placeholder="Enter Name .." value="<?php echo $row['name'];?>">
                   
                </div>

                <div class="col-md-4 ">
                  <label class="form-label">Email:</label>
                  <input type="email" class="form-control  mt-0 mb-0" name="email" value="<?php echo $row['email'];?>">
                </div>

                <div class="col-md-4 ">
                  <label class="form-label">WhatsApp Number:</label>
                  <input type="text" class="form-control  mt-0 mb-0" name="mobile" placeholder="+(country-code)-------" required value="<?php echo $row['mobile'];?>">
                </div>
                <div class="col-md-4 ">
                  <label class="form-label">CNIC: (optional) </label>
                  <input type="CNIC" class="form-control  mt-0 mb-0" name="cnic" placeholder="CNIC">
                </div>
                <div class="col-md-4 ">
                  <label class="form-label">Password:</label>
                  <input type="type" class="form-control  mt-0 mb-0" name="password" placeholder="Password" value="<?php echo $row['password'];?>">
                </div>
                <div class="col-md-6 ">
                  <label class="form-label">Confirm Password:</label>
                  <input type="type" class="form-control  mt-0 mb-0" name="cpassword" placeholder="Password" value="<?php echo $row['cpassword'];?>">
                </div>



                <div class="col-md-12">
                  <label class="form-label">Current Address: (optional)</label>
                  <?php
                  $address= $row['address'];
                  ?>
                  <textarea name="address" class="form-control" value="<?php echo $address;?>"></textarea>
                </div>

              </div><br>

              <?php
                    }

                    ?>





          </div>



          <div class="col-md-12 ">
            <label class="form-label">Session:</label>
            <select class="form-select" name="session">
              <option>Select Your Session</option>
              <option value="2021-22">2021-22</option>
              <option value="2022-23">2022-23</option>
              <option value="2023-24">2023-24</option>
              <option value="2024-25">2024-25</option>
            </select>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <label class="form-label">Course Start Date:</label>
              <input type="date" class="form-control  mt-0 mb-0" name="sdate" placeholder="Start Date">
            </div>

            <div class="col-md-6 col-sm-12 ">

              <label class="form-label">Course End Date:</label>
              <input type="date" class="form-control  mt-0 mb-0" name="edate" placeholder="Start Date">
            </div>
          </div>
          <div class="col-lg-12 mb-5 mt-2 text-center mt-4">
            <button id="button-addon2" class="px-4 py-2 rounded-3" type="submit" name="submit">Next &#10132;</button>

          </div>
          </form>

        </div>


        <div class="card-body table-responsive p-0">

        </div>
      </div>




    </div>
    <!-- flex-item -->
  </div>
  <!-- /flex-container -->
  </div>
  </div>
  <!-- flex-item -->
  </div>
  <!-- /flex-container -->
  </div>
  </div>

  </div>

  </div>




  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.songs').select2();
    });
  </script>

  <?php


  include 'footer.php';

  if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $cnic = $_POST['cnic'];
    $faculty = $_POST['faculty'];

    $mobile = $_POST['mobile'];


    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $address = $_POST['address'];
    $sess = $_POST['session'];
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];


    $sql = mysqli_query($conn, "UPDATE `admin_student` SET `cnic`='$cnic',`faculty`='$faculty',`mobile`='$mobile',`password`='$password',`cpassword`='$cpassword',`address`='$address',`session`='$sess',`start_date`='$sdate',`end_date`='$edate' WHERE email='$email'");
    if ($sql) {
      $course = $_POST['songs'];
      foreach ($course as $cour) {
        $student = mysqli_query($conn, "INSERT INTO `admin_student_course`(`student_name`, `course`) VALUES ('$name','$cour') ");
      }



  ?>
      <script>
        alert('Your Profile Has Been Completed..  Wait For Admin Approval !!');
        window.location = "<?php echo $app_url . 'login.php' ?>";
      </script>
  <?php

      echo "<script>alert('Invalid Phone Number  !!') </script>";
    }
  }
  ?>