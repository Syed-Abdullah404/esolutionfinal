<?php

include '../connection.php';

if(isset($_POST['delete_btn_set']))
{
    $del_id=$_POST['deleteid'];

    $sql="delete from admin_faculty where id='$del_id'";
    mysqli_query($conn,$sql);
    
    if($sql){
   
        ?>
     <script>
     window.location="<?php echo $app_url .'admin/subject.php' ?>";
     </script>
     <?php
    }

}

?>