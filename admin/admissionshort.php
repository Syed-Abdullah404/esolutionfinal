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
        <h3 class="card-title display-6 ">Admission Request for Solutions</h3>
        <hr>
        <h2>Sign Up Approvals</h2>
        <div class="container mt-1">
          <div class="row">
            <div class="col-lg-9 mb-4">
              <div class="input-group ">
              </div>
            </div>


          </div>




          <div class="card-body table-responsive p-0">
            <div class="row">
              <div class="col-lg-12">
                <table id="example" class="table table-striped  mb-5">

                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                    
                      <th>E-mail</th>
                      <th>Operations</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = mysqli_query($conn, "select * from student_sign_up_course where approval='pending' OR approval='YESLOG'");
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                      $i++;
                      $check = $row['approval'];
                      if ($check != 'YESLOG') {
                    ?>
                   
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['name']; ?></td>
                       
                        <td><?php echo $row['email']; ?></td>

                        <td>

                          
                          <?php
                          
                         
                          ?>
                            <button class="btn  btn-sm btn-success logbtn" type="button" id="logbtn">
                              Approve login
                            </button>
                          <?php }else{

                          }
                          
                          
                           ?>
                         




                        </td>
                      </tr>

                    <?php
                    }
                    ?>


                  </tbody>
                </table>
              </div>
            </div>


          </div>
        </div>

        <hr>
        <h2>Profile Approvals</h2>
        <div class="container mt-1">
          <div class="row">
            <div class="col-lg-9 mb-4">
              <div class="input-group ">
              </div>
            </div>


          </div>




          <div class="card-body table-responsive p-0">
            <div class="row">
              <div class="col-lg-12">
                <table id="example" class="table table-striped  mb-5">

                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                    
                      <th>E-mail</th>
                      <th>Operations</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = mysqli_query($conn, "select s.id,s.name,s.email,a.id from student_sign_up_course s JOIN admin_student_short_course a on s.email = a.email where approval='pending' OR approval='YESLOG';");
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                      $ids = $row['id'];
                      echo '<script>alert($id)</script>';
                      $i++;
                      $check = $row['approval'];
                   
                    ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['name']; ?></td>
 
                        <td><?php echo $row['email']; ?></td>

                        <td>

                          <button class="btn  btn-sm btn-success editbtn" type="button">
                            Approve
                          </button>
                          <?php
                          if ($check != 'YESLOG') {
                          ?>
                           
                          <?php } ?>
                          <button class="btn  btn-sm btn-danger rbtn" type="button">
                            Reject
                   
                          </button>
                     
                       <!-- <a href="student/profile.php?id='.'$ids'"><button>View</button></a>                         -->
                    <!-- <button><script>window.location = "<?php echo $app_url .'/stuprofile.php?id='."$ids" ?>";</script></button> -->
                    <a href="<?php echo $app_url .'admin/profile.php?id='."$ids" ?>">
                    <button class="btn  btn-md btn-primary btn" type="button">
                    <i class="fas fa-eye"></i>
                          </button>
                          </a>
                        </td>
                      </tr>

                    <?php
                    }
                    ?>


                  </tbody>
                </table>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>





    <div class="modal fade" id="myModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Approve Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST">
              <input type="hidden" name="update_id" id="update_id" />
              <div class="form-group">
                <label class="fw-bold">Name:</label>
                <input type="text" class="form-control mb-2" placeholder=" Name" name="name" id="name">

                <label class="fw-bold">Email:</label>
                <input type="text" class="form-control mb-2" placeholder=" Name" name="email" id="email">

                <label for="exampleInputpdes" class="form-label">Assign Teacher:</label>

                <select class="songs form-select" name="teacher[]" multiple style="width:465px;">
                  <?php
                  include '../connection.php';
                  $sqli = "select * from admin_teacher";

                  $sql = mysqli_query($conn, $sqli);
                  while ($row = mysqli_fetch_assoc($sql)) {

                  ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                  <?php
                  }

                  ?>
                </select>

              </div>



          </div>
          <div class="modal-footer bg-light">
            <input type="submit" id="btn3" class="form-control" name="save" value="Save">
          </div>
          </form>
        </div>

      </div>

    </div>
  </div>
</div>


<!-- login Approval -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Approve For Student Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <input type="text" name="up_id" id="up_id" />
          <div class="form-group">
            <label class="fw-bold">Name:</label>
            <input type="text" class="form-control mb-2" placeholder=" Name" name="namee" id="namelog">

            <label class="fw-bold">Email:</label>
            <input type="text" class="form-control mb-2" placeholder=" Name" name="emaill" id="emaillog">



          </div>



      </div>
      <div class="modal-footer bg-light">
        <input type="submit" id="btn3" class="form-control" name="loginn" value="Login Approve">
      </div>
      </form>
    </div>

  </div>

</div>
</div>
</div>
<!-- login Approval -->

<!-- reject request -->
<div class="modal fade" id="myModalReject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reject</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
          <input type="hidden" name="update_id" id="update_id" />
          <h1 class="text-danger">Are You Sure To Reject It</h1>
          <div class="form-group">
            <!-- <label class="fw-bold"> Email:</label> -->
            <input type="tesxt" class="form-control mb-2" name="email" id="idd" readonly>
            <!-- <label class="fw-bold">Quiz Id:</label> -->


          </div>
      </div>
      <div class="modal-footer bg-light">
        <input type="submit" id="btn3" class="form-control" name="reject" value="Reject">
   
      </div>
      </form>
    </div>
  </div>
</div>
<!-- reject request -->


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
      $('#email').val(data[2]);

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
      $('#emaillog').val(data[2]);

    });

    $('.rbtn').on('click', function() {
      $('#myModalReject').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children('td').map(function() {
        return $(this).text();
      }).get();

      console.log(data);
      $('#up_id').val(data[0]);

      $('#idd').val(data[2]);

    });
  });
</script>

<?php

if (isset($_POST['save'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $teacher = $_POST['teacher'];
  foreach ($teacher as $teach) {
    // $student = mysqli_query($conn, "INSERT INTO `admin_student_teacher`(`student_name`, `teacher`) VALUES ('$name','$teach')");
  }
  $sql = mysqli_query($conn, "UPDATE `admin_student_short_course` SET `status`='approve' WHERE email='$email'");
  if ($sql) {
    mysqli_query($conn, "UPDATE `student_sign_up_course` SET `approval`='YES' WHERE email='$email'");
?>
    <script>
      window.location = "<?php echo $app_url . 'admin/admission.php' ?>";
    </script>
    <?php
  }
}





if (isset($_POST['loginn'])) {
  $name = $_POST['namee'];
  $email = $_POST['emaill'];
  $sqli = "select * from student_sign_up_course where email = '$email'";
  $sql = mysqli_query($conn, $sqli);
  while ($row = mysqli_fetch_assoc($sql)) {
    $pass = $row['password'];
    $cpass = $row['cpassword'];
    $mobile = $row['mobile'];
    // $approve_login = mysqli_query($conn, "INSERT INTO `admin_student`(`name`, `cnic`, `faculty`, `mobile`, `email`, `password`, `cpassword`, `address`, `session`, `start_date`, `end_date`, `status`) VALUES ('$name','0','0','$mobile','$email','$pass','$cpass','0','0',NOW(),NOW(),'pending')");
    if ($approve_login) {
      mysqli_query($conn, "UPDATE `student_sign_up_course` SET `approval`='YESLOG' WHERE email='$email'");
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
  $reject_stu = mysqli_query($conn, "DELETE FROM `student_sign_up_course` WHERE email='$email'");
  if ($reject_stu) {
    $del = mysqli_query($conn, "DELETE FROM `admin_student_short_course` WHERE email='$email'");
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