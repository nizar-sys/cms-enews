<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterUsefulLinkDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterUsefulLink;
use Illuminate\Http\Request;

class FooterUsefulLinkController extends Controller
{
    
    public function index(FooterUsefulLinkDataTable $dataTable)
    {
        return $dataTable->render('admin.footer-useful-link.index');
    }

    public function create()
    {
        return view('admin.footer-useful-link.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'url' => ['required']
        ]);

        $link = new FooterUsefulLink();
        $link->name = $request->name;
        $link->url = $request->url;
        $link->save();

        toastr('Created Successfully', 'success');
        return redirect()->route('admin.footer-useful-links.index');
    }

    public function edit($id)
    {
        $link = FooterUsefulLink::findOrFail($id);
        return view('admin.footer-useful-link.edit', compact('link'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'url' => ['required'],
        ]);

        $link =   FooterUsefulLink::findOrFail($id);
        $link->name = $request->name;
        $link->url = $request->url;
        $link->save();

        toastr('Created Successfully', 'success');
        return redirect()->route('admin.footer-useful-links.index');
    }

    public function destroy($id)
    {
        $link = FooterUsefulLink::findOrFail($id);
        $link->delete();
    }
}
