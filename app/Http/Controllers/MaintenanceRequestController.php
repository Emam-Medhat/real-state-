<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class MaintenanceRequestController extends Controller
{
    /**
     * Show the form for creating a new maintenance request.
     */
    public function create()
    {
        $properties = Property::where('user_id', auth()->id())->get(); // عرض العقارات الخاصة بالمستخدم
        return view('maintenance_request.create', compact('properties'));
    }
    // public function create(){
    //     return view('/resources/views/maintenance_request/create.blade.php');
    // }

    public function index()
{
    // جلب طلبات الصيانة الخاصة بالمستخدم الحالي وعقاراته
    $requests = MaintenanceRequest::with('property')
        ->whereHas('property', function ($query) {
            $query->where('user_id', auth()->id());
        })
        ->orderBy('created_at', 'desc')
        ->get();

    return view('maintenance_request.index', compact('requests'));
}

    /**
     * Store a newly created maintenance request in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'issue_type' => 'required|in:plumbing,electrical,structural,other',
            'description' => 'required|string|max:1000',
            'priority' => 'required|in:urgent,normal',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // صورة واحدة
        ]);

        $imagePath = null;

        // معالجة الصورة
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('MaintenancePhotos', $fileName, 'public');
        }

        // إنشاء طلب الصيانة
        MaintenanceRequest::create([
            'user_id' => auth()->id(),
            'property_id' => $validated['property_id'],
            'issue_type' => $validated['issue_type'],
            'description' => $validated['description'],
            'priority' => $validated['priority'],
            'images' => $imagePath, // تخزين مسار الصورة مباشرة
        ]);

        return redirect()->route('maintenance_requests.index')->with('success', 'تم إرسال طلب الصيانة بنجاح!');
    }
}