<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ProperiesController;
use App\Http\Controllers\PropertyBookingController;
use App\Http\Controllers\MaintenanceRequestController;

// المسار الأساسي الذي يعرض الصفحة الرئيسية
Route::get('/', [PropertyController::class, 'index'])->name('home');

Route::get('contact', [ContactController::class, 'create'])->name('contact');
Route::post('contact/insert', [ContactController::class, 'insert']);
Route::get('contacts', [ContactController::class, 'index'])->name('contacts');
Route::delete('contacts/delete/{id}', [ContactController::class, 'delete'])->name('contacts.delete');



Route::get('team', function(){
    return view('team');
});
Route::get('blog', function(){
    return view('blog');
});
// صفحة التسجيل
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('profile/index', [AuthController::class, 'index'])->name('index');


// صفحة تسجيل الدخول
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

// صفحة البحث
// Route::get('search', [PropertyController::class, 'search'])->name('search');

// صفحة الهوم التي تعرض العقارات
Route::get('/', [PropertyController::class, 'index'])->name('home');

// صفحة إضافة عقار
Route::get('property/create', [PropertyController::class, 'create'])->name('property.create')->middleware('auth');
Route::post('property', [PropertyController::class, 'store'])->middleware('auth')->name('property.store');
Route::get('property/all',[PropertyController::class, 'all']);
// صفحة عرض تفاصيل العقار
Route::get('property/{id}', [PropertyController::class, 'show'])->name('property.show');

// صفحة تعديل العقار
Route::get('property/{id}/edit', [PropertyController::class, 'edit'])->middleware('auth')->name('property.edit');
Route::put('property/{id}', [PropertyController::class, 'update'])->middleware('auth')->name('property.update');

// حذف العقار
Route::delete('property/{id}', [PropertyController::class, 'destroy'])->middleware('auth')->name('property.destroy');

// طلبات الصيانة (للمالكين فقط)
// Route::get('property/{id}/maintenance-request', [MaintenanceRequestController::class, 'maintenanceRequest'])->middleware('auth')->name('property.maintenance.request');
// Route::post('property/{id}/maintenance-request', [MaintenanceRequestController::class, 'sendMaintenanceRequest'])->middleware('auth')->name('property.maintenance.send');
// // صفحة البحث
Route::get('/property/search', [PropertyController::class, 'search'])->name('property.search');

// صفحة الشركات الموثوقة
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/{id}', [CompanyController::class, 'show'])->name('companies.show');
Route::get('/company', [CompanyController::class, 'index'])->name('company.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth')->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->middleware('auth')->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');
    });



Route::get('crate/propeties',[ProperiesController::class,'create'])->middleware('auth');
Route::post('insert/propeties',[ProperiesController::class,'insert'])->name('properties.insert');

// Route::get('maintenance-request', [PropertyController::class, 'createMaintenanceRequest'])->name('maintenance_requests.create')->middleware('auth');
// Route::post('maintenance-request', [PropertyController::class, 'storeMaintenanceRequest'])->name('maintenance_requests.store')->middleware('auth');
// Route::get('maintenance-request/all', [PropertyController::class, 'showMaintenanceRequest'])->name('maintenance_requests.index');


Route::get('maintenance_requests/create', [MaintenanceRequestController::class, 'create'])->name('maintenance_requests.create')->middleware('auth');
Route::post('maintenance-requests/insert', [MaintenanceRequestController::class, 'store'])->name('maintenance_requests.store')->middleware('auth');
Route::get('/maintenance_requests/index', [MaintenanceRequestController::class, 'index'])->name('maintenance_requests.index');

// Route::get('system/create', [SystemController::class, 'create']);
// Route::post('maintenance-requests/insert', [SystemController::class, 'store'])->name('maintenance_requests.store')->middleware('auth');
// Route::get('/maintenance_requests/index', [SystemController::class, 'index'])->name('maintenance_requests.index');


Route::get('engineering-companies', function () {
    $result=DB::table('engineering-companies')->get();
    return view('engineering-companies',['engineering-companies'=>$result]);
});


Route::get('/engineering-companies', [App\Http\Controllers\EngineeringCompaniesController::class, 'index'])->name('engineering_companies.index');
Route::get('/engineering-companies/create', [App\Http\Controllers\EngineeringCompaniesController::class, 'create'])->name('engineering_companies.create')->middleware('auth');
Route::post('/engineering-companies', [App\Http\Controllers\EngineeringCompaniesController::class, 'insert'])->name('engineering_companies.store');
Route::get('/engineering-companies/{company}', [App\Http\Controllers\EngineeringCompaniesController::class, 'show'])->name('engineering_companies.show');





// Route::get('/upload', [ImageController::class, 'uploadForm'])->name('upload.form');

// // صفحة معرض الصور
// Route::get('/gallery', [ImageController::class, 'gallery'])->name('gallery');

// // معالجة رفع الصور
// Route::post('/upload', [ImageController::class, 'upload'])->name('images.upload');

// // حذف الصور
// Route::delete('/delete/{filename}', [ImageController::class, 'delete'])->name('images.delete');

// // الصفحة الرئيسية توجّه إلى المعرض
// Route::redirect('/', '/gallery');