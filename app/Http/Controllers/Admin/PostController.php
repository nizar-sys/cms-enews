<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PostDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStorePost;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index(PostDataTable $dataTable)
    {
        return $dataTable->render('admin.posts.index');
    }

    public function create()
    {
        $categories = Category::latest()->get(['id', 'name']);

        return view('admin.posts.create', compact('categories'));
    }

    public function store(RequestStorePost $request)
    {
        $payloadPost = $request->validated();
        $payloadPost['thumbnail'] = handleUpload('thumbnail');

        Post::create($payloadPost);

        toastr()->success('Post created successfully!');
        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post)
    {
        $categories = Category::latest()->get(['id', 'name']);

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(RequestStorePost $request, Post $post)
    {
        $payloadPost = $request->validated();

        if ($request->hasFile('thumbnail')) {
            deleteFileIfExist($post->thumbnail);
            $payloadPost['thumbnail'] = handleUpload('thumbnail');
        }

        if ($request->filled('status')) {
            $payloadPost['status'] = $request->status;
        }

        $post->update($payloadPost);

        toastr()->success('Post updated successfully!');
        return redirect()->route('admin.posts.index');
    }

    public function destroy(Post $post)
    {
        deleteFileIfExist($post->thumbnail);
        $post->delete();

        toastr()->success('Post deleted successfully!');
        return redirect()->route('admin.posts.index');
    }
}
