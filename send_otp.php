<?php
session_start();
$con=mysqli_connect("localhost","root","","adhi_db");
$phone=$_POST['phone'];
$sql=mysqli_query($con,"SELECT * from otp_verify where phone='$phone'");
$count=mysqli_num_rows($sql);
if($count>0)
{
    $otp=rand(1000,9999);
    mysqli_query($con,"UPDATE otp_verify set otp='$otp' where phone='$phone'");
    $html="Your otp is :".$otp;
    $_SESSION['phone']=$phone;
     
    
    $api_key = '####'; // API Key
	$req = "https://2factor.in/API/V1/".$api_key."/SMS/".$phone."/".$otp;

	$sms = file_get_contents($req);
	$sms_status = json_decode($sms, true);
	if($sms_status['Status'] !== 'Success') {
		$err['error'] = 'Could not send OTP to '.$phone;
	}

   
    echo "yes";
}
else
{
    echo "not_exist";
}
