<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="date" name="date" >
        <input type="date" name="end_date" >
        <input type="time" name="start_time" >
        <input type="time" name="end_time" >
        <input type="submit" value="Submit" name="submit">
    </form>

    
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $date_now = date("Y-m-d"); // this format is string comparable
    $date=$_POST['date'];
    $end_date=$_POST['end_date'];
    $start_time=$_POST['start_time'];
    date_default_timezone_set('Asia/Karachi');
    $datetime = date('h:i:s');
   // echo $datetime;
    '<br><br>';
   
    echo $start_time;
     if($date = $date_now){
         if($start_time < $datetime){
            echo 'Wrong time';
         }else{ 
                if (($date > $date_now) || ( $end_date > $date_now)) {
                    echo 'greater than';
                    //echo $date_now;
                }else if (($date < $date_now) || ( $end_date < $date_now)){
                    echo 'Less than';
                }  
    }
 }
}


?>