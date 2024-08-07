<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PhotoProjectDataTable;
use App\Http\Controllers\Controller;
use App\Models\PhotoProject;
use App\Models\PhotoProjectAlbum;
use Illuminate\Http\Request;

class PhotoProjectController extends Controller
{
    public function index(PhotoProjectDataTable $dataTable)
    {
        return $dataTable->render('admin.photo-project.index');
    }

    public function create()
    {
        $photoAlbums = PhotoProjectAlbum::all();
        return view('admin.photo-project.create', compact('photoAlbums'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'album_id' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:50048',
        ]);

        $photoPath = handleUpload('photo');

        $photoProject = new PhotoProject();
        $photoProject->album_id = $request->album_id;
        $photoProject->photo = $photoPath;
        $photoProject->photo_path = $photoPath;
        $photoProject->save();

        toastr()->success('Photo Project Created Successfully', 'Congrats');
        return redirect()->route('admin.photo-project.index');
    }

    public function edit($id)
    {
        $photo = PhotoProject::find($id);
        $photoAlbums = PhotoProjectAlbum::all();
        return view('admin.photo-project.edit', compact('photo', 'photoAlbums'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'album_id' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:50048',
        ]);

        $photoProject = PhotoProject::find($id);
        $photoProject->album_id = $request->album_id;

        if ($request->hasFile('photo')) {
            $photoPath = handleUpload('photo');
            $photoProject->photo = $photoPath;
            $photoProject->photo_path = $photoPath;
        }

        $photoProject->save();

        toastr()->success('Photo Project Updated Successfully', 'Congrats');
        return redirect()->route('admin.photo-project.index');
    }

    public function destroy($id)
    {
        $photoProject = PhotoProject::find($id);
        deleteFileIfExist($photoProject->photo);
        $photoProject->delete();
    }
}
