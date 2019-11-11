<?
date_default_timezone_set('Asia/Baghdad');//Europe/Moscow
setlocale(LC_ALL, 'ru_RU.utf8');
$mysql_conf['host']   = "localhost";
$mysql_conf['port']   = 3306;
$mysql_conf['user']   = "api.goip_sms";
$mysql_conf['pass']   = "QgbqTMEQUz";
$mysql_conf['dbname'] = "api.goip_sms";
$configLoaded=TRUE;
$limit=1000;
/*реф*/
if($_GET[ref]>0 & $_COOKIE["ref"]==0){
setcookie('ref',(int)$_GET[ref],time()+60*60*24*90,'/');
$_COOKIE["ref"]=(int)$_GET[ref];
}
/*/реф*/
?>
