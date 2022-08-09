<?php 
session_start();
include '../connection.php';
if(!isset($_SESSION['teacher'])){
    ?>
    <script>
    window.location="<?php echo $app_url .'login.php' ?>";
    </script>
    <?php
     }
   define("TITLE","Quiz");
   define("PAGE","Quiz");
   
   include 'header.php';
   
   ?>
<div class="body-section">
   <div class="container">
      <div class="card">
         <div class="card-header border-0">
            <h3 class="card-title display-6">Quiz</h3>
            <hr>
            <div class="container mt-1">
               <!-- Button trigger modal -->
               <div class="row">
                  <div class="col-lg-9">
                     <div class="input-group ">
                        
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <button type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#myModalFiles" class="btn btn-lg float-right mb-3" >
                     <i class="fas fa-plus"></i>  Add Quiz
                     </button>
                     <!--Modal-->
                   
                  </div>
               </div>
               <div class="card-body table-responsive p-0">
                  <div class="row">
                     <div class="col-lg-12">
                        <table id="example" class="table table-striped table-responsive mx-10">
                           <thead>
                              <tr>
                                 <th>ID</th>
                                 <th>Name</th>
                                 <th>Description</th>
                                 <th>Files</th>
                                 <th>Status</th>
                                 <!-- <th>Operations</th> -->
                              </tr>
                           </thead>
                           <tbody>
                           
                           <?php
                                         $idt=$_GET['idtq'];
                                        $quiz_sel=mysqli_query($conn,"select * from teacher_xtra_quiz where stu_id='$idt'");
                                                  while($rowq=mysqli_fetch_assoc($quiz_sel)){
                                  ?>
                                <tr>
                                 
                                 
                                    <td><?php echo $rowq['id']; ?></td>
                                    <td><?php echo $rowq['name']; ?></td>
                                    <td><?php echo $rowq['description'];?> </td>
                                    <td><a href="<?php echo $rowq['stu_file']; ?>" download class="btn btn-success">Download File </a>
                                    </td>
                                    <td>
                                        <?php echo $rowq['status']; ?>
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

<!--par Modal-->
<div class="modal fade" id="myModalFiles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Files</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         
         <div class="modal-body">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                    
                     <form method="POST" enctype="multipart/form-data">
                  
                                
                     
                     
                        <div class="form-group" >
                        
                           <div class="form-group">
                               <?php
                                      $id=$_GET['idq'];
                                    
                                      $sql=mysqli_query($conn,"select * from admin_teacher where id='$id'");
                                      $row=mysqli_fetch_assoc($sql);
                                      $course_id=$row['name'];
                
                                     ?>

                                     <label class="fw-bold">Course:</label>
                                     <select name="course" class="form-control">
                                     <?php
                                       
                              
                                            $course=mysqli_query($conn,"select * from admin_teacher_course where teacher_name='$course_id'");
                                            while($course_row=mysqli_fetch_assoc($course)){
                                                    $course_idd=$course_row['course'];
                                           
                                                $get_course=mysqli_query($conn,"select * from admin_course where id='$course_idd'");
                                                $fetch_data=mysqli_fetch_assoc($get_course);
                                                $fcourse=$fetch_data['name'];
                                                $idcourse=$fetch_data['id'];
                                            ?>
                                                <option value="<?php echo $idcourse; ?>"><?php echo $fcourse; ?></option>
                                            <?php
                                     
                                            }
                               ?>
                                      </select>

                              <label class="fw-bold">Name:</label>
                              <input type="text" name="name" class="form-control">
                              <label class="fw-bold">Description:</label>
                              <input type="text" name="decri" class="form-control">
                              <label class="fw-bold">File:</label>
                              <input type="file" name="picture" class="form-control">

                              
                              

                             
                           </div>
                           <div class="modal-footer bg-light">
                           <button type="submit" class="btn btn-primary" name="addFile">Add </button> 
                           </div>
                          
                     </form>
                       
                  
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--delete-->
  
</div>

<!-- Del Quiz data-->
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
                       url: "teacher_xtra_quiz_del.php",
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


<?php 
   include 'footer.php';
   
  
     
   if(isset($_POST['addFile'])){
    $name=$_POST['name'];
    $description=$_POST['decri'];
   
    $file=($_FILES['picture']);
    //print_r($file);
    $file_name=$file['name'];
    $file_path=$file['tmp_name'];
    $file_error=$file['error'];
    if($file_error == 0){
     $destinaton='TeacherQuizFile/'.$file_name;
     move_uploaded_file($file_path,$destinaton);
     $idt=$_GET['idtq'];
     $courseStudent=$_POST['course'];
     $quiz_id=$_GET['quiz'];
     $file_id=$_GET['fid'];
     $idteacher=$_GET['idq'];
    $sql=mysqli_query($conn,"INSERT INTO `teacher_xtra_quiz`(`x_id`,`quiz_id`,`stu_id`,`teacher_id`, `name`, `description`, `stu_file`, `course`) VALUES ('$file_id','$quiz_id','$idt','$idteacher','$name','$description','$destinaton','$courseStudent')");
    
    if($sql){
        $idtea=$_GET['id'];
     mysqli_query($conn,"INSERT INTO `admin_teacher_request`(`x_id`,`quiz_id`,`name`, `description`, `file`, `course_name`, `stu_id`, `teacher_id`, `activity`) VALUES ('$file_id','$quiz_id','$name','$description','$destinaton','$courseStudent','$idt','$idtea','quiz')");
      
     		$to_email="check9404@gmail.com";
      		$t_email =$_SESSION['teacher'];
            $subject="Lab Task";
            $body="Hi Admin, $t_email added a quiz task ..Check and response the request";
            $header="From: $t_email";

            if (mail($to_email, $subject, $body, $header)) {
            	echo "<script> alert('Request Successfully Send To Admin...') </script>";
            } 
      ?>
         <script>
           window.location="<?php echo $app_url .'teacher/quiz.php?id='."$idteacher" ?>";
         </script>
      <?php
    }
  }
 }
    

   
   ?>