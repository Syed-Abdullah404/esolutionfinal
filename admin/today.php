<?php 

include '../connection.php';

define("TITLE","Student Quiz Request");
define("PAGE","Student Quiz Request");


include 'header.php';

?>


<div class="body-section">
<div class="container ">
         <div class="card ">
              <div class="card-header border-0">
                <h3 class="card-title display-6">Student Quiz Request</h3>
                <hr>
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
                <table id="example" class="table table-striped  mx-10">
                  
                  <thead>
                     <tr>
                          <th>Quiz ID</th>
                          <th>Student ID</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>File</th>
                          <th>Course</th>
                          <th>Activity</th>
                          <th>Operations</th>                         
                     </tr>
                   </thead>
                       <tbody>
                                <?php
                                  $query=mysqli_query($conn,"select * from studen_quiz where status='pending'");
                                
                                  while($row=mysqli_fetch_assoc($query)){
                                      $course_id=$row['course_name'];
                                      $stu_id=$row['id'];
                                      $st_id=$row['stu_id'];
                                      $sel_course=mysqli_query($conn,"select * from admin_course where id='$course_id'");
                                      $crow=mysqli_fetch_assoc($sel_course);
                                      $course_name=$crow['name'];
                                      
                                
                                    ?>
                                  <tr>
                                         <td><?php echo $stu_id?></td>     
                                         <td><?php echo $row['stu_id'];?></td>     
                                         <td><?php echo $row['name']; ?></td>     
                                         <td style="width: 350px;"><?php echo $row['description']; ?></td>     
                                       
                                         <td><a href="../student/<?php echo $row['stu_file']; ?>" download class="btn btn-success btn-sm">Download File </a></td>

                                         <td><?php echo $course_name; ?></td>     
                                         <td><?php echo $row['activity']; ?></td>     
                                          
                                     
                                                   
                                              <td>

                                                    <button class="btn  btn-sm btn-success editbtn"  type="button" >
                                                        Approve
                                                      </button>
                                                      <button class="btn  btn-sm btn-danger " type="button" >
                                                        Reject
                                                      </button>
                                                     <a href="inbox.php"> <button class="btn  btn-sm btn-primary " type="button" >
                                                      <i class="fas fa-comment"></i>
                                                      </button></a>
                                                  


                                                 
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Subject</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="POST" enctype="multipart/form-data">
          <input type="hidden" name="update_id" id="update_id" />
                <div class="form-group">
                <label class="fw-bold">Quiz Id:</label>
                    <input type="text" class="form-control mb-2" 
                     name="qtid" id="qtid">

                     <label class="fw-bold">Student Id:</label>
                    <input type="text" class="form-control mb-2" 
                     name="stid" id="stid">

                <label class="fw-bold">Name:</label>
                    <input type="text" class="form-control mb-2" 
                     name="name" id="name">

                    <label class="fw-bold">Description:</label>
                    <input type="text" class="form-control mb-2" name="description" id="description">

                    <label class="fw-bold">File:</label>
                    <input type="text" class="form-control mb-2" name="file" id="file">

                    <label class="fw-bold">Course:</label>
                    <input type="text" class="form-control mb-2" name="course" id="course">

                    <label class="fw-bold">Activity:</label>
                    <input type="text" class="form-control mb-2" 
                     name="activity" id="activity">

                    <label class="form-label">Assign Teacher:</label>

                    <?php
                      
                        
                            $sel_tname=mysqli_query($conn,"select name from admin_student where id='$st_id'");
                            $row_selt=mysqli_fetch_assoc($sel_tname);
                            $namet=$row_selt['name'];
                            
                            $sel_teacher=mysqli_query($conn,"select teacher from admin_student_teacher where student_name='$namet'");
                            $tech_arr=[];
                            foreach($sel_teacher as $teacher){
                                 $tech_arr[]=$teacher['teacher'];
                                //echo $student['course'];
                            }
                       
                    ?>
                     <select class="form-select" name="teacher" style="width:470px;">
                     <?php
                                $query_teacher=mysqli_query($conn,"select * from admin_teacher");
                                if(mysqli_num_rows($query_teacher) > 0){
                                    foreach($query_teacher as $rowtech)
                                    {
                                        ?>
                                        <option value="<?php echo $rowtech['id']; ?>"
                                            <?php echo in_array($rowtech['id'],$tech_arr) ? 'selected' : '' ?>          
                                            >                           
                                            <?php echo $rowtech['name']; ?>
                                        </option>
                                        <?php
                                    }
                                }

                            ?>
                </select>
                                          <label class="fw-bold">Start Time:</label>
                                          <input type="time" name="stime" class="form-control">
                                          <label class="fw-bold">End-Time:</label>
                                          <input type="time" name="etime" class="form-control">
                                          <label class="fw-bold">Start Date:</label>
                                          <input type="Date" name="sdate" class="form-control">
                                          <label class="fw-bold">End-Date:</label>
                                          <input type="Date" name="edate" class="form-control">
                                        
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
        $(document).ready(function () {
            $('.songs').select2();
        });

    </script>


</body>
</html>



<script>
  $(document).ready(function(){
    $('.editbtn').on('click',function(){
      $('#myModalEdit').modal('show');

      $tr=$(this).closest('tr');

      var data=$tr.children('td').map(function(){
        return $(this).text();
      }).get();

      console.log(data);
      $('#update_id').val(data[0]);
      $('#qtid').val(data[0]);
      $('#stid').val(data[1]);
      $('#name').val(data[2]);
      $('#description').val(data[3]);
      $('#file').val(data[4]);
      $('#course').val(data[5]);
      $('#activity').val(data[6]);
 
    });
  });

</script>

<?php 

  if(isset($_POST['save']))
  {
    $name=$_POST['name'];
    $description=$_POST['description'];
    $file=$_POST['file'];
    $course=$_POST['course'];
    $activity=$_POST['activity'];
    $teacher=$_POST['teacher'];
    $stime=$_POST['stime'];
    $etime=$_POST['etime'];
    $sdate=$_POST['sdate'];
    $edate=$_POST['edate'];
    $stid=$_POST['stid'];
    $qtid=$_POST['qtid'];
    $sql=mysqli_query($conn,"INSERT INTO `teacher_quiz`(`quiz_id`, `stu_id`,`teacher_id`, `name`, `description`, `stu_file`, `course`, `start_time`, `end_time`, `start_date`, `end_date`) VALUES ('$qtid','$stid','$teacher','$name','$description','$file','$course','$stime','$etime','$sdate','$edate')");
    if($sql){
      mysqli_query($conn,"UPDATE `student_xtra_quiz` `status`='apporve' WHERE quiz_id='$qtid'");
        ?>
        <script>
          window.location="<?php echo $app_url .'admin/today.php' ?>";
        </script>
     <?php
    }
  }

?>