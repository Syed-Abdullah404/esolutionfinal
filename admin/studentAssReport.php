<?php 

include '../connection.php';

define("TITLE","Student Assignment Report");
define("PAGE","Student Assignment Report");

include 'header.php';


?>


<div class="body-section">
<div class="container ">
         <div class="card ">
              <div class="card-header border-0">
                <h3 class="card-title display-6">Student Assignment Report</h3>
                <hr>
      <div class="container mt-1">
        <div class="row">
            <div class="col-md-10">
            <form action="" method="POST" class="d-print-none">
    <div class="form-row">
        <div class="form-group">
            <select name="name" id="name" class="form-control">
                <option>Select Name</option>
                <?php
                $query=mysqli_query($conn,"select * from admin_student");
                while($rows=mysqli_fetch_assoc($query)){
                    ?>
                    <option value="<?php echo $rows['id'] ?>"><?php echo $rows['name'] ?></option>
                    <?php
                }

                ?>
            </select>
        </div>
     
    </div>
 
            </div>
            <div class="col-md-4 mt-2">
            <input type="date" class="form-control" id="startdate" name="startdate">
            </div>
                  
            <div class="col-md-4 mt-2">
            <input type="date" class="form-control" id="enddate" name="enddate">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary mt-3" name="searchsubmit" value="Search">
            </div>
        </div>
  
        </form>

  
             
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
 if(isset($_REQUEST['searchsubmit'])){
    $name = $_REQUEST['name'];
    $startdate = $_REQUEST['startdate'];
    $enddate = $_REQUEST['enddate'];
    $sql = "SELECT * FROM student_xtra_assignment WHERE date BETWEEN '$startdate' AND '$enddate' AND stu_id='$name'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
    $course_name=$row['course'];
    $select_course=mysqli_query($conn,"select * from admin_course where id='$course_name'");
    $res=mysqli_fetch_assoc($select_course);
    $coursef=$res['name'];
     echo '
     <div class="container">
     <div class="row">

     <div class="col-md-2"></div>
     <div class="col-md-8">
    
  <p class=" bg-dark text-white mt-4 ml-5 text-center p-2">Details</p>
  
  <table class="table">
  <thead>
  <tr>
      <th scope="col"> ID</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Course</th>
      <th scope="col">File</th>
    </tr>
  </thead>
  <tbody>';
  while($row = $result->fetch_assoc()){
    echo '<tr>
    <th scope="row">'.$row["id"].'</th>
    <td>'.$row["name"].'</td>
    <td>'.$row["description"].'</td>
    <td>'.$coursef.'</td>
    <td>'.$row["stu_file"].'</td>
      </tr>';
    }
    echo '</tbody>
  </table>
  </div>
  </div>
  </div>
  ';
  } else {
    echo "<div class='alert alert-warning col-sm-4 ml-5 mt-2' role='alert' style='margin-left :150px;'> No Records Found ! </div>";
  }
 }
  ?>
  <?php 


include 'footer.php';


?>