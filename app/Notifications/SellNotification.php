<?php

namespace App\Notifications;

use App\Classes\ContactForm;
use App\Classes\EmailNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class SellNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $payment;
    public $sale;
    public $stock;
    public function __construct($sale, $pay)
    {

        $this->payment = $pay;
        $this->sale = $sale;

        if ($sale->stock_id == 2) $this->stock = 'Sub stock';
        else if ($sale->stock_id == 3) $this->stock = 'Shop';
        else $this->stock = 'Main stock';
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    public function toBroadcast($notifiable)
    {
        $mail = new EmailNotification();
        $mail->sendInvoiceEmail($this->sale, $this->payment, $this->stock);
        return [];
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        //    if(Auth::user()->isAdmin)
        return [
            'id' => $this->sale->id,
            'user' => Auth::user()->name,
            'stock' => $this->stock,
            'paid' => $this->payment->paid,
            'date' => $this->payment->created_at
        ];
    }
}
