<?php 

include '../connection.php';

   define("TITLE","Student Edit");
   define("PAGE","Student");
   
   include 'header.php';
  
   
   $id=$_GET['idcourse'];
   // echo "<script>alert($id) </script>";
    $sql=mysqli_query($conn,"select * from student_course where id='$id'");
    $row=mysqli_fetch_assoc($sql);
    
   ?>
<div class="body-section">
   <div class="container">
      <div class="card">
         <div class="card-header border-0">
            <h3 class="card-title">Student Edit</h3>
            <hr>
            <div class="container mt-1">
               <div class="card">
                  <div class="row m-3">
                  <form method="POST">
                  <div class="row">        
                <div class="form-group col-md-6">
                    <label class="fw-bold">Quizes</label>
                    <input type="text" class="form-control mb-2" placeholder="Name" name="quiz" value="<?php echo $row['quiz']; ?>">
                </div>
           
                    <div class="form-group col-md-6">
                    <label class="fw-bold ">Course:</label><br>
                    <?php
                        if(isset($_GET['id'])){
                            $user_id=$_GET['id'];
                            echo $user_id;
                            $sel_name=mysqli_query($conn,"select name from admin_student where id='$user_id'");
                            $row_sel=mysqli_fetch_assoc($sel_name);
                            $name=$row_sel['name'];
                            
                            $sel_student=mysqli_query($conn,"select course from admin_student_course where student_name='$name'");
                            $stu_arr=[];
                            foreach($sel_student as $student){
                                 $stu_arr[]=$student['course'];
                               // echo $student['course'];
                            }
                        }
                    ?>
                    <select class="songs form-select" name="songs[]" multiple style="width:490px;" >
                        
                    <?php
                                $query_course=mysqli_query($conn,"select * from admin_course");
                                if(mysqli_num_rows($query_course) > 0){
                                    foreach($query_course as $rowcourse)
                                    {
                                        ?>
                                        <option value="<?php echo $rowcourse['id']; ?>"
                                            <?php echo in_array($rowcourse['id'],$stu_arr) ? 'selected' : '' ?>          
                                            >                           
                                            <?php echo $rowcourse['name']; ?>
                                        </option>
                                        <?php
                                    }
                                }

                            ?>
                </select>
                </div>
                        <br>
                        
                    
                    <div class="form-group col-md-6">
                    <label class="fw-bold ">Assignments.</label><br>
                    <input type="number" class="form-control mb-2" placeholder="Phone No" name="assignment" value="<?php echo $row['assignment']; ?>">
                    </div>
                    
                    <div class="form-group col-md-6">
                    <label class="fw-bold ">Midcourse.</label><br>
                    <input type="number" class="form-control mb-2" placeholder="Phone No" name="mid" value="<?php echo $row['mid']; ?>">
                    </div>
                   
                    <div class="form-group col-md-6">
                    <label class="fw-bold ">Finals.</label><br>
                    <input type="number" class="form-control mb-2" placeholder="Phone No" name="final" value="<?php echo $row['final']; ?>">
                    </div>

                </div>
                <div class="modal-footer bg-light">
                    <button type="submit" class="btn btn-primary" name="edit">Edit</button> 
                </div>
                </div>
            </form>
                  </div>
               </div>
               <div class="card-body table-responsive p-0">
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
</div>
<div class="footer-section">
 <div class="container-fluid management">
            <div class="container">
                <div class="row">
                    <div class=" col-lg-12 mt-2">
                        <hr>
                        <p>Copyright 2021 All Right Reserved. Design and Developed by Centre of Technological Excellence.</p>
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
<?php
    if(isset($_POST['edit'])){
        $stu_id=$_GET['idcourse'];
        $id=$_GET['id'];
        $selectname=mysqli_query($conn,"select * from admin_student where id='$id'");
        $runselectname=mysqli_fetch_assoc($selectname);
        $stname=$runselectname['name'];
       
       
        $sel=mysqli_query($conn,"select * from admin_student where id='$id'");
        $row=mysqli_fetch_assoc($sel);
        $quiz=$_POST['quiz'];
        $assignment=$_POST['assignment'];
        $mids=$_POST['mid'];
        $finals=$_POST['final'];
    
    
         
            
           $sql=mysqli_query($conn,"UPDATE `student_course` SET `quiz`='$quiz',`assignment`='$assignment',`mid`='$mids',`final`='$finals' WHERE id='$stu_id'");
           if($sql){

            $sname=mysqli_query($conn,"select course from admin_student_course where student_name='$stname'");
            $name=$_POST['name'];

               $course=$_POST['songs'];
               $query_update_course=mysqli_query($conn,"select * from admin_student_course where student_name='$stname'");
               $course_val=[];//to store database user course
               foreach($query_update_course as $coursedata)
               {
                    $course_val[]=$coursedata['course'];
               }
               ///insert new data course
               foreach($course as $courseValue)
               {
                    if(!in_array($courseValue,$course_val))
                    {
                        $student=mysqli_query($conn,"INSERT INTO `admin_student_course` (`student_name`, `course`) VALUES ('$stname','$courseValue') ");
                    }
               }
               //delete added course
               foreach($course_val as $course_row)
               {
                if(!in_array($course_row,$course))
                {
                    $delete_course="DELETE FROM admin_student_course WHERE student_name='$stname' AND course='$course_row'";
                    mysqli_query($conn,$delete_course);
                }
               }
          
    
          
          
            ?>
            <script>
               window.location = "<?php echo $app_url .'student/course.php?id='."$id" ?>"
            </script>
        <?php
           }
    
          
        
    }

?>