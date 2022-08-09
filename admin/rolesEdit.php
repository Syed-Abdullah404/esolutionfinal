<?php 

include '../connection.php';

define("TITLE","Roles");
define("PAGE","Roles");
include '../connection.php';
include 'header.php';
$name=$_GET['id'];
?>


<div class="body-section">
<div class="container">
         <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Edit Roles</h3>
                <hr>
      <div class="container mt-1">
              <!-- Button trigger modal -->
              <div class="row">
                  <div class="col-lg-12">                 
                
               
              
      
         
     
        <div class="modal-body">
            <form method="POST">
                <table>
                    <tr>
                        <td>
                        <div class="form-group">
                            <label class="form-label">Role Name</label>
                            <input type="text" class="form-control" placeholder="Role Name" name="rname" value="<?php echo $name; ?>">
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <label class="form-label mt-2">Permissions</label>
                        </td>
                    
                    </tr>
                    
                    <tr>
                        <td>
                        
                        <div class="form-check mt-2">
                        <?php
                            $name=$_GET['id'];
                                $edit=mysqli_query($conn,"select * from roles where role_name='$name'");
                                while($rows=mysqli_fetch_assoc($edit)){
                                    ?>
                            <input class="form-check-input" type="checkbox" name="addT" value="1" 
                             <?php 
                                if($rows['add_teacher'] == 1){
                                    echo 'checked';
                                }
                            
                             ?>
                            >
                           
                            <label class="form-check-label" >
                               Add Teacher
                            </label>
                        </div>
                        </td>

                        <td>
                        <div class="form-check mt-2">                       
                            <input class="form-check-input" type="checkbox" name="addS" value="1" 
                            <?php 
                                if($rows['add_student'] == 1){
                                    echo 'checked';
                                }
                            
                             ?>
                            >
                            <label class="form-check-label" >
                                Add Student
                            </label>
                        </div>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                        
                        <div class="form-check mt-2">
                        
                            <input class="form-check-input" type="checkbox" name="addF" value="1" 
                            <?php 
                                if($rows['add_faculty'] == 1){
                                    echo 'checked';
                                }
                            
                             ?>
                            >
                            <label class="form-check-label" >
                                Add Faculty
                            </label>
                        </div>
                        </td>

                        <td>
                        <div class="form-check mt-2">                       
                            <input class="form-check-input" type="checkbox" name="addC" value="1"
                            <?php 
                                if($rows['course'] == 1){
                                    echo 'checked';
                                }
                            
                             ?>
                            >
                            <label class="form-check-label" >
                               Course
                            </label>
                        </div>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                        
                        <div class="form-check mt-2">
                        
                            <input class="form-check-input" type="checkbox" name="admissionReq" value="1"
                            <?php 
                                if($rows['addmission_req'] == 1){
                                    echo 'checked';
                                }
                            
                             ?>
                            >
                            <label class="form-check-label" >
                                Admission Request
                            </label>
                        </div>
                        </td>

                        <td>
                        <div class="form-check mt-2">                       
                            <input class="form-check-input" type="checkbox" name="teacherReq" value="1"
                            <?php 
                                if($rows['teacher_req'] == 1){
                                    echo 'checked';
                                }
                            
                             ?>
                            >
                            <label class="form-check-label" >
                              Teacher Request
                            </label>
                        </div>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                        
                        <div class="form-check mt-2">
                        
                            <input class="form-check-input" type="checkbox" name="stdReq" value="1"
                            <?php 
                                if($rows['student_req'] == 1){
                                    echo 'checked';
                                }
                            
                             ?>
                            >
                            <label class="form-check-label" >
                                Student Request
                            </label>
                        </div>
                        </td>

                        <td>
                        <div class="form-check mt-2">                       
                            <input class="form-check-input" type="checkbox" name="payment" value="1"
                            <?php 
                                if($rows['payment'] == 1){
                                    echo 'checked';
                                }
                            
                             ?>
                            >
                            <label class="form-check-label" >
                               Payment
                            </label>
                        </div>
                        </td>
                        
                    </tr>

                    <tr>
                        <td>
                        
                        <div class="form-check mt-2">
                        
                            <input class="form-check-input" type="checkbox" name="setting" value="1"
                            <?php 
                                if($rows['setting'] == 1){
                                    echo 'checked';
                                }
                            
                             ?>
                            >
                            <label class="form-check-label" >
                                Setting
                            </label>
                        </div>
                        </td>

                        <td>
                        <div class="form-check mt-2">                       
                            <input class="form-check-input" type="checkbox" name="dashboard" value="1"
                            <?php 
                                if($rows['dashboard'] == 1){
                                    echo 'checked';
                                }
                            
                             ?>
                            >
                            <label class="form-check-label" >
                               Dashboard
                            </label>
                        </div>
                        </td>
                        

                       

                        <tr>
                        <td>
                            <div class="form-check mt-2">                       
                                <input class="form-check-input" type="checkbox" name="inbox" value="1"
                                <?php 
                                    if($rows['inbox'] == 1){
                                        echo 'checked';
                                    }
                                
                                ?>
                                >
                                <label class="form-check-label" >
                                inbox
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check mt-2">                       
                                <input class="form-check-input" type="checkbox" name="userm" value="1"
                                <?php 
                                    if($rows['user_management'] == 1){
                                        echo 'checked';
                                    }
                                
                                ?>
                                >
                                <label class="form-check-label" >
                                User Management
                                </label>
                            </div>
                        </td>
                        </tr>
                        <?php

}
?>
                    </tr>
                    
                </table>
                
               
                 
                <div class="modal-footer">
                  <button type="submit" class="btn" id="button-addon2" name="add">Edit</button>
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





  





<?php 


include 'footer.php';





//edit
if(isset($_POST['add'])){
 
    $role_name=$_POST['rname'];
  $addTeacher=isset($_POST['addT']);
  $addStudent=isset($_POST['addS']);
  $addFaculty=isset($_POST['addF']);
  $course=isset($_POST['addC']);
  $admissionReq=isset($_POST['admissionReq']);
  $teacherReq=isset($_POST['teacherReq']);
  $stdReq=isset($_POST['stdReq']);
  $payment=isset($_POST['payment']);
  $dashboard=isset($_POST['dashboard']);
  $setting=isset($_POST['setting']);
  $inbox=isset($_POST['inbox']);
  $userm=isset($_POST['userm']);
    $id=$_GET['ids'];

    $result=mysqli_query($conn,"UPDATE `roles` SET `role_name`='$role_name',`add_teacher`='$addTeacher',`add_student`='$addStudent',`add_faculty`='$addFaculty',`course`='$course',`addmission_req`='$admissionReq',`teacher_req`='$teacherReq',`student_req`='$stdReq',`payment`='$payment',`setting`='$setting',`dashboard`='$dashboard',`inbox`='$inbox',`user_management`='$userm' WHERE id='$id'");
   
    if($result){
      ?>
      <script>
          window.location = "<?php echo $app_url.'admin/roles.php' ?>";
      </script>
    
      <?php
 
  }
  
}

?>