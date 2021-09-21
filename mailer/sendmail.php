<?php 

$name = $_POST['name'];
$message = $_POST['message'];
$email = $_POST['email'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'vladislavk2111@gmail.com';                 // Наш логин
$mail->Password = 'kb6mpa0k';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;  
                                 // TCP port to connect to
 
$mail->setFrom('vladislavk2111@gmail.com', 'Portfolio');   // От кого письмо 
$mail->addAddress('skorp47@mail.ru');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Сообщение с сайта';
$mail->Body    = '
		Пользователь оставил данные <br> 
	Имя: ' . $name . ' <br>
	Сообщение: ' . $message . '<br>
	E-mail: ' . $email . '';

if(!$mail->send()) {
    $message = "Ошибка!";
} else {
    $message = "Данные отправлены!";
}
$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);

?>