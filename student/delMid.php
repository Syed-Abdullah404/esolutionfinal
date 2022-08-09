<?php

include '../connection.php';

if(isset($_POST['delete_btn_set']))
{
    $del_id=$_POST['deleteid'];
    $sql="delete from student_xtra_mid where mid_id='$del_id'";
    mysqli_query($conn,$sql);
    if($sql){
        mysqli_query($conn,"delete from student_mids where id='$del_id'");
    }

}

?>