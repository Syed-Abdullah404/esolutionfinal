<?php 

include '../connection.php';

define("TITLE","Company Profile");
define("PAGE","Company Profile");

include 'header.php';


?>


<div class="body-section">
<div class="container ">
         <div class="card ">
              <div class="card-header border-0">
                <h3 class="card-title display-6">Company Profile</h3>
                <hr>
 <div class="container mt-1">
     

   <div class="row mt-3">
         <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <h2 class="text-center">Company Information</h2>
                    <label class="fw-bold">Name:</label>
                    <input type="text" class="form-control mb-2" placeholder=" Name" name="name">

                    <label class="fw-bold">Logo:</label>
                    <input type="file" name="picture" class="form-control mb-2">

                    <h2 class="text-center">Contact</h2>
                    <label class="fw-bold">Phone No:</label><br>
                    <input type="text" class="form-control mb-2" placeholder="Ph no." name="ph">

                    <label class="fw-bold">E-mail:</label><br>
                    <input type="email" class="form-control mb-2" placeholder="E-mail" name="email">

                    <label class="fw-bold ">Address:</label>
                    <textarea class="form-control mb-2" name="address"></textarea>

                    <h2 class="text-center">Social Media</h2>
                     <label class="fw-bold">Facebook:</label><br>
                    <input type="text" class="form-control mb-2" placeholder="www.facebook.com" name="fb">

                    <label class="fw-bold">Instagram:</label><br>
                    <input type="text" class="form-control mb-2" placeholder="www.instagram.com" name="insta">
                    
                    <label class="fw-bold">Whatsapp:</label><br>
                    <input type="text" class="form-control mb-2" placeholder="Whatsapp Number" name="whatsapp">

                    <label class="fw-bold">LinkedIn:</label><br>
                    <input type="text" class="form-control mb-2" placeholder="www.linkedin.com" name="linkedin">
                    
                    <input type="submit" id="btn3" class="form-control  " 
                                        name="save" value="Save">
                </div>
                
            </form>
                        </div>


                        <div class="row mt-3 mb-3">
                           <div class="col-lg-4">

                           </div>
                              
                            <div class="col-lg-4">

                            </div>

                        </div>



    </div>

</from>


  
              <div class="card-body table-responsive p-0">
                
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






<?php 


include 'footer.php';


    if(isset($_POST['save'])){
        $company_name=$_POST['name'];
        $file=($_FILES['picture']);
        //print_r($file);
        $file_name=$file['name'];
        $file_path=$file['tmp_name'];
        $file_error=$file['error'];
        $phone=$_POST['ph'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $fb=$_POST['fb'];
        $insta=$_POST['insta'];
        $whatsapp=$_POST['whatsapp'];
        $linkedin=$_POST['linkedin'];
        if($file_error == 0){
            $destinaton='company/'.$file_name;
            move_uploaded_file($file_path,$destinaton);
            $query="INSERT INTO `company_profile`(`name`, `logo`, `phone`, `email`, `address`, `fb`, `insta`, `whatsapp`, `linkedin`) VALUES ('$company_name','$destinaton','$phone','$email','$address','$fb','$insta','$whatsapp','$linkedin')";
            $res=mysqli_query($conn,$query);
            if($res){
                echo "<script>alert('Your Company Profile has been created !!') </script>";
            }
    }else{
        echo "<script>alert('Picture Error  !!') </script>";
    }

}
?>