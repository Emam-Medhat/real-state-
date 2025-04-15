<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ProperiesController;

// المسار الأساسي الذي يعرض الصفحة الرئيسية
Route::get('/', [PropertyController::class, 'index'])->name('home');

Route::get('contact', function(){
    return view('contact');
});

Route::get('team', function(){
    return view('team');
});
Route::get('blog', function(){
    return view('blog');
});
// صفحة التسجيل
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// صفحة تسجيل الدخول
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

// صفحة البحث
Route::get('search', [PropertyController::class, 'search'])->name('search');

// صفحة الهوم التي تعرض العقارات
Route::get('/', [PropertyController::class, 'index'])->name('home');

// صفحة إضافة عقار
Route::get('property/create', [PropertyController::class, 'create'])->middleware('auth')->name('property.create');
Route::post('property', [PropertyController::class, 'store'])->middleware('auth')->name('property.store');

// صفحة عرض تفاصيل العقار
Route::get('property/{id}', [PropertyController::class, 'show'])->name('property.show');

// صفحة تعديل العقار
Route::get('property/{id}/edit', [PropertyController::class, 'edit'])->middleware('auth')->name('property.edit');
Route::put('property/{id}', [PropertyController::class, 'update'])->middleware('auth')->name('property.update');

// حذف العقار
Route::delete('property/{id}', [PropertyController::class, 'destroy'])->middleware('auth')->name('property.destroy');

// طلبات الصيانة (للمالكين فقط)
Route::get('property/{id}/maintenance-request', [PropertyController::class, 'maintenanceRequest'])->middleware('auth')->name('property.maintenance.request');
Route::post('property/{id}/maintenance-request', [PropertyController::class, 'sendMaintenanceRequest'])->middleware('auth')->name('property.maintenance.send');
// صفحة الشركات الموثوقة
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/{id}', [CompanyController::class, 'show'])->name('companies.show');
Route::get('/company', [CompanyController::class, 'index'])->name('company.index');

Route::middleware('auth')->group(function () {
  Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});



Route::get('crate/propeties',[ProperiesController::class,'create']);
Route::post('insert/propeties',[ProperiesController::class,'insert'])->name('properties.insert');
