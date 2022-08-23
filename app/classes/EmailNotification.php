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

 function sendInvoiceEmail($products, $payment){
   $user = Auth::user();
   $this->mail->setFrom($user->email, $user->name);
   $this->mail->Subject = "Sold product";

   $product = "";
   foreach($products as $p)
   {
  $product .= "<tr style='text-align:center'>
    <td style='border: 1px solid black;border-collapse: collapse;'>$p->product_name</td>
    <td style='border: 1px solid black;border-collapse: collapse;'>$p->sell_price</td>
    <td style='border: 1px solid black;border-collapse: collapse;'>$p->qty</td>
  </tr>
";
   }
   
   $body = "
   <div>
   <table style='width:50%;border: 1px solid black;border-collapse: collapse;'>
   <tr style='border: 1px solid black;border-collapse: collapse;'>
   <th style='border: 1px solid black;border-collapse: collapse;'>Item</th>
   <th style='border: 1px solid black;border-collapse: collapse;'>Qty</th>
   <th style='border: 1px solid black;border-collapse: collapse;'>Price</th>
   </tr>
   $product
   </table>
   <br>
   <ul style='list-style-type:none'>
   <li style='display: inline-block;'>
   <strong>Invoice date: </strong> $payment->created_at
   </li>
   <li style='display:inline-block;'>
   <strong>Invoice No: </strong>$payment->id
   </li>
   <li style='display: inline-block;'>
   <strong >Invoice to: </strong>$payment->cname
   </li>  
 </ul>
 </div>
   ";
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