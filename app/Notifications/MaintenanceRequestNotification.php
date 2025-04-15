<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MaintenanceRequestNotification extends Notification
{
    use Queueable;

    public $requestDetails;

    // تمرير تفاصيل الطلب
    public function __construct($requestDetails)
    {
        $this->requestDetails = $requestDetails;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];  // الإشعار عبر البريد الإلكتروني وقاعدة البيانات
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('طلب صيانة جديد')
                    ->line('تم تقديم طلب صيانة للعقار الخاص بك.')
                    ->line('تفاصيل الطلب: ' . $this->requestDetails['details'])
                    ->action('عرض الطلب', url('/requests/'.$this->requestDetails['id']));
    }

    public function toDatabase($notifiable)
    {
        return [
            'request_id' => $this->requestDetails['id'],
            'details' => $this->requestDetails['details'],
        ];
    }
}
