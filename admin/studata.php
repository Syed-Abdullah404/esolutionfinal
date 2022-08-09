<?php
include '../connection.php';
$val= $_GET['selectvalue'];


    $select="select * from admin_student_course where student_name='$val'";
    $run=mysqli_query($conn,$select);
    while($result=mysqli_fetch_assoc($run)){
    $cid=$result['course'];
    $sql=mysqli_query($conn,"select * from admin_course where id='$cid'");
    $row=mysqli_fetch_assoc($sql);
        
   
?>
                <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>       
<?php
                    }
             
            ?>
            
            
        </table>
   
    <?php


?>

