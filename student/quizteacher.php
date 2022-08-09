<?php

include '../connection.php';

$val= $_GET['selectvalue'];

    $select_owner="select * from admin_teacher_course where course='$val'";
    $run_select_owner=mysqli_query($conn,$select_owner);
    while($row=mysqli_fetch_assoc($run_select_owner)){
        echo " <option>".$row['teacher_name']."</option>";
    }



?>