<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Committee;
use Toastr;
use File;

class CommitteeController extends Controller
{
    public function view()
    {
        $data['alldata'] = Committee::paginate(20);
        return view('admin.committee.view', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable',
            'image' => 'nullable|mimes:jpg,pdf,jpeg,doc,docx,png',
        ]);

        $committee = new Committee();
        $committee->title = $request->title;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('upload/committee'), $filename);
            $committee->image = $filename;
        }

        $committee->save();
        Toastr::success('Committee Added Successfully', 'Success');
        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable',
            'image' => 'nullable|mimes:jpg,jpeg,pdf,doc,docx,png',
        ]);

        $committee = Committee::findOrFail($id);
        $committee->title = $request->title;

        if ($request->hasFile('image')) {
            $oldPath = public_path('upload/committee/' . $committee->image);
            if ($committee->image && File::exists($oldPath)) {
                File::delete($oldPath);
            }

            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('upload/committee'), $filename);
            $committee->image = $filename;
        }

        $committee->save();
        Toastr::success('Committee Updated Successfully', 'Success');
        return back();
    }

    public function delete($id)
    {
        $committee = Committee::findOrFail($id);
        $filePath = public_path('upload/committee/' . $committee->image);

        if ($committee->image && File::exists($filePath)) {
            File::delete($filePath);
        }

        $committee->delete();
        Toastr::success('Committee Deleted Successfully', 'Success');
        return back();
    }
}

