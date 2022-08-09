<?php 

include '../connection.php';

   define("TITLE","Mids");
   define("PAGE","Mids");
   
   include 'header.php';
   
   ?>
<div class="body-section">
   <div class="container">
      <div class="card">
         <div class="card-header border-0">
            <h3 class="card-title display-6">Mids</h3>
            <hr>
            <div class="container mt-1">
               <!-- Button trigger modal -->
               <div class="row">
                  <div class="col-lg-9">
                     <div class="input-group ">
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <button type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-lg float-right mb-3" >
                     <i class="fas fa-plus"></i> Add Mid
                     </button>
                     <!--Modal-->
                     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header bg-light">
                                 <h4 class="modal-title " id="exampleModalLabel">Add Mid</h4>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                 </button>
                              </div>
                              <div class="modal-body">
                              <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                       <label class="fw-bold">Name:</label>
                                       <input type="text" class="form-control mb-2" placeholder=" Name" name="name">
                                       <label  class="form-label">Description:</label>
                                       <div>
                                          <textarea class="form-control" name="description"
                                             ></textarea>                                       
                                       </div>
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
               <div class="card-body table-responsive p-0">
                  <div class="row">
                     <div class="col-lg-12">
                        <table id="example" class="table table-striped table-responsive mx-10">
                           <thead>
                              <tr>
                                 <th>ID</th>
                                 <th>Name</th>
                                 <th>Description</th>
                                 <th>Add Files</th>
                                 <th>View Files</th>
                                 <th>Operations</th>
                              </tr>
                           </thead>
                           <tbody>
                           <?php
                             $id=$_SESSION['id'];
                                $select=mysqli_query($conn,"select * from student_mids where stu_id='$id'");
                                $i=1;
                                while($row=mysqli_fetch_assoc($select)){
                                  $i++;
                                  ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td style="width:500px;"><?php echo $row['description']; ?></td>
                                   
                                   
                                    <td>
                                    <a href="xtra_mid.php" class="btn btn-success btn-sm editbtn">
                                              Add Files
                                       </a>
                                    </td>
                                    <td>
                                    <a href="view_mids_files.php?idv=<?php echo $row['id'];  ?>" class="btn btn-success btn-sm ">
                                              View Files
                                       </a>
                                    </td>
                                    <td class="text-center">
                                        <div class="action">
                                          <button class="btn btnaction btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          Action
                                          </button>
                                          <ul class="dropdown-menu p-0">
                                          <li class="dropdown-item editbtn">   <i class="far fa-edit"></i>  Edit</li>
                                          <li class="dropdown-item" >
                                              <input type="hidden" class="delete_id_value" value="<?php echo $row['id']; ?>">
                                             <a href="javascript:void(0)" type="button" class="delete_btn_ajax text-dark"><i class="fas fa-trash"></i>Delete</a>
                                             </li>
                                          </ul>
                                        </div>
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
<div class="modal fade" id="myModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Mid</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
         <form method="POST" enctype="multipart/form-data">
               <input type="hidden" name="update_id" id="update_id">
               <div class="form-group">
                  <label class="fw-bold">Name:</label>
                  <input type="text" class="form-control mb-2" placeholder=" Name" name="name" id="name">
                  <label for="description" class="form-label">Description:</label>
                  <div>
                     <textarea class="form-control"  id="description" name="description"
                        ></textarea>
                   
                     
                  </div>
                  <div class="modal-footer bg-light">
                     <button type="submit" class="btn btn-primary" name="edit">Add </button> 
                  </div>
            </form>
            </div>
         </div>
      </div>
   </div>
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
      $('#description').val(data[2]);
      $('#stime').val(data[3]);
      $('#etime').val(data[4]);
      $('#sdate').val(data[5]);
      $('#edate').val(data[6]);
      $('#efile').val(data[7]);

    });
  });
</script>
<!-- Del Mids  data-->
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
                       url: "delMid.php",
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
   
   if(isset($_POST['add'])){
    $name=$_POST['name'];
    $description=$_POST['description'];
   
    
     $id_head=$_GET['id'];
    $sql=mysqli_query($conn,"INSERT INTO `student_mids`(`stu_id`, `name`, `description`) VALUES ('$id_head','$name','$description')");
    
    if($sql){
    
      ?>
         <script>
           window.location="<?php echo $app_url .'student/mids.php?id='."$id_head" ?>";
         </script>
      <?php
    }

 }

 if(isset($_POST['edit'])){
   $id=$_POST['update_id'];
  $name=$_POST['name'];
  $description=$_POST['description'];
  

   $id_head=$_GET['id'];
   $sql=mysqli_query($conn,"UPDATE `student_mids` SET `name`='$name',`description`='$description' WHERE id='$id'");

      if($sql){

      ?>
         <script>
            window.location="<?php echo $app_url .'student/mids.php?id='."$id_head" ?>";
         </script>
      <?php
      }
   
 
}
   ?>