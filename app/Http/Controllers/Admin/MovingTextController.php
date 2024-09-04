<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MovingText;
use Illuminate\Http\Request;

class MovingTextController extends Controller
{
    public function index()
    {
        $movingText = MovingText::first();
        return view('admin.moving-text.index', compact('movingText'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'moving_text' => ['required', 'max:200'],
        ]);

        $movingText = MovingText::first();

        MovingText::updateOrCreate(
            ['id' => $id],
            [
                'moving_text' => $request->moving_text,
            ]
        );
        toastr()->success('updated Succesfully', 'Congrats');
        return redirect()->back();
    }
}
