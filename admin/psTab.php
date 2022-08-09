<?php

define("TITLE", "Student Project Request");
define("PAGE", "Student Project Request");

include '../connection.php';
include 'header.php';

?>
<div class="body-section">
   <div class="container ">
      <div class="card ">
         <div class="card-header border-0">
            <h3 class="card-title display-6">Student Project Request</h3>
            <hr>
            <div class="container mt-1">
               <div class="row">
                  <div class="col-lg-9 mb-4">
                     <div class="input-group ">
                     </div>
                  </div>

                  <div class="card-body table-responsive p-0">
                     <div class="row">
                        <div class="col-lg-12">
                           <table id="example" class="table table-striped  mx-10">
                              <thead>
                                 <tr>
                                    <th>Extra ID</th>
                                    <th>P ID</th>
                                    <th>St ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>File</th>
                                    <th>Course</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>

                                    <th>Operations</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 $query = mysqli_query($conn, "select * from student_xtra_project where status='pending'");
                                 if ($query) {
                                    while ($row = mysqli_fetch_assoc($query)) {
                                       $course_id = $row['course'];
                                       $stu_id = $row['id'];
                                       $st_id = $row['stu_id'];
                                       $sel_course = mysqli_query($conn, "select * from admin_course where id='$course_id'");
                                       $crow = mysqli_fetch_assoc($sel_course);
                                       $course_name = $crow['name'];


                                 ?>
                                       <tr>
                                          <td><?php echo $row['id']; ?></td>
                                          <td><?php echo $row['project_id']; ?></td>

                                          <td><?php echo $row['stu_id']; ?></td>
                                          <td><?php echo $row['name']; ?></td>
                                          <td style="width:200px;"><?php echo $row['description']; ?></td>

                                          <td><a href="../student/<?php echo $row['stu_file']; ?>" download class="btn btn-success btn-sm"><?php echo $row['stu_file']; ?> </a></td>
                                          <td><?php echo $course_name; ?></td>
                                          <td><?php echo $row['start_time']; ?></td>
                                          <td><?php echo $row['end_time']; ?></td>
                                          <td><?php echo $row['start_date']; ?></td>
                                          <td><?php echo $row['end_date']; ?></td>

                                          <td>



                                             <div class="action">
                                                <button class="btn btnaction btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                   Action
                                                </button>
                                                <ul class="dropdown-menu p-0">

                                                   <li class="dropdown-item editbtn"> <i class="far fa-edit"></i> Approve</li>
                                                   <li class="dropdown-item rbtn"> <i class="far fa-trash"></i> Reject</li>
                                                   <a href="https://web.whatsapp.com/">
                                                      <li class="dropdown-item "> <i class="fab fa-whatsapp"></i> Whatsapp</li>
                                                   </a>
                                                   <li class="dropdown-item fee" data-bs-toggle="modal"><i class="fal fa-credit-card"></i> Fee</li>





                                                </ul>
                                             </div>
                                          </td>
                                       </tr>
                                    <?php
                                    }
                                 } else {
                                    ?>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
</div>
</div>
</div>

<div class="modal fade" id="myModalFee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Fee</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
               <input type="text" name="fee_id" id="fee_id" />
               <div class="form-group">
                  <input type="text" name="student_id" id="student_id" />
                  <input type="text" name="assignment_id" id="assignment_id" />
                  <label class="fw-bold">Price:</label>
                  <?php
                  $query = mysqli_query($conn, "select fee from student_xtra_project where stu_id='$id'");

                  while ($row = mysqli_fetch_assoc($query)) {
                     $fee = $row['fee'];
                     echo $fee;
                  }


                  ?>
                  <input type="number" name="fee_student" class="form-control mb-2" value="<?php echo $fee ?>">

               </div>
         </div>
         <div class="modal-footer bg-light">
            <input type="submit" id="btn3" class="form-control" name="fee_update" value="OK">
         </div>
         </form>
      </div>
   </div>
</div>
<!-- //Edit -->
<div class="modal fade" id="myModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Project Approval</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form action="#" method="POST" enctype="multipart/form-data">
               <input type="hidden" name="update_id" id="update_id" />
               <div class="form-group">
                  <label class="fw-bold"> Id:</label>
                  <input type="text" class="form-control mb-2" name="id" id="id" readonly>
                  <label class="fw-bold">Project Id:</label>
                  <input type="text" class="form-control mb-2" name="qtid" id="qtid" readonly>
                  <label class="fw-bold">Student Id:</label>
                  <input type="text" class="form-control mb-2" name="stid" id="stid" readonly>
                  <label class="fw-bold">Name:</label>
                  <input type="text" class="form-control mb-2" name="name" id="name">
                  <label class="fw-bold">Description:</label>
                  <input type="text" class="form-control mb-2" name="description" id="description">
                  <label class="fw-bold">File:</label>
                  <input type="text" class="form-control mb-2" name="file" id="file">
                  <label class="fw-bold">Course:</label>
                  <input type="text" class="form-control mb-2" name="course" id="course">

                  <label class="form-label">Assign Teacher:</label>
                  <?php
                  $sel_tname = mysqli_query($conn, "select name from admin_student where id='$st_id'");
                  $row_selt = mysqli_fetch_assoc($sel_tname);
                  $namet = $row_selt['name'];

                  $sel_teacher = mysqli_query($conn, "select teacher from admin_student_teacher where student_name='$namet'");
                  $tech_arr = [];
                  foreach ($sel_teacher as $teacher) {
                     $tech_arr[] = $teacher['teacher'];
                     //echo $student['course'];
                  }

                  ?>
                  <select class="form-select" name="teacher" style="width:470px;">
                     <?php
                     $query_teacher = mysqli_query($conn, "select * from admin_teacher");
                     if (mysqli_num_rows($query_teacher) > 0) {
                        foreach ($query_teacher as $rowtech) {
                     ?>
                           <option value="<?php echo $rowtech['id']; ?>" <?php echo in_array($rowtech['id'], $tech_arr) ? 'selected' : '' ?>>
                              <?php echo $rowtech['name']; ?>
                           </option>
                     <?php
                        }
                     }

                     ?>
                  </select>
                  <label class="fw-bold">Start Time:</label>
                  <input type="time" name="stime" class="form-control" id="stime">
                  <label class="fw-bold">End-Time:</label>
                  <input type="time" name="etime" class="form-control" id="etime">
                  <label class="fw-bold">Start Date:</label>
                  <input type="Date" name="sdate" class="form-control" id="sdate">
                  <label class="fw-bold">End-Date:</label>
                  <input type="Date" name="edate" class="form-control" id="edate">
               </div>
         </div>
         <div class="modal-footer bg-light">
            <input type="submit" id="btn3" class="form-control" name="save" value="Approve">
         </div>
         </form>
      </div>
   </div>
</div>

<!-- //Reject -->
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
                  <!-- <label class="fw-bold"> Id:</label> -->
                  <input type="hidden" class="form-control mb-2" name="id" id="idd" readonly>
                  <!-- <label class="fw-bold">Quiz Id:</label> -->
                  <input type="hidden" class="form-control mb-2" name="qtid" id="qtidd" readonly>
                  <input type="hidden" class="form-control mb-2" name="sttid" id="sttid" readonly>

               </div>
         </div>
         <div class="modal-footer bg-light">
            <input type="submit" id="btn3" class="form-control" name="reject" value="Reject">
         </div>
         </form>
      </div>
   </div>
</div>
<!-- //Reject -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="js/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
         $('#id').val(data[0]);
         $('#qtid').val(data[1]);
         $('#stid').val(data[2]);
         $('#name').val(data[3]);
         $('#description').val(data[4]);
         $('#file').val(data[5]);
         $('#course').val(data[6]);

      });

      $('.rbtn').on('click', function() {
         $('#myModalReject').modal('show');

         $tr = $(this).closest('tr');

         var data = $tr.children('td').map(function() {
            return $(this).text();
         }).get();

         console.log(data);
         $('#update_id').val(data[0]);
         $('#idd').val(data[0]);
         $('#qtidd').val(data[1]);
      });


      $('.fee').on('click', function() {
         $('#myModalFee').modal('show');

         $tr = $(this).closest('tr');

         var data = $tr.children('td').map(function() {
            return $(this).text();
         }).get();

         console.log(data);
         $('#fee_id').val(data[0]);
         $('#student_id').val(data[1]);
         $('#assignment_id').val(data[2]);
      });





   });
</script>
<script type="text/javascript">
   $(document).ready(function() {
      $('.songs').select2();
   });
</script>
</body>

</html>
<?php
if (isset($_POST['save'])) {
   $name = $_POST['name'];
   $description = $_POST['description'];
   $file = $_POST['file'];
   $course = $_POST['course'];
   $teacher = $_POST['teacher'];
   $stime = $_POST['stime'];
   $etime = $_POST['etime'];
   $sdate = $_POST['sdate'];
   $edate = $_POST['edate'];
   $stid = $_POST['stid'];
   $qtid = $_POST['qtid'];
   $xid = $_POST['update_id'];
   $date_now = date("Y-m-d"); // this format is string comparable
   if (($sdate >= $date_now) && ($edate >= $date_now)) {
      $sql = "INSERT INTO `teacher_project`(`x_id`,`project_id`,`stu_id`,`teacher_id`, `name`, `description`,`stu_file`,`course`,`start_time`,`end_time`,`start_date`,`end_date`) VALUES ('$xid','$qtid','$stid','$teacher','$name','$description','$file','$course','$stime','$etime','$sdate','$edate')";
      $res = mysqli_query($conn, $sql);
      if ($res) {
         mysqli_query($conn, "UPDATE `student_xtra_project` SET `status`='apporve' WHERE project_id='$qtid' AND id='$xid'");

         $temail = mysqli_query($conn, "SELECT * FROM `admin_teacher` WHERE id='$teacher'");
         $trow = mysqli_fetch_assoc($temail);


         $to_email = $trow['email'];

         $subject = "Assigning Of Project Task";
         $body = " Hi Teacher, admin  assign a project task to you Check Your Portal..";
         $header = "From: check9404@gmail.com";

         if (mail($to_email, $subject, $body, $header)) {
         }


         $semail = mysqli_query($conn, "SELECT * FROM `admin_student` WHERE id='$stid'");
         $srow = mysqli_fetch_assoc($semail);

         $to_email = $srow['email'];
         $subject = "Project Task";
         $body = " Hi Student , Admin Approve your Project Request.. ";
         $header = "From: check9404@gmail.com";

         if (mail($to_email, $subject, $body, $header)) {
         }
?>
         <script>
            window.location = "<?php echo $app_url . 'admin/psTab.php' ?>";
         </script>
      <?php
      }
   } else {
      echo "<script>alert('YOU CAN NOT SELECT PREVIOUS DATE') </script>";
   }
}


//rejection
if (isset($_POST['reject'])) {
   $qtid = $_POST['qtid'];
   $xid = $_POST['id'];
   $sttid = $_POST['sttid'];
   $update = mysqli_query($conn, "UPDATE `student_xtra_project` SET `status`='reject' WHERE project_id='$qtid' AND id='$xid'");
   if ($update) {
      $sremail = mysqli_query($conn, "SELECT * FROM `admin_student` WHERE id='$sttid'");
      $srrow = mysqli_fetch_assoc($semail);

      $to_email = $srrow['email'];
      $subject = "Rejection Of Project Task";
      $body = " Hi Student,  Admin Reject your Project Request Check Your Portal..";
      $header = "From: check9404@gmail.com";

      if (mail($to_email, $subject, $body, $header)) {
         echo "<script> alert('Rejection Email successfully sent to $to_email...') </script>";
      }

      ?>
      <script>
         window.location = "<?php echo $app_url . 'admin/psTab.php' ?>";
      </script>
<?php
   }
}
?>

<?php
if (isset($_POST['fee_update'])) {

   $id = $_POST['fee_id'];
   $student_id = $_POST['student_id'];
   $project_id = $_POST['assignment_id'];
   $fee_student = $_POST['fee_student'];
   mysqli_query($conn, "UPDATE `student_xtra_project` SET `fee`='$fee_student' WHERE project_id='$project_id' AND id='$id'");
}



?>