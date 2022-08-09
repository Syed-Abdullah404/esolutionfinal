<?php 

include '../connection.php';

   define("TITLE","Student Approval Request");
   define("PAGE","Student Approval Request");
   
   
   include 'header.php';
   
   ?>
<div class="body-section">
   <div class="container ">
      <div class="card ">
         <div class="card-header border-0">
            <h3 class="card-title display-6">Student Course Approval Request</h3>
            <hr>
            <div class="container mt-1">
               <div class="row">
                  <div class="col-lg-9 mb-4">
                     <div class="input-group ">
                     </div>
                  </div>
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                      
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Course</button>
                        </li>
                       
                   </ul>
                <div class="tab-content" id="myTabContent">
                   
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="card-body table-responsive p-0">
                  <div class="row">
                     <div class="col-lg-12">
                        <table id="example" class="table table-striped  mx-10">
                           <thead>
                              <tr>
                               
                                 <th>ID</th>
                                 <th>Courses</th>
                                 <th>Student Name</th>                                
                                 <th>Quiz</th>
                                 <th>Assignments</th>
                                 <th>Mids</th>
                                 <th>Final</th>                           
                                 <th>Chat</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 $query=mysqli_query($conn,"select * from student_course where status='pending'");
                                    if($query){
                                 while($row=mysqli_fetch_assoc($query)){
                                     $id=$row['id'];
                                     $stu_id=$row['stu_id'];
                                     $course=$row['course'];
                                     $get_course_name=mysqli_query($conn,"select * from admin_course where id='$course'");
                                     $row_course=mysqli_fetch_assoc($get_course_name);
                                     $quiz=$row['quiz'];
                                     $assignment=$row['assignment'];
                                     $mid=$row['mid'];
                                     $final=$row['final'];
                                     
                                        $stuName=mysqli_query($conn,"select * from admin_student where id='$stu_id'");
                                        $row_stu=mysqli_fetch_assoc($stuName);
                                        $name=$row_stu['name'];
                                        $mobile=$row_stu['mobile'];
                                     
                                        
                                         $sel_name=mysqli_query($conn,"select name from admin_student where name='$name'");
                                         $row_sel=mysqli_fetch_assoc($sel_name);
                                         $name=$row_sel['name'];
                                         
                                         $sel_student=mysqli_query($conn,"select course from admin_student_course where student_name='$name'");
                                         $stu_arr=[];
                                         foreach($sel_student as $student){
                                              $stu_arr[]=$student['course'];
                                             //echo $student['course'];
                                         }
                                   
                                 ?>
                                 <tr>
                                     <td><?php echo $id; ?></td>
                                     <td><?php echo $row_course['name']; ?> </td>
                                   
                              
                                 <td><?php echo $name;?></td>
                                 
                                 <td><?php echo $quiz;?></td>
                                 <td><?php echo $assignment; ?></td>
                                 <td><?php echo $mid; ?></td>
                                 <td><?php echo $final;?></td>
                                 <td>
                                 <a  target="_blank" title="Contact Us On WhatsApp" href="https://web.whatsapp.com/send?phone=<?php echo $mobile; ?>&amp;text=Hi, I would like to get more information.." >  <li class="dropdown-item"> <i class="fab fa-whatsapp"></i></li></a>
                                 </td>
                                 <td>
                                 <button class="btn  btn-sm btn-success editbtn"  type="button">
                                     Approve
                                 </button>
                                 <button class="btn  btn-sm btn-danger rbtn" type="button" >
                                     Reject
                                 </button>
                                 </td>
                                 
                                 
                              
                                 
                              </tr>
                              <?php
                               
                              }}else{
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
            <!-- //Edit -->
            <div class="modal fade" id="myModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Approve Student Course</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form method="POST" enctype="multipart/form-data">
                     <input type="hidden" name="update_id" id="update_id" />
                     <div class="form-group">
                        
                        <input type="hidden" class="form-control mb-2" name="id" id="id" readonly> 
                       <input type="hidden" class="form-control mb-2" name="stid" id="stid" readonly> 
                       
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
                     <input type="hidden" name="update_id" id="up_id" />
                     <h1 class="text-danger">Are You Sure To Reject It</h1>
                     <div class="form-group">
                        <!-- <label class="fw-bold"> Id:</label> -->
                        <input type="hidden" class="form-control mb-2" 
                           name="id" id="idd" readonly>

                           <input type="text" class="form-control mb-2" 
                           name="qtidd" id="qtidd" readonly>

                           <input type="text" class="form-control mb-2" 
                           name="sname" id="sname" readonly>
                          
                      
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
     $('.rbtn').on('click',function(){
       $('#myModalReject').modal('show');
   
       $tr=$(this).closest('tr');
   
       var data=$tr.children('td').map(function(){
         return $(this).text();
       }).get();
   
       console.log(data);
       $('#up_id').val(data[0]);
       $('#idd').val(data[0]);
       $('#qtidd').val(data[1]);
       $('#sname').val(data[2]);
     });
   });
   
</script>
<script type="text/javascript">
   $(document).ready(function () {
       $('.songs').select2();
   });
   
</script>
</body>
</html>


<?php

   if(isset($_POST['save'])){
       $id=$_POST['id'];
       $stid=$_POST['stid'];
      $approve= mysqli_query($conn,"UPDATE `student_course` SET `status`='apporve' WHERE id='$id'");
      if($approve){
        $semail=mysqli_query($conn,"SELECT * FROM `admin_student` WHERE name='$stid'");
       		$srow=mysqli_fetch_assoc($semail);
       
       		$to_email =$srow['email'];
      	
            $subject="Course Request Response";
            $body=" Hi Student , Admin Approve your Course Request..";
            $header="From: check9404@gmail.com";

            if (mail($to_email, $subject, $body, $header)) {
                echo "<script> alert('Email successfully sent to $to_email...') </script>";
            } 
        ?>
        <script>
           window.location="<?php echo $app_url .'admin/courseStudentTab.php' ?>";
        </script>
        <?php
      }
   }

   //reject

   if(isset($_POST['reject'])){
    $id=$_POST['id'];
    $qtidd=$_POST['qtidd'];
    $sname=$_POST['sname'];
    $get_course_id=mysqli_query($conn,"select * from admin_course where name='$qtidd'");
    $row_id=mysqli_fetch_assoc($get_course_id);
    $course_id=$row_id['id'];
   $approve= mysqli_query($conn,"UPDATE `student_course` SET `status`='reject' WHERE id='$id'");
   if($approve){
      mysqli_query($conn,"DELETE FROM `admin_student_course` WHERE student_name='$sname' AND course='$course_id'");
     
     $sremail=mysqli_query($conn,"SELECT * FROM `admin_student` WHERE name='$sname'");
       		$srrow=mysqli_fetch_assoc($semail);
       
       		$to_email =$srrow['email'];
      		$t_email = "";
            $subject="Course Request";
            $body="hi, Admin Reject your Course Request..";
            $header="From: $t_email";

            if (mail($to_email, $subject, $body, $header)) {
                echo "<script> alert('Email successfully sent to $to_email...') </script>";
            } 
     ?>
     <script>
        window.location="<?php echo $app_url .'admin/courseStudentTab.php' ?>";
     </script>
     <?php
   }
}
?>