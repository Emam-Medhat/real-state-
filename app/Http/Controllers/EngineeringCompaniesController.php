<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EngineeringCompaniesController extends Controller
{
    public function index()
    {
        $companies = DB::table('engineering_companies')->get();
        return view('engineering_companies', compact('companies'));
    }

    public function create()
    {
        return view('engineering_companies.create');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'city' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'years_experience' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'services' => 'nullable|array',
            'projects' => 'nullable|array',
            'certifications' => 'nullable|array',
            'team' => 'nullable|array',
        ]);

        $imagePath = null;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('PropertyPhotos', $fileName, 'public');
        }

        DB::table('engineering_companies')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'city' => $request->city,
            'phone' => $request->phone,
            'email' => $request->email,
            'website' => $request->website,
            'years_experience' => $request->years_experience,
            'image' => $imagePath,
            'services' => json_encode($request->input('services', [])),
            'projects' => json_encode($request->input('projects', [])),
            'certifications' => json_encode($request->input('certifications', [])),
            'team' => json_encode($request->input('team', [])),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('engineering_companies.index')->with('success', 'تم إنشاء الشركة بنجاح!');
    }

    public function show($id)
    {
        $company = DB::table('engineering_companies')->where('id', $id)->first();

        $company->services = json_decode($company->services, true);
        $company->projects = json_decode($company->projects, true);
        $company->certifications = json_decode($company->certifications, true);
        $company->team = json_decode($company->team, true);

        return view('engineering_companies.show', compact('company'));
    }

    public function edit($id)
    {
        $company = DB::table('engineering_companies')->where('id', $id)->first();

        $company->services = json_decode($company->services, true);
        $company->projects = json_decode($company->projects, true);
        $company->certifications = json_decode($company->certifications, true);
        $company->team = json_decode($company->team, true);

        return view('engineering_companies.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'city' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'years_experience' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'services' => 'nullable|array',
            'projects' => 'nullable|array',
            'certifications' => 'nullable|array',
            'team' => 'nullable|array',
        ]);

        $company = DB::table('engineering_companies')->where('id', $id)->first();
        $imagePath = $company->image;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('PropertyPhotos', $fileName, 'public');
        }

        DB::table('engineering_companies')->where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'city' => $request->city,
            'phone' => $request->phone,
            'email' => $request->email,
            'website' => $request->website,
            'years_experience' => $request->years_experience,
            'image' => $imagePath,
            'services' => json_encode($request->input('services', [])),
            'projects' => json_encode($request->input('projects', [])),
            'certifications' => json_encode($request->input('certifications', [])),
            'team' => json_encode($request->input('team', [])),
            'updated_at' => now(),
        ]);

        return redirect()->route('engineering_companies.index')->with('success', 'تم تحديث الشركة بنجاح!');
    }

    public function destroy($id)
    {
        $company = DB::table('engineering_companies')->where('id', $id)->first();

        if ($company->image) {
            Storage::disk('public')->delete($company->image);
        }

        DB::table('engineering_companies')->where('id', $id)->delete();

        return redirect()->route('engineering_companies.index')->with('success', 'تم حذف الشركة بنجاح!');
    }
}