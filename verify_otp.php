<?php
session_start();
$con=mysqli_connect("localhost","root","","adhi_db");
$otp=$_POST['otp'];
$phone=$_SESSION['phone'];
$sql=mysqli_query($con,"SELECT * from otp_verify where phone='$phone' and otp='$otp'");
$count=mysqli_num_rows($sql);
if($count>0)
{
    mysqli_query($con,"UPDATE otp_verify set otp='' where phone='$phone'");
    $_SESSION['phone']=$phone;
    echo "yes";
    
}
else
{
    echo "no";
}
?>