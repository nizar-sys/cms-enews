<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ExecutiveTeamDataTable;
use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\ExecutiveTeam;
use Illuminate\Http\Request;

class ExecutiveController extends Controller
{
    public function index(ExecutiveTeamDataTable $dataTable)
    {
        $executiveCount = ExecutiveTeam::count();
        return $dataTable->render('admin.executive.index', compact('executiveCount'));
    }

    public function create()
    {
        $executiveCount = ExecutiveTeam::count();

        if ($executiveCount >= 3) {
            abort(403, 'You cannot create more than 3 executives.');
        }

        $designations = Designation::all();
        return view('admin.executive.create', compact('designations'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:50048',
            'designation_id' => 'required',
        ]);

        $imagePath = handleUpload('image');

        $executive = new ExecutiveTeam();
        $executive->name = $request->name;
        $executive->image = $imagePath;
        $executive->designation_id = $request->designation_id;
        $executive->save();

        toastr()->success('Executive Created Successfully', 'Congrats');
        return redirect()->route('admin.bod.executive-teams.index');
    }

    public function edit($id)
    {
        $executive = ExecutiveTeam::findOrFail($id);
        $designations = Designation::all();
        return view('admin.executive.edit', compact('executive', 'designations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:50048',
        ]);

        $executive = ExecutiveTeam::findOrFail($id);

        $imagePath = handleUpload('image', $executive);

        $executive->name = $request->name;
        $executive->image = (!empty($imagePath) ? $imagePath : $executive->image);
        $executive->save();
        toastr()->success('Executive Updated Successfully', 'Congrats');

        return redirect()->route('admin.bod.executive-teams.index');
    }

    public function destroy($id)
    {
        $executive = ExecutiveTeam::findOrFail($id);
        deleteFileIfExist($executive->image);
        $executive->delete();
    }
}
