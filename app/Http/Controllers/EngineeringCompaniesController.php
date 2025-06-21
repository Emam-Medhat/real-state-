<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class EngineeringCompaniesController extends Controller
{
    public function index()
    {
        $companies = DB::table('engineering_companies')->get()->map(function ($company) {
            $company->services = $company->services ? json_decode($company->services, true) ?? [] : [];
            return $company;
        });
        return view('engineering_companies', compact('companies'));
    }

    public function create()
    {
        return view('engineering_companies.create');
    }

    public function insert(Request $request)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'name' => 'required|string|max:255|min:3|unique:engineering_companies,name',
                'description' => 'nullable|string|max:1000',
                'city' => 'required|string|max:100|min:2',
                'phone' => 'required|string|max:20|min:7|regex:/^[0-9\-\+]+$/|unique:engineering_companies,phone',
                'email' => 'required|email|max:255|unique:engineering_companies,email|lowercase',
                'website' => 'nullable|url|max:255|regex:/^(https?):\/\/[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}(\/.*)?$/',
                'years_experience' => 'nullable|integer|min:0|max:100',
                'image' => 'nullable|file|mimetypes:image/*|max:5120', // Accept any image type, max 5MB
                'services' => 'nullable|array|min:1',
                'services.*' => 'string|max:255',
                'projects' => 'nullable|array|min:1',
                'projects.*' => 'string|max:255',
                'certifications' => 'nullable|array|min:1',
                'certifications.*' => 'string|max:255',
                'team' => 'nullable|array|min:1',
                'team.*' => 'string|max:255',
            ]);

            $imagePath = null;
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                try {
                    $fileName = time() . '_' . str_replace(' ', '_', $request->file('image')->getClientOriginalName());
                    $imagePath = $request->file('image')->storeAs('CompanyImages', $fileName, 'public');
                } catch (\Exception $e) {
                    throw new \Exception('فشل تحميل الصورة: ' . $e->getMessage());
                }
            }

            $companyData = [
                'name' => $validated['name'],
                'description' => $validated['description'],
                'city' => $validated['city'],
                'phone' => preg_replace('/[\s\-]+/', '', $validated['phone']),
                'email' => $validated['email'],
                'website' => $validated['website'],
                'years_experience' => $validated['years_experience'],
                'image' => $imagePath,
                'services' => json_encode(array_values($request->input('services', []))),
                'projects' => json_encode(array_values($request->input('projects', []))),
                'certifications' => json_encode(array_values($request->input('certifications', []))),
                'team' => json_encode(array_values($request->input('team', []))),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            DB::table('engineering_companies')->insert($companyData);
            DB::commit();

            return redirect()->route('engineering_companies.index')
                ->with('success', 'تم إنشاء الشركة بنجاح!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating engineering company', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'input' => $request->all(),
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء إنشاء الشركة: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $company = DB::table('engineering_companies')->where('id', $id)->first();
        if (!$company) {
            return redirect()->route('engineering_companies.index')->with('error', 'الشركة غير موجودة');
        }

        $company->services = $company->services ? json_decode($company->services, true) ?? [] : [];
        $company->projects = $company->projects ? json_decode($company->projects, true) ?? [] : [];
        $company->certifications = $company->certifications ? json_decode($company->certifications, true) ?? [] : [];
        $company->team = $company->team ? json_decode($company->team, true) ?? [] : [];

        return view('engineering_companies.show', compact('company'));
    }

    public function edit($id)
    {
        $company = DB::table('engineering_companies')->where('id', $id)->first();
        if (!$company) {
            return redirect()->route('engineering_companies.index')->with('error', 'الشركة غير موجودة');
        }

        $company->services = $company->services ? json_decode($company->services, true) ?? [] : [];
        $company->projects = $company->projects ? json_decode($company->projects, true) ?? [] : [];
        $company->certifications = $company->certifications ? json_decode($company->certifications, true) ?? [] : [];
        $company->team = $company->team ? json_decode($company->team, true) ?? [] : [];

        return view('engineering_companies.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'name' => 'required|string|max:255|min:3|unique:engineering_companies,name,' . $id,
                'description' => 'nullable|string|max:1000',
                'city' => 'required|string|max:100|min:2',
                'phone' => 'required|string|max:20|min:7|regex:/^[0-9\-\+]+$/|unique:engineering_companies,phone,' . $id,
                'email' => 'required|email|max:255|unique:engineering_companies,email,' . $id,
                'website' => 'nullable|url|max:255|regex:/^(https?):\/\/[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}(\/.*)?$/',
                'years_experience' => 'nullable|integer|min:0|max:100',
                'image' => 'nullable|file|mimetypes:image/*|max:5120', // Accept any image type, max 5MB
                'services' => 'nullable|array',
                'services.*' => 'string|max:255',
                'projects' => 'nullable|array',
                'projects.*' => 'string|max:255',
                'certifications' => 'nullable|array',
                'certifications.*' => 'string|max:255',
                'team' => 'nullable|array',
                'team.*' => 'string|max:255',
            ]);

            $company = DB::table('engineering_companies')->where('id', $id)->first();
            if (!$company) {
                return redirect()->route('engineering_companies.index')->with('error', 'الشركة غير موجودة');
            }

            $imagePath = $company->image;
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                try {
                    if ($imagePath) {
                        Storage::disk('public')->delete($imagePath);
                    }
                    $fileName = time() . '_' . str_replace(' ', '_', $request->file('image')->getClientOriginalName());
                    $imagePath = $request->file('image')->storeAs('CompanyImages', $fileName, 'public');
                } catch (\Exception $e) {
                    throw new \Exception('فشل تحميل الصورة: ' . $e->getMessage());
                }
            }

            DB::table('engineering_companies')->where('id', $id)->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'city' => $validated['city'],
                'phone' => preg_replace('/[\s\-]+/', '', $validated['phone']),
                'email' => $validated['email'],
                'website' => $validated['website'],
                'years_experience' => $validated['years_experience'],
                'image' => $imagePath,
                'services' => json_encode(array_values($request->input('services', []))),
                'projects' => json_encode(array_values($request->input('projects', []))),
                'certifications' => json_encode(array_values($request->input('certifications', []))),
                'team' => json_encode(array_values($request->input('team', []))),
                'updated_at' => now(),
            ]);

            DB::commit();
            return redirect()->route('engineering_companies.index')->with('success', 'تم تحديث الشركة بنجاح!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating engineering company', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'input' => $request->all(),
            ]);

            return redirect()->back()->with('error', 'حدث خطأ أثناء تحديث الشركة: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $company = DB::table('engineering_companies')->where('id', $id)->first();
            if (!$company) {
                return redirect()->route('engineering_companies.index')->with('error', 'الشركة غير موجودة');
            }

            if ($company->image) {
                Storage::disk('public')->delete($company->image);
            }

            DB::table('engineering_companies')->where('id', $id)->delete();
            return redirect()->route('engineering_companies.index')->with('success', 'تم حذف الشركة بنجاح!');
        } catch (\Exception $e) {
            Log::error('Error deleting engineering company', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->route('engineering_companies.index')->with('error', 'حدث خطأ أثناء حذف الشركة');
        }
    }

    public function filter(Request $request)
    {
        $companies = DB::table('engineering_companies')
            ->when($request->search, function($query, $search) {
                return $query->where('name', 'like', "%$search%");
            })
            ->when($request->experience, function($query, $experience) {
                return $query->where('years_experience', '>=', $experience);
            })
            ->when($request->city, function($query, $city) {
                return $query->where('city', 'like', "%$city%");
            })
            ->get()
            ->map(function ($company) {
                $company->services = $company->services ? json_decode($company->services, true) ?? [] : [];
                return $company;
            });

        $html = view('engineering_companies._companies_list', compact('companies'))->render();

        return response()->json([
            'html' => $html,
            'total' => DB::table('engineering_companies')->count(),
            'visible' => $companies->count(),
        ]);
    }

    public function search(Request $request)
    {
        $query = DB::table('engineering_companies');

        if ($request->has('city') && $request->city != '') {
            $query->where('city', 'like', '%' . $request->city . '%');
        }

        if ($request->has('name') && $request->name != '') {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        $companies = $query->get()->map(function ($company) {
            $company->services = $company->services ? json_decode($company->services, true) ?? [] : [];
            return $company;
        });

        return view('engineering_companies.index', compact('companies'));
    }
}