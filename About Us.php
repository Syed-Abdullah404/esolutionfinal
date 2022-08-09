<?php
    include 'header.php';
    include 'connection.php';
?>
    
        <div class="container mt-5">
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
                        <img src="admin/<?php echo $image; ?>" alt="" height="150px" width="150px" style="border-radius: 100px;">
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
                                <div class="carousel-item  text-center active">
                                    <i class="fas fa-quote-left"></i>
                                    <h4>My Self a student. I got solutions related <br> to my project.  Highly Recomended website for <br> student. Thanks Alot.</h4>
                                       
                                        <h6 class="display-6 mt-5">Bader Alkandari</h6>
                                </div>
                                <div class="carousel-item text-center">
                                    <i class="fas fa-quote-left"></i>
                                    <h4>Interface of website was very easy. <br> All the courses are categorized so they are easy to find and <br> it is very helpful.</h4>
                                        
                                        <h6 class="display-6 mt-5">Fahad Alotaibi</h6>
                                </div>
                                <div class="carousel-item text-center">
                                    <i class="fas fa-quote-left"></i>
                                    <h4>Solutions are to the point. They are <br> very concise so very easy to get information related to your <br> question easily.</h4>
                                        
                                        <h6 class="display-6 mt-5">Badar Alanzi</h6>
                                </div>
                                <div class="carousel-item text-center">
                                    <i class="fas fa-quote-left"></i>
                                    <h4>Criteria of posting solutions is very easy. Easy to deliver your knowledge <br> to your students.</h4>
                                        
                                        <h6 class="display-6 mt-5">Omar Afailakawi</h6>
                                </div>
                                <div class="carousel-item text-center">
                                    <i class="fas fa-quote-left"></i>
                                    <h4>I wanted to start web development but could not find easy solutions until this one.</h4>
                                        
                                        <h6 class="display-6 mt-5">Farah Almutairi</h6>
                                </div>
                                <div class="carousel-item text-center">
                                    <i class="fas fa-quote-left"></i>
                                    <h4>Here's the best solution found through E-Solutions for my Assignment Work.</h4>
                                        
                                        <h6 class="display-6 mt-5">Nasser Algamidi</h6>
                                </div>
                                <div class="carousel-item text-center">
                                    <i class="fas fa-quote-left"></i>
                                    <h4>I wanted to learn photoshop and illustrator <br>
                                         to create logos but could not find beginners tutorial until I checked <br> E-Solutions</h4>
                                        
                                        <h6 class="display-6 mt-5">Momin Mubashir</h6>
                                </div>
                                <div class="carousel-item text-center">
                                    <i class="fas fa-quote-left"></i>
                                    <h4>E solutions is worth much more than I paid. We're loving it.</h4>
                                        
                                        <h6 class="display-6 mt-5">Sara Almadlaj</h6>
                                </div>
                                <div class="carousel-item text-center">
                                    <i class="fas fa-quote-left"></i>
                                    <h4>E solutions did exactly what you said it does. Really good.</h4>
                                        
                                        <h6 class="display-6 mt-5">Saud Alotaibi</h6>
                                </div>
                                <div class="carousel-item text-center">
                                    <i class="fas fa-quote-left"></i>
                                    <h4>I couldn't have asked for more than this. If you aren't sure, always <br> go for e solutions.</h4>
                                        
                                        <h6 class="display-6 mt-5">Ibrahim Alajmi</h6>
                                </div>
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

    <!--footer-->
    <div class="container-fluid management">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-5 text-center   ">
                    <h2 id="managementheading" class="display-4">
                        Social Media
                    </h2>

                    <ul class="social-icon">
                        <li><a href="" class="fab fa-facebook-f"></a></li>
                        <li><a href="" class="fab fa-twitter"></a></li>
                        <li><a href="" class="fab fa-instagram"></a></li>
                        <li><a href="" class="fab fa-youtube"></a></li>
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
                    <p>Copyright 2021 All Right Reserved. Design and Developed by Centre of Technological Excellence.
                    </p>
                </div>

            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>