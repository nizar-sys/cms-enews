<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialBehaviour;
use Illuminate\Http\Request;

class SocialBehaviourController extends Controller
{
    public function index()
    {
        $socialBehaviour = SocialBehaviour::first();
        return view('admin.social-behaviour.index', compact('socialBehaviour'));
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

        $socialBehaviour = SocialBehaviour::first();
        $imagePath = handleUpload('image', $socialBehaviour);
        $documentPath = handleUpload('document', $socialBehaviour);

        SocialBehaviour::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => ($imagePath ? $imagePath : $socialBehaviour?->image ?? null),
                'document' => ($documentPath ? $documentPath : $socialBehaviour?->document ?? null),
                'video_url' => $request->video_url
            ]
        );
        toastr()->success('Updated Successfully !', 'Congrats');
        return redirect()->back();
    }
}
