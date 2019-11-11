<?include('inc/config.php');
include('inc/mysql.php');
include('inc/functions.php');
include('inc/auth.php');
include('inc/header.php');?>


<div class="container" style="padding: 10px 0 60px;">

<h1 style="margin-top:0;">Партнёрская программа</h1>
<p>Вы можете получать 20% <span class="text-muted" style="font-size: 12px;">(с округлением в вашу пользу)</span> от пополненных смс приглашённых вами пользователей на баланс СМС вашего аккаунта.</p> <p>Вы будете получать уведомления о регистрациях и пополнениях по СМС.</p>

<div class="text-center">
<div class="well" style="display:inline-block;margin:50px 0;">
<b>Ваша партнёрская ссылка:</b> <div><?if(!$auth){?><span class="text-muted">появится после <a href="lk" style="color:blue;">входа в систему</a></span><?}else{?><code>http://<?=$_SERVER['SERVER_NAME'];?>/p/<?=$account[id];?></code><?}?></div>
</div>
</div>

</div>
</div>
</div>
<?include('inc/footer.php');?>
