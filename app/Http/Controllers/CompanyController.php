<?php

// app/Http/Controllers/CompanyController.php

namespace App\Http\Controllers;

use index;
use App\Models\Company;
use Illuminate\Http\Request;

// class CompanyController extends Controller
// {
//     // دالة لإضافة شركة جديدة
//     public function store(Request $request)
//     {
//         // التحقق من صحة البيانات
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|email|unique:companies,email',
//             'phone' => 'nullable|string|max:20',
//             'address' => 'nullable|string|max:500',
//         ]);

//         // إنشاء سجل جديد في قاعدة البيانات
//         $company = Company::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'phone' => $request->phone,
//             'address' => $request->address,
//         ]);

//         return response()->json([
//             'message' => 'تم إضافة الشركة بنجاح.',
//             'company' => $company
//         ], 201);
//     }

class CompanyController extends Controller
{
    public function index(Request $request)
    {

        $companies = Company::all();
        return response()->json($companies);
        
    }
    
    
    public function filter(Request $request)
    {
        $query = Company::query();

        // فلتر البحث بالاسم
        if ($search = $request->input('search')) {
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhereHas('specializations', function ($q) use ($search) {
                      $q->where('name', 'LIKE', "%{$search}%");
                  });
        }

        // فلتر المدينة
        if ($city = $request->input('city') && $city !== 'جميع المدن') {
            $query->where('city', 'LIKE', "%{$city}%");
        }

        // فلتر التخصصات
        if ($specializations = $request->input('specializations')) {
            $query->whereHas('specializations', function ($q) use ($specializations) {
                $q->whereIn('name', $specializations);
            });
        }

        // فلتر سنوات الخبرة
        if ($experience = $request->input('experience')) {
            $query->where('years_experience', '>=', $experience);
        }

        // فلتر التقييم
        if ($ratings = $request->input('ratings')) {
            $query->whereIn('rating', $ratings);
        }

        $companies = $query->get();

        // إنشاء HTML للشركات
        $html = '';
        foreach ($companies as $company) {
            $html .= view('company.company-card', compact('company'))->render();
        }

        return response()->json([
            'html' => $html,
            'total' => Company::count(),
            'visible' => $companies->count(),
        ]);
    }



    // public function index()
    // {
    //     $companies = Company::paginate(9);
    //     return view('company.index', compact('companies'));

}