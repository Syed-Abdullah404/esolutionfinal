<?php 

include '../connection.php';

define("TITLE","Users");
define("PAGE","Users");

include 'header.php';

?>


<div class="body-section">
<div class="container">
         <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Users</h3>
                <hr>
      <div class="container mt-1">
              <!-- Button trigger modal -->
              <div class="row">
                  <div class="col-lg-9">                 
                  </div>
                  <div class="col-lg-3">
              
      
          <button type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-lg float-right mb-3" >
            <i class="fas fa-plus"></i> Add User
        </button>
        <!--Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-light">
          <h4 class="modal-title " id="exampleModalLabel">User Detail</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST">
                <table>
                    <tr>
                        <td>
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" placeholder="First Name" name="fname">
                        </div>
                        </td>
                        <td >
                        <div class="form-group mx-2">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                        </td>
                    </tr>
                    <tr>
                   

                        <td>
                        <div class="form-group mt-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        </td>
                        <td>
                        <div class="form-group mt-3 mx-2">
                        <label class="form-label">Role</label><br>
                        <select name="role" class="form-control">
                            <?php
                                $query=mysqli_query($conn,"SELECT * FROM roles GROUP BY role_name
                                ORDER BY role_name ");
                                while($row=mysqli_fetch_assoc($query)){
                               
                            ?>
                                    <option value="<?php echo $row['role_name'] ?>"><?php echo $row['role_name'] ?></option>  
                            
                            <?php }?>
                          
                        </select>

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
                  
                  <thead class="table-dark">
                     <tr>
                          <th>#</th>
                          <th>Name</th>                  
                          <th>Email</th>
                          <th>Role</th>
                          <th>Operations</th>                         
                     </tr>
                  </thead>
                  <tbody>
                  </tbody>               
                  <?php
                    $sql=mysqli_query($conn,"select * from users");
                    while($row=mysqli_fetch_assoc($sql)){
                        ?>
                      <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['role']; ?></td>

                            <td>
                            <button type="button" class="btn btn-success btn-sm editbtn"><i class="fas fa-edit"></i></button>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST">
      <input type="hidden" name="update_id" id="update_id">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name">
                
            </div>
            <div class="form-group mx-2">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control"  name="email" id="email">
            </div>
        
            <div class="form-group mx-2">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-control" id="role">
                            <?php
                                $query=mysqli_query($conn,"SELECT * FROM roles GROUP BY role_name
                                ORDER BY role_name ");
                                while($row=mysqli_fetch_assoc($query)){
                               
                            ?>
                                    <option value="<?php echo $row['role_name'] ?>"><?php echo $row['role_name'] ?></option>  
                            
                            <?php }?>
                          
                        </select>
            </div>           
           
           
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
                       url: "deleteuser.php",
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
      $('#email').val(data[2]);
      $('#role').val(data[3]);
    });
  });

</script>




<?php 


include 'footer.php';

if(isset($_POST['add'])){
  $name=$_POST['fname'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $role=$_POST['role'];
  $result=mysqli_query($conn,"INSERT INTO `users`(`name`, `email`, `password`, `role`) VALUES ('$name','$email','$password','$role')");
  if($result){
    ?>
    <script>
        window.location = "<?php echo $app_url.'admin/user.php' ?>";
    </script>
  
    <?php
  }
}


//edit
if(isset($_POST['edit'])){
    $name=$_POST['name'];
  $email=$_POST['email'];
  $role=$_POST['role'];
  $id=$_POST['update_id'];
  $updatequery="UPDATE `users` SET `name`='$name',`email`='$email',`role`='$role' WHERE id='$id'";
  $uquery=mysqli_query($conn,$updatequery);
  if($uquery){
    ?>
    <script>
          window.location = "<?php echo $app_url.'admin/user.php' ?>";
    </script>
  
    <?php
  }else{
    ?>
    <script>
        alert('Update Failed');
    </script>
  
    <?php
  }
  
}

?>