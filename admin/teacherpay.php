<?php 

   include '../connection.php';
   define("TITLE","Teachers Pay Detail");
   define("PAGE","Teachers Pay Detail");
   
   include 'header.php';

   
   ?>
<div class="body-section">
   <div class="container ">
      <div class="card ">
         <div class="card-header border-0">
            <h3 class="card-title display-6">Teachers Pay Detail</h3>
            <hr>
            <div class="container mt-1">
               <div class="row">
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
                     <button type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-lg float-right mb-3" >
                     Add Payment
                     </button>
                  </div>
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header bg-light">
                              <h4 class="modal-title " id="exampleModalLabel">Add Payment </h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </button>
                           </div>
                           <div class="modal-body">
                              <form method="POST" >
                                 <div class="form-group">
                                    <label class="fw-bold">Teacher Name:</label>
                                    <select name="student" class="form-control" onchange="cat(this.value)">
                                       <option>Select Teacher Name</option>
                                       <?php
                                          $sql=mysqli_query($conn,"select * from admin_teacher");
                                          while($row=mysqli_fetch_assoc($sql)){
                                                  ?>
                                       <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                       <?php
                                          }
                                          ?>
                                    </select>
                                    <label class="fw-bold">Course Name:</label>     
                                    <select name="coursename" class="form-control mt-2" id="teachercourse">
                                       
                                      
                                    </select>

                                    <label class="fw-bold mt-3">Total Amount:</label>
                                    <input type="text" class="form-control" name="tamount" id="tamount">
                                    <label class="fw-bold mt-3">Advance:</label>
                                    <input type="text" class="form-control" name="advance" id="advance"  onblur="getAmount()">
                                    <label class="fw-bold mt-3">Remaining:</label>
                                    <input type="text" class="form-control" name="remaining" id="remaining">
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
                                 <th>Course Name</th>
                                 <th>Total Amount</th>
                                 <th>Remaining</th>
                                 <th>Advance</th>
                                 <th>Date</th>
                                 <th>Operations</th>
                              </tr>
                           </thead>
                           <tbody>
                               <?php
                                $sqli=mysqli_query($conn,"select * from teacher_payment");
                                if($sqli){
                                while($rows=mysqli_fetch_assoc($sqli)){
                                    
                                     ?>
                              <tr>
                                 <td><?php echo $rows['id']; ?></td>
                                 <td><?php echo $rows['name']; ?></td>
                                 <td><?php echo $rows['course_name']; ?></td>
                                 <td><?php echo $rows['total_amount']; ?></td>
                                 <td><?php echo $rows['remaining']; ?></td>
                
                                 <td><?php echo $rows['advance']; ?></td>
                                 <td><?php echo $rows['date']; ?></td>
                                 
                                 <td>
                                    <div class="action">
                                       <button class="btn btnaction btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                       Action
                                       </button>
                                       <ul class="dropdown-menu p-0">
                                          <li class="dropdown-item editbtn">   <i class="far fa-edit"></i>  Edit</li>
                                          <input type="hidden" class="delete_id_value" value="<?php echo $rows['id']; ?>">
                                      <a href="javascript:void(0)" type="button" class="delete_btn_ajax btn btn-sm h"><i class="fas fa-trash"></i> Delete</a>
                                       </ul>
                                    </div>
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
                  <h5 class="modal-title" id="exampleModalLabel">Edit Payment Method</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
               <form method="POST" >
                   <input type="hidden" name="update_id" id="update_id" />
                                 <div class="form-group">
                                    <label class="fw-bold">Teacher Name:</label>
                                    <select name="student" class="form-control" id="student">
                                       <option>Select Teacher Name</option>
                                       <?php
                                          $sql=mysqli_query($conn,"select * from admin_teacher");
                                          while($row=mysqli_fetch_assoc($sql)){
                                                  ?>
                                       <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                       <?php
                                          }
                                          ?>
                                    </select>
                                   
                                    <label class="fw-bold mt-3">Total Amount:</label>
                                    <input type="text" class="form-control" name="tamount" id="amount" readonly>
                                    <label class="fw-bold mt-3">Remaining:</label>
                                    <input type="text" class="form-control" name="rem" id="rem" readonly>
                                    <label class="fw-bold mt-3">Advance:</label>
                                    <input type="text" class="form-control" name="advance" id="adv" readonly>

                                    <label class="fw-bold mt-3">Remaining Pay:</label>
                                    <input type="text" class="form-control" name="rempay" id="rempay" onblur="getRem()">
                                 </div>
                                 <div class="modal-footer bg-light">
                                    <input type="submit" id="btn3" class="form-control" name="edit" value="Edit">
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
  $(document).ready(function(){
    $('.editbtn').on('click',function(){
      $('#myModalEdit').modal('show');

      $tr=$(this).closest('tr');

      var data=$tr.children('td').map(function(){
        return $(this).text();
      }).get();

      console.log(data);
      $('#update_id').val(data[0]);
      $('#student').val(data[1]);
      $('#amount').val(data[2]);
      $('#rem').val(data[3]);
      $('#adv').val(data[4]);
 
    });
  });

</script>
<script>
  function getAmount(){
    var value = $('#tamount').val();
    var percent = $('#advance').val();
    $('#remaining').val(value - percent);
  }

  function getRem(){
    var value = $('#rem').val();
    var percent = $('#rempay').val();
    $('#rem').val(value - percent);
  }
</script>
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
                       url: "deleteTeacherpay.php",
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

function cat(data){
  const ajaxreq= new XMLHttpRequest();
 
  ajaxreq.open('GET','http://localhost/esolutionfinal/admin/tutdata.php?selectvalue='+data,'TRUE');
  ajaxreq.send();
  ajaxreq.onreadystatechange =function(){
    if(ajaxreq.readyState == 4 && ajaxreq.status == 200){
      document.getElementById('teachercourse').innerHTML=ajaxreq.responseText;
    }
  }
} 

</script>
<?php 
   include 'footer.php';
   
   if(isset($_POST['save'])){
       $stu_name=$_POST['student'];
       $tamount=$_POST['tamount'];
       $advance=$_POST['advance'];
       $remaining=$_POST['remaining'];
       $course_name=$_POST['coursename'];

       $sql=mysqli_query($conn,"INSERT INTO `teacher_payment`( `name`,`course_name`, `total_amount`, `advance`,`remaining`, `date`) VALUES ('$stu_name','$course_name','$tamount','$advance','$remaining',NOW())");
       if($sql){
           ?>
            <script>
                 window.location = "<?php echo $app_url.'admin/teacherpay.php' ?>";
            </script>
           <?php
       }
   }

   if(isset($_POST['edit'])){
    $update=$_POST['update_id'];

    $remaining=$_POST['rem'];
    //echo "<script>alert($remaining) </script>";
    $update=mysqli_query($conn,"UPDATE `teacher_payment` SET `remaining`='$remaining',`date`=NOW() WHERE id='$update'");
    if($update){
        ?>
            <script>
                 window.location = "<?php echo $app_url.'admin/teacherpay.php' ?>";
            </script>
           <?php 
    }
   }
   ?>