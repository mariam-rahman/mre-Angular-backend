<?php
namespace App\Classes;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Boolean;
use PHPMailer\PHPMailer\PHPMailer;

class EmailNotification {
    private $mail;
    function __construct()
    {
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->Host = 'mail.monirrahmanelectric.com';
        $this->mail->Port = 465;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = env('MAIL_USERNAME');
        $this->mail->Password = env('MAIL_PASSWORD');
        $this->mail->addAddress('info@monirrahmanelectric.com', null);
    }
    
 function sendContactEmail($data)
 {
   
    $this->mail->setFrom($data->email, $data->name);
    $this->mail->Subject = $data->subject;
    $body = "<h3> hello dear</h3> <p> $data->message</p> <address>Regards,<br> MRE</address>";
    $this->mail->msgHTML($body);
    if (!$this->mail->send()) {
        return 'Mailer Error: '.$this->mail->ErrorInfo;
    } else {
        return 'Message sent!';
    }
 }

 function sendInvoiceEmail($sale, $pay,$stock){
   $user = Auth::user();
   $this->mail->setFrom($user->email, $user->name);
   $this->mail->Subject = "Sold product";
   $body = "<p>
   <ul>
   <li>$sale->id</li>
   <li>$stock</li>
   <li>$pay->paid</li>
   <li>$pay->created_at</li>
   </ul>
   </p> <address>Regards,<br> MRE</address>";
   $this->mail->msgHTML($body);
   return $this->mail->send();
   if (!$this->mail->send()) {
    return 'Mailer Error: '.$this->mail->ErrorInfo;
} else {
    return 'Message sent!';
}
 }
public function enmailToAll(){
    $employee = Employee::all();
    $this->mail->addAddress($employee->email, null);
}

}