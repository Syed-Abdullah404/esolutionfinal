<?php 

include '../connection.php';

define("TITLE","Products");
define("PAGE","Products");

include 'header.php';

?>


<div class="body-section">
<div class="container ">
         <div class="card ">
              <div class="card-header border-0">
                <h3 class="card-title display-6">About Us</h3>
                <hr>
      <div class="container mt-1">
     
    <form method="POST" enctype="multipart/form-data">
                        <div class="row mt-3">
                            <div class="col-md-12">
                            <label class="form-label display-6">About Picture:</label>

                                <input type="file" name="picture" class="form-control"/>
                            </div>
                            <?php
                            $query=mysqli_query($conn,"select * from company_about");
                            $row=mysqli_fetch_assoc($query);
                            $about=$row['about'];
                            ?>
                        <div class="col-md-12">
                            <label for="exampleInputpdes" class="form-label display-6">About:</label>
                            <div>
                            <textarea class="form-control"  id="exampleInputpdes" name="about"
                              >
                                <?php echo $about; ?>
                            </textarea>
                              <script>
                                  CKEDITOR.replace('exampleInputpdes');
                              </script>

                              </div>
                        </div>
                            <div class="row mt-3 mb-3">
                                <div class="col-lg-4 mx-auto">
                                    <input type="submit" id="btn3" class="form-control" name="save" value="Save">
                                    </div>
                            </div>
                        </div>
                </form>

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
 
    $file=($_FILES['picture']);
    //print_r($file);
    $file_name=$file['name'];
    $file_path=$file['tmp_name'];
    $file_error=$file['error'];
    $about=$_POST['about'];

    if($file_error == 0){
        $destinaton='company/'.$file_name;
        move_uploaded_file($file_path,$destinaton);
        $query="INSERT INTO `company_about`(`image`, `about`) VALUES ('$destinaton','$about')";
        $res=mysqli_query($conn,$query);
        if($res){
            echo "<script>alert('Your Company About Section has been created !!') </script>";
        }
}else{
    echo "<script>alert('Picture Error  !!') </script>";
}

}
?>