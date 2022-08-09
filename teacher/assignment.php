<?php 
session_start();
 include '../connection.php';
 if(!isset($_SESSION['id'])){
     ?>
     <script>
     window.location="<?php echo $app_url .'login.php' ?>";
     </script>
     <?php
      }
   define("TITLE","Assignment");
   define("PAGE","Assignment");
   
   include 'header.php';
  
   
   ?>
<div class="body-section">
   <div class="container">
      <div class="card">
         <div class="card-header border-0">
            <h3 class="card-title display-6">Assignment</h3>
            <hr>
            <div class="container mt-1">
               <!-- Button trigger modal -->
               <div class="row mb-4">
                  <div class="col-lg-9">
                     <div class="input-group ">
                        <div class="form-outline">
                           <input type="search" id="form1" class="form-control" placeholder="Search">
                        </div>
                        <button type="button" class="btn" id="button-addon2" >
                        <i class="fas fa-search"></i>
                        </button>
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <select name="" id="" class="form-select" >
                        <option value="" selected disabled>Filter By</option>
                        <option value="">In proccess</option>
                        <option value="">Completed</option>
                        <option value="">Pending</option>
                     </select>
                  </div>
               </div>
               <div class="card-body table-responsive p-0">
                  <div class="row">
                     <div class="col-lg-12">
                        <table id="example" class="table table-striped table-responsive mx-10">
                           <thead>
                              <tr>
                                 <th>ID</th>
                                 <th>Assignment</th>
                                 <th>Name</th>
                                 <th>Description</th>
                                 <th>Start-Date</th>
                                 <th>End-Date</th>
                                 <th>Start-Time</th>
                                 <th>End-Time</th>
                           
                                 <th>View Files</th>
                                 <th>Add Files</th>
                              </tr>
                           </thead>
                           <tbody>
                             <?php
                              $t_id=$_SESSION['id'];
                                $sql=mysqli_query($conn,"select * from teacher_assignment where teacher_id='$id'");
                                while($rows=mysqli_fetch_assoc($sql)){
                                   $quiz=$rows['ass_id'];
                                   $qf_id=$rows['x_id'];
                                  ?>
                                        <tr>
                                 <td><?php echo $rows['stu_id']; ?></td>
                                 <td><?php echo $rows['ass_id']; ?></td>
                                 <td><?php echo $rows['name']; ?></td>
                                 <td style="width:250px;"><?php echo $rows['description']; ?></td>
                                 <td><?php echo $rows['start_date']; ?></td>
                                 <td><?php echo $rows['end_date']; ?></td>
                                 <td><?php echo $rows['start_time']; ?></td>
                                 <td><?php echo $rows['end_time']; ?></td>
                              
                               
                                 
                                 <td><a href="../student/<?php echo $rows['stu_file']; ?>" download class="btn btn-success btn-sm">  File </a></td>
                                 <td>
                                 <a href="teacher_xtra_assignment.php?idtass=<?php echo $rows['stu_id']; ?>&id=<?php echo $t_id;?>&assignment=<?php echo $quiz;?>&fid=<?php echo $qf_id;?>&idc=<?php echo $rows['id']; ?>" class="btn btn-success btn-sm editbtn">
                                              Add 
                                       </a>
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
<div class="modal fade" id="myModalViewFiles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Files</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <form method="POST" >
                        <div class="form-group">
                           <table class="table table-striped">
                              <thead>
                                 <th>Name</th>
                                 <th>Description</th>
                                 <th>Action</th>
                              </thead>
                              <tbody>
                                
                              </tbody>
                           </table>
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
</div>

</div>
<?php 
   include 'footer.php';
   
   ?>