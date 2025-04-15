<?php

// app/Notifications/PropertyRequestNotification.php

namespace App\Notifications;

use App\Models\PropertyRequest;
use Illuminate\Notifications\Notification;

class PropertyRequestNotification extends Notification
{
    protected $propertyRequest;

    public function __construct(PropertyRequest $propertyRequest)
    {
        $this->propertyRequest = $propertyRequest;
    }

    public function via($notifiable)
    {
        return ['database']; // تحديد قناة الإشعار كقاعدة بيانات
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'You have a new request for property: ' . $this->propertyRequest->property->title,
            'request_id' => $this->propertyRequest->id,
            'user_id' => $this->propertyRequest->user_id,
        ];
    }
}
