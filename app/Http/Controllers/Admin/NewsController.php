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
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);


        if ($request->hasFile('images')) {
                
                $news = News::create($request->all());
                foreach ($request->file('images') as $image) {
                    $imagePath = $image->store('news_images', 'public');
                    NewsImages::create([
                        'news_id' => $news->id,
                        'image_path' => $imagePath
                    ]);
                }
        }

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
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $news = News::findOrFail($id);
        $news->update($request->only('title', 'description'));

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $imagePath = $image->store('news_images', 'public');
                NewsImages::create([
                    'news_id' => $news->id,
                    'image_path' => $imagePath
                ]);
            }
        }

        toastr()->success('News Updated Successfully', 'Congrats');
        return redirect()->route('admin.news.index');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
    }
}
