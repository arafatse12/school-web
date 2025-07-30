<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sikriti;
use Toastr;
use File;

class SikritiController extends Controller
{
    public function view()
    {
        $data['alldata'] = Sikriti::get();
        return view('admin.sikriti.view', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable',
            'image' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $sikriti = new Sikriti();
        $sikriti->title = $request->title;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/sikriti'), $filename);
            $sikriti->image = $filename; // ✅ only filename saved
        }

        $sikriti->save();
        Toastr::success('Sikriti Added Successfully', 'Success');
        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable',
            'image' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $sikriti = Sikriti::findOrFail($id);
        $sikriti->title = $request->title;

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            $oldPath = public_path('upload/sikriti/' . $sikriti->image);
            if ($sikriti->image && File::exists($oldPath)) {
                File::delete($oldPath);
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/sikriti'), $filename);
            $sikriti->image = $filename; // ✅ only filename saved
        }

        $sikriti->save();
        Toastr::success('Sikriti Updated Successfully', 'Success');
        return back();
    }

    public function delete($id)
    {
        $sikriti = Sikriti::findOrFail($id);

        $filePath = public_path('upload/sikriti/' . $sikriti->image);
        if ($sikriti->image && File::exists($filePath)) {
            File::delete($filePath);
        }

        $sikriti->delete();
        Toastr::success('Sikriti Deleted Successfully', 'Success');
        return back();
    }
}

