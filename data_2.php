<?
if (isset($_POST['g-recaptcha-response'])) {
$url_to_google_api = "https://www.google.com/recaptcha/api/siteverify";


header('Content-Type: text/html; charset=utf-8');
$secret_key = '6Lfx3hMfAAAAABv7j4_reL8T6PmKIoXhdSNinXfT';

$query = $url_to_google_api . '?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response'] . '&remoteip=' . $_SERVER['REMOTE_ADDR'];

$data = json_decode(file_get_contents($query));

/* Здесь проверяется существование переменных */
 if (isset($_POST['name'])) {$name = 'Имя: '.$_POST['name'];}
 else  false;
  if (isset($_POST['phone'])) {$phone = 'Телефон: '.$_POST['phone'];}
  else  false;
 if (isset($_POST['email'])) {$email = 'Mail: '.$_POST['email'];}
 else  false;

 if (isset($_POST['message'])) {$message = 'Чем Помочь: '.$_POST['message'];}
 else  false;


/* Сюда впишите свою эл. почту */
 $address = "pticccci@gmail.com";

/* А здесь прописывается текст сообщения, \n - перенос строки */
 $mes = " $theme! \n $name \n $phone \n $email \n $tmessage \n $message";

/* А эта функция как раз занимается отправкой письма на указанный вами email */
$sub='заявка с сайта pixelstudio.ru'; //сабж
$email='заявка с сайта pixelstudio.ru'; // от кого сюда вписываем свой сайт
 $send = mail ($address,$sub,$mes,"Content-type:text/plain; charset = utf-8\r\nFrom:$email");

ini_set('short_open_tag', 'On');
require_once 'sms.ru.php';

$smsru = new SMSRU('CB84ABE3-14FD-88C7-2323-EABCEFCD9F95'); // Ваш уникальный программный ключ, который можно получить на главной странице

$data = new stdClass();
$data->to = '79601390609';
$data->text = $name.' '. $phone; // Текст сообщения
// $data->from = ''; // Если у вас уже одобрен буквенный отправитель, его можно указать здесь, в противном случае будет использоваться ваш отправитель по умолчанию
// $data->time = time() + 7*60*60; // Отложить отправку на 7 часов
// $data->translit = 1; // Перевести все русские символы в латиницу (позволяет сэкономить на длине СМС)
// $data->test = 1; // Позволяет выполнить запрос в тестовом режиме без реальной отправки сообщения
// $data->partner_id = '1'; // Можно указать ваш ID партнера, если вы интегрируете код в чужую систему
$sms = $smsru->send_one($data); // Отправка сообщения и возврат данных в переменную



header('Refresh: 3; URL=index.html');
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Отправка заявки</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<style>
body {background: #FFFFFF;}
div.success {background: #58AAEA;width: 600px;padding: 50px 30px;margin: 10% auto;text-align: center;}
div.success h1 {font: 38px "Roboto";color: #FFFFFF;}
div.success h3 {font: 26px "Roboto";color: #FFFFFF;padding: 15px 0 0;}
</style>



</head>

<body onload="doRedirect();">

<div class="success">
	<h1>Спасибо за запрос!</h1>
	<h3>Наш менеджер свяжется с вами в ближайшее время!</h3>
</div>

</body></html>';

}






?>
<script type="text/JavaScript">

    function doRedirect() {
        atTime = "3000";
        toUrl = "https://mwstep.ru/";

        setTimeout("location.href = toUrl;", atTime);
    }

</script>
