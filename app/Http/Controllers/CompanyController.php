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
        $query = Company::query();

        if ($request->filled('service')) {
            $query->where('services', 'like', '%' . $request->service . '%');
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('rating')) {
            $query->where('rating', '>=', $request->rating);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $companies = $query->paginate(9);

        return view('company.index', compact('companies'));
    }



    // public function index()
    // {
    //     $companies = Company::paginate(9);
    //     return view('company.index', compact('companies'));
    // }
}
