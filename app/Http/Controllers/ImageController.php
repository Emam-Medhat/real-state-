<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    // عرض صفحة رفع الصورة
    public function uploadForm()
    {
        return view('upload');
    }

    // عرض صفحة معرض الصور
    public function gallery()
    {
        $images = [];
        $files = Storage::files('public/uploads');

        foreach ($files as $file) {
            $images[] = [
                'name' => basename($file),
                'url' => Storage::url($file),
                'size' => $this->formatSize(Storage::size($file)),
                'modified' => date('Y-m-d H:i:s', Storage::lastModified($file))
            ];
        }

        return view('gallery', compact('images'));
    }

    // معالجة رفع الصورة
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $path = $file->storeAs('public/uploads', $filename);

            return redirect()->route('gallery')->with('success', 'تم رفع الصورة بنجاح!');
        }

        return back()->with('error', 'لم يتم اختيار صورة!');
    }

    // حذف الصورة
    public function delete($filename)
    {
        Storage::delete('public/uploads/'.$filename);
        return back()->with('success', 'تم حذف الصورة بنجاح');
    }

    // تنسيق حجم الملف
    private function formatSize($bytes)
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } else {
            return $bytes . ' bytes';
        }
    }
}