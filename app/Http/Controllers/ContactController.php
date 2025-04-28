<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function insert(Request $request)
    {
        // التحقق من صحة البيانات
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'inquiry_type' => 'required|string',
            'message' => 'required|string',
        ]);

        // إدخال البيانات
        DB::table('contacts')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'inquiry_type' => $request->inquiry_type,
            'message' => $request->message,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('contact')->with('success', 'تم إرسال استفسارك بنجاح!');
    }
    public function index(){
        $contacts = DB::table('contacts')->get();
        return view('contacts', compact('contacts'));
    }
    public function delete($id)
    {
        DB::table('contacts')->where('id', $id)->delete();
        return redirect()->route('contacts')->with('success', 'تم حذف الاستفسار بنجاح!');
    }
}
