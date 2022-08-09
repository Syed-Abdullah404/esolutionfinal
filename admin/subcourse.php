<?php

include '../connection.php';

$val= $_GET['selectvalue'];

echo "<script>console.log($val); </script>";

    $select_owner="select * from admin_course where name='$val'";
    $run_select_owner=mysqli_query($conn,$select_owner);
    while($row=mysqli_fetch_assoc($run_select_owner)){
        echo " <option>".$row['code']."</option>";
    }



?>

