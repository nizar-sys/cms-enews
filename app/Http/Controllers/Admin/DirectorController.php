<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DirectorDataTable;
use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function index(DirectorDataTable $dataTable)
    {
        return $dataTable->render('admin.directors.index');
    }

    public function create()
    {
        $designations = Designation::all();
        return view('admin.directors.create', compact('designations'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'description' => ['required', 'max:200'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:50048',
            'designation_id' => 'required',
        ]);

        $imagePath = handleUpload('image');

        $director = new Director();
        $director->name = $request->name;
        $director->description = $request->description;
        $director->image = $imagePath;
        $director->designation_id = $request->designation_id;
        $director->save();

        toastr()->success('Director Created Successfully', 'Congrats');
        return redirect()->route('admin.bod.director');
    }

    public function edit($id)
    {
        $director = Director::findOrFail($id);
        $designations = Designation::all();
        return view('admin.directors.edit', compact('director', 'designations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'description' => ['required', 'max:200'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:50048',
        ]);

        $director = Director::findOrFail($id);

        $imagePath = handleUpload('image', $director);

        $director->name = $request->name;
        $director->description = $request->description;
        $director->image = (!empty($imagePath) ? $imagePath : $director->image);
        $director->save();
        toastr()->success('Director Updated Successfully', 'Congrats');

        return redirect()->route('admin.bod.director');
    }

    public function destroy($id)
    {
        $director = Director::findOrFail($id);
        deleteFileIfExist($director->image);
        $director->delete();
    }
}
