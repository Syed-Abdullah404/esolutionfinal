<?php 
// session_start();
include '../connection.php';
include '../header.php';

define("TITLE","OTP");
define("PAGE","OTP");
//  if(isset($_SESSION['id'])){
//     $ids=$_SESSION['id'];
//  }else{
//      $ids='0';
//  }


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>OTP</title>
    <style>
        .sec_box{
            display:none;
        }
        span{
            color:red;
        }
        p{
            
            font-weight:500;
            font: 2em sans-serif;
        }
        ul li a:hover{
            background: #0B0452;
            color:#fff !important;
            border-radius:7px;
        }
        button{
            background: #0B0452;
            color:#fff !important;
            border-radius:7px;
            padding: 10px;
            border:none;
        }
        h1,p{
            color:#0B0452;
        }
       
    </style>
  </head>
  <body>
    
   

        <div class="container bg-light  shadow-lg p-3 mb-5 bg-body rounded" style="margin-top:150px;">
            <div class="col-md-6 mx-auto f_box">
            <h1 class="text-center mt-5">For User verification</h1><br>
            <form method="post">
                <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email.."><br>
                <span id="email_error"></span><br>
                <button type="button" class=" mt-1 mb-5" style="margin-left:230px;" onclick="send_otp();">Send OTP</button>
                
                </form>
            </div>

            <div class="col-md-6 mx-auto sec_box">
            <p class="text-center mt-5">Check Your Mail And Enter OTP HERE</p><br>
            <form method="post">
                <input type="number" name="otp" class="form-control" id="otp" placeholder="OTP"><br>
                <span id="otp_error"></span><br>
                <button type="button" class="mt-3" style="margin-left:200px;" onclick="check_otp();">Send OTP</button>
                
                </form>
            </div>

        </div>







    <!-- Optional JavaScript; choose one of the two! -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>

        function send_otp() {
            var email=$('#email').val();
            $.ajax({
            url: "send_otp.php",
            type: "post",         
            data: "email="+email,
          
            success: function (result) {
                if(result == 'yes'){
                    $('.sec_box').show();
                    $('.f_box').hide();
                }

                if(result == 'no'){
                    $('#email_error').html('Please Enter Valid Email Address !!!');
                    
                }
            }
        });
        }

        function check_otp() {
            var otp=$('#otp').val();
            $.ajax({
            url: "check_otp.php",
            type: "post",         
            data: "otp="+otp,
          
            success: function (result) {
                if(result == 'yes'){
                  
               window.location = "<?php echo $app_url .'student/profile.php?id='."$ids" ?>";
          
           
                }
                if(result == 'no'){
                   
                    $('#otp_error').html('Enter Correct OTP !!!');
                }
            }
        });
        }
        
    </script>
  </body>

  
</html>