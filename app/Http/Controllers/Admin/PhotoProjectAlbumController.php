<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PhotoProjectAlbumDataTable;
use App\Http\Controllers\Controller;
use App\Models\PhotoProject;
use App\Models\PhotoProjectAlbum;
use Illuminate\Http\Request;

class PhotoProjectAlbumController extends Controller
{
    public function index(PhotoProjectAlbumDataTable $datatable)
    {
        return $datatable->render('admin.photo-project.album.index');
    }

    public function create()
    {
        return view('admin.photo-project.album.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $album = new PhotoProjectAlbum();
        $album->name = $request->name;
        $album->save();

        toastr()->success('Album created successfully');
        return redirect()->route('admin.photo-project.album.index');
    }

    public function edit($id)
    {
        $album = PhotoProjectAlbum::findOrfail($id);
        return view('admin.photo-project.album.edit', compact('album'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $album = PhotoProjectAlbum::findOrfail($id);
        $album->name = $request->name;
        $album->save();

        toastr()->success('Album updated successfully');
        return redirect()->route('admin.photo-project.album.index');
    }

    public function destroy($id)
    {
        $photos = PhotoProject::where('album_id', $id)->get();
        foreach ($photos as $photo) {
            deleteFileIfExist($photo->photo_path);
        }

        $album = PhotoProjectAlbum::findOrfail($id);

        $album->delete();
    }
}
