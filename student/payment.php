<?php 

include '../connection.php';

   define("TITLE","Payment");
   define("PAGE","Payment");
   
   include 'header.php';
   
   ?>
<div class="body-section">
   <div class="container">
      <div class="card">
         <div class="card-header border-0">
            <h3 class="card-title display-6">Payment </h3>
            <hr>
            <div class="container mt-1">
               <!-- Button trigger modal -->
               <div class="row">
                  <div class="col-lg-9">
                     <div class="input-group ">
                     </div>
                  </div>
                
               </div>
               <div class="card-body table-responsive p-0">
                  <div class="row">
                     
                     <div class="col-lg-12">
                     <button class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#myModalEdit">Add Receipt</button>
                        <table id="example" class="table table-striped table-responsive mx-10">
                           <thead>
                     
                              <tr>
                                <th>ID</th>
                                 <th>Receipt</th>
                                                 
                              </tr>
                           </thead>
                           <tbody>
                           <?php
                             $idget=$_GET['id'];
                                $select=mysqli_query($conn,"select * from payment where stu_id=".$idget);
                                
                                while($row=mysqli_fetch_assoc($select)){
                         
                                  ?>
                                <tr>
                                
                                   <td><?php echo $row['stu_id'];?></td>
                                   <td><a href="./payment/<?php echo $row['image']; ?>" download class="btn btn-success btn-sm">Download payment challan</a></td>
                                                     
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
            <h5 class="modal-title" id="exampleModalLabel">Add Receipt</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
               <?php
               $id = $_GET['id'];
               ?>
               <input type="hidden" name="update_id" id="update_id"value
            ="<?php echo $id ;?>">
               <div class="form-group">
                  <label class="fw-bold">Image:</label>
                  <input type="file" class="form-control mb-2" placeholder=" Name" name="file" id="name">
                  
                   
                   
                  </div>
                  <div class="modal-footer bg-light">
                     <button type="submit" class="btn btn-primary" name="upload">Add </button> 
                  </div>
            </form>
            </div>
         </div>
      </div>
   </div>
</div>





<?php 
   include 'footer.php';
   

  
   ?>


<?php
$id = $_GET['id'];
error_reporting(0);
 
$msg = "";
 
// If upload button is clicked ...
if (isset($_POST['upload'])) {
   $id_student = $_POST["update_id"];
   $filename = $_FILES["file"]["name"];
   $tempname = $_FILES["file"]["tmp_name"];
   $folder = "./payment/" . $filename;
 
 
    // Get all the submitted data from the form
    $sql = "INSERT INTO `payment`(`stu_id`, `image`) VALUES ('$id_student','$filename')";
    
    // Execute query
    mysqli_query($conn, $sql);
 
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
      ?>
      <script>
      window.location = "<?php echo $app_url . 'student/payment.php?id='.$id?>";
  </script>
  <?php
    } else {
      //   echo "<h3>  Failed to upload image!</h3>";
    }
}
?>