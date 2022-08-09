<?php
include 'header.php';
include 'connection.php';
?>



    <!--contact-->

    <div class="bg5">
        <div class="container">
            <div class="row   mt-5 mb-5">


                <div class="col-lg-7">
                    <div class="container mt-5 text-center   ">
                        <br><br>

                        <h2 class="display-3">Get In Touch
                        </h2>
                        <hr>
                        <form id="contact-form" method="POST">

                            <div class="col-md-12 mt-5 ">
                                <input type="text" class="form-control" name="name" placeholder="Your Name" required="">
                            </div>
                            <div class="col-md-12 ">
                                <input type="email" class="form-control" name="email" placeholder="Email Address"
                                    required="">
                            </div>
                            <div class="col-md-12 mt-3 ">
                                <textarea class="form-control formcourse" style="height: 150px;" name="message"
                                    placeholder="Message" required=""></textarea>

                            </div>
                            <div class="col-md-12 mt-5 mb-5 text-center">
                                <button id="submit" type="submit" class="form-control mb-5 " name="submit">Send
                                    Message</button><br><br>

                            </div>

                    </div>
                </div>
                <div class="col-lg-5 mt-5">
                    <h1 class="display-3 mt-5">Contact Info</h1>
                    <hr>
                    <p style="font-size: 19px;" class="mt-5"><i class="fab fa-whatsapp"></i> 0303-*********</p>
                        <p style="font-size: 19px;"><i class="fa fa-phone"></i> 0303-********</p>
                    <p style="font-size: 19px;"><i class="fa fa-envelope"></i> <a href="">example@gmail.com</a></p>
                    
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