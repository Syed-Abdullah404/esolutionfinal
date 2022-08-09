<?php 
define("TITLE","Products");
define("PAGE","Products");

include 'header.php';

?>


<div class="body-section">
<div class="container ">
         <div class="card ">
              <div class="card-header border-0">
                <h3 class="card-title display-6">Payment Method</h3>
                <hr>
      <div class="container mt-1">
      <div class="row">
                  <div class="col-lg-9">
                    <div class="input-group ">
                    <div class="form-outline">
                      <input type="search" id="form1" class="form-control" placeholder="Search">
                     
                    </div>
                    <button type="button" class="btn" id="button-addon2" >
                      <i class="fas fa-search"></i>
                    </button>
</div>
                  </div>
                  <div class="col-lg-3">
              
      
                  <button type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-lg float-right mb-3" >
        Add Payment Method
        </button>
</div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-light">
          <h4 class="modal-title " id="exampleModalLabel">Add Payment Method</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" >
                <div class="form-group">
                
                
                    <label class="fw-bold">Name:</label>
                    <input type="text" class="form-control mb-2" placeholder=" Name" name="name">
                    <label class="fw-bold">API Key:</label>
                    <input type="number" class="form-control mb-2" placeholder=" API Key" name="api"> 

                    <label for="exampleInputpdes" class="form-label">Status:</label>
                         <select name="" class="form-select" id="exampleInputpdes">
                             <option value="">Active</option>
                             <option value="">Inactive</option>
                         </select>
                    
                    
                
                
           
                </div>
                <div class="modal-footer bg-light">
                <input type="submit" id="btn3" class="form-control  " 
                                    name="save" value="Save">
                </div>
            </form>
        </div>
       
      </div>
    </div>
  </div>
</div>
     




 


  
              <div class="card-body table-responsive p-0">
              <div class="row">
                  <div class="col-lg-12">
                <table id="example" class="table table-striped  mx-10">
                  
                  <thead>
                     <tr>
                          <th>ID</th>
                          <th>Name</th>
                        <th>API Key</th>
                          <th>Status</th>
                          
                         
                          <th>Operations</th>                         
                     </tr>
                                            </thead>
                                            <tbody>
                                            
                                                     <tr>
                                                   <td>1</td>
                                                    <td>name </td>
                                                   <td>00000</td>
                                                    <td>Active</td>
                                                  
                                                   
                                                    <td>
  
                                                      <div class="action">
                                                            <button class="btn btnaction btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                              Action
                                                            </button>
                                                            <ul class="dropdown-menu p-0">
                                                           
                                                            <li class="dropdown-item" data-bs-toggle="modal" data-bs-target="#myModalEdit">   <i class="far fa-edit"></i>  Edit</li>
                                                            <li class="dropdown-item" data-bs-toggle="modal" data-bs-target="#myModalDelete"><i class="fas fa-trash-alt"></i>      Delete</li>
                                                           
    
                                                  </ul>
                                                          </div>
                                                        


                                                       
                                                    </td>
                                                </tr>
                                                <tr>
                                                   <td>1</td>
                                                    <td>name </td>
                                                    <td>00000</td>
                                                    <td>Inactive</td>
                                                  
                                                   
                                                    <td>
  
                                                      <div class="action">
                                                            <button class="btn btnaction btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                              Action
                                                            </button>
                                                            <ul class="dropdown-menu p-0">
                                                           
                                                            <li class="dropdown-item" data-bs-toggle="modal" data-bs-target="#myModalEdit">   <i class="far fa-edit"></i>  Edit</li>
                                                            <li class="dropdown-item" data-bs-toggle="modal" data-bs-target="#myModalDelete"><i class="fas fa-trash-alt"></i>      Delete</li>
                                                           
    
                                                  </ul>
                                                          </div>
                                                        


                                                       
                                                    </td>
                                                </tr>
                                                <tr>
                                                   <td>1</td>
                                                    <td>name </td>
                                                    <td>00000</td>
                                                    <td>Active</td>
                                                  
                                                   
                                                    <td>
  
                                                      <div class="action">
                                                            <button class="btn btnaction btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                              Action
                                                            </button>
                                                            <ul class="dropdown-menu p-0">
                                                           
                                                            <li class="dropdown-item" data-bs-toggle="modal" data-bs-target="#myModalEdit">   <i class="far fa-edit"></i>  Edit</li>
                                                            <li class="dropdown-item" data-bs-toggle="modal" data-bs-target="#myModalDelete"><i class="fas fa-trash-alt"></i>      Delete</li>
                                                           
    
                                                  </ul>
                                                          </div>
                                                        


                                                       
                                                    </td>
                                                </tr>
                                            </tbody>
                </table>
                </div>
                </div>


                <div class="row mt-2">
            <div class="col-lg-4">
                <p>Showing 1 to 5 of 5 entries</p>
            </div>
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4 ">
            <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
            </div>
        </div>
              </div>
            </div>
              </div>
            </div>
            <div class="modal fade" id="myModalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Teacher</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container">

      <p>Are you sure want to delete the record?</p>
                <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn " id="button-addon2">Yes</button>
      </div>
            </form>
</div>
        
      </div>
     
    </div>
  </div>
</div>




<div class="modal fade" id="myModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Payment Method</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" >
                <div class="form-group">
                
                
                    <label class="fw-bold">Name:</label>
                    <input type="text" class="form-control mb-2" placeholder=" Name" name="name">
                    <label class="fw-bold">API Key:</label>
                    <input type="number" class="form-control mb-2" placeholder=" API Key" name="api">                 
                    <label for="exampleInputpdes" class="form-label">Status:</label>
                         <select name="" class="form-select" id="exampleInputpdes">
                             <option value="">Active</option>
                             <option value="">Inactive</option>
                         </select>
                    
</div>
                
                
           
                </div>
                <div class="modal-footer bg-light">
                <input type="submit" id="btn3" class="form-control  " 
                                    name="save" value="Save">
                </div>
            </form>
        </div>
        
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
        
        </div>
      
    </div>




    </div>






<?php 


include 'footer.php';

?>