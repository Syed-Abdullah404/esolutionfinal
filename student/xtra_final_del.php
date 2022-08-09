<?php

include '../connection.php';

if(isset($_POST['delete_btn_set']))
{
    $del_id=$_POST['deleteid'];
    $sql="delete from student_xtra_final where id='$del_id'";
    mysqli_query($conn,$sql);
}

?>