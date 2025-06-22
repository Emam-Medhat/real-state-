<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\MaintenanceRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    // عرض جميع العقارات (الصفحة الرئيسية)
    public function index()
    {
        $properties = Property::all(); // جلب جميع العقارات
        $companies = DB::table('engineering_companies')->get();

        return view('home', compact('properties', 'companies'));
    }

    public function all()
    {
        $properties = Property::all(); // جلب جميع العقارات
        return view('properties.all', compact('properties'));
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
   // إضافة عقار جديد
   public function store(Request $request)
   {
       try {
           // التحقق من البيانات
           $validated = $request->validate([
               'title' => 'required|string|max:255',
               'description' => 'required|string',
               'price' => 'required|numeric|min:0',
               'location' => 'required|string|max:255',
               'type' => 'required|in:rent,sale',
               'images' => 'required|array|min:1',
               'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:4096', // تحديد أنواع الصور
           ], [
               'title.required' => 'العنوان مطلوب.',
               'description.required' => 'الوصف مطلوب.',
               'price.required' => 'السعر مطلوب.',
               'price.numeric' => 'السعر يجب أن يكون رقمًا.',
               'location.required' => 'الموقع مطلوب.',
               'type.required' => 'نوع العقار مطلوب.',
               'images.required' => 'يجب رفع صورة واحدة على الأقل.',
               'images.*.image' => 'الملف يجب أن يكون صورة.',
               'images.*.mimes' => 'الصورة يجب أن تكون بصيغة jpeg، png، jpg، أو gif.',
               'images.*.max' => 'حجم الصورة يجب ألا يتجاوز 4 ميجا.',
           ]);

           // رفع الصور
           $uploadedImages = [];
           if ($request->hasFile('images')) {
               foreach ($request->file('images') as $image) {
                   if ($image->isValid()) {
                       $path = $image->store('property_images', 'public');
                       $uploadedImages[] = [
                           'path' => $path,
                           'room_type' => $request->input('room_type', 'main'), // إمكانية إضافة نوع الغرفة
                           'description' => $request->input('image_description', ''), // وصف اختياري
                       ];
                   }
               }
           }

           // إنشاء العقار
           $property = new Property([
               'title' => $validated['title'],
               'description' => $validated['description'],
               'price' => $validated['price'],
               'location' => $validated['location'],
               'type' => $validated['type'],
               'images' => json_encode($uploadedImages),
               'user_id' => Auth::id(),
           ]);

           $property->save();

           return redirect()->route('home')->with('success', 'تم إضافة العقار بنجاح! يمكنك الآن عرضه في قائمة العقارات.');
       } catch (\Exception $e) {
           return back()->withInput()->with('error', 'حدث خطأ أثناء إضافة العقار: ' . $e->getMessage());
       }
   }

// تحديث العقار
// public function update(Request $request, $id)
// {
//     $property = Property::findOrFail($id);

//     $request->validate([
//         'title' => 'required|string|max:255',
//         'description' => 'required|string',
//         'price' => 'required|numeric',
//         'address' => 'required|string',
//         'type' => 'required|in:rent,sale',
//         'images' => 'nullable|array',
//         'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
//     ]);

//     $currentImages = json_decode($property->images, true) ?? [];

//     if ($request->hasFile('images')) {
//         foreach ($request->file('images') as $image) {
//             $path = $image->store('property_images', 'public');
//             $currentImages[] = [
//                 'path' => $path,
//                 'room_type' => 'main',
//                 'description' => ''
//             ];
//         }
//     }

//     $property->update([
//         'title' => $request->title,
//         'description' => $request->description,
//         'price' => $request->price,
//         'address' => $request->address,
//         'type' => $request->type,
//         'images' => json_encode($currentImages)
//     ]);

//     return redirect()->route('property.show', $property->id);
// }
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
        $type = $request->input('type', '');
        $city = $request->input('city', '');

        $properties = Property::when($type, function ($query) use ($type) {
                return $query->where('type', $type);
            })
            ->when($city, function ($query) use ($city) {
                return $query->where('city', 'like', "%$city%");
            })
            ->where('status', 'available')
            ->get();

        return view('home', compact('properties'));
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
    // public function maintenanceRequest($id)
    // {
    //     $property = Property::findOrFail($id);
    //     return view('property.maintenance', compact('property'));
    // }

    // // إرسال طلب صيانة
    // public function sendMaintenanceRequest(Request $request, $id)
    // {
    //     // منطق إرسال طلب الصيانة
    //     return back()->with('message', 'تم إرسال طلب الصيانة.');
    // }

    // public function createMaintenanceRequest()
    // {

    //     $properties = Property::where('user_id', auth()->id())->get(); // عرض العقارات الخاصة بالمستخدم
    //     return view('maintenance_request.create', compact('properties')); }

    // public function storeMaintenanceRequest(Request $request)
    // {
    //     $validated = $request->validate([
    //         'property_id' => 'required|exists:properties,id',
    //         'issue_type' => 'required|in:plumbing,electrical,structural,other',
    //         'description' => 'required|string|max:1000',
    //         'priority' => 'required|in:urgent,normal',
    //         'images.*.file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // الصور
    //         'images.*.caption' => 'nullable|string|max:255', // وصف الصور
    //     ];

    //     $images = [];
    //     if ($request->has('images')) {
    //         foreach ($request->images as $key => $image) {
    //             if (isset($image['file'])) {
    //                 // حفظ الصورة في مجلد public/MaintenancePhotos
    //                 $path = $image['file']->store('MaintenancePhotos', 'public');
    //                 $images[] = [
    //                     'path' => $path,
    //                     'caption' => $image['caption'] ?? null,
    //                 ];
    //             }
    //         }
    //     }

    //     // إنشاء طلب الصيانة
    //     MaintenanceRequest::create([
    //         'user_id' => auth()->id(),
    //         'property_id' => $validated['property_id'],
    //         'issue_type' => $validated['issue_type'],
    //         'description' => $validated['description'],
    //         'priority' => $validated['priority'],
    //         'images' => $images ? json_encode($images) : null,
    //     ]);

    //     return redirect()->route('maintenance_requests.index')->with('success', 'تم إرسال طلب الصيانة بنجاح!');
    // }
    // public function showMaintenanceRequest(Request $request)
    // {
    //     // استرجاع أول سجل باستخدام DB
    //     $maintenanceRequest = DB::table('maintenance_requests')->first();

    //     // التحقق من أن البيانات موجودة
    //     if (!$maintenanceRequest) {
    //         return redirect()->back()->with('error', 'لا يوجد طلب صيانة');
    //     }

    //     return view('maintenance_request.index', compact('maintenanceRequest'));
    // }

    public function reserve($id) {
        $property = Property::findOrFail($id);
        return view('property.reserve', compact('property'));
    }

}

