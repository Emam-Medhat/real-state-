<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // دالة عرض الملف الشخصي
    public function show()
    {
        // استرجاع بيانات المستخدم الحالي
        $user = Auth::user();
        
        // إرجاع العرض مع بيانات المستخدم
        return view('profile.show', compact('user'));
    }

    // دالة لتعديل الملف الشخصي
    public function edit()
    {
        return view('profile.index');
    }

    // دالة لتحديث بيانات الملف الشخصي
    public function update(Request $request)
    {
        // التحقق من صحة البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|confirmed|min:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user(); // الحصول على المستخدم الحالي

        // تحديث البيانات
        $user->name = $request->name;
        $user->email = $request->email;

        // إذا تم تقديم كلمة مرور جديدة
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // إذا تم تقديم صورة جديدة
        if ($request->hasFile('image')) {
            // إذا كان لدى المستخدم صورة سابقة، نقوم بحذفها من التخزين
            if ($user->image && Storage::exists('public/PropertyPhotos/' . $user->image)) {
                Storage::delete('public/PropertyPhotos/' . $user->image);
            }
    
            // تخزين الصورة الجديدة في مجلد PropertyPhotos
            $imagePath = $request->file('image')->store('public/PropertyPhotos');
            $user->image = basename($imagePath);  // تخزين اسم الصورة فقط
        }
    

        // حفظ التغييرات في قاعدة البيانات
        $user->save();

        return redirect()->route('profile.show')->with('success', 'تم تحديث الملف الشخصي بنجاح');
    }
}
