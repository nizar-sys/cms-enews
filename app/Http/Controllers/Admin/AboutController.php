<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:500000'],
            'image' => ['image', 'max:5000'],
            'resume' => ['mimes:pdf,csv,txt', 'max:10000'],
            'video_url' => ['nullable', 'url']
        ]);

        $about = About::first();
        $imagePath = handleUpload('image', $about);
        $resumePath = handleUpload('resume', $about);

        About::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => ($imagePath ? $imagePath : $about?->image ?? null),
                'resume' => ($resumePath ? $resumePath : $about?->resume ?? null),
                'video_url' => $request->video_url
            ]
        );
        toastr()->success('updated Succesfully', 'Congrats');
        return redirect()->back();
    }
}
