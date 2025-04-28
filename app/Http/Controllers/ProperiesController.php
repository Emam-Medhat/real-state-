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
         $request->validate([
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
            'construction_year' => 'nullable|integer|min:1800|max:' . date('Y'),
            'furnished' => 'required|in:furnished,semi_furnished,unfurnished',
            'city' => 'required|string|max:255',
            'neighborhood' => 'nullable|string|max:255',
             'latitude' => 'nullable|numeric|min:0|max:1000',
            'longitude' => 'nullable|numeric|min:0|max:1000',
            'status' => 'required|in:available,sold,rented,pending',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // صورة واحدة
        ]);
       
        $imagePath = null;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('PropertyPhotos', $fileName, 'public');
        }
    
        // حفظ العقار
        $property = new Property([
            'user_id'           => auth()->id(),
            'title'             => $request->input('title'),
            'description'       => $request->input('description'),
            'price'             => $request->input('price'),
            'address'           => $request->input('address'),
            'type'              => $request->input('type'),
            'bedrooms'          => $request->input('bedrooms'),
            'bathrooms'         => $request->input('bathrooms'),
            'area'              => $request->input('area'),
            'floor'             => $request->input('floor'),
            'total_floors'      => $request->input('total_floors'),
            'construction_year' => $request->input('construction_year'),
            'furnished'         => $request->input('furnished'),
            'city'              => $request->input('city'),
            'neighborhood'      => $request->input('neighborhood'),
            'latitude'          => $request->input('latitude'),
            'longitude'         => $request->input('longitude'),
            'status'            => $request->input('status'),
            'image' => $imagePath,
        ]);
    
        $property->save();

        return redirect()->route('home')->with('success', 'تم إضافة العقار بنجاح!');
    }
}