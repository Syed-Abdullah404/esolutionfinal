<?php

include '../connection.php';

if(isset($_POST['delete_btn_set']))
{
    $del_id=$_POST['deleteid'];
    $sql="delete from student_xtra_quiz where quiz_id='$del_id'";
    mysqli_query($conn,$sql);
    if($sql){
        mysqli_query($conn,"delete from studen_quiz where id='$del_id'");
    }

}

?>