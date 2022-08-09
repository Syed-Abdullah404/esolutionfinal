<?php
include 'header.php';
include 'connection.php';

?>
    <div class="bg ">
        <div class="container">
            <div class="row ">
                <div class="col-lg-7 mt-5 mb-5  ">
                    <h1 class="heading1 mt-5">FULL SERVICE WEB DESIGN AGENCY</h1>
                    <p class="heading1">We are a team of web developers and designers. we can help you to make online
                        presence</p>
                        <div class="row">
                        <div class="dropdown col-lg-6">
                    <a href="esolution.php" ><button id="btn1"   class="btn btn-secondary " type="button" >E-Solution</button></a>
                    
                    
                    </div>
                    <div class="col-lg-6">
                     <a href="student.php"><button id="btn1">Student-Solution</button></a>
                    </div>
                
                </div>
                </div>
                <div class="col-lg-5 mt-5 mb-5 text-center">
                    <img src="images/bg.png" class="mt-5" alt="" height="90%" width="90%">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mt-5">
                <h1 class="display-4 mt-5" style="color: #0B0452;">About Us</h1>
            </div>
        </div>
        <div class="row mb-5 ">
            <div class="col-lg-6 col-md-12 mt-5 text-center">
                <div class="d-flex justify-content-center">

                <?php

                $select_team="select * from our_team";
                $run=mysqli_query($conn,$select_team);
                    while($row=mysqli_fetch_assoc($run)){
                        $designation=$row['designation'];
                        if($designation == 'CEO'){
                            $ceo_profile=$row['image'];
                            $ceo=$designation;
                            $ceo_name=$row['name'];
                        }else if($designation == 'Managing Director'){
                            $md=$designation;
                            $md_profile=$row['image'];
                            $md_name=$row['name'];
                        }
                    }

                ?>
                    <div class="owner shadow ">
                        <img src="admin/<?php echo $ceo_profile; ?>" alt="" height="170px" width="170px" style="border-radius: 100px;">
                        <h3 class="text-white mt-4"><?php echo $ceo_name; ?></h3>
                        <h2 class="text-white fw-bolder"><?php echo $ceo; ?></h2>
                        

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 mt-5 text-center">
                <div class="d-flex justify-content-center">

                    <div class="owner shadow ">
                    <img src="admin/<?php echo $md_profile; ?>" alt="" height="170px" width="170px" style="border-radius: 100px;">
                        <h3 class="text-white mt-4"><?php echo $md_name; ?></h3>
                        <h2 class="text-white fw-bolder"><?php echo $md; ?></h2>
                       

                    </div>
                </div>
            </div>
         </div>   
        <div class="row mt-4 mb-4">
            <div class="col-lg-6">
                <h2 style="color: #0B0452;">What is E-Solution?</h2>
                <h3>“High expectations are the key to absolutely everything.”</h3>
                <?php
                    $query="select * from company_about";
                    $result=mysqli_query($conn,$query);
                    $row=mysqli_fetch_assoc($result);
                    $about=$row['about'];
                ?>
                <p style="text-align: justify;">
                    <?php echo $about; ?>   
                </p>
            </div>
            <div class="col-lg-6">
                <img src="admin/<?php echo $row['image']; ?>" alt="profile" style="height:300px;" class="img-thumbnail"> 

            </div>
        </div>
    </div>


    <!--Courses-->
    <div class="bg7">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mt-5">
                <h1 class="heading display-3">Our Services</h1>
            </div>
        </div>
        <div class="row j">
        <?php
                $query=mysqli_query($conn,"select * from services limit 4");
                while($row=mysqli_fetch_assoc($query)){
                    $name=$row['name'];
                    $image=$row['image'];
                  
                    ?>
            <div class="col-lg-3 col-md-6 mt-5 text-center">
                <div class="d-flex justify-content-center">

                    <div class="course shadow ">
                        <div class="icon">
                            <img src="admin/<?php echo $image; ?>" alt="" height="100px" width="120px">
                        </div>
                        <h2 class="heading2 mt-4"><?php echo $name; ?></h2>


                    </div>
                </div>
            </div>
            <?php }?>
           
        </div>
        <div class="row">
            <div class="col-lg-12 mt-5 mb-5 text-center">
                <a href="esolution.php"><button id="btn3">More Services</button></a>
            </div>

        </div>
    </div>
</div>
    <div class="container">
        
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-5 mt-5" style="color: #0B0452; ">Our Team</h1>
            </div>
        </div>
        <div class="row mb-5 ">
            <?php
                $team="select * from our_team";
                $runs=mysqli_query($conn,$team);
                  while($rows=mysqli_fetch_assoc($runs)){
                      $name=$rows['name'];
                      $des=$rows['designation'];
                      $image=$rows['image'];
                      if(($des != 'CEO') && ($des != 'Managing Director')){

                    
                    ?>
        <div class="col-lg-6 col-md-12 mt-5 text-center">
                <div class="d-flex justify-content-center">

                    <div class="team shadow ">
                        <img src="admin/team/dp.jfif" alt="" height="150px" width="150px" style="border-radius: 100px;">
                        <h2 class="heading2 mt-4"><?php echo $name; ?></h2>
                        <h4><?php echo $des; ?></h4>
                        

                    </div>
                </div>
            </div>
                    <?php
                      }
                  }
            ?>
            
         
            </div> 

    </div>
    <div class="bg3 mb-5">
        <div class="container ">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="display-4 text-center" style="color: white; margin-top: 80px;">What our client says?</h1>
                </div>
            </div>
         
            <div class="row justify-content-center">

                <div class="col-lg-12  bg4">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            $query=mysqli_query($conn,"select * from testimonials");
                            while($row=mysqli_fetch_assoc($query)){
                                $name=$row['name'];
                                $testimonial=$row['testimonial'];
                        
                            ?>  
                            
                                  <div class="carousel-item  text-center active">
                                        <i class="fas fa-quote-left"></i>
                                        <p><?php echo $testimonial; ?></p>
                                        
                                            <h6 class="display-6 mt-5"><?php echo $name; ?></h6>
                              
                                    </div>
                                    <?php }?>          
                            
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    
                </div>
              
            </div>
         
        </div>
    </div>




    <!--contact-->

    <div class="bg5">
        <div class="container section-title">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="display-4 text-center mt-5">Get In Touch</h1>

                    <form id="contact-form" method="POST">
                        <div class="row">
                            <div class="col-md-6 ">
                                <input type="text" class="form-control" name="name" placeholder="Name" required="">
                            </div>
                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" rows="5" name="message" placeholder="Message"
                                required=""></textarea>
                        </div>
                        <div class="col-md-12 mb-5">
                            <button id="submit" type="submit" class="form-control" name="submit">Send Message</button>

                        </div>


                </div>

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

                            $sql=mysqli_query($conn,"select * from company_profile");
                            $row=mysqli_fetch_assoc($sql);


                            ?>
                        <ul class="social-icon">
                            <li><a href="<?php echo $row['fb']; ?>" class="fab fa-facebook-f"></a></li>
                            <li><a href="<?php echo $row['insta']; ?>" class="fab fa-instagram"></a></li>
                            <li><a href="<?php echo $row['linkedin']; ?>" class="fab fa-linkedin"></a></li>
                            <li>
                            <a  target="_blank" title="Contact Us On WhatsApp" href="https://web.whatsapp.com/send?phone=<?php echo  $row['whatsapp']; ?>&amp;text=Hi,Chat with esolutionprovider.."  class="fab fa-whatsapp"></a> 
                            </li>
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
<?php

    if(isset($_POST['submit'])){

        $name=$_POST['name'];
        $email=$_POST['email'];
        $message=$_POST['message'];
  
      
         	$to_email="check9404@gmail.com";
            $subject="$message";
            $body="hi Admin, $name added a message for you ..Check and response the message";
            $header="From: $email";

            if (mail($to_email, $subject, $body, $header)) {
                echo "<script> alert(' Your Message Has Been Sent To Admin Successfully..! ') </script>";
            } 
        }

?>