<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create($propertyId)
    {
        $property = Property::findOrFail($propertyId);
        return view('properties.book', compact('property'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'client_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'booking_date' => 'required|date|after:today',
        ]);

        Booking::create([
            'property_id' => $request->property_id,
            'client_name' => $request->client_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'booking_date' => $request->booking_date,
        ]);

        return redirect()->route('properties.show', $request->property_id)
            ->with('success', 'تم إرسال طلب الحجز بنجاح! سنتواصل معك قريبًا.');
    }
}
