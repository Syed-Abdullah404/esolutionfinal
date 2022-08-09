<?php 

include '../connection.php';

   define("TITLE","Payment");
   define("PAGE","Payment");
   
   include 'header.php';
 
   
   ?>
<div class="body-section">
   <div class="container ">
      <div class="card ">
         <div class="card-header border-0">
            <h3 class="card-title display-6">Payment Student</h3>
            <hr>
            <div class="container mt-1">
               <div class="row">
                
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
                                    <label class="fw-bold">Student Name:</label>
                                    <select name="student" class="form-control" id="stu"  onchange="cat(this.value)">
                                       <option>Select Student Name</option>
                                       <?php
                                          $sql=mysqli_query($conn,"select * from admin_student");
                                          while($row=mysqli_fetch_assoc($sql)){
                                                  ?>
                                       <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                       <?php
                                          }
                                          ?>
                                    </select>
                                    <label class="fw-bold">Course Name:</label>     
                                    <select name="coursename" class="form-control mt-2" id="stucourse">
                                       
                                      
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
                                 <th>Paid Fee</th>
                                 
                              </tr>
                           </thead>
                           <tbody>
                           <?php
                              
                                $select=mysqli_query($conn,"select * from payment");
                                
                                while($row=mysqli_fetch_assoc($select)){
                                 
                                  ?>
                                <tr>
                                   
                                   <td><?php echo $row['stu_id'];?></td>
                                   <!-- <td><img src="../student/payment/<?php echo $row['image'] ?>" alt="" height="100px" download></td> -->
                                   <td><a href="../student/payment/<?php echo $row['image']; ?>" download class="btn btn-success btn-sm">Download payment challan</a></td>
                                                     
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
                  <h5 class="modal-title" id="exampleModalLabel">Edit Payment Method</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
               <form method="POST" >
                   <input type="hidden" name="update_id" id="update_id" />
                                 <div class="form-group">
                                    <label class="fw-bold">Student Name:</label>
                                    <select name="student" class="form-control" id="student" readonly>
                                       <option>Select Student Name</option>
                                       <?php
                                          $sql=mysqli_query($conn,"select * from admin_student");
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
                       url: "deleteStudentpay.php",
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
 
  ajaxreq.open('GET','http://localhost/esolutionfinal/admin/studata.php?selectvalue='+data,'TRUE');
  ajaxreq.send();
  ajaxreq.onreadystatechange =function(){
    if(ajaxreq.readyState == 4 && ajaxreq.status == 200){
      document.getElementById('stucourse').innerHTML=ajaxreq.responseText;
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
       $course=$_POST['coursename'];

       $sql=mysqli_query($conn,"INSERT INTO `student_payment`( `name`,`course_name` ,`total_amount`, `advance`,`remaining`,`current`, `date`) VALUES ('$stu_name','$course','$tamount','$advance','$remaining','$advance',NOW())");
       if($sql){
           ?>
            <script>
                 window.location = "<?php echo $app_url.'admin/payment.php' ?>";
            </script>
           <?php
       }
   }

   if(isset($_POST['edit'])){
    $update=$_POST['update_id'];

    $remaining=$_POST['rem'];
    $current=$_POST['rempay'];
    //echo "<script>alert($remaining) </script>";
    $update=mysqli_query($conn,"UPDATE `student_payment` SET `remaining`='$remaining',`current`='$current',`date`=NOW() WHERE id='$update'");
    if($update){
        ?>
            <script>
                 window.location = "<?php echo $app_url.'admin/payment.php' ?>";
            </script>
           <?php 
    }
   }
   ?>