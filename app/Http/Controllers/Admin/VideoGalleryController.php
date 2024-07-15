<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\VideoGalleryDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VideoGallery;

class VideoGalleryController extends Controller
{
    public function index(VideoGalleryDataTable $dataTable)
    {
        return $dataTable->render('admin.video-gallery.index');
    }

    public function create()
    {
        return view('admin.video-gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);

        $videoGallery = new VideoGallery();
        $videoGallery->title = $request->title;
        $videoGallery->url = $request->url;
        $videoGallery->save();

        toastr()->success('Video Gallery created successfully');
        return redirect()->route('admin.video-gallery.index');
    }

    public function edit($id)
    {
        $video = VideoGallery::find($id);
        return view('admin.video-gallery.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);

        $videoGallery = VideoGallery::find($id);
        $videoGallery->title = $request->title;
        $videoGallery->url = $request->url;
        $videoGallery->save();

        toastr()->success('Video Gallery updated successfully');
        return redirect()->route('admin.video-gallery.index');
    }

    public function destroy($id)
    {
        $video = VideoGallery::findOrfail($id);

        $video->delete();
    }
}
