<?php
session_start();
error_reporting(0);
include '../connection.php';
//  $id=$_SESSION['head_id'];
//  echo "<script>alert('$id')</script>";
$id = $_SESSION['id'];
// $sqli = "select * from admin_student where id = '$getid';";

// $sql = mysqli_query($conn, $sqli);
// while ($row = mysqli_fetch_assoc($sql)) {

//   $id = $row['id'];
// }

if ($_SESSION["id"]) {
} else {
?>
  <script>
    window.location = "<?php echo $app_url . 'login.php'?>";
  </script>
<?php
}

?>
<!-- <script>
               
               window.location = "<?php echo $app_url . 'admin/assignment.php?id=' . $id; ?>";
               </script> -->

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
  <!-- //sweet alert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
  <div class="sidebar shadow">


    <ul class="nav-list ">
      <li>
        <a href="#">

          <span class="links_name"><img src="images/esloution.png" alt="" height="100px" width="200px">
          </span>
        </a>

      </li>
      <li>
        <a href="<?php echo $app_url . 'student/student_dashboard.php?id=' . "$id" ?>">
          <i class="fas fa-home"></i>
          <span class="links_name">Dashboard</span>
        </a>
        <span class="tooltip">Dashboard</span>
      </li>
      <li>
        <a href="<?php echo $app_url . 'student/payment.php?id=' . "$id" ?>">
          <i class="fas fa-handshake"></i>
          <span class="links_name">Payment</span>
        </a>
        <span class="tooltip">Payment</span>
      </li>

      <li>
        <a href="<?php echo $app_url . 'student/course.php?id=' . "$id" ?>">
          <i class="fab fa-cuttlefish"></i>
          <span class="links_name">Courses</span>
        </a>
        <span class="tooltip">Courses</span>
      </li>

      <li>

        <a href="<?php echo $app_url . 'student/quiz.php?id=' . "$id" ?>">
          <i class="fab fa-quora"></i>
          <span class="links_name">Quizes</span>
        </a>
        <span class="tooltip">Quizes</span>
      </li>
      <li>

        <a href="<?php echo $app_url . 'student/assignment.php?id=' . "$id" ?>">
          <i class="fab fa-autoprefixer"></i>
          <span class="links_name">Assignments</span>
        </a>
        <span class="tooltip">Assignments</span>
      </li>
      <li>
        <a href="<?php echo $app_url . 'student/lab.php?id=' . "$id" ?>">
          <i class="fas fa-th-large"></i>
          <span class="links_name">Lab</span>
        </a>
        <span class="tooltip">Lab</span>
      </li>
      <li>
        <a href="<?php echo $app_url . 'student/project.php?id=' . "$id" ?>">
          <i class="fas fa-pencil-alt"></i>
          <span class="links_name">Project</span>
        </a>
        <span class="tooltip">Project</span>
      </li>
      <li>


      <li class=" dropdown">
        <a href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-user-cog"></i>

          <span class="links_name">Exams</span>
        </a>
        <span class="tooltip">Exams</span>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="<?php echo $app_url . 'student/mids.php?id=' . "$id" ?>">Mids</a></li>
          <li><a class="dropdown-item" href="<?php echo $app_url . 'student/finals.php?id=' . "$id" ?>">Finals</a></li>



        </ul>
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
      <div class="col-lg-7 col-sm-12 heading">
        <h2 class="display-4">Dashboard</h2>
        
      </div>
      <div class="col-lg-2 text-end">
      <a href="<?php echo $app_url . 'student/fee.php?id=' . "$id" ?>"><button class="btn   btn-primary my-4  py-2" >Pay your Fee</button></a>
      </div>
      <div class="col-lg-2 col-sm-12  text-end">
        <button class="btn " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          
          <img src="images/dummy-dp.png" style="border-radius: 100px;" class="m-4" alt="" height="50px" width="60px">
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          
          <li><a class="dropdown-item" href="<?php echo $app_url . 'student/profile.php?id=' . "$id" ?>">Profile</a></li>
          <li><a class="dropdown-item" href="<?php echo $app_url . 'logout.php' ?>">Logout</a></li>

        </ul>

      </div>
    </div>
  </div>