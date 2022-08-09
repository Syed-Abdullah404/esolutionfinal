<?php
include 'header.php';
include 'connection.php';
?>

   



    <!--Courses-->
    <div class="container" style="margin-top: 150px;">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="heading display-3">Our Services</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="input-group justify-content-center">
               
            </div>
        </div>
        <div class="row mb-5 ">
            <?php
                $query=mysqli_query($conn,"select * from services");
                while($row=mysqli_fetch_assoc($query)){
                    $name=$row['name'];
                    $image=$row['image'];
                    $description=$row['description'];
                    ?>
                       <div class="col-lg-3 col-md-6 mt-5 text-center">
                            <div class="d-flex ">
                                <div class="courses shadow ">
                                    <div class="icon">
                                        <img src="admin/<?php echo $image; ?>" alt="" height="100px" width="120px">
                                    </div>
                                    <h2 class="heading2 mt-4"><?php echo $name; ?></h2>
                                    <p><?php echo $description; ?></p>
                                <a href="contact.php"> <button id="btn4"> Hire Us</button></a>
                                </div>
                            </div>
                        </div>
                    <?php
                }

            ?>
         
           
        </div>

      
        
    </div>



  




        <!--footer-->
        <div class="container-fluid management">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mt-5 text-center   ">
                        <h2 id="managementheading" class="display-4">
                            Social Media
                        </h2>
                        <?php
                          $select=mysqli_query($conn,"select * from company_profile");
                          $row=mysqli_fetch_assoc($select);
                          $fb=$row['fb'];
                          $insta=$row['insta'];
                          $whatsapp=$row['whatsapp'];
                          $linkedin=$row['linkedin'];

                        ?>
                        <ul class="social-icon">
                            <li><a href="<?php echo $fb; ?>" class="fab fa-facebook-f"></a></li>
                            <li><a href="<?php echo $linkedin; ?>" class="fab fa-linkedin"></a></li>
                            <li><a href="<?php echo $insta; ?>" class="fab fa-instagram"></a></li>
                            <li><a href="<?php echo $whatsapp; ?>" class="fab fa-whatsapp"></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>


        <div class="container-fluid management">
            <div class="container">
                <div class="row">
                    <div class=" col-lg-12 mt-2" style="color: white;">
                        <hr>
                        <p>Copyright 2021 All Right Reserved. Design and Developed by Centre of Technological Excellence.</p>
                    </div>

                </div>
            </div>
        </div>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

</body>

</html>