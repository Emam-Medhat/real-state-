<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyRequest;
use App\Models\User;
use App\Notifications\MaintenanceRequestNotification;

class PropertyRequestController extends Controller
{
    public function insert(Request $request)
    {
        \Log::info($request->all());

        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'details' => 'required|string|max:255',
            'property_id' => 'required|exists:properties,id',
        ]);

        // إنشاء طلب العقار
        $propertyRequest = PropertyRequest::create([
            'details' => $request->details,
            'property_id' => $request->property_id,
            'user_id' => auth()->user()->id,  // استخدام ID المستخدم الحالي
        ]);

        // إرسال الإشعار للمالك (مثال)
        $owner = User::find($propertyRequest->property->owner_id);  // افتراض أن العقار يحتوي على owner_id
        $requestDetails = [
            'id' => $propertyRequest->id,
            'details' => $propertyRequest->details,
        ];

        // إرسال إشعار للمالك
        $owner->notify(new MaintenanceRequestNotification($requestDetails));

        return response()->json([
            'message' => 'تم تقديم طلب العقار بنجاح.',
            'request' => $propertyRequest
        ], 201);
    }
}
