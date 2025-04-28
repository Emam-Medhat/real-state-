<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // عرض صفحة التسجيل
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // تنفيذ التسجيل
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
           'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $request->file('image') ? $request->file('image')->store('images') : null,
        ]);

        Auth::login($user); // تسجيل الدخول مباشرة بعد التسجيل

        return redirect('login');
    }

    // عرض صفحة تسجيل الدخول
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // تنفيذ تسجيل الدخول
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/'); // توجيه المستخدم إلى الصفحة الرئيسية بعد تسجيل الدخول
        }

        return back()->withErrors([
            'email' => 'The provided credentials are incorrect.',
        ]);
    }
    // تنفيذ تسجيل الخروج
public function logout(Request $request)
{
    Auth::logout(); // تسجيل الخروج

    // حذف الجلسة وإعادة توليدها لحماية من CSRF
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login'); // إعادة التوجيه لصفحة تسجيل الدخول
}
// عرض صفحة التسجيل
public function index()
{
        return view('profile.index');
    }
}

