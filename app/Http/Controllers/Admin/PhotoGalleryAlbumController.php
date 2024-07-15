<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PhotoGalleryAlbumDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PhotoGalleryAlbum;

class PhotoGalleryAlbumController extends Controller
{
    public function index(PhotoGalleryAlbumDataTable $datatable) {
        return $datatable->render('admin.photo-gallery.album.index');
    }

    public function create() {
        return view('admin.photo-gallery.album.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $album = new PhotoGalleryAlbum();
        $album->name = $request->name;
        $album->save();

        toastr()->success('Album created successfully');
        return redirect()->route('admin.photo-gallery.album.index');
    }

    public function edit($id) {
        $album = PhotoGalleryAlbum::findOrfail($id);
        return view('admin.photo-gallery.album.edit', compact('album'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
        ]);

        $album = PhotoGalleryAlbum::findOrfail($id);
        $album->name = $request->name;
        $album->save();

        toastr()->success('Album updated successfully');
        return redirect()->route('admin.photo-gallery.album.index');
    }

    public function destroy($id) {
        $album = PhotoGalleryAlbum::findOrfail($id);
        $album->delete();
    }
}
