<?php

include '../connection.php';

define("TITLE", "Students");
define("PAGE", "Students");


include 'header.php';

?>




<div class="body-section">
  <div class="container">
    <div class="card">
      <div class="card-header border-0">
        <h3 class="card-title display-6">Student</h3>
        <hr>
        <div class="container mt-1">
          <!-- Button trigger modal -->
          <div class="row">
            <div class="col-lg-9">
              <div class="input-group">

              </div>
            </div>
            <div class="col-lg-3">


              <button type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn float-right mb-3">
                <i class="fas fa-plus"></i> Add Student
              </button>
              <!--Modal-->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-light">
                      <h4 class="modal-title " id="exampleModalLabel">Add Student</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <label class="fw-bold">Name</label>
                          <input type="text" class="form-control mb-2" placeholder="Name" name="name">
                          <label class="fw-bold">Image:</label>
                          <input type="file" name="picture" class="form-control">
                          <label class="fw-bold">Cnic</label>
                          <input type="text" class="form-control " placeholder="CNIC" name="cnic">
                          <label class="fw-bold mt-3">Course:</label>
                          <select name="course" class="form-control">
                            <option value="">Select Course</option>
                            <?php
                            $sql = mysqli_query($conn, "select * from admin_course");
                            if (mysqli_num_rows($sql) > 0) {
                              foreach ($sql as $row) {
                            ?>
                                <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                            <?php
                              }
                            }
                            ?>
                          </select>


                          <label class="fw-bold">Faculty:</label>
                          <select name="faculty" class="form-control" id="faculty">
                            <?php
                            $sql = mysqli_query($conn, "select * from admin_fauclty");
                            while ($row = mysqli_fetch_assoc($sql)) {
                            ?>
                              <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                            <?php
                            }

                            ?>
                          </select>

                          <label class="fw-bold ">Phone No.</label><br>
                          <input type="number" class="form-control mb-2" placeholder="Phone No" name="mobile">
                          <label class="fw-bold">E-mail</label><br>
                          <input type="Email" class="form-control mb-2" placeholder="E-mail" name="email">
                          <label class="fw-bold">Password:</label><br>
                          <input type="password" class="form-control mb-2" placeholder="Enter Password" name="password">
                          <label class="fw-bold">Confirm Password:</label><br>
                          <input type="password" class="form-control mb-2" placeholder="Confirm Password" name="cpassword">
                          <label class="fw-bold">Current Address</label><textarea class="form-control" name="address"></textarea>
                        </div>
                        <div class="modal-footer bg-light">
                          <button type="submit" class="btn btn-primary" name="add">Add </button>
                        </div>
                      </form>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>


          <div class="card-body table-responsive p-0">
            <div class="row">
              <div class="col-lg-12">
                <table id="example" class="table table-striped  mx-10">

                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>CNIC</th>
                      <th>Faculty</th>
                      <th>Course Name</th>
                      <th>Ph no.</th>
                      <th>E-mail</th>

                      <th>Operations</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $select = mysqli_query($conn, "select * from admin_student");
                    while ($row = mysqli_fetch_assoc($select)) {
                    ?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td> <img src="<?php echo $row['image'] ?>" alt="" style="width:150px;height:150px;"></td>
                        <td><?php echo $row['cnic']; ?></td>
                        <td><?php echo $row['faculty']; ?></td>
                        <td><?php echo $row['course']; ?></td>

                        <td><?php echo $row['mobile']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                          <div class="action">
                            <button class="btn btnaction btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Action
                            </button>
                            <ul class="dropdown-menu p-0">

                              <li class="dropdown-item" data-bs-toggle="modal" data-bs-target="#myModalEdit"> <i class="far fa-edit"></i> Edit</li>

                              <a href="view.php" style="text-decoration: none; color: black;">
                                <li class="dropdown-item"><i class="far fa-eye"></i> View </li>
                              </a>

                              <li class="dropdown-item">
                                <input type="hidden" class="delete_id_value" value="<?php echo $row['id']; ?>">
                                <a href="javascript:void(0)" type="button" class="delete_btn_ajax btn btn-sm h"><i class="fas fa-trash"></i> Delete</a>
                              </li>


                            </ul>
                          </div>




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

<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<!--  <footer class="footer fixed">
            © 2020 Elegent Admin by <a href="https://www.wrappixel.com/">wrappixel.com</a>
        </footer> -->
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<div class="modal fade" id="myModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label class="fw-bold">Name</label>
            <input type="text" class="form-control mb-2" placeholder="Name" name="name">
            <label class="fw-bold">Full Name</label>
            <input type="text" class="form-control mb-2" placeholder="Full Name" name="name">
            <label class="fw-bold">Image:</label>
            <input type="file" name="picture" class="form-control">
            <label class="fw-bold mt-3">Course:</label>
            <div class="multiselect3  mb-3" id="countries3" multiple="multiple" data-target="multi-0">
              <div class="title noselect3 mt-1 mb-3">
                <span class="text">Select</span>
                <span class="close-icon2">&times;</span>
                <span class="expand-icon">&plus;</span>
              </div>
              <div class="container3 col-lg-11 mt-2">
                <option value="us">USA</option>
                <option value="fr">France</option>
                <option value="gr">Greece</option>
                <option value="uk">United Kingdom</option>
                <option value="ge">Germany</option>
                <option value="sp">Spain</option>
                <option value="it">Italy</option>
                <option value="ch">China</option>
                <option value="jp">Japan</option>
              </div>
            </div>


            <label class="fw-bold ">Subjects:</label>
            <div class="multiselect4  mb-3" id="countries4" multiple="multiple" data-target="multi-0">
              <div class="title noselect4 mt-1 mb-3">
                <span class="text">Select</span>
                <span class="close-icon3">&times;</span>
                <span class="expand-icon">&plus;</span>
              </div>
              <div class="container4 col-lg-11 mt-2">
                <option value="us">USA</option>
                <option value="fr">France</option>
                <option value="gr">Greece</option>
                <option value="uk">United Kingdom</option>
                <option value="ge">Germany</option>
                <option value="sp">Spain</option>
                <option value="it">Italy</option>
                <option value="ch">China</option>
                <option value="jp">Japan</option>
              </div>
            </div>


            <label class="fw-bold ">Phone No.</label><br>
            <input type="number" class="form-control mb-2" placeholder="Phone No" name="mobile">
            <label class="fw-bold">E-mail</label><br>
            <input type="Email" class="form-control mb-2" placeholder="E-mail" name="E-mail">
            <label class="fw-bold">Password:</label><br>
            <input type="password" class="form-control mb-2" placeholder="Enter Password" name="password">
            <label class="fw-bold">Confirm Password:</label><br>
            <input type="password" class="form-control mb-2" placeholder="Confirm Password" name="cpassword">
            <label class="fw-bold">Current Address</label><textarea class="form-control" name="address"></textarea>
          </div>
          <div class="modal-footer bg-light">
            <button type="submit" class="btn btn-primary" name="add">Add </button>
          </div>
        </form>
      </div>

    </div>

  </div>
</div>
</div>
<!--delete-->
<div class="modal fade" id="myModalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">

          <p>Are you sure want to delete the record?</p>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <button type="button" class="btn " id="button-addon2">Yes</button>
          </div>
          </form>
        </div>

      </div>

    </div>
  </div>
</div>



</div>

</div>
</div>
</div>





</div>





<?php


include 'footer.php';

if (isset($_POST['add'])) {
  $name = $_POST['name'];
  $course = $_POST['course'];
  $cnic = $_POST['cnic'];
  $faculty = $_POST['faculty'];
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $address = $_POST['address'];
  $file = ($_FILES['picture']);
  //print_r($file);
  $file_name = $file['name'];
  $file_path = $file['tmp_name'];
  $file_error = $file['error'];

  $check = mysqli_query($conn, "select * from admin_student where email='$email'");
  $count = mysqli_num_rows($check);
  if ($count == 0) {

    if ($file_error == 0) {
      $destinaton = 'StudentProfile/' . $file_name;
      move_uploaded_file($file_path, $destinaton);

      $sql = mysqli_query($conn, "INSERT INTO `admin_student`(`name`, `image`, `cnic`, `faculty`, `course`, `mobile`, `email`, `password`, `cpassword`, `address`) VALUES ('$name','$destinaton','$cnic','$faculty','$course','$mobile','$email','$password','$cpassword','$address')");
      if ($sql) {
?>
        <script>
          window.location = "<?php echo $app_url . 'admin/student.php' ?>";
        </script>
<?php
      }
    } else {
      echo "<script>alert('Picture Error  !!') </script>";
    }
  } else {
    echo "<script>alert('Email Already Exist  !!') </script>";
  }
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(document).ready(function() {
    $('.multiple-data').select2({
      closeOnSelect: false
    });
  });
</script>