<?php 

include '../connection.php';

   define("TITLE","Teacher Edit");
   define("PAGE","Teacher");
   
   include 'header.php';
   
   
   $id=$_GET['ids'];
//    echo "<script>alert($id) </script>";
    $sql=mysqli_query($conn,"select * from admin_teacher where id='$id'");
    $row=mysqli_fetch_assoc($sql);
    
   ?>
<div class="body-section">
   <div class="container">
      <div class="card">
         <div class="card-header border-0">
            <h3 class="card-title">Teacher Edit</h3>
            <hr>
            <div class="container mt-1">
               <div class="card">
                  <div class="row m-3">
                  <form method="POST">
                  <div class="row">        
                <div class="form-group col-md-6">
                    <label class="fw-bold">Name</label>
                    <input type="text" class="form-control mb-2" placeholder="Name" name="name" value="<?php echo $row['name']; ?>">
                </div>
            <div class="form-group col-md-6">
                <label class="fw-bold">CNIC</label>
                    <input type="text" class="form-control " placeholder="CNIC" name="cnic" value="<?php echo $row['cnic']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                    <label class="fw-bold ">Course:</label><br>
                    <?php
                        if(isset($_GET['ids'])){
                            $user_id=$_GET['ids'];
                            $sel_name=mysqli_query($conn,"select name from admin_teacher where id='$user_id'");
                            $row_sel=mysqli_fetch_assoc($sel_name);
                            $name=$row_sel['name'];
                            
                            $sel_student=mysqli_query($conn,"select course from admin_teacher_course where teacher_name='$name'");
                            $stu_arr=[];
                            foreach($sel_student as $student){
                                 $stu_arr[]=$student['course'];
                                //echo $student['course'];
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
                     <label class="fw-bold ">Faculty.</label><br>
                     <select class="form-select" name="faculty" value="<?php echo $row['faculty']; ?>">
                     <?php
                        include '../connection.php';
                        $sqli="select * from admin_fauclty";
                                                
                        $sql=mysqli_query($conn,$sqli);
                        while($rowf=mysqli_fetch_assoc($sql)) {
                            
                            ?>
                            <option value="<?php echo $rowf['name']; ?>"><?php echo $rowf['name']; ?></option>
                            <?php
                        }
                     
                    ?>
                </select>
                    </div>
                    <div class="form-group col-md-6">
                    <label class="fw-bold ">Phone No.</label><br>
                    <input type="number" class="form-control mb-2" placeholder="Phone No" name="mobile" value="<?php echo $row['mobile']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                    <label class="fw-bold">E-mail</label><br>
                    
                    <input type="Email" class="form-control mb-2" placeholder="E-mail" name="email" value="<?php echo $row['email']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                     <label class="fw-bold">Password:</label><br>
                    
                    <input type="text" class="form-control mb-2" placeholder="Enter Password" name="password" value="<?php echo $row['password']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                    <label class="fw-bold">Confirm Password:</label><br>
                    <input type="text" class="form-control mb-2" placeholder="Confirm Password" name="cpassword" value="<?php echo $row['cpassword']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                    <label class="fw-bold">Current Address</label><textarea class="form-control" name="address">
                        <?php echo $row['address']; ?>
                    </textarea>
                    </div>
                    <div class="form-group col-md-6">
                    <label class="fw-bold">Status</label>
                    <select name="status" class="form-control">
                      <option value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option>
                      <option value="active">active</option>
                      <option value="inactive">inactive</option>
                    </select>
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
        $stu_id=$_GET['ids'];
        $selectname=mysqli_query($conn,"select * from admin_teacher where id='$user_id'");
        $runselectname=mysqli_fetch_assoc($selectname);
        $stname=$runselectname['name'];
        $sname=mysqli_query($conn,"select course from admin_teacher_course where student_name='$stname'");
        $name=$_POST['name'];
       
 
        $cnic=$_POST['cnic'];
        $faculty=$_POST['faculty'];
        $mobile=$_POST['mobile'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $address=$_POST['address'];
        $status=$_POST['status'];
    
  
         
            
           $sql=mysqli_query($conn,"UPDATE `admin_teacher` SET `name`='$name',`cnic`='$cnic',`faculty`='$faculty',`mobile`='$mobile',`email`='$email',`password`='$password',`cpassword`='$cpassword',`address`='$address',`status`='$status' WHERE id='$stu_id'");
           if($sql){

               $course=$_POST['songs'];
               $query_update_course=mysqli_query($conn,"select * from admin_teacher_course where teacher_name='$stname'");
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
                        $student=mysqli_query($conn,"INSERT INTO `admin_teacher_course`(`teacher_name`, `course`) VALUES ('$name','$courseValue') ");
                    }
               }
               //delete added course
               foreach($course_val as $course_row)
               {
                if(!in_array($course_row,$course))
                {
                    $delete_course="DELETE FROM admin_teacher_course WHERE teacher_name='$stname' AND course='$course_row'";
                    mysqli_query($conn,$delete_course);
                }
               }
          
    
            
            ?>
            <script>
              window.location = "<?php echo $app_url.'admin/teacherpro.php' ?>";
            </script>
        <?php
           }
    
          
      
    }

?>