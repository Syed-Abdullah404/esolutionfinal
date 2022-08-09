<?php 

include '../connection.php';

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
                                 <!-- <th>Operations</th> -->
                              </tr>
                           </thead>
                           <tbody>
                           
                         
                         
                                   <?php
                                        $idquiz=$_GET['idv'];
                                        $quiz_sel=mysqli_query($conn,"select * from teacher_quiz_response where quiz_id='$idquiz' ");
                                                  while($rowq=mysqli_fetch_assoc($quiz_sel)){
                                  ?>
                                <tr>
                                 
                                 
                                    <td><?php echo $rowq['id']; ?></td>
                                    <td><?php echo $rowq['name']; ?></td>
                                    <td><?php echo $rowq['description'];?> </td>
                                    <td><a href="<?php echo $rowq['stu_file']; ?>" download class="btn btn-success">Download File </a>
                                    </td>
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
                  
                                
                     
                     
                        <div class="form-group" >
                        
                           <div class="form-group">
                              <label class="fw-bold">Name:</label>
                              <input type="text" name="name" class="form-control">
                              <label class="fw-bold">Description:</label>
                              <input type="text" name="decri" class="form-control">
                              <label class="fw-bold">File:</label>
                              <input type="file" name="filequiz" class="form-control">
                             
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
                       url: "xtra_quiz_del.php",
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
      $name_quiz=$_POST['name'];
      $quiz_id=$_GET['idq'];
    
      $decri=$_POST['decri'];
      $file=($_FILES['filequiz']);
      //print_r($file);
      $file_name=$file['name'];
      $file_path=$file['tmp_name'];
      $file_error=$file['error'];
      if($file_error == 0){
       $destinaton='QuizFile/'.$file_name;
       move_uploaded_file($file_path,$destinaton);
       $id_head=$_GET['id'];
       $sqli=mysqli_query($conn,"INSERT INTO `student_xtra_quiz`(`stu_id`, `quiz_id`, `name`, `description`, `stu_file`) VALUES ('$id_head','$quiz_id','$name_quiz','$decri','$destinaton')");
       if($sqli){
     
        ?>
           <script>
             window.location="<?php echo $app_url .'student/xtra_quiz.php?idq='."$quiz_id" ?>";
           </script>
        <?php
      }
      }

    }

   
   ?>