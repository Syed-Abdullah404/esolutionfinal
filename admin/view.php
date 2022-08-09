<?php 
   define("TITLE","Products");
   define("PAGE","Products");
   
   include 'header.php';
   include '../connection.php';
    $teacher_id=$_GET['id'];
    $sql=mysqli_query($conn,"select * from admin_teacher where id='$teacher_id'");
    $row=mysqli_fetch_assoc($sql);
    $name=$row['name'];
    $email=$row['email'];
    $mobile=$row['mobile'];
    $address=$row['address'];
    
   ?>
<div class="body-section">
   <div class="container">
      <div class="card">
         <div class="card-header border-0">
            <h3 class="card-title">View</h3>
            <hr>
            <div class="container mt-1">
               <div class="card">
                  <div class="row m-3">
                     <div class="col-lg-7">
                        <h6 >Name:</h6>
                        <span class="ms-4  mt-3"><?php echo $name; ?></span>
                        <h6>E-mail: </h6>
                        <span class="ms-4  mt-3"><?php echo $email; ?></span>
                        <h6 >Contact: </h6>
                        <span class="ms-4  mt-3"><?php echo $mobile; ?></span>
                        
                     </div>
                     <div class="col-lg-5">
                        <h6 >Address: </h6>
                        <span class="ms-4  mt-3"><?php echo $address; ?></span>
                        <h6 >Courses: </h6>
                        <?php
                          $sql_course=mysqli_query($conn,"select * from admin_teacher_course where teacher_name='$name'");
                          while($course_row=mysqli_fetch_assoc($sql_course)){
                            $course_name=$course_row['course'];
                            $sql_cname=mysqli_query($conn,"select * from admin_course where id='$course_name'");
                            $row_sname=mysqli_fetch_assoc($sql_cname);
                            
                            ?>
                              <span class="ms-4  mt-3"><?php echo $row_sname['name']; ?></span>
                            <?php
                          }
                        ?>
                       
                       
                       
                     </div>
                  </div>
               </div>
               <div class="container mt-5">
                  <div class="row">
                     <div class="col-lg-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                           
                           <li class="nav-item" role="presentation">
                              <button class="nav-link fw-bold" style="color: #0B0452" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-store"></i> Assignment</button>
                           </li>
                          
                           <li class="nav-item" role="presentation">
                              <button class="nav-link fw-bold" style="color: #0B0452" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-hourglass-half"></i> Quiz</button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link fw-bold" style="color: #0B0452" id="lab-tab" data-bs-toggle="tab" data-bs-target="#lab" type="button" role="tab" aria-controls="lab" aria-selected="false"><i class="fas fa-hourglass-half"></i> Lab</button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link fw-bold" style="color: #0B0452" id="project-tab" data-bs-toggle="tab" data-bs-target="#project" type="button" role="tab" aria-controls="project" aria-selected="false"><i class="fas fa-hourglass-half"></i> Project</button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link active fw-bold"  style="color: #0B0452" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-scroll"></i>  Mids</button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link fw-bold" style="color: #0B0452" id="doc-tab" data-bs-toggle="tab" data-bs-target="#doc" type="button" role="tab" aria-controls="contact" aria-selected="false"> <i class="fas fa-paperclip"></i>Finals</button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link fw-bold" style="color: #0B0452" id="pay-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-money-bill-alt"></i> Payment</button>
                           </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                           <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                              
                              <div class="container">
                                 <div class="row mt-5">
                                    <div class="col-lg-12">
                                       <table class="example" class="table table-striped table-bordered  mx-10">
                                          <thead>
                                             <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Starting Date</th>
                                                <th>Starting Time</th>
                                                <th>Ending Date</th>
                                                <th>Ending Time </th> 
                                             </tr>
                                          </thead>
                                          <tbody>
                                          <?php
                                            $id=$_GET['id'];
                                              $sql_mid=mysqli_query($conn,"select * from teacher_mids where teacher_id='$id'");
                                              while($row_mid=mysqli_fetch_assoc($sql_mid)){
                                                ?>
                                            <tr>
                                                <td><?php echo $row_mid['id']; ?></td>
                                                <td><?php echo $row_mid['name']; ?></td>
                                                <td><?php echo $row_mid['description']; ?></td>
                                                <td><?php echo $row_mid['start_date']; ?></td>
                                                <td><?php echo $row_mid['start_time']; ?></td>
                                                <td><?php echo $row_mid['end_date']; ?></td>
                                                <td><?php echo $row_mid['end_time']; ?></td>                      
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
                           <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            
                              <div class="container">
                                 <div class="row mt-5">
                                    <div class="col-lg-12">
                                       <table class="example" class="table table-striped table-bordered  mx-10">
                                          <thead>
                                             <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Starting Date</th>
                                                <th>Starting Time</th>
                                                <th>Ending Date</th>
                                                <th>Ending Time </th>                                           
                                             </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                            $id=$_GET['id'];
                                              $sql_ass=mysqli_query($conn,"select * from teacher_assignment where id='$id'");
                                              while($row_ass=mysqli_fetch_assoc($sql_ass)){
                                                ?>
                                            <tr>
                                                <td><?php echo $row_ass['id']; ?></td>
                                                <td><?php echo $row_ass['name']; ?></td>
                                                <td><?php echo $row_ass['description']; ?></td>
                                                <td><?php echo $row_ass['start_date']; ?></td>
                                                <td><?php echo $row_ass['start_time']; ?></td>
                                                <td><?php echo $row_ass['end_date']; ?></td>
                                                <td><?php echo $row_ass['end_time']; ?></td>                      
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
                          
                           <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                             
                              <div class="container">
                                 <div class="row mt-5">
                                    <div class="col-lg-12">
                                       <table class="example" class="table table-striped table-bordered  mx-10">
                                          <thead>
                                             <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th> Description</th>
                                                <th>Starting Date</th>
                                                <th>Starting Time</th>
                                                <th>Ending Date</th>
                                                <th>Ending Time </th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                          <?php
                                            $id=$_GET['id'];
                                              $sql_quiz=mysqli_query($conn,"select * from teacher_quiz where teacher_id='$id'");
                                              while($row_quiz=mysqli_fetch_assoc($sql_quiz)){
                                                ?>
                                            <tr>
                                                <td><?php echo $row_quiz['id']; ?></td>
                                                <td><?php echo $row_quiz['name']; ?></td>
                                                <td><?php echo $row_quiz['description']; ?></td>
                                                <td><?php echo $row_quiz['start_date']; ?></td>
                                                <td><?php echo $row_quiz['start_time']; ?></td>
                                                <td><?php echo $row_quiz['end_date']; ?></td>
                                                <td><?php echo $row_quiz['end_time']; ?></td>                      
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
                           <div class="tab-pane fade" id="doc" role="tabpanel" aria-labelledby="doc-tab">
                             
                              <div class="container">
                                 <div class="row mt-5">
                                    <div class="col-lg-12">
                                       <table class="example" class="table table-striped table-bordered  mx-10">
                                          <thead>
                                             <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th> Description</th>
                                                <th>Starting Date</th>
                                                <th>Starting Time</th>
                                                <th>Ending Date</th>
                                                <th>Ending Time </th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                            $id=$_GET['id'];
                                              $sql_final=mysqli_query($conn,"select * from teacher_finals where teacher_id='$id'");
                                              while($row_final=mysqli_fetch_assoc($sql_final)){
                                                ?>
                                            <tr>
                                                <td><?php echo $row_final['id']; ?></td>
                                                <td><?php echo $row_final['name']; ?></td>
                                                <td><?php echo $row_final['description']; ?></td>
                                                <td><?php echo $row_final['start_date']; ?></td>
                                                <td><?php echo $row_final['start_time']; ?></td>
                                                <td><?php echo $row_final['end_date']; ?></td>
                                                <td><?php echo $row_final['end_time']; ?></td>                      
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
                           <div class="tab-pane fade" id="lab" role="tabpanel" aria-labelledby="lab-tab">
                             
                              <div class="container">
                                 <div class="row mt-5">
                                    <div class="col-lg-12">
                                       <table class="example" class="table table-striped table-bordered  mx-10">
                                          <thead>
                                             <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th> Description</th>
                                                <th>Starting Date</th>
                                                <th>Starting Time</th>
                                                <th>Ending Date</th>
                                                <th>Ending Time </th>
                                           
                                             </tr>
                                          </thead>
                                          <tbody>
                                          <?php
                                            $id=$_GET['id'];
                                              $sql_lab=mysqli_query($conn,"select * from teacher_lab where teacher_id='$id'");
                                              while($row_lab=mysqli_fetch_assoc($sql_lab)){
                                                ?>
                                            <tr>
                                                <td><?php echo $row_lab['id']; ?></td>
                                                <td><?php echo $row_lab['name']; ?></td>
                                                <td><?php echo $row_lab['description']; ?></td>
                                                <td><?php echo $row_lab['start_date']; ?></td>
                                                <td><?php echo $row_lab['start_time']; ?></td>
                                                <td><?php echo $row_lab['end_date']; ?></td>
                                                <td><?php echo $row_lab['end_time']; ?></td>                      
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
                           <div class="tab-pane fade" id="project" role="tabpanel" aria-labelledby="project-tab">
                             
                              <div class="container">
                                 <div class="row mt-5">
                                    <div class="col-lg-12">
                                       <table class="example" class="table table-striped table-bordered  mx-10">
                                          <thead>
                                             <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th> Description</th>
                                                <th>Starting Date</th>
                                                <th>Starting Time</th>
                                                <th>Ending Date</th>
                                                <th>Ending Time </th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                          <?php
                                            $id=$_GET['id'];
                                              $sql_project=mysqli_query($conn,"select * from teacher_project where teacher_id='$id'");
                                              while($row_project=mysqli_fetch_assoc($sql_project)){
                                                ?>
                                            <tr>
                                                <td><?php echo $row_project['id']; ?></td>
                                                <td><?php echo $row_project['name']; ?></td>
                                                <td><?php echo $row_project['description']; ?></td>
                                                <td><?php echo $row_project['start_date']; ?></td>
                                                <td><?php echo $row_project['start_time']; ?></td>
                                                <td><?php echo $row_project['end_date']; ?></td>
                                                <td><?php echo $row_project['end_time']; ?></td>                      
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
                           <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                              
                              <div class="container">
                                 <div class="row mt-5">
                                    <div class="col-lg-12">
                                       <table class="example" class="table table-striped  mx-10">
                                          <thead>
                                             <tr>
                                                <th>ID</th>
                                                <th>Total Amount</th>
                                                <th>Remaining</th>
                                                <th>Advance</th>
                                                
                                             </tr>
                                          </thead>
                                          <tbody>
                                          <?php
                                            $id=$_GET['id'];
                                            $sqlt=mysqli_query($conn,"select * from admin_teacher where id='$id'");
                                            $rowt=mysqli_fetch_assoc($sqlt);
                                            $tname=$rowt['name'];

                                              $sql_project=mysqli_query($conn,"select * from teacher_payment where name='$tname'");
                                              while($row_project=mysqli_fetch_assoc($sql_project)){
                                                ?>
                                            <tr>
                                                <td><?php echo $row_project['id']; ?></td>
                                                <td><?php echo $row_project['total_amount']; ?></td>
                                                <td><?php echo $row_project['advance']; ?></td>
                                                <td><?php echo $row_project['remaining']; ?></td>
                                                                   
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
<?php 
   include 'footer.php';
   
   ?>