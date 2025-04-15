<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    // عرض جميع العقارات (الصفحة الرئيسية)
    public function index()
    {
        $properties = Property::all(); // جلب جميع العقارات
        return view('home', compact('properties'));
    }

    // عرض صفحة إضافة عقار
    public function create()
    {
        return view('property.create');
    }

    // تأكد من أن المستخدم قد قام بتسجيل الدخول قبل الوصول إلى هذه الوظيفة
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'search', 'companies']);
    }

    // إضافة عقار جديد
    public function store(Request $request)
    {
        // تحقق من البيانات المدخلة عبر تسجيلها في الـ log
        \Log::info($request->all());

        // تحقق من صحة البيانات
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'location' => 'required|string',
            'type' => 'required|in:rent,sale',
            'image' => 'required|image',
        ]);

        // تخزين الصورة
        $imagePath = $request->file('image')->store('property_images', 'public');

        // إضافة العقار إلى قاعدة البيانات
        $property = new Property([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'location' => $request->location,
            'type' => $request->type,
            'image' => $imagePath,
            'user_id' => Auth::id(), // تعيين معرف المستخدم الذي أضاف العقار
        ]);

        // إذا كانت البيانات صحيحة، قم بحفظ العقار
        $property->save();

        // إعادة التوجيه بعد حفظ العقار
        return redirect()->route('/resources/views/home.blade.php')->with('success', 'تم إضافة العقار بنجاح');

      }


    // عرض تفاصيل العقار
    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('property.show', compact('property'));
    }

    // عرض صفحة تعديل العقار
    public function edit($id)
    {
        $property = Property::findOrFail($id);
        return view('property.edit', compact('property'));
    }

    // تحديث العقار
    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);

        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'address' => 'required|string',
            'type' => 'required|in:rent,sale',
        ]);

        // إذا تم إرسال صورة جديدة
        if ($request->hasFile('image')) {
            $request->validate(['image' => 'image']);
            $imagePath = $request->file('image')->store('property_images', 'public');
            $property->image = $imagePath;
        }

        // تحديث بيانات العقار
        $property->update($request->only(['title', 'description', 'price', 'address', 'type']));

        // إعادة التوجيه إلى الصفحة الرئيسية
        return redirect('/');
    }

    // حذف العقار
    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        // إعادة التوجيه إلى الصفحة الرئيسية
        return redirect('/');
    }

    // البحث عن العقارات
    public function search(Request $request)
    {
        $query = $request->input('query');
        $properties = Property::where('title', 'like', "%$query%")
                               ->orWhere('description', 'like', "%$query%")
                               ->get();
        return view('property.search', compact('properties'));
    }

    // عرض صفحة الشركات الموثوقة
    public function companies()
    {
        $companies = [
            (object)[
                'name' => 'شركة التميز للتشطيب',
                'services' => 'دهانات، جبس، سيراميك',
                'rating' => 4.5,
                'reviews_count' => 12,
                'logo' => 'company1.png',
                'contact_link' => '#',
            ],
            (object)[
                'name' => 'شركة الديكور العصري',
                'services' => 'تصميم داخلي وخارجي',
                'rating' => 4.8,
                'reviews_count' => 20,
                'logo' => 'company2.png',
                'contact_link' => '#',
            ]
        ];

        return view('companies', compact('companies'));
    }

    // عرض صفحة طلب صيانة
    public function maintenanceRequest($id)
    {
        $property = Property::findOrFail($id);
        return view('property.maintenance', compact('property'));
    }

    // إرسال طلب صيانة
    public function sendMaintenanceRequest(Request $request, $id)
    {
        // منطق إرسال طلب الصيانة
        return back()->with('message', 'تم إرسال طلب الصيانة.');
    }
}
