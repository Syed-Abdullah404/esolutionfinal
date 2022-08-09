<?php 

include '../connection.php';

define("TITLE","Services");
define("PAGE","Services");

include 'header.php';


?>


<div class="body-section">
<div class="container ">
         <div class="card ">
              <div class="card-header border-0">
                <h3 class="card-title display-6">Services</h3>
                <hr>
      <div class="container mt-1">
      <div class="row">
                  <div class="col-lg-9">
                    <div class="input-group ">
                    
</div>
                  </div>
                  <div class="col-lg-3">
              
      
                  <button type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-lg float-right mb-3" >
        Add Services
        </button>
</div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-light">
          <h4 class="modal-title " id="exampleModalLabel">Add Services</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
                <div class="form-group">    
                    <label class="fw-bold">Name:</label>
                    <input type="text" class="form-control mb-2" placeholder="Name" name="name">
                    <label class="fw-bold">Image:</label>
                    <input type="file" name="picture" class="form-control mb-2">

                    <label class="form-label">Description:</label>
                            <div>
                            <textarea class="form-control"  name="description"
                              ></textarea>
                </div>
                <div class="modal-footer bg-light">
                <input type="submit" id="btn3" class="form-control" name="save" value="Save">
                </div>
            </form>
        </div>
       
      </div>
    </div>
  </div>
</div>
     




 


  
              <div class="card-body table-responsive p-0">
              <div class="row">
                  <div class="col-lg-12">
                <table id="example" class="table table-striped  mx-10">
                  
                  <thead>
                     <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Image</th>
                          <th>Description</th>
                    <th>Operations</th>                         
                     </tr>
                         </thead>
                                <tbody>
                                            
                                <?php
                              
                              $select=mysqli_query($conn,"select * from services");
                              while($row=mysqli_fetch_assoc($select)){
                                ?>
                                  <tr>
                             <td><?php echo $row['id']; ?></td>
                             <td><?php echo $row['name']; ?></td>
                             <td><img src="<?php echo $row['image']; ?>" alt="profile" style="width:120px; height:120px;"> </td>
                             <td><?php echo $row['description']; ?></td>
                                 <td>
                                           <div class="action">
                                                            <button class="btn btnaction btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                              Action
                                                            </button>
                                                            <ul class="dropdown-menu p-0">
                                                           
                                                            <li class="dropdown-item editbtn">   <i class="far fa-edit"></i> Edit</li>
                                                            <li class="dropdown-item">
                                                            <input type="hidden" class="delete_id_value" value="<?php echo $row['id']; ?>">
                    <a href="javascript:void(0)" type="button" class="delete_btn_ajax btn btn-sm h"><i class="fas fa-trash"></i> Delete</a>
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
            </div>




<div class="modal fade" id="myModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" >
      <input type="hidden" name="update_id" id="update_id" />
                <div class="form-group">
                  <label class="fw-bold">Name:</label>
                      <input type="text" class="form-control mb-2" placeholder=" Name" name="name" id="name">

                    <label class="form-label">Description:</label>
                            <div>
                            <textarea class="form-control" name="description"
                              id="description"></textarea>
                           
                    
                  </div>
                
                
           
                </div>
                <div class="modal-footer bg-light">
                  <input type="submit" id="btn3" class="form-control" name="edit" value="Save">
                </div>
            </form>
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
                       url: "deleteservice.php",
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
      $('#description').val(data[3]);
 
    });
  });

</script>



<?php 


include 'footer.php';
if(isset($_POST['save'])){
  $name=$_POST['name'];
  $description=$_POST['description'];
  $file=($_FILES['picture']);
 // print_r($file);
  $file_name=$file['name'];
  $file_path=$file['tmp_name'];
  $file_error=$file['error'];

    if($file_error == 0){
      $destinaton='servicess/'.$file_name;
      move_uploaded_file($file_path,$destinaton);
      $query="INSERT INTO `services`(`name`, `image`, `description`) VALUES ('$name','$destinaton','$description')";
      $res=mysqli_query($conn,$query);
      if($res){
        ?> <script>
        window.location = "<?php echo $app_url.'admin/services.php' ?>";
        </script>
        <?php
      }
    }else{
    echo "<script>alert('Picture Error  !!') </script>";
    }

  }

    //edit


    if(isset($_POST['edit'])){
      $id=$_POST['update_id'];
      $name=$_POST['name'];
      $description=$_POST['description'];
          $query="UPDATE `services` SET `name`='$name',`description`='$description' WHERE id='$id'";
          $res=mysqli_query($conn,$query);
          if($res){
            ?> 
            <script>
            window.location = "<?php echo $app_url.'admin/services.php' ?>";
            </script>
            <?php
          }
       
      }
  
?>