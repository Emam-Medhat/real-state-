<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProperiesController extends Controller
{
    public function create()
    {
        return view('properties.create');
    }

    public function insert(Request $request)
    {
        // التحقق من صحة البيانات
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'address' => 'required|string|max:255',
            'type' => 'required|in:rent,sale',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'area' => 'nullable|numeric|min:0',
            'floor' => 'nullable|integer|min:0',
            'total_floors' => 'nullable|integer|min:0',
            'construction_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'furnished' => 'required|in:furnished,semi_furnished,unfurnished',
            'amenities' => 'nullable|array',
            'city' => 'required|string|max:255',
            'neighborhood' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'status' => 'required|in:available,sold,rented,pending',
            'images.*.file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*.room_type' => 'nullable|string|max:255',
            'images.*.caption' => 'nullable|string|max:255',
        ]);
        $property = DB::table('properties')->insert([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'address' => $validated['address'],
            'type' => $validated['type'],
            'bedrooms' => $validated['bedrooms'],
            'bathrooms' => $validated['bathrooms'],
            'area' => $validated['area'],
            'floor' => $validated['floor'],
            'total_floors' => $validated['total_floors'],
            'construction_year' => $validated['construction_year'],
            'furnished' => $validated['furnished'],
            // 'amenities' => $validated['amenities'] ? json_encode($validated['amenities']) : null,
            'city' => $validated['city'],
            'neighborhood' => $validated['neighborhood'],
            'latitude' => $validated['latitude'],
            'longitude' => $validated['longitude'],
            'status' => $validated['status'],
            // 'images' => $images ? json_encode($images) : null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $images = [];

        foreach ($request->file('images') as $index => $imageData) {
            if (is_array($imageData) && isset($imageData['file'])) {
                $file = $imageData['file'];
                $fileName = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('', $fileName, 'uploads');
        
                $images[] = [
                    'path' => $path,
                    // 'room_type' => $imageData['room_type'] ?? null, // Access metadata if present
                    // 'caption' => $imageData['caption'] ?? null,
                    DB::table('properties')->where('user_id',Auth::id())->update([
                        'images' => json_encode($images),
                    ]),
                ];

            } else {
                $fileName = time() . '_' . $imageData->getClientOriginalName();
                $path = $imageData->storeAs('', $fileName, 'Uploads');
        
                $images[] = [
                    'path' => $path,
                    // 'room_type' => $request->input("images.$index.room_type") ?? null, // Fallback to input data
                    // 'caption' => $request->input("images.$index.caption") ?? null,
                ];
                DB::table('properties')->insert([
                    'images' => json_encode($images),
                ]);
            }
        }
        
        // Update the database with all images
    

// // Update the database with all images as a JSON-encoded array
// DB::table('properties')->where('id', $property->id)->update([
//     'images' => json_encode($images),
// ]);
        // return $images;
        // إدخال البيانات باستخدام DB
      
        return redirect()->route('home')->with('success', 'تم إنشاء العقار بنجاح!');
    }
}