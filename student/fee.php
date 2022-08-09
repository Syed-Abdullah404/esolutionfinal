<?php
error_reporting(0);
include '../connection.php';

define("TITLE", "Assignment");
define("PAGE", "Assignment");

include 'header.php';

?>

<script>
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;


    }
</script>
<div class="body-section">
    <div class="container">
        <div class="card" id="print">
            <div class="card-header border-0">
                <div class="row">

                    <div class="col-lg-12 text-center">
                        <img src="images/logo.png" alt="" height="100px" width="200px">

                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3 class="card-title display-5 mx-auto">Virtual Skills</h3>
                        <p><b>Email:</b> virtual.skill@gmail.com</p>
                        <p><b>Ph no:</b>03002121272</p>
                    </div>
                </div>
                <hr>
                <div class="container mt-1">
                    <!-- Button trigger modal -->
                    <div class="row">
                        <div class="col-lg-8">

                        </div>
                        <div class="col-lg-4 d-flex">


                        </div>
                    </div>
                    <div class="card-body  p-0">
                        <div class="row">
                            <div class="col-lg-12">

                                <?php


                                $id =  $_SESSION['id'];


                                ?>

                                <p><b>Student ID:</b>&nbsp;&nbsp;<?php echo $id; ?></p>
                                <?php
                                $sel_tname = mysqli_query($conn, "select name from admin_student where id='$id'");
                                while ($row =  mysqli_fetch_assoc($sel_tname)) {
                                    $student_name = $row['name'];
                                }

                                ?>
                                <p><b>Student Name:&nbsp;</b>&nbsp;<?php echo $student_name; ?> </p>

                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-12">
                                <table id="example" class="table table-striped table-responsive mx-10">
                                    <thead>
                                        <tr>
                                            <th>Assignment ID</th>
                                            <th>Name</th>
                                            <th>Ammount</th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $sel_tname = mysqli_query($conn, "select * from student_xtra_assignment where stu_id='$id'");
                                        while ($row =  mysqli_fetch_array($sel_tname)) {
                                            $ass_id = $row['ass_id'];
                                            $feeasi = $row['fee'];

                                        ?>
                                            <tr>
                                                <?php
                                        

                                               
                                                ?>
                                            
                                                    <td><?php echo $ass_id ;?></td>
                                                    <td><?php echo $student_name ;?></td>
                                                    <td><?php echo $feeasi ;?></td>

                                            </tr>
                                    <?php
                                              
                                            }

                                            
                                            
                                    ?>
                                    </tbody>




                                    <thead>
                                        <tr>
                                            <th>Quiz ID</th>
                                            <th>Name</th>
                                            <th>Ammount</th>


                                        </tr>
                                    </thead>

                                    <?php
                                    $sel_tname = mysqli_query($conn, "select * from student_xtra_quiz where stu_id='$id'");
                                    while ($row =  mysqli_fetch_array($sel_tname)) {
                                        $quiz_id = $row['quiz_id'];
                                        $feequiz = $row['fee'];

                                    ?>
                                        <tbody>

                                            <tr>
                                                <?php
                                         
                                                ?>
                                                    <td><?php echo $quiz_id ?></td>
                                                    <td><?php echo $student_name ?></td>
                                                    <td><?php echo $feequiz ?></td>

                                            </tr>
                                        </tbody>
                                <?php
                                                }
                                            
                                ?>



                                <thead>
                                    <tr>
                                        <th>Mids ID</th>
                                        <th>Name</th>
                                        <th>Ammount</th>


                                    </tr>
                                </thead>
                                <?php
                                $sel_tname = mysqli_query($conn, "select * from student_xtra_mid where stu_id='$id'");
                                while ($row =  mysqli_fetch_array($sel_tname)) {
                                    $mid_id = $row['mid_id'];
                                    $feemid = $row['fee'];

                                ?>
                                    <tbody>

                                        <tr>
                                            <?php
                                  
                                            ?>
                                                <td><?php echo $mid_id ?></td>
                                                <td><?php echo $student_name ?></td>
                                                <td><?php echo $feemid ?></td>

                                        </tr>
                                    </tbody>
                            <?php
                                            }
                                        
                            ?>
                            <thead>
                                <tr>
                                    <th>Final ID</th>
                                    <th>Name</th>
                                    <th>Ammount</th>


                                </tr>
                            </thead>

                            <?php
                            $sel_tname = mysqli_query($conn, "select * from student_xtra_final where stu_id='$id'");
                            while ($row =  mysqli_fetch_array($sel_tname)) {
                                $final_id = $row['final_id'];
                                $feefinal= $row['fee'];

                            ?>
                                <tbody>

                                    <tr>
                                        <?php
                                 
                                        ?>
                                            <td><?php echo $final_id ?></td>
                                            <td><?php echo $student_name ?></td>
                                            <td><?php echo $feefinal ?></td>

                                    </tr>
                                </tbody>

                        <?php
                                        }
                                    
                        ?>

                        <thead>
                            <tr>
                                <th>Project ID</th>
                                <th>Name</th>
                                <th>Ammount</th>


                            </tr>
                        </thead>

                        <?php
                        $sel_tname = mysqli_query($conn, "select * from student_xtra_project where stu_id='$id'");
                        while ($row =  mysqli_fetch_array($sel_tname)) {
                            $project_id = $row['project_id'];
                            $feeproject = $row['fee'];

                        ?>
                            <tbody>

                                <tr>
                                    <?php
                              
                                    ?>
                                        <td><?php echo $project_id ?></td>
                                        <td><?php echo $student_name ?></td>
                                        <td><?php echo $feeproject ?></td>

                                </tr>
                            </tbody>
                    <?php
                                    }
                                
                    ?>
                    <tfoot>
                        <?php
                        // $query = mysqli_query($conn, "select fee from student_xtra_assignment where stu_id='$id'");
                        // $total = 0;
                        // while ($row = mysqli_fetch_assoc($query)) {
                        //     $amount = $row['fee'];
                        //     $total = $total + $amount;
                        // }
                        $result = $feeasi + $feequiz + $feemid + $feefinal + $feeproject ;
                                            
                        // echo "<script>alert('$result')</script>";

                        ?>
                        <tr>
                            <td></td>
                            <td><b>Total Ammount:</b></td>
                            <td><?php echo $result ?></td>

                        </tr>

                    </tfoot>

                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- flex-item -->
        </div>


        <div class="row">
            <div class="col-lg-12 text-center mt-5">
                <button class="btn " type="submit" id="button-addon2" onclick="printContent('print')">Pay</button>
            </div>
        </div>
        <!-- /flex-container -->
    </div>
</div>
<!-- flex-item -->
</div>
<!-- /flex-container -->
</div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<!--  <footer class="footer fixed">
   © 2020 Elegent Admin by <a href="https://www.wrappixel.com/">wrappixel.com</a>
   </footer> -->
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->

<!--par Modal-->
<div class="modal fade" id="myModalFiles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Files</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <form method="POST" enctype="multipart/form-data">




                                <div class="form-group">

                                    <div class="form-group">
                                        <label class="fw-bold">Name:</label>
                                        <input type="text" name="name" class="form-control">
                                        <label class="fw-bold">Description:</label>
                                        <input type="text" name="decri" class="form-control">
                                        <label class="fw-bold">Course:</label>
                                        <?php
                                        $id_head = $_GET['id'];
                                        $select_stu_name = mysqli_query($conn, "select * from admin_student where id='$id_head'");
                                        $rows_stu_name = mysqli_fetch_assoc($select_stu_name);
                                        $stu_name = $rows_stu_name['name'];


                                        ?>
                                        <select class="form-select" name="course" style="width:465px;">
                                            <?php
                                            $sel_course = mysqli_query($conn, "select * from admin_student_course where student_name='$stu_name'");
                                            while ($row_course = mysqli_fetch_assoc($sel_course)) {
                                                $course_name = $row_course['course'];

                                                $sqli = "select * from admin_course where name='$course_name'";

                                                $sql = mysqli_query($conn, $sqli);
                                                while ($row = mysqli_fetch_assoc($sql)) {

                                            ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <label class="fw-bold">File:</label>
                                        <input type="file" name="filequiz" class="form-control">
                                        <label class="fw-bold">Start Time:</label>
                                        <input type="time" name="stime" class="form-control">
                                        <label class="fw-bold">End-Time:</label>
                                        <input type="time" name="etime" class="form-control">
                                        <label class="fw-bold">Start Date:</label>
                                        <input type="Date" name="sdate" class="form-control">
                                        <label class="fw-bold">End-Date:</label>
                                        <input type="Date" name="edate" class="form-control">


                                    </div>
                                    <div class="modal-footer bg-light">
                                        <button type="submit" class="btn btn-primary" name="addFile">Add </button>
                                    </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--delete-->

</div>


<!-- Del Project data-->
<script>
    $(document).ready(function() {
        $(".delete_btn_ajax").click(function(e) {
            e.preventDefault();
            var deleteid = $(this).closest('tr').find('.delete_id_value').val();
            // alert(deleteid);
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: "xtra_assignment_del.php",
                            data: {
                                "delete_btn_set": 1,
                                "deleteid": deleteid,
                            },
                            success: function(response) {
                                swal("Deleted!", "Your Data is Deleted", "success", {
                                    button: "Ok!",
                                }).then((result) => {
                                    location.reload();
                                });

                            }
                        });
                    }
                });

        });
    });
</script>

<?php
include 'footer.php';



if (isset($_POST['addFile'])) {
    $name = $_POST['name'];
    $quiz_id = $_GET['id'];

    $decri = $_POST['decri'];
    $stime = $_POST['stime'];
    $etime = $_POST['etime'];
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
    $course = $_POST['course'];

    $file = ($_FILES['filequiz']);
    //print_r($file);
    $file_name = $file['name'];
    $file_path = $file['tmp_name'];
    $file_error = $file['error'];
    $date_now = date("Y-m-d"); // this format is string comparable
    date_default_timezone_set('Asia/Karachi');
    $datetime = date('h:i:s');
    if ($sdate = $date_now) {
        if ($stime < $datetime) {
            echo "<script>alert('YOU CAN NOT SELECT PREVIOUS TIME') </script>";
        } else {
            if (($sdate >= $date_now) && ($edate >= $date_now)) {
                if ($file_error == 0) {
                    $destinaton = 'AssignmentFile/' . $file_name;
                    move_uploaded_file($file_path, $destinaton);
                    $id_head = $_GET['id'];
                    $sqli = mysqli_query($conn, "INSERT INTO `student_xtra_assignment`(`stu_id`, `ass_id`,`course`,`name`, `description`, `stu_file`, `start_time`, `end_time`, `start_date`, `end_date`,`date`) VALUES ('$id_head','$quiz_id','$course','$name','$decri','$destinaton','$stime','$etime','$sdate','$edate',NOW())");
                    //  if($sqli){
                    //    $select = mysqli_query($conn, "select * from admin_student ");

                    //    while ($row = mysqli_fetch_assoc($select)) {

                    //       $stu_email =$_POST['email'];
                    //    }

                    // $to_email="fix404error@gmail.com";
                    // $subject="Assignment Activity Request From Student";
                    // $body="hi Admin, $stu_email added a assignment..Check and response the request";
                    // $header="From: $stu_email";

                    // if (mail($to_email, $subject, $body, $header)) {
                    //     echo "<script> alert(' Your Request Has Been Sent To Admin Successfully..! ') </script>";
                    // } 
?>
                    <script>
                        window.location = "<?php echo $app_url . 'student/xtra_assignment.php?id=' . "$id" ?>";
                    </script>
                <?php
                    // }
                }
            } else {
                echo "<script>alert('YOU CAN NOT SELECT PREVIOUS DATE') </script>";
            }
        }
    } else {
        if (($sdate >= $date_now) && ($edate >= $date_now)) {
            if ($file_error == 0) {
                $destinaton = 'AssignmentFile/' . $file_name;
                move_uploaded_file($file_path, $destinaton);
                $id_head = $_SESSION['head_id'];
                $sqli = mysqli_query($conn, "INSERT INTO `student_xtra_assignment`(`stu_id`, `ass_id`,`course`,`name`, `description`, `stu_file`, `start_time`, `end_time`, `start_date`, `end_date`,`date`) VALUES ('$id_head','$quiz_id','$course','$name','$decri','$destinaton','$stime','$etime','$sdate','$edate',NOW())");
                if ($sqli) {

                    $stu_email = $_SESSION['student'];
                    $to_email = "check9404@gmail.com";
                    $subject = "Assignment Activity Request From Student";
                    $body = "hi, Admin $stu_email added a assignment ..Check and response the request";
                    $header = "From: $stu_email";

                    if (mail($to_email, $subject, $body, $header)) {
                        echo "<script> alert(' Your Request Has Been Sent To Admin Successfully..! ') </script>";
                    }
                ?>
                    <script>
                        window.location = "<?php echo $app_url . 'student/xtra_assignment.php?idas=' . "$quiz_id" ?>";
                    </script>
<?php
                }
            }
        } else {
            echo "<script>alert('YOU CAN NOT SELECT PREVIOUS DATE') </script>";
        }
    }
}
?>