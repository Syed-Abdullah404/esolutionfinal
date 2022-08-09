<?php 

include '../connection.php';

   define("TITLE","Project");
   define("PAGE","Project");
   
   include 'header.php';
   
   ?>
<div class="body-section">
   <div class="container">
      <div class="card">
         <div class="card-header border-0">
            <h3 class="card-title display-6">Project</h3>
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
                     <i class="fas fa-plus"></i>  Add Project
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
                                 <th>Start-Time</th>
                                 <th>End-Time</th>
                                 <th>Start-Date</th>
                                 <th>End-Date</th>
                                 <th>Files</th>
                                 
                                 <th>Status</th>
                              </tr>
                           </thead>
                           <tbody>
                           
                         
                         
                                   <?php
                                        $idquiz=$_GET['idp'];
                                        $quiz_sel=mysqli_query($conn,"select * from student_xtra_project where project_id='$idquiz'");
                                                  while($rowq=mysqli_fetch_assoc($quiz_sel)){
                                  ?>
                                <tr>
                                 
                                 
                                    <td><?php echo $rowq['id']; ?></td>
                                    <td><?php echo $rowq['name']; ?></td>
                                    <td><?php echo $rowq['description'];?> </td>
                                    <td><?php echo $rowq['start_time'];?> </td>
                                    <td><?php echo $rowq['end_time'];?> </td>
                                    <td><?php echo $rowq['start_date'];?> </td>
                                    <td><?php echo $rowq['end_date'];?> </td>
                                    <td><a href="<?php echo $rowq['stu_file']; ?>" download class="btn btn-success">Download File </a>
                                    </td>
                                    <td><?php echo $rowq['status']; ?></td>
                                    <!-- <td>
                                    <input type="hidden" class="delete_id_value" value="<?php echo $rowq['id']; ?>">
                                             <a href="javascript:void(0)" type="button" class="delete_btn_ajax btn btn-danger text-white"><i class="fas fa-trash"></i>Delete</a> 
                                            </td>  -->
                                   
                                    
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


<!-- //My Modal View File -->
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

<div class="form-group">
   <label class="fw-bold">Name:</label>
   <input type="text" class="form-control mb-2" placeholder=" Name" name="name">
   <label  class="form-label">Description:</label>
   <div>
      <textarea class="form-control" name="description"
         ></textarea>
      
      <label class="fw-bold">Start Time:</label>
      <input type="time" name="stime" class="form-control">
      <label class="fw-bold">End-Time:</label>
      <input type="time" name="etime" class="form-control">
      <label class="fw-bold">Start Date:</label>
      <input type="Date" name="sdate" class="form-control">
      <label class="fw-bold">End-Date:</label>
      <input type="Date" name="edate" class="form-control">
      <label class="fw-bold">File:</label>
      <input type="file" name="picture" class="form-control">

      <label class="fw-bold">Course:</label>
      <?php
         $id_head=$_GET['id'];
         $select_stu_name=mysqli_query($conn,"select * from admin_student where id='$id_head'");
         $rows_stu_name=mysqli_fetch_assoc($select_stu_name);
         $stu_name=$rows_stu_name['name'];

      ?>
      <select class="form-select" name="course" style="width:465px;">
      <?php
         $sel_course=mysqli_query($conn,"select * from admin_student_course where student_name='$stu_name'");
         while($row_course=mysqli_fetch_assoc($sel_course)){
            $course_id=$row_course['course'];
         
         $sqli="select * from admin_course where id='$course_id'";
                                 
         $sql=mysqli_query($conn,$sqli);
         while($row=mysqli_fetch_assoc($sql)) {
             
             ?>
      <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
      <?php
         }
      }
         ?>
   </select>
   </div>

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
                       url: "xtra_project_del.php",
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
      $quiz_id=$_GET['idp'];
    
      $decri=$_POST['description'];
      $stime=$_POST['stime'];
      $etime=$_POST['etime'];
      $sdate=$_POST['sdate'];
      $edate=$_POST['edate'];
      $course=$_POST['course'];
      $file=($_FILES['picture']);
      //print_r($file);
      $file_name=$file['name'];
      $file_path=$file['tmp_name'];
      $file_error=$file['error'];
      if($file_error == 0){
       $destinaton='ProjectFile/'.$file_name;
       move_uploaded_file($file_path,$destinaton);
       $id_head=$_GET['id'];
       $sqli=mysqli_query($conn,"INSERT INTO `student_xtra_project`( `stu_id`, `project_id`,`course`, `name`, `description`, `stu_file`, `start_time`, `end_time`, `start_date`, `end_date`) VALUES ('$id_head','$quiz_id','$course','$name','$decri','$destinaton','$stime','$etime','$sdate','$edate')");
       if($sqli){
     
        ?>
           <script>
             window.location="<?php echo $app_url .'student/xtra_p.php?idp='."$quiz_id" ?>";
           </script>
        <?php
      }
      }

    }

   
   ?>