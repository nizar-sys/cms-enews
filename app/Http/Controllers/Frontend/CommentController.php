<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {

        // dd($request);
        $request->validate([
            'comment' => 'required',
            'post_id' => 'required',
            'parent_id' => 'nullable|exists:comments,id', // Validasi jika parent_id ada, harus merupakan ID yang valid di tabel comments
        ]);

        $comment = new Comment();
        $comment->post_id = $request->input('post_id');
        $comment->user_id = auth()->id();
        $comment->comment = $request->input('comment');

        // Menangani parent_id
        if ($request->has('parent_id')) {
            $comment->parent_id = $request->input('parent_id');
        } else {
            $comment->parent_id = null;
        }

        $comment->save();

        return redirect()->back()->with('success', 'Your comment has been posted successfully!');
    }
}
