<?
function phone($phone) {
$resPhone = preg_replace("/[^0-9]/", "", $phone);
if (substr($resPhone,0,1) == 8) $resPhone[0] = 7;
return $resPhone;
}
include('ssms_su.php');
function sms($phone,$text){
$email = "hrm-militcorp";
$password = "63ghjz1y";
$r = smsapi_push_msg_nologin($email, $password, $phone, $text, array("sender_name"=>'EasySMS24'));
if($r[1])return true; else return false;
}

function usersms($phone,$text,$email,$password){
$r = smsapi_push_msg_nologin($email, $password, $phone, $text, array("sender_name"=>'EasySMS24'));
if($r[1])return true; else return false;
}
?>
