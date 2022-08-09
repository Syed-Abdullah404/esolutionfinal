<?php 

include '../connection.php';

define("TITLE","Dashboard");
define("PAGE","Dashboard");


include 'header.php';

?>


<div class="body-section">
<div class="container " style="margin-top:-7px;">
         <div class="card ">
              <div class="card-header border-0">
                <h3 class="card-title display-6">Student Dashboard</h3>
                <hr>
      <div class="container " >
     
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
                                    // $id=$_GET['id'];
                                    $sql=mysqli_query($conn,"select * from admin_student where id='$id'");
                                    $rowsql=mysqli_fetch_assoc($sql);
                                    $stu_id=$rowsql['id'];
                                       $select_p="select * from admin_student_course where student_id='$stu_id'";
                                       $run=mysqli_query($conn,$select_p);
                                       $row=mysqli_num_rows($run);
                                       ?>
                                       <h3><?php echo $row; ?></h3>
                                    
                                  
                                    <p class="fs-5">Courses</p>
                                </div>
                                <i class="fas fa-books fs-1  border-rounded-full p-3"></i>
                            </div>
                        </div>

                        <div class="col-md-4 mt-2">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded" style="color:#0B0452">
                                <div>
                                    <?php
                                       $select_p="select * from student_xtra_quiz where stu_id='$id'";
                                       $run=mysqli_query($conn,$select_p);
                                       $row=mysqli_num_rows($run);
                                       ?>
                                       <h3><?php echo $row; ?></h3>
                                    
                                  
                                    <p class="fs-5">Quiz</p>
                                </div>
                                <i class="fas fa-chalkboard-teacher fs-1  border-rounded-full p-3"></i>
                            </div>
                        </div>


                        <div class="col-md-4 mt-2">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded" style="color:#0B0452">
                                <div>
                                    <?php
                                       $select_p="select * from student_xtra_assignment where stu_id='$id'";
                                       $run=mysqli_query($conn,$select_p);
                                       $row=mysqli_num_rows($run);
                                       ?>
                                       <h3><?php echo $row; ?></h3>
                                    
                                  
                                    <p class="fs-5">Assignment</p>
                                </div>
                                <i class="fas fa-book-open fs-1  border-rounded-full p-3"></i>
                            </div>
                        </div>

                        <div class="col-md-4 mt-2">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded" style="color:#0B0452">
                                <div>
                                    <?php
                                       $select_p="select * from student_xtra_lab where stu_id='$id'";
                                       $run=mysqli_query($conn,$select_p);
                                       $row=mysqli_num_rows($run);
                                       ?>
                                       <h3><?php echo $row; ?></h3>
                                    
                                  
                                    <p class="fs-5">Lab</p>
                                </div>
                                <i class="fas fa-book-reader fs-1  border-rounded-full p-3"></i>
                            </div>
                        </div>

                        <div class="col-md-4 mt-2">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded" style="color:#0B0452">
                                <div>
                                    <?php
                                       $select_p="select * from student_xtra_project where stu_id='$id'";
                                       $run=mysqli_query($conn,$select_p);
                                       $row=mysqli_num_rows($run);
                                       ?>
                                       <h3><?php echo $row; ?></h3>
                                    
                                  
                                    <p class="fs-5">Project</p>
                                </div>
                                <i class="fas fa-user-cog fs-1  border-rounded-full p-3"></i>
                            </div>
                        </div> 

                        <div class="col-md-4 mt-2">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded" style="color:#0B0452">
                                <div>
                                    <?php
                                       $select_p="select * from student_xtra_mid where stu_id='$id'";
                                       $run=mysqli_query($conn,$select_p);
                                       $row=mysqli_num_rows($run);
                                       ?>
                                       <h3><?php echo $row; ?></h3>
                                    
                                  
                                    <p class="fs-5">Mids</p>
                                </div>
                                <i class="fas fa-bookmark fs-1  border-rounded-full p-3"></i>
                            </div>
                        </div> 

                        <div class="col-md-4 mt-2">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded" style="color:#0B0452">
                                <div>
                                    <?php
                                       $select_p="select * from student_xtra_final where stu_id='$id'";
                                       $run=mysqli_query($conn,$select_p);
                                       $row=mysqli_num_rows($run);
                                       ?>
                                       <h3><?php echo $row; ?></h3>
                                    
                                  
                                    <p class="fs-5">Finals</p>
                                </div>
                                <i class="far fa-bookmark fs-1  border-rounded-full p-3"></i>
                            </div>
                        </div> 

        
        <!-- /.row -->
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



