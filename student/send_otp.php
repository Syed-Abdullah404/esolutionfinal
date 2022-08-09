<?php 

include '../connection.php';
$email=$_POST['email'];

$sql=mysqli_query($conn,"select * from student_sign_up where email='$email'");
$count=mysqli_num_rows($sql);
if($count >0){
    $otp=rand(11111,99999);
    $_SESSION['email']=$email;
    mysqli_query($conn,"update student_sign_up set otp='$otp' where email='$email'");
    
            $to_email=$email;
            $subject=" OTP For Email Verification ";
            $body=" Your OTP code for confirmation is .'$otp'.";
            $header="From: check9404@gmail.com";

            if (mail($to_email, $subject, $body, $header)) {
              
            } 
            echo "yes";
}else{
    echo "no";
}
?>