<?php 

include '../connection.php';

define("TITLE","Roles");
define("PAGE","Roles");

include 'header.php';

?>


<div class="body-section">
<div class="container">
         <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Roles</h3>
                <hr>
      <div class="container mt-1">
              <!-- Button trigger modal -->
              <div class="row">
                  <div class="col-lg-9">                 
                  </div>
                  <div class="col-lg-3">
              
      
          <button type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-lg float-right mb-3" >
            <i class="fas fa-plus"></i> Add Role
        </button>
        <!--Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-light">
          <h4 class="modal-title " id="exampleModalLabel">Role Detail</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST">
                <table>
                    <tr>
                        <td>
                        <div class="form-group">
                            <label class="form-label">Role Name</label>
                            <input type="text" class="form-control" placeholder="Role Name" name="rname">
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
                        
                            <input class="form-check-input" type="checkbox" name="addT" value="1">
                            <label class="form-check-label" >
                               Add Teacher
                            </label>
                        </div>
                        </td>

                        <td>
                        <div class="form-check mt-2">                       
                            <input class="form-check-input" type="checkbox" name="addS" value="1">
                            <label class="form-check-label" >
                                Add Student
                            </label>
                        </div>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                        
                        <div class="form-check mt-2">
                        
                            <input class="form-check-input" type="checkbox" name="addF" value="1">
                            <label class="form-check-label" >
                                Add Faculty
                            </label>
                        </div>
                        </td>

                        <td>
                        <div class="form-check mt-2">                       
                            <input class="form-check-input" type="checkbox" name="addC" value="1">
                            <label class="form-check-label" >
                               Course
                            </label>
                        </div>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                        
                        <div class="form-check mt-2">
                        
                            <input class="form-check-input" type="checkbox" name="admissionReq" value="1">
                            <label class="form-check-label" >
                                Admission Request
                            </label>
                        </div>
                        </td>

                        <td>
                        <div class="form-check mt-2">                       
                            <input class="form-check-input" type="checkbox" name="teacherReq" value="1">
                            <label class="form-check-label" >
                              Teacher Request
                            </label>
                        </div>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                        
                        <div class="form-check mt-2">
                        
                            <input class="form-check-input" type="checkbox" name="stdReq" value="1">
                            <label class="form-check-label" >
                                Student Request
                            </label>
                        </div>
                        </td>

                        <td>
                        <div class="form-check mt-2">                       
                            <input class="form-check-input" type="checkbox" name="payment" value="1">
                            <label class="form-check-label" >
                               Payment
                            </label>
                        </div>
                        </td>
                        
                    </tr>

                    <tr>
                        <td>
                        
                        <div class="form-check mt-2">
                        
                            <input class="form-check-input" type="checkbox" name="setting" value="1">
                            <label class="form-check-label" >
                                Setting
                            </label>
                        </div>
                        </td>

                        <td>
                        <div class="form-check mt-2">                       
                            <input class="form-check-input" type="checkbox" name="dashboard" value="1">
                            <label class="form-check-label" >
                               Dashboard
                            </label>
                        </div>
                        </td>
                        
                    </tr>
                    <tr>
                    <td>
                        <div class="form-check mt-2">                       
                            <input class="form-check-input" type="checkbox" name="inbox" value="1">
                            <label class="form-check-label" >
                               Inbox
                            </label>
                        </div>
                        </td>

                        <td>
                        <div class="form-check mt-2">                       
                            <input class="form-check-input" type="checkbox" name="userm" value="1">
                            <label class="form-check-label" >
                               User Management
                            </label>
                        </div>
                        </td>
                    </tr>
                    
                </table>
                
               
                 
                <div class="modal-footer">
                  <button type="submit" class="btn" id="button-addon2" name="add">Add</button>
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
                  <table id="table" class="table pt-2" >
                  
                  <thead>
                     <tr>
                          <th>#</th>
                          <th>Role Name</th>                  
                          <th>Operations</th>                         
                     </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <?php
                    $sql=mysqli_query($conn,"select * from roles");
                    while($row=mysqli_fetch_assoc($sql)){
                        ?>
                      <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['role_name']; ?></td>

                            <td>
                            <a href="rolesEdit.php?id=<?php echo $row['role_name'];  ?>&ids=<?php echo $row['id'];?>" type="button" class="btn btn-success btn-sm editbtn"><i class="fas fa-edit"></i></a>
                            <input type="hidden" class="delete_id_value" value="<?php echo $row['id']; ?>">
                            <a href="javascript:void(0)" type="button" class="delete_btn_ajax btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php

                    }
                  ?>               
                       
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
  

    <!-- Edit Modal -->
<div class="modal fade" id="myModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST">
      <input type="hidden" name="update_id" id="update_id">
            <div class="mb-3">
                <label for="name" class="form-label">Role Name</label>
                <input type="text" class="form-control" name="name" id="name">
                
            </div>
            <table>

            <tr>
                        <td>
                        <label class="form-label mt-2">Permissions</label>
                        </td>
                    
                    </tr>
                    
                    <tr>
                        <td>
                        
                        <div class="form-check mt-2">
                            <?php
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
                            <input class="form-check-input" type="checkbox" name="addS" value="1">
                            <label class="form-check-label" >
                                Add Student
                            </label>
                        </div>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                        
                        <div class="form-check mt-2">
                        
                            <input class="form-check-input" type="checkbox" name="addF" value="1">
                            <label class="form-check-label" >
                                Add Faculty
                            </label>
                        </div>
                        </td>

                        <td>
                        <div class="form-check mt-2">                       
                            <input class="form-check-input" type="checkbox" name="addC" value="1">
                            <label class="form-check-label" >
                               Course
                            </label>
                        </div>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                        
                        <div class="form-check mt-2">
                        
                            <input class="form-check-input" type="checkbox" name="admissionReq" value="1">
                            <label class="form-check-label" >
                                Admission Request
                            </label>
                        </div>
                        </td>

                        <td>
                        <div class="form-check mt-2">                       
                            <input class="form-check-input" type="checkbox" name="teacherReq" value="1">
                            <label class="form-check-label" >
                              Teacher Request
                            </label>
                        </div>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                        
                        <div class="form-check mt-2">
                        
                            <input class="form-check-input" type="checkbox" name="stdReq" value="1">
                            <label class="form-check-label" >
                                Student Request
                            </label>
                        </div>
                        </td>

                        <td>
                        <div class="form-check mt-2">                       
                            <input class="form-check-input" type="checkbox" name="payment" value="1">
                            <label class="form-check-label" >
                               Payment
                            </label>
                        </div>
                        </td>
                        
                    </tr>

                    <tr>
                        <td>
                        
                        <div class="form-check mt-2">
                        
                            <input class="form-check-input" type="checkbox" name="setting" value="1">
                            <label class="form-check-label" >
                                Setting
                            </label>
                        </div>
                        </td>

                        <td>
                        <div class="form-check mt-2">                       
                            <input class="form-check-input" type="checkbox" name="dashboard" value="1">
                            <label class="form-check-label" >
                               Dashboard
                            </label>
                        </div>
                        </td>

                        
                        
                    </tr>
                    <tr>
                    <td>
                        <div class="form-check mt-2">                       
                            <input class="form-check-input" type="checkbox" name="inbox" value="1">
                            <label class="form-check-label" >
                               Inbox
                            </label>
                        </div>
                        </td>

                        <td>
                        <div class="form-check mt-2">                       
                            <input class="form-check-input" type="checkbox" name="userm" value="1">
                            <label class="form-check-label" >
                               User Management
                            </label>
                        </div>
                        </td>
                    </tr>
                                    <?php
                                }
                            ?>
                           
                </table>
           
            <button type="submit" class="btn btn-success mt-2 float-end" name="edit">Edit</button>
      </form>
      </div>
      
    </div>
  </div>
</div>
<!-- Edit Modal END -->
    <!--delete-->
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
                       url: "deleterole.php",
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
      $('#name').val(data[1]);
      $('#status').val(data[2]);
    });
  });

</script>




<?php 


include 'footer.php';

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
 
	$result=mysqli_query($conn,"INSERT INTO `roles`(`role_name`, `add_teacher`, `add_student`, `add_faculty`, `course`, `addmission_req`, `teacher_req`, `student_req`, `payment`, `setting`, `dashboard`, `inbox`, `user_management`) VALUES ('$role_name','$addTeacher','$addStudent','$addFaculty','$course','$admissionReq','$teacherReq','$stdReq','$payment','$setting','$dashboard','$inbox','$userm')");
   
   
    if($result){
      ?>
      <script>
          window.location = "<?php echo $app_url.'admin/roles.php' ?>";
      </script>
    
      <?php
 
  }else{
       ?>
      <script>
          alert('no');
      </script>
    
      <?php
    }

}




?>