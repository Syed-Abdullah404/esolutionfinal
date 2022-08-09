<?php 

include '../connection.php';

define("TITLE","Terms & Conditions");
define("PAGE","Terms & Conditions");

include 'header.php';

?>


<div class="body-section">
<div class="container ">
         <div class="card ">
              <div class="card-header border-0">
                <h3 class="card-title display-6">Terms & Conditions</h3>
                <hr>
      <div class="container mt-1">
     

                        <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="exampleInputpdes" class="form-label display-6">Terms & Conditions:</label>
                            <div>
                            <textarea class="form-control"  id="exampleInputpdes" name="exampleInputpdes"
                              ></textarea>
                              <script>
                                  CKEDITOR.replace('exampleInputpdes');
                              </script>

                              </div>
                        </div>
                        </div>


                        <div class="row mt-3 mb-3">
                           <div class="col-lg-4">

                           </div>
                            <div class="col-lg-4 ">
                            <input type="submit" id="btn3" class="form-control  " 
                                    name="save" value="Save">
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

?>