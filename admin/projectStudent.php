<div class="card-body table-responsive p-0">
                  <div class="row">
                     <div class="col-lg-12">
                        <table id="example" class="table table-striped  mx-10">
                           <thead>
                              <tr>
                                 <th>ID</th>
                                 <th>Asst ID</th>
                                 <th>Project ID</th>
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
                                 $query=mysqli_query($conn,"select * from student_xtra_project where status='pending'");
                                    if($query){
                                 while($row=mysqli_fetch_assoc($query)){
                                     $course_id=$row['course'];
                                     $stu_id=$row['id'];
                                     $st_id=$row['stu_id'];
                                     $sel_course=mysqli_query($conn,"select * from admin_course where id='$course_id'");
                                     $crow=mysqli_fetch_assoc($sel_course);
                                     $course_name=$crow['name'];
                                     
                                 
                                   ?>
                              <tr>
                                 <td><?php echo $row['id'];?></td>
                                 <td><?php echo $row['project_id'];?></td>
                               
                                 <td><?php echo $row['stu_id'];?></td>
                                 <td><?php echo $row['name']; ?></td>
                                 <td style="width:200px;"><?php echo $row['description']; ?></td>
                              
                                 <td><a href="../student/<?php echo $row['stu_file']; ?>" download class="btn btn-success btn-sm"><?php echo $row['stu_file']; ?> </a></td>
                                 <td><?php echo $course_name; ?></td>
                                 <td><?php echo $row['start_time']; ?></td>
                                 <td><?php echo $row['end_time']; ?></td>
                                 <td><?php echo $row['start_date']; ?></td>
                                 <td><?php echo $row['end_date']; ?></td>
                              
                                 <td>
                                    <button class="btn  btn-sm btn-success editbtn"  type="button" >
                                    Approve
                                    </button>
                                    <button class="btn  btn-sm btn-danger " type="button" >
                                    Reject
                                    </button><br>
                                    <a href="inbox.php"> <button class="btn  btn-sm btn-primary " type="button" >
                                    <i class="fas fa-comment"></i>
                                    </button></a>
                                    <a href="" class="btn  btn-sm btn-success " type="button"><i class="fab fa-whatsapp"></i></a>
                                 </td>
                              </tr>
                              <?php
                                 }
                              }else{
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
               <!-- //Edit -->
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
                        <label class="fw-bold"> Id:</label>
                        <input type="text" class="form-control mb-2" 
                           name="id" id="id" readonly>
                           <label class="fw-bold">Assignment Id:</label>
                        <input type="text" class="form-control mb-2" 
                           name="qtid" id="qtid" readonly>
                        <label class="fw-bold">Student Id:</label>
                        <input type="text" class="form-control mb-2" 
                           name="stid" id="stid" readonly>
                        <label class="fw-bold">Name:</label>
                        <input type="text" class="form-control mb-2" 
                           name="name" id="name">
                        <label class="fw-bold">Description:</label>
                        <input type="text" class="form-control mb-2" name="description" id="description">
                        <label class="fw-bold">File:</label>
                        <input type="text" class="form-control mb-2" name="file" id="file">
                        <label class="fw-bold">Course:</label>
                        <input type="text" class="form-control mb-2" name="course" id="course">
                     
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
       $('#id').val(data[0]);
       $('#qtid').val(data[1]);
       $('#stid').val(data[2]);
       $('#name').val(data[3]);
       $('#description').val(data[4]);
       $('#file').val(data[5]);
       $('#course').val(data[6]);
    
   
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
     $teacher=$_POST['teacher'];
     $stime=$_POST['stime'];
     $etime=$_POST['etime'];
     $sdate=$_POST['sdate'];
     $edate=$_POST['edate'];
     $stid=$_POST['stid'];
     $qtid=$_POST['qtid'];
     $xid=$_POST['id'];
     $sql=mysqli_query($conn,"INSERT INTO `teacher_project`(`x_id`,`project_id`, `stu_id`,`teacher_id`, `name`, `description`, `stu_file`, `course`, `start_time`, `end_time`, `start_date`, `end_date`,`date`) VALUES ('$xid','$qtid','$stid','$teacher','$name','$description','$file','$course','$stime','$etime','$sdate','$edate',NOW())");
     if($sql){
       mysqli_query($conn,"UPDATE `student_xtra_project` SET `status`='apporve' WHERE project_id='$qtid' AND id='$xid'");
         ?>
<script>
   window.location="<?php echo $app_url .'admin/projectStudentTab.php' ?>";
</script>
<?php
   }
   }
   
   ?>