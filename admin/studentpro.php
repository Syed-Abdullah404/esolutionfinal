<?php

include '../connection.php';

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
              
      
                  <button type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn float-right mb-3" >
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
                
                    <label class="fw-bold">Cnic</label>
                    <input type="text" class="form-control " placeholder="CNIC" name="cnic">
                    <label class="fw-bold ">Course:</label><br>
                    <select class="songs form-select" name="songs[]" multiple style="width:465px;">
                     <?php
                        include '../connection.php';
                        $sqli="select * from admin_course";
                                                
                        $sql=mysqli_query($conn,$sqli);
                        while($row=mysqli_fetch_assoc($sql)) {
                            ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                            <?php
                        }
                     
                    ?>
                </select>
                        <br>
   
                     <label class="fw-bold">Teacher:</label><br>
                     <select class="songs form-select" name="teacher[]" multiple style="width:465px;">
                     <?php
                        include '../connection.php';
                        $sqli="select * from admin_teacher";
                                                
                        $sql=mysqli_query($conn,$sqli);
                        while($row=mysqli_fetch_assoc($sql)) {
                            
                            ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                            <?php
                        }
                     
                    ?>
                </select>
                   <br>
                     <label class="fw-bold ">Faculty.</label><br>
                     <select class="form-select" name="faculty">
                     <?php
                        include '../connection.php';
                        $sqli="select * from admin_fauclty";
                                                
                        $sql=mysqli_query($conn,$sqli);
                        while($row=mysqli_fetch_assoc($sql)) {
                            
                            ?>
                            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                            <?php
                        }
                     
                    ?>
                </select>
                    <label class="fw-bold ">Phone No.</label><br>
                    <input type="number" class="form-control mb-2" placeholder="+92305-------" name="mobile">
                    <label class="fw-bold">E-mail</label><br>
                    <input type="email" class="form-control mb-2" placeholder="E-mail" name="email">
                  <label class="fw-bold">Session</label><br>
                    <select name="session" class="form-control mb-2">
                      <option value="" >--Select--</option>
                      <option value="2021-22">2021-22</option>
                      <option value="2022-23">2022-23</option>
                      <option value="2023-24">2023-24</option>
                    </select>
                    <label class="fw-bold">Start Date</label><br>
                    <input type="date" class="form-control mb-2" placeholder="Start Date" name="sdate" >
                    <label class="fw-bold">End Date</label><br>
                    <input type="date" class="form-control mb-2" placeholder="End Date" name="edate">
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
                          <th>Teacher</th>
                          <th>Ph no.</th>
                          <th>E-mail</th>
                         
                          <th>Operations</th>                         
                     </tr>
                                            </thead>
                                            <tbody>
                                            <?php      
                                            include '../connection.php';                      
                              $select=mysqli_query($conn,"select * from admin_student");
                              while($row=mysqli_fetch_assoc($select)){
                                  $name=$row['name'];
                                ?>
                                  <tr>
                             <td><?php echo $row['id']; ?></td>
                             <td><?php echo $row['name']; ?></td>
                             <td> <img src="team/dp.jfif" alt="" style="width:150px;height:150px;"></td>
                             <td><?php echo $row['cnic']; ?></td>
                             <td><?php echo $row['faculty']; ?></td>
                               
                                   
                              
                             <td>
                             <?php
                                   include '../connection.php';
                                   $select_course=mysqli_query($conn,"select * from admin_student_course where student_name='$name'");
                                while($rows=mysqli_fetch_assoc($select_course)){   
                                     $course=$rows['course'];
                                     $course_get=mysqli_query($conn,"select * from admin_course where id='$course'");
                                     $rowc=mysqli_fetch_assoc($course_get);
                                     $course_name=$rowc['name'];

                                     ?>
                                       <?php echo $course_name; ?> 
                                      <br>
                                     
                                     <?php
                                
                        }?>     
                            </td>

                            <td>
                             <?php
                                   include '../connection.php';
                                   $select_teacher=mysqli_query($conn,"select * from admin_student_teacher where student_name='$name'");
                                while($rowt=mysqli_fetch_assoc($select_teacher)){   
                                     $teacher=$rowt['teacher'];
                                     $teacher_get=mysqli_query($conn,"select * from admin_teacher where id='$teacher'");
                                     $rowtc=mysqli_fetch_assoc($teacher_get);
                                     $teacher_name=$rowtc['name'];

                                     ?>
                                       <?php echo $teacher_name; ?> 
                                      <br>
                                     
                                     <?php
                                
                        }?>     
                            </td>

                         
                             <td><?php echo $row['mobile']; ?></td>
                             <td><?php echo $row['email']; ?></td>
                                 <td>
                                           <div class="action">
                                                            <button class="btn btnaction btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                              Action
                                                            </button>
                                                            <ul class="dropdown-menu p-0">
                                                            <a  target="_blank" title="Contact Us On WhatsApp" href="https://web.whatsapp.com/send?phone=<?php echo $row['mobile']; ?>&amp;text=Hi, I would like to get more information.." >  <li class="dropdown-item"> <i class="fab fa-whatsapp"></i>whatsapp</li></a>
                                                            <a href="admin_student_edit.php?ids=<?php echo $row['id']; ?>">
                                                            <li class="dropdown-item">   <i class="far fa-edit"></i> Edit </li></a>

                                                            <a href="view2.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color: black;">
                                                              <li class="dropdown-item"><i class="far fa-eye"></i>   View </li></a>

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
      <input type="hidden" name="update_id" id="update_id" />
                <div class="form-group">
                    <label class="fw-bold">Name</label>
                    <input type="text" class="form-control mb-2" placeholder="Name" name="name" id="name">
                    <label class="fw-bold">Cnic</label>
                    <input type="text" class="form-control " placeholder="CNIC" name="cnic" id="cnic">
                    <label class="fw-bold ">Course:</label><br>
                    <select class="songs form-select" name="songs[]" multiple style="width:465px;" id="course">
                     <?php
                        include '../connection.php';
                        $sqli="select * from admin_course";
                                                
                        $sql=mysqli_query($conn,$sqli);
                        while($row=mysqli_fetch_assoc($sql)) {
                            
                            ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                            <?php
                        }
                     
                    ?>
                </select>
                        <br>
   
                     <label class="fw-bold">Teacher:</label><br>
                     <select class="songs form-select" name="teacher[]" multiple style="width:465px;" id="teacher">
                     <?php
                        include '../connection.php';
                        $sqli="select * from admin_teacher";
                                                
                        $sql=mysqli_query($conn,$sqli);
                        while($row=mysqli_fetch_assoc($sql)) {
                            
                            ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                            <?php
                        }
                     
                    ?>
                </select>
                  
                     <label class="fw-bold ">Faculty.</label><br>
                     <select class="form-select" name="faculty" id="faculty">
                     <?php
                        include '../connection.php';
                        $sqli="select * from admin_fauclty";
                                                
                        $sql=mysqli_query($conn,$sqli);
                        while($row=mysqli_fetch_assoc($sql)) {
                            
                            ?>
                            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                            <?php
                        }
                     
                    ?>
                </select>
                    <label class="fw-bold ">Phone No.</label><br>
                    <input type="number" class="form-control mb-2" placeholder="+(country-code)-------" name="mobile" id="mobile">
                    <label class="fw-bold">E-mail</label><br>
                    <input type="Email" class="form-control mb-2" placeholder="E-mail" name="email" id="email">
                     <label class="fw-bold">Password:</label><br>
                    <input type="text" class="form-control mb-2" placeholder="Enter Password" name="password" id="password">
                    <label class="fw-bold">Confirm Password:</label><br>
                    <input type="text" class="form-control mb-2" placeholder="Confirm Password" name="cpassword" id="cpassword">
                    <label class="fw-bold">Current Address</label><textarea class="form-control" name="address" id="address"></textarea>
                </div>
                <div class="modal-footer bg-light">
                    <button type="submit" class="btn btn-primary" name="edit">Edit</button> 
                </div>
            </form>
        </div>
        
      </div>
     
    </div>
  </div>
</div>

<!-- //delete -->

<script>
   
    $(document).ready(function () {
        $(".delete_btn_ajax").click(function (e) { 
            e.preventDefault();
            var deleteid=$(this).closest('tr').find('.delete_id_value').val();
           // alert(deleteid);
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                   $.ajax({
                       type: "POST",
                       url: "delStudent.php",
                       data: {
                           "delete_btn_set":1,
                           "deleteid":deleteid,
                       },                      
                       success: function (response) {
                        swal("Deleted!", "Your Data is Deleted", "success", {
                            button: "Ok!",
                            }).then((result)=>{
                              location.reload();
                            });
                            
                       }
                   });
                } 
                });
            
        });
    });
</script>
      </div>
     
    </div>
  </div>
</div>


        
      </div>
     
    </div>
  </div>
</div>
    




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


</body>
</html>

<?php 


if(isset($_POST['add'])){
    $name=$_POST['name'];
   
    $cnic=$_POST['cnic'];
    $faculty=$_POST['faculty'];
    $mobile=$_POST['mobile'];
    

    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $address=$_POST['address'];
  	$session=$_POST['session'];
  	$sdate=$_POST['sdate'];
  	$edate=$_POST['edate'];
 
    
    $check=mysqli_query($conn,"select * from admin_student where email='$email'");
    $count=mysqli_num_rows($check);
    if($count == 0){ 
      
       $sql=mysqli_query($conn,"INSERT INTO `admin_student`(`name`, `cnic`, `faculty`, `mobile`, `email`, `password`, `cpassword`, `address`,`session`,`start_date`,`end_date`,`status`) VALUES ('$name','$cnic','$faculty','$mobile','$email','$password','$cpassword','$address','$session','$sdate','$edate','approve')");
       if($sql){
        $course=$_POST['songs'];
        foreach($course as $cour){
            $student=mysqli_query($conn,"INSERT INTO `admin_student_course`(`student_name`, `course`) VALUES ('$name','$cour') ");
        }

        $teacher=$_POST['teacher'];
        foreach($teacher as $teach){
            $student=mysqli_query($conn,"INSERT INTO `admin_student_teacher`(`student_name`, `teacher`) VALUES ('$name','$teach')");
        }
      
        ?>
        <script>
          window.location = "<?php echo $app_url.'admin/studentpro.php' ?>";
        </script>
    <?php
       }


    }else{
        echo "<script>alert('Email Already Exist  !!') </script>";
    }
  
}
?>
