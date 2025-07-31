<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Toastr;
use File;

class BannerController extends Controller
{
    public function view()
    {
        $data['banner'] = Banner::orderBy('id','asc')->first();
        $data['alldata'] = Banner::get();
        return view('admin.banner.view', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $banner = new Banner();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/banner'), $filename);
            $banner->image = $filename; // ✅ only filename saved
        }

        $banner->save();
        Toastr::success('Banner Added Successfully', 'Success');
        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $banner = Banner::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            $oldPath = public_path('upload/banner/' . $banner->image);
            if ($banner->image && File::exists($oldPath)) {
                File::delete($oldPath);
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/banner'), $filename);
            $banner->image = $filename; // ✅ only filename saved
        }

        $banner->save();
        Toastr::success('Banner Updated Successfully', 'Success');
        return back();
    }

    public function delete($id)
    {
        $banner = Banner::findOrFail($id);

        $filePath = public_path('upload/banner/' . $banner->image);
        if ($banner->image && File::exists($filePath)) {
            File::delete($filePath);
        }

        $banner->delete();
        Toastr::success('Banner Deleted Successfully', 'Success');
        return back();
    }
}

