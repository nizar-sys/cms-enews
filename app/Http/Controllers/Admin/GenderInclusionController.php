<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GenderInclusion;
use Illuminate\Http\Request;

class GenderInclusionController extends Controller
{
    public function index()
    {
        $genderInclusion = GenderInclusion::first();
        return view('admin.gender-inclusion.index', compact('genderInclusion'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:500000'],
            'image' => ['image', 'max:5000'],
            'document' => ['mimes:pdf,csv,txt', 'max:10000'],
            'video_url' => ['nullable', 'url']
        ]);

        $genderInclusion = GenderInclusion::first();
        $imagePath = handleUpload('image', $genderInclusion);
        $documentPath = handleUpload('document', $genderInclusion);

        GenderInclusion::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => ($imagePath ? $imagePath : $genderInclusion?->image ?? null),
                'document' => ($documentPath ? $documentPath : $genderInclusion?->document ?? null),
                'video_url' => $request->video_url
            ]
        );
        toastr()->success('Updated Successfully !', 'Congrats');
        return redirect()->back();
    }
}
