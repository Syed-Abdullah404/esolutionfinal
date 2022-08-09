<?php
session_start(); 
include '../connection.php';
$otp=$_POST['otp'];
$email=$_SESSION['email'];

$sql=mysqli_query($conn,"select * from student_sign_up where email='$email' and otp='$otp'");
$count=mysqli_num_rows($sql);
if($count >0){
    $res=mysqli_fetch_assoc($sql);
    $id=$res['id'];
    $_GET['id']=$id;
    mysqli_query($conn,"update student_sign_up set otp='done' where email='$email'");
            
    echo "yes";
}else{
    echo "no";
}
?>