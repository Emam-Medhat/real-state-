<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        // هنا تقدر تضيف لوجيك التعديل
        return redirect()->back()->with('success', 'تم تحديث البيانات.');
    }
}
