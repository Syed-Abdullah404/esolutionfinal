<?php 
session_start();
include '../connection.php';
if(!isset($_SESSION['teacher'])){
    ?>
    <script>
    window.location="<?php echo $app_url .'login.php' ?>";
    </script>
    <?php
     }
   define("TITLE","Payment");
   define("PAGE","Payment");
   
   include 'header.php';
   
   ?>
<div class="body-section">
   <div class="container">
      <div class="card">
         <div class="card-header border-0">
            <h3 class="card-title display-6">Payment Details</h3>
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
                        <table id="example" class="table table-striped table-responsive mx-10">
                           <thead>
                              <tr>
                                
                                 <th>Name</th>
                                 <th>Total Amount</th>                                
                                 <th>Advance</th>
                                 <th>Remaining</th>                               
                              </tr>
                           </thead>
                           <tbody>
                           <?php
                             $t_id=$_SESSION['id'];
                             $sql=mysqli_query($conn,"select * from admin_teacher where id='$id'");
                             $rown=mysqli_fetch_assoc($sql);
                             $name=$rown['name'];
                            // echo $name;
                                $select=mysqli_query($conn,"select * from teacher_payment where name='$name'");
                                
                                while($row=mysqli_fetch_assoc($select)){
                                  
                                  ?>
                                <tr>
                                   
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['total_amount']; ?></td>
                                    <td><?php echo $row['advance']; ?></td>
                                    <td><?php echo $row['remaining']; ?></td>
                                                                
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





<?php 
   include 'footer.php';
?>