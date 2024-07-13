<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CommunityVoiceDataTable;
use App\Models\CommunityVoice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommunityVoiceController extends Controller
{
    function index(CommunityVoiceDataTable $dataTable)
    {
        return $dataTable->render('admin.community-voice.index');
    }

    function create()
    {
        return view('admin.community-voice.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required'],
        ]);

        CommunityVoice::create($request->only('title', 'description'));

        toastr()->success('News Created Successfully', 'Congrats');
        return redirect()->route('admin.community-voice.index');
    }

    function edit($id)
    {
        $communityVoice = CommunityVoice::findOrFail($id);
        return view('admin.community-voice.edit', compact('communityVoice'));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required'],
        ]);

        CommunityVoice::findOrFail($id)->update($request->only('title', 'description'));

        toastr()->success('Community Voice Updated Successfully', 'Congrats');
        return redirect()->route('admin.community-voice.index');
    }

    function destroy($id)
    {
        CommunityVoice::findOrFail($id)->delete();
        toastr()->success('Community Voice Deleted Successfully', 'Congrats');
        return redirect()->route('admin.community-voice.index');
    }
}
