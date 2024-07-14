<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\DataTables\NewsDataTable;
use App\Models\NewsImages;

class NewsController extends Controller
{
    public function index(NewsDataTable $dataTable)
    {   
        return $dataTable->render('admin.news.index');
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required'],
        ]);

        News::create($request->only('title', 'description'));

        toastr()->success('News Created Successfully', 'Congrats');
        return redirect()->route('admin.news.index');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required'],
        ]);

        $news = News::findOrFail($id);
        $news->update($request->only('title', 'description'));

        toastr()->success('News Updated Successfully', 'Congrats');
        return redirect()->route('admin.news.index');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
    }
}
