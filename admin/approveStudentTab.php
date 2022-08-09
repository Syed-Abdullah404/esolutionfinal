<?php 

include '../connection.php';

   define("TITLE","Student Approval Request");
   define("PAGE","Student Approval Request");
   
   
   include 'header.php';
   
   ?>
<div class="body-section">
   <div class="container ">
      <div class="card ">
         <div class="card-header border-0">
            <h3 class="card-title display-6">Student Approval Request</h3>
            <hr>
            <div class="container mt-1">
               <div class="row">
                  <div class="col-lg-9 mb-4">
                     <div class="input-group ">
                     </div>
                  </div>
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                      
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Finals</button>
                        </li>
                       
                   </ul>
                <div class="tab-content" id="myTabContent">
                   
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="card-body table-responsive p-0">
                  <div class="row">
                     <div class="col-lg-12">
                        <table id="example" class="table table-striped  mx-10">
                           <thead>
                              <tr>
                               
                                 <th>Courses</th>
                                 <th>Student Name</th>                                
                                 <th>Faculty</th>
                                 <th>Session</th>
                                 <th>Course Start Date</th>
                                 <th>Course End Date</th>                           
                                 <th>Chat</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 $query=mysqli_query($conn,"select * from admin_student where status='pending'");
                                    if($query){
                                 while($row=mysqli_fetch_assoc($query)){
                                     $name=$row['name'];
                                     $session=$row['session'];
                                     $sdate=$row['start_date'];
                                     $edate=$row['end_date'];
                                     $ses=$row['session'];
                                     $faculty=$row['faculty'];
                                     $mobile=$row['mobile'];
                                     
                                        
                                         $sel_name=mysqli_query($conn,"select name from admin_student where name='$name'");
                                         $row_sel=mysqli_fetch_assoc($sel_name);
                                         $name=$row_sel['name'];
                                         
                                         $sel_student=mysqli_query($conn,"select course from admin_student_course where student_name='$name'");
                                         $stu_arr=[];
                                         foreach($sel_student as $student){
                                              $stu_arr[]=$student['course'];
                                             //echo $student['course'];
                                         }
                                     }
                                 ?>
                                 <tr>
                                     <td>
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
                                     
                                            </td>
                                   
                              
                                 <td><?php echo $name;?></td>
                                 
                                 <td><?php echo $faculty;?></td>
                                 <td><?php echo $ses; ?></td>
                                 <td><?php echo $sdate; ?></td>
                                 <td><?php echo $edate;?></td>
                                 <td>
                                 <a  target="_blank" title="Contact Us On WhatsApp" href="https://web.whatsapp.com/send?phone=<?php echo $mobile; ?>&amp;text=Hi,Chat with esolutionprovider.." >  <li class="dropdown-item"> <i class="fab fa-whatsapp"></i>whatsapp</li></a>
                                 </td>
                                 
                                 
                              
                                 
                              </tr>
                              <?php
                               
                              }else{
                                 ?>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
</div>
</div>
</div>
            <!-- //Edit -->
            <div class="modal fade" id="myModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Approve Final Exam</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form method="POST" enctype="multipart/form-data">
                     <input type="hidden" name="update_id" id="update_id" />
                     <div class="form-group">
                        <label class="fw-bold"> Id:</label>
                        <input type="text" class="form-control mb-2" 
                           name="id" id="id" readonly>
                           <label class="fw-bold">Finals Id:</label>
                        <input type="text" class="form-control mb-2" 
                           name="qtid" id="qtid" readonly>
                        <label class="fw-bold">Student Id:</label>
                        <input type="text" class="form-control mb-2" 
                           name="stid" id="stid" readonly>
                        <label class="fw-bold">Name:</label>
                        <input type="text" class="form-control mb-2" 
                           name="name" id="name">
                        <label class="fw-bold">Description:</label>
                        <input type="text" class="form-control mb-2" name="description" id="description">
                        <label class="fw-bold">File:</label>
                        <input type="text" class="form-control mb-2" name="file" id="file">
                        <label class="fw-bold">Course:</label>
                        <input type="text" class="form-control mb-2" name="course" id="course">
                     
                        <label class="form-label">Assign Teacher:</label>
                        <?php
                           $sel_tname=mysqli_query($conn,"select name from admin_student where id='$st_id'");
                           $row_selt=mysqli_fetch_assoc($sel_tname);
                           $namet=$row_selt['name'];
                           
                           $sel_teacher=mysqli_query($conn,"select teacher from admin_student_teacher where student_name='$namet'");
                           $tech_arr=[];
                           foreach($sel_teacher as $teacher){
                                $tech_arr[]=$teacher['teacher'];
                               //echo $student['course'];
                           }
                           
                           ?>
                        <select class="form-select" name="teacher" style="width:470px;">
                           <?php
                              $query_teacher=mysqli_query($conn,"select * from admin_teacher");
                              if(mysqli_num_rows($query_teacher) > 0){
                                  foreach($query_teacher as $rowtech)
                                  {
                                      ?>
                           <option value="<?php echo $rowtech['id']; ?>"
                              <?php echo in_array($rowtech['id'],$tech_arr) ? 'selected' : '' ?>          
                              >                           
                              <?php echo $rowtech['name']; ?>
                           </option>
                           <?php
                              }
                              }
                              
                              ?>
                        </select>
                        <label class="fw-bold">Start Time:</label>
                        <input type="time" name="stime" class="form-control" id="stime">
                        <label class="fw-bold">End-Time:</label>
                        <input type="time" name="etime" class="form-control" id="etime">
                        <label class="fw-bold">Start Date:</label>
                        <input type="Date" name="sdate" class="form-control" id="sdate">
                        <label class="fw-bold">End-Date:</label>
                        <input type="Date" name="edate" class="form-control" id="edate">
                     </div>
               </div>
               <div class="modal-footer bg-light">
               <input type="submit" id="btn3" class="form-control" name="save" value="Approve">
               </div>
               </form>
            </div>
         </div>
      </div>
      <!-- //Reject -->
      <div class="modal fade" id="myModalReject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Reject</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form method="POST" enctype="multipart/form-data">
                     <input type="hidden" name="update_id" id="update_id" />
                     <h1 class="text-danger">Are You Sure To Reject It</h1>
                     <div class="form-group">
                        <!-- <label class="fw-bold"> Id:</label> -->
                        <input type="hidden" class="form-control mb-2" 
                           name="id" id="idd" readonly>
                           <!-- <label class="fw-bold">Quiz Id:</label> -->
                        <input type="hidden" class="form-control mb-2" 
                           name="qtid" id="qtidd" readonly>
                      
                     </div>
               </div>
               <div class="modal-footer bg-light">
               <input type="submit" id="btn3" class="form-control" name="reject" value="Reject">
               </div>
               </form>
            </div>
         </div>
      </div>
      <!-- //Reject -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="js/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
   $(document).ready(function(){
     $('.editbtn').on('click',function(){
       $('#myModalEdit').modal('show');
   
       $tr=$(this).closest('tr');
   
       var data=$tr.children('td').map(function(){
         return $(this).text();
       }).get();
   
       console.log(data);
       $('#update_id').val(data[0]);
       $('#id').val(data[0]);
       $('#qtid').val(data[1]);
       $('#stid').val(data[2]);
       $('#name').val(data[3]);
       $('#description').val(data[4]);
       $('#file').val(data[5]);
       $('#course').val(data[6]);
    
   
     });
     $('.rbtn').on('click',function(){
       $('#myModalReject').modal('show');
   
       $tr=$(this).closest('tr');
   
       var data=$tr.children('td').map(function(){
         return $(this).text();
       }).get();
   
       console.log(data);
       $('#update_id').val(data[0]);
       $('#idd').val(data[0]);
       $('#qtidd').val(data[1]);
     });
   });
   
</script>
<script type="text/javascript">
   $(document).ready(function () {
       $('.songs').select2();
   });
   
</script>
</body>
</html>


