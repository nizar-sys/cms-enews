<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PhotoGalleryDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PhotoGallery;
use App\Models\PhotoGalleryAlbum;

class PhotoGalleryController extends Controller
{
    public function index(PhotoGalleryDataTable $dataTable)
    {
        return $dataTable->render('admin.photo-gallery.index');
    }

    public function create()
    {
        $photoAlbums = PhotoGalleryAlbum::all();
        return view('admin.photo-gallery.create', compact('photoAlbums'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'album_id' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:50048',
        ]);

        $photoPath = handleUpload('photo');

        $photoGallery = new PhotoGallery();
        $photoGallery->album_id = $request->album_id;
        $photoGallery->photo = $photoPath;
        $photoGallery->photo_path = $photoPath;
        $photoGallery->save();

        toastr()->success('Photo Gallery Created Successfully', 'Congrats');
        return redirect()->route('admin.photo-gallery.index');
    }

    public function edit($id)
    {
        $photo = PhotoGallery::find($id);
        $photoAlbums = PhotoGalleryAlbum::all();
        return view('admin.photo-gallery.edit', compact('photo', 'photoAlbums'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'album_id' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:50048',
        ]);

        $photoGallery = PhotoGallery::find($id);
        $photoGallery->album_id = $request->album_id;

        if ($request->hasFile('photo')) {
            $photoPath = handleUpload('photo');
            $photoGallery->photo = $photoPath;
            $photoGallery->photo_path = $photoPath;
        }

        $photoGallery->save();

        toastr()->success('Photo Gallery Updated Successfully', 'Congrats');
        return redirect()->route('admin.photo-gallery.index');
    }

    public function destroy($id)
    {
        $photoGallery = PhotoGallery::find($id);
        deleteFileIfExist($photoGallery->photo);
        $photoGallery->delete();
    }
}
