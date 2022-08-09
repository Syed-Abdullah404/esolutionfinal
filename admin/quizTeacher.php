<div class="card-body table-responsive p-0">
                  <div class="row">
                     <div class="col-lg-12">
                     <table id="example" class="table table-striped  mx-10">
                  
                  <thead>
                     <tr>
                          
                          <th>ID</th>
                          <th>File ID</th>
                          <th>Student ID</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>File</th>
                          <th>Course</th>                       
                          <th>Teacher ID</th>
                          <th>Quiz ID</th>
                          <th>Operations</th>                         
                     </tr>
                   </thead>
                       <tbody>
                                <?php
                                  $query=mysqli_query($conn,"select * from teacher_xtra_quiz where status='pending'");
                            if($query){
                                  while($row=mysqli_fetch_assoc($query)){
                                      $course_id=$row['course'];
                                      $stu_id=$row['stu_id'];
                                      $sel_course=mysqli_query($conn,"select * from admin_course where id='$course_id'");
                                      $crow=mysqli_fetch_assoc($sel_course);
                                      $course_name=$crow['name'];
                            
                                    ?>
                                  <tr>
                                              
                                         <td><?php echo $row['id'];?></td>     
                                         <td><?php echo $row['x_id'];?></td>     
                                         <td><?php echo $stu_id?></td>     
                                         <td><?php echo $row['name']; ?></td>     
                                         <td><?php echo $row['description']; ?></td>     
                                              
                                       
                                         <td><a href="../teacher/<?php echo $row['stu_file']; ?>" download class="btn btn-success btn-sm"><?php echo $row['stu_file']; ?> </a></td>

                                         <td><?php echo $course_name; ?></td>     
                                        
                                         <td><?php echo $row['teacher_id']?></td>     
                                         <td><?php echo $row['quiz_id']?></td>     
                                          
                                     
                                                   
                                              <td>

                                                    <button class="btn  btn-sm btn-success editbtn"  type="button" >
                                                        Approve
                                                      </button>
                                                      <button class="btn  btn-sm btn-danger rbtn" type="button" >
                                                        Reject
                                                      </button>
                                                     <a href="inbox.php"> <button class="btn  btn-sm btn-primary " type="button" >
                                                      <i class="fas fa-comment"></i>
                                                      </button></a>
                                                      <a href="https://web.whatsapp.com/" class="btn  btn-sm btn-success " type="button"><i class="fab fa-whatsapp"></i></a>
                                                  


                                                 
                                              </td>
                                          </tr>

<?php
                                  }
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
               <!-- //Edit -->
               <div class="modal fade" id="myModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Subject</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 
                  <form method="POST" enctype="multipart/form-data">
          <input type="hidden" name="update_id" id="update_id" />
                <div class="form-group">
                <label class="fw-bold">Id:</label>
                    <input type="text" class="form-control mb-2" 
                     name="tid" id="tid" readonly>
                <label class="fw-bold">File Id:</label>
                    <input type="text" class="form-control mb-2" 
                     name="id" id="id" readonly>
                <label class="fw-bold">Student Id:</label>
                    <input type="text" class="form-control mb-2" 
                     name="stid" id="stid" readonly>
                     <label class="form-label">Teacher ID:</label>
                    <input type="text" name="teacher" id="teacher" class="form-control" readonly>

                    <label class="form-label">Quiz ID:</label>
                    <input type="text" name="quiz" id="quiz" class="form-control" readonly>

                <label class="fw-bold">Name:</label>
                    <input type="text" class="form-control mb-2" 
                     name="name" id="name">

                    <label class="fw-bold">Description:</label>
                    <input type="text" class="form-control mb-2" name="description" id="description">

                    <label class="fw-bold">File:</label>
                    <input type="text" class="form-control mb-2" name="file" id="file">

                    <label class="fw-bold">Course:</label>
                    <input type="text" class="form-control mb-2" name="course" id="course" readonly>
                      
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
                     <input type="hidden" name="update_id" id="up_id" />
                     <h1 class="text-danger">Are You Sure To Reject It</h1>
                     <div class="form-group">
                        <!-- <label class="fw-bold"> Id:</label> -->
                        <!-- <input type="hidden" class="form-control mb-2" 
                           name="id" id="idd" readonly> -->
                           <!-- <label class="fw-bold">Quiz Id:</label> -->
                        <input type="hidden" class="form-control mb-2" 
                           name="qtid" id="qtidd" readonly>
                       <input type="hidden" class="form-control mb-2" 
                           name="tidd" id="tidd" readonly>
                      
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
      $('#tid').val(data[0]);
      $('#id').val(data[1]);
      $('#stid').val(data[2]);
      $('#name').val(data[3]);
      $('#description').val(data[4]);
      $('#file').val(data[5]);
      $('#course').val(data[6]);
      $('#activity').val(data[8]);
      $('#teacher').val(data[7]);
      $('#quiz').val(data[8]);
    });

    $('.rbtn').on('click',function(){
       $('#myModalReject').modal('show');
   
       $tr=$(this).closest('tr');
   
       var data=$tr.children('td').map(function(){
         return $(this).text();
       }).get();
   
       console.log(data);
       $('#up_id').val(data[0]);
       $('#idd').val(data[0]);
       $('#qtidd').val(data[1]);
      	$('#tidd').val(data[7]);
     });
  });

   
</script>

<?php 
   if(isset($_POST['save']))
   {
     $name=$_POST['name'];
     $description=$_POST['description'];   
     $file=$_POST['file'];
     $course=$_POST['course'];   
     $teacher=$_POST['teacher']; 
     $stid=$_POST['stid'];
     $quizid=$_POST['quiz'];
     $qfid=$_POST['id'];
     $id=$_POST['tid'];
     $sql=mysqli_query($conn,"INSERT INTO `teacher_quiz_response`(`x_id`, `quiz_id`, `stu_id`, `teacher_id`, `name`, `description`, `stu_file`, `course`) VALUES ('$qfid','$quizid','$stid','$teacher','$name','$description','$file','$course')");
     if($sql){
      mysqli_query($conn,"UPDATE `teacher_xtra_quiz` SET `status`='approve' WHERE id='$id'");
       $temail=mysqli_query($conn,"SELECT * FROM `admin_teacher` WHERE id='$teacher'");
       		$trow=mysqli_fetch_assoc($temail);
       	
       
       		$to_email =$trow['email'];
      		$t_email;
            $subject="Approval Of Quiz Task";
            $body="Hi Teacher, admin  approve your quiz task ..";
            $header="From: check9404@gmail.com";

            if (mail($to_email, $subject, $body, $header)) {
              
            } 
       
       		$semail=mysqli_query($conn,"SELECT * FROM `admin_student` WHERE id='$stid'");
       		$srow=mysqli_fetch_assoc($semail);
       
       		$to_email =$srow['email'];
      		
            $subject="Quiz Task Response";
            $body="Hi student, Check Your quiz task response..";
            $header="From: check9404@gmail.com";

            if (mail($to_email, $subject, $body, $header)) {
             
            } 

         ?>
         <script>
           window.location="<?php echo $app_url .'admin/adminTeacherTab.php' ?>";
         </script>
      <?php
     }
   }

   //rejection
   if(isset($_POST['reject'])){
    $iid=$_POST['update_id'];
    $qtid=$_POST['qtid'];
    $xid=$_POST['id'];
     $tidd=$_POST['tidd'];
   $update= mysqli_query($conn,"UPDATE `teacher_xtra_quiz` SET `status`='reject' WHERE id='$iid' ");
   if($update){
     $sremail=mysqli_query($conn,"SELECT * FROM `admin_teacher` WHERE id='$tidd'");
       		$srrow=mysqli_fetch_assoc($sremail);
       
       		$to_email =$srrow['email'];
      		
            $subject="Rejection Of Quiz Task";
            $body="Hi Teacher, Admin Reject your Quiz Request..";
            $header="From: check9404@gmail.com";

            if (mail($to_email, $subject, $body, $header)) {
                echo "<script> alert('Rejection Email successfully sent to $to_email...') </script>";
            }
      ?>
    <script>
    window.location="<?php echo $app_url .'admin/adminTeacherTab.php' ?>";
    </script>
<?php
}
 }
   ?>