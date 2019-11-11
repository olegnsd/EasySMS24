<?include('inc/config.php');
include('inc/mysql.php');
include('inc/functions.php');
include('inc/auth.php');
include('inc/header.php');?>

<div class="land1 parallax">
<div class="container" style="padding: 50px 0 100px;">
<div class="row">
<div class="col-md-9">
<h1 style="    margin-top: 0;">EasySMS24 </h1>
<h2>API для отправки SMS с ваших сервисов/сайтов</h2><br>
<h4>Рассчитайте цену на нужный вам пакет СМС</h4>
  <div id="slider"></div>


<div id="itog" style="font-size:20px;line-height:58px;text-align:center;">17 СМС за 10 руб. (тариф 60 коп.)</div>
<br><br>
<div class="text-center"><a href="lk" class="btn btn-lg btn-success"><i class="fa fa-check"></i> Подключиться к EasySMS24</a></div>
</div>
<div class="col-md-3 smsprices">
<div class="smsprice smsprice1 active"><span>Цена за СМС: </span>60 коп.<i>(при оплате до 1000 руб.)</i></div>
<div class="smsprice smsprice2"><span>Цена за СМС: </span>58 коп.<i>(при оплате от 1000 до 2000 руб.)</i></div>
<div class="smsprice smsprice3"><span>Цена за СМС: </span>56 коп.<i>(при оплате от 2000 до 3000 руб.)</i></div>
<div class="smsprice smsprice4"><span>Цена за СМС: </span>54 коп.<i>(при оплате от 3000 до 4000 руб.)</i></div>
<div class="smsprice smsprice5"><span>Цена за СМС: </span>52 коп.<i>(при оплате от 4000 до 5000 руб.)</i></div>
<div class="smsprice smsprice6"><span>Цена за СМС: </span>50 коп.<i>(при оплате от 5000 руб.)</i></div>
<p style="margin-top:15px;font-size:11px;">* 1 смс до 140 знаков. Сообщения транслитерируются на латиницу</p>
</div>
</div>



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
        //jQuery( "#itog2" ).val(ui.value);
      }
    });

}); 
  </script>
</div>
</div>

<div id="counts" style="    background: #03a9f4;"> <div class="container" style="padding: 30px 0">
<div class="row" id="loadcount"> 
<div class="col-md-4 col-sm-4 service-item text-center"> <div class="service-item-content"> <h4 style="color:white;">Отправлено с начала суток</h4> <p style="color:white;">-</p></div> </div>
<div class="col-md-4 col-sm-4 service-item text-center"> <div class="service-item-content"> <h4 style="color:white;">Отправлено с начала месяца</h4> <p style="color:white;">-</p></div> </div>
<div class="col-md-4 col-sm-4 service-item text-center"> <div class="service-item-content"> <h4 style="color:white;">Отправлено за всё время</h4> <p style="color:white;">-</p></div> </div>
</div><p style="text-align:right;font-size:12px;color:white;">* Статистика обновляется в реальном времени</p></div></div>
<script>
$('#loadcount').load('/count.php');
setInterval(function(){
$('#loadcount').load('/count.php');
},2000);
</script>


<div id="services"> <div class="container">
<div class="row"> 
<div class="col-md-4 col-sm-4 service-item text-center"> <div class="service-item-icon"> <i class="fa fa-gears"></i> </div><div class="service-item-content"> <h4>Простой API</h4> <p></p></div> </div>
<div class="col-md-4 col-sm-4 service-item text-center"> <div class="service-item-icon"> <i class="fa fa-dollar"></i> </div><div class="service-item-content"> <h4>Демпинговые цены</h4> <p></p></div> </div>
<div class="col-md-4 col-sm-4 service-item text-center"> <a href="http://bartercoin.holding.bz" target="_blank"><div class="service-item-icon"> <i class="fa fa-exchange"></i> </div><div class="service-item-content"> <h4>Возможность оплаты бартером</h4> <p></p></div></a> </div>

</div></div></div>


<div id="docs"> <div class="container">

<div class="rates-info--item"> <h3>Документация по API</h3> <a href="docs" style="text-transform: none;" class="btn btn-custom-reverse">Перейти в раздел</a> </div>

</div></div>



<div class="single-feature bg--img parallax" style="background-color:#264969;background-image: url(bg2.jpg);color:white;"> <div class="container"> <h2>О компании</h2> <p>ПАО "Милитари Холдинг" был основана в 2014 году (старое юр.лицо ПАО "Конструктор Империй"). С тех пор наши специалисты разработали множество IT-продуктов, а сама компания стала лидером в России в области IT-технологий.</p>

<p>Корпорация создала множество широко востребованных программ и сервисов, открыла несколько дочерних организаций, свою радиостанцию и расчетную систему BarterCoin. В ближайшем будущем корпорация станет лидером во всем мире за счет обхвата всех сфер жизни человечества – от простых систем и сервисов для бизнеса и повседневности до проектов мирового масштаба.</p><a href="http://holding.bz" target="_blank" style="text-transform: none;" class="btn btn-custom-reverse">Перейти на сайт холдинга</a> </div></div>


<div> <div class="container"  style="padding:50px 0;">
<div class="row">
<div class="col-md-8">
<h2>Обзвон ваших потенциальных клиентов роботом</h2>
<p>Ещё одна инновационная разработка холдинга - сервис Mielophone</p>

<a href="http://mielophone.holding.bz" target="_blank" style="text-transform: none;" class="btn btn-custom-reverse">Перейти на сайт сервиса Mielophone</a>

</div>
<div class="col-md-4">
<img class="img-responsive" src="m.png">
</div>
</div>

</div></div>

<!--div class="container" style="padding: 10px 0 60px;">

<h2></h2>


</div-->
<?include('inc/footer.php');?>
