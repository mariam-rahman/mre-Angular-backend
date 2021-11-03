<?php
namespace App\Classes;

use PHPMailer\PHPMailer\PHPMailer;

class InvoiceEmail {
    
 function send($data)
 {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'mail.monirrahmanelectric.com';
    $mail->Port = 465;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->SMTPAuth = true;
    $mail->Username = env('MAIL_USERNAME');
    $mail->Password = env('MAIL_PASSWORD');
    $mail->setFrom($data->email, $data->name);
    $mail->addAddress('info@monirrahmanelectric.com', null);
    $mail->Subject = $data->subject;
    $body = "<h3> hello dear</h3> <p> $data->message</p> <address>Regards,<br> MRE</address>";
    $mail->msgHTML($body);
    if (!$mail->send()) {
        return 'Mailer Error: '.$mail->ErrorInfo;
    } else {
        return 'Message sent!';
    }
 }
}