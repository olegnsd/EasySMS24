<?if(!$configLoaded)die("direct access forbidden");
session_start();
if(isset($_GET[logout])){
$_SESSION['PHP_AUTH_USER']="";
$_SESSION['PHP_AUTH_PW']="";
}
if(isset($_POST[phone])){
$_SESSION['PHP_AUTH_USER']=phone($_POST[phone]);
$_SESSION['PHP_AUTH_PW']=$_POST[pin];
}$auth=TRUE;
if (!isset($_SESSION['PHP_AUTH_USER'])){
$auth=FALSE;
}else{
$account=mysqli_fetch_assoc(mysqli_query($mysqli,"SELECT * FROM users WHERE phone='".mysqli_escape_string($mysqli,$_SESSION['PHP_AUTH_USER'])."' LIMIT 1;"));
if($account[password]==''){$auth=FALSE;$account=array();}
if($_SESSION['PHP_AUTH_PW'] !== $account[password]){$auth=FALSE;}
}
if(isset($_GET[logout]))session_destroy();
?>
