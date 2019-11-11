<?include('inc/config.php');
include('inc/mysql.php');
include('inc/functions.php');
include('inc/auth.php');
include('inc/header.php');?>


<div class="container" style="padding: 10px 0 60px;">

<div class="row">
<div class="col-md-3">
<div class="list-group">
<a href="docs" class="list-group-item<?if($_GET[page]=='docs'){?> active<?}?>">Документация по API</a>
<a href="docs/php" class="list-group-item<?if($_GET[page]=='php'){?> active<?}?>">Готовая функция для PHP</a>
</div>
</div>
<div class="col-md-9">
<?if($_GET[page]=='docs'){$flag=true;?>
<h1 style="margin-top:0;">Документация по API</h1>
<p>Вызов методов осуществляется посредством GET или POST HTTP-запросов к серверу:</p>
<div class="well">Адрес сервера: api.goip.holding.bz<br>
Порт (протокол): 80 (HTTP)<br>
Метод: GET или POST<br>
Кодировка для запроса: UTF-8.</div>
<p>В GET- или POST-переменных запроса передаются аргументы с именами:</p>
<b>Аргументы:</b><ul>
<li>method - вызываемый метод.
<li>набор переменных, зависящий от конкретного метода.
<li>format (необязательный) формат выходных данных (XML, JSON), без указания этого параметра,
по умолчанию данные выдаются в формате XML.</ul>
<p>Все методы возвращают массив аргументов в формате &lt;format> с именами:</p>
<p>msg - сообщение о выполнении действия в виде массива с ключами:<br>
&lt;err_code> - числовой код ошибки (0 - нет ошибок),<br>
&lt;text> - текстовое сообщение,<br>
&lt;type> - тип сообщения (message – нет ошибок, notice и error – ошибки),<br>
<p>data - запрашиваемые данные в виде массива.</p><p></p>

<p>Ниже приведены коды ошибок &lt;err_code> и соответствующие им ошибки из
возвращаемого массива &lt;msg>:</p>
<p>0 - Выполнено успешно.<br>
2 - Неверный логин и(или) пароль.<br>
3 - Превышен лимит сервера.<br>
7 - Заданы не все необходимые параметры.<br>
<?/*нет*/?>99 - Транзакция отправки SMS не прошла.<br>
602 - Пользователя не существует.<br>
<?/*нет*/?>605 - Пользователь заблокирован.<br>
<?/*если будем ускорять, то ошибки вообще  не будет. даже другой*/?>609 - Сотовый оператор не подключен.<br>
617 - Неверный формат номера получателя SMS.<br>
<?/*нет*/?>618 - Номер Абонента в Черном списке.<br>
<?/*нет*/?>622 - Номер Абонента в глобальном Черном списке.<br>
623 - Недостаточно средств. Пополните баланс.<br>
<?/*пока нет*/?>624 - Обнаружены запрещенные слова в тексте сообщения. Обратитесь в поддержку.<br>
<?/*скорее всего не будет вызываться. для быстродействия*/?>699 - Не удалось установить соединение<br>
700 - Дневной лимит СМС исчерпан.</p><p></p>

<h3>Отправка SMS (Метод push_msg).</h3>
<p>Пример HTTP запроса, который Вы можете выполнить в браузере:<br>
<code>http://api.goip.holding.bz/?method=push_msg&email=YOUR_LOGIN&password=YOUR_PASSWORD&text=SMS_TEXT&phone=SMS_PHONE_NUMBER_OF_THE_RECIPIENT</code><br>
YOUR_LOGIN - Логин в системе<br>
YOUR_PASSWORD - Ключ API<br>
SMS_TEXT - Текст SMS сообщения<br>
SMS_PHONE_NUMBER_OF_THE_RECIPIENT - Номер телефона получателя SMS в формате 79160000000</p><p></p>

<p>При успешной отправке SMS в ответ Вы получите массив данных data:</p>
<p>&lt;id> - ID SMS сообщений на стороне нашего сервера.<br>
&lt;credits> - Стоимость одной части отправленной СМС<br>
&lt;n_raw_sms> - Количество частей SMS</p>
<?}?>
<?if($_GET[page]=='php'){$flag=true;?><h1 style="margin-top:0;">Готовая функция отправки SMS на PHP</h1>
<h4>Пример использования:</h4>
<div style="background: #dddddd;padding: 10px;margin: 10px 0 30px 0;"><code>
&lt;?php<br>
$phone="79990000000";<span class="text-muted">//Телефон на который нужно отправить смс</span><br>
$text="Текст СМС";<span class="text-muted">//Текст СМС</span><br>
$email = "";<span class="text-muted">//Имя пользователя API</span><br>
$password = "";<span class="text-muted">//Ключ API</span><br>
$r = sms($email, $password, $phone, $text);<br>
if($r[1])echo('СМС отправлено'); else echo('Отправить СМС не удалось. Код ошибки: '.$r[0]);<br><span class="text-muted">//$r[1] - количество использованных СМС, $r[0] - код ошибки </span><br>
?>
</code></div>
<h4>Код:</h4>
<div style="background: #dddddd;padding: 10px;overflow-y: scroll;max-height: 210px;margin: 10px 0 30px 0;"><code>
&lt;?php<br>
function _smsapi_communicate($request, $cookie=NULL){<br>
	$request['format'] = "json";<br>
	$curl = curl_init();<br>
	curl_setopt($curl, CURLOPT_URL, "http://api.goip.holding.bz/");<br>
	curl_setopt($curl, CURLOPT_POST, True);<br>
	curl_setopt($curl, CURLOPT_POSTFIELDS, $request);<br>
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);<br>
	if(!is_null($cookie)){<br>
		curl_setopt($curl, CURLOPT_COOKIE, $cookie);<br>
	}<br>
	$data = curl_exec($curl);<br>
	curl_close($curl);<br>
	if($data === False){<br>
		return NULL;<br>
	}<br>
	$js = json_decode($data, $assoc=True);<br>
	if(!isset($js['response'])) return NULL;<br>
	$rs = &$js['response'];<br>
	if(!isset($rs['msg'])) return NULL;<br>
	$msg = &$rs['msg'];<br>
	if(!isset($msg['err_code'])) return NULL;<br>
	$ec = intval($msg['err_code']);<br>
	if(!isset($rs['data'])){ $data = NULL; }else{ $data = $rs['data']; }<br>
	return array($ec, $data);<br>
}<br>
<br>
function sms($email, $password, $phone, $text, $params = NULL){<br>
	$req = array(<br>
		"method" => "push_msg",<br>
		"api_v"=>"1.1",<br>
		"email"=>$email,<br>
		"password"=>$password,<br>
		"phone"=>$phone,<br>
		"text"=>$text);<br>
	if(!is_null($params)){<br>
		$req = array_merge($req, $params);<br>
	}<br>
	$resp = _smsapi_communicate($req);<br>
	if(is_null($resp)){<br>
		// Broken API request<br>
		return NULL;<br>
		return "";<br>
	}<br>
	$ec = $resp[0];<br>
	if($ec != 0){<br>
		return array($ec,);<br>
		return "";<br>
	}return $resp;<br>
	if(!isset($resp[1]['n_raw_sms'])){<br>
		return NULL; // No such fields in response while expected<br>
		return "";<br>
	}<br>
	$n_raw_sms = $resp[1]['n_raw_sms'];<br>
	return array(0, $n_raw_sms);<br>
	return "";<br>
}<br>
?>
</code></div>
<?}?>
<?if(!$flag){?><h2>404 страница не найдена</h2><?}?>
</div>
</div>
</div>
<?include('inc/footer.php');?>
