<?include('inc/config.php');
include('inc/mysql.php');
include('inc/functions.php');
//include('inc/auth.php');
$phone=phone($_GET[phone]);
if($phone){
if((substr($phone,0,1)==7) & strlen($phone)==11){
$test=mysqli_fetch_assoc(mysqli_query($mysqli,"SELECT * FROM users WHERE phone='".mysqli_escape_string($mysqli,$phone)."' LIMIT 1;"));
if($test[phone]){
$pass=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
mysqli_query($mysqli,'UPDATE `users` SET `password` = \''.$pass.'\' WHERE `users`.`id` = '.(int)$test[id].';');
if(sms($phone, "ПИН для доступа к EasySMS24: ".$pass)){
?><div class="alert alert-success">Новый ПИН отправлен на ваш телефон</div><script>$('#btn<?=(int)$_GET[btn];?>').html('<a class="btn disabled btn-block btn-info submit-button">.....</a>');</script><?}else{?><div class="alert alert-danger">Произошла ошибка при отправке СМС. Попробуйте ещё раз.</div><?}}else{
$pass=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
$secret=substr(md5(rand(0,9).rand(0,9).rand(5,50).rand(0,9).rand(0,9).rand(0,9)),rand(0,5),20);
mysqli_query($mysqli,'INSERT INTO `users` (`id`, `phone`, `password`, `balance`, `notifyflag`, `secret`,`referal`) VALUES (NULL, \''.$phone.'\', \''.$pass.'\', \'0\', \'0\', \''.$secret.'\',\''.(int)$_COOKIE['ref'].'\');');
if($_COOKIE['ref']>0){
$test2=mysqli_fetch_assoc(mysqli_query($mysqli,"SELECT * FROM users WHERE id='".(int)$_COOKIE['ref']."' LIMIT 1;"));
if($test2[id]){
sms($test2[phone], "По вашему приглашению зарегистрировался пользователь (*".substr($phone,-4).") в EasySMS24. Вы будете получать 20% от его пополнений");
}
}
if(sms($phone, "ПИН для доступа к EasySMS24: ".$pass)){?><div class="alert alert-success">Ваш аккаунт создан. ПИН для входа отправлен на ваш телефон</div><script>$('#btn<?=(int)$_GET[btn];?>').html('<a class="btn disabled btn-block btn-info submit-button">.....</a>');</script><?}else{?><div class="alert alert-danger">Произошла ошибка при отправке СМС. Попробуйте ещё раз.</div><?}}
}else{if(strlen($phone)==11){?><div class="alert alert-danger">Разрешена регистрация только номерам из России</div><?}else{?><div class="alert alert-danger">Неверный формат номера</div><?}}
}else{?><div class="alert alert-danger">Не введён номер телефона</div><?}
?>
