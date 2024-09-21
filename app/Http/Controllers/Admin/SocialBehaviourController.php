<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SocialBehaviourDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStoreSocialBehaviour;
use App\Models\SocialBehaviour;
use App\Models\SocialBehaviourCategory;
use Illuminate\Http\Request;

class SocialBehaviourController extends Controller
{
    public function index(SocialBehaviourDataTable $dataTable)
    {
        return $dataTable->render('admin.social-behaviour.index');
    }

    public function create()
    {
        $categories = SocialBehaviourCategory::latest()->get(['id', 'name']);

        return view('admin.social-behaviour.create', compact('categories'));
    }

    public function store(RequestStoreSocialBehaviour $request)
    {
        $payloadSocial = $request->validated();
        $payloadSocial['thumbnail'] = handleUpload('thumbnail');

        SocialBehaviour::create($payloadSocial);

        toastr()->success('Social Behaviour created successfully!');
        return redirect()->route('admin.social-behaviour.index');
    }

    public function edit(SocialBehaviour $behaviour)
    {
        $categories = SocialBehaviourCategory::latest()->get(['id', 'name']);

        return view('admin.social-behaviour.edit', compact('behaviour', 'categories'));
    }

    public function update(RequestStoreSocialBehaviour $request, SocialBehaviour $behaviour)
    {
        $payloadSocial = $request->validated();

        if ($request->hasFile('thumbnail')) {
            deleteFileIfExist($behaviour->thumbnail);
            $payloadSocial['thumbnail'] = handleUpload('thumbnail');
        }

        if ($request->filled('status')) {
            $payloadSocial['status'] = $request->status;
        }

        $behaviour->update($payloadSocial);

        toastr()->success('Social Behaviour updated successfully!');
        return redirect()->route('admin.social-behaviour.index');
    }

    public function destroy(SocialBehaviour $behaviour)
    {
        deleteFileIfExist($behaviour->thumbnail);
        $behaviour->delete();

        toastr()->success('Social Behaviour updated successfully!');
        return redirect()->route('admin.social-behaviour.index');
    }
}
