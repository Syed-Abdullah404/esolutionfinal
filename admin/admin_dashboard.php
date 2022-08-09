<?php 

include '../connection.php';

define("TITLE","Dashboard");
define("PAGE","Dashboard");


include 'header.php';

?>
<body>
  

<div class="body-section">
<div class="container " style="margin-top:-8px;">
         <div class="card ">
              <div class="card-header border-0">
                <h3 class="card-title display-6">Dashboard</h3>
                <hr>
      <div class="container ">
     
              <div class="row">
                  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        
          
        <div class="col-md-4">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded" style="color:#0B0452">
                                <div>
                                    <?php
                                       $select_p="select * from admin_student";
                                       $run=mysqli_query($conn,$select_p);
                                       $row=mysqli_num_rows($run);
                                       ?>
                                       <h3><?php echo $row; ?></h3>
                                    
                                  
                                    <p class="fs-5">Students</p>
                                </div>
                                <i class="fas fa-users fs-1  border-rounded-full p-3"></i>
                            </div>
                        </div>

                        <div class="col-md-4 mt-2">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded" style="color:#0B0452">
                                <div>
                                    <?php
                                       $select_p="select * from admin_teacher";
                                       $run=mysqli_query($conn,$select_p);
                                       $row=mysqli_num_rows($run);
                                       ?>
                                       <h3><?php echo $row; ?></h3>
                                    
                                  
                                    <p class="fs-5">Teachers</p>
                                </div>
                                <i class="fas fa-chalkboard-teacher fs-1  border-rounded-full p-3"></i>
                            </div>
                        </div>


                        <div class="col-md-4 mt-2">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded" style="color:#0B0452">
                                <div>
                                    <?php
                                       $select_p="select * from admin_fauclty";
                                       $run=mysqli_query($conn,$select_p);
                                       $row=mysqli_num_rows($run);
                                       ?>
                                       <h3><?php echo $row; ?></h3>
                                    
                                  
                                    <p class="fs-5">Faculty</p>
                                </div>
                                <i class="fas fa-user-tie fs-1  border-rounded-full p-3"></i>
                            </div>
                        </div>

                        <div class="col-md-4 mt-2">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded" style="color:#0B0452">
                                <div>
                                    <?php
                                       $select_p="select * from admin_course";
                                       $run=mysqli_query($conn,$select_p);
                                       $row=mysqli_num_rows($run);
                                       ?>
                                       <h3><?php echo $row; ?></h3>
                                    
                                  
                                    <p class="fs-5">Courses</p>
                                </div>
                                <i class="fas fa-book-open fs-1  border-rounded-full p-3"></i>
                            </div>
                        </div>

                        <div class="col-md-4 mt-2">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded" style="color:#0B0452">
                                <div>
                                    <?php
                                       $select_p="select * from users";
                                       $run=mysqli_query($conn,$select_p);
                                       $row=mysqli_num_rows($run);
                                       ?>
                                       <h3><?php echo $row; ?></h3>
                                    
                                  
                                    <p class="fs-5">Users</p>
                                </div>
                                <i class="fas fa-user-cog fs-1  border-rounded-full p-3"></i>
                            </div>
                        </div>

        
        <!-- /.row -->
                </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <tr>
                            <hr>
                            <h2 class="text-center my-3 fw-normal"  style="color:#0B0452">All Student Requests</h2>
                            <hr>
                        </tr>
                        <tr>
                                 <th>Name</th>
                                 <th>Description</th>
                                 <th>File</th>
                                 <th></th>
                                 <th>Start Time</th>
                                 <th>End Time</th>
                                 <th>Start Date</th>
                                 <th>End Date</th>
                        </tr>
                <?php
                                 $query=mysqli_query($conn,"select * from student_xtra_assignment where status='pending'");
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
                                
                                 <td><?php echo $row['name']; ?></td>
                                 <td style="width:200px;"><?php echo $row['description']; ?></td>
                              
                                 <td><a href="../student/<?php echo $row['stu_file']; ?>" download class="btn btn-success btn-sm"><?php echo $row['stu_file']; ?> </a></td>
                                 <td><?php echo $course_name; ?></td>
                                 <td><?php echo $row['start_time']; ?></td>
                                 <td><?php echo $row['end_time']; ?></td>
                                 <td><?php echo $row['start_date']; ?></td>
                                 <td><?php echo $row['end_date']; ?></td>
                              
                              </tr>
                              <?php
                                 }
                                }
                                 ?>

                              
                                 <?php
                                 $query=mysqli_query($conn,"select * from student_xtra_quiz where status='pending'");
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
                               
                                 <td><?php echo $row['name']; ?></td>
                                 <td style="width:200px;"><?php echo $row['description']; ?></td>
                          
                                 <td><a href="../student/<?php echo $row['stu_file']; ?>" download class="btn btn-success btn-sm">Quiz File </a></td>
                                 <td><?php echo $course_name; ?></td>
                                 <td><?php echo $row['start_time']; ?></td>
                                 <td><?php echo $row['end_time']; ?></td>
                                 <td><?php echo $row['start_date']; ?></td>
                                 <td><?php echo $row['end_date']; ?></td>
                              
                              </tr>
                              <?php
                                 }
                              }
                               ?>
                                   <?php
                                 $query=mysqli_query($conn,"select * from student_xtra_lab where status='pending'");
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
                                 
                                 <td><?php echo $row['name']; ?></td>
                                 <td style="width:200px;"><?php echo $row['description']; ?></td>
                              
                                 <td><a href="../student/<?php echo $row['stu_file']; ?>" download class="btn btn-success btn-sm"><?php echo $row['stu_file']; ?> </a></td>
                                 <td><?php echo $course_name; ?></td>
                                 <td><?php echo $row['start_time']; ?></td>
                                 <td><?php echo $row['end_time']; ?></td>
                                 <td><?php echo $row['start_date']; ?></td>
                                 <td><?php echo $row['end_date']; ?></td>
                              
                              </tr>
                              <?php
                                 }
                              }
                              ?>
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
                               
                                 <td><?php echo $row['name']; ?></td>
                                 <td style="width:200px;"><?php echo $row['description']; ?></td>
                              
                                 <td><a href="../student/<?php echo $row['stu_file']; ?>" download class="btn btn-success btn-sm"><?php echo $row['stu_file']; ?> </a></td>
                                 <td><?php echo $course_name; ?></td>
                                 <td><?php echo $row['start_time']; ?></td>
                                 <td><?php echo $row['end_time']; ?></td>
                                 <td><?php echo $row['start_date']; ?></td>
                                 <td><?php echo $row['end_date']; ?></td>
                           
                              </tr>
                              <?php
                                 }
                              }
                              ?>
                               <?php
                                 $query=mysqli_query($conn,"select * from student_xtra_mid where status='pending'");
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
                              
                                 <td><?php echo $row['name']; ?></td>
                                 <td style="width:200px;"><?php echo $row['description']; ?></td>
                              
                                 <td><a href="../student/<?php echo $row['stu_file']; ?>" download class="btn btn-success btn-sm"><?php echo $row['stu_file']; ?> </a></td>
                                 <td><?php echo $course_name; ?></td>
                                 <td><?php echo $row['start_time']; ?></td>
                                 <td><?php echo $row['end_time']; ?></td>
                                 <td><?php echo $row['start_date']; ?></td>
                                 <td><?php echo $row['end_date']; ?></td>
                              
                               
                              </tr>
                              <?php
                                 }
                              }
                              ?>
                              <?php
                                 $query=mysqli_query($conn,"select * from student_xtra_final where status='pending'");
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
                            
                                 <td><?php echo $row['name']; ?></td>
                                 <td style="width:200px;"><?php echo $row['description']; ?></td>
                              
                                 <td><a href="../student/<?php echo $row['stu_file']; ?>" download class="btn btn-success btn-sm"><?php echo $row['stu_file']; ?> </a></td>
                                 <td><?php echo $course_name; ?></td>
                                 <td><?php echo $row['start_time']; ?></td>
                                 <td><?php echo $row['end_time']; ?></td>
                                 <td><?php echo $row['start_date']; ?></td>
                                 <td><?php echo $row['end_date']; ?></td>
                              
                              </tr>
                              <?php
                                 }
                              }
                              ?>


                              <!-- For Teacher Requests-->
                              <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td style="width: 1200px;">
                            <hr>
                            <h2 style="color:#0B0452" class="fw-normal">All Teacher Requests</h2>
                            <hr>
                            </td>
                        </tr>
                              <tr>
                          
                         
                          <th>Student ID</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>File</th>
                          <th>Course</th>
                          <th>Teacher ID</th>
                                                 
                     </tr>
                              <?php
                                  $query=mysqli_query($conn,"select * from teacher_xtra_assignment where status='pending'");
                            if($query){
                                  while($row=mysqli_fetch_assoc($query)){
                                      $course_id=$row['course'];
                                      $stu_id=$row['stu_id'];
                                      $sel_course=mysqli_query($conn,"select * from admin_course where id='$course_id'");
                                      $crow=mysqli_fetch_assoc($sel_course);
                                      $course_name=$crow['name'];
                            
                                    ?>
                                  <tr>
                                        <td><?php echo $stu_id?></td> 
                                         <td><?php echo $row['name']; ?></td>     
                                         <td><?php echo $row['description']; ?></td>     
                                            
                                       
                                         <td><a href="../teacher/<?php echo $row['stu_file']; ?>" download class="btn btn-success btn-sm"><?php echo $row['stu_file']; ?></a></td>

                                         <td><?php echo $course_name; ?></td>     
                                         <td><?php echo $row['teacher_id']?></td>     
                                         
                                          
                                     
                                                   
                                              
                                          </tr>

                                <?php
                                  }
                                  }
                                  ?>
                                    <!-- Teacher Quiz Requests -->

                        <?php
                                  $query=mysqli_query($conn,"select * from teacher_xtra_quiz where status='pending'");
                            if($query){
                                  while($row=mysqli_fetch_assoc($query)){
                                      $course_id=$row['course'];
                                      $stu_id=$row['stu_id'];
                                      $sel_course=mysqli_query($conn,"select * from admin_course where id='$course_id'");
                                      $crow=mysqli_fetch_assoc($sel_course);
                                      $course_name=$crow['name'];
                            
                                    ?>
                                  <tr>
                                              
                                             
                                         <td><?php echo $stu_id?></td>     
                                         <td><?php echo $row['name']; ?></td>     
                                         <td><?php echo $row['description']; ?></td>     
                                              
                                       
                                         <td><a href="../teacher/<?php echo $row['stu_file']; ?>" download class="btn btn-success btn-sm"><?php echo $row['stu_file']; ?> </a></td>

                                         <td><?php echo $course_name; ?></td>     
                                        
                                         <td><?php echo $row['teacher_id']?></td>     
                                       
                                          
                                     
                                                   
                                        
                                          </tr>

                            <?php
                                  }
                                  }
                                  ?>
                                  <!-- Techer Lab Requests -->

                                  <?php
                                  $query=mysqli_query($conn,"select * from teacher_xtra_lab where status='pending'");
                            if($query){
                                  while($row=mysqli_fetch_assoc($query)){
                                      $course_id=$row['course'];
                                      $stu_id=$row['stu_id'];
                                      $sel_course=mysqli_query($conn,"select * from admin_course where id='$course_id'");
                                      $crow=mysqli_fetch_assoc($sel_course);
                                      $course_name=$crow['name'];
                            
                                    ?>
                                  <tr>
                                              
                                            
                                         <td><?php echo $stu_id?></td>     
                                         <td><?php echo $row['name']; ?></td>     
                                         <td><?php echo $row['description']; ?></td>     
                                          
                                       
                                         <td><a href="../teacher/<?php echo $row['stu_file']; ?>" download class="btn btn-success btn-sm"><?php echo $row['stu_file'];?></a></td>

                                         <td><?php echo $course_name; ?></td>     
                                         <td><?php echo $row['teacher_id']?></td>     
                                      
                                          </tr>

<?php
                                  }
                                  }


?>
                        <!-- Teacher Project Requests -->
                        <?php
                                  $query=mysqli_query($conn,"select * from teacher_xtra_project where status='pending'");
                            if($query){
                                  while($row=mysqli_fetch_assoc($query)){
                                      $course_id=$row['course'];
                                      $stu_id=$row['stu_id'];
                                      $sel_course=mysqli_query($conn,"select * from admin_course where id='$course_id'");
                                      $crow=mysqli_fetch_assoc($sel_course);
                                      $course_name=$crow['name'];
                            
                                    ?>
                                  <tr>
                                              
                                             
                                         <td><?php echo $stu_id?></td>     
                                         <td><?php echo $row['name']; ?></td>     
                                         <td><?php echo $row['description']; ?></td>     
                                            
                                       
                                         <td><a href="../teacher/<?php echo $row['stu_file']; ?>" download class="btn btn-success btn-sm"><?php echo $row['stu_file']; ?></a></td>

                                         <td><?php echo $course_name; ?></td>     
                                     
                                         <td><?php echo $row['teacher_id']?></td>     
                                        
                                          </tr>

<?php
                                  }
                                  }
                                  ?>

                                  <!-- Teacher Mids Requests -->
                                  <?php
                                  $query=mysqli_query($conn,"select * from teacher_xtra_mid where status='pending'");
                            if($query){
                                  while($row=mysqli_fetch_assoc($query)){
                                      $course_id=$row['course'];
                                      $stu_id=$row['stu_id'];
                                      $sel_course=mysqli_query($conn,"select * from admin_course where id='$course_id'");
                                      $crow=mysqli_fetch_assoc($sel_course);
                                      $course_name=$crow['name'];
                            
                                    ?>
                                  <tr>
                                              
                                              
                                         <td><?php echo $stu_id?></td>     
                                         <td><?php echo $row['name']; ?></td>     
                                         <td><?php echo $row['description']; ?></td>     
                                            
                                       
                                         <td><a href="../teacher/<?php echo $row['stu_file']; ?>" download class="btn btn-success btn-sm"><?php echo $row['stu_file']; ?></a></td>

                                         <td><?php echo $course_name; ?></td>     
                                     
                                         <td><?php echo $row['teacher_id']?></td>     
                                         
                                          
                                     
                                             
                                          </tr>

                        <?php
                                  }
                                  }
                                  ?>

                                  <!-- Teacher Final Requests -->
                                  <?php
                                  $query=mysqli_query($conn,"select * from teacher_xtra_final where status='pending'");
                            if($query){
                                  while($row=mysqli_fetch_assoc($query)){
                                      $course_id=$row['course'];
                                      $stu_id=$row['stu_id'];
                                      $sel_course=mysqli_query($conn,"select * from admin_course where id='$course_id'");
                                      $crow=mysqli_fetch_assoc($sel_course);
                                      $course_name=$crow['name'];
                            
                                    ?>
                                  <tr>
                                              
                                            
                                         <td><?php echo $stu_id?></td>     
                                         <td><?php echo $row['name']; ?></td>     
                                         <td><?php echo $row['description']; ?></td>     
                                         
                                       
                                         <td><a href="../teacher/<?php echo $row['stu_file']; ?>" download class="btn btn-success btn-sm"><?php echo $row['stu_file']; ?></a></td>

                                         <td><?php echo $course_name; ?></td>     
                                     
                                         <td><?php echo $row['teacher_id']?></td>     
                                  
                                          </tr>

<?php
                                  }
                                  }
                                  ?>
                              <!-- For Teacher Requests End-->
                            

                              <!-- //For Student Course Approval -->
                              <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td style="width:800px;">
                                  <h4  style="color:#0B0452">Course Approval Requests</h4>
                            </td>
                              </tr>
                              <tr>
                               
                              
                               <th>Courses</th>
                               <th>Student Name</th>                                
                               <th>Quiz</th>
                               <th>Assignments</th>
                               <th>Mids</th>
                               <th>Final</th>                           
                               <th>Chat</th>
                         
                            </tr>

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
                                  
                                     <td><?php echo $row_course['name']; ?> </td>
                                   
                              
                                 <td><?php echo $name;?></td>
                                 
                                 <td><?php echo $quiz;?></td>
                                 <td><?php echo $assignment; ?></td>
                                 <td><?php echo $mid; ?></td>
                                 <td><?php echo $final;?></td>
                                 <td>
                                 <a  target="_blank" title="Contact Us On WhatsApp" href="https://web.whatsapp.com/send?phone=<?php echo $mobile; ?>&amp;text=Hi, I would like to get more information.." >  <li class="dropdown-item"> <i class="fab fa-whatsapp"></i></li></a>
                                 </td>
                              
                                 
                                 
                              
                                 
                              </tr>
                              <?php
                               
                              }}
                                ?>

                                <!-- Admission Requests Start-->
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td style="width:800px;">
                                  <h4  style="color:#0B0452">Admission Requests</h4>
                            </td>
                              </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Ph#</th>
                                    <th>E-mail</th>
                                    <th></th>
                                    <th></th>
                                  
                                </tr>

                                <?php
                                  $query=mysqli_query($conn,"select * from student_sign_up where approval='pending' ");
                                  
                                  while($row=mysqli_fetch_assoc($query)){
                                  
                                    $check=$row['approval'];
                                    ?>
                                  <tr>
                                      <td></td>     
                                      <td></td>     
                                         <td><?php echo $row['name']; ?></td>     
                                         <td><?php echo $row['mobile']; ?></td>     
                                         <td><?php echo $row['email']; ?></td> 
                                  </tr>
                                  <?php
                                  }
                                  ?>      
                                <!-- Admission Requests End -->
                              
                                 </table>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 


</body>
</html>



