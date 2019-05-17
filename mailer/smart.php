<?php 

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$menu = $_POST['menu'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mail-form@mail.ru';                 // Наш логин
$mail->Password = '12344321qwertyytrewq';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('mail-form@mail.ru', 'Margo Gaman');   // От кого письмо 
$mail->addAddress('gamanm@yandex.ru');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Новый заказ';
$mail->Body    = '
	Данные пользователя <br> 
	Имя: ' . $name . ' <br>
	Телефон: ' . $phone . ' <br>
	' . $menu . ' <br> 
	';
$mail->AltBody = 'Поступил заказ';

if(!$mail->send()) {
    echo 'К сожалению, Ваше сообщение не было от правлено, попробуйте еще раз:С';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header ('Location: ../thx.html');
}

?>