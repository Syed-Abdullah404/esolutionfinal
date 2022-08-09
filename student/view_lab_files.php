<?php 

include '../connection.php';

   define("TITLE","Lab Task Response");
   define("PAGE","Lab Task Response");
   
   include 'header.php';
   
   ?>
<div class="body-section">
   <div class="container">
      <div class="card">
         <div class="card-header border-0">
            <h3 class="card-title display-6">Lab Task Response</h3>
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
                                        $quiz_sel=mysqli_query($conn,"select * from teacher_lab_response where lab_id='$idquiz' ");
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




<?php 
   include 'footer.php';
   
  
   ?>