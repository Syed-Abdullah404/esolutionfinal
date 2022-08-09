<?php
error_reporting(0);
session_start();
// $sql=mysqli_query($conn,"Select * from users where id=1");
// $rows=mysqli_fetch_assoc($sql);
// $idadmin=$_POST['id'];
// echo "<script>alert('$idadmin') </script>";
if ($_SESSION["id"]) {
} else {
?>
  <script>
    window.location = "<?php echo $app_url . 'login.php'?>";
  </script>
<?php
}




include '../connection.php';
$ids = $_SESSION['id'];
// echo "<script>alert('$ids') </script>";
$sql = mysqli_query($conn, "Select * from users where id='$ids'");
$rows = mysqli_fetch_assoc($sql);
$role = $rows['role'];
$role_sql = mysqli_query($conn, "select * from roles where role_name='$role'");
$row = mysqli_fetch_assoc($role_sql);
$dashboard = $row['dashboard'];
$teacher = $row['add_teacher'];
$student = $row['add_student'];
$faculty = $row['add_faculty'];
$course = $row['course'];
$addmission_req = $row['addmission_req'];
$teacher_req = $row['teacher_req'];
$student_req = $row['student_req'];
$payment = $row['payment'];
$setting = $row['setting'];
$inbox = $row['inbox'];
$user_management = $row['user_management'];


?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">

  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="css/styles.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="ckeditor/ckeditor.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- //sweet alert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>


</head>
<style>
  a.h:hover {
    color: #fff;
  }
</style>

<body>
  <div class="sidebar shadow">


    <ul class="nav-list ">
      <li>
        <a href="#">
          <span class="links_name"><img src="images/esloution.png" alt="" height="100px" width="200px">
          </span>
        </a>
      </li>
      <?php
      if ($dashboard == 1) {
      ?>
        <li>


          <a href="<?php echo $app_url . 'admin/admin_dashboard.php' ?>" ;>


            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Dashboard</span>
          </a>
          <span class="tooltip">Dashboard</span>
        </li>
      <?php } ?>



      <!-- <li>
       <a href="inbox.php">
       <i class="fab fa-product-hunt"></i>
         <span class="links_name">Inbox</span>
       </a>
       <span class="tooltip">Inbox</span>
     </li> -->


      <?php
      if ($user_management == 1) {
      ?>
        <li class=" dropdown">
          <a href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user"></i>

            <span class="links_name">User Management</span>
          </a>
          <span class="tooltip">User Management</span>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

            <li><a class="dropdown-item" href="roles.php">Roles</a></li>
            <li><a class="dropdown-item" href="user.php">Users</a></li>

          </ul>
        </li>
      <?php } ?>
      <?php
      if ($teacher == 1) {
      ?>
        <li>
          <a href="<?php echo $app_url . 'admin/teacher.php' ?>">

            <i class="fab fa-tumblr"></i>
            <span class="links_name">Teachers</span>
          </a>
          <span class="tooltip">Teachers</span>
        </li>
      <?php } ?>
      <?php
      if ($student == 1) {
      ?>
        <li>
          <a href="<?php echo 'studentpro.php' ?>">
            <i class="fab fa-stripe-s"></i>
            <span class="links_name">Students</span>
          </a>
          <span class="tooltip">Students</span>
        </li>
      <?php } ?>


      <?php
      if ($faculty == 1) {
      ?>

        <li>
          <a href="<?php echo 'subject.php' ?>">
            <i class="fas fa-male"></i>
            <span class="links_name">Faculty</span>
          </a>
          <span class="tooltip">Faculty</span>
        </li>
      <?php } ?>
      <?php
      if ($faculty == 1) {
      ?>
        <li>

          <a href="<?php echo 'course.php' ?>">
            <i class="fab fa-cuttlefish"></i>
            <span class="links_name">Course</span>
          </a>
          <span class="tooltip">Course</span>
        </li>
      <?php } ?>

      <?php
      if ($addmission_req == 1) {
      ?>
        <li class="dropdown">
          <a href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fab fa-autoprefixer"></i>
            <span class="links_name">Admission Requests</span>
          </a>
          <span class="tooltip">Admission Requests</span>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo 'admission.php' ?>">Solution</a></li>
            <li><a class="dropdown-item" href="<?php echo 'admissionshort.php' ?>">Short Courses</a></li>


          </ul>
        </li>
      <?php } ?>






      <!-- <li>
       <a href="paymentm.php">
       <i class="fas fa-male"></i>
         <span class="links_name">Payment Method</span>
       </a>
       <span class="tooltip">Payment Method</span>
     </li>
    -->

      <!-- for payment -->
      <?php
      if ($payment == 1) {
      ?>
        <li class=" dropdown">
          <a href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-handshake"></i>
            <span class="links_name">Payments</span>
          </a>
          <span class="tooltip">Payments</span>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo 'payment.php' ?>">Student Payment</a></li>
            <li><a class="dropdown-item" href="<?php echo 'teacherpay.php' ?>">Teacher Payment</a></li>


          </ul>
        </li>
      <?php } ?>
      <!-- for payment -->

      <!-- //for teacher -->
      <?php
      if ($teacher_req == 1) {
      ?>
        <li class=" dropdown">
          <a href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-chalkboard-teacher"></i>
            <span class="links_name">Teacher Requests</span>
          </a>
          <span class="tooltip">Teacher Requests</span>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo 'adminTeacherTab.php' ?>">Teacher Quiz Request</a></li>
            <li><a class="dropdown-item" href="<?php echo 'assignmentTeacherTab.php' ?>">Teacher Assignment Request</a></li>
            <li><a class="dropdown-item" href="<?php echo 'labTeacherTab.php' ?>">Teacher Lab Request</a></li>
            <li><a class="dropdown-item" href="<?php echo 'ptTab.php' ?>">Teacher Project Request</a></li>
            <li><a class="dropdown-item" href="<?php echo 'midTeacherTab.php' ?>">Teacher Mids Request</a></li>
            <li><a class="dropdown-item" href="<?php echo 'finalTeacherTab.php' ?>">Teacher Finals Request</a></li>

          </ul>
        </li>
      <?php } ?>
      <!-- //for teacher -->

      <!-- //for student -->
      <?php
      if ($student_req == 1) {
      ?>
        <li class=" dropdown">
          <a href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-users"></i>
            <span class="links_name">Student Requests</span>
          </a>
          <span class="tooltip">Student Requests</span>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="adminStudentTab.php">Student Quiz Request</a></li>
            <li><a class="dropdown-item" href="<?php echo 'assignmentStudentTab.php' ?>">Student Assignment Request</a></li>
            <li><a class="dropdown-item" href="labStudentTab.php">Student Lab Request</a></li>
            <li><a class="dropdown-item" href="psTab.php">Student Project Request</a></li>
            <li><a class="dropdown-item" href="midsStudentTab.php">Student Mids Request</a></li>
            <li><a class="dropdown-item" href="finalStudentTab.php">Student Finals Request</a></li>
            <li><a class="dropdown-item" href="courseStudentTab.php">Student Course Approval Request</a></li>

          </ul>
        </li>
      <?php } ?>
      <!-- //for student -->

      <!-- //for student Reports-->
      <?php
      if ($student_req == 1) {
      ?>
        <li class=" dropdown">
          <a href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-book"></i>
            <span class="links_name">Student Reports</span>
          </a>
          <span class="tooltip">Student Reports</span>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

            <li><a class="dropdown-item" href="studentQuizReport.php">Student Quiz Report</a></li>
            <li><a class="dropdown-item" href="studentAssReport.php">Student Assignment Report</a></li>
            <li><a class="dropdown-item" href="studentLabReport.php">Student Lab Report</a></li>
            <li><a class="dropdown-item" href="studentProjectReport.php">Student Project Report</a></li>
            <li><a class="dropdown-item" href="studentMidsReport.php">Student Mids Report</a></li>
            <li><a class="dropdown-item" href="studentFinalReport.php">Student Final Report</a></li>


          </ul>
        </li>
      <?php } ?>
      <!-- //for student Reports-->


      <!-- //for teacher Reports-->
      <?php
      if ($student_req == 1) {
      ?>
        <li class=" dropdown">
          <a href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-book"></i>
            <span class="links_name">Teacher Reports</span>
          </a>
          <span class="tooltip">Teacher Reports</span>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

            <li><a class="dropdown-item" href="teacherQuizReport.php">Teacher Quiz Report</a></li>
            <li><a class="dropdown-item" href="teacherAssReport.php">Teacher Assignment Report</a></li>
            <li><a class="dropdown-item" href="teacherLabReport.php">Teacher Lab Report</a></li>
            <li><a class="dropdown-item" href="teacherProjectReport.php">Teacher Project Report</a></li>
            <li><a class="dropdown-item" href="teacherMidsReport.php">Teacher Mids Report</a></li>
            <li><a class="dropdown-item" href="teacherFinalReport.php">Teacher Final Report</a></li>


          </ul>
        </li>
      <?php } ?>
      <!-- //for teacher Reports-->


      <?php
      if ($setting == 1) {
      ?>
        <li class=" dropdown">
          <a href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user-cog"></i>

            <span class="links_name">Setting</span>
          </a>
          <span class="tooltip">Setting</span>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="company.php">Company Profile</a></li>
            <li><a class="dropdown-item" href="about.php">About Us</a></li>
            <li><a class="dropdown-item" href="team.php">Our Team</a></li>
            <li><a class="dropdown-item" href="services.php">Our Services</a></li>
            <li><a class="dropdown-item" href="testimonial.php">Testimonials</a></li>

          </ul>
        </li>
      <?php } ?>
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
          <li><a class="dropdown-item" href="<?php echo $app_url . 'logout.php' ?>">Logout</a></li>

        </ul>

      </div>
    </div>
  </div>