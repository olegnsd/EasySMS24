<?if(!$configLoaded)die("direct access forbidden");

$mysqli=mysqli_connect($mysql_conf[host],$mysql_conf[user],$mysql_conf[pass],$mysql_conf['dbname'],$mysql_conf[port]);
mysqli_set_charset($mysqli, "utf8");//mysqli_query($mysqli,"SET NAMES utf8;");
mysqli_query($mysqli,"SET time_zone = '+03:00';");
