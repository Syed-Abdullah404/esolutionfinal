<?php

include '../connection.php';

define("TITLE", "Admission");
define("PAGE", "Admission");


include 'header.php';

?>


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
                <?php
                include '../connection.php';
                $ide = $_GET['id'];
                $sqli = "select * from admin_student where id= " . $ide;

                $sql = mysqli_query($conn, $sqli);
                while ($row = mysqli_fetch_assoc($sql)) {

                ?>

                  <input type="text" class="form-control  mt-0 mb-0" name="faculty" value="<?php echo $row['faculty']; ?>">



                <?php
                }

                ?>
                </select>
              </div>
              <div class="col-md-6">
                <?php
                $id = $_GET['id'];
                // if ($isset[$_GET('$id')]) {
                  
                  $user = "select course from admin_student_course where student_id =".$id;
              
               $user_result =mysqli_query($conn, $user);
               $uh_array = [];   
               foreach ( $user_result as $cour) {
                $uh_array[] =  $cour['course'];
                  
                  }
                // }
                ?>
                <label class="form-label">Course:</label><br>
                <select class="songs form-select ww" name="songs[]" multiple style="width:260px; " id="course" required>
                  <?php
                  include '../connection.php';
                  $sqli = "select * from admin_course";


                  $sql = mysqli_query($conn, $sqli);
                  while ($row = mysqli_fetch_assoc($sql)) {

                  ?>
                    <option value="<?php echo $row['id']; ?>"
                    <?php echo in_array($row['id'], $uh_array)? 'selected':''?>
                    >
                    <?php echo $row['name']; ?>
                  
                  </option>
                  <?php
                  }
                  ?>
                </select>

              </div>
            </div><br>

            <?php
            include '../connection.php';
            $id = $_GET['id'];


            $sql = mysqli_query($conn, "select * from admin_student where id='$id'");

            while ($row = mysqli_fetch_assoc($sql)) {
            ?>
              <div class="row">

                <div class="col-md-4 ">
                  <label class="form-label">Name:</label>

                  <input type="text" class="form-control  mt-0 mb-0" name="name" placeholder="Enter Name .." value="<?php echo $row['name']; ?>">

                </div>

                <div class="col-md-4 ">
                  <label class="form-label">Email:</label>
                  <input type="email" class="form-control  mt-0 mb-0" name="email" value="<?php echo $row['email']; ?>">
                </div>

                <div class="col-md-4 ">
                  <label class="form-label">WhatsApp Number:</label>
                  <input type="text" class="form-control  mt-0 mb-0" name="mobile" placeholder="+(country-code)-------" required value="<?php echo $row['mobile']; ?>">
                </div>
                <div class="col-md-4 ">
                  <label class="form-label">CNIC: (optional) </label>
                  <input type="CNIC" class="form-control  mt-0 mb-0" name="cnic" placeholder="CNIC">
                </div>
                <div class="col-md-4 ">
                  <label class="form-label">Password:</label>
                  <input type="type" class="form-control  mt-0 mb-0" name="password" placeholder="Password" value="<?php echo $row['password']; ?>">
                </div>
                <div class="col-md-6 ">
                  <label class="form-label">Confirm Password:</label>
                  <input type="type" class="form-control  mt-0 mb-0" name="cpassword" placeholder="Password" value="<?php echo $row['cpassword']; ?>">
                </div>



                <div class="col-md-12">
                  <label class="form-label">Current Address: (optional)</label>
                  <?php
                  $address = $row['address'];
                  ?>
                  <textarea name="address" class="form-control" value="<?php echo $address; ?>"></textarea>
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
          <button id="button-addon2" class="px-4 py-2 rounded-3" type="submit" name="submit">Back </button>

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


</body>

</html>



<script>
  $(document).ready(function() {
    $('.editbtn').on('click', function() {
      $('#myModalEdit').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children('td').map(function() {
        return $(this).text();
      }).get();

      console.log(data);
      $('#update_id').val(data[0]);
      $('#name').val(data[1]);
      $('#email').val(data[3]);

    });

    $('.logbtn').on('click', function() {
      $('#myModal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children('td').map(function() {
        return $(this).text();
      }).get();

      console.log(data);
      $('#up_id').val(data[0]);
      $('#namelog').val(data[1]);
      $('#emaillog').val(data[3]);

    });

    $('.rbtn').on('click', function() {
      $('#myModalReject').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children('td').map(function() {
        return $(this).text();
      }).get();

      console.log(data);
      $('#up_id').val(data[0]);

      $('#idd').val(data[3]);

    });
  });
</script>

<?php

if (isset($_POST['save'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $teacher = $_POST['teacher'];
  foreach ($teacher as $teach) {
    $student = mysqli_query($conn, "INSERT INTO `admin_student_teacher`(`student_name`, `teacher`) VALUES ('$name','$teach')");
  }
  $sql = mysqli_query($conn, "UPDATE `admin_student` SET `status`='approve' WHERE email='$email'");
  if ($sql) {
    mysqli_query($conn, "UPDATE `student_sign_up` SET `approval`='YES' WHERE email='$email'");
?>
    <script>
      window.location = "<?php echo $app_url . 'admin/admission.php' ?>";
    </script>
    <?php
  }
}

if(isset($_POST['submit'])){
  ?>
  <script>
  window.location = "<?php echo $app_url . 'admin/admission.php' ?>";
</script>
<?php

}



if (isset($_POST['loginn'])) {
  $name = $_POST['namee'];
  $email = $_POST['emaill'];
  $sqli = "select * from student_sign_up where email = '$email'";
  $sql = mysqli_query($conn, $sqli);
  while ($row = mysqli_fetch_assoc($sql)) {
    $pass = $row['password'];
    $cpass = $row['cpassword'];
    $mobile = $row['mobile'];
    $approve_login = mysqli_query($conn, "INSERT INTO `admin_student`(`name`, `cnic`, `faculty`, `mobile`, `email`, `password`, `cpassword`, `address`, `session`, `start_date`, `end_date`, `status`) VALUES ('$name','0','0','$mobile','$email','$pass','$cpass','0','0',NOW(),NOW(),'pending')");
    if ($approve_login) {
      mysqli_query($conn, "UPDATE `student_sign_up` SET `approval`='YESLOG' WHERE email='$email'");
    ?>
      <script>
        window.location = "<?php echo $app_url . 'admin/admission.php' ?>";
      </script>
    <?php

    } else {
      echo "<script>alert('no') </script>";
    }
  }
}
//reject
if (isset($_POST['reject'])) {

  $email = $_POST['email'];
  $reject_stu = mysqli_query($conn, "DELETE FROM `student_sign_up` WHERE email='$email'");
  if ($reject_stu) {
    $del = mysqli_query($conn, "DELETE FROM `admin_student` WHERE email='$email'");
    if ($del) {
    ?>
      <script>
        window.location = "<?php echo $app_url . 'admin/admission.php' ?>";
      </script>
<?php
    }
  }
}

?>