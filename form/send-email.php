<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$name = isset($_POST['name']) ? $_POST['name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$phone = isset($_POST['phone']) ? $_POST['phone'] : null;
$message = isset($_POST['message']) ? $_POST['message'] : null;

if (!$name || !$email || !$phone || !$message) {
    echo "Lütfen tüm alanları doldurun.";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Geçersiz e-posta adresi.";
    exit;
}



$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = '*****7@gmail.com';
    $mail->Password   = '**************';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    $mail->CharSet    = 'UTF-8';
    $mail->setLanguage('tr');
    
    $mail->addAddress($email); 
    
    $mail->isHTML(true);
    $mail->Subject = 'Yeni İletişim Formu Mesajı';
    $mail->Body    = "Ad Soyad: $name<br>E-posta: $email<br>Cep Telefonu: $phone<br>Mesaj: $message";
    
    $mail->send();
    echo "Mesajınız başarıyla gönderildi.";
} catch (Exception $e) {
    echo "Mesaj gönderilemedi. Mailer Error: {$mail->ErrorInfo}";
}
?>
