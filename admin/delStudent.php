<?php

include '../connection.php';

if(isset($_POST['delete_btn_set']))
{
    $del_id=$_POST['deleteid'];
    $teacher=mysqli_query($conn,"select * from admin_student where id='$del_id'");
    $row=mysqli_fetch_assoc($teacher);
    $name=$row['name'];
    $sql="delete from admin_student where id='$del_id'";
    mysqli_query($conn,$sql);
    
    if($sql){
        mysqli_query($conn,"delete from admin_student_course where student_name='$name'");
        ?>
     <script>
     window.location="<?php echo $app_url .'admin/studentpro.php' ?>";
     </script>
     <?php
    }

}

?>