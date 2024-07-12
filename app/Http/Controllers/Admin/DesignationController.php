<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DesignationDataTable;
use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index(DesignationDataTable $dataTable)
    {
        return $dataTable->render('admin.directors.designation.index');
    }

    public function create()
    {
        return view('admin.directors.designation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'designation' => ['required', 'max:200'],
        ]);

        $designation = new Designation();
        $designation->designation = $request->designation;
        $designation->save();

        toastr()->success('Designation Created Successfully', 'Congrats');
        return redirect()->route('admin.bod.designation');
    }

    public function edit($id)
    {
        $designation = Designation::findOrFail($id);
        return view('admin.directors.designation.edit', compact('designation'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'designation' => ['required', 'max:200'],
        ]);

        $designation = Designation::findOrFail($id);

        $designation->designation = $request->designation;
        $designation->save();
        toastr()->success('Designation Updated Successfully', 'Congrats');

        return redirect()->route('admin.bod.designation');
    }



    public function destroy($id)
    {
        $designation = Designation::findOrFail($id);
        $designation->delete();
    }
}
