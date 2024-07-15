<?php

namespace App\Http\Controllers;

use App\DataTables\FaqDataTable;
use App\Models\faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(FaqDataTable $dataTable)
    {
        return $dataTable->render('admin.faq.index');
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => ['required', 'max:200'],
            'answer' => ['required', 'max:200'],
        ]);

        $faq = new faq();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        toastr()->success('Faqs Created Successfully', 'Congrats');
        return redirect()->route('admin.faqs.index');
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => ['required', 'max:200'],
            'answer' => ['required', 'max:200'],
        ]);

        $faq = faq::findOrFail($id);


        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        toastr()->success('Faqs Updated Successfully', 'Congrats');

        return redirect()->route('admin.faqs.index');
    }

    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
    }
}
