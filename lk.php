<?include('inc/config.php');
include('inc/mysql.php');
include('inc/functions.php');
include('inc/auth.php');
include('inc/header.php');
if($_POST[smsphone] & $_POST[smstext]){
$smsphone=phone($_POST[smsphone]);
if(usersms($smsphone,$_POST[smstext],$account[phone],$account[secret])){
$smsstatus=1;
$account=mysqli_fetch_assoc(mysqli_query($mysqli,"SELECT * FROM users WHERE id='".(int)$account[id]."' LIMIT 1;"));
}else{$smsstatus=-1;}
}
if($auth){?>
<div class="container" style="padding: 10px 0 60px;">
<div class="row">
<div class="col-md-8">
<div class="section-title" style="float:left;"> <h2 style="margin-bottom:30px;">Личный кабинет EasySMS24</h2> </div><div class="clearfix"></div>
<div class="alert alert-info">Не забывайте своевременно пополнять счёт. При малом количестве СМС на балансе вам будут высланы СМС уведомления.</div>
</div>
<div class="col-md-4">
<div class="text-center alert alert-<?if($account[balance]>100)echo('success'); else {if($account[balance]>50)echo('warning'); else {echo('danger');}}?>" style="font-size:18px;"><b>Баланс:</b> <?=number_format($account[balance],0);?> СМС</div>
<div class="text-center alert alert-<?if(($limit-$account[today])>50)echo('success'); else {if(($limit-$account[today])>10)echo('warning'); else {echo('danger');}}?>" style="font-size:18px;"><b>Суточный лимит:</b> <?=number_format($account[today],0);?> / <?=number_format($limit,0);?> СМС</div>
</div></div>


<div class="clearfix"></div>
<div class="row">
<div class="col-md-8"><?if(isset($_GET[afterPay])){?><div class="alert alert-success">Оплата будет зачислена сразу после получения подтверждения от сервера</div><?}?>
<?if($_POST[newsecret]){$secret=substr(md5(rand(0,9).rand(0,9).rand(5,50).rand(0,9).rand(0,9).rand(0,9)),rand(0,5),20);$account[secret]=$secret;mysqli_query($mysqli,'UPDATE `users` SET `secret` = \''.$secret.'\' WHERE `users`.`id` = '.(int)$account[id].';');?><div class="alert alert-success">Для вашего аккаунта был сгенерирован новый ключ API: <?=$secret;?></div><?}?>

<h2>Добавление SMS</h2><?if($account[balance]<100){?><div class="alert alert-warning">На вашем балансе <?=$account[balance];?> СМС. Рекомендуем пополнить.</div><?}?>
<div class="row">
<div class="col-md-9 changecol"><br><br><br>
  <div id="slider"></div>


<div id="itog" style="font-size:20px;line-height:58px;text-align:center;">17 СМС за 10 руб. (тариф 60 коп.)</div>
<!--div style="font-size:11px;text-align:center;"><a href="javascript:void(0);" style="color:#337ab7;" onclick="$('#slider').hide();$('#itog').hide();$('#itog2').addClass('form-control');$('.smsprices').hide();$('#itog2').attr('type','text');$(this).hide();$('.changecol').addClass('col-md-12').removeClass('col-md-9');$('.show2').show();">указать сумму пополнения вручную</a></div-->
<br><br>
<div class="text-center"><form method=post action="pay">
<input type="hidden" name="payphone" value="<?=$account[phone];?>">
<b style="display:none;" class="show2">Сумма пополнения в рублях</b>
<input type="hidden" id="itog2" style="margin-bottom:20px;" name="sum" value="10">
<button type="submit" class="btn btn-success btn-lg">Добавить количество SMS</button>
</form></div>
</div>
<div class="col-md-3 smsprices">
<div class="smsprice smsprice1 active">60 коп.<i>(при оплате до 1000 руб.)</i></div>
<div class="smsprice smsprice2">58 коп.<i>(при оплате от 1000 до 2000 руб.)</i></div>
<div class="smsprice smsprice3">56 коп.<i>(при оплате от 2000 до 3000 руб.)</i></div>
<div class="smsprice smsprice4">54 коп.<i>(при оплате от 3000 до 4000 руб.)</i></div>
<div class="smsprice smsprice5">52 коп.<i>(при оплате от 4000 до 5000 руб.)</i></div>
<div class="smsprice smsprice6">50 коп.<i>(при оплате от 5000 руб.)</i></div>
<p style="margin-top:15px;font-size:11px;">* 1 смс до 140 знаков. Сообщения транслитерируются на латиницу</p>
</div></div>

<script>
$(document).ready(function () {
jQuery("#slider").slider({
      value:10,
      min: 10,
      max: 8000,
      step: 10,
      slide: function( event, ui ) {
var price=0.6;$('.smsprice').removeClass('active');$('.smsprice1').addClass('active');var tar=60;
if(ui.value>=1000){price=0.58;tar=58;$('.smsprice').removeClass('active');$('.smsprice2').addClass('active');}
if(ui.value>=2000){price=0.56;tar=56;$('.smsprice').removeClass('active');$('.smsprice3').addClass('active');}
if(ui.value>=3000){price=0.54;tar=54;$('.smsprice').removeClass('active');$('.smsprice4').addClass('active');}
if(ui.value>=4000){price=0.52;tar=52;$('.smsprice').removeClass('active');$('.smsprice5').addClass('active');}
if(ui.value>=5000){price=0.50;tar=50;$('.smsprice').removeClass('active');$('.smsprice6').addClass('active');}
var col = Math.ceil(ui.value/price);
        jQuery( "#itog" ).html(''+col+' СМС за '+ui.value+' руб. (тариф '+tar+' коп.)' );
        jQuery( "#itog2" ).val(ui.value);
      }
    });

}); 
  </script>


<hr>
<h2>Отправка SMS</h2>
<div class="alert alert-info">Отправленные СМС будут вычтены из вашего баланса</div>
<form method=post>
<div class="form-group"><input type="number" class="form-control" name="smsphone" value="<?=$account[phone];?>" required></div>
<div class="form-group"><textarea class="form-control" name="smstext" required></textarea></div>
<?if($smsstatus==-1){?><div class="alert alert-danger">СМС не было отправлено из-за ошибки. Возможные причины: Кончился дневной лимит, Нет СМС на балансе</div><?}?>
<?if($smsstatus==1){?><div class="alert alert-success">СМС отправлено</div><?}?>
<button type="submit" class="btn btn-info">Отправить СМС</button>
</form>
<!--hr>
<h2>Статистика</h2>
<div class="alert alert-info">В данный момент статистика не собирается. Данный функционал будет добавлен в будущих версиях</div-->
</div>
<div class="col-md-4">
<div class="well">
<h4>Данные для доступа к API:</h4>
<b>Имя пользователя:</b><br><?=$account[phone];?><br>
<b>Ключ API:</b><br><?=$account[secret];?><br><br> <form method=post><input type="hidden" name="newsecret" value=1><button type="submit" class="btn">Сгенерировать новый ключ</button></form><br><div class="alert alert-info" style="padding:5px;font-size:12px;">Генерировать новый ключ необходимо только в случае если старый мог быть скомпрометирован</div>
</div>
<div class="well">
<a href="docs" style="color:blue;display: block;text-align: center;">Документация по API</a>
</div>
<div class="well">
<h4>Партнёрская ссылка:</h4> <div><?if(!$auth){?><span class="text-muted">появится после <a href="lk" style="color:blue;">входа в систему</a></span><?}else{?><code>http://<?=$_SERVER['SERVER_NAME'];?>/p/<?=$account[id];?></code><?}?></div>
<br><a href="partner" style="color:blue">Подробнее о партнёрской программе</a>
</div>
<div class="alert alert-info">
<b>Внимание: </b> использование сервиса для рассылки спама и рекламы строго запрещено и может привести к блокировке аккаунта.
</div>
</div>

</div>

</div>
<?}else{
?>
<div class="container" style="padding: 10px 0 60px;">
<div class="section-title"> <h2>Личный кабинет EasySMS24</h2> </div>
<?if(isset($_GET[afterPay])){?><div class="alert alert-success">Оплата будет зачислена сразу после получения подтверждения от сервера</div><?}?>
<div class="row">

<div class="col-md-5"><h2>Вход</h2>
<form action="lk" method="post"> 
<div class="form-group"> <input id="phone1" type="text" name="phone" class="form-control" placeholder="Номер телефона"> </div>

<div class="row"><div class="col-md-4"><div class="form-group"> <input type="number" name="pin" class="form-control" placeholder="ПИН"> </div></div>
<div class="col-md-8" id="btn1"><a class="btn btn-block btn-info submit-button" onclick="if($(this).hasClass('disabled'))return false;$('#btn1 a').addClass('disabled');$('.ajax1').load('ajaxreg.php?btn=1&phone='+encodeURI($('#phone1').val()),function(){$('#btn1 a').removeClass('disabled');});return false;">Получить новый ПИН на телефон</a></div>
</div>

<div class="ajax1"></div>
<?if($_POST[phone] | $_POST[pin]){?><div class="alert alert-danger">Введены неверные данные</div><?}?>

<button type="submit" class="btn btn-success submit-button">Войти</button> </form>
</div>



<div class="col-md-5 col-md-offset-2"><h2>Регистрация</h2>
<div class="form-group"> <input id="phone2" type="text" onkeyup="if(event.keyCode == 13){$('#btn2 button').click();}" name="phone" class="form-control" placeholder="Номер телефона"> </div>

<div id="btn2"><button type="submit" class="btn btn-success submit-button" onclick="if($(this).hasClass('disabled'))return false;$('#btn2 button').addClass('disabled');$('.ajax2').load('ajaxreg.php?btn=2&phone='+encodeURI($('#phone2').val()),function(){$('#btn2 button').removeClass('disabled');});return false;">Регистрация</button></div> </form><div class="ajax2" style="margin-top: 15px;"></div>
</div>
</div>

</div>
<?
}

include('inc/footer.php');?>
