<?include('inc/config.php');
include('inc/mysql.php');
include('inc/functions.php');
include('inc/auth.php');
if($account[phone])$formphone=$account[phone];
if($_GET[phone])$formphone=phone($_GET[phone]);
$test0=mysqli_fetch_assoc(mysqli_query($mysqli,"SELECT * FROM users WHERE phone='".mysqli_escape_string($mysqli,$formphone)."' LIMIT 1;"));
if($test0[phone]==''){
die('404 Page not found');header("HTTP/1.0 404 Not Found");
}

if($_POST[payphone]!='' & $_POST[sum]>0){
$phone=phone($_POST[payphone]);
$test=mysqli_fetch_assoc(mysqli_query($mysqli,"SELECT * FROM users WHERE phone='".mysqli_escape_string($mysqli,$phone)."' LIMIT 1;"));
if($test[phone]){
$merchant_id = '74327';
$secret_word = '9f599mom';
$order_id = $test[phone];
$order_amount = $_POST[sum];
$sign = md5($merchant_id.':'.$order_amount.':'.$secret_word.':'.$order_id);
$paymentUrl = 'http://www.free-kassa.ru/merchant/cash.php?m='.$merchant_id.'&oa='.$order_amount.'&o='.$order_id.'&s='.$sign.'&lang=ru&i=&em=';
header('Location:'.$paymentUrl);die();
}else{$err='Аккаунт не найден';}
}

include('inc/header.php');?>
<div class="container" style="padding: 10px 0 60px;">
<div class="section-title"> <h2>Добавление SMS Пользователю <?=$formphone;?> на баланс</h2> </div>
<?if($err)echo('<div class="alert alert-danger">'.$err.'</div>');?>
<div class="row">
<div class="col-md-9 changecol"><br><br><br>
  <div id="slider"></div>


<div id="itog" style="font-size:20px;line-height:58px;text-align:center;">17 СМС за 10 руб. (тариф 60 коп.)</div>
<!--div style="font-size:11px;text-align:center;"><a href="javascript:void(0);" style="color:#337ab7;" onclick="$('#slider').hide();$('#itog').hide();$('#itog2').addClass('form-control');$('.smsprices').hide();$('#itog2').attr('type','text');$(this).hide();$('.changecol').addClass('col-md-12').removeClass('col-md-9');$('.show2').show();">указать сумму пополнения вручную</a></div-->
<br><br>
<div class="text-center"><form method=post action="pay">
<input type="hidden" name="payphone" value="<?=$formphone;?>">
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
</div>
<?include('inc/footer.php');?>
