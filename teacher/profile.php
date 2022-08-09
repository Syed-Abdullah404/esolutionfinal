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
define("TITLE","Profile");
define("PAGE","Profile");

include 'header.php';

?>


<div class="body-section">
<div class="container ">
         <div class="card ">
              <div class="card-header border-0">
                <h3 class="card-title display-6">Profile</h3>
                <hr>
      <div class="container mt-1">
     

      <form id="contact-form" class="studentform" method="POST">
                        <div class="row">
                        <div class="col-md-6 ">
                                <label for="exampleInputName" class="form-label">Name:</label>
                                <input type="name" class="form-control  mt-0 mb-0" id="exampleInputName "
                                    name="name" placeholder="Name">
                            </div>
                            <div class="col-md-6 ">
                                <label for="exampleInputImage" class="form-label">Image:</label>
                                <input type="file" class="form-control  mt-0 mb-0" id="exampleInputImage "
                                    name="image" placeholder="Image">
                            </div>
                            <div class="col-md-6 ">
                                <label for="exampleInputEmail" class="form-label">Email:</label>
                                <input type="email" class="form-control  mt-0 mb-0" id="exampleInputEmail "
                                    name="email" placeholder="Email">
                            </div>
                            <div class="col-md-6 ">
                                <label for="exampleInputPhone" class="form-label">Ph#.:</label>
                                <input type="Phone" class="form-control  mt-0 mb-0" id="exampleInputPhone "
                                    name="Phone" placeholder="Ph#.">
                            </div>
                            <div class="col-md-6 ">
                                <label for="exampleInputpassword" class="form-label">Password:</label>
                                <input type="password" class="form-control  mt-0 mb-0" id="exampleInputpassword"
                                    name="password" placeholder="Password">
                            </div>
                           
                            <div class="col-md-6 ">
                                <label for="exampleInputCNIC" class="form-label">CNIC:</label>
                                <input type="CNIC" class="form-control  mt-0 mb-0" id="exampleInputCNIC"
                                    name="CNIC" placeholder="CNIC">
                            </div>
                            <div class="col-md-12">
                                <label for="exampleInputAddress" class="form-label">Current Address:</label>
                                <input type="address" class="form-control  mt-0 mb-0" id="exampleInputAddress"
                                    name="address" placeholder="Current Address">
                            </div>
                            
                        </div>
                        <div class="col-md-12 ">
                            <label for="exampleInputCourse" class="form-label">Course:</label>
                            <select id="exampleInputCourse" class="form-select">
                                <option selected>Select Your Course</option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                            <script type="text/javascript">
                                function ShowHideDivC(coursechckbox) {
                                    var courseothersbox = document.getElementById("courseothersbox");
                                    courseothersbox.style.display = coursechckbox.checked ? "block" : "none";
                                }
                            </script>
                            
                            <input type="checkbox" class="form-check-input" style="height: 20px; width: 20px;"  id="coursechckbox" onclick="ShowHideDivC(this)" />
                            <label for="coursechckbox"   class="form-check-label" style="margin-top: 5px; font-size: 15px;">
                            Others
                            </label>
                        
                            
                            <div id="courseothersbox" style="display: none">
                               
                                <input type="text" class="form-control" placeholder="Others" id="courseothers" />
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <label for="exampleInputSubject" class="form-label">Subject:</label>
                            <select id="exampleInputSubject" class="form-select">
                                <option selected>Select Your Subject</option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                            <script type="text/javascript">
                                function ShowHideDivS(subjectchckbox) {
                                    var subjectothersbox = document.getElementById("subjectothersbox");
                                    subjectothersbox.style.display = subjectchckbox.checked ? "block" : "none";
                                }
                            </script>
                            
                            <input type="checkbox" class="form-check-input" style="height: 20px; width: 20px;"  id="subjectchckbox" onclick="ShowHideDivS(this)" />
                            <label for="subjectchckbox"   class="form-check-label" style="margin-top: 5px; font-size: 15px;">
                            Others
                            </label>
                        
                            
                            <div id="subjectothersbox" style="display: none">
                               
                                <input type="text" class="form-control" placeholder="Others" id="subjectothers" />
                            </div>
                        </div>
                       
                        
                        
                            
                        <div class="col-lg-12 mb-5 mt-2 text-center mt-4">
                        <a href="#"><button id="button-addon2" class="px-4 py-2 rounded-3" type="submit" name="submit">Next &#10132;</button></a>

                    </div>
                    </form>
                   
                            </div>

  
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

?>