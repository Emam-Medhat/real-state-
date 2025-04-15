<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    // دالة لعرض الإشعارات للمستخدم
    public function showNotifications()
    {
        // الحصول على المستخدم الحالي
        $user = Auth::user(); 

        // استرجاع الإشعارات الخاصة بالمستخدم
        $notifications = $user->notifications; 

        // إرسال الإشعارات في الاستجابة
        return response()->json([
            'notifications' => $notifications
        ]);
    }
}
