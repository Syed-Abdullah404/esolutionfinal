<?php 

include '../connection.php';

define("TITLE","Testimonial");
define("PAGE","Testimonial");

include 'header.php';


?>


<div class="body-section">
<div class="container ">
         <div class="card ">
              <div class="card-header border-0">
                <h3 class="card-title display-6">Testimonials</h3>
                <hr>
      <div class="container mt-1">
      <div class="row">
                  <div class="col-lg-9">
                    <div class="input-group ">
                    
</div>
                  </div>
                  <div class="col-lg-3">
              
      
                  <button type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-lg float-right mb-3" >
                    Add Testimonials
                    </button>
</div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-light">
          <h4 class="modal-title " id="exampleModalLabel">Add Testimonials</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" >
                <div class="form-group">
                
                
                    <label class="fw-bold">Name:</label>
                    <input type="text" class="form-control mb-2" placeholder=" Name" name="name">
                    

                    <label class="form-label">Testimonial:</label>
                            <div>
                            <textarea class="form-control" name="testimonial"
                              ></textarea>
                           
                </div>

                <div class="modal-footer bg-light">
                <input type="submit" id="btn3" class="form-control  " 
                                    name="save" value="Save">
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
                <table id="example" class="table table-striped table-responsive table-bordered  mx-10">
                  
                  <thead class="table-dark">
                     <tr>
                          <th>ID</th>
                          <th>Name</th>                        
                          <th>Testimonial</th>                                                   
                          <th>Operations</th>                         
                     </tr>
                  </thead>
                         <tbody>
                         <?php
                              
                              $select=mysqli_query($conn,"select * from testimonials");
                              while($row=mysqli_fetch_assoc($select)){
                                ?>
                                  <tr>
                             <td><?php echo $row['id']; ?></td>
                             <td><?php echo $row['name']; ?></td>
                             <td style="width: 650px;">
                               
                                 <?php echo $row['testimonial']; ?>
                              
                             </td>
                                 <td style="width: 150px;">
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
 
      </div>
     
    </div>
  </div>
</div>




<div class="modal fade" id="myModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Testimoials</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" >
      <input type="hidden" name="update_id" id="update_id" />
                <div class="form-group">
               <label class="fw-bold">Name:</label>
                    <input type="text" class="form-control mb-2" placeholder=" Name" name="name" id="name">
                    
                    <label class="form-label">Testimonials:</label>
                    <div>  
                      <textarea cols="30" rows="10" id="testimonial" name="testimonial" class="form-control"></textarea>    
                        
                                       
                    
</div>
                
                
           
                </div>
                <div class="modal-footer bg-light">
                <input type="submit" id="btn3" class="form-control  " 
                                    name="edit" value="Save">
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
                       url: "deletetestimonial.php",
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
      $('#testimonial').val(data[2]);
 
    });
  });

</script>



<?php 


include 'footer.php';

if(isset($_POST['save'])){
  $name=$_POST['name'];
  $testimonial=$_POST['testimonial'];
  $insert="INSERT INTO `testimonials`(`name`,`testimonial`) VALUES ('$name','$testimonial')";
  $run=mysqli_query($conn,$insert);
  if($run){
    ?> <script>
    window.location = "<?php echo $app_url.'admin/testimonial.php' ?>";
    </script>
    <?php
  }

}

 //edit


 if(isset($_POST['edit'])){
  $id=$_POST['update_id'];
  $name=$_POST['name'];
  $testimonial=$_POST['testimonial'];
      $query="UPDATE `testimonials` SET `name`='$name',`testimonial`='$testimonial' WHERE id='$id'";
      $res=mysqli_query($conn,$query);
      if($res){
        ?> 
        <script>
        window.location = "<?php echo $app_url.'admin/testimonial.php' ?>";
        </script>
        <?php
      }
   
  }
?>